# MCM Website — Comprehensive Audit

**Audit date:** 7 August 2026 (Hong Kong time)  
**Prepared for:** MCM Wealth Management  
**Audit status:** Source, content, visual, functional, accessibility, SEO, privacy, security, deployment, DNS, and WordPress review  
**Important:** This is a website and risk audit, not legal advice. Hong Kong counsel and the company's compliance adviser should approve regulatory statements before launch.

---

## 1. Executive conclusion

The website currently exists in **two materially different states**:

1. **The public production site at `mwealth.online`** still contains contradictory company facts, external-client language, packages, discounts, unsupported promises, and non-working interactions. It is **not safe to treat as the final website**.
2. **Pull request #2** substantially improves the positioning and visual design. It correctly presents MCM as a single family office investing its own capital and removes the package-selling concept. However, it is **not fully launch-ready** because company facts remain unverified, privacy notices are missing, the deployed static contact form relies on `mailto:`, the production-domain migration is unresolved, accessibility defects remain, and the technical/SEO foundations are incomplete.

The most important finding is not a design issue. It is the absence of a single, legally approved source of truth for the company.

### The five highest-priority actions

1. **Create and approve a corporate fact sheet** from incorporation documents and legal/compliance advice: exact legal name, incorporation date, single-family-office status, licensing position, address, contact details, and approved public investment language.
2. **Resolve production deployment and DNS**. The public domain currently points to a separate legacy host, not the Vercel PR deployment. Do not change the apex DNS record until email routing is separated, because the current MX record points back to `mwealth.online`.
3. **Remove the live package/client site immediately after factual and legal sign-off**. The current production Promotions page still advertises discounts, advisory packages, and a fake newsletter success state.
4. **Add a Hong Kong-compliant privacy layer**: a Privacy Policy Statement, a Personal Information Collection Statement beside the form, retention/transfer information, and a privacy contact.
5. **Replace the static `mailto:` form with a real secure enquiry endpoint**, then add rate limiting, spam protection, delivery monitoring, and proper success/error handling.

### Launch recommendation

**Do not deploy PR #2 unchanged.** Treat it as a strong design/content foundation and complete the P0 launch blockers in this report first.

---

## 2. Scope and methodology

### Properties reviewed

- Public website: `https://mwealth.online/`
- Public pages including `/about.html`, `/services.html`, `/promotions.html`, and `/contact.html`
- Pull request #2 / branch `arena/019fdadc-mcm`
- Ten static pages in `preview/`
- WordPress theme source in `mcm-wealth-theme/`
- Deployable theme archive `mcm-wealth-theme.zip`
- CSS, JavaScript, bilingual strings, images, forms, and Vercel configuration
- Public DNS records for the website and email domain
- Search-engine remnants for earlier site URLs

### Tests performed on the proposed version

- HTML validation across all ten static pages
- JavaScript syntax validation
- PHP syntax/AST parsing across all theme templates
- Internal-link and asset-resolution checks
- Desktop and mobile rendering at 1440 px, 390 px, and 320 px
- Horizontal-overflow checks
- English/Traditional Chinese switching checks
- Automated WCAG/axe review
- Lighthouse accessibility, best-practices, SEO, and directional performance review
- Manual keyboard review of the mobile menu
- Colour-contrast calculations
- Static page and image transfer-size review
- WordPress/static parity review
- DNS, SPF, DKIM, DMARC, MX, `www`, and apex review
- Live-site content and stale-search-result review

### Important limitations

- No incorporation certificate, business registration, ownership diagram, SFC/legal opinion, brand-rights file, or approved investment mandate was provided.
- The Vercel PR preview redirects unauthenticated requests to Vercel SSO, so public stakeholder access could not be verified.
- Production server administration, WordPress core/plugins, backups, firewall, access logs, database, and user accounts were not available. Those need a separate infrastructure/security audit.
- The performance figures below are directional lab results, not production Core Web Vitals field data.

---

## 3. Readiness scorecard

| Area | Live production | PR #2 proposal | Assessment |
|---|---|---|---|
| Single-family-office positioning | **Blocked** | **Strong, pending legal verification** | The proposal fixes the core conceptual problem. |
| Factual consistency | **Blocked** | **Blocked pending source-of-truth approval** | Three different establishment years and two legal names appear across public/repository sources. |
| Regulatory clarity | **High risk** | **Improved but needs counsel** | “Own capital” and no-public-subscription language help, but labels alone do not establish an SFO exemption. |
| Privacy / PDPO | **Blocked** | **Blocked** | No PICS or Privacy Policy Statement. |
| Contact functionality | **Broken** | **Incomplete** | Live form has no working static backend; proposed static form uses `mailto:`. |
| Content strategy | **Incorrect** | **Good foundation, too generic** | Proposal is conceptually right but lacks proof and mandate detail. |
| Trust / credibility | **Weak** | **Moderate** | No team, office, governance, verified facts, or authentic evidence. |
| Visual design | **Retail/advisory cues** | **Strong editorial direction** | New design is much more suitable for a private family office. |
| Accessibility | **Not fully tested** | **Good baseline with serious defects** | Lighthouse 96; footer contrast and mobile keyboard navigation fail. |
| SEO / migration | **Blocked** | **Incomplete** | No sitemap, robots, canonical, hreflang, social metadata, favicon, or redirect plan. |
| Performance | **Unmeasured** | **Reasonable but optimisable** | Image delivery and font dependency need work. |
| Security | **Unknown/weakly documented** | **Incomplete** | No project security headers; forms need abuse controls; no DMARC. |
| Localization | **Inconsistent** | **Functionally complete, technically weak** | Client-side translation is not suitable for multilingual SEO or fully localized accessibility. |
| WordPress maintainability | **Unknown** | **Weak** | Duplicate static/PHP sources and incomplete template hierarchy create drift. |
| Deployment operations | **Blocked** | **Blocked** | Public DNS points to the legacy host; email and web migration are coupled. |

---

## 4. What PR #2 already improves

The proposed redesign should not be discarded. It resolves many of management's original concerns:

- It explicitly identifies MCM as a **Hong Kong single family office investing its own family capital**.
- It removes Family Wealth Academy, Legacy Planning Package, discounts, consultations, public-facing packages, and client-service workflows.
- It removes “One family. One conversation.” and “How we work with your family.”
- It changes visible “Services” positioning to **Investment Approach**.
- It changes visible “Promotions” positioning to **Partnerships & Opportunities**.
- It invites relevant investment opportunities, peer exchange, and specialist collaboration without promising public access to MCM investments.
- It does not make an unsupported “successful track record” claim.
- It introduces coherent, restrained visual styling appropriate to private capital rather than retail financial planning.
- It uses project-specific generated imagery instead of unknown third-party stock images.
- It preserves the existing logo rather than changing a brand asset without approval.
- It includes working English/Traditional Chinese visible-copy switching.
- It has valid HTML, coherent heading structure, image dimensions, meaningful alt text, a skip link, reduced-motion support, and no detected horizontal overflow at tested mobile widths.
- The WordPress form has a nonce, allowlisted enquiry types, sanitization, a honeypot, and a safe `Reply-To` pattern.

These are meaningful improvements. The remaining work is primarily fact verification, legal/privacy work, trust-building, deployment, accessibility, and technical hardening.

---

# Part I — Audit of the live production website

## 5. Production is materially out of sync with the repository and PR

