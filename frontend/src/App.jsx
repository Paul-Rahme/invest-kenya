import React, { useEffect, useMemo, useState } from 'react';
import { ContentList } from './components/ContentList.jsx';
import { Editor } from './components/Editor.jsx';
import { PageView } from './components/PageView.jsx';

const apiBase = '/api/pages';

export default function App() {
  const [pages, setPages] = useState([]);
  const [selectedId, setSelectedId] = useState(null);
  const [loading, setLoading] = useState(false);
  const [error, setError] = useState(null);

  const selectedPage = useMemo(
    () => pages.find((page) => page.id === selectedId) || null,
    [pages, selectedId]
  );

  useEffect(() => {
    setLoading(true);
    fetch(apiBase)
      .then((res) => res.json())
      .then(setPages)
      .catch((err) => setError(err.message))
      .finally(() => setLoading(false));
  }, []);

  const handleSave = async (data) => {
    setLoading(true);
    setError(null);
    const method = data.id ? 'PUT' : 'POST';
    const endpoint = data.id ? `${apiBase}/${data.id}` : apiBase;

    const response = await fetch(endpoint, {
      method,
      headers: { 'Content-Type': 'application/json' },
      body: JSON.stringify(data)
    });

    if (!response.ok) {
      setError('Failed to save content');
      setLoading(false);
      return;
    }

    const updated = await response.json();
    setPages((prev) => {
      const existing = prev.findIndex((entry) => entry.id === updated.id);
      if (existing >= 0) {
        const copy = [...prev];
        copy[existing] = updated;
        return copy;
      }
      return [...prev, updated];
    });
    setSelectedId(updated.id);
    setLoading(false);
  };

  const handleDelete = async (id) => {
    setLoading(true);
    setError(null);
    const response = await fetch(`${apiBase}/${id}`, { method: 'DELETE' });
    if (!response.ok) {
      setError('Failed to delete content');
      setLoading(false);
      return;
    }

    const { remaining } = await response.json();
    setPages(remaining);
    setSelectedId(remaining[0]?.id || null);
    setLoading(false);
  };

  return (
    <div className="layout">
      <header className="hero">
        <p className="eyebrow">Invest Kenya starter</p>
        <h1>Informational site + CMS in one repo</h1>
        <p className="lede">
          Manage your landing content through the API while previewing the visitor-facing site on the right.
        </p>
      </header>

      <div className="grid">
        <section>
          <div className="panel">
            <div className="panel-header">
              <h2>Content library</h2>
              {loading && <span className="pill">Syncing…</span>}
            </div>
            {error && <div className="error">{error}</div>}
            <ContentList pages={pages} onSelect={setSelectedId} selectedId={selectedId} />
          </div>

          <div className="panel">
            <h2>{selectedPage ? 'Edit page' : 'Add new page'}</h2>
            <Editor
              key={selectedPage?.id || 'new'}
              page={selectedPage}
              onSave={handleSave}
              onDelete={selectedPage ? () => handleDelete(selectedPage.id) : null}
            />
          </div>
        </section>

        <section>
          <div className="panel preview">
            <h2>Live preview</h2>
            <PageView page={selectedPage || pages[0]} />
          </div>
        </section>
      </div>
    </div>
  );
}
