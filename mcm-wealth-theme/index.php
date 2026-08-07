<?php get_header(); ?>

<section class="hero-home" aria-labelledby="home-title">
    <div class="container hero-home-inner">
        <div class="hero-home-content">
            <span class="eyebrow reveal" data-i18n="home.hero.eyebrow">Hong Kong Single Family Office</span>
            <h1 id="home-title" class="reveal reveal-delay-1" data-i18n="home.hero.title">Private capital.<br>Shared perspective.<br><em class="accent-gold">A long-term view.</em></h1>
            <p class="reveal reveal-delay-2" data-i18n="home.hero.body">MCM Wealth Management Limited is a single family office investing its own capital. We take a patient, independent approach and welcome relevant investment opportunities, knowledge exchange, and trusted collaboration.</p>
            <div class="btn-group reveal reveal-delay-3">
                <a href="<?php echo esc_url( home_url( '/services/' ) ); ?>" class="btn btn-primary" data-i18n="home.hero.cta1">Explore our approach</a>
                <a href="<?php echo esc_url( home_url( '/promotions/' ) ); ?>" class="btn btn-ghost-dark" data-i18n="home.hero.cta2">Share an opportunity</a>
            </div>
        </div>
        <div class="hero-visual-card reveal reveal-delay-2">
            <img class="hero-skyline" src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/mcm-harbour-horizon.jpg' ); ?>" alt="Victoria Harbour at first light framed by contemporary architecture" width="1536" height="1024">
            <div class="hero-info-strip" role="group" aria-label="MCM key facts">
                <div class="hero-info-item"><span class="value">2018</span><span class="label" data-i18n="home.fact.established">Established</span></div>
                <div class="hero-info-item"><span class="value" data-i18n="home.fact.hk">Hong Kong</span><span class="label" data-i18n="home.fact.base">Our base</span></div>
                <div class="hero-info-item"><span class="value" data-i18n="home.fact.own">Own capital</span><span class="label" data-i18n="home.fact.mandate">Family mandate</span></div>
            </div>
        </div>
    </div>
</section>

<section class="section--white" aria-labelledby="identity-title">
    <div class="container">
        <div class="section-heading reveal">
            <div><span class="eyebrow" data-i18n="home.identity.eyebrow">Who we are</span><h2 id="identity-title" data-i18n="home.identity.title">Built for one family.<br>Open to good ideas.</h2></div>
            <p data-i18n="home.identity.body">Our purpose is to steward family capital across generations. We are not an external wealth manager, intermediary, or package provider.</p>
        </div>
        <div class="principle-grid">
            <article class="principle-card reveal reveal-delay-1"><span class="card-index">01</span><h3 data-i18n="home.identity.1.title">Family-led purpose</h3><p data-i18n="home.identity.1.body">Family priorities, continuity, and accountability sit at the centre of our decisions.</p></article>
            <article class="principle-card reveal reveal-delay-2"><span class="card-index">02</span><h3 data-i18n="home.identity.2.title">A culture of sharing</h3><p data-i18n="home.identity.2.body">We exchange perspectives with other family offices and trusted peers. We share experience; we do not sell advice.</p></article>
            <article class="principle-card reveal reveal-delay-3"><span class="card-index">03</span><h3 data-i18n="home.identity.3.title">Selective partnership</h3><p data-i18n="home.identity.3.body">We welcome relevant opportunities and work with aligned founders, managers, co-investors, and independent specialists.</p></article>
        </div>
    </div>
</section>

<section class="section" aria-labelledby="perspective-title">
    <div class="container">
        <div class="section-intro reveal"><span class="eyebrow" data-i18n="home.perspective.eyebrow">Our perspective</span><h2 id="perspective-title" data-i18n="home.perspective.title">Patient thinking, strengthened through exchange</h2><p data-i18n="home.perspective.body">We pair independent judgment with curiosity—looking beyond short-term noise while remaining open to people and ideas that expand our view.</p></div>
        <div class="editorial-grid">
            <figure class="editorial-main reveal"><img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/mcm-capital-allocation.jpg' ); ?>" alt="Interlocking stone terraces and pathways representing balanced capital allocation" width="1536" height="1024" loading="lazy"><figcaption class="editorial-caption"><strong data-i18n="home.perspective.1.title">Allocate with intent</strong><span data-i18n="home.perspective.1.body">Every opportunity is considered in the context of the whole family portfolio.</span></figcaption></figure>
            <div class="editorial-stack">
                <figure class="editorial-item reveal reveal-delay-1"><img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/mcm-shared-perspective.jpg' ); ?>" alt="A quiet round table prepared for a trusted exchange of ideas" width="1536" height="1024" loading="lazy"><figcaption class="editorial-caption"><strong data-i18n="home.perspective.2.title">Learn through exchange</strong><span data-i18n="home.perspective.2.body">Thoughtful dialogue can sharpen judgment without turning knowledge into a product.</span></figcaption></figure>
                <figure class="editorial-item reveal reveal-delay-2"><img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/mcm-enterprise.jpg' ); ?>" alt="A bridge connecting durable buildings above a garden" width="1536" height="1024" loading="lazy"><figcaption class="editorial-caption"><strong data-i18n="home.perspective.3.title">Partner selectively</strong><span data-i18n="home.perspective.3.body">Trust, alignment, and clarity matter as much as the opportunity itself.</span></figcaption></figure>
            </div>
        </div>
    </div>
</section>

