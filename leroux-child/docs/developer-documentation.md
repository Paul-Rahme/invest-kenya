# Invest Kenya WordPress Site — Developer Documentation

## Architecture overview
- The child theme registers its styles and **loads all custom component files** (shortcode-driven sections) in `functions.php`. This is the primary entry point for the theme’s custom functionality.【F:leroux-child/functions.php†L1-L23】【F:leroux-child/functions.php†L285-L339】
- Page content is built almost entirely from **ACF fields** accessed via `get_field()` and custom post meta accessed via `get_post_meta()` in the component files.
- Elementor is used as a layout container; each Elementor section typically contains a shortcode that renders a fully custom block.

## Content model (ACF + Post Meta)
### ACF-driven blocks
Most components pull their data from ACF field groups. Examples include:
- **Page banners** with up to 3 slides (image, title parts, buttons).【F:leroux-child/components/page-banner-block.php†L8-L52】
- **Why Kenya sections** with title splits, icons, values, and tabbed image grids.【F:leroux-child/components/first-section-block-why-kenya.php†L8-L54】【F:leroux-child/components/second-section-block-why-kenya.php†L9-L77】【F:leroux-child/components/fifth-section-block-why-kenya.php†L8-L80】
- **Get Started** main section and “How we support investors” sections (titles, icons, button links).【F:leroux-child/components/get-started-home-page.php†L8-L64】【F:leroux-child/components/first-section-block-how-we-support-investors.php†L7-L40】
- **Incentives** tabs and eligible investments blocks with two-column content.【F:leroux-child/components/tabs-block-benefits-protections-shortcodes.php†L6-L118】【F:leroux-child/components/second-section-block-benefits-protections.php†L7-L78】
- **Laws & Regulations** and **Investment Trends** tabs/sections with structured fields.【F:leroux-child/components/tabs-block-laws-regulations-shortcodes.php†L18-L84】【F:leroux-child/components/tabs-block-investment-trends.php†L7-L28】

### Post meta used in lists and detail pages
Custom meta fields are required for several post types and filters:
- **Events:** `location`, `start_date`, `end_date` (drives filters and detail meta display).【F:leroux-child/functions.php†L236-L260】
- **Careers:** `job_classification`, `location` for detail meta display.【F:leroux-child/functions.php†L186-L203】
- **Governance:** `job_position` used in governance listings.【F:leroux-child/components/governance-posts-component.php†L43-L44】
- **Resources/Tenders:** `download_url` for download buttons.【F:leroux-child/components/resources-filters-shortcodes.php†L84-L85】【F:leroux-child/components/tenders-posts-component.php†L21-L22】
- **Opportunities:** `investment_ammount`, `project_stage`, `county` for filtering and output.【F:leroux-child/components/opportunities-filters-shortcodes.php†L94-L137】

## Page map (shortcodes + fields)
Use this map when building or editing pages in Elementor.

### Why Kenya
- `[page_banner_block]` (slides: `image_*_slider`, `title_part_*`, `first_button_*`, `second_button_*`).【F:leroux-child/components/page-banner-block.php†L8-L52】
- `[first_section_why_kenya]` (title split on `//`, 6 icon/subtitle/text rows).【F:leroux-child/components/first-section-block-why-kenya.php†L8-L54】
- `[second_section_block_why_kenya]` (main title, 3 value blocks, mid text, 5 icon cards).【F:leroux-child/components/second-section-block-why-kenya.php†L9-L77】
- `[third_section_block_why_kenya]` (main title + subtitle + 13 stat cards).【F:leroux-child/components/third-section-block-why-kenya.php†L8-L112】
- `[fourth_section_block_why_kenya]` (title, 2 subtitles, 3 values/labels).【F:leroux-child/components/fourth-section-block-why-kenya.php†L8-L26】
- `[fifth_section_block_why_kenya]` (tab labels + up to 8 tab image grids).【F:leroux-child/components/fifth-section-block-why-kenya.php†L8-L80】

### Incentives
- `[incentives_tabs_block]` (3-tab structured content, titles, steps, CTA buttons).【F:leroux-child/components/tabs-block-benefits-protections-shortcodes.php†L6-L118】
- `[eligible_investments_block]` (two-column layout with multiple titles/texts).【F:leroux-child/components/second-section-block-benefits-protections.php†L7-L78】

### Laws and Regulations
- `[laws_regulations_tabs_block]` (tabbed structure for legal content + CTA).【F:leroux-child/components/tabs-block-laws-regulations-shortcodes.php†L18-L84】
- `[second_section_laws_regulations]` (secondary content block).【F:leroux-child/components/second-section-block-laws-regulations.php†L7-L26】

