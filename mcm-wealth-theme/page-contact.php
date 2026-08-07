<?php
/**
 * Template Name: Contact
 */
get_header();

/* ── Contact form processing ── */
$form_sent   = false;
$form_error  = '';
$form_fields = [ 'name' => '', 'email' => '', 'phone' => '', 'message' => '' ];

if ( isset( $_POST['mcm_contact_submit'] ) ) {
    if ( ! isset( $_POST['mcm_nonce'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['mcm_nonce'] ) ), MCM_CONTACT_NONCE ) ) {
        $form_error = 'Security check failed. Please refresh the page and try again.';
    } elseif ( ! empty( $_POST['mcm_honeypot'] ) ) {
        /* Honeypot triggered — silently succeed */
        $form_sent = true;
    } else {
        $name    = sanitize_text_field( wp_unslash( $_POST['mcm_name']    ?? '' ) );
        $email   = sanitize_email(       wp_unslash( $_POST['mcm_email']   ?? '' ) );
        $phone   = sanitize_text_field( wp_unslash( $_POST['mcm_phone']   ?? '' ) );
        $message = sanitize_textarea_field( wp_unslash( $_POST['mcm_message'] ?? '' ) );

        if ( empty( $name ) ) {
            $form_error = 'Please enter your full name.';
        } elseif ( ! is_email( $email ) ) {
            $form_error = 'Please enter a valid email address.';
        } elseif ( empty( $message ) ) {
            $form_error = 'Please enter a message.';
        } else {
            $to      = 'info@mwealth.online';
            $subject = 'Website enquiry from ' . $name;
            $body    = "Name: {$name}\nEmail: {$email}\nPhone: {$phone}\n\nMessage:\n{$message}";
            $headers = [ 'Content-Type: text/plain; charset=UTF-8', 'From: ' . $name . ' <' . $email . '>' ];

            $sent = wp_mail( $to, $subject, $body, $headers );
            if ( $sent ) {
                $form_sent = true;
            } else {
                $form_error = 'We could not send your message right now. Please email us directly at info@mwealth.online.';
            }
        }

        if ( $form_error ) {
            $form_fields = compact( 'name', 'email', 'phone', 'message' );
        }
    }
}
?>

<!-- ═══════════════════════════════════════
     PAGE HERO
═══════════════════════════════════════ -->
<section class="hero-page" aria-label="Contact hero">
    <div class="container">
        <span class="eyebrow reveal">One Family. One Conversation.</span>
        <h1 class="reveal reveal-delay-1">Let's talk —<br><em class="accent-gold">family to family.</em></h1>
        <p class="reveal reveal-delay-2">We are a single family office. We do not solicit external clients, but we welcome dialogue with like-minded families, advisors, and partners. Every conversation is held in complete confidence.</p>
    </div>
</section>


<!-- ═══════════════════════════════════════
     CONTACT LAYOUT
