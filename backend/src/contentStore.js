import { readFileSync, writeFileSync, existsSync, mkdirSync } from 'fs';
import { join } from 'path';
import { fileURLToPath } from 'url';
import { nanoid } from 'nanoid';

const __filename = fileURLToPath(import.meta.url);
const __dirname = __filename.substring(0, __filename.lastIndexOf('/'));
const dataDir = join(__dirname, '../data');
const dataFile = join(dataDir, 'content.json');

const defaultContent = [
  {
    id: 'home',
    title: 'Welcome to Invest Kenya',
    body: 'Share your story, showcase opportunities, and keep investors informed with a tailored landing page.',
    category: 'page'
  },
  {
    id: 'about',
    title: 'About our mission',
    body: 'Use the CMS to edit this content and publish updates without redeploying your site.',
    category: 'page'
  }
];

function ensureStore() {
  if (!existsSync(dataDir)) {
    mkdirSync(dataDir, { recursive: true });
  }
  if (!existsSync(dataFile)) {
    writeFileSync(dataFile, JSON.stringify(defaultContent, null, 2));
  }
}

export function readContent() {
  ensureStore();
  const raw = readFileSync(dataFile, 'utf-8');
  return JSON.parse(raw);
}

export function saveContent(pages) {
  ensureStore();
  writeFileSync(dataFile, JSON.stringify(pages, null, 2));
}

export function upsertPage(page) {
  const pages = readContent();
  const existingIndex = pages.findIndex((entry) => entry.id === page.id);
  const updated = { ...page, id: page.id || nanoid(8) };

  if (existingIndex >= 0) {
    pages[existingIndex] = updated;
  } else {
    pages.push(updated);
  }

  saveContent(pages);
  return updated;
}

export function deletePage(id) {
  const pages = readContent();
  const next = pages.filter((entry) => entry.id !== id);
  saveContent(next);
  return next;
}
