# Stock AI Decision Maker — Plan & Structure

> **Goal:** Log an expert's buy/sell calls, learn the patterns behind those decisions using AI, and gradually build independence from the expert.

---

## 1. Project Overview

You currently rely on an expert for stock buy/sell calls. This system will:

1. **Log** every expert call along with all market context at that moment
2. **Analyse** patterns — what technical, fundamental, and news conditions triggered each decision
3. **Predict** new calls using AI, scored by confidence
4. **Validate** AI predictions vs expert calls over time
5. **Replace** the expert dependency once AI accuracy is consistently above ~70%

---

## 2. Three-Phase Roadmap

### Phase 1 — Data Collection (Weeks 1–6)
- Add your 30 stocks to the watchlist
- Log every expert call manually (takes 2 minutes per call)
- System auto-fetches technical indicators, news sentiment, and fundamentals at call time
- Mark outcomes once trades close (profit / loss)

### Phase 2 — Pattern Discovery (Weeks 7–10, after ~30 calls)
- Claude AI analyses all logged calls and explains the expert's hidden logic in plain English
- Dashboard shows which indicators are most predictive
- You start understanding the "rules" behind the calls

### Phase 3 — AI Prediction & Independence (Week 11+)
- AI generates its own buy/sell signals for all 30 stocks daily
- Side-by-side comparison: AI prediction vs expert call
- Track agreement rate — when it consistently hits 70%+ you can act on AI alone

---

## 3. Database Schema

### 3.1 `stocks` — Your 30-stock watchlist
```
id
ticker          string      e.g. RELIANCE, TCS, AAPL
company_name    string
sector          string      e.g. Technology, Banking
exchange        string      NSE / BSE / NASDAQ
currency        string      INR / USD
is_active       boolean     track or pause
notes           text        personal notes about this stock
created_at / updated_at
```

### 3.2 `stock_prices` — Daily OHLCV history
```
id
stock_id        FK → stocks
date            date
open            decimal(12,4)
high            decimal(12,4)
low             decimal(12,4)
close           decimal(12,4)
adj_close       decimal(12,4)
volume          bigint
created_at
```

### 3.3 `stock_profiles` — Company overview (refreshed weekly)
```
id
stock_id        FK → stocks (unique)
market_cap      bigint
pe_ratio        decimal
pb_ratio        decimal
week_52_high    decimal
week_52_low     decimal
avg_volume      bigint
beta            decimal     volatility vs market
description     text        company overview
employees       int
website         string
last_updated    timestamp
```

### 3.4 `stock_fundamentals` — Quarterly / Annual financials
```
id
stock_id            FK → stocks
period_type         enum: quarterly / annual
period_ending       date        e.g. 2025-03-31
revenue             bigint
net_income          bigint
eps                 decimal     Earnings Per Share
pe_ratio            decimal
pb_ratio            decimal
roe                 decimal     Return on Equity %
roa                 decimal     Return on Assets %
debt_to_equity      decimal
free_cash_flow      bigint
revenue_growth_yoy  decimal     % YoY growth
profit_margin       decimal     %
dividend_yield      decimal     %
raw_data            json        full API response
fetched_at          timestamp
```

### 3.5 `stock_news` — News articles with AI sentiment
```
id
stock_id            FK → stocks
headline            string
summary             text
source              string      Reuters, ET, CNBC, Moneycontrol
url                 string
sentiment           enum: positive / negative / neutral
sentiment_score     decimal     -1.0 to +1.0  (Claude AI scored)
impact_level        enum: high / medium / low
is_market_moving    boolean     caused significant price move?
related_call_id     FK nullable → expert_calls (if news triggered the call)
published_at        timestamp
fetched_at          timestamp
```

### 3.6 `expert_calls` — Every call from the expert
```
id
stock_id            FK → stocks
call_type           enum: buy / sell / hold
entry_price         decimal     price at time of call
target_price        decimal     expert's target
stop_loss           decimal     expert's stop loss
quantity            int         optional — number of shares
called_at           timestamp   exact date and time
closed_at           timestamp   when trade was closed
outcome             enum: pending / profit / loss / neutral / stopped_out
outcome_price       decimal     actual exit price
outcome_pct         decimal     actual % gain or loss
expert_reasoning    text        optional — if expert explains the call
tags                json        e.g. ["breakout", "earnings_play", "sector_rotation"]
created_at / updated_at
```

