<?php get_header(); ?>

<!-- ═══════════════════════════════════════
     SECTION 1: HERO
═══════════════════════════════════════ -->
<section class="hero-home" aria-label="Hero">
    <div class="container">
        <div class="hero-home-inner">

            <!-- Left: Content -->
            <div class="hero-home-content">
                <span class="eyebrow reveal">Hong Kong Single Family Office</span>
                <h1 class="reveal reveal-delay-1">Wealth Lineage,<br><em class="accent-gold">Our Legacy.</em></h1>
                <p class="reveal reveal-delay-2">MCM is a single family office focused on long-term capital allocation and strategic investments — including private equity, hedge funds, and other alternative assets. We work with external advisors across the fields we invest in.</p>
                <div class="btn-group reveal reveal-delay-3">
                    <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="btn btn-primary">Speak with our team</a>
                    <a href="<?php echo esc_url( home_url( '/about-us/' ) ); ?>" class="btn btn-ghost-dark">Learn our philosophy</a>
                </div>
            </div>

            <!-- Right: Visual Card -->
            <div class="hero-visual-card reveal reveal-delay-2">
                <img class="hero-skyline" src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/mcm_wealth_consultation.png" alt="MCM advisor meeting with a family client, reviewing a wealth management plan together" style="object-fit:cover; height:240px; border-radius:8px;">

                <div class="hero-info-strip">
                    <div class="hero-info-item">
                        <span class="value">Est.<br>2018</span>
                        <span class="label">Founded</span>
                    </div>
                    <div class="hero-info-item">
                        <span class="value">HK</span>
                        <span class="label">Single Family Office</span>
                    </div>
                    <div class="hero-info-item">
                        <span class="value" style="font-size:13px;line-height:1.4;">Long-term Capital<br>Allocation</span>
                        <span class="label">Our Philosophy</span>
                    </div>
                </div>
            </div><!-- .hero-visual-card -->

        </div>
    </div>
</section>


<!-- ═══════════════════════════════════════
     SECTION 2: WHO WE ARE
═══════════════════════════════════════ -->
<section class="section" aria-labelledby="who-we-are-heading">
    <div class="container">
        <div class="section-intro text-center reveal">
            <span class="eyebrow">Who Are We?</span>
            <h2 id="who-we-are-heading">Our unique approach goes beyond transactions</h2>
            <p>MCM is a single family office. We focus on long-term capital allocation and strategic investments — including private equity, hedge funds, and other alternative assets — working with external advisors in the fields mentioned. Rooted in integrity and trust, our values guide our family with the same strength as our wealth.</p>
        </div>

        <div class="cards-3col">
            <div class="value-card reveal reveal-delay-1">
                <div class="value-card-badge">1</div>
                <h3>Family-Centric Vision</h3>
                <p>We strengthen lineage across generations, building structures and strategies that endure beyond any single market cycle or life event.</p>
            </div>
            <div class="value-card reveal reveal-delay-2">
                <div class="value-card-badge">2</div>
                <h3>Sharing Culture</h3>
                <p>We build community with other single family offices to share knowledge. We are not intermediaries — we share, we do not provide services.</p>
            </div>
            <div class="value-card reveal reveal-delay-3">
                <div class="value-card-badge">3</div>
                <h3>Partnership</h3>
                <p>We partner with external specialists — legal, tax, investment — and bring them together under one framework, ensuring transparency in every decision.</p>
            </div>
        </div>
    </div>
</section>


<!-- ═══════════════════════════════════════
     SECTION 2b: IN PRACTICE PHOTO STRIP
