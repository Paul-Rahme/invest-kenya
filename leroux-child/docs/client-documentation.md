# Invest Kenya WordPress Site — Client Documentation

## Purpose
This documentation explains **how to update each page** of the Invest Kenya site using WordPress. The site is mostly custom-coded, but it is designed to be editable through **custom fields** (no hardcoded values) and a small number of Elementor sections. Use this guide to update content without touching code.

## How content is managed
- **Custom fields (ACF)** drive most page content (titles, numbers, icons, text blocks, buttons). These appear below the WordPress editor on each page.
- **Shortcodes** are placed inside Elementor sections. Each shortcode renders a custom-coded block.
- **Posts** (News, Events, Resources, Opportunities, Careers, Governance) are used to populate archive grids and filters.

---

## Page-by-page editing checklist

### Why Kenya (main page)
**Shortcodes used (in Elementor sections):**
- `[page_banner_block]` — 3-slide banner with title parts, images, and buttons. Update the slide fields in the page’s custom fields panel (each slide has image, title part one/two, and two buttons).【F:leroux-child/components/page-banner-block.php†L8-L52】
- `[first_section_why_kenya]` — Title split with `//` and six icon + subtitle + text items.【F:leroux-child/components/first-section-block-why-kenya.php†L8-L54】
- `[second_section_block_why_kenya]` — Main title, three key value blocks, a mid text area, and five icon cards with text.【F:leroux-child/components/second-section-block-why-kenya.php†L9-L77】
- `[third_section_block_why_kenya]` — Main title, subtitle, and up to 13 statistic blocks with icons/values/labels/descriptions.【F:leroux-child/components/third-section-block-why-kenya.php†L8-L112】
- `[fourth_section_block_why_kenya]` — Main title with 3 values and labels + two subtitles.【F:leroux-child/components/fourth-section-block-why-kenya.php†L8-L26】
- `[fifth_section_block_why_kenya]` — Tabs + image grids (up to 8 tabs, 4 images each), plus bottom text.【F:leroux-child/components/fifth-section-block-why-kenya.php†L8-L80】

**What you need to fill in:**
- Banner slides: images, title lines, button texts, and button links.
- Each section: titles, text blocks, icons, and images based on the fields shown in the editor.
- If a section is empty, that portion won’t display.

---

### Incentives
**Shortcodes used:**
- `[page_banner_block]` — page banner (same as above).【F:leroux-child/components/page-banner-block.php†L8-L52】
- `[incentives_tabs_block]` — 3-tab incentives content with titles, info blocks, step lists, and buttons (tab labels are also editable).【F:leroux-child/components/tabs-block-benefits-protections-shortcodes.php†L6-L118】
- `[eligible_investments_block]` — two-column “Eligible investments” block (titles, subtitles, and multiple text paragraphs).【F:leroux-child/components/second-section-block-benefits-protections.php†L7-L78】

**What you need to fill in:**
- Tab labels and all tab text fields (titles, info entries, steps, buttons).
- Eligible investment section titles and both left/right column text entries.

---

### Laws and Regulations
**Shortcodes used:**
- `[page_banner_block]` — page banner (same as above).【F:leroux-child/components/page-banner-block.php†L8-L52】
- `[laws_regulations_tabs_block]` — tabs with detailed law/regulation content and button links (tab labels also editable).【F:leroux-child/components/tabs-block-laws-regulations-shortcodes.php†L18-L84】
- `[second_section_laws_regulations]` — secondary block with additional content and calls-to-action.【F:leroux-child/components/second-section-block-laws-regulations.php†L7-L26】

**What you need to fill in:**
- Tab labels and all tab text/CTA fields.
- Secondary section title/text/CTA fields as shown in the editor.

---

### Investment Trends
**Shortcodes used:**
- `[page_banner_block]` — page banner (same as above).【F:leroux-child/components/page-banner-block.php†L8-L52】
- `[tabs_block_investment_trends]` — tabbed content with statistics and descriptions.【F:leroux-child/components/tabs-block-investment-trends.php†L7-L28】
- `[second_section_investment_trends]` — second section with additional trend data and supporting text.【F:leroux-child/components/second-section-investment-trends.php†L9-L31】

**What you need to fill in:**
- All tab content, statistics, and descriptions.
- Secondary section titles, texts, and any CTA fields displayed.

---

### Opportunities (overview page)
**Shortcodes used:**
- `[page_banner_block]` — page banner (same as above).【F:leroux-child/components/page-banner-block.php†L8-L52】
- `[sector_overview_opportunities]` — overview with description, contact details, and CTA link/button.【F:leroux-child/components/sector-overview-block-opportunities.php†L7-L21】

**What you need to fill in:**
- Sector overview descriptions (two text fields), contact details, and CTA link/button fields.

---

### Investment Opportunities (listing page)
**Shortcodes used:**
- `[kenya_opportunities_filters]` — filter bar driven by post meta (investment amount, project stage, county).【F:leroux-child/components/opportunities-filters-shortcodes.php†L19-L137】
- `[kenya_opportunities_posts]` — renders opportunity cards in a grid/list layout.【F:leroux-child/components/opportunities-posts-component-shortcodes.php†L11-L39】

**What you need to fill in:**
- For each Opportunity post, add **Investment Amount**, **Project Stage**, and **County** in the post’s custom fields so it can be filtered correctly.【F:leroux-child/components/opportunities-filters-shortcodes.php†L94-L137】

---

### Sector Pages (Agriculture, Blue Economy, Building & Construction, Creative Economy, Forestry & Climate, ICT & BPO, Infrastructure, Manufacturing, Mining, PPPs, Tourism, Other Sectors)
Each sector uses two building blocks:
1. **Overview block** (summary, snapshots, contact, CTA).
2. **Tabs block** (statistics, checklists, and partner logos).

