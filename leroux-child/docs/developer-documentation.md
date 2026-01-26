# Invest Kenya WordPress Site — Developer Documentation

This is a **deep, practical reference** for developers maintaining the Invest Kenya WordPress child theme. It is intentionally verbose and explanatory so new developers can onboard quickly without guessing how things are wired.

---

## 1) How the Theme is Organized

### ✅ Folder structure (what matters most)
- **Child theme root:** `leroux-child/`
- **Custom components:** `leroux-child/components/`
- **Helper utilities:** `leroux-child/helpers/`
- **Primary entry point:** `leroux-child/functions.php`

### ✅ What `functions.php` does (important)
`functions.php` is the **central loader** for the theme. It:
- Enqueues the child theme stylesheet.
- Adds multiple **shortcodes** that are used inside Elementor sections.
- Defines custom helper behavior (e.g., related news placement, post meta display helpers).
- Loads all component files from `components/` using `require_once` so shortcodes are available site‑wide.
- Adds a redirect for 404 pages to a custom not‑found page.

If a new component is added and **not required in `functions.php`**, it will not load in production.【F:leroux-child/functions.php†L1-L23】【F:leroux-child/functions.php†L285-L339】

---

## 2) Content Philosophy (Why the site works this way)

This website is mostly **custom coded**, but intentionally avoids hardcoded text. Instead:
- **ACF fields** power nearly all text, images, icons, buttons, and statistics.
- **Post meta fields** power filters and special post‑type details.
- **Elementor** is primarily used for layout, spacing, and placement of shortcodes.

This approach allows:
- Non‑technical editors to update content.
- Designers to preserve consistent layouts.
- Developers to add new sections without rewriting templates.

---

## 3) Data Sources (ACF + Post Meta)

### A) ACF fields (page‑level content)
ACF fields drive almost every landing page section. Examples:
- **Page banner slider** (primarily used on the homepage) uses ACF for slide images, title parts, and buttons.【F:leroux-child/components/page-banner-block.php†L8-L52】
- **Why Kenya** sections use ACF for icons, stats, and tabbed image grids.【F:leroux-child/components/first-section-block-why-kenya.php†L8-L54】【F:leroux-child/components/second-section-block-why-kenya.php†L9-L77】【F:leroux-child/components/fifth-section-block-why-kenya.php†L8-L80】
- **Get Started** and **How we support investors** are ACF‑driven, including icons and button links.【F:leroux-child/components/get-started-home-page.php†L8-L64】【F:leroux-child/components/first-section-block-how-we-support-investors.php†L7-L40】

### B) Post meta (dynamic lists and details)
Custom meta keys are required for filters and detail pages:
- **Events:** `location`, `start_date`, `end_date` (filters + display).【F:leroux-child/functions.php†L236-L260】
- **Careers:** `job_classification`, `location` (detail metadata).【F:leroux-child/functions.php†L186-L203】
- **Opportunities:** `investment_ammount`, `project_stage`, `county` (filters + cards).【F:leroux-child/components/opportunities-filters-shortcodes.php†L94-L137】
- **Resources / Tenders:** `download_url` for download actions.【F:leroux-child/components/resources-filters-shortcodes.php†L84-L85】【F:leroux-child/components/tenders-posts-component.php†L21-L22】
- **Governance:** `job_position` required for leadership listings.【F:leroux-child/components/governance-posts-component.php†L43-L44】

---

## 4) Elementor Workflow (Especially for News, Events, Resources, Governance)

Many post types rely on a **consistent template layout**. The most reliable method is:
1. Duplicate an existing post (so the layout and styling are preserved).
2. Open the duplicate in **Elementor**.
3. Update only the content sections or blocks if needed (most layouts stay the same).
4. Edit the post fields (title, content, custom fields) in the WordPress editor.

This ensures:
- Layout consistency across posts
- Filters and listing views continue working
- Custom field sections stay wired correctly

This workflow applies especially to:
- **News posts**
- **Event posts**
- **Resource posts**
- **Governance profiles**

---

## 5) Elementor Page Settings CSS Fix (Leroux Theme)
The Leroux theme has a known issue: when multiple meta fields are present, it injects extra left/right padding that can break full‑width layouts. The workaround is to add **page‑specific CSS** in **Elementor → Page Settings → Custom CSS** using the page ID.

Use the page’s actual ID in the selector (example below uses `13407`):
```
.page-id-13407 .qodef-grid,
.page-id-13407 #qodef-page-content.qodef-grid,
.page-id-13407 #qodef-page-inner.qodef-content-grid,
.page-id-13407 .qodef-grid-inner {
    max-width: 100% !important;
    width: 100% !important;
}
```
Repeat this per page by replacing the ID to match the current page you are editing.

