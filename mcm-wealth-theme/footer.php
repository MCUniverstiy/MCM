</main>

<footer class="site-footer">
    <div class="container">
        <div class="footer-grid">
            <div class="footer-logo-col">
                <div class="footer-logo-brand">
                    <img class="logo-mark" src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/logo_icon.jpg' ); ?>" alt="" width="45" height="45" aria-hidden="true">
                    <span class="logo-text">
                        <span class="footer-logo-name">MCM Wealth</span>
                        <span class="footer-logo-sub">Management Limited</span>
                    </span>
                </div>
                <p class="footer-tagline" data-i18n="footer.tagline">Private family capital<br>Hong Kong Single Family Office<br>Established July 2018</p>
            </div>

            <div class="footer-col">
                <span class="footer-col-title" data-i18n="footer.explore">Explore</span>
                <nav class="footer-links" aria-label="<?php esc_attr_e( 'Footer company links', 'mcm-wealth-theme' ); ?>">
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" data-i18n="nav.home">Home</a>
                    <a href="<?php echo esc_url( home_url( '/about-us/' ) ); ?>" data-i18n="nav.about">About</a>
                    <a href="<?php echo esc_url( home_url( '/investment-approach/' ) ); ?>" data-i18n="nav.approach">Investment Approach</a>
                    <a href="<?php echo esc_url( home_url( '/perspectives/' ) ); ?>" data-i18n="nav.partnerships">Perspectives</a>
                    <a href="<?php echo esc_url( home_url( '/privacy/' ) ); ?>">Privacy</a>
                </nav>
            </div>

            <div class="footer-col">
                <span class="footer-col-title" data-i18n="footer.perspective">Our Perspective</span>
                <nav class="footer-links" aria-label="<?php esc_attr_e( 'Investment approach links', 'mcm-wealth-theme' ); ?>">
                    <a href="<?php echo esc_url( home_url( '/investment-approach/' ) ); ?>" data-i18n="focus.1.title">Family Office Stewardship</a>
                    <a href="<?php echo esc_url( home_url( '/investment-approach/' ) ); ?>" data-i18n="focus.2.title">Capital Allocation</a>
                    <a href="<?php echo esc_url( home_url( '/investment-approach/' ) ); ?>" data-i18n="focus.3.title">Legacy &amp; Continuity</a>
                    <a href="<?php echo esc_url( home_url( '/investment-approach/' ) ); ?>" data-i18n="focus.4.title">Enterprise Perspective</a>
                    <a href="<?php echo esc_url( home_url( '/investment-approach/' ) ); ?>" data-i18n="focus.5.title">Specialist Coordination</a>
                </nav>
            </div>

            <div class="footer-col">
                <span class="footer-col-title" data-i18n="footer.contact">Contact</span>
                <div class="footer-contact-items">
                    <div class="footer-contact-item"><span class="flabel" data-i18n="footer.location">Location</span><span class="fvalue" data-i18n="footer.location_value">Hong Kong SAR</span></div>
                    <div class="footer-contact-item"><span class="flabel" data-i18n="footer.email">Email</span><span class="fvalue"><a href="mailto:info@mwealth.online">info@mwealth.online</a></span></div>
                    <div class="footer-contact-item"><span class="flabel" data-i18n="footer.phone">Phone</span><span class="fvalue"><a href="tel:+85231052028">3105&nbsp;2028</a></span></div>
                </div>
            </div>
        </div>

        <div class="footer-bottom">
            <p class="copyright" data-i18n="footer.copyright">&copy; <?php echo esc_html( wp_date( 'Y' ) ); ?> MCM Wealth Management Limited. All rights reserved.</p>
            <p class="disclaimer" data-i18n="footer.disclaimer">MCM is a single family office investing its own capital. This website is for general information only and is not an offer, solicitation, recommendation, or investment, legal, or tax advice.</p>
        </div>
    </div>
</footer>

<button class="back-to-top" id="mcm-top" type="button" aria-label="<?php esc_attr_e( 'Back to top', 'mcm-wealth-theme' ); ?>">
    <svg width="17" height="17" viewBox="0 0 18 18" fill="none" aria-hidden="true"><path d="M3 12.5 9 6l6 6.5" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg>
</button>

<?php wp_footer(); ?>
</body>
</html>
