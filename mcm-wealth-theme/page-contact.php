<?php
/**
 * Template Name: Contact
 */
get_header();

$form_sent   = false;
$form_error  = '';
$form_fields = [
    'name'     => '',
    'email'    => '',
    'interest' => '',
    'phone'    => '',
    'message'  => '',
];

$interest_options = [
    'investment-opportunity' => 'Investment opportunity',
    'family-office-exchange' => 'Family-office exchange',
    'specialist-collaboration' => 'Specialist collaboration',
    'general-enquiry' => 'General enquiry',
];

if ( isset( $_POST['mcm_contact_submit'] ) ) {
    if ( ! isset( $_POST['mcm_nonce'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['mcm_nonce'] ) ), MCM_CONTACT_NONCE ) ) {
        $form_error = 'Security check failed. Please refresh the page and try again.';
    } elseif ( ! empty( $_POST['mcm_honeypot'] ) ) {
        $form_sent = true;
    } else {
        $name     = sanitize_text_field( wp_unslash( $_POST['mcm_name'] ?? '' ) );
        $email    = sanitize_email( wp_unslash( $_POST['mcm_email'] ?? '' ) );
        $interest = sanitize_key( wp_unslash( $_POST['mcm_interest'] ?? '' ) );
        $phone    = sanitize_text_field( wp_unslash( $_POST['mcm_phone'] ?? '' ) );
        $message  = sanitize_textarea_field( wp_unslash( $_POST['mcm_message'] ?? '' ) );

        if ( empty( $name ) ) {
            $form_error = 'Please enter your full name.';
        } elseif ( ! is_email( $email ) ) {
            $form_error = 'Please enter a valid email address.';
        } elseif ( ! isset( $interest_options[ $interest ] ) ) {
            $form_error = 'Please choose a reason for contacting us.';
        } elseif ( empty( $message ) ) {
            $form_error = 'Please enter a message.';
        } else {
            $to            = 'info@mwealth.online';
            $interest_name = $interest_options[ $interest ];
            $subject       = sprintf( 'Website enquiry: %s — %s', $interest_name, $name );
            $body          = "Name: {$name}\nEmail: {$email}\nPhone: {$phone}\nReason: {$interest_name}\n\nMessage:\n{$message}";
            $headers       = [
                'Content-Type: text/plain; charset=UTF-8',
                'Reply-To: ' . $name . ' <' . $email . '>',
            ];

            if ( wp_mail( $to, $subject, $body, $headers ) ) {
                $form_sent = true;
            } else {
                $form_error = 'We could not send your message right now. Please email us directly at info@mwealth.online.';
            }
        }

        if ( $form_error ) {
            $form_fields = compact( 'name', 'email', 'interest', 'phone', 'message' );
        }
    }
}
?>

<section class="page-hero" aria-labelledby="contact-title">
    <div class="container">
        <span class="eyebrow reveal" data-i18n="contact.hero.eyebrow">Contact MCM</span>
        <h1 id="contact-title" class="reveal reveal-delay-1" data-i18n="contact.hero.title">Open to ideas, exchange,<br><em class="accent-gold">and aligned partnership.</em></h1>
        <p class="reveal reveal-delay-2" data-i18n="contact.hero.body">Get in touch to introduce a relevant investment opportunity, connect as a family-office peer, explore specialist collaboration, or make a general enquiry.</p>
    </div>
</section>

