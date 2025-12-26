# Invest Kenya starter

A monorepo scaffold for an informational site and lightweight CMS built with a Node/Express API and a React front-end (Vite). Use it as a starting point to build and edit pages without redeploying.

## Getting started

1. Install dependencies
   ```bash
   cd backend && npm install
   cd ../frontend && npm install
   ```
2. Run the API
   ```bash
   cd backend
   npm run dev
   ```
3. In a separate terminal, run the React app
   ```bash
   cd frontend
   npm run dev
   ```
   The dev server proxies API requests to `localhost:4000`.

## Folder structure
- `backend/`: Express server with JSON file storage for page content.
- `frontend/`: Vite React app with a split view (content list, editor, live preview).

API endpoints:
- `GET /api/pages` – list all pages
- `GET /api/pages/:id` – retrieve a single page
- `POST /api/pages` – create a new page
- `PUT /api/pages/:id` – update an existing page
- `DELETE /api/pages/:id` – remove a page
