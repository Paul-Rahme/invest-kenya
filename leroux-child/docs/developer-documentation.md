# Invest Kenya WordPress Site — Developer Documentation

This document is a **developer-facing, detailed reference** for the Invest Kenya WordPress child theme. It aims to be more readable and less “code-like” while still giving you everything you need to maintain or extend the site.

---

## 1) Architecture Overview (How the site is built)

### ✅ Theme structure
- **Child theme:** `leroux-child`
- **Custom components:** stored in `leroux-child/components/`
- **Entry point:** `leroux-child/functions.php` loads most custom blocks and registers shortcodes.【F:leroux-child/functions.php†L1-L23】【F:leroux-child/functions.php†L285-L339】

### ✅ Content philosophy
Most of the site is **not hardcoded**. Instead:
- Every major section pulls data from **ACF custom fields**.
- Post lists (News, Events, Opportunities, etc.) use **post meta** for filtering and detail display.
- Elementor is mostly used as a **layout wrapper**, while custom shortcodes generate the HTML.

---

## 2) How Content is Wired (Data Sources)

### A) ACF Fields (page-level content)
These fields power almost all landing-page content. Examples:
- **Page banners** (title lines, buttons, slider images) are pulled from ACF fields when used on the homepage.【F:leroux-child/components/page-banner-block.php†L8-L52】
- **Why Kenya** blocks use ACF to render icons, stats, multi-column text, and tabbed image galleries.【F:leroux-child/components/first-section-block-why-kenya.php†L8-L54】【F:leroux-child/components/second-section-block-why-kenya.php†L9-L77】【F:leroux-child/components/fifth-section-block-why-kenya.php†L8-L80】
- **Get Started** and **How we support investors** are also fully ACF-driven.【F:leroux-child/components/get-started-home-page.php†L8-L64】【F:leroux-child/components/first-section-block-how-we-support-investors.php†L7-L40】

### B) Post Meta (dynamic lists + details)
Custom meta keys are required for filters and detail sections:
- **Events:** `location`, `start_date`, `end_date` drive filters and metadata output.【F:leroux-child/functions.php†L236-L260】
- **Careers:** `job_classification`, `location` for job detail display.【F:leroux-child/functions.php†L186-L203】
- **Opportunities:** `investment_ammount`, `project_stage`, `county` for filters and cards.【F:leroux-child/components/opportunities-filters-shortcodes.php†L94-L137】
- **Resources/Tenders:** `download_url` for download actions.【F:leroux-child/components/resources-filters-shortcodes.php†L84-L85】【F:leroux-child/components/tenders-posts-component.php†L21-L22】
- **Governance:** `job_position` is required for leadership listings.【F:leroux-child/components/governance-posts-component.php†L43-L44】

---

## 3) Page Map (Which shortcodes build each page)

This section gives a practical “map” to understand which blocks build each page and what data they expect.

### Why Kenya
- **`[first_section_why_kenya]`** → title split + 6 icon/subtitle/text rows.【F:leroux-child/components/first-section-block-why-kenya.php†L8-L54】
- **`[second_section_block_why_kenya]`** → 3 values, mid-text, and 5 icon cards.【F:leroux-child/components/second-section-block-why-kenya.php†L9-L77】
- **`[third_section_block_why_kenya]`** → up to 13 stat cards with icons/labels/descriptions.【F:leroux-child/components/third-section-block-why-kenya.php†L8-L112】
- **`[fourth_section_block_why_kenya]`** → title + 2 subtitles + 3 values/labels.【F:leroux-child/components/fourth-section-block-why-kenya.php†L8-L26】
- **`[fifth_section_block_why_kenya]`** → tabbed image gallery (up to 8 tabs).【F:leroux-child/components/fifth-section-block-why-kenya.php†L8-L80】

> ⚠️ The **page banner slider** (`[page_banner_block]`) is primarily used on the **homepage**. It is not a default block for every page.【F:leroux-child/components/page-banner-block.php†L8-L52】

---

### Incentives
- **`[incentives_tabs_block]`** → tabbed incentive content with steps + CTA buttons.【F:leroux-child/components/tabs-block-benefits-protections-shortcodes.php†L6-L118】
- **`[eligible_investments_block]`** → two-column list of eligible investment types.【F:leroux-child/components/second-section-block-benefits-protections.php†L7-L78】

---

### Laws and Regulations
- **`[laws_regulations_tabs_block]`** → tabbed legal content + CTA buttons.【F:leroux-child/components/tabs-block-laws-regulations-shortcodes.php†L18-L84】
- **`[second_section_laws_regulations]`** → secondary supporting section.【F:leroux-child/components/second-section-block-laws-regulations.php†L7-L26】

---

### Investment Trends
- **`[tabs_block_investment_trends]`** → tabbed statistics + descriptions.【F:leroux-child/components/tabs-block-investment-trends.php†L7-L28】
- **`[second_section_investment_trends]`** → additional trend content block.【F:leroux-child/components/second-section-investment-trends.php†L9-L31】

---

### Opportunities (Overview)
- **`[sector_overview_opportunities]`** → intro + contact + CTA link/button.【F:leroux-child/components/sector-overview-block-opportunities.php†L7-L21】

---

### Investment Opportunities (Listing)
- **`[kenya_opportunities_filters]`** → filters (amount, project stage, county).【F:leroux-child/components/opportunities-filters-shortcodes.php†L19-L137】
- **`[kenya_opportunities_posts]`** → opportunity grid/list output.【F:leroux-child/components/opportunities-posts-component-shortcodes.php†L11-L39】

---

### Sector Pages (Agriculture, ICT, Tourism, etc.)
Each sector uses two main components:
- **Overview block** — sector description, snapshot values, contact details.【F:leroux-child/components/sector-overview-block-agriculture.php†L7-L35】
- **Tabs block** — deeper statistics, checklists, logos by tab.【F:leroux-child/components/sector-tabs-block-agriculture.php†L7-L40】

---

### Get Started
- **`[get_started_home_page]`** → 2-column step layout + icon grid + buttons.【F:leroux-child/components/get-started-home-page.php†L8-L64】
- **`[how_we_support_investors]`** + **`[how_we_support_investors_second_section]`** → support content blocks.【F:leroux-child/components/first-section-block-how-we-support-investors.php†L7-L40】【F:leroux-child/components/second-section-block-how-we-support-investors.php†L7-L20】
- **`[tab_block_investing_in_kenya]`** → step-by-step multi-tab guide content.【F:leroux-child/components/tab-block-investing-in-kenya.php†L8-L90】

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

## 4) Maintenance Guidance (Best Practices)
- **Use ACF for content** whenever possible; avoid hardcoding text in PHP templates.
- **Document new meta fields** when you add filters or post-based features.
- **Register new components** in `functions.php` to ensure they load in production.【F:leroux-child/functions.php†L285-L339】

---

If you want, I can also provide:
- A **diagram** of page → shortcode → data flow
- A **field inventory list** (exportable checklist for editors)
