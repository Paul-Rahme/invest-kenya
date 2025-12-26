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
    id: 'home-hero',
    title: 'Homepage banner',
    category: 'home-hero',
    heroSlides: [
      {
        image: 'https://images.unsplash.com/photo-1500530855697-b586d89ba3ee?auto=format&fit=crop&w=1600&q=80',
        titlePartOne: 'Invest in Kenya',
        titlePartTwo: 'Where opportunity meets innovation',
        primaryButtonLabel: 'Explore opportunities',
        primaryButtonUrl: '/opportunities',
        secondaryButtonLabel: 'Learn more',
        secondaryButtonUrl: '/about'
      },
      {
        image: 'https://images.unsplash.com/photo-1520607162513-77705c0f0d4a?auto=format&fit=crop&w=1600&q=80',
        titlePartOne: 'Build with confidence',
        titlePartTwo: 'Guided support for investors and founders',
        primaryButtonLabel: 'Meet the team',
        primaryButtonUrl: '/team',
        secondaryButtonLabel: 'Download brochure',
        secondaryButtonUrl: '/downloads/brochure.pdf'
      },
      {
        image: 'https://images.unsplash.com/photo-1517245386807-bb43f82c33c4?auto=format&fit=crop&w=1600&q=80',
        titlePartOne: 'Nationwide partnerships',
        titlePartTwo: 'Connections that accelerate investment',
        primaryButtonLabel: 'Contact us',
        primaryButtonUrl: '/contact',
        secondaryButtonLabel: 'Upcoming events',
        secondaryButtonUrl: '/events'
      }
    ]
  },
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
  const parsed = JSON.parse(raw);

  const hasHero = parsed.some((entry) => entry.category === 'home-hero');
  if (!hasHero) {
    const withHero = [defaultContent[0], ...parsed];
    saveContent(withHero);
    return withHero;
  }

  return parsed;
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
