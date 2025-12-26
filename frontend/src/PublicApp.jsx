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
    <div className="public-shell">
      <header className="public-hero">
        <div className="public-hero__inner">
          <div>
            <p className="eyebrow">Visitor site</p>
            <h1>Explore published pages</h1>
            <p className="lede">
              Browse the same content the CMS manages, rendered in a standalone visitor experience.
            </p>
          </div>
          <a className="btn btn-white" href="/cms">
            Open CMS
          </a>
        </div>
      </header>

      <section className="public-toolbar">
        <div>
          <p className="eyebrow">Pages</p>
          <h2 className="toolbar-title">Choose a page to view</h2>
        </div>
        {loading && <span className="pill">Loading…</span>}
      </section>

      {error && <div className="error">{error}</div>}

      <nav className="public-nav public-nav--inline" aria-label="Published pages">
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

      <main className="public-stage">
        <div
          className={
            selectedPage?.category === 'home-hero' ? 'page-surface page-surface--hero' : 'page-surface'
          }
        >
          <PageView page={selectedPage} />
        </div>
      </main>
    </div>
  );
}
