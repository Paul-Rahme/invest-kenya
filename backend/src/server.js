import express from 'express';
import cors from 'cors';
import { deletePage, readContent, upsertPage } from './contentStore.js';

const app = express();
const port = process.env.PORT || 4000;

app.use(cors());
app.use(express.json());

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

app.put('/api/pages/:id', (req, res) => {
  const payload = { ...req.body, id: req.params.id };
  const updated = upsertPage(payload);
  res.json(updated);
});

app.post('/api/pages', (req, res) => {
  const updated = upsertPage(req.body || {});
  res.status(201).json(updated);
});

app.delete('/api/pages/:id', (req, res) => {
  const remaining = deletePage(req.params.id);
  res.json({ remaining });
});

app.listen(port, () => {
  console.log(`API server listening on port ${port}`);
});