<section class="fact-band" aria-label="MCM profile">
    <div class="container fact-grid">
        <div class="fact reveal"><strong>2018</strong><span data-i18n="home.band.1">Established in July</span></div>
        <div class="fact reveal reveal-delay-1"><strong>HK</strong><span data-i18n="home.band.2">Based in Hong Kong</span></div>
        <div class="fact reveal reveal-delay-2"><strong data-i18n="home.band.private">Private</strong><span data-i18n="home.band.3">Family capital</span></div>
        <div class="fact reveal reveal-delay-3"><strong data-i18n="home.band.long">Long term</strong><span data-i18n="home.band.4">Investment horizon</span></div>
    </div>
</section>

<section class="section--dark" aria-labelledby="philosophy-title">
    <div class="container split-feature">
        <div class="split-feature-media reveal"><img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/mcm-stewardship.jpg' ); ?>" alt="A mature banyan tree beside enduring contemporary architecture" width="1536" height="1024" loading="lazy"></div>
        <div class="split-feature-copy reveal reveal-delay-1">
            <span class="eyebrow" data-i18n="home.philosophy.eyebrow">Our philosophy</span>
            <h2 id="philosophy-title" data-i18n="home.philosophy.title">Our philosophy is not a product. It is a way of thinking.</h2>
            <p data-i18n="home.philosophy.body">We aim to preserve optionality, compound knowledge, and make decisions that remain sensible beyond a single cycle.</p>
            <div class="pillar-list">
                <div class="pillar"><span class="pillar-index">01</span><div><h3 data-i18n="home.philosophy.1.title">Preserve perspective</h3><p data-i18n="home.philosophy.1.body">A long horizon creates room for disciplined, considered decisions.</p></div></div>
                <div class="pillar"><span class="pillar-index">02</span><div><h3 data-i18n="home.philosophy.2.title">Keep learning</h3><p data-i18n="home.philosophy.2.body">We value candid exchange with people whose experience differs from our own.</p></div></div>
                <div class="pillar"><span class="pillar-index">03</span><div><h3 data-i18n="home.philosophy.3.title">Build trust over time</h3><p data-i18n="home.philosophy.3.body">The strongest partnerships are transparent, aligned, and allowed to mature.</p></div></div>
            </div>
        </div>
    </div>
</section>

<section class="section--white" aria-labelledby="focus-title">
    <div class="container">
        <div class="section-heading reveal"><div><span class="eyebrow" data-i18n="home.focus.eyebrow">Investment approach</span><h2 id="focus-title" data-i18n="home.focus.title">A connected view of family capital</h2></div><p data-i18n="home.focus.body">These are dimensions of our own family-office mandate—not services or packages offered to external clients.</p></div>
        <div class="focus-grid">
            <a class="focus-card reveal" href="<?php echo esc_url( home_url( '/services/' ) ); ?>"><span class="number">01</span><span class="arrow" aria-hidden="true">↗</span><h3 data-i18n="focus.1.title">Family Office Stewardship</h3><p data-i18n="focus.1.short">Coordinating our own family affairs, governance, and capital with a multi-generational view.</p></a>
            <a class="focus-card reveal reveal-delay-1" href="<?php echo esc_url( home_url( '/services/' ) ); ?>"><span class="number">02</span><span class="arrow" aria-hidden="true">↗</span><h3 data-i18n="focus.2.title">Capital Allocation</h3><p data-i18n="focus.2.short">Considering opportunities in the context of portfolio fit, risk, liquidity, and time horizon.</p></a>
            <a class="focus-card reveal" href="<?php echo esc_url( home_url( '/services/' ) ); ?>"><span class="number">03</span><span class="arrow" aria-hidden="true">↗</span><h3 data-i18n="focus.3.title">Legacy &amp; Continuity</h3><p data-i18n="focus.3.short">Supporting continuity of values, knowledge, and thoughtful decision-making across generations.</p></a>
            <a class="focus-card reveal reveal-delay-1" href="<?php echo esc_url( home_url( '/services/' ) ); ?>"><span class="number">04</span><span class="arrow" aria-hidden="true">↗</span><h3 data-i18n="focus.4.title">Enterprise Perspective</h3><p data-i18n="focus.4.short">Taking a patient view of durable businesses, private opportunities, and responsible value creation.</p></a>
            <a class="focus-card reveal" href="<?php echo esc_url( home_url( '/services/' ) ); ?>"><span class="number">05</span><span class="arrow" aria-hidden="true">↗</span><h3 data-i18n="focus.5.title">Specialist Coordination</h3><p data-i18n="focus.5.short">Engaging independent legal, tax, and investment expertise for our own family needs when appropriate.</p></a>
            <a class="focus-card focus-card--accent reveal reveal-delay-1" href="<?php echo esc_url( home_url( '/promotions/' ) ); ?>"><span class="number">06</span><span class="arrow" aria-hidden="true">↗</span><h3 data-i18n="home.focus.6.title">Opportunities &amp; partnerships</h3><p data-i18n="home.focus.6.body">We welcome relevant investment ideas, peer exchange, and collaboration grounded in mutual value.</p></a>
        </div>
    </div>
</section>

<section class="cta-band" aria-labelledby="home-cta-title">
    <div class="container cta-band-content reveal">
        <span class="eyebrow" data-i18n="cta.opportunity.eyebrow">Open to relevant ideas</span>
        <h2 id="home-cta-title" data-i18n="cta.opportunity.title">Have an opportunity or perspective worth sharing?</h2>
        <p data-i18n="cta.opportunity.body">We welcome concise introductions from family offices, founders, investment managers, co-investors, and specialist partners.</p>
        <div class="btn-group"><a href="<?php echo esc_url( home_url( '/promotions/' ) ); ?>" class="btn btn-primary" data-i18n="cta.opportunity.primary">How we collaborate</a><a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="btn btn-secondary" data-i18n="cta.opportunity.secondary">Contact MCM</a></div>
    </div>
</section>

<?php get_footer(); ?>