<section class="section--white" aria-label="Contact information and enquiry form">
    <div class="container contact-layout">
        <div>
            <div class="contact-details reveal">
                <div class="contact-detail-item"><div class="contact-detail-text"><span class="label" data-i18n="footer.location">Location</span><span class="value" data-i18n="footer.location_value">Hong Kong SAR</span></div></div>
                <div class="contact-detail-item"><div class="contact-detail-text"><span class="label" data-i18n="footer.email">Email</span><span class="value"><a href="mailto:info@mwealth.online">info@mwealth.online</a></span></div></div>
                <div class="contact-detail-item"><div class="contact-detail-text"><span class="label" data-i18n="footer.phone">Phone</span><span class="value"><a href="tel:+85231052028">3105&nbsp;2028</a></span></div></div>
            </div>

            <div class="reveal">
                <span class="eyebrow" data-i18n="contact.form.eyebrow">Your introduction</span>
                <h2 class="contact-form-title" data-i18n="contact.form.title">Send a concise message</h2>

                <?php if ( $form_sent ) : ?>
                    <div class="form-success" role="status">Thank you. Your message has been sent.</div>
                <?php else : ?>
                    <?php if ( $form_error ) : ?>
                        <div class="form-error" role="alert"><?php echo esc_html( $form_error ); ?></div>
                    <?php endif; ?>

                    <form class="contact-form" method="post" action="<?php echo esc_url( get_permalink() ); ?>">
                        <?php wp_nonce_field( MCM_CONTACT_NONCE, 'mcm_nonce' ); ?>
                        <div class="sr-only" aria-hidden="true"><label for="mcm_honeypot">Leave this field blank</label><input type="text" id="mcm_honeypot" name="mcm_honeypot" tabindex="-1" autocomplete="off" value=""></div>

                        <div class="form-row">
                            <div class="form-group">
                                <label for="mcm_name" data-i18n="contact.form.name">Full name *</label>
                                <input id="mcm_name" name="mcm_name" type="text" autocomplete="name" required data-i18n-placeholder="contact.form.name_placeholder" placeholder="Your full name" value="<?php echo esc_attr( $form_fields['name'] ); ?>">
                            </div>
                            <div class="form-group">
                                <label for="mcm_email" data-i18n="contact.form.email">Email address *</label>
                                <input id="mcm_email" name="mcm_email" type="email" autocomplete="email" required data-i18n-placeholder="contact.form.email_placeholder" placeholder="your@email.com" value="<?php echo esc_attr( $form_fields['email'] ); ?>">
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group">
                                <label for="mcm_interest" data-i18n="contact.form.interest">Reason for contacting us *</label>
                                <select id="mcm_interest" name="mcm_interest" required>
                                    <option value="" data-i18n="contact.form.choose">Please choose</option>
                                    <?php $option_i18n = 1; foreach ( $interest_options as $value => $label ) : ?>
                                        <option value="<?php echo esc_attr( $value ); ?>" <?php selected( $form_fields['interest'], $value ); ?> data-i18n="contact.form.option<?php echo esc_attr( $option_i18n ); ?>"><?php echo esc_html( $label ); ?></option>
                                    <?php $option_i18n++; endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="mcm_phone" data-i18n="contact.form.phone">Phone number (optional)</label>
                                <input id="mcm_phone" name="mcm_phone" type="tel" autocomplete="tel" data-i18n-placeholder="contact.form.phone_placeholder" placeholder="+852 XXXX XXXX" value="<?php echo esc_attr( $form_fields['phone'] ); ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="mcm_message" data-i18n="contact.form.message">Message *</label>
                            <textarea id="mcm_message" name="mcm_message" required data-i18n-placeholder="contact.form.message_placeholder" placeholder="Briefly introduce the opportunity, perspective, or reason for contacting us."><?php echo esc_textarea( $form_fields['message'] ); ?></textarea>
                        </div>

                        <div class="form-submit">
                            <button class="btn btn-primary" type="submit" name="mcm_contact_submit" data-i18n="contact.form.submit_wp">Send message →</button>
                            <p class="form-notice" data-i18n="contact.form.notice_wp">Please do not include confidential or sensitive information in an initial message. We will handle your details with discretion.</p>
                        </div>
                    </form>
                <?php endif; ?>
            </div>
        </div>

        <aside class="contact-panel reveal reveal-delay-1">
            <span class="eyebrow" data-i18n="contact.panel.eyebrow">Relevant conversations</span>
            <h3 data-i18n="contact.panel.title">Good reasons to connect</h3>
            <ul class="expect-list">
                <li class="expect-item"><span class="expect-icon" aria-hidden="true">01</span><div><strong data-i18n="contact.panel.1.title">Share an opportunity</strong><span data-i18n="contact.panel.1.body">Introduce a company, fund, direct transaction, or other relevant idea.</span></div></li>
                <li class="expect-item"><span class="expect-icon" aria-hidden="true">02</span><div><strong data-i18n="contact.panel.2.title">Exchange perspective</strong><span data-i18n="contact.panel.2.body">Connect as a family-office peer around questions of mutual relevance.</span></div></li>
                <li class="expect-item"><span class="expect-icon" aria-hidden="true">03</span><div><strong data-i18n="contact.panel.3.title">Explore collaboration</strong><span data-i18n="contact.panel.3.body">Introduce specialist capabilities that may support our own mandate.</span></div></li>
            </ul>
            <div class="panel-divider"></div>
            <p class="panel-quote" data-i18n="contact.panel.quote">“Private capital. Shared perspective.”</p>
        </aside>
    </div>
</section>

<div class="compliance-strip"><div class="container"><p data-i18n="contact.disclaimer">Contacting MCM does not create an advisory, fiduciary, client, or investment relationship. Any potential opportunity or collaboration remains subject to independent review and appropriate documentation.</p></div></div>

<?php get_footer(); ?>