**Shortcodes used (examples):**
- Overview shortcodes like `[sector_overview_agriculture]`, `[sector_overview_blue_economy]`, etc., with sector descriptions, snapshot numbers, and contact info.【F:leroux-child/components/sector-overview-block-agriculture.php†L7-L35】
- Tabs shortcodes like `[sector_tabs_agriculture]`, `[sector_tabs_ict_bpo]`, etc., which draw tab labels, snapshots, checklists, and logos from custom fields.【F:leroux-child/components/sector-tabs-block-agriculture.php†L7-L40】

**What you need to fill in:**
- Overview text + snapshot numbers/labels + contact details for each sector page.
- Tab titles, snapshot values, checklist items, and logos per tab.

---

### Get Started
**Shortcodes used:**
- `[get_started_home_page]` — main Get Started section with two columns, step numbers, titles, description, and icon grid + buttons.【F:leroux-child/components/get-started-home-page.php†L8-L64】
- `[how_we_support_investors]` and `[how_we_support_investors_second_section]` — “How we support investors” content blocks with titles, icons, and descriptive text.【F:leroux-child/components/first-section-block-how-we-support-investors.php†L7-L26】【F:leroux-child/components/second-section-block-how-we-support-investors.php†L7-L20】
- `[tab_block_investing_in_kenya]` — tabbed guide content for “Step by step guide.”【F:leroux-child/components/tab-block-investing-in-kenya.php†L8-L34】

**What you need to fill in:**
- Main Get Started fields (titles, step numbers, descriptions, buttons, and icon cards).
- Support section titles, icon images, and text entries.
- Step-by-step guide tab fields and text.

---

### About Us
**Shortcodes used:**
- `[vision_mission_values_block]` — vision/mission/values blocks and icon cards.【F:leroux-child/components/vision-mission-values-block-about-invest-kenya.php†L7-L34】
- `[partners_showcase_block]` — partner logos/images grid.【F:leroux-child/components/partners-showcase-block-about-invest-kenya.php†L7-L28】
- `[kenya_investment_history]` — history section content (timeline-style).【F:leroux-child/components/history-block-about-invest-kenya.php†L7-L27】
- `[kenya_governance_block]` — governance overview block (titles + text).【F:leroux-child/components/governance-block-about-invest-kenya.php†L7-L22】

**What you need to fill in:**
- Vision, mission, values titles and icon texts.
- Partner logos/images for the showcase grid.
- History narrative and key milestones.
- Governance section intro text.

---

### Governance (people listings)
**Shortcodes used:**
- `[governance_board_grid]`, `[governance_senior_grid]` — grids of leadership profiles.【F:leroux-child/components/governance-posts-component-shortcodes.php†L35-L69】

**What you need to fill in:**
- Each Governance post should include a **job_position** field to display roles/titles in the grid.【F:leroux-child/components/governance-posts-component.php†L43-L44】

---

### News
**Shortcodes used:**
- `[kenya_news_filters]` — filter bar for the News archive.【F:leroux-child/components/news-filters-shortcodes.php†L47-L63】
- `[kenya_news_posts]` — news post grid or list output.【F:leroux-child/components/news-posts-component-shortcodes.php†L19-L25】
- `[kenya_news_slider]` — optional slider component for featured posts.【F:leroux-child/components/news-slider.php†L4-L12】

**What you need to fill in:**
- Create/edit News posts in WordPress as normal.
- Use categories/tags as needed for filtering.

---

### Events
**Shortcodes used:**
- `[kenya_events_filters]` — events filter bar (uses event location meta).【F:leroux-child/components/events-filters-shortcodes.php†L18-L35】
- `[kenya_events_posts]`, `[kenya_events_upcoming]`, `[kenya_events_expired]` — event lists by status.【F:leroux-child/components/events-posts-component-shortcodes.php†L10-L99】
- `[kenya_events_slider]` — optional event slider.【F:leroux-child/components/events-slider-shortcodes.php†L4-L24】

**What you need to fill in:**
- Each Event post should have **location**, **start_date**, and **end_date** custom fields. These power the filters and date displays.【F:leroux-child/functions.php†L236-L260】

---

### Resources
**Shortcodes used:**
- `[kenya_resources_filters]` — resource filters.【F:leroux-child/components/resources-filters-shortcodes.php†L15-L25】
- `[kenya_resources_posts]` — resources grid/list output.【F:leroux-child/components/resources-posts-component-shortcodes.php†L50-L56】
- `[kenya_resource_download_btn]` — download button uses a `download_url` custom field.【F:leroux-child/components/resources-posts-component-shortcodes.php†L128-L136】

**What you need to fill in:**
- Each Resource post should include a **download_url** custom field for the download button to work.【F:leroux-child/components/resources-filters-shortcodes.php†L84-L85】

---

### Careers
**Shortcodes used:**
- `[careers_first_section]`, `[careers_second_section]` — header and content sections for the Careers page.【F:leroux-child/components/careers-first-section.php†L9-L25】【F:leroux-child/components/careers-second-section.php†L8-L17】

**What you need to fill in:**
- Each Career post should include **job_classification** and **location** fields to show on the detail view.【F:leroux-child/functions.php†L186-L203】

---

### Help
Use the standard WordPress editor or Elementor content as needed (no custom shortcode required unless you add one).

---

## Tips
- If a section looks empty, check the page’s custom fields panel—missing values hide that section.
- Keep image sizes consistent in each grid/tab for cleaner layouts.
- For any new section, ask a developer to add new custom fields and a shortcode.
