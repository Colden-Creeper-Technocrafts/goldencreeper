<?php

namespace Database\Seeders;

use App\Models\BlogPost;
use App\Models\Faq;
use App\Models\JobPosting;
use App\Models\Project;
use App\Models\Service;
use App\Models\SiteSetting;
use App\Models\TeamMember;
use App\Models\Testimonial;
use Illuminate\Database\Seeder;

class ContentSeeder extends Seeder
{
    public function run(): void
    {
        $this->seedSiteSettings();
        $this->seedServices();
        $this->seedProjects();
        $this->seedTeamMembers();
        $this->seedBlogPosts();
        $this->seedTestimonials();
        $this->seedFaqs();
        $this->seedJobPostings();
    }

    private function seedSiteSettings(): void
    {
        $settings = [
            // Company
            'company_name'          => 'GoldenCreeper',
            'company_tagline'       => 'Code on Demand. Knowledge on Tap.',
            'company_email'         => 'goldencreepertech@gmail.com',
            'company_phone'         => '+91 78748 34477',
            'company_address'       => 'Available on conference — we are fully virtual right now.',
            'twitter_url'           => '#',
            'linkedin_url'          => '#',
            'github_url'            => '#',
            'facebook_url'          => '#',

            // Hero section
            'hero_badge'            => 'A Different Kind of Software Partner',
            'hero_title'            => 'Code on Demand.',
            'hero_title_highlight'  => 'Built Exactly for You.',
            'hero_subtitle'         => 'We\'re not a typical software agency. We deliver source code on demand, sell ready-made code products, lead your team as a fractional tech lead, review and fix existing code, and train your team on AI and prompt engineering.',
            'hero_btn_primary'      => 'Explore Our Services',
            'hero_btn_secondary'    => 'Get a Free Quote',

            // Stats bar
            'stats_1_number'        => '50+',
            'stats_1_label'         => 'Projects Completed',
            'stats_2_number'        => '30+',
            'stats_2_label'         => 'Happy Clients',
            'stats_3_number'        => '5+',
            'stats_3_label'         => 'Years of Experience',
            'stats_4_number'        => '15+',
            'stats_4_label'         => 'Team Members',

            // Why choose us
            'why_us_title'          => 'Why GoldenCreeper is Different',
            'why_us_1_title'        => 'You Own the Code',
            'why_us_1_desc'         => 'Every line of code we write or sell is yours outright. No vendor lock-in, no licensing fees, no dependency on us to keep it running.',
            'why_us_2_title'        => 'No Fluff, Just Delivery',
            'why_us_2_desc'         => 'No lengthy discovery phases or bloated proposals. Tell us what you need, we scope it clearly, and we deliver it — fast.',
            'why_us_3_title'        => 'AI-First Mindset',
            'why_us_3_desc'         => 'From token optimization to prompt engineering training, we help you work smarter with AI — not just build with it.',
            'why_us_4_title'        => 'Flexible Engagement',
            'why_us_4_desc'         => 'One-off code delivery, monthly retainer, or fractional leadership — you choose the model that fits your needs and budget.',

            // Metrics box
            'metrics_1_value'       => '96%',
            'metrics_1_label'       => 'On-time delivery rate',
            'metrics_2_value'       => '4.9/5',
            'metrics_2_label'       => 'Average client rating',
            'metrics_3_value'       => '$0',
            'metrics_3_label'       => 'Hidden fees, ever',
            'metrics_4_value'       => '24h',
            'metrics_4_label'       => 'Average response time',

            // Home CTA
            'home_cta_title'        => 'Ready to Start Your Project?',
            'home_cta_subtitle'     => 'Let\'s talk about your vision and build something amazing together. Free consultation, no obligation.',

            // About page
            'about_intro'           => 'I\'m Raj Thakkar — Founder & Solution Architect at GoldenCreeper. I work with businesses and developers to deliver real code, real skills, and real results.',
            'about_story_p1'        => 'GoldenCreeper started from a simple frustration: too many software agencies over-promise, under-deliver, and leave clients with code they don\'t understand and can\'t maintain. I wanted to build something different — a code-first partner that gives clients full ownership, full transparency, and actual expertise.',
            'about_story_p2'        => 'As a solo founder and solution architect based in India, I work directly with every client — no middlemen, no handoffs to junior developers. When you work with GoldenCreeper, you work with me. I bring hands-on experience across the full stack, a deep focus on AI and prompt engineering, and a commitment to delivering code that actually solves your problem.',
            'about_story_p3'        => 'Whether you need a specific piece of code written, your existing codebase reviewed and fixed, a technical lead for your team, or training to get more out of AI tools — I can help. Every engagement is flexible, honest, and focused on results.',
            'about_mission'         => 'To give every business — regardless of size — access to senior-level code quality, AI expertise, and technical leadership on their own terms.',
            'about_vision'          => 'A world where businesses own their technology outright, understand it fully, and aren\'t dependent on agencies to keep it running.',
        ];

        foreach ($settings as $key => $value) {
            SiteSetting::set($key, $value);
        }
    }