---

## 6) Page Map (Which shortcodes build which pages)

### Why Kenya
- **`[first_section_why_kenya]`** → title split + 6 icon/subtitle/text rows.【F:leroux-child/components/first-section-block-why-kenya.php†L8-L54】
- **`[second_section_block_why_kenya]`** → 3 values, mid‑text, and 5 icon cards.【F:leroux-child/components/second-section-block-why-kenya.php†L9-L77】
- **`[third_section_block_why_kenya]`** → up to 13 stat cards with icons/labels/descriptions.【F:leroux-child/components/third-section-block-why-kenya.php†L8-L112】
- **`[fourth_section_block_why_kenya]`** → title + 2 subtitles + 3 values/labels.【F:leroux-child/components/fourth-section-block-why-kenya.php†L8-L26】
- **`[fifth_section_block_why_kenya]`** → tabbed image gallery (up to 8 tabs).【F:leroux-child/components/fifth-section-block-why-kenya.php†L8-L80】

> ⚠️ The **page banner slider** (`[page_banner_block]`) is primarily used on the **homepage** and is not default for every page.【F:leroux-child/components/page-banner-block.php†L8-L52】

---

### Incentives
- **`[incentives_tabs_block]`** → tabbed incentive content with steps + CTA buttons.【F:leroux-child/components/tabs-block-benefits-protections-shortcodes.php†L6-L118】
- **`[eligible_investments_block]`** → two‑column list of eligible investment types.【F:leroux-child/components/second-section-block-benefits-protections.php†L7-L78】

---

### Laws and Regulations
- **`[laws_regulations_tabs_block]`** → tabbed legal content + CTA buttons.【F:leroux-child/components/tabs-block-laws-regulations-shortcodes.php†L18-L84】
- **`[second_section_laws_regulations]`** → secondary supporting section.【F:leroux-child/components/second-section-block-laws-regulations.php†L7-L26】

---

### Investment Trends
- **`[tabs_block_investment_trends]`** → tabbed statistics + descriptions.【F:leroux-child/components/tabs-block-investment-trends.php†L7-L28】
- **`[second_section_investment_trends]`** → supporting trend content block.【F:leroux-child/components/second-section-investment-trends.php†L9-L31】

---

### Opportunities (Overview)
- **`[sector_overview_opportunities]`** → intro + contact + CTA link/button.【F:leroux-child/components/sector-overview-block-opportunities.php†L7-L21】

---

### Investment Opportunities (Listing)
- **`[kenya_opportunities_filters]`** → filters (amount, stage, county).【F:leroux-child/components/opportunities-filters-shortcodes.php†L19-L137】
- **`[kenya_opportunities_posts]`** → grid/list output.【F:leroux-child/components/opportunities-posts-component-shortcodes.php†L11-L39】

---

### Sector Pages (Agriculture, ICT, Tourism, etc.)
Each sector uses two blocks:
- **Overview block** — sector description, snapshot values, contact details.【F:leroux-child/components/sector-overview-block-agriculture.php†L7-L35】
- **Tabs block** — deeper statistics, checklists, logos by tab.【F:leroux-child/components/sector-tabs-block-agriculture.php†L7-L40】

---

### Get Started
- **`[get_started_home_page]`** → 2‑column step layout + icon grid + buttons.【F:leroux-child/components/get-started-home-page.php†L8-L64】
- **`[how_we_support_investors]`** + **`[how_we_support_investors_second_section]`** → support content blocks.【F:leroux-child/components/first-section-block-how-we-support-investors.php†L7-L40】【F:leroux-child/components/second-section-block-how-we-support-investors.php†L7-L20】
- **`[tab_block_investing_in_kenya]`** → step‑by‑step multi‑tab guide content.【F:leroux-child/components/tab-block-investing-in-kenya.php†L8-L90】

---

### About Us
- **`[vision_mission_values_block]`** → vision/mission/values and icons.【F:leroux-child/components/vision-mission-values-block-about-invest-kenya.php†L7-L34】
- **`[partners_showcase_block]`** → partner logos grid.【F:leroux-child/components/partners-showcase-block-about-invest-kenya.php†L7-L28】
- **`[kenya_investment_history]`** → history/timeline section.【F:leroux-child/components/history-block-about-invest-kenya.php†L7-L27】
- **`[kenya_governance_block]`** → governance overview text + links.【F:leroux-child/components/governance-block-about-invest-kenya.php†L7-L33】

---

