# Invest Kenya Website — Client Documentation (Extended, Detailed)

Welcome! This document is written for **non‑technical editors and clients**. It is intentionally long, structured, and step‑by‑step so anyone in the team can update the website confidently without touching code.

If you read nothing else, remember this:
> ✅ **Almost everything you see on the site comes from WordPress custom fields.**

---

## 🌍 1) Quick Overview (What this site is)
- **Platform:** WordPress
- **Editing approach:** Mostly **custom fields**, with a small amount of **Elementor**
- **Design philosophy:** No hardcoded text; content is controlled from the editor
- **Editing style:** Repeatable templates with clear fields

This site was built so that you can update content safely and consistently. Most sections are “smart blocks” that only appear **if their fields are filled**. That means:
- If you leave a field empty, the section simply won’t show.
- You don’t need a developer for normal updates.
- You should never need to edit code.

---

## 🧭 2) How To Think About Content (Mental Model)
Think of the site as a series of **blocks**:
- Each block pulls its text and images from **custom fields**.
- Elementor mostly controls spacing and layout, not content.
- If a block appears empty, it is because a field is empty.

**Practical mindset:**
1. Find the block you want to update.
2. Fill the field in WordPress.
3. Save and preview.

---

## 🏠 3) Homepage (Important)
The **homepage** is the most visible entry point to the site. It contains the primary brand messaging and typically uses the **banner slider**. This slider is **primarily used on the homepage only**, not on every page.【F:leroux-child/components/page-banner-block.php†L8-L52】

### What the homepage is for
- High‑level messaging and national narrative
- Primary CTAs (calls to action)
- Highlights of investment climate

### What to be careful with
- Banner titles should be short but strong
- Sliders should not be overloaded (too many slides = slow reading)
- Buttons should link to confirmed pages

---

## ✅ 4) Editing Any Page (Simple Step‑by‑Step)
1. Log in to WordPress.
2. Go to **Pages** and open the page you want to edit.
3. Scroll down to the **custom fields** section.
4. Fill in the text, numbers, or upload images.
5. Click **Update**.

✅ Done. The website updates immediately.

**Reminder:** If a section does not show, it is usually because the fields are empty.

---

## 🎛️ 5) Elementor Guidance (Important for News, Resources, Events, Governance)
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

## 🗺️ 6) Page‑by‑Page Content Guide (Excessively Detailed)
Below is a checklist of what each page needs. This is your “preparation list.” The more complete your content is, the smoother the update process will be.

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

**Editorial tip:** Keep each tab balanced (similar length) so one tab does not feel empty.

---

### 3) Laws and Regulations
A formal and informative page focused on legal guidance.

**What to prepare:**
- Tab titles and tab text (policies, regulations, guidance)
- Supporting links or calls‑to‑action
- Secondary explanatory content below the tabs

**Tip:** Keep this page well‑structured and skimmable, even if text is long.

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

**Tip:** Keep CTA wording consistent with global site tone.

---

### 6) Investment Opportunities (Listing Page)
Shows individual opportunity posts with filters.

**For each Opportunity post, prepare:**
- Investment Amount
- Project Stage
- County / Region

These fields power the filters and help users find what they need.【F:leroux-child/components/opportunities-filters-shortcodes.php†L94-L137】

**Tip:** If filters are empty, the listing page feels broken — always fill them.

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

**Tip:** Use consistent formatting (e.g., “Ksh 50B”, “4,000 jobs”) to keep the numbers readable.

---

### 8) Get Started
A step‑by‑step guide for investors.

**What to prepare:**
- Main title + intro paragraph
- Two step blocks (numbers + text)
- Button labels + links
- Icon grid (title + short text for each)

**Tip:** Keep each step clear and action‑oriented.

---

### 9) About Us
This page tells the story of the organization.

**What to prepare:**
- Vision / Mission / Values statements
- History highlights
- Partner logos

**Tip:** Keep mission and vision distinct (avoid repeating phrases).

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
Events appear in lists and can show in featured sliders.

**What to prepare for each Event post:**
- Event title
- Dates (start and end if multi‑day)
- Location
- Featured image
- Short event description

**Tip:** If you want the event to appear in a slider, ensure its display setting is enabled in custom fields.

---

### 13) Publications / Resources
Publications are downloadable items such as reports and PDFs.

**What to prepare for each Publication post:**
- Title
- Featured image
- Summary text
- Download link (URL)

**Tip:** Always test the download link after publishing.

---

## 🧰 7) Quality Control & Review Routine
To keep the site professional, use this review routine:

1. **Preview** before publishing.
2. Check for spelling and broken links.
3. Confirm images display correctly on mobile.
4. Confirm the page title matches the content.
5. Ensure the CTA buttons link to the right destination.

---

## 🧩 8) Common Questions (Short Answers)
- **Q: Why is a block missing?**
  - A: The fields for that block are likely empty.
- **Q: Why does my page look different?**
  - A: You may have changed the layout in Elementor. Duplicate a clean template.
- **Q: Can I add new design elements?**
  - A: Only if approved; otherwise keep layouts consistent.

---

If you want, we can also provide a **field inventory spreadsheet** or a **training walkthrough** for new editors.