    private function seedServices(): void
    {
        $services = [
            [
                'title'             => 'Source Code on Demand',
                'slug'              => 'source-code-on-demand',
                'icon'              => 'code',
                'short_description' => 'Get clean, production-ready code written to your exact requirements — no agency overhead, no long-term contracts.',
                'description'       => "You describe what you need, we deliver the code — fully commented, well-structured, and ready to integrate. No bloated project plans, no unnecessary meetings, no retainers. Just the code you need, when you need it.\n\nThis service is ideal for developers who need a specific module built, startups that need features shipped fast, or businesses that want to own their codebase without hiring a full team. You receive complete source code with no licensing restrictions — it's yours outright.\n\nWe work across PHP, Laravel, JavaScript, React, Python, and more. Every delivery includes documentation and is reviewed for security and performance before handover.",
                'sort_order'        => 1,
                'is_active'         => true,
            ],
            [
                'title'             => 'Ready-Made Code Products',
                'slug'              => 'ready-made-code-products',
                'icon'              => 'sparkles',
                'short_description' => 'Pre-built, tested code packages ready to buy, download, and integrate — skip months of development.',
                'description'       => "Why build from scratch when we already have it built? Our ready-made code products are fully tested, documented modules and applications you can purchase and deploy immediately.\n\nEach product is production-grade code — not a template or a boilerplate. Products cover common business needs: authentication systems, admin panels, payment integrations, API wrappers, dashboards, and more. Every product comes with setup documentation and a one-time licence for unlimited use in your project.\n\nBrowse our catalogue, pick what fits, and integrate it in hours instead of weeks. If you need a customisation on top of a ready product, we can handle that too.",
                'sort_order'        => 2,
                'is_active'         => true,
            ],
            [
                'title'             => 'Fractional Tech Lead',
                'slug'              => 'fractional-tech-lead',
                'icon'              => 'briefcase',
                'short_description' => 'Hire an experienced technical leader for your team on a contract basis — architecture, standards, and mentoring included.',
                'description'       => "You have a team. You need someone to lead it technically. Hiring a full-time CTO or senior architect is expensive and slow — a Fractional Tech Lead gives you the same expertise on a flexible contract.\n\nWe embed into your team and take ownership of: architecture decisions, code quality standards, pull request reviews, technical roadmapping, and developer mentoring. We bridge the gap between your business goals and your engineering execution.\n\nThis service is ideal for startups that have hired their first engineers but need experienced technical direction, or growing companies that need senior oversight without the full-time cost. Engagements are weekly or monthly, fully remote, and can scale up or down as your needs change.",
                'sort_order'        => 3,
                'is_active'         => true,
            ],
            [
                'title'             => 'Code Review & Audit',
                'slug'              => 'code-review-audit',
                'icon'              => 'globe-alt',
                'short_description' => 'Get a professional, in-depth review of your codebase — security, performance, quality, and maintainability.',
                'description'       => "Before you ship, scale, or hand your code to a new team — get it reviewed by an experienced engineer who will tell you exactly what's wrong and how to fix it.\n\nOur code review service covers: security vulnerabilities, performance bottlenecks, architectural issues, code duplication, test coverage gaps, and adherence to best practices. You receive a detailed written report with prioritised findings and specific recommendations — not vague feedback.\n\nWe review code in PHP, Laravel, JavaScript, React, Python, and Node.js. Turnaround is typically 2–5 business days depending on codebase size. Many clients use this service before a major launch, before raising investment, or when onboarding a new development team.",
                'sort_order'        => 4,
                'is_active'         => true,
            ],
            [
                'title'             => 'Legacy Code Fixing',
                'slug'              => 'legacy-code-fixing',
                'icon'              => 'cloud',
                'short_description' => 'We debug, refactor, and modernise broken or outdated codebases so your team can move fast again.',
                'description'       => "Old code doesn't have to be a dead end. Whether you've inherited a mess, hit a wall with a bug you can't track down, or need to modernise a system that's slowing your business — we fix it.\n\nWe start by understanding the codebase as-is, identifying the root causes of problems (not just symptoms), and then systematically resolving them. Our approach prioritises stability first: we don't rewrite for the sake of it. We fix what needs fixing, refactor what's worth improving, and leave everything else alone.\n\nCommon requests include: fixing critical bugs in production, upgrading frameworks and dependencies, improving database query performance, untangling spaghetti architecture, and adding automated tests to fragile systems.",
                'sort_order'        => 5,
                'is_active'         => true,
            ],
            [
                'title'             => 'Token Optimization',
                'slug'              => 'token-optimization',
                'icon'              => 'device-phone-mobile',
                'short_description' => 'Cut your AI/LLM API costs dramatically by optimising how you structure prompts, context, and model usage.',
                'description'       => "Every token costs money. As businesses integrate AI into their products, inefficient prompts and bloated context windows quietly drain budgets. We help you get the same results for a fraction of the cost.\n\nOur token optimization service analyses your current AI implementation — prompts, system messages, conversation history management, retrieval strategies, and model selection — and identifies exactly where you're wasting tokens. We then redesign your prompting architecture to be leaner and more effective.\n\nClients typically see 40–70% reductions in token usage without any loss in output quality. We work with OpenAI, Anthropic Claude, Gemini, and open-source models. This service is ideal for SaaS products with AI features, internal tools using LLMs at scale, or any business with a growing AI API bill.",
                'sort_order'        => 6,
                'is_active'         => true,
            ],
            [
                'title'             => 'Prompt Engineering Training',
                'slug'              => 'prompt-engineering-training',
                'icon'              => 'code',
                'short_description' => 'Train your team to write better prompts and unlock the real potential of AI tools in your daily workflows.',
                'description'       => "Most people use AI tools at 20% of their capability because they don't know how to ask properly. Prompt engineering is a learnable skill — and teams that master it move significantly faster.\n\nOur training covers: the principles of effective prompting, chain-of-thought and few-shot techniques, system prompt design, context management, hallucination reduction, and practical workflows for developers, writers, analysts, and managers.\n\nSessions are delivered as live workshops (remote or on-site), recorded video courses, or written playbooks tailored to your team's specific tools and use cases. We don't teach theory for its own sake — every session is built around real tasks your team actually needs to do. Teams that complete our training typically report saving 2–4 hours per person per week.",
                'sort_order'        => 7,
                'is_active'         => true,
            ],
        ];

        // Clear old services before re-seeding with new ones
        Service::query()->delete();

        foreach ($services as $service) {
            Service::create($service);
        }
    }