### Investment Trends
- `[tabs_block_investment_trends]` (tabbed statistics + text).【F:leroux-child/components/tabs-block-investment-trends.php†L7-L28】
- `[second_section_investment_trends]` (secondary trends content).【F:leroux-child/components/second-section-investment-trends.php†L9-L31】

### Opportunities (overview)
- `[sector_overview_opportunities]` (two descriptions + contact + CTA).【F:leroux-child/components/sector-overview-block-opportunities.php†L7-L21】

### Investment Opportunities (listing)
- `[kenya_opportunities_filters]` (filters by meta).【F:leroux-child/components/opportunities-filters-shortcodes.php†L19-L137】
- `[kenya_opportunities_posts]` (list/grid output).【F:leroux-child/components/opportunities-posts-component-shortcodes.php†L11-L39】

### Sector pages
Each sector uses:
- **Overview shortcode** (sector description + snapshots + contact info). Example: `[sector_overview_agriculture]` uses `sector_description_*`, `snapshot_*`, and contact fields.【F:leroux-child/components/sector-overview-block-agriculture.php†L7-L35】
- **Tabs shortcode** (tab titles, snapshots, checklists, logos). Example: `[sector_tabs_agriculture]` uses `tab_title_*`, snapshot values, checklists, and logos per tab.【F:leroux-child/components/sector-tabs-block-agriculture.php†L7-L40】

### Get Started
- `[get_started_home_page]` (two-column layout with step numbers, buttons, and icon grid).【F:leroux-child/components/get-started-home-page.php†L8-L64】
- `[how_we_support_investors]` and `[how_we_support_investors_second_section]` (support content blocks).【F:leroux-child/components/first-section-block-how-we-support-investors.php†L7-L40】【F:leroux-child/components/second-section-block-how-we-support-investors.php†L7-L20】
- `[tab_block_investing_in_kenya]` (6-tab step-by-step guide; each tab has its own number/title/description and image cards).【F:leroux-child/components/tab-block-investing-in-kenya.php†L8-L90】

### About Us
- `[vision_mission_values_block]` (vision/mission/values + icon list).【F:leroux-child/components/vision-mission-values-block-about-invest-kenya.php†L7-L34】
- `[partners_showcase_block]` (partner logos/images).【F:leroux-child/components/partners-showcase-block-about-invest-kenya.php†L7-L28】
- `[kenya_investment_history]` (history/timeline content).【F:leroux-child/components/history-block-about-invest-kenya.php†L7-L27】
- `[kenya_governance_block]` (governance overview text/links).【F:leroux-child/components/governance-block-about-invest-kenya.php†L7-L33】

### Governance
- `[governance_board_grid]`, `[governance_senior_grid]` render leadership lists.【F:leroux-child/components/governance-posts-component-shortcodes.php†L35-L69】
- Ensure each governance post includes a `job_position` meta field for display.【F:leroux-child/components/governance-posts-component.php†L43-L44】

### News
- `[kenya_news_filters]` + `[kenya_news_posts]` for list pages; `[kenya_news_slider]` for featured slider views.【F:leroux-child/components/news-filters-shortcodes.php†L47-L63】【F:leroux-child/components/news-posts-component-shortcodes.php†L19-L25】【F:leroux-child/components/news-slider.php†L4-L12】

### Events
- `[kenya_events_filters]`, `[kenya_events_posts]`, `[kenya_events_upcoming]`, `[kenya_events_expired]`, `[kenya_events_slider]` for event listings/filters/slider.【F:leroux-child/components/events-filters-shortcodes.php†L18-L35】【F:leroux-child/components/events-posts-component-shortcodes.php†L10-L99】【F:leroux-child/components/events-slider-shortcodes.php†L4-L24】
- Detail meta uses `kenya_event_meta` shortcode (location + date range).【F:leroux-child/functions.php†L226-L260】

### Resources
- `[kenya_resources_filters]`, `[kenya_resources_posts]`, `[kenya_resource_download_btn]` for resource listings and downloads.【F:leroux-child/components/resources-filters-shortcodes.php†L15-L25】【F:leroux-child/components/resources-posts-component-shortcodes.php†L50-L136】

### Careers
- `[careers_first_section]`, `[careers_second_section]` for page sections, `kenya_career_meta` for detail metadata output.【F:leroux-child/components/careers-first-section.php†L9-L25】【F:leroux-child/components/careers-second-section.php†L8-L17】【F:leroux-child/functions.php†L176-L213】

## Notes for future development
- Prefer adding new content via ACF fields + shortcodes rather than hardcoding text.
- If you add new components, register them in `functions.php` alongside the existing `require_once` list so they load in production.【F:leroux-child/functions.php†L285-L339】
- When creating new filters, define the required post meta fields and ensure they are documented for content editors.
