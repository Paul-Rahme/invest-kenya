import React, { useEffect, useState } from 'react';
import { Button } from './Button.jsx';

export function MediaLibrary({ token, items = [], onUpdate = () => {} }) {
  const [error, setError] = useState('');
  const [loading, setLoading] = useState(false);
  const [form, setForm] = useState({ url: '', label: '', alt: '' });

  useEffect(() => {
    if (!token) return;
    setLoading(true);
    fetch('/api/media', { headers: { Authorization: `Bearer ${token}` } })
      .then((res) => res.json())
      .then(onUpdate)
      .catch((err) => setError(err.message))
      .finally(() => setLoading(false));
  }, [token, onUpdate]);

  const handleChange = (event) => {
    const { name, value } = event.target;
    setForm((prev) => ({ ...prev, [name]: value }));
  };

  const handleCreate = async (event) => {
    event.preventDefault();
    setLoading(true);
    setError('');

    const response = await fetch('/api/media', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
        Authorization: `Bearer ${token}`
      },
      body: JSON.stringify(form)
    });

    if (!response.ok) {
      setError('Could not save media.');
      setLoading(false);
      return;
    }

    const created = await response.json();
    onUpdate([...(items || []), created]);
    setForm({ url: '', label: '', alt: '' });
    setLoading(false);
  };

  const handleDelete = async (id) => {
    setLoading(true);
    setError('');
    const response = await fetch(`/api/media/${id}`, {
      method: 'DELETE',
      headers: { Authorization: `Bearer ${token}` }
    });

    if (!response.ok) {
      setError('Unable to delete media item');
      setLoading(false);
      return;
    }

    const { remaining } = await response.json();
    onUpdate(remaining);
    setLoading(false);
  };

  return (
    <div className="media-panel">
      <div className="panel-header">
        <h2>Media library</h2>
        {loading && <span className="pill">Syncing…</span>}
      </div>
      <p className="muted">
        Store reusable imagery by ID—just like WordPress. Pick an item to stamp its URL into the editor instantly.
      </p>

      {error && <div className="error">{error}</div>}

      <form className="form media-form" onSubmit={handleCreate}>
        <label>
          Media URL
          <input
            name="url"
            value={form.url}
            onChange={handleChange}
            placeholder="https://images.example.com/cover.jpg"
            required
          />
        </label>
        <div className="two-up">
          <label>
            Label
            <input name="label" value={form.label} onChange={handleChange} placeholder="Press photo" />
          </label>
          <label>
            Alt text
            <input name="alt" value={form.alt} onChange={handleChange} placeholder="Describe the media" />
          </label>
        </div>
        <Button type="submit" variant="brand" disabled={loading}>
          Add media
        </Button>
      </form>

      <div className="media-grid">
        {items.map((item) => (
          <article key={item.id} className="media-card">
            <div className="media-thumb" style={{ backgroundImage: `url(${item.url})` }} />
            <div className="media-meta">
              <p className="eyebrow">{item.id}</p>
              <p className="title">{item.label}</p>
              <p className="muted">{item.alt || 'No alt text yet'}</p>
            </div>
            <div className="media-actions">
              <div className="pill pill--ghost">{item.type || 'image'}</div>
              <Button type="button" size="sm" variant="danger" onClick={() => handleDelete(item.id)}>
                Delete
              </Button>
            </div>
          </article>
        ))}

        {!items.length && <p className="muted">Upload or paste a URL to seed your media library.</p>}
      </div>
    </div>
  );
}