    private function seedProjects(): void
    {
        $projects = [
            [
                'title'             => 'RetailPro E-Commerce Platform',
                'slug'              => 'retailpro-ecommerce-platform',
                'client'            => 'RetailMax Inc.',
                'short_description' => 'A full-featured e-commerce platform that tripled online revenue for a leading retail chain.',
                'description'       => 'RetailMax needed a modern, scalable e-commerce platform to replace their aging legacy system. We built a comprehensive solution featuring a fully customized storefront, advanced inventory management, multi-warehouse fulfillment, real-time analytics dashboards, and a seamless checkout experience optimized for mobile shoppers. The platform integrates with existing ERP and CRM systems, supports multiple payment gateways, and features a robust promotion and loyalty engine. Within six months of launch, RetailMax reported a 300% increase in online sales and a 45% improvement in cart conversion rates.',
                'tags'              => ['E-Commerce', 'Laravel', 'React', 'MySQL'],
                'is_featured'       => true,
                'is_active'         => true,
                'sort_order'        => 1,
            ],
            [
                'title'             => 'MedCare Hospital Management System',
                'slug'              => 'medcare-hospital-management-system',
                'client'            => 'City General Hospital',
                'short_description' => 'An integrated hospital management system streamlining patient care across 12 departments.',
                'description'       => 'City General Hospital was struggling with disconnected paper-based and siloed digital systems that caused delays in patient care and administrative bottlenecks. We designed and built a comprehensive hospital management system that unifies patient registration, appointment scheduling, electronic health records, pharmacy management, lab results, billing, and insurance claims processing into a single integrated platform. The system is HIPAA-compliant, supports role-based access control for clinical and administrative staff, and includes a patient portal for appointment booking and health record access. The result was a 60% reduction in administrative processing time and measurably improved patient satisfaction scores.',
                'tags'              => ['Healthcare', 'PHP', 'Vue.js'],
                'is_featured'       => true,
                'is_active'         => true,
                'sort_order'        => 2,
            ],
            [
                'title'             => 'EduLearn Online Learning Platform',
                'slug'              => 'edulearn-online-learning-platform',
                'client'            => 'EduTech Solutions',
                'short_description' => 'A scalable LMS platform delivering interactive courses to over 50,000 learners worldwide.',
                'description'       => 'EduTech Solutions wanted to build a next-generation online learning platform that would stand out in the crowded EdTech market. We developed EduLearn from the ground up — a feature-rich LMS supporting video courses, live sessions, interactive quizzes, coding sandboxes, peer collaboration tools, and gamified progress tracking. The platform includes a powerful course creation studio for instructors, detailed analytics for administrators, and a subscription billing system with multiple pricing tiers. Since launch, the platform has onboarded over 500 instructors and enrolled more than 50,000 learners across 40 countries.',
                'tags'              => ['Education', 'Node.js', 'React'],
                'is_featured'       => true,
                'is_active'         => true,
                'sort_order'        => 3,
            ],
            [
                'title'             => 'PropFinder Real Estate App',
                'slug'              => 'propfinder-real-estate-app',
                'client'            => 'PropertyPro Ltd.',
                'short_description' => 'A cross-platform real estate app connecting buyers, sellers, and agents in real time.',
                'description'       => 'PropertyPro wanted a modern alternative to traditional real estate listing platforms — something that felt native and personal. We built PropFinder, a Flutter-based cross-platform app for iOS and Android backed by a Laravel API. Key features include an AI-powered property recommendation engine, interactive map search with neighborhood insights, virtual tour integration, in-app messaging between buyers and agents, mortgage calculators, and a comprehensive agent CRM module. The app launched to strong reviews and has facilitated over 2,000 successful property transactions in its first year.',
                'tags'              => ['Real Estate', 'Flutter', 'Laravel'],
                'is_featured'       => false,
                'is_active'         => true,
                'sort_order'        => 4,
            ],
            [
                'title'             => 'FinDash Financial Dashboard',
                'slug'              => 'findash-financial-dashboard',
                'client'            => 'FinCorp International',
                'short_description' => 'A real-time financial analytics dashboard aggregating data from 15+ banking and trading APIs.',
                'description'       => 'FinCorp International needed a unified dashboard for their portfolio managers to monitor positions, risk exposure, and market conditions across multiple asset classes and trading platforms. We built FinDash — a high-performance React front end powered by a Python data processing backend that aggregates, normalizes, and streams data from 15+ financial data APIs in real time. The dashboard features customizable widget layouts, advanced charting, automated alert rules, compliance reporting, and role-based views for traders, analysts, and executives. Performance was a key priority; the system processes and displays over one million data points per minute without perceptible latency.',
                'tags'              => ['Finance', 'React', 'Python'],
                'is_featured'       => false,
                'is_active'         => true,
                'sort_order'        => 5,
            ],
            [
                'title'             => 'FoodHub Restaurant Management System',
                'slug'              => 'foodhub-restaurant-management-system',
                'client'            => 'Chain Restaurants Group',
                'short_description' => 'A centralized restaurant management platform managing 40+ locations with real-time insights.',
                'description'       => 'Chain Restaurants Group needed a single platform to manage operations across their 40+ restaurant locations, each with different menus, staffing levels, and inventory needs. We built FoodHub — a comprehensive restaurant management system featuring a digital POS with table management, centralized menu management with location-level overrides, inventory and supplier management, staff scheduling, and a customer loyalty program. A real-time operations dashboard gives head-office teams full visibility across all locations. The system has reduced food waste by 22% and improved table turnover rates by 18% since deployment.',
                'tags'              => ['Laravel', 'Vue.js', 'MySQL'],
                'is_featured'       => false,
                'is_active'         => true,
                'sort_order'        => 6,
            ],
        ];

        foreach ($projects as $project) {
            Project::updateOrCreate(['slug' => $project['slug']], $project);
        }
    }