═══════════════════════════════════════ -->
<section class="section--white" aria-label="Contact information and form">
    <div class="container">
        <div class="contact-layout">

            <!-- Left: Details + Form -->
            <div>
                <!-- Contact Details -->
                <div class="contact-details reveal">
                    <h2 style="margin-bottom:32px; font-size:28px;">Contact details</h2>

                    <div class="contact-detail-item">
                        <div class="contact-icon" aria-hidden="true">&#9678;</div>
                        <div class="contact-detail-text">
                            <span class="label">Location</span>
                            <span class="value">Hong Kong SAR</span>
                        </div>
                    </div>
                    <div class="contact-detail-item">
                        <div class="contact-icon" aria-hidden="true">&#9993;</div>
                        <div class="contact-detail-text">
                            <span class="label">Email</span>
                            <span class="value"><a href="mailto:info@mwealth.online" style="color:var(--orange);">info@mwealth.online</a></span>
                        </div>
                    </div>
                    <div class="contact-detail-item">
                        <div class="contact-icon" aria-hidden="true">&#9990;</div>
                        <div class="contact-detail-text">
                            <span class="label">Phone</span>
                            <span class="value">3105 2028</span>
                        </div>
                    </div>
                </div>

                <!-- Contact Form -->
                <div class="reveal">
                    <h2 style="margin-bottom:24px; font-size:28px;">Send us a message</h2>

                    <?php if ( $form_sent ) : ?>
                        <div class="form-success" role="alert">
                            Thank you for your message. A member of our team will respond within 24 hours.
                        </div>
                    <?php else : ?>

                        <?php if ( $form_error ) : ?>
                            <div class="form-error" role="alert"><?php echo esc_html( $form_error ); ?></div>
                        <?php endif; ?>

                        <form class="contact-form" method="post" action="<?php echo esc_url( get_permalink() ); ?>" novalidate>
                            <?php wp_nonce_field( MCM_CONTACT_NONCE, 'mcm_nonce' ); ?>

                            <!-- Honeypot -->
                            <div style="display:none;" aria-hidden="true">
                                <label for="mcm_honeypot">Leave this field blank</label>
                                <input type="text" id="mcm_honeypot" name="mcm_honeypot" tabindex="-1" autocomplete="off" value="">
                            </div>

                            <div class="form-row">
                                <div class="form-group">
                                    <label for="mcm_name">Full Name <span aria-hidden="true" style="color:var(--orange);">*</span></label>
                                    <input type="text" id="mcm_name" name="mcm_name" placeholder="Your full name" required autocomplete="name" value="<?php echo esc_attr( $form_fields['name'] ); ?>">
                                </div>
                                <div class="form-group">
                                    <label for="mcm_email">Email Address <span aria-hidden="true" style="color:var(--orange);">*</span></label>
                                    <input type="email" id="mcm_email" name="mcm_email" placeholder="your@email.com" required autocomplete="email" value="<?php echo esc_attr( $form_fields['email'] ); ?>">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="mcm_phone">Phone Number <span style="color:var(--text-muted); font-weight:400;">(optional)</span></label>
                                <input type="tel" id="mcm_phone" name="mcm_phone" placeholder="+852 XXXX XXXX" autocomplete="tel" value="<?php echo esc_attr( $form_fields['phone'] ); ?>">
                            </div>

                            <div class="form-group">
                                <label for="mcm_message">Your Message <span aria-hidden="true" style="color:var(--orange);">*</span></label>
                                <textarea id="mcm_message" name="mcm_message" placeholder="Tell us about your family's wealth management needs…" required><?php echo esc_textarea( $form_fields['message'] ); ?></textarea>
                            </div>

                            <div class="form-submit">
                                <button type="submit" name="mcm_contact_submit" class="btn btn-primary">Send message &rarr;</button>
                                <p class="form-notice">Your information is handled in strict confidence and will never be shared with third parties.</p>
                            </div>
                        </form>

                    <?php endif; ?>
                </div>
            </div><!-- Left col -->

            <!-- Right: Info Panel -->
            <div class="contact-panel reveal reveal-delay-2">
                <h3>What to expect</h3>

                <ul class="expect-list">
                    <li class="expect-item">
                        <div class="expect-icon" aria-hidden="true">&#9632;</div>
                        <div>
                            <strong>Completely confidential</strong>
                            <span>Everything you share with us stays between us. We operate under strict confidentiality in all client interactions.</span>
                        </div>
                    </li>
                    <li class="expect-item">
                        <div class="expect-icon" aria-hidden="true">&#9651;</div>
                        <div>
                            <strong>No obligation</strong>
                            <span>An initial conversation is exactly that — a conversation. There is no commitment required to speak with our team.</span>
                        </div>
                    </li>
                    <li class="expect-item">
                        <div class="expect-icon" aria-hidden="true">&#8635;</div>
                        <div>
                            <strong>Response within 24 hours</strong>
                            <span>A senior member of our team will respond to your enquiry within one business day.</span>
                        </div>
                    </li>
                </ul>

                <div class="panel-divider"></div>

                <p class="panel-quote">&#8220;Wealth Lineage = Our Legacy&#8221;</p>
            </div>

        </div><!-- .contact-layout -->
    </div>
</section>


<!-- ═══════════════════════════════════════
     COMPLIANCE STRIP
═══════════════════════════════════════ -->
<div class="compliance-strip" role="complementary" aria-label="Legal disclaimer">
    <div class="container">
        <p>This website is for informational purposes only and does not constitute financial advice. Past performance is not indicative of future results. MCM Wealth Management Limited is incorporated in Hong Kong SAR.</p>
    </div>
</div>

<?php get_footer(); ?>
