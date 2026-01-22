# Invest Kenya Website — Client Documentation

Welcome! This document is written for **non‑technical editors and clients**. It is intentionally detailed and step‑by‑step, so anyone in the team can update the website confidently without touching code.

If you read nothing else, remember this:
> ✅ **Almost everything you see on the site comes from WordPress custom fields.**

---

## 🌍 Quick Overview (What this site is)
- **Platform:** WordPress
- **Editing approach:** Mostly **custom fields**, with a small amount of **Elementor**
- **Design philosophy:** No hardcoded text; content is controlled from the editor

This site was built so that you can update content safely and consistently. Most sections are “smart blocks” that only appear if their fields are filled. That means:
- If you leave a field empty, the section simply won’t show.
- You don’t need a developer for normal updates.

---

## 🏠 Homepage (Important)
The **homepage** is the most visible entry point to the site. It contains the primary brand messaging and typically uses the **banner slider**. This slider is **primarily used on the homepage only**, not on every page.【F:leroux-child/components/page-banner-block.php†L8-L52】

Because this page carries the main narrative, any updates here should be carefully reviewed for tone, clarity, and consistency with the rest of the site.

---

## ✅ Editing Any Page (Simple Step‑by‑Step)
1. Log in to WordPress.
2. Go to **Pages** and open the page you want to edit.
3. Scroll down to the **custom fields** section.
4. Fill in the text, numbers, or upload images.
5. Click **Update**.

✅ Done. The website updates immediately.

---

## 🎛️ Elementor Guidance (Important for News, Resources, Events, Governance)
Many pages look similar and reuse the same layout. To keep the design consistent:

### When adding a *new post page* (News / Events / Resources / Governance)
1. **Duplicate** an existing post page (so the design stays consistent).
2. Open the duplicated page **with Elementor**.
3. Update the layout blocks **only if necessary** (usually you don’t need to change layout).
4. Edit the post itself (title, content, featured image, and required custom fields).
5. Save and update.

This method ensures:
- The layout matches the current style
- Custom field sections work properly
- The new post looks the same as other posts in that section

✅ **Tip:** Use the **Duplicate Page** plugin for fast duplication.

---

## 🗺️ Page‑by‑Page Content Guide
Below is a detailed checklist of what each page needs. This is your “preparation list.”

---

### 1) Why Kenya (Main Page)
A multi‑section landing page that highlights why investors should consider Kenya.

**What to prepare:**
- Strong headlines (often split into 2 parts)
- Key statistics and highlights
- Short explanatory text for each block
- Icons and supporting images
- Images for tabbed sections

**Main content areas:**
- **Hero reasons section** (icons + short text)
- **Statistics section** (big numbers + explanations)
- **Cards section** (icons with short supporting text)
- **Tabbed image gallery** (visual showcase)

**Important note:** The large banner slider is **primarily used on the homepage**, not on every page.【F:leroux-child/components/page-banner-block.php†L8-L52】

---

### 2) Incentives
A structured page for incentives and investment benefits.

**What to prepare:**
- Three tab titles
- Detailed text for each tab (info blocks + steps)
- Two‑column content for eligible investments

**Why it matters:**
- Tabs allow lots of information without overwhelming the page
- The two‑column block makes long text easier to read

---

### 3) Laws and Regulations
A formal and informative page focused on legal guidance.

**What to prepare:**
- Tab titles and tab text (policies, regulations, guidance)
- Supporting links or calls‑to‑action
- Secondary explanatory content below the tabs

**Tip:** Keep this page well‑structured and skimmable.

---

### 4) Investment Trends
A data‑driven page that shows growth, patterns, and opportunities.

**What to prepare:**
- Strong statistical highlights
- Trend descriptions
- Supporting text blocks

**Tip:** Readers scan this page, so keep text concise and data clear.

---

### 5) Opportunities (Overview Page)
This page introduces opportunities before visitors dive into sector details.

**What to prepare:**
- Two short paragraphs
- Contact or CTA text
- Button label + link

---

### 6) Investment Opportunities (Listing Page)
Shows individual opportunity posts with filters.

**For each Opportunity post, prepare:**
- Investment Amount
- Project Stage
- County / Region

These fields power the filters and help users find what they need.【F:leroux-child/components/opportunities-filters-shortcodes.php†L94-L137】

---

### 7) Sector Pages (Agriculture, ICT, Tourism, etc.)
Every sector page has two big sections:

1. **Overview Block** — short intro + key numbers
2. **Tabs Block** — deeper details, checklists, logos

**What to prepare:**
- Strong overview text
- Snapshot numbers + labels
- Tab titles and descriptions
- Logos/images inside each tab

---

### 8) Get Started
A step‑by‑step guide for investors.

**What to prepare:**
- Main title + intro paragraph
- Two step blocks (numbers + text)
- Button labels + links
- Icon grid (title + short text for each)

---

### 9) About Us
This page tells the story of the organization.

**What to prepare:**
- Vision / Mission / Values statements
- History highlights
- Partner logos

---

### 10) Governance
Leadership listing page.

**What to prepare for each Governance post:**
- Full name
- Job position / title
- Photo

**Important:** The job position/title is required to display correctly.【F:leroux-child/components/governance-posts-component.php†L43-L44】

---

### 11) News
Populated from News posts.

**What to prepare for each News post:**
- Title
- Featured image
- Short excerpt or intro paragraph

**Best practice:** Duplicate a previous news post layout to keep styling consistent (see Elementor guidance above).

---

### 12) Events
Populated from Events posts.

**What to prepare for each Event:**
- Location
- Start date
- End date

These fields allow filters and date display to work properly.【F:leroux-child/functions.php†L236-L260】

---

### 13) Resources
Resources are downloadable documents.

**What to prepare for each Resource:**
- Title
- Download link (URL)
- Optional category or type

Download links are required so users can access files.【F:leroux-child/components/resources-filters-shortcodes.php†L84-L85】

---

### 14) Careers
Managed as posts.

**What to prepare for each Career post:**
- Job classification
- Location
- Description

These fields appear on the job detail page.【F:leroux-child/functions.php†L186-L203】

---

## 🧩 Plugins in Use (Active — Explained)
Below is a plain‑language explanation of each active plugin and why it matters.

### ⭐ Core content system
- **Advanced Custom Fields (ACF)** — the most important plugin on the site. It creates the extra fields you see below the editor (titles, numbers, icons, links, etc.). If ACF is disabled, most page sections will stop working. Always keep it active and updated.

### ⭐ Page building & layout
- **Elementor** — the visual page builder used for layouts and section placement.
- **Elementor Pro** — adds advanced widgets, theme builder tools, and dynamic capabilities.

### ⭐ Backups & migration
- **All‑in‑One WP Migration** — export/import full site backups.
- **All‑in‑One WP Migration Unlimited Extension** — removes size limits during migration.
- **Migrate Guru** — alternative migration tool for moving the site.

### ⭐ Performance & optimization
- **LiteSpeed Cache** — speeds up the site with caching and optimization tools.
- **QODE Optimizer** — compresses and optimizes images across the site.

### ⭐ Forms & marketing
- **Contact Form 7** — powers contact and enquiry forms.
- **MC4WP (Mailchimp for WordPress)** — connects the site to Mailchimp for newsletter signups.

### ⭐ Translation & accessibility
- **GTranslate** — adds multilingual translation support.
- **Ally – Web Accessibility & Usability** — provides accessibility tools (contrast, resizing, etc.).

### ⭐ Theme & design utilities
- **Leroux Core** — required for theme‑specific features (shortcodes, custom blocks).
- **Qode Framework** — the foundation framework for the theme.
- **Qi Addons for Elementor** — extra Elementor widgets.
- **Qi Blocks** — additional Gutenberg blocks.

### ⭐ Editorial workflow
- **Duplicate Page** — duplicating pages/posts quickly (very useful for consistent layout).
- **Classic Widgets** — keeps the classic widget screen.
- **WP File Manager** — direct file access (use carefully; only for admins).
- **Envato Market** — used for theme and plugin updates from Envato.

### ⭐ WooCommerce compatibility (kept active)
- **QODE Quick View for WooCommerce** — quick product preview.
- **QODE Wishlist for WooCommerce** — wishlist feature.

---

## 🌟 Extra Tips for Editors
- **Empty field = hidden section.** If something disappears, check the custom fields.
- **Keep image sizes consistent.** It improves layouts in grids and tabs.
- **Keep paragraphs short.** The website is designed for scanning.
- **When in doubt, duplicate a similar page/post** and replace content.

---

If you want, we can also create:
- A **visual PDF checklist**
- A **field inventory** for each page
- A **training walkthrough video**
