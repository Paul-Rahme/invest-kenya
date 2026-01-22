# Invest Kenya Website — Client Documentation

Welcome! This guide is written for **non-technical editors and clients**. It focuses on *what to change*, *where to change it*, and *what you should prepare* (text, images, numbers). There’s no code here—just clear, visual instructions.

---

## 🌍 At a Glance
- **Platform:** WordPress
- **Editing style:** Mostly **custom fields**, a little **Elementor**
- **Good news:** You don’t need to touch code to update content.

The website was built so that most content is not hardcoded. Instead, every page has **custom fields** in the WordPress editor (below the main content box). You fill those fields and the website updates automatically.

---

## ✅ How to Edit Any Page (Quick Steps)
1. Log in to WordPress.
2. Go to **Pages** and open the page you want to edit.
3. Scroll down to the **custom fields** section.
4. Fill in the text, numbers, or upload images as required.
5. Click **Update**.

That’s it! The site is designed to show (or hide) sections depending on whether the fields are filled.

---

## 🗺️ Page-by-Page Guide

Below is a practical guide that explains what each page needs. We focus on **what you must prepare** (text, images, numbers) so you can update quickly.

### 1) Why Kenya (Main Page)
This is a multi-section page with several content blocks.

**What you’ll prepare:**
- Strong headlines (some are split into 2 parts)
- Key stats and highlights
- Short descriptions for each section
- Icons and images
- Tab section images

**Key content areas:**
- A main “Why Kenya” section with **icons + short descriptions**.
- A **key statistics** section with large numbers and short explanations.
- A **multi-icon card block** with short supporting text.
- A **tabbed image gallery** showcasing different themes.

**Important note:** The large banner slider is **primarily used on the homepage**, not on every page.【F:leroux-child/components/page-banner-block.php†L8-L52】

---

### 2) Incentives
This page uses **tabbed sections** and a **two-column block**.

**What you’ll prepare:**
- Three tab titles
- Content for each tab (information + steps)
- Two-column text content for eligible investments

**Highlights:**
- Each tab is like a mini-section of its own.
- The page is clean and structured for easy reading.

---

### 3) Laws and Regulations
This page is focused on informative, structured content.

**What you’ll prepare:**
- Tab titles and detailed text
- Supporting links or action buttons
- Secondary explanatory text

**Best practice:** Keep text clear and structured so readers can scan quickly.

---

### 4) Investment Trends
This page shows insights and data trends.

**What you’ll prepare:**
- Key statistics
- Trend descriptions
- Supporting text blocks

**Tip:** Use short and readable summaries. This page is usually data-heavy.

---

### 5) Opportunities (Overview Page)
This is the **summary** before users explore the sector opportunities.

**What you’ll prepare:**
- Two short descriptive paragraphs
- Contact or CTA details
- A button link (example: “Contact our team”)

---

### 6) Investment Opportunities (Listing Page)
This page displays **opportunity posts**, which can be filtered.

**What you’ll prepare for each Opportunity post:**
- Investment Amount
- Project Stage
- County/Region

These fields power the filtering experience for users.【F:leroux-child/components/opportunities-filters-shortcodes.php†L94-L137】

---

### 7) Sector Pages (Agriculture, ICT, Tourism, etc.)
Each sector page has two main parts:

1. **Overview Block** (short summary + key numbers)
2. **Tabs Block** (more details, checklist items, logos)

**What you’ll prepare:**
- Overview text (short but powerful)
- Snapshot numbers and labels
- Tab titles and detailed content
- Logos/images inside tabs

---

### 8) Get Started
This page provides a **step-by-step guide** and support information.

**What you’ll prepare:**
- Main title + short intro
- Two step blocks (with numbers + text)
- Button labels + links
- Icon grid (titles + short explanations)

---

### 9) About Us
This page presents the organization’s identity and partners.

**What you’ll prepare:**
- Vision / Mission / Values statements
- Supporting text for history or milestones
- Partner logos and images

---

### 10) Governance
This is a leadership listing page.

**What you’ll prepare for each Governance post:**
- Full name
- Job position / title
- Photo

The role/title is required to display properly.【F:leroux-child/components/governance-posts-component.php†L43-L44】

---

### 11) News
The News page is populated from **News posts**.

**What you’ll prepare:**
- News post title
- Featured image
- Excerpt or short intro

---

### 12) Events
Events are also managed through posts.

**What you’ll prepare for each Event:**
- Location
- Start date
- End date

These fields allow filters and date display to work correctly.【F:leroux-child/functions.php†L236-L260】

---

### 13) Resources
Resources are downloadable publications.

**What you’ll prepare:**
- Title
- File download link (URL)
- Optional category

Download links are required so users can access files.【F:leroux-child/components/resources-filters-shortcodes.php†L84-L85】

---

### 14) Careers
Careers are managed as posts.

**What you’ll prepare for each Career post:**
- Job classification
- Location
- Description

These fields appear on the detail page.【F:leroux-child/functions.php†L186-L203】

---

## 🌟 Helpful Tips for Editors
- **Empty field = hidden block.** If something doesn’t show, check the custom fields.
- **Keep images consistent.** This makes grids and tabs look neat.
- **Shorter text works best.** Visitors scan quickly.
- **For new sections, contact a developer.** They will add new fields safely.

---

If you want, I can also provide a **visual checklist PDF** version for internal teams.
