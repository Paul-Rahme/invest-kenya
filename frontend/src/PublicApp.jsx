import React, { useEffect, useMemo, useState } from 'react';
import { PageView } from './components/PageView.jsx';

const apiBase = '/api/pages';

export function PublicApp() {
  const [pages, setPages] = useState([]);
  const [loading, setLoading] = useState(false);
  const [error, setError] = useState(null);

  const selectedPage = useMemo(
    () => pages.find((page) => page.category === 'home-hero') || pages[0] || null,
    [pages]
  );

  const isHeroPage = selectedPage?.category === 'home-hero';

  useEffect(() => {
    setLoading(true);
    fetch(apiBase)
      .then((res) => res.json())
      .then((data) => {
        setPages(data);
      })
      .catch((err) => setError(err.message))
      .finally(() => setLoading(false));
  }, []);

  return (
    <div className="public-shell">
      {error && <div className="error">{error}</div>}

      <main className={isHeroPage ? 'public-stage public-stage--hero' : 'public-stage'}>
        <div className={isHeroPage ? 'page-surface page-surface--hero' : 'page-surface'}>
          {loading && !selectedPage ? <span className="pill">Loading…</span> : <PageView page={selectedPage} />}
        </div>
      </main>
    </div>
  );
}