The public domain does not appear to be serving the current GitHub main branch or PR deployment.

### Evidence observed on 7 August 2026

- DNS for `mwealth.online` resolves to `148.66.55.2`, a legacy host; the Vercel preview is on a separate Vercel domain.
- The live homepage still contains “How we work with families” and “One family. One conversation.”
- The live Promotions page still sells six discounted packages.
- The live Contact page returned the old `info@mcmwealth.com` address and a placeholder telephone number, while the repository and management-confirmed details are `info@mwealth.online` and `3105 2028`.
- The live homepage returned “Est. 2026” and “12+ Years Established,” while the live About page returned July 2012 and PR #2 uses July 2018.
- Changes already merged into GitHub main are therefore not reliably reflected at the public domain.

### Why this is dangerous

- Management may approve one version while users and search engines see another.
- Legal/compliance review can be invalidated by an older deployment.
- Contact enquiries can go to the wrong address or fail.
- A rollback or cache issue cannot be diagnosed without a defined release process.
- Old package pages can remain publicly accessible after the new site is thought to be live.

### Recommendation

Choose one production architecture and document it:

- **Option A — Vercel static production:** use Vercel for the public site, add a serverless form endpoint, and treat the WordPress theme as a separate/retired deliverable.
- **Option B — WordPress production:** deploy the WordPress theme to the current host, use Vercel only for preview, and test all theme templates and form delivery on staging.

Do not continue treating both as interchangeable. They have different forms, routes, page depth, and deployment behavior.

---

## 6. The live site has irreconcilable factual contradictions

### Establishment date

At least three dates are in circulation:

- Live homepage fetch: **2026**
- Live About page / older indexed site: **July 2012**
- PR #2 and management confirmation in this project: **July 2018**

The live site also states **12+ years**, which is inconsistent with 2018 and stale even if 2012 is the intended starting point.

### Legal name

At least two names appear publicly:

- Proposed repository: **MCM Wealth Management Limited**
- Older indexed/public content: **MCM Wealth Management (HK) Ltd** or **MCM Wealth Management (Hong Kong) Ltd.**

This is not a cosmetic issue. The Companies Registry states that a company website should display the registered name and liability status in legible characters. The exact registered English and/or Chinese name must be taken from the incorporation record.

### Business identity

Search results still describe the company as a financial advisory firm offering insurance, MPF-related, financial planning, membership, and client services. The proposed site describes a private single family office investing its own capital. If the business genuinely changed, the site needs an approved statement explaining the present entity and must remove the old claims comprehensively.

### Required fix

Create a signed fact sheet with:

- Exact legal English name
- Exact legal Chinese name, if registered
- Incorporation date
- Date the current family-office activity began, if different
- Whether “established” refers to the legal entity or current business
- Registered/business address approved for public use
- Main telephone and international display format
- Approved email addresses
- Company registration/business registration details for internal verification
- Ownership/control facts supporting “single family office”
- Current licensing/exemption position approved by counsel
- Approved investment-activity wording

Until this exists, no date, legal name, regulated-status implication, or performance statement should be published.

---

## 7. The live Promotions page is a critical positioning and regulatory problem

The live page advertises:

- “20% Off + Free Consultation”
- Family Wealth Academy
- Legacy Planning Package
- Wealth Coordination Offer
- Global Advisory Package
- Enterprise Solutions
- Health & Wellbeing Programs
- Discounted investment advisory and cross-border tax planning

This directly contradicts the claim that MCM is a private single family office serving one family. It also risks holding the company out as conducting advisory or other regulated/commercial activity.

### Immediate action

- Remove public access to this page once the replacement is approved.
- Do not merely hide it from navigation; remove or redirect the URL and all product-detail URLs.
- Preserve a legal/archive copy privately if required.
- Review search-engine removals after the replacement deployment.

PR #2 correctly replaces this page with Partnerships & Opportunities.

---

## 8. Live contact and newsletter interactions are broken or misleading

### Contact form

The repository version corresponding to the static deployment uses `action="#"` and has no submission endpoint. The shared JavaScript does not send the data. A visitor can fill the form and press Send without creating a real enquiry.

### Newsletter form

The live Promotions implementation intercepts submission, hides the form, and displays “You're on the list” without transmitting or storing the email address. This is a false success state.

### Video feature

The live homepage presents a focusable “Play” control, but no click or keyboard handler is implemented. It behaves like a button without doing anything.

### Unsupported promises

The live contact page promises:

- Complete confidentiality
- No sharing with third parties
- Response within 24 hours

These claims are unsafe unless operations, hosting, email processors, retention policy, access control, and staffing genuinely support them. Email delivery itself normally involves third-party infrastructure.

### Required fix

- Remove fake UI immediately.
- Use a real endpoint and success response.
- Promise only operationally approved response times.
- Replace absolute confidentiality language with accurate privacy/PICS wording.
- Instrument delivery failures and alert the team.

---

## 9. The old site remains in search results

Search results still show earlier WordPress-style URLs and content, including:

- `/About/`
- `/Contacts/`
- `/Join-Us/`
- `/promotions-pay-trial/`
- Finance 101 / MCM Academy product URLs

Several now return generic server 404 pages. This creates stale snippets, broken search journeys, and continued association with the old advisory/package business.

### Required migration behavior

| Legacy URL | Recommended treatment |
|---|---|
| `/About/` | 301 to the approved `/about` page |
| `/Contacts/` | 301 to `/contact` |
| `/services.html` | 301 to `/investment-approach` if a new semantic route is adopted |
| `/promotions.html` | 301 to `/partnerships` after the package content is removed |
| `/Join-Us/` | 301 only if there is a genuine Careers page; otherwise 410 if permanently withdrawn |
| `/promotions-pay-trial/` and product children | Prefer 410 when the products no longer exist; do not misleadingly redirect every product to Home |
| Old mixed-case variants | Normalize with case-insensitive 301 rules where the host permits |

After deployment:

- Publish a sitemap.
- Verify Google Search Console and Bing Webmaster Tools.
- Request recrawling of the new pages.
- Use removals only as a temporary supplement; correct status codes and redirects are the durable fix.

---

# Part II — Detailed audit of PR #2 / proposed website

## 10. Corporate identity and trust

### 10.1 Exact legal identity is not verified — P0

The proposed footer displays “MCM Wealth Management Limited,” but older public sources use a different name. Verify against the certificate of incorporation before launch.

### 10.2 “Single family office” is a factual and regulatory statement — P0

The website repeats “single family office” prominently. That statement must match the actual ownership, entities served, charging model, and activities. A website disclaimer cannot create a licensing exemption.

The SFC explains that the licensing analysis is activity-based and does not depend only on the label “family office.” It identifies regulated activity, carrying on a business, and conducting that business in Hong Kong as key factors. It also warns family offices not to hold themselves out as carrying on regulated activity without a licence.

### 10.3 The site lacks confidence-building evidence — P1

The proposed copy is polished but mostly abstract. It says long term, perspective, alignment, stewardship, relevance, and partnership repeatedly without showing who MCM is in concrete terms.

Missing trust elements include, subject to privacy approval:

- Leadership or investment-committee names and short biographies
- A signed founder/principal statement
- Corporate governance overview
- Authentic office/location information
- Actual areas of investment interest
- Geographic scope
- Typical stage or structure considered
- Minimum information required from opportunity introducers
- External adviser categories or named partners, with permission
- Anonymized examples of how MCM evaluates opportunities
- Verified history milestones
- A clear explanation of what “sharing culture” means in practice