### 3.7 `market_snapshots` — Full market context captured at call time
```
id
expert_call_id      FK → expert_calls

-- Price context
price_at_call       decimal
price_vs_ma20_pct   decimal     % above or below 20-day MA
price_vs_ma50_pct   decimal
price_vs_ma200_pct  decimal

-- Moving Averages
ma_20               decimal
ma_50               decimal
ma_200              decimal

-- Momentum
rsi_14              decimal     0–100
macd                decimal
macd_signal         decimal
macd_histogram      decimal
macd_crossover      enum: bullish / bearish / none

-- Volatility
bb_upper            decimal     Bollinger Band upper
bb_lower            decimal     Bollinger Band lower
bb_position         decimal     0=lower band, 1=upper band
atr_14              decimal     Average True Range

-- Volume
volume_at_call      bigint
volume_vs_avg_pct   decimal     % vs 20-day average volume
volume_spike        boolean     volume > 2x average

-- Trend
trend_direction     enum: uptrend / downtrend / sideways
trend_strength      decimal     ADX value

-- News context at call time
news_sentiment_avg  decimal     avg sentiment of last 5 news articles
positive_news_count int         in last 7 days
negative_news_count int         in last 7 days

-- Fundamental context at call time
latest_pe           decimal
latest_eps_growth   decimal
revenue_growth      decimal
fundamental_score   decimal     0–10 composite score (calculated)
days_since_results  int         days since last earnings report
days_to_results     int         days until next earnings

-- Market context
nifty_trend         enum: bullish / bearish / sideways   (or S&P 500)
sector_momentum     decimal     sector ETF % change (1 week)
market_sentiment    enum: risk_on / risk_off / neutral

raw_snapshot        json        complete raw data dump
created_at
```

### 3.8 `ai_analyses` — AI-discovered patterns (regenerated as new calls are added)
```
id
total_calls_analysed    int
buy_calls_analysed      int
sell_calls_analysed     int

-- Discovered rules (JSON arrays of conditions)
buy_signal_rules        json    e.g. [{"indicator":"rsi","operator":"<","value":40},...]
sell_signal_rules       json
hold_signal_rules       json

-- Plain English summary from Claude
ai_explanation          text    "The expert tends to buy when..."
buy_pattern_summary     text
sell_pattern_summary    text

-- Accuracy metrics
rule_accuracy           decimal     how well discovered rules predict actual calls
backtest_win_rate       decimal     win rate when rules applied to past data
top_indicators          json        ranked list of most predictive indicators

analysed_at             timestamp
model_version           int
```

### 3.9 `ai_predictions` — AI's own daily signals
```
id
stock_id            FK → stocks
prediction          enum: buy / sell / hold
confidence          decimal     0–100 %
matched_rules       json        which rules triggered this prediction
reasoning           text        Claude's plain English explanation

-- Comparison with expert
expert_call_id      FK nullable → expert_calls  (if expert also called this)
expert_agreed       boolean nullable
agreement_notes     text

-- Outcome tracking
outcome             enum: pending / correct / incorrect / not_taken
outcome_notes       text

predicted_at        timestamp
reviewed_at         timestamp nullable
```

### 3.10 `stock_decisions` — Your own manual future decisions/notes
```
id
stock_id            FK → stocks
decision            enum: buy / sell / hold / watch / avoid
target_price        decimal
stop_loss           decimal
confidence          tinyint     1–5
reasoning           text        your own analysis notes
time_horizon        enum: short / medium / long    (days / weeks / months)
review_date         date        when to revisit this decision
outcome             enum: pending / correct / incorrect
created_at / updated_at
```

---

## 4. Full Schema Relationship Map

```
stocks
  ├── stock_prices          (daily OHLCV history)
  ├── stock_profiles        (company overview — weekly refresh)
  ├── stock_fundamentals    (quarterly & annual financials)
  ├── stock_news            (news articles + AI sentiment scoring)
  ├── stock_decisions       (your own personal decisions/notes)
  ├── expert_calls
  │     └── market_snapshots  (full context: technicals + news + fundamentals at call time)
  ├── ai_analyses           (AI-discovered patterns from expert history)
  └── ai_predictions        (AI's daily signals for all 30 stocks)
```

---

## 5. Tech Stack

| Layer | Technology | Purpose |
|---|---|---|
| Backend | Laravel 12 (PHP) | Core app, scheduled jobs, API |
| Admin UI | Filament 3 | Dashboard, forms, data tables |
| Database | MySQL | All data storage |
| Charts | ApexCharts | Candlestick + indicator overlays |
| Price Data | Alpha Vantage API | Daily OHLCV, indicators |
| Fundamentals | Financial Modeling Prep API | Earnings, ratios, financials |
| News | NewsAPI / Alpha Vantage News | Headlines + articles |
| **AI Sentiment** | **Claude API (Haiku)** | Score news sentiment (cheap, fast) |
| **AI Pattern Analysis** | **Claude API (Sonnet)** | Discover expert patterns, plain English explanation |
| **AI Prediction** | **Claude API (Sonnet)** | Generate daily signals with reasoning |
| Scheduler | Laravel Cron | Daily price + news + fundamental refresh |

---

## 6. Pages & Features