═══════════════════════════════════════ -->
<section class="section--alt photo-strip" aria-label="Our Practice in Action">
    <div class="container">
        <div class="section-intro text-center reveal" style="margin-bottom:40px;">
            <span class="eyebrow">In Practice</span>
            <h2>How we work with families</h2>
            <p>From portfolio analytics to estate planning, our team brings precision and care to every conversation.</p>
        </div>
        <div class="photo-bento reveal reveal-delay-1">
            <div class="photo-bento-main">
                <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/mcm_portfolio_analytics.png" alt="MCM advisors reviewing portfolio performance and tax-efficient growth on a large analytics screen">
                <div class="photo-caption">Portfolio Analytics &amp; Performance Review</div>
            </div>
            <div class="photo-bento-side">
                <div class="photo-bento-item reveal reveal-delay-2">
                    <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/mcm_market_trends.png" alt="MCM advisors analysing market trends with Hong Kong skyline in the background">
                    <div class="photo-caption">Market Trend Analysis</div>
                </div>
                <div class="photo-bento-item reveal reveal-delay-3">
                    <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/mcm_advisor_client.png" alt="MCM advisor presenting a retirement and asset allocation plan to clients">
                    <div class="photo-caption">Retirement &amp; Allocation Planning</div>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- ═══════════════════════════════════════
     SECTION 3: STATS BAND
═══════════════════════════════════════ -->
<div class="stats-band" role="region" aria-label="Key facts">
    <div class="container">
        <div class="stats-band-grid">
            <div class="stat-item reveal">
                <span class="stat-value">12+</span>
                <span class="stat-label">Years Established</span>
            </div>
            <div class="stat-item reveal reveal-delay-1">
                <span class="stat-value">HK</span>
                <span class="stat-label">Single Family Office</span>
            </div>
            <div class="stat-item reveal reveal-delay-2">
                <span class="stat-value">100%</span>
                <span class="stat-label">Family-Focused</span>
            </div>
            <div class="stat-item reveal reveal-delay-3">
                <span class="stat-value">&#8734;</span>
                <span class="stat-label">Generational Vision</span>
            </div>
        </div>
    </div>
</div>


<!-- ═══════════════════════════════════════
     SECTION 3b: VIDEO FEATURE
═══════════════════════════════════════ -->
<section class="section video-feature" aria-labelledby="video-heading">
    <div class="container">
        <div class="section-intro text-center reveal" style="margin-bottom:40px;">
            <span class="eyebrow">Our Story</span>
            <h2 id="video-heading">The philosophy behind our family office</h2>
            <p>A brief look into how we think about wealth, legacy, and the long view — in our own words.</p>
        </div>
        <div class="video-wrap reveal reveal-delay-1" role="button" tabindex="0" aria-label="Play: Our Story — MCM Wealth Management">
            <div class="video-play-btn" aria-hidden="true">
                <svg viewBox="0 0 80 80" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <circle cx="40" cy="40" r="38" stroke="currentColor" stroke-width="2"/>
                    <polygon points="32,24 58,40 32,56" fill="currentColor"/>
                </svg>
            </div>
            <div class="video-caption">
                <span class="eyebrow">Watch</span>
                <p>Wealth Lineage · Our Legacy</p>
            </div>
        </div>
    </div>
</section>


<!-- ═══════════════════════════════════════
     SECTION 4: CREDIBILITY
═══════════════════════════════════════ -->
<section class="section--dark" aria-labelledby="credibility-heading">
    <div class="container">
        <div class="credibility-inner">

            <!-- Left -->
            <div class="credibility-left reveal">
                <span class="eyebrow">Our Credibility</span>
                <h2 id="credibility-heading">Preserving, growing, and transitioning our family's capital across generations</h2>
                <div class="credibility-divider"></div>
                <p>We preserve, grow, and transition our family's capital across generations — with long-term discipline and strategic focus.</p>
                <div class="cred-photo-wrap reveal reveal-delay-1">
                    <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/mcm_market_trends.png" alt="MCM senior advisors reviewing market data against the Hong Kong skyline" class="cred-photo">
                </div>
            </div>

            <!-- Right: 3 mini cards -->
            <div class="credibility-cards reveal reveal-delay-2">
                <div class="cred-card">
                    <span class="tag">Preserve</span>
                    <h3>Family-Centric Vision</h3>
                    <p>We strengthen lineage across generations, ensuring our family's wealth and identity endure together.</p>
                </div>
                <div class="cred-card">
                    <span class="tag">Share</span>
                    <h3>Sharing Culture</h3>
                    <p>We build community with other single family offices to share knowledge — we are not intermediaries, we share.</p>
                </div>
                <div class="cred-card">
                    <span class="tag">Partner</span>
                    <h3>Partnership</h3>
                    <p>We partner with external specialists — legal, tax, investment — bringing them together under one coherent framework.</p>
                </div>
            </div>

        </div>
    </div>
