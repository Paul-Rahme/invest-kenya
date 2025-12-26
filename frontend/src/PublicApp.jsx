import React, { useEffect, useMemo, useState } from 'react';
import { PageView } from './components/PageView.jsx';

const apiBase = '/api/pages';

export function PublicApp() {
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
      .then((data) => {
        setPages(data);
        if (data[0]) {
          setSelectedId((current) => current || data[0].id);
        }
      })
      .catch((err) => setError(err.message))
      .finally(() => setLoading(false));
  }, []);

  return (
    <div className="layout layout--public">
      <header className="hero hero--public">
        <p className="eyebrow">Visitor site</p>
        <h1>Explore published pages</h1>
        <p className="lede">
          Browse the same content the CMS manages, rendered in a full-width visitor experience.
        </p>
      </header>

      <div className="public-grid">
        <aside className="panel">
          <div className="panel-header">
            <h2>Pages</h2>
            {loading && <span className="pill">Loading…</span>}
          </div>
          {error && <div className="error">{error}</div>}
          <nav className="public-nav" aria-label="Published pages">
            {pages.map((page) => (
              <button
                key={page.id}
                className={page.id === selectedId ? 'nav-item is-active' : 'nav-item'}
                onClick={() => setSelectedId(page.id)}
              >
                <span className="nav-title">{page.title}</span>
                <span className="nav-meta">{page.category || 'page'}</span>
              </button>
            ))}
            {pages.length === 0 && !loading && <p className="muted">No pages available yet.</p>}
          </nav>
        </aside>

        <section className="panel public-preview">
          <div className="panel-header">
            <h2>Page</h2>
            <a className="link" href="/cms">Go to CMS</a>
          </div>
          <PageView page={selectedPage} />
        </section>
      </div>
    </div>
  );
}