A private office may reasonably avoid publishing AUM, family identity, holdings, or staff names. If so, the site should still provide non-sensitive proof: exact corporate facts, governance principles, decision criteria, and a real office contact.

### 10.4 Too much negative/defensive copy — P2

The proposal repeatedly says what MCM is not: not services, not packages, not an intermediary, not client acquisition, not a public fund. This is useful during correction but makes the public site sound defensive and calls attention to the previous mistake.

Use one clear “For clarity” section and legal footer, then let most pages state the positive proposition confidently.

### 10.5 “Successful investment track record” should not be added without substantiation — P0 if proposed

Do not publish a generic claim such as “share our successful investment track record.” If management wants performance evidence, define and approve:

- Which entity/portfolio the result relates to
- Measurement period
- Gross or net return
- Currency
- Benchmark
- Realized versus unrealized results
- Calculation methodology
- Whether results are audited or independently verified
- Risk and past-performance context
- Who is legally permitted to receive the information

Safer public alternatives are verified years of operation, investment-team experience, governance process, anonymized case studies, or qualitative investment principles.

---

## 11. Regulatory and legal wording

### 11.1 Opportunity invitation needs counsel review — P0

The Partnerships page welcomes companies, funds, direct transactions, managers, and co-investors. This is conceptually better than inviting the public to “invest into MCM,” but counsel should still approve:

- Whether the page is merely receiving introductions
- Whether any co-investment language could be treated as an invitation or marketing
- Whether visitors can infer access to family capital, funds, or securities
- Whether geographic restrictions or professional-investor wording are needed
- Whether any SFC licence/exemption statement should appear, and in what form

### 11.2 Do not imply that a disclaimer alone solves licensing — P0

The existing “not an offer or solicitation” language is sensible but not determinative. Actual activity, legal structure, compensation, discretion, related entities, and communications matter.

### 11.3 Professional-service statements need careful boundaries — P1

The site mentions legal, tax, trust, investment, governance, and other specialists. Keep the wording clear that:

- MCM engages specialists for its own needs.
- MCM does not provide those professional services to website visitors.
- External specialists remain responsible for advice in their disciplines.

The proposal largely does this well.

### 11.4 Company-name disclosure — P0 pending verification

The site displays “Limited,” which is good, but the exact registered name must be confirmed. If the company has authorized the site, the legal name and liability status should remain legible in the footer on every page.

### 11.5 Legal pages are missing — P0/P1

Add:

- Privacy Policy Statement
- Personal Information Collection Statement at the form
- Website Terms / Legal Notice
- Regulatory Status statement approved by counsel
- Image/content notice if generated illustrations might be mistaken for the actual office
- Accessibility statement, preferably after remediation

---

## 12. Privacy and personal-data handling

### 12.1 No Personal Information Collection Statement — P0

Both static and WordPress contact experiences collect personal data: name, email, telephone, reason for contact, and message. The one-line warning not to include confidential information is not a PICS.

PCPD guidance says a PICS should be provided on or before collection and should explain, among other things:

- Purpose of collection
- Whether fields are obligatory or voluntary
- Consequences of not providing obligatory data
- Classes of possible transferees
- Rights of access and correction
- Contact details for access/correction requests
- Direct-marketing use, if any

### 12.2 No Privacy Policy Statement — P0

Add an easily accessible policy covering:

- Data controller/legal entity
- Data collected through forms, email, server logs, analytics, and local storage
- Purpose and lawful business use
- Retention periods
- Access controls and security
- Processors/hosting/email providers and cross-border processing
- Disclosure categories
- Data-access/correction procedure
- Breach handling
- Cookie/local-storage use
- Privacy contact

### 12.3 Data minimization needs refinement — P1

- Phone is optional, which is good.
- Keep the initial form free of file uploads and financial documents.
- Consider whether full name is necessary for an initial introduction.
- Add explicit maximum lengths.
- Continue warning users not to send deal-room, portfolio, identity, tax, or other sensitive documents before an NDA/secure channel.

### 12.4 Google Fonts is a third-party request — P1

Every page requests fonts from Google. That creates a third-party network dependency and may disclose request metadata such as IP address and user agent. Self-host the approved font files or disclose the third-party use in the privacy policy.

### 12.5 Analytics policy is undefined — P2

There is currently no analytics script, which is privacy-friendly but leaves no measurement. If analytics is added, choose a privacy-conscious implementation, document it, and determine whether consent controls are required for the selected tools and uses.

---

## 13. Forms and enquiry operations

### 13.1 Static form uses `mailto:` — P0

The Vercel deployment serves `preview/`, whose Contact page submits to `mailto:info@mwealth.online`.

Problems:

- It depends on a configured local email application.
- Many webmail users get a confusing or failed experience.
- There is no server confirmation or delivery receipt.
- Structured fields may produce an ugly or inconsistent email body.
- Analytics cannot reliably record successful delivery.
- Accessibility and mobile behavior vary by device.
- It gives no operational visibility into dropped enquiries.

### 13.2 WordPress form is better but not production-hardened — P1

Strengths:

- Nonce validation
- Honeypot
- Sanitization
- Allowlisted enquiry categories
- Safe `Reply-To` use
- Server success/error handling

Remaining work:

- Rate limiting by IP/session
- Bot protection that does not create an accessibility barrier
- Maximum lengths and request-size limits
- Optional phone-format validation
- Delivery through authenticated SMTP/API rather than unaudited default `wp_mail`
- SPF/DKIM/DMARC alignment testing
- Failure logging and alerting
- Duplicate submission protection
- Privacy/PICS acknowledgement
- Field-specific errors with `aria-invalid` and `aria-describedby`
- Defined retention and deletion process
- Secure internal handling workflow

### 13.3 Static and WordPress forms are different products — P0 architectural decision

The static site says “Prepare email”; WordPress says “Send message.” Only WordPress has a backend. Decide which platform is production and test that exact route end-to-end.

### 13.4 Operational routing is undefined — P1

Define owners and service levels for:

- Investment opportunities
- Family-office exchange
- Specialist collaboration
- General enquiries
- Privacy requests
- Complaints, if a complaint channel remains legally or operationally necessary

Do not publish “24 hours” unless there is monitoring and cover to achieve it.

---

## 14. Information architecture and user experience

### 14.1 Legacy route names contradict visible labels — P1

The proposal visibly says Investment Approach and Partnerships but retains:

- `services.html` / `/services/`
- `promotions.html` / `/promotions/`
- `wealth-coordination.html`
- `tax-strategy.html`
- `business-succession.html`

Backward-compatible redirects are good; continuing to use these as canonical URLs is not. Adopt semantic routes and 301 the old URLs.

### 14.2 The homepage is too long and repetitive — P2

Measured proposed homepage height:

- Approximately **6,176 px at 1440×900**
- Approximately **8,567 px at 390×844**

It repeats identity, perspective, philosophy, mandate, focus areas, and opportunity invitation. A private family office homepage should feel selective and decisive.

Recommended homepage structure:

1. Clear identity and one primary CTA
2. What MCM is / own-capital mandate
3. Three investment principles
4. Evidence/trust section
5. Opportunity and peer-exchange invitation
6. Legal/footer

Move depth to About and Investment Approach.

### 14.3 Five detail pages are thin and template-like — P2