    private function seedTeamMembers(): void
    {
        TeamMember::query()->delete();

        TeamMember::create([
            'name'         => 'Raj Thakkar',
            'role'         => 'Founder & Solution Architect',
            'bio'          => 'I founded GoldenCreeper to offer something the market was missing: direct access to senior-level code quality without agency overhead. I work hands-on with every client across the full stack — from writing source code on demand and reviewing existing codebases, to leading teams as a fractional tech lead and training developers in prompt engineering and AI optimization. Based in India, working globally.',
            'social_links' => ['linkedin' => '#', 'twitter' => '#', 'github' => '#'],
            'sort_order'   => 1,
            'is_active'    => true,
        ]);

        TeamMember::create([
            'name'         => 'Ravi Thakkar',
            'role'         => 'Co-Founder & Product Owner — E-Commerce',
            'bio'          => 'Ravi co-founded GoldenCreeper and leads the e-commerce product vision. He brings deep domain expertise in online retail, product strategy, and customer experience — bridging the gap between business goals and technical execution to ensure every e-commerce solution we deliver drives real commercial results.',
            'social_links' => ['linkedin' => '#', 'twitter' => '#'],
            'sort_order'   => 2,
            'is_active'    => true,
        ]);
    }

    private function seedBlogPosts(): void
    {
        $posts = [
            [
                'title'        => 'How We Helped RetailMax Increase Online Sales by 300%',
                'slug'         => 'how-we-helped-retailmax-increase-online-sales-by-300-percent',
                'category'     => 'Case Study',
                'author'       => 'James Anderson',
                'excerpt'      => 'When RetailMax came to us, their e-commerce conversion rate was sitting at a dismal 0.8% and their legacy platform was costing them more in maintenance than it generated in revenue. Twelve months later, they\'re celebrating a 300% increase in online sales and a 4.2% conversion rate that beats the industry average.',
                'content'      => "<p>When RetailMax first reached out to GoldenCreeper, they were at a crossroads. Their decade-old e-commerce platform had become a liability — slow to load, impossible to customize, and hemorrhaging sales to more agile competitors. Their internal IT team was spending 70% of their time fighting fires rather than building new capabilities. Something had to change.</p>\n\n<p>Our engagement began with a two-week discovery phase. We audited the existing platform, interviewed key stakeholders across merchandising, logistics, and customer service, and analyzed three years of behavioral data from Google Analytics. What we found was illuminating: 68% of visitors were abandoning carts, primarily due to a clunky checkout process that required account creation and averaged 12 steps from product page to order confirmation. Mobile users — who represented 61% of traffic — faced an even worse experience on the legacy system.</p>\n\n<p>Armed with these insights, our team designed and built a modern Laravel and React e-commerce platform from scratch. We prioritized a guest checkout flow that reduced steps to just four, implemented a mobile-first responsive design, added real-time inventory visibility, and built a personalization engine that surfaces relevant products based on browsing history and purchase patterns. We also overhauled the product discovery experience with faceted search powered by Elasticsearch, making it dramatically easier for shoppers to find exactly what they were looking for.</p>\n\n<p>The results exceeded even our most optimistic projections. Within three months of launch, RetailMax\'s conversion rate climbed from 0.8% to 2.9%. By the six-month mark, it had reached 4.2% — well above the 2.5–3% industry benchmark for retail e-commerce. Annual online revenue tripled, and customer support tickets related to website issues dropped by 80%. RetailMax\'s internal team, freed from constant maintenance burdens, has since launched four new product campaigns that would have been impossible on the old platform.</p>",
                'is_published' => true,
                'published_at' => now()->subDays(5),
            ],
            [
                'title'        => 'The Future of Healthcare Technology: Trends to Watch in 2025',
                'slug'         => 'future-of-healthcare-technology-trends-2025',
                'category'     => 'Technology',
                'author'       => 'Sarah Chen',
                'excerpt'      => 'Healthcare is undergoing a profound digital transformation, driven by AI diagnostics, interoperable health records, and patient-centric mobile experiences. For technology leaders in the sector, understanding where the industry is heading is essential to making the right investment decisions today.',
                'content'      => "<p>The healthcare industry is in the midst of its most significant technological revolution since the introduction of electronic health records. Driven by the convergence of artificial intelligence, ubiquitous mobile connectivity, and hard-won lessons from the COVID-19 pandemic, 2025 is shaping up to be a landmark year for digital health innovation. For CIOs and technology leaders in healthcare organizations, the challenge is no longer whether to embrace these technologies, but how to prioritize and implement them responsibly.</p>\n\n<p>Artificial intelligence is perhaps the most transformative force in healthcare technology right now. Machine learning models trained on vast datasets of medical imaging are now matching or surpassing radiologist accuracy in detecting certain cancers and abnormalities. Natural language processing is being used to automate clinical documentation, freeing physicians from the administrative burden that contributes heavily to burnout. Predictive analytics systems can now identify patients at high risk of readmission or deterioration days before clinical signs become apparent, enabling proactive intervention. Healthcare organizations that have invested in clean, structured data infrastructure are already seeing ROI from these AI applications.</p>\n\n<p>Interoperability remains a critical challenge and a major area of investment. The shift toward FHIR-based APIs and the HL7 standard is enabling health systems to finally break down the data silos that have long fragmented patient care. Patients increasingly expect their health information to flow seamlessly between their primary care physician, specialists, labs, pharmacies, and insurance providers — and the technology to make this possible is finally maturing. For healthcare software vendors, building with interoperability as a first-class concern is no longer optional.</p>\n\n<p>Looking ahead to the remainder of 2025, we expect to see significant growth in remote patient monitoring, telehealth integration with traditional care pathways, and the use of digital therapeutics as adjuncts to conventional treatment. Organizations that approach these trends not as isolated technology projects but as components of a coherent digital health strategy will be best positioned to deliver better patient outcomes while managing costs. At GoldenCreeper, we are proud to be building the infrastructure that makes this future possible.</p>",
                'is_published' => true,
                'published_at' => now()->subDays(12),
            ],
            [
                'title'        => 'Why Laravel Is Still the Best PHP Framework for Enterprise in 2025',
                'slug'         => 'why-laravel-is-best-php-framework-for-enterprise-2025',
                'category'     => 'Development',
                'author'       => 'Maya Patel',
                'excerpt'      => 'With new JavaScript frameworks launching seemingly every month, it\'s easy to overlook the workhorse powering millions of production applications worldwide. Laravel continues to offer the best balance of developer productivity, ecosystem maturity, and long-term maintainability for enterprise PHP development.',
                'content'      => "<p>Every few months, the technology community declares a new framework as the next big thing. The noise can make it easy to overlook technologies that have quietly become the backbone of the modern web. Laravel, now in its twelfth major version, continues to be our go-to choice for enterprise web applications — and for good reason. After building dozens of production systems on the framework over the past several years, we've developed strong opinions about why it consistently outperforms the alternatives in real-world enterprise contexts.</p>\n\n<p>The developer experience in Laravel is genuinely unmatched in the PHP ecosystem. Eloquent ORM makes database interactions expressive and readable. The job queuing system, event broadcasting, and notification abstractions handle complex asynchronous workflows with elegant simplicity. Artisan, the CLI companion, provides a comprehensive toolkit for scaffolding, migrations, testing, and optimization. These aren't superficial conveniences — they translate directly into faster development cycles, fewer bugs, and code that new team members can understand and maintain without a steep learning curve.</p>\n\n<p>From an enterprise perspective, Laravel's approach to security is exemplary. It provides built-in protection against SQL injection, XSS, CSRF, and mass assignment vulnerabilities out of the box. The authentication and authorization systems are flexible enough to handle complex permission hierarchies without requiring external packages. Laravel Sanctum and Passport provide first-class solutions for API authentication, and the framework's testability — with comprehensive PHPUnit and Pest integration — makes it straightforward to maintain high test coverage as applications grow in complexity.</p>\n\n<p>The ecosystem and community surrounding Laravel are also important factors in our recommendation. Filament for admin panels, Livewire for reactive interfaces, and a rich library of first-party packages mean that common enterprise requirements rarely require building from scratch. The long-term support policy and Taylor Otwell's consistent, opinionated leadership of the project give us confidence that Laravel will continue to be a well-maintained, forward-looking framework for years to come. When clients ask us to recommend a technology stack for a new enterprise project, Laravel nearly always leads our proposal.</p>",
                'is_published' => true,
                'published_at' => now()->subDays(20),
            ],
            [
                'title'        => 'Mobile-First Design: Why Your Business Can\'t Afford to Ignore It',
                'slug'         => 'mobile-first-design-why-your-business-cant-afford-to-ignore-it',
                'category'     => 'Design',
                'author'       => 'Alex Thompson',
                'excerpt'      => 'With over 60% of global web traffic now coming from mobile devices, designing for desktop first and adapting for mobile as an afterthought is no longer just a UX mistake — it\'s a business risk that directly impacts revenue, search rankings, and customer retention.',
                'content'      => "<p>The statistics are no longer surprising, but they remain staggering: more than 60% of all global internet traffic originates from mobile devices, and in some industries and regions that figure exceeds 80%. Yet despite this reality, we still regularly encounter business websites and web applications that were clearly designed for a 1440-pixel desktop screen and reluctantly squeezed into mobile layouts as an afterthought. The consequences aren't just aesthetic — they're measurable in bounce rates, conversion losses, and SEO rankings.</p>\n\n<p>Mobile-first design is a philosophy, not just a technical approach. It means starting every design decision with the question: how does this work on a small touchscreen, on a potentially slow mobile connection, with a user who is likely distracted or on the move? When you answer that question first, you're forced to ruthlessly prioritize content and functionality. You discover what is truly essential to your users versus what is merely nice-to-have on a spacious desktop layout. The result is not just a better mobile experience — it's almost always a clearer, more focused experience across all screen sizes.</p>\n\n<p>From a purely business perspective, mobile-first design directly impacts revenue. Google's mobile-first indexing means your search engine rankings are determined by the quality of your mobile experience. A page that loads in 5 seconds on mobile instead of 2 seconds can reduce conversions by more than 20%, according to Google's own research. Users who have a poor mobile experience are 62% less likely to purchase from that business in the future, even if they later visit on desktop. These are not abstract UX metrics — they're directly tied to customer acquisition costs and lifetime value.</p>\n\n<p>At GoldenCreeper, we've made mobile-first design a non-negotiable part of our process. Every project begins with mobile wireframes, and our development standards require that all front-end components are built and tested on mobile breakpoints before desktop layouts are considered. The investments required to do this well — responsive design systems, performance budgets, touch interaction guidelines — pay for themselves many times over in the business outcomes our clients experience. If your current digital presence isn't delivering an exceptional mobile experience, it's time to treat it as the urgent priority it is.</p>",
                'is_published' => true,
                'published_at' => now()->subDays(30),
            ],
        ];

        foreach ($posts as $post) {
            BlogPost::updateOrCreate(['slug' => $post['slug']], $post);
        }
    }