### Governance
- **`[governance_board_grid]`** / **`[governance_senior_grid]`** → leadership listings.【F:leroux-child/components/governance-posts-component-shortcodes.php†L35-L69】
- Requires `job_position` meta on posts.【F:leroux-child/components/governance-posts-component.php†L43-L44】

---

### News
- **`[kenya_news_filters]`** + **`[kenya_news_posts]`** for archives.
- **`[kenya_news_slider]`** for featured slider content.【F:leroux-child/components/news-filters-shortcodes.php†L47-L63】【F:leroux-child/components/news-posts-component-shortcodes.php†L19-L25】【F:leroux-child/components/news-slider.php†L4-L12】

---

### Events
- **`[kenya_events_filters]`**, **`[kenya_events_posts]`**, **`[kenya_events_upcoming]`**, **`[kenya_events_expired]`**, **`[kenya_events_slider]`** for events lists and filters.【F:leroux-child/components/events-filters-shortcodes.php†L18-L35】【F:leroux-child/components/events-posts-component-shortcodes.php†L10-L99】【F:leroux-child/components/events-slider-shortcodes.php†L4-L24】
- `kenya_event_meta` outputs location + date range on detail pages.【F:leroux-child/functions.php†L226-L260】

---

### Resources
- **`[kenya_resources_filters]`**, **`[kenya_resources_posts]`**, **`[kenya_resource_download_btn]`** for resource lists and downloads.【F:leroux-child/components/resources-filters-shortcodes.php†L15-L25】【F:leroux-child/components/resources-posts-component-shortcodes.php†L50-L136】

---

### Careers
- **`[careers_first_section]`** + **`[careers_second_section]`** for page content.
- **`kenya_career_meta`** outputs job classification + location on detail pages.【F:leroux-child/components/careers-first-section.php†L9-L25】【F:leroux-child/components/careers-second-section.php†L8-L17】【F:leroux-child/functions.php†L176-L213】

---

## 7) Active Plugins (Operational Dependencies — Detailed)
These plugins are active and used in production. Removing or disabling them may break site functionality.

### Core content engine
- **Advanced Custom Fields (ACF)** — the foundation of this site’s content system. ACF defines almost every field used by shortcodes (headlines, numbers, icons, links, statistics). If ACF is disabled, most custom sections will stop rendering. Keep field groups organized and use consistent naming conventions to avoid breaking template output.

### Page building & layout
- **Elementor** — primary layout tool; shortcodes are usually placed inside Elementor sections for spacing and design control.
- **Elementor Pro** — provides advanced widgets, theme builder, and dynamic data features used by editors.

### Backups & migration
- **All‑in‑One WP Migration** — full site export/import for backups.
- **All‑in‑One WP Migration Unlimited Extension** — removes import/export size limits.
- **Migrate Guru** — alternate site migration tool for large sites.

### Performance & optimization
- **LiteSpeed Cache** — page caching, minification, and performance tuning.
- **QODE Optimizer** — image compression and optimization.

### Forms & marketing
- **Contact Form 7** — contact forms and inquiry forms.
- **MC4WP (Mailchimp for WordPress)** — newsletter and signup integration.

### Translation & accessibility
- **GTranslate** — multilingual translation support.
- **Ally – Web Accessibility & Usability** — accessibility features (contrast, text resizing, etc.).

### Theme & design utilities
- **Leroux Core** — required plugin providing theme‑specific features.
- **Qode Framework** — base framework for the Qode theme ecosystem.
- **Qi Addons for Elementor** — extra Elementor widgets used in layouts.
- **Qi Blocks** — Gutenberg block library (kept active for compatibility).

### Editorial workflow utilities
- **Duplicate Page** — efficient duplication of pages/posts for consistent layout.
- **Classic Widgets** — legacy widget management support.
- **WP File Manager** — direct file access (admin‑only; use carefully).
- **Envato Market** — update management for theme and plugins via Envato.

### WooCommerce compatibility (kept active)
- **QODE Quick View for WooCommerce** — quick product previews.
- **QODE Wishlist for WooCommerce** — wishlist functionality.

---

## 8) Maintenance & Best Practices
- **Prefer ACF fields over hardcoded values** in templates.
- **Document new meta fields** when adding filters or list‑based features.
- **Register new components in `functions.php`** so they load correctly in production.【F:leroux-child/functions.php†L285-L339】
- **Keep Elementor templates consistent** by duplicating existing posts rather than starting from scratch.

---

If needed, we can also produce:
- A **diagram** of page → shortcode → data flow
- A **field inventory spreadsheet** for content editors
- A **short training video** for internal staff