The detail pages use nearly identical structures with two paragraphs and four principles. They risk feeling like renamed service landing pages and can create low-value SEO inventory.

Choose one of two approaches:

- Consolidate them into one strong Investment Approach page; or
- Keep only pages with substantive, distinct, approved content and evidence.

### 14.4 No breadcrumbs or clear return path on detail pages — P2

Add a small breadcrumb such as `Investment Approach / Capital Allocation`, especially if detail pages remain.

### 14.5 Partnership qualification remains too broad — P1

“Companies, funds, direct transactions” will attract irrelevant submissions. Without revealing confidential strategy, publish useful filters such as:

- Broad geographic relevance
- Stage/structure considered
- Time horizon
- Qualitative sectors/themes
- Minimum materials for an introduction
- Excluded categories
- Whether cold submissions are reviewed

### 14.6 Contact CTAs overlap — P2

“Share an opportunity,” “Make an introduction,” “Open a dialogue,” “How we collaborate,” “Contact MCM,” and “Partnerships” are all used. Define one CTA hierarchy:

- Primary: **Introduce an opportunity**
- Secondary: **Connect with MCM**
- Informational: **Explore our approach**

### 14.7 No custom 404 experience — P1

Unknown URLs return a generic server error on production. Add a branded 404 with links to Home, Investment Approach, Partnerships, and Contact. Preserve a true HTTP 404 status.

---

## 15. Content quality and editorial voice

### 15.1 The proposed voice is appropriate but overly abstract — P1

The most frequent concepts are family, capital, perspective, investment, partnerships, opportunities, independent, relevant, and continuity. Repetition without evidence can feel generated or generic.

Improve by replacing some broad statements with approved specifics:

- What makes an opportunity relevant?
- What does long-term mean operationally?
- What information improves first review?
- What is shared with peer family offices?
- Which decisions remain family-led?
- Which specialist roles are external?

### 15.2 Some copy still looks like a service taxonomy — P1

“Family Office Stewardship,” “Legacy & Continuity,” and “Specialist Coordination” can still be interpreted as things MCM offers. Present them as **responsibilities within our own mandate**, not clickable service-style products.

### 15.3 Trust cannot be built by disclaimers alone — P1

The proposal is careful but anonymous. Add approved evidence rather than more defensive language.

### 15.4 Claims inventory is missing — P1

Maintain a content register with:

- Claim
- Source/evidence
- Owner
- Legal/compliance approver
- Approval date
- Review/expiry date
- Pages where used

This should cover incorporation date, SFO status, investment areas, geography, partnership claims, contact promises, and any future performance statement.

### 15.5 Traditional Chinese requires native financial/legal review — P1

The translation is complete at a functional level, but it should be reviewed by a Hong Kong Traditional Chinese editor familiar with family-office, investment, legal, and tax terminology. Automated consistency is not the same as legal/editorial approval.

---

## 16. Visual design and brand audit

### 16.1 Strong overall direction

The proposed palette, spacing, photography style, and editorial composition are much better suited to a private family office than the current retail-style site.

### 16.2 Logo quality and identity — P1, approval required

The existing mark:

- Is a 191×212 JPEG rather than a vector
- Is downscaled to 45×45
- Has a white raster background
- Resembles an abstract “C”/swirl more than “MCM”
- Has no documented ownership proof in the repository
- May appear soft on high-density displays

Do not redesign it without management approval, but obtain the official source file and brand authorization. Preferred deliverables:

- SVG master
- Transparent PNG fallbacks
- Square favicon/app icon
- Horizontal and stacked lockups
- Minimum-size and clear-space rules
- Approved colours

### 16.3 Generated imagery is coherent but not authentic evidence — P1

Benefits:

- No third-party stock dependency
- No identifiable people or visible brands
- Consistent visual language

Risks:

- Architectural images may be mistaken for MCM's real office or view.
- A site composed entirely of generated scenes can feel anonymous or synthetic.
- “Generated specifically” does not automatically mean “copyright-free” in every jurisdiction or under every platform term.

Recommendations:

- Retain generation records and applicable model terms.
- Have counsel/brand owner approve usage.
- Use clearly illustrative/abstract treatment or disclose that imagery is illustrative.
- Add one or two authentic, approved assets: real office detail, founder letter, team/committee portrait, or Hong Kong location photography.

### 16.4 Image reuse is noticeable — P2

The stewardship image appears on multiple pages. Add genuinely distinct visuals only where they add meaning; otherwise reduce the number of image-led detail pages.

### 16.5 Very small interface text — P1

The CSS uses 7–12 px text in multiple places, including footer labels and disclaimers. Legal and contact information should not be the hardest text to read.

Recommended minimums:

- Body/supporting copy: 14–16 px
- Footer links: at least 13–14 px
- Labels/eyebrows: at least 11–12 px with adequate contrast
- Legal copy: at least 12–13 px with comfortable line height

### 16.6 Scroll-reveal animation gates content — P2

Elements receive `opacity: 0` when JavaScript is active and remain hidden until the observer adds `.in`. This creates blank full-page screenshots/print output and can hide content if the interaction script fails after the inline `js` marker runs.

Use animation as enhancement, not visibility control:

- Keep content visible by default.
- Animate only a modest transform/opacity after a reliable enhancement class is added.
- Add print CSS forcing all content visible.
- Add a timeout/fallback that reveals all elements.

---

## 17. Accessibility audit

### Baseline results

- Valid HTML across all ten proposed static pages
- Automated axe review: no structural WCAG A/AA violations when colour testing was excluded
- Lighthouse accessibility: **96/100** on the proposed homepage
- No tested horizontal overflow at 390 px; homepage also passed a 320 px Traditional Chinese overflow check
- Good use of headings, labels, alt text, a skip link, `prefers-reduced-motion`, and visible content structure

This is a good baseline, but the remaining defects are real.

### 17.1 Footer colour contrast fails WCAG AA — P1

Measured failures on the proposed site:

- Footer contact labels: approximately **3.49:1** at 9 px; required 4.5:1 for normal text
- Copyright/disclaimer: approximately **4.11:1** at 10 px; required 4.5:1

Increase both colour contrast and font size.

### 17.2 Focus indicator is too low contrast on light surfaces — P1

The global focus outline uses 70% amber. Calculated contrast is approximately 1.6–1.75:1 on light backgrounds, below the 3:1 expectation for visible UI focus indication.

Use a two-tone focus ring or a dark outline plus light offset so it remains visible on every surface.

### 17.3 Mobile navigation is broken for keyboard users — P0/P1

Manual test at 390 px:

1. Focus the hamburger button.
2. Open the menu.
3. Press Tab.
4. Focus moves behind the open menu to the homepage hero CTA, not to the first navigation item.

The navigation appears before the toggle in DOM order, and opening it does not move or trap focus.

Fix by:

- Moving the toggle before the nav in focus order, or explicitly focusing the first menu link on open
- Trapping focus within the open modal-style menu
- Applying `inert`/appropriate accessibility state to page content behind it
- Restoring focus to the toggle on close
- Supporting Escape, which the proposal already does

### 17.4 Language switch is only partially localized — P1

Switching language updates visible strings and `<html lang>`, but not all of the following:

- Page `<title>`
- Meta description
- Image alt text
- ARIA labels
- Skip-link text
- Back-to-top label
- Navigation landmark label
- URL

This creates a mixed-language screen-reader and SEO experience.