    private function seedTestimonials(): void
    {
        $testimonials = [
            [
                'client_name'    => 'Robert Johnson',
                'client_role'    => 'CEO',
                'client_company' => 'RetailMax Inc.',
                'content'        => 'GoldenCreeper didn\'t just build us a new website — they transformed our entire online business. The platform they delivered is fast, beautiful, and has directly driven a 300% increase in our e-commerce revenue. Their team was communicative, deadline-focused, and genuinely invested in our success from day one.',
                'rating'         => 5,
                'is_active'      => true,
                'sort_order'     => 1,
            ],
            [
                'client_name'    => 'Dr. Patricia Lee',
                'client_role'    => 'Director of Operations',
                'client_company' => 'City General Hospital',
                'content'        => 'Implementing a new hospital management system is an enormous undertaking, and I was nervous about the disruption it might cause to our staff and patients. GoldenCreeper managed the transition with remarkable professionalism and sensitivity to our clinical environment. The system has cut our administrative overhead significantly and our staff adoption rate has been exceptional.',
                'rating'         => 5,
                'is_active'      => true,
                'sort_order'     => 2,
            ],
            [
                'client_name'    => 'Marcus Wong',
                'client_role'    => 'Founder',
                'client_company' => 'EduTech Solutions',
                'content'        => 'We came to GoldenCreeper with a vision and a tight budget. They helped us prioritize the features that would matter most to our learners, built a platform that could genuinely compete with much better-funded competitors, and delivered on time. Two years later, we have 50,000 active learners and an NPS score of 72. I cannot recommend them highly enough.',
                'rating'         => 5,
                'is_active'      => true,
                'sort_order'     => 3,
            ],
            [
                'client_name'    => 'Jennifer Davis',
                'client_role'    => 'CTO',
                'client_company' => 'PropertyPro Ltd.',
                'content'        => 'The technical quality of GoldenCreeper\'s work consistently impresses me. The PropFinder app they built for us is genuinely one of the best-engineered products I\'ve worked with in my career — the architecture is clean, the code is well-tested, and the performance is outstanding even as our user base has grown. They think like product engineers, not just developers.',
                'rating'         => 5,
                'is_active'      => true,
                'sort_order'     => 4,
            ],
        ];

        foreach ($testimonials as $testimonial) {
            Testimonial::updateOrCreate(
                ['client_name' => $testimonial['client_name'], 'client_company' => $testimonial['client_company']],
                $testimonial
            );
        }
    }

