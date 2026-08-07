<?php
/**
 * Template Name: About MCM
 */
get_header();
?>

<section class="page-hero" aria-labelledby="about-title">
    <div class="container page-hero-grid">
        <div class="page-hero-copy">
            <span class="eyebrow reveal" data-i18n="about.hero.eyebrow">About MCM</span>
            <h1 id="about-title" class="reveal reveal-delay-1" data-i18n="about.hero.title">One family office.<br><em class="accent-gold">One clear purpose.</em></h1>
            <p class="reveal reveal-delay-2" data-i18n="about.hero.body">Established in July 2018, MCM Wealth Management Limited is a Hong Kong single family office created to steward and invest its own family capital for the long term.</p>
        </div>
        <div class="page-hero-media reveal reveal-delay-2"><img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/mcm-stewardship.jpg' ); ?>" alt="A mature banyan tree and enduring architecture symbolising long-term stewardship" width="1536" height="1024"></div>
    </div>
</section>

<section class="section--white" aria-labelledby="about-identity-title">
    <div class="container identity-grid">
        <div class="identity-copy reveal">
            <span class="eyebrow" data-i18n="about.identity.eyebrow">Our identity</span>
            <h2 id="about-identity-title" data-i18n="about.identity.title">Private by structure.<br>Long-term by nature.</h2>
            <p data-i18n="about.identity.body1">MCM exists for one family. We allocate our own capital, coordinate independent expertise, and keep family purpose at the centre of decision-making.</p>
            <p data-i18n="about.identity.body2">Our website is an introduction to how we think and the conversations we welcome. It is not a catalogue of wealth-management services.</p>
        </div>
        <aside class="clarity-card reveal reveal-delay-1">
            <span class="eyebrow" data-i18n="about.clarity.eyebrow">What that means</span>
            <h3 data-i18n="about.clarity.title">Clear boundaries matter</h3>
            <ul class="clarity-list">
                <li data-i18n="about.clarity.1">We invest and steward our own family capital.</li>
                <li data-i18n="about.clarity.2">We do not sell advisory services or packaged solutions.</li>
                <li data-i18n="about.clarity.3">We are not an intermediary or a publicly offered investment fund.</li>
                <li data-i18n="about.clarity.4">We engage external specialists for our own needs where appropriate.</li>
            </ul>
        </aside>
    </div>
</section>

<section class="section" aria-labelledby="values-title">
    <div class="container">
        <div class="section-intro reveal"><span class="eyebrow" data-i18n="about.values.eyebrow">Our values</span><h2 id="values-title" data-i18n="about.values.title">The culture behind our decisions</h2><p data-i18n="about.values.body">Our philosophy combines family purpose with a culture of sharing and a willingness to collaborate with the right people.</p></div>
        <div class="values-grid">
            <article class="value-card reveal"><span class="card-index">01</span><h3 data-i18n="about.values.1.title">Family continuity</h3><p data-i18n="about.values.1.body">We think beyond individual transactions and market cycles, with attention to future generations.</p></article>
            <article class="value-card reveal reveal-delay-1"><span class="card-index">02</span><h3 data-i18n="about.values.2.title">Generous exchange</h3><p data-i18n="about.values.2.body">We believe relevant knowledge becomes more useful when trusted peers exchange it candidly.</p></article>
            <article class="value-card reveal reveal-delay-2"><span class="card-index">03</span><h3 data-i18n="about.values.3.title">Aligned partnership</h3><p data-i18n="about.values.3.body">We value capable partners who communicate clearly, act responsibly, and take a long-term view.</p></article>
        </div>
    </div>
</section>

<section class="quote-band" aria-label="MCM philosophy">
    <div class="container reveal">
        <span class="eyebrow" data-i18n="about.quote.eyebrow">Our philosophy</span>
        <blockquote data-i18n="about.quote.text">“Sharing sharpens perspective. Partnership expands possibility. Family purpose keeps both grounded.”</blockquote>
        <p data-i18n="about.quote.body">We welcome learning and collaboration while retaining independent judgment and responsibility for every family decision.</p>
    </div>
</section>

<section class="section--white" aria-labelledby="decisions-title">
    <div class="container">
        <div class="section-heading reveal"><div><span class="eyebrow" data-i18n="about.decisions.eyebrow">How we think</span><h2 id="decisions-title" data-i18n="about.decisions.title">A disciplined decision rhythm</h2></div><p data-i18n="about.decisions.body">This describes how we approach our own mandate—not a client process or an external advisory offer.</p></div>
        <div class="decision-grid">
            <article class="decision-step reveal"><span class="number">01</span><h3 data-i18n="about.decisions.1.title">Observe</h3><p data-i18n="about.decisions.1.body">Build context, listen carefully, and form an independent view before acting.</p></article>
            <article class="decision-step reveal reveal-delay-1"><span class="number">02</span><h3 data-i18n="about.decisions.2.title">Assess</h3><p data-i18n="about.decisions.2.body">Consider alignment, downside, portfolio relevance, and the people behind the opportunity.</p></article>
            <article class="decision-step reveal reveal-delay-2"><span class="number">03</span><h3 data-i18n="about.decisions.3.title">Decide</h3><p data-i18n="about.decisions.3.body">Use clear family governance, appropriate expertise, and accountable judgment.</p></article>
            <article class="decision-step reveal reveal-delay-3"><span class="number">04</span><h3 data-i18n="about.decisions.4.title">Steward</h3><p data-i18n="about.decisions.4.body">Monitor, learn, and adapt with patience after capital has been committed.</p></article>
        </div>
    </div>
</section>

<section class="cta-band" aria-labelledby="about-cta-title">
    <div class="container cta-band-content reveal">
        <span class="eyebrow" data-i18n="about.cta.eyebrow">Exchange &amp; collaboration</span>
        <h2 id="about-cta-title" data-i18n="about.cta.title">We value thoughtful, relevant dialogue.</h2>
        <p data-i18n="about.cta.body">MCM welcomes introductions to investment opportunities, family-office peers, and specialists whose perspective may be mutually valuable.</p>
        <div class="btn-group"><a href="<?php echo esc_url( home_url( '/promotions/' ) ); ?>" class="btn btn-primary" data-i18n="nav.partnerships">Partnerships</a><a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="btn btn-secondary" data-i18n="nav.contact">Contact</a></div>
    </div>
</section>

<?php get_footer(); ?>
