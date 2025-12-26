import express from 'express';
import cors from 'cors';
import { deletePage, readContent, upsertPage } from './contentStore.js';
import { addMedia, deleteMedia, readMedia } from './mediaStore.js';

const app = express();
const port = process.env.PORT || 4000;

const AUTH_USER = process.env.CMS_USER || 'admin';
const AUTH_PASSWORD = process.env.CMS_PASSWORD || 'invest123';
const AUTH_TOKEN = process.env.CMS_TOKEN || 'cms-demo-token';

app.use(cors());
app.use(express.json({ limit: '5mb' }));

const requireAuth = (req, res, next) => {
  const authHeader = req.headers.authorization || '';
  const token = authHeader.replace('Bearer ', '');

  if (token === AUTH_TOKEN) {
    return next();
  }

  return res.status(401).json({ message: 'Unauthorized' });
};

const normalize = (value = '') => String(value).trim();

app.post('/api/login', (req, res) => {
  const { username, password } = req.body || {};

  const normalizedUser = normalize(username).toLowerCase();
  const normalizedPassword = normalize(password);

  if (normalizedUser === AUTH_USER.toLowerCase() && normalizedPassword === AUTH_PASSWORD) {
    return res.json({ token: AUTH_TOKEN, user: { name: 'Site Admin' } });
  }

  return res.status(401).json({ message: 'Invalid credentials' });
});

app.get('/api/pages', (req, res) => {
  const pages = readContent();
  res.json(pages);
});

app.get('/api/pages/:id', (req, res) => {
  const pages = readContent();
  const page = pages.find((entry) => entry.id === req.params.id);

  if (!page) {
    res.status(404).json({ message: 'Page not found' });
    return;
  }

  res.json(page);
});

app.put('/api/pages/:id', requireAuth, (req, res) => {
  const payload = { ...req.body, id: req.params.id };
  const updated = upsertPage(payload);
  res.json(updated);
});

app.post('/api/pages', requireAuth, (req, res) => {
  const updated = upsertPage(req.body || {});
  res.status(201).json(updated);
});

app.delete('/api/pages/:id', requireAuth, (req, res) => {
  const remaining = deletePage(req.params.id);
  res.json({ remaining });
});

app.get('/api/media', requireAuth, (req, res) => {
  const media = readMedia();
  res.json(media);
});

app.post('/api/media', requireAuth, (req, res) => {
  try {
    const created = addMedia(req.body || {});
    res.status(201).json(created);
  } catch (err) {
    res.status(400).json({ message: err.message });
  }
});

app.delete('/api/media/:id', requireAuth, (req, res) => {
  const remaining = deleteMedia(req.params.id);
  res.json({ remaining });
});

app.listen(port, () => {
  console.log(`API server listening on port ${port}`);
});
