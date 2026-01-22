# Invest Kenya Website — Authoring Guide (Editor-Focused, Step-by-Step)

This is the official **hands-on authoring guide** for editors. It follows the exact workflows used on the Invest Kenya site and is intentionally **very detailed** so you can follow it step‑by‑step without technical knowledge. If you are unsure, this guide tells you **exactly where to click** and **what not to touch**.

> **Core rule:** The site is intentionally structured so that **most visible text and images come from custom fields**, not from code. That means you can update content safely without breaking layout.

---

## 0) Before You Start (Editor Checklist)
Use this quick checklist before every session so you do not miss anything.

1. **Make sure you are on the correct site:**
   - **https://beta.investkenya.go.ke/wordpress/wp-admin/**
2. **Have your content ready** in a separate document:
   - Titles, subtitles, body text
   - Links and URLs
   - Image files (properly named)
3. **Know the section you are updating:**
   - News, Events, Publications, Governance, or a Page
4. **Decide whether you need a draft or a publish:**
   - Draft if content needs review
   - Publish if approved
5. **Never experiment on a live post:**
   - Duplicate a sample post or save a draft first

---

## 1) How To Login To WordPress Dashboard
1. Open your browser.
2. Go to the WordPress admin login:
   - **https://beta.investkenya.go.ke/wordpress/wp-admin/**
3. Enter your **username** and **password**.
4. Click **Log In**.
5. You will land on the **Dashboard**.

**Tip:** If you cannot log in, ask the admin to reset your password. Do not create extra accounts without approval.

---

## 2) How To Preview Any Page or Post
Previewing lets you check how a page looks without changing anything.

1. Log in to WordPress.
2. In the left menu, click **Pages** or **Posts**.
   - **Pages** = main website pages (Home, About, Why Kenya, etc.)
   - **Posts** = News, Events, Publications, Governance
3. Find the item in the list.
4. Hover over the title.
5. Click **View**.
6. The front-end preview opens in a new tab.

**Pro tip:** Keep the preview open and refresh it after you update content so you see changes instantly.

---

## 3) News Authoring (Step‑by‑Step — Exact Workflow)
News posts should always be duplicated from a clean template to keep layout consistent.

1. Log in to WordPress.
2. Click **Posts** (left menu).
3. Use search and find the post named:
   - **“News Sample -> duplicate this”**
4. Hover over it, then click **Duplicate**.
5. Hover over the **new duplicated post**, click **Quick Edit**.
6. In Quick Edit, update:
   - **Title** (the headline)
   - **Slug** (copy/paste the same title; remove special characters if needed)
   - **Tags** (optional; add comma‑separated keywords like `Investment, Policy, Growth`)
7. **Do not change categories or layout settings.**
8. Click **Update**.
9. Hover again → click **Edit** (not Elementor yet).
10. On the right side under **Post**, set the **Featured Image**:
    - Click **Set Featured Image** or **Replace**.
    - Upload or select from Media Library.
11. Scroll down to the **custom fields** area and confirm:
    - **Display In Slider:** Yes/No
    - **Blog List Image:** select the same image as featured image
12. Click **Save Draft**.
13. Go back to **Posts**, find your draft.
14. Hover and click **Edit with Elementor**.
15. If Elementor panel is hidden, click the small icon between **Search** and the **Eye** (near Publish).
16. In Elementor, only update the **first two sections**:
    - Section 1: Image + text
    - Section 2: Text content
17. Click **Publish** or the arrow → **Save Draft**.
18. If you saved a draft, return to **Posts → Quick Edit → Status = Published → Update**.

**Final check:** Preview the post and confirm the featured image, title, and slider option are correct.

---

## 4) Events Authoring (Step‑by‑Step)
Events are almost identical to News, but require event dates and location.

1. Log in → **Posts**.
2. Search for:
   - **“Event Sample -> duplicate this”**
3. Duplicate the sample post.
4. Quick Edit the duplicate:
   - Update **Title** and **Slug**
   - Leave categories untouched
5. Click **Update**.
6. Click **Edit** (WordPress editor).
7. Set the **Featured Image**.
8. In custom fields, fill:
   - **Start Date** (required)
   - **End Date** (only if multi-day)
   - **Location** (city, venue, or region)
9. Click **Save Draft**.
10. Open **Edit with Elementor**.
11. Update only the **first section**:
    - 3 text editors
    - 1 image
    - 1 HTML widget (do **not** touch)
12. Publish or save as draft.

**Important rule:** If it is a one‑day event, leave **End Date** empty.

---

## 5) Publication Authoring (Resources)
Publications are posts that include a file download link.

1. Go to **Posts** → search:
   - **“Publication Sample -> duplicate this”**
2. Duplicate it.
3. Quick Edit:
   - Update **Title**
   - Update **Slug**
4. Click **Update**.
5. Edit the post.
6. Set the **Featured Image**.
7. In custom fields, fill:
   - **Download Link** (paste the URL of the PDF or file)
8. Save Draft.
9. Edit with Elementor.
10. Update only the **first container** (two inner containers):
    - 2 text editors
    - 1 image
    - 1 button (do **not** edit the button settings)
11. Publish or save draft.

**Tip:** Test the download link in preview before publishing.

---

## 6) Governance Authoring (Board / Senior Management)
Governance posts represent people and require a title and job position.

1. Go to **Posts** → search:
   - **“Governance Sample -> duplicate this”**
2. Duplicate it.
3. Quick Edit:
   - Update **Title** (person’s full name)
   - Update **Slug**
   - **Category:**
     - Board Members = checked for board profiles
     - Senior Management = checked for management profiles
4. Click **Update**.
5. Edit the post.
6. Set the **Featured Image** (portrait photo).
7. Fill **Job Position** in custom fields.
8. Save draft.
9. Edit with Elementor.
10. Update the first main container:
    - 3 text editors
    - 1 image
    - 1 icon (do **not** change the icon widget)
11. Publish or save draft.

**Note:** If the job position is missing, the profile may display incorrectly on listings.

---

## 7) How To Add a New Tag
1. Log in.
2. Hover **Posts** → click **Tags**.
3. Enter **Tag Name**.
4. Click **Add New Tag**.
5. To edit or delete tags: hover a tag → **Quick Edit** or **Delete**.

**Tip:** Keep tags short and consistent (e.g., “Investment”, “Policy”, “Trade”).

---

## 8) How To Add or Update Media (Images & Files)
1. Log in.
2. Click **Media** in the left menu.
3. To upload new files:
   - Click **Add New Media** → upload files
4. To edit a file:
   - Click the image/file
   - Update **Title**, **Alt Text**, or **Description**
5. To delete a file:
   - Click file → **Delete Permanently** (only if you are sure)

**Best practice:** Always add **Alt Text** for accessibility and SEO.

---

## 9) Final Quality Checklist (Before Publishing)
Use this checklist for every post or update.

✅ Title is clear and matches the slug
✅ Featured image is set and correct
✅ Required custom fields are filled
✅ Elementor sections updated only where allowed
✅ Draft or Publish status is correct
✅ Preview checked in a new tab

---

## 10) Troubleshooting (Quick Fixes)
- **I cannot see Elementor widgets:** Click the small panel icon near Publish.
- **The post looks wrong:** You likely edited the wrong section. Re‑duplicate the template.
- **The slider is not showing:** Ensure **Display In Slider = Yes**.
- **The download button does nothing:** Confirm the **Download Link** custom field.

---

If you need, we can also build **page‑specific mini‑checklists** for each major section (Why Kenya, Incentives, Laws, etc.).