    private function seedFaqs(): void
    {
        $faqs = [
            // General
            [
                'question'   => 'How long does a typical software project take?',
                'answer'     => 'Project timelines vary significantly based on scope and complexity. A simple marketing website might take 4–6 weeks, while a complex enterprise application could take 6–12 months. During our initial discovery phase, we provide a detailed project plan with milestone dates. We are transparent about what affects timelines and communicate proactively if anything changes.',
                'category'   => 'General',
                'sort_order' => 1,
                'is_active'  => true,
            ],
            [
                'question'   => 'What industries do you work with?',
                'answer'     => 'We have delivered projects across a wide range of industries including retail and e-commerce, healthcare and life sciences, education and e-learning, real estate, finance and fintech, food and hospitality, logistics, and professional services. Our team\'s diverse experience means we bring relevant domain knowledge and best practices to every engagement, regardless of sector.',
                'category'   => 'General',
                'sort_order' => 2,
                'is_active'  => true,
            ],
            [
                'question'   => 'Do you provide support and maintenance after the project launches?',
                'answer'     => 'Absolutely. We offer flexible post-launch support and maintenance packages tailored to your needs. These range from basic bug-fix SLAs to fully managed service agreements that include proactive monitoring, security updates, performance optimization, and ongoing feature development. We view our client relationships as long-term partnerships, not one-off transactions.',
                'category'   => 'General',
                'sort_order' => 3,
                'is_active'  => true,
            ],
            // Pricing
            [
                'question'   => 'How much does a software project cost?',
                'answer'     => 'Project costs depend on scope, complexity, and the technologies involved. A straightforward marketing website typically starts at $8,000–$15,000, while a custom web or mobile application generally ranges from $25,000 to $150,000+. We provide detailed, itemized estimates after our discovery phase so you know exactly what you\'re paying for. We never surprise clients with hidden costs.',
                'category'   => 'Pricing',
                'sort_order' => 4,
                'is_active'  => true,
            ],
            [
                'question'   => 'Do you offer fixed-price or time-and-materials billing?',
                'answer'     => 'We offer both models depending on what suits your project best. Fixed-price contracts work well for projects with clearly defined requirements and scope. Time-and-materials billing is better suited to projects where requirements are likely to evolve, or where you want maximum flexibility to adapt the product as you learn from user feedback. We\'ll recommend the model that best aligns with your situation.',
                'category'   => 'Pricing',
                'sort_order' => 5,
                'is_active'  => true,
            ],
            [
                'question'   => 'What does the payment structure look like?',
                'answer'     => 'For fixed-price projects, we typically structure payments in three milestones: 30% at project kickoff, 40% at design/development midpoint, and 30% upon final delivery and acceptance. For time-and-materials engagements, we invoice monthly based on hours worked. We accept bank transfers, credit cards, and ACH payments. All payment terms are clearly outlined in your project agreement.',
                'category'   => 'Pricing',
                'sort_order' => 6,
                'is_active'  => true,
            ],
            // Process
            [
                'question'   => 'What is your development process?',
                'answer'     => 'We follow an agile development methodology adapted for client collaboration. Every project begins with a discovery phase covering requirements gathering, technical architecture, and UX research. We then move into iterative two-week development sprints, with a working demonstration at the end of each sprint so you can see real progress and provide feedback continuously. This is followed by a dedicated QA and testing phase before final deployment.',
                'category'   => 'Process',
                'sort_order' => 7,
                'is_active'  => true,
            ],
            [
                'question'   => 'How often will I receive updates on my project?',
                'answer'     => 'Communication is a cornerstone of how we work. You\'ll have access to a dedicated project manager as your primary point of contact. We hold a weekly status call to review progress, discuss upcoming work, and address any questions. You\'ll also receive written progress updates each Friday, access to a shared project management board (we use Jira or Linear), and you can reach your project manager via Slack on any business day.',
                'category'   => 'Process',
                'sort_order' => 8,
                'is_active'  => true,
            ],
            [
                'question'   => 'What happens if our requirements change mid-project?',
                'answer'     => 'In our experience, requirements always evolve as a product comes to life — and that\'s perfectly normal. We manage scope changes through a transparent change request process. When a new requirement is identified, we assess the impact on timeline and budget, provide you with a written change order, and only proceed with your approval. Our agile process gives us the flexibility to accommodate many changes without derailing the overall project.',
                'category'   => 'Process',
                'sort_order' => 9,
                'is_active'  => true,
            ],
        ];

        foreach ($faqs as $faq) {
            Faq::updateOrCreate(['question' => $faq['question']], $faq);
        }
    }