| Page | What It Does |
|---|---|
| **Dashboard** | All 30 stocks — latest price, AI signal, expert's last call, next review |
| **Log Expert Call** | Quick form to log a buy/sell call → system auto-fetches all context |
| **Stock Detail** | Candlestick chart, indicators, fundamentals, news feed, call history |
| **Call History** | All expert calls with outcomes — filter by stock, result, date |
| **Pattern Dashboard** | What the AI has learned: top indicators, buy/sell rules, confidence |
| **AI Scanner** | Run all 30 stocks through AI → ranked buy/sell/hold signals today |
| **AI vs Expert** | Side-by-side comparison — track agreement % over time |
| **News Feed** | Latest news for all 30 stocks with sentiment badges |
| **Fundamentals View** | Financials table — quarterly comparison, key ratios |
| **Learning Progress** | Your journey to independence — AI accuracy graph over time |
| **My Decisions** | Your own analysis notes and decisions per stock |

---

## 7. AI Architecture

### Layer 1 — News Sentiment Scorer (Claude Haiku — fast & cheap)
```
Input:  batch of 10 news headlines for a stock
Output: sentiment score per headline (-1.0 to +1.0) + impact level
When:   runs daily after news fetch
Cost:   very low (Haiku model, short prompts)
```

### Layer 2 — Pattern Analyser (Claude Sonnet — runs weekly)
```
Input:  all expert_calls + market_snapshots (as structured JSON)
Output: discovered buy/sell rules in JSON + plain English explanation
When:   runs every Sunday night OR whenever 5 new calls are added
Stores: results in ai_analyses table
```

### Layer 3 — Daily Signal Generator (Claude Sonnet — runs daily)
```
Input:  today's market_snapshot for each stock + discovered patterns from Layer 2
Output: buy / sell / hold prediction + confidence % + reasoning
When:   runs every morning before market open
Stores: results in ai_predictions table
```

---

## 8. Data Auto-Refresh Schedule

| Job | Frequency | What It Fetches |
|---|---|---|
| `FetchStockPrices` | Daily (after market close) | OHLCV for all 30 stocks |
| `FetchStockNews` | Daily (morning + evening) | Latest 5 news per stock |
| `ScoreNewsSentiment` | Daily (after news fetch) | Claude scores all unscored news |
| `FetchFundamentals` | Weekly (Sunday) | Quarterly financials if updated |
| `RefreshStockProfiles` | Weekly (Sunday) | Market cap, PE, 52-week range |
| `RunPatternAnalysis` | Weekly (Sunday night) | Claude analyses all expert calls |
| `GenerateDailySignals` | Daily (pre-market) | Claude signals for all 30 stocks |

---

## 9. How You Gain Independence (Milestone Tracker)

| Milestone | Condition | What It Means |
|---|---|---|
| **M1 — Foundation** | 15+ expert calls logged | Enough data to see early patterns |
| **M2 — First Insights** | AI explains expert's top 3 rules | You understand the logic |
| **M3 — AI Predicting** | AI generating signals daily | Side-by-side comparison starts |
| **M4 — Validation** | 30+ calls, AI matches expert 60%+ | AI is learning well |
| **M5 — Independence** | 50+ calls, AI matches expert 70%+ | You can act on AI signals alone |
| **M6 — Outperformance** | AI win rate > expert win rate | You've surpassed the expert |

---

## 10. API Limits & Costs (Free Tiers)

| API | Free Limit | Paid Plan |
|---|---|---|
| Alpha Vantage | 25 requests/day | $50/month (unlimited) |
| Financial Modeling Prep | 250 requests/day | $19/month |
| NewsAPI | 100 requests/day | $449/month |
| Claude API (Haiku) | Pay per token | ~$0.001 per news batch |
| Claude API (Sonnet) | Pay per token | ~$0.05 per analysis run |

> **Estimated Claude API cost:** < $5/month for 30 stocks with daily signals + weekly analysis.

---

## 11. Indian Market Considerations

If stocks are on **NSE / BSE**:

| Concern | Solution |
|---|---|
| Price data | Alpha Vantage supports NSE (use `RELIANCE.BSE`) |
| Fundamentals | Financial Modeling Prep covers Indian stocks |
| News | NewsAPI + Moneycontrol RSS feeds |
| Market hours | IST timezone — schedule jobs after 3:30 PM IST |
| Currency | Store as INR, add currency field to stocks table |

---

## 12. Out of Scope (Future Phases)

- Paper trading / portfolio simulation
- Broker API integration (Zerodha Kite, Upstox) for auto-execution
- Mobile app / push notifications
- Multi-user / team access
- Backtesting engine

---

## Summary

| What | Detail |
|---|---|
| Stocks tracked | 30 (your fixed watchlist) |
| Core purpose | Learn expert patterns → AI independence |
| AI engine | Claude API (sentiment + pattern analysis + signals) |
| Data sources | Alpha Vantage + Financial Modeling Prep + NewsAPI |
| Stack | Laravel 12 + Filament 3 + MySQL + ApexCharts |
| Build location | New standalone Laravel project (separate from GoldenCreeper) |
| Estimated build time | 3–4 weeks for full feature set |
| Monthly running cost | < $10 (API fees + Claude tokens) |

---

*Review this plan and confirm to proceed. Once approved, development starts with database migrations, API integrations, and the Filament dashboard.*
