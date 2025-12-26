import { existsSync, mkdirSync, readFileSync, writeFileSync } from 'fs';
import { join } from 'path';
import { fileURLToPath } from 'url';
import { nanoid } from 'nanoid';

const __filename = fileURLToPath(import.meta.url);
const __dirname = __filename.substring(0, __filename.lastIndexOf('/'));
const dataDir = join(__dirname, '../data');
const dataFile = join(dataDir, 'media.json');

const defaultMedia = [
  {
    id: 'hero-coast',
    url: 'https://images.unsplash.com/photo-1500530855697-b586d89ba3ee?auto=format&fit=crop&w=1600&q=80',
    alt: 'Kenyan coastline with sunset',
    label: 'Ocean skyline',
    type: 'image/jpeg'
  },
  {
    id: 'hero-team',
    url: 'https://images.unsplash.com/photo-1520607162513-77705c0f0d4a?auto=format&fit=crop&w=1600&q=80',
    alt: 'Business colleagues smiling',
    label: 'Team portrait',
    type: 'image/jpeg'
  },
  {
    id: 'hero-meeting',
    url: 'https://images.unsplash.com/photo-1517245386807-bb43f82c33c4?auto=format&fit=crop&w=1600&q=80',
    alt: 'Meeting room with warm lighting',
    label: 'Boardroom meeting',
    type: 'image/jpeg'
  }
];

function ensureStore() {
  if (!existsSync(dataDir)) {
    mkdirSync(dataDir, { recursive: true });
  }
  if (!existsSync(dataFile)) {
    writeFileSync(dataFile, JSON.stringify(defaultMedia, null, 2));
  }
}

export function readMedia() {
  ensureStore();
  const raw = readFileSync(dataFile, 'utf-8');
  return JSON.parse(raw);
}

export function saveMedia(items) {
  ensureStore();
  writeFileSync(dataFile, JSON.stringify(items, null, 2));
}

export function addMedia(item) {
  const { url, alt = '', label = '', type = 'image' } = item;
  if (!url) {
    throw new Error('Media URL is required');
  }

  const current = readMedia();
  const record = {
    id: item.id || nanoid(8),
    url,
    alt,
    label: label || url.split('/').pop() || 'Uploaded media',
    type,
    createdAt: new Date().toISOString()
  };

  current.push(record);
  saveMedia(current);
  return record;
}

export function deleteMedia(id) {
  const current = readMedia();
  const remaining = current.filter((entry) => entry.id !== id);
  saveMedia(remaining);
  return remaining;
}

export function findMediaById(id) {
  const current = readMedia();
  return current.find((entry) => entry.id === id) || null;
}