    private function seedJobPostings(): void
    {
        $jobs = [
            [
                'title'             => 'Senior Laravel/PHP Developer',
                'department'        => 'Engineering',
                'location'          => 'Remote',
                'type'              => 'Full-time',
                'short_description' => 'We\'re looking for an experienced Laravel developer to lead back-end development on complex client projects and help shape our engineering standards.',
                'description'       => "<p>We are looking for a Senior Laravel/PHP Developer to join our growing engineering team. In this role, you will be a technical lead on complex client projects, responsible for back-end architecture decisions, code quality, and mentoring junior developers.</p>\n\n<h3>What You'll Do</h3>\n<ul>\n<li>Design and build scalable back-end systems using Laravel and PHP 8.x</li>\n<li>Architect database schemas and write optimized Eloquent queries</li>\n<li>Integrate with third-party APIs and services</li>\n<li>Conduct code reviews and uphold engineering standards</li>\n<li>Collaborate with front-end developers, designers, and project managers</li>\n<li>Mentor junior and mid-level developers</li>\n</ul>\n\n<h3>What You Bring</h3>\n<ul>\n<li>5+ years of PHP development experience, with at least 3 years using Laravel</li>\n<li>Deep understanding of MVC architecture, SOLID principles, and design patterns</li>\n<li>Proficiency with MySQL/PostgreSQL, Redis, and queue systems</li>\n<li>Experience with RESTful API design and authentication (Sanctum/Passport)</li>\n<li>Strong Git workflow practices and familiarity with CI/CD pipelines</li>\n<li>Excellent written and verbal communication skills</li>\n</ul>",
                'is_active'         => true,
            ],
            [
                'title'             => 'React/Next.js Frontend Developer',
                'department'        => 'Engineering',
                'location'          => 'Hybrid',
                'type'              => 'Full-time',
                'short_description' => 'Join our front-end team to build fast, accessible, and beautiful user interfaces for our clients\' web applications using React and Next.js.',
                'description'       => "<p>We are seeking a talented React/Next.js Frontend Developer to join our engineering team. You\'ll be building high-performance, accessible front-end experiences for a diverse range of client projects, from marketing sites to complex web applications.</p>\n\n<h3>What You'll Do</h3>\n<ul>\n<li>Build responsive, accessible React and Next.js applications</li>\n<li>Translate UI/UX designs into pixel-perfect, interactive interfaces</li>\n<li>Integrate with RESTful and GraphQL APIs</li>\n<li>Write clean, well-tested front-end code using Jest and React Testing Library</li>\n<li>Optimize applications for performance and Core Web Vitals</li>\n<li>Collaborate closely with our design and back-end teams</li>\n</ul>\n\n<h3>What You Bring</h3>\n<ul>\n<li>3+ years of experience with React.js in a professional setting</li>\n<li>Strong proficiency with TypeScript</li>\n<li>Experience with Next.js (App Router preferred), Tailwind CSS, and state management</li>\n<li>Understanding of web accessibility standards (WCAG 2.1)</li>\n<li>Familiarity with front-end build tools (Vite, Webpack)</li>\n<li>An eye for design and attention to UI detail</li>\n</ul>",
                'is_active'         => true,
            ],
            [
                'title'             => 'UI/UX Designer',
                'department'        => 'Design',
                'location'          => 'Remote',
                'type'              => 'Full-time',
                'short_description' => 'We\'re looking for a product-minded UI/UX Designer to lead design on client projects, from user research and wireframing through to polished, developer-ready UI.',
                'description'       => "<p>We are hiring a UI/UX Designer to join our design practice at GoldenCreeper. You will own the design process on client projects end-to-end — from conducting user research and facilitating workshops through to delivering production-ready designs and component libraries.</p>\n\n<h3>What You'll Do</h3>\n<ul>\n<li>Lead UX research including user interviews, surveys, and usability testing</li>\n<li>Create user flows, wireframes, and interactive prototypes in Figma</li>\n<li>Design polished, pixel-perfect UI that balances aesthetics with usability</li>\n<li>Build and maintain design systems and component libraries</li>\n<li>Work closely with clients to iterate on designs based on feedback</li>\n<li>Collaborate with front-end developers to ensure faithful implementation</li>\n</ul>\n\n<h3>What You Bring</h3>\n<ul>\n<li>3+ years of professional UI/UX design experience for digital products</li>\n<li>Expert-level proficiency in Figma</li>\n<li>A strong portfolio demonstrating both UX process and visual design quality</li>\n<li>Understanding of web and mobile design constraints and accessibility</li>\n<li>Excellent communication skills — you can articulate design decisions clearly</li>\n<li>Experience working within agile development teams</li>\n</ul>",
                'is_active'         => true,
            ],
            [
                'title'             => 'Digital Marketing Specialist',
                'department'        => 'Marketing',
                'location'          => 'San Francisco, CA',
                'type'              => 'Full-time',
                'short_description' => 'Help grow GoldenCreeper\'s brand and client pipeline through content marketing, SEO, paid campaigns, and social media strategy.',
                'description'       => "<p>We are looking for a Digital Marketing Specialist to join GoldenCreeper\'s growth team in San Francisco. You\'ll own our marketing channels and lead generation efforts, helping us build brand awareness and fill our project pipeline with high-quality leads.</p>\n\n<h3>What You'll Do</h3>\n<ul>\n<li>Develop and execute our content marketing strategy (blog, case studies, whitepapers)</li>\n<li>Manage and optimize SEO performance across our website and content assets</li>\n<li>Run paid advertising campaigns on Google Ads and LinkedIn</li>\n<li>Manage our social media presence and community engagement</li>\n<li>Track, report, and optimize marketing performance using GA4 and HubSpot</li>\n<li>Collaborate with our design team on marketing materials and landing pages</li>\n</ul>\n\n<h3>What You Bring</h3>\n<ul>\n<li>3+ years of digital marketing experience, ideally at a B2B technology company or agency</li>\n<li>Demonstrable experience with SEO, content marketing, and paid advertising</li>\n<li>Proficiency with GA4, Google Search Console, and a marketing automation platform</li>\n<li>Strong copywriting skills with the ability to translate technical concepts for a business audience</li>\n<li>Data-driven mindset with experience running A/B tests and reporting on marketing ROI</li>\n<li>Excellent organizational skills and ability to manage multiple projects simultaneously</li>\n</ul>",
                'is_active'         => true,
            ],
        ];

        foreach ($jobs as $job) {
            JobPosting::updateOrCreate(['title' => $job['title']], $job);
        }
    }
}