### 17.5 Form errors are not associated with fields — P1

The WordPress error appears as a general alert. Add:

- Per-field error text
- `aria-invalid="true"`
- `aria-describedby`
- Focus management to the first invalid field or an error summary

### 17.6 Chinese typography is not designed — P2

Playfair Display and Inter do not provide the intended Chinese editorial system. Select approved Traditional Chinese fonts, preferably self-hosted, and test line breaking, punctuation, weight, and headings.

### 17.7 Full manual WCAG test remains required — P1

Before launch, test:

- Keyboard-only operation
- VoiceOver on iOS/macOS
- NVDA or JAWS on Windows
- 200% and 400% zoom
- Text spacing overrides
- High contrast / forced colours
- Reduced motion
- Form errors and success messages
- English and Traditional Chinese modes
- Touch targets on real mobile devices

---

## 18. SEO and discoverability audit

### 18.1 Live `robots.txt`, `sitemap.xml`, favicon, and privacy URLs return 404 — P1

The public host returned generic 404s for:

- `/robots.txt`
- `/sitemap.xml`
- `/favicon.ico`
- `/privacy.html`
- `/privacy-policy`

### 18.2 Proposed pages lack canonical URLs — P1

No proposed page contains `rel="canonical"`. This is especially problematic because:

- Both `www.mwealth.online` and `mwealth.online` serve content.
- Old `.html` routes and potential clean URLs can coexist.
- Vercel previews can create duplicate environments.

Choose one canonical host—normally the apex or `www`, not both—and 301 the other.

### 18.3 `www` and apex are duplicate public hosts — P1

`www.mwealth.online` resolves to the apex and serves the same content without a visible canonical/redirect. Configure one permanent redirect to the preferred host.

### 18.4 No multilingual URL strategy or hreflang — P1

The current JavaScript toggle changes copy on one URL. Search engines generally need locale-specific URLs and hreflang to index and serve language variants reliably.

Recommended structure:

- `/en/...`
- `/zh-hant/...` or `/zh-hk/...`
- Self-referencing canonical for each locale page
- Reciprocal `hreflang="en-HK"`, `hreflang="zh-Hant-HK"`, and `x-default`
- Localized titles, descriptions, alt text, schema, and legal notices

If separate URLs are not desired, accept that Chinese SEO will be limited and at minimum localize non-visible accessibility metadata.

### 18.5 No Open Graph or social metadata — P2

Add approved:

- `og:title`
- `og:description`
- `og:url`
- `og:type`
- `og:image` at an appropriate social ratio
- Twitter/X card metadata

### 18.6 No Organization structured data — P2

After legal facts are verified, add `Organization` JSON-LD with exact name, URL, logo, contact point, and address if approved. Do **not** use public FinancialService/Product/Offer schema unless it accurately reflects legally approved activity.

### 18.7 Titles and descriptions need refinement — P2

Strengths:

- PR #2 has unique titles and descriptions.

Weaknesses:

- “Home — MCM Wealth Management” is generic.
- Some detail descriptions are tautological, e.g. “perspective on enterprise perspective.”
- WordPress has no theme-level meta-description implementation.
- Chinese mode does not update metadata.

### 18.8 No custom sitemap/index policy — P1

Decide which pages deserve indexing. Thin detail pages may be better consolidated than indexed. Include only canonical, approved pages in the sitemap.

### 18.9 Lighthouse SEO score requires context

The proposed homepage achieved 100 in Lighthouse's limited technical SEO checklist, but that test does not mean the migration, canonical, multilingual, structured-data, stale-index, and content-authority problems are solved.

---

## 19. Performance and Core Web Vitals

### Directional measurements on the proposed static site

| Metric | Observed lab result | Interpretation |
|---|---:|---|
| FCP | ~1.5 s | Reasonable in local mobile lab |
| LCP | ~3.9 s | Needs improvement; target is normally ≤2.5 s at the 75th percentile |
| Total Blocking Time | 0 ms | Strong; JavaScript is light |
| CLS | 0 | Strong; image dimensions help |
| Total transfer in lab | ~1.19 MB | Acceptable but reducible |
| Shared CSS + JS source | ~66.9 KB uncompressed | Reasonable, but much is unused per page |

These are not production field measurements. The local test had a Google Fonts network failure and no production CDN/compression profile.

### 19.1 No responsive image variants — P1/P2

All editorial images are 1536×1024 JPEGs. Mobile devices download the same files used by desktop.

Examples of initial image weight by page:

- About / stewardship pages: ~351 KB referenced immediately
- Investment Approach / capital allocation: ~376 KB
- Specialist Coordination: ~315 KB
- Partnerships hero: ~244 KB before the lazy secondary image

Add:

- AVIF and WebP variants
- `srcset` and `sizes`
- Appropriate 480/768/1200/1536 widths
- `fetchpriority="high"` for the LCP hero only
- Lazy loading for below-fold content
- Quality review to prevent banding in dark architectural images

### 19.2 External fonts are render dependencies — P1

Self-host and subset fonts for:

- Reliability
- Privacy
- Faster repeat visits
- Better control of `font-display`
- Traditional Chinese support

### 19.3 CSS and translation payload are global — P2

Lighthouse estimated:

- ~17 KB unused CSS on the homepage
- ~7 KB CSS minification saving
- ~4 KB JavaScript minification saving

The site is not heavy, but production should minify and version assets. Consider page-level CSS only if the architecture is rebuilt; do not over-engineer a small site.

### 19.4 No explicit caching/security header configuration — P1

`vercel.json` only sets the output directory and clean-URL behavior. Add immutable caching for versioned assets and appropriate HTML caching/revalidation. If WordPress is production, configure its server/CDN separately.

### 19.5 No real-user monitoring — P2

After launch, collect privacy-approved Core Web Vitals by page/device and use Search Console field data. Lab scores alone are insufficient.

---

## 20. Security audit

### 20.1 No project-defined security headers — P1

No CSP or related headers are configured in `vercel.json`. Verify production responses and add an approved baseline:

- `Content-Security-Policy`
- `Strict-Transport-Security` after confirming every subdomain is HTTPS-ready
- `X-Content-Type-Options: nosniff`
- `Referrer-Policy: strict-origin-when-cross-origin`
- `Permissions-Policy` disabling unused browser capabilities
- `frame-ancestors 'none'` or an approved allowlist
- `object-src 'none'`
- `base-uri 'self'`
- `form-action` restricted to approved endpoints

### 20.2 Inline scripts and `onclick` handlers block a strict CSP — P1

The head contains inline JavaScript, and language buttons use inline `onclick`. Move these to external event listeners and use a CSP nonce/hash only where strictly necessary.

### 20.3 Translation uses `innerHTML` — P2

The translation dictionary is static, so current XSS exposure is low. However, `innerHTML` becomes dangerous if translations later come from a CMS, remote API, or user-editable source. Prefer `textContent` for plain text and a controlled rendering method for the small number of strings that require emphasis or line breaks.

### 20.4 Form abuse controls are incomplete — P1

See the form section: add rate limiting, length limits, authenticated mail delivery, monitoring, and accessible anti-bot controls.

### 20.5 WordPress infrastructure remains unaudited — P0 before WordPress launch

A separate check must cover:

