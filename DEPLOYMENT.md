# MCM website deployment

## Required production configuration

The static contact form posts to `/api/contact`, which delivers through Resend. Configure these Vercel environment variables before promoting a deployment:

- `RESEND_API_KEY`: a restricted Resend API key
- `CONTACT_FROM_EMAIL`: a sender on a verified domain, for example `MCM Website <website@mwealth.online>`

Send a real test enquiry after deployment and confirm receipt at `info@mwealth.online`. The endpoint deliberately returns a service-unavailable message when these values are missing; it never displays a false success state.

## Domain migration

Do not replace the apex DNS record until the domain's email routing has been separated and verified. Confirm MX, SPF, DKIM, and DMARC with the mail provider first. Then attach both `mwealth.online` and `www.mwealth.online` to the production project, choose one canonical host, test all redirects, and request removal of obsolete package URLs from search indexes.

## WordPress alternative

The matching theme uses `wp_mail()` for enquiries. Configure authenticated SMTP, delivery monitoring, backups, updates, and abuse protection before using WordPress in production. Create pages with the canonical slugs `/investment-approach/`, `/perspectives/`, `/contact/`, and `/privacy/`, and assign their matching templates. Legacy `/services/` and `/promotions/` templates issue permanent redirects.

## Approval gate

Before launch, Hong Kong legal/compliance counsel should approve the company name, single-family-office description, community-introduction boundaries, disclaimers, and Privacy Notice. The confirmed establishment year is 2018.