</section>


<!-- ═══════════════════════════════════════
     SECTION 5: SERVICES PREVIEW
═══════════════════════════════════════ -->
<section class="section--alt" aria-labelledby="services-heading">
    <div class="container">
        <div class="section-header reveal">
            <div>
                <span class="eyebrow">Investment Focus</span>
                <h2 id="services-heading">Where we allocate our capital</h2>
            </div>
            <a href="<?php echo esc_url( home_url( '/services/' ) ); ?>" class="btn btn-ghost-pale">View investment focus</a>
        </div>

        <div class="services-grid">
            <div class="service-card reveal reveal-delay-1">
                <span class="service-card-number">01</span>
                <h3>Family Office Oversight</h3>
                <p>Long-term capital allocation, strategic investments, family wealth preservation, and multi-generational planning.</p>
            </div>
            <div class="service-card reveal reveal-delay-2">
                <span class="service-card-number">02</span>
                <h3>Wealth Coordination</h3>
                <p>Equities, bonds, fixed interest products, commodities, alternative investments (private equity, hedge funds), and property.</p>
            </div>
            <div class="service-card reveal reveal-delay-3">
                <span class="service-card-number">03</span>
                <h3>Estate &amp; Legacy</h3>
                <p>Estate and legacy strategies that safeguard assets, minimise risks, and ensure continuity of values across generations.</p>
            </div>
            <div class="service-card reveal reveal-delay-1">
                <span class="service-card-number">04</span>
                <h3>Business Succession Planning</h3>
                <p>Succession plans that protect business value, secure continuity, and prepare the next generation for success.</p>
            </div>
            <div class="service-card reveal reveal-delay-2">
                <span class="service-card-number">05</span>
                <h3>Tax Strategy</h3>
                <p>Optimising our tax arrangements with external cross-border tax advisors, to reduce liabilities and enhance efficiency.</p>
            </div>
            <div class="service-card service-card-bespoke reveal reveal-delay-3">
                <div class="bespoke-icon" aria-hidden="true">&#9670;</div>
                <h3>One Family. One Conversation.</h3>
                <p>We do not solicit external clients, but we welcome dialogue with like-minded families, advisors, and partners.</p>
                <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="btn btn-ghost">Get in touch</a>
            </div>
        </div>

    </div>
</section>


<!-- ═══════════════════════════════════════
     SECTION 6: CTA BAND
═══════════════════════════════════════ -->
<section class="cta-band" aria-labelledby="cta-heading">
    <!-- Decorative concentric circles -->
    <svg class="cta-band-circles" viewBox="0 0 700 700" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
        <circle cx="350" cy="350" r="100" stroke="#EAD9C8" stroke-width="1"/>
        <circle cx="350" cy="350" r="175" stroke="#EAD9C8" stroke-width="1"/>
        <circle cx="350" cy="350" r="250" stroke="#EAD9C8" stroke-width="1"/>
        <circle cx="350" cy="350" r="325" stroke="#EAD9C8" stroke-width="0.75"/>
        <circle cx="350" cy="350" r="340" stroke="#EAD9C8" stroke-width="0.5" stroke-dasharray="4 6"/>
    </svg>

    <div class="cta-band-content reveal">
        <span class="eyebrow">Begin the Conversation</span>
        <h2 id="cta-heading">One family. One conversation.</h2>
        <p>We are a single family office. We do not solicit external clients, but we welcome dialogue with like-minded families, advisors, and partners.</p>
        <div class="btn-group" style="justify-content:center;">
            <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="btn btn-primary">Start a conversation</a>
            <a href="<?php echo esc_url( home_url( '/services/' ) ); ?>" class="btn btn-ghost">Our investment focus</a>
        </div>
    </div>
</section>

<?php get_footer(); ?>