- WordPress/PHP/database supported versions
- Core, theme, and plugin updates
- Admin users, MFA, least privilege
- XML-RPC and REST exposure
- Login rate limiting
- WAF/CDN
- Backups and restoration tests
- File permissions
- Secrets management
- Malware scanning
- Audit logs
- Staging isolation
- Database and media privacy

### 20.6 No documented dependency/update process — P2

The site relies on external fonts but has no dependency manifest, security-update process, or CI workflow.

---

## 21. DNS, domain, and email deliverability

This section is a launch blocker because web and mail currently share DNS assumptions.

### Current public records observed

- Apex A: `mwealth.online → 148.66.55.2`
- `www`: CNAME to `mwealth.online`
- MX: `0 mwealth.online`
- SPF: present, including the current server IP and MailChannels
- DKIM: `default._domainkey` present
- DMARC: **not found**
- DNSSEC: no DNSKEY observed
- CAA: none observed

### 21.1 Changing the apex A record can break email — P0

Because the MX target is the apex hostname itself, changing `mwealth.online` from `148.66.55.2` to Vercel would also make inbound mail resolve toward the web host unless MX is corrected first.

### Safe migration sequence

1. Inventory all mailboxes, aliases, SMTP settings, forwarding, and webmail.
2. Create a dedicated mail hostname such as `mail.mwealth.online` pointing to the actual mail server, or migrate mail to a dedicated provider.
3. Change MX to the dedicated mail hostname/provider.
4. Verify inbound and outbound mail.
5. Update SPF as needed; remove unnecessary `+a` authorization after web migration.
6. Confirm DKIM signing for the active provider.
7. Add DMARC initially with reporting and a carefully managed policy, then move toward quarantine/reject after verification.
8. Only then change the website apex/`www` records.
9. Set a canonical-host redirect and verify TLS.
10. Monitor mail and web for at least 48–72 hours.

### 21.2 No DMARC — P1

SPF and DKIM are useful, but without DMARC there is no published alignment policy/reporting for spoofed mail using the domain. Add DMARC with professional mail-admin review.

### 21.3 Domain trust — P2

`mwealth.online` matches the confirmed email but not the full MCM brand as clearly as a dedicated MCM domain would. If a stronger official domain exists, assess migration carefully. Do not create another domain split without a canonical and email plan.

---

## 22. Localization architecture

### Strengths

- All 305 static translation keys are defined.
- The selected language persists through local storage.
- `<html lang>` updates.
- Traditional Chinese visible content is comprehensive.

### Problems

1. Translation occurs only after JavaScript loads, creating a potential English flash.
2. One URL represents two languages; Chinese pages are not independently shareable or indexable.
3. Metadata, alt text, and most ARIA labels remain English.
4. WordPress visible copy is translated through a custom JavaScript dictionary, not standard WordPress localization or a multilingual CMS.
5. CMS-edited content will not automatically be translated.
6. The dictionary includes static detail-page content not used by WordPress, increasing drift.
7. No formal translation review workflow exists.
8. No approved Chinese font family is specified.

### Recommendation

For a serious bilingual corporate site, use server-rendered locale URLs and a controlled bilingual content source. At minimum:

- Separate English and Traditional Chinese URLs
- Translate all metadata and accessibility text
- Add hreflang/canonical links
- Use native-editor-approved copy
- Keep English and Chinese approvals linked by content ID/version

---

## 23. WordPress architecture and maintainability

### 23.1 `index.php` is being used as the homepage — P1

In a WordPress theme, `index.php` is the ultimate fallback for posts, archives, and other requests. The current file is a hardcoded homepage, so unmatched WordPress content can render the homepage incorrectly.

Use:

- `front-page.php` for the homepage
- A real fallback `index.php`
- `404.php`
- `single.php` / `archive.php` only if those content types are needed

### 23.2 About template/slug mismatch risk — P1

The file is `page-about.php`, but links use `/about-us/`. Automatic WordPress hierarchy will not match that filename unless the page has explicitly selected the template. Align filename, slug, page assignment, and menu.

### 23.3 Static and WordPress content are duplicated — P1

The same copy, CSS, JavaScript, translations, and images exist in two trees. Manual duplication creates inevitable drift.

Observed parity gap:

- Static site has five detailed approach pages.
- WordPress does not have equivalent detail templates.
- Static homepage links to detail pages.
- WordPress homepage links all focus cards back to `/services/`.

Choose a canonical content source or generate both outputs from shared data/templates.

### 23.4 Theme ZIP is a manually committed binary — P2

The ZIP can drift from source and produces noisy reviews. Build it in CI/release automation, verify checksums, and attach it as a release artifact rather than treating it as the only source of truth.

### 23.5 No automated repository checks — P1

Only Vercel deployment checks are present. Add CI for:

- HTML validation
- PHP syntax and WordPress coding standards
- JavaScript linting
- Link/asset checks
- Translation-key completeness
- Accessibility smoke tests
- ZIP build/integrity
- Stale forbidden-copy scan (“package,” “client services,” etc., with an allowlist for legal clarity)

### 23.6 Hardcoded operational data — P2

Email, telephone, year, URLs, and copy appear in many files. Store approved company facts centrally or expose them as controlled WordPress settings.

### 23.7 Unused WordPress features — P3

Four footer widget areas and a sidebar are registered but not used by the hardcoded templates. Remove unused functionality or actually support it.

### 23.8 Theme presentation assets are incomplete — P3

Add a WordPress `screenshot.png`, README, changelog, supported-version statement, and deployment instructions.

---

## 24. Analytics and measurement

The proposed site has no analytics, lead-event tracking, or operational dashboard.

### Recommended measurement plan

Track only useful, privacy-approved events:

- Investment Approach views
- Partnerships page views
- “Introduce an opportunity” clicks
- Contact category selected
- Successful form delivery, not merely button click
- Email/telephone link clicks
- Language selection
- Form validation failure and delivery failure rates
- 404s and legacy redirect use
- Core Web Vitals by device

Do not record message contents, sensitive deal information, or unnecessary identifiers in analytics.

### Suggested success measures

- Qualified introductions per month
- Percentage of enquiries matching mandate
- Form delivery success rate
- Response time actually achieved
- English/Chinese usage
- Organic search impressions for approved brand/family-office terms
- Legacy 404 volume declining after redirects
- LCP/INP/CLS field performance

---

## 25. Content governance and operating model

Without governance, the site will drift back into incorrect language.

### Required roles

- **Business owner:** confirms strategy and approved public facts
- **Legal/compliance:** approves regulatory, opportunity, privacy, and performance wording
- **Content owner:** maintains English source copy
- **Traditional Chinese reviewer:** approves localized finance/legal terminology
- **Technical owner:** controls deployments, DNS, forms, security, and monitoring
- **Brand owner:** approves logo, imagery, and visual use

### Publishing workflow

1. Draft from approved content model.
2. Fact-check against the claims register.
3. Legal/compliance review where triggered.
4. Translate and review.
5. Stage on a password-protected but stakeholder-accessible environment.
6. Run automated QA.
7. Obtain named approval.
8. Deploy with rollback point.
9. Verify production content, forms, DNS, redirects, analytics, and search controls.
10. Record release and next review date.

### Review cadence

- Contact details: quarterly
- Legal/privacy pages: at least annually and when processors/activities change
- Regulatory wording: whenever activities/structure change
- Investment criteria: quarterly or as mandate changes
- DNS/mail security: quarterly
- Dependencies/WordPress: monthly
- Accessibility: every material release plus annual manual audit

