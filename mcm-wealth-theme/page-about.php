<?php
/**
 * Template Name: About Us
 */
get_header();
?>

<!-- ═══════════════════════════════════════
     PAGE HERO
═══════════════════════════════════════ -->
<section class="hero-page" aria-label="About Us hero">
    <div class="container">
        <span class="eyebrow reveal">Hong Kong Single Family Office</span>
        <h1 class="reveal reveal-delay-1">Long-term capital allocation,<br><em class="accent-gold">our strategic focus.</em></h1>
        <p class="reveal reveal-delay-2">Established in July 2018, MCM Wealth Management Limited is a Hong Kong-based single family office built on the principle of long-term capital allocation and strategic investments.</p>
    </div>
</section>


<!-- ═══════════════════════════════════════
     WHO WE ARE — Mission / Vision / Promise
═══════════════════════════════════════ -->
<section class="section--white" aria-labelledby="about-mission-heading">
    <div class="container">
        <div class="section-intro text-center reveal">
            <span class="eyebrow">Who Are We?</span>
            <h2 id="about-mission-heading">A single family office, investing our own capital</h2>
            <p>MCM is a single family office. We focus on long-term capital allocation and strategic investments – including private equity, hedge funds, and other alternative assets. We work with external advisors in the fields mentioned.</p>
        </div>

        <div class="mission-cards">
            <div class="mission-card reveal reveal-delay-1">
                <div class="mission-icon" aria-hidden="true">&#9632;</div>
                <h3>Family-Centric Vision</h3>
                <p>We strengthen lineage across generations, putting our family's identity and continuity at the centre of every decision we make.</p>
            </div>
            <div class="mission-card reveal reveal-delay-2">
                <div class="mission-icon" aria-hidden="true">&#9651;</div>
                <h3>Sharing Culture <span style="font-size:14px; font-weight:400;">(Internal Focus)</span></h3>
                <p>We build community with other single family offices to share knowledge. We are not intermediaries — we share, we do not provide services.</p>
            </div>
            <div class="mission-card reveal reveal-delay-3">
                <div class="mission-icon" aria-hidden="true">&#10022;</div>
                <h3>Partnership <span style="font-size:14px; font-weight:400;">(External Focus)</span></h3>
                <p>We partner with external specialists — legal, tax, investment — and bring them together under one framework, ensuring transparency in every decision.</p>
            </div>
        </div>

        <p class="reveal" style="max-width:760px; margin:32px auto 0; text-align:center; color:var(--text-mid);">All to ensure transparency in every decision, guiding our family with values that endure as strongly as our wealth.</p>
    </div>
</section>


<!-- ═══════════════════════════════════════
     PHILOSOPHY
═══════════════════════════════════════ -->
<section class="philosophy-section" aria-labelledby="philosophy-heading">
    <div class="container">
        <span class="eyebrow reveal" style="color:var(--orange);">Our Philosophy</span>
        <blockquote class="philosophy-quote reveal reveal-delay-1" id="philosophy-heading">
            &#8220;A single family office focused on long-term capital allocation and strategic investments.&#8221;
        </blockquote>
        <p class="reveal reveal-delay-2">
            Established in July 2018, MCM Wealth Management Limited is a Hong Kong-based single family office. We invest our own capital. Our role is to coordinate our investment focus — including legacy estate, tax strategy, and business succession planning — by partnering with the right external advisors and bringing them together under one coherent framework. By building a network of trusted partners, we are committed to achieving our family's generational financial goals. Our direction and value lie in effective, efficient, and sustainable decision-making.
        </p>
    </div>
</section>


<!-- ═══════════════════════════════════════
     OUR APPROACH — 4-Step Process
═══════════════════════════════════════ -->
<section class="section--alt" aria-labelledby="approach-heading">
    <div class="container">
        <div class="section-intro text-center reveal">
            <span class="eyebrow">Our Approach</span>
            <h2 id="approach-heading">How we work with your family</h2>
            <p>A structured, four-stage process designed to understand your family deeply and build solutions that endure.</p>
        </div>

        <div class="approach-grid">
            <div class="approach-card reveal reveal-delay-1">
                <div class="approach-number">1</div>
                <h3>Understand</h3>
                <p>We begin with deep listening — learning your family's history, values, relationships, goals, and concerns before making any recommendation.</p>
            </div>
            <div class="approach-card reveal reveal-delay-2">
                <div class="approach-number">2</div>
                <h3>Design</h3>
                <p>We design a bespoke wealth coordination strategy that addresses your family's complete financial, legal, and personal landscape.</p>
            </div>
            <div class="approach-card reveal reveal-delay-3">
                <div class="approach-number">3</div>
                <h3>Coordinate</h3>
                <p>We bring together specialists across estate planning, tax strategy, investment coordination, and succession planning to execute your strategy.</p>
            </div>
            <div class="approach-card reveal reveal-delay-4">
                <div class="approach-number">4</div>
                <h3>Evolve</h3>
                <p>Wealth structures must adapt. We continuously review and evolve your plan as your family, the markets, and the regulatory landscape change.</p>
            </div>
        </div>
    </div>
</section>


<!-- ═══════════════════════════════════════
     CTA
═══════════════════════════════════════ -->
<section class="cta-band" aria-labelledby="about-cta-heading">
    <svg class="cta-band-circles" viewBox="0 0 700 700" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
        <circle cx="350" cy="350" r="100" stroke="#EAD9C8" stroke-width="1"/>
        <circle cx="350" cy="350" r="175" stroke="#EAD9C8" stroke-width="1"/>
        <circle cx="350" cy="350" r="250" stroke="#EAD9C8" stroke-width="1"/>
        <circle cx="350" cy="350" r="325" stroke="#EAD9C8" stroke-width="0.75"/>
    </svg>
    <div class="cta-band-content reveal">
        <span class="eyebrow">Begin the Conversation</span>
        <h2 id="about-cta-heading">One family. One conversation.</h2>
        <p>We are a single family office. We do not solicit external clients, but we welcome dialogue with like-minded families, advisors, and partners.</p>
        <div class="btn-group" style="justify-content:center;">
            <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="btn btn-primary">Start a conversation</a>
            <a href="<?php echo esc_url( home_url( '/services/' ) ); ?>" class="btn btn-ghost">Our investment focus</a>
        </div>
    </div>
</section>

<?php get_footer(); ?>