---

## 26. Consolidated findings register

| ID | Severity | Finding | Where | Recommended action | Effort |
|---|---|---|---|---|---|
| F01 | P0 | Legal name conflicts across sources | Live + PR | Verify certificate and update everywhere | S |
| F02 | P0 | Establishment year appears as 2012, 2018, and 2026 | Live + PR | Approve definition/date; remove derived year counters | S |
| F03 | P0 | SFO status not evidenced | Both | Obtain structure/activity legal review | M |
| D01 | P0 | Production is not serving current repo/PR content | Live | Choose architecture and release pipeline | M |
| D02 | P0 | Apex DNS migration would break MX/email | DNS | Separate mail hostname/provider before web cutover | M |
| C01 | P0 | Live site sells packages/discounts | Live | Remove after approved replacement deployment | S |
| C02 | P0 | Live content still targets external clients | Live | Replace with approved own-capital copy | S |
| C03 | P0 | Potential investment/performance claims lack approval framework | Both | Claims register and counsel review | M |
| P01 | P0 | No PICS beside form | Both | Draft and display PCPD-aligned PICS | M |
| P02 | P0 | No Privacy Policy Statement | Both | Publish complete PPS | M |
| X01 | P0 | Live contact form has no functional static backend | Live | Implement tested endpoint | M |
| X02 | P0 | Proposed static form uses `mailto:` | PR | Replace with secure endpoint | M |
| X03 | P0 | Live newsletter displays false success | Live | Remove immediately | S |
| R01 | P0 | Opportunity invitation needs regulatory approval | PR | Counsel review of exact wording/audience | M |
| A01 | P1 | Mobile menu keyboard focus goes behind overlay | PR | Focus management, trap, inert background | M |
| A02 | P1 | Footer contrast fails WCAG AA | PR | Increase contrast and size | S |
| A03 | P1 | Focus ring has inadequate contrast on light surfaces | PR | Two-tone/dark focus treatment | S |
| A04 | P1 | Form errors not field-associated | WordPress | `aria-invalid`, descriptions, focus summary | M |
| A05 | P1 | Accessibility metadata not translated | PR | Translate title/alt/ARIA/skip labels | M |
| S01 | P1 | No CSP/security-header configuration | PR/deploy | Add and verify headers | M |
| S02 | P1 | Inline JS/handlers obstruct strict CSP | PR | Move to external listeners | S |
| S03 | P1 | Form lacks rate limiting and delivery monitoring | WordPress | Harden endpoint/mail path | M |
| E01 | P1 | DMARC missing | DNS/email | Add monitored DMARC rollout | M |
| E02 | P1 | Mail/web hosted through coupled apex record | DNS | Decouple before migration | M |
| SEO01 | P1 | `robots.txt` and sitemap missing | Live + PR | Add valid canonical sitemap/robots | S |
| SEO02 | P1 | No canonical tags; `www`/apex duplicate | Both | Pick host, 301, self-canonical | M |
| SEO03 | P1 | Old indexed pages now generic 404s | Live | Redirect/410 map + Search Console | M |
| SEO04 | P1 | No hreflang/locale URLs | PR | Server-rendered locale architecture | L |
| SEO05 | P1 | Legacy service/promotion URLs remain canonical | PR | New semantic routes + 301s | M |
| T01 | P1 | Site lacks authentic credibility evidence | PR | Add approved governance/team/fact proof | M |
| T02 | P1 | Exact office address omitted | PR | Publish approved address or explain contact model | S |
| T03 | P1 | Logo is low-resolution JPEG with unverified rights | PR | Obtain official vector and rights file | M |
| T04 | P1 | Generated imagery could imply a real office | PR | Use illustrative treatment/disclosure or real assets | S/M |
| UX01 | P1 | Partnership criteria are too broad | PR | Add non-sensitive qualification criteria | S |
| UX02 | P2 | Homepage is overly long/repetitive | PR | Reduce sections/copy by ~25–35% | M |
| UX03 | P2 | Thin detail pages resemble service landing pages | PR | Consolidate or deepen | M |
| UX04 | P2 | CTA vocabulary is inconsistent | PR | Define one CTA hierarchy | S |
| UX05 | P1 | No custom 404 | Both | Add branded true-404 page | S |
| PERF01 | P1 | No responsive/modern images | PR | AVIF/WebP, `srcset`, `sizes` | M |
| PERF02 | P1 | Google Fonts is external and failed in lab | Both | Self-host/subset fonts | M |
| PERF03 | P2 | Global CSS/translation payload has unused content | PR | Minify/version; split only if worthwhile | S/M |
| L10N01 | P1 | Chinese copy lacks native finance/legal approval | PR | Professional Hong Kong review | M |
| L10N02 | P1 | Client-side-only language model is poor for SEO | PR | Locale URLs/server rendering | L |
| WP01 | P1 | Homepage is in WordPress fallback `index.php` | Theme | Move to `front-page.php` | S |
| WP02 | P1 | About filename and `/about-us/` slug can mismatch | Theme | Align slug/template/page assignment | S |
| WP03 | P1 | Static and WP variants already differ | Repo | Shared source/build pipeline | L |
| WP04 | P2 | ZIP is manually committed | Repo | Build release artifact in CI | M |
| OPS01 | P1 | No automated CI quality gate | Repo | Add validation/accessibility/build checks | M |
| OPS02 | P1 | No release/rollback runbook | Operations | Document staging, approval, deploy, rollback | M |
| ANA01 | P2 | No privacy-approved analytics or event plan | Both | Add minimal measurement after PPS | M |

**Effort guide:** S = less than one day; M = roughly 1–3 working days; L = multi-day architectural/content project. Legal, approval, and external-provider lead time are separate.

---

## 27. Recommended target site architecture

A smaller, stronger site is preferable.

### 1. Home

- Exact identity: Hong Kong single family office investing own family capital
- One clear value statement
- Three investment principles
- Verified trust evidence
- What conversations are welcome
- Primary CTA: Introduce an opportunity

### 2. About

- Exact legal company facts
- Established date with approved definition
- Purpose and history
- Governance/decision responsibility
- Team or approved anonymity explanation
- What MCM is and is not, stated once

### 3. Investment Approach

- Own-capital mandate
- Portfolio context
- Qualitative opportunity criteria
- Risk/liquidity/time-horizon principles
- Role of external specialists
- No faux-service packages

### 4. Partnerships

- Opportunity introductions
- Family-office peer exchange
- Specialist relationships
- Clear qualification criteria
- What to include in a first note
- No implication of public investment access

### 5. Contact

- Contact channels
- Enquiry category
- Real secure form
- PICS
- Privacy link
- Approved response expectation

### 6. Legal / Privacy

- Privacy Policy Statement
- PICS reference
- Terms/legal notice
- Regulatory status wording
- Generated/illustrative image notice if needed

Optional pages should be added only when there is substantive approved content: Team, Insights, Careers, or detailed Investment Perspectives.

---

## 28. Recommended implementation roadmap

### Phase 0 — Stop factual and operational risk (1–5 working days plus approvals)

1. Produce corporate fact sheet.
2. Obtain legal/compliance review of SFO and opportunity wording.
3. Decide static Vercel versus WordPress production.
4. Inventory DNS, hosting, mailboxes, and existing URLs.
5. Draft PICS, Privacy Policy Statement, and legal notice.
6. Define contact owners and delivery method.
7. Freeze new public claims until approval.

### Phase 1 — Make PR #2 launch-safe (approximately 3–7 working days)

1. Apply approved legal name/date/status/contact details.
2. Replace `mailto:` with secure endpoint or select WordPress production.
3. Add PICS/privacy/legal pages.
4. Fix mobile keyboard menu, footer contrast, focus ring, and field errors.
5. Add custom 404.
6. Add security headers and remove inline event handlers.
7. Add rate limiting and authenticated mail delivery.
8. Self-host fonts.
9. Add responsive images.
10. Complete native Chinese review.

### Phase 2 — Production migration and search cleanup (approximately 2–5 working days plus DNS propagation)

1. Decouple MX from apex before DNS changes.
2. Configure Vercel/WordPress custom domain and TLS.
3. Select apex or `www` and redirect the other.
4. Implement complete legacy redirect/410 map.
5. Publish canonical, robots, sitemap, favicon, and social metadata.
6. Verify end-to-end forms and email.
7. Deploy with backup/rollback.
8. Validate every public URL after cutover.
9. Submit sitemap and recrawl requests.
10. Monitor 404s, mail, errors, and DNS.

### Phase 3 — Trust, content, and multilingual quality (1–3 weeks depending approvals)

1. Add approved authentic evidence and governance detail.
2. Clarify investment/opportunity criteria.
3. Reduce homepage repetition.
4. Consolidate or deepen thin detail pages.
5. Implement server-rendered locale URLs and hreflang.
6. Add Organization schema after fact approval.
7. Add privacy-approved analytics and conversion measurement.

### Phase 4 — Engineering maintainability (1–3 weeks)

1. Establish one content source for static and WordPress, or retire one output.
2. Correct WordPress template hierarchy.
3. Centralize company facts/configuration.
4. Add CI validation and archive builds.
5. Add dependency/security/update processes.
6. Add visual-regression and browser tests.
7. Document deployment and rollback.

---

## 29. Launch acceptance checklist

The website should not be considered complete until all items below pass.

### Facts and legal

- [ ] Exact legal name matches incorporation record
- [ ] Establishment date and definition approved
- [ ] SFO/regulated-status wording approved
- [ ] Opportunity invitation approved
- [ ] No unsupported performance claims
- [ ] Public address/contact details approved
- [ ] Logo and image rights documented

### Privacy and forms

- [ ] PICS displayed before collection
- [ ] Privacy Policy Statement published
- [ ] Real form endpoint used
- [ ] Rate limiting/spam controls active
- [ ] SMTP/API delivery authenticated
- [ ] Success, failure, and alert paths tested
- [ ] Retention and deletion documented
- [ ] Privacy contact operational

### Accessibility

- [ ] Mobile menu keyboard focus fixed
- [ ] Footer and focus contrast pass
- [ ] Form errors field-associated
- [ ] English and Chinese accessibility metadata localized
- [ ] Screen-reader and 400% zoom tests pass
- [ ] Print/no-script content remains visible

### SEO and migration

- [ ] Preferred canonical host selected
- [ ] `www`/apex redirect works
- [ ] Canonicals present
- [ ] Semantic final URLs selected
- [ ] Legacy 301/410 map works
- [ ] Robots and sitemap return 200
- [ ] Favicon and social image return 200
- [ ] Locale URLs/hreflang implemented or limitation accepted
- [ ] Custom 404 returns 404
- [ ] Search Console verified

### Performance and security

- [ ] LCP image responsive and prioritized
- [ ] Below-fold images lazy loaded
- [ ] Fonts self-hosted or privacy-approved
- [ ] Production caching/compression verified
- [ ] CSP and security headers verified
- [ ] No unexpected console errors
- [ ] WordPress infrastructure audit completed if applicable

### Deployment and DNS

- [ ] Mail routing separated before apex change
- [ ] SPF/DKIM verified after migration
- [ ] DMARC rollout started
- [ ] TLS works on apex and `www`
- [ ] Production content matches approved commit
- [ ] Rollback procedure tested
- [ ] Monitoring and owners documented

---

## 30. Questions management must answer

1. What is the exact registered legal English name?
2. Is there a registered Chinese name?
3. Is the correct incorporation/establishment date July 2012, July 2018, or another date?
4. If the entity was previously an advisory firm, when and how did its activity change to a single family office?
5. What legal analysis supports the single-family-office positioning and any licence exemption?
6. Does MCM manage only assets/interests of one family and related entities?
7. Does it receive fees, income, or profit from providing services to others?
8. May the site invite fund, company, direct-deal, or co-investment introductions publicly?
9. Which investment themes, geographies, stages, and structures can be stated publicly?
10. Can any verified experience, governance, or case-study evidence be published?
11. Who owns and approves the logo?
12. May the real office address be published?
13. Are the generated images acceptable as illustrative brand imagery?
14. Should production be Vercel static or WordPress?
15. Which team owns each enquiry category?
16. What response time can operations actually support?
17. Who is the privacy/data-access contact?
18. How long should enquiries be retained?
19. Which mail provider and mailboxes must survive the web migration?
20. Is a separate English/Traditional Chinese URL structure approved?

---

## 31. Authoritative references

- [SFC — Family Offices FAQ](https://www.sfc.hk/en/faqs/intermediaries/licensing/Family-Offices)
- [SFC — Circular on licensing obligations of family offices](https://apps.sfc.hk/edistributionWeb/api/circular/openFile?lang=EN&refNo=20EC1)
- [PCPD — Personal Information Collection Statement](https://www.pcpd.org.hk/english/about_pcpd/personal_information_collection_statement/personal_information_collection_statement.html)
- [PCPD — Guidance on preparing a PICS and Privacy Policy Statement](https://www.pcpd.org.hk/english/publications/files/GN_picspps_e.pdf)
- [PCPD — Collection and use of personal data through the Internet](https://www.pcpd.org.hk/english/publications/files/guidance_internet_e.pdf)
- [Hong Kong Companies Registry — Disclosure of company name and liability status](https://www.cr.gov.hk/en/faq/companies-ordinance/disclose-company-name-liability.htm)
- [W3C — WCAG 2.2 techniques](https://www.w3.org/WAI/WCAG22/Techniques/)
- [Google — Managing multilingual sites](https://developers.google.com/search/docs/specialty/international/managing-multi-regional-sites)
- [Google — Canonical URL guidance](https://developers.google.com/search/docs/crawling-indexing/consolidate-duplicate-urls)
- [OWASP — REST/security header guidance](https://cheatsheetseries.owasp.org/cheatsheets/REST_Security_Cheat_Sheet.html)
- [Current public homepage](https://mwealth.online/)
- [Current public Promotions page](https://mwealth.online/promotions.html)
- [Current public Contact page](https://mwealth.online/contact.html)

---

## Final assessment

PR #2 fixes the original strategic mistake: the website no longer behaves like a shop selling wealth packages. That is the correct direction.

The website's remaining risk is now concentrated in **truth, law, privacy, trust, and deployment**. A polished design cannot compensate for an uncertain legal name, three competing establishment dates, a public domain serving an older build, missing privacy notices, or a form that does not reliably deliver enquiries.

The right next step is not another visual redesign. It is a short fact/legal/operations sprint, followed by targeted accessibility, form, DNS, SEO, and content improvements. Once those are complete, the proposed design can become a credible, restrained, and appropriate public presence for a Hong Kong single family office.
