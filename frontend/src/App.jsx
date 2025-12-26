import React, { useEffect, useMemo, useState } from 'react';
import { ContentList } from './components/ContentList.jsx';
import { Editor } from './components/Editor.jsx';
import { PageView } from './components/PageView.jsx';
import { MediaLibrary } from './components/MediaLibrary.jsx';
import { Login } from './components/Login.jsx';
import { Button } from './components/Button.jsx';

const apiBase = '/api/pages';

export default function App() {
  const [pages, setPages] = useState([]);
  const [media, setMedia] = useState([]);
  const [selectedId, setSelectedId] = useState(null);
  const [loading, setLoading] = useState(false);
  const [error, setError] = useState(null);
  const [token, setToken] = useState(() => localStorage.getItem('cmsToken') || '');
  const [authError, setAuthError] = useState('');

  const selectedPage = useMemo(
    () => pages.find((page) => page.id === selectedId) || pages[0] || null,
    [pages, selectedId]
  );

  useEffect(() => {
    if (!token) return;
    setLoading(true);
    setError(null);

    Promise.all([
      fetch(apiBase, { headers: { Authorization: `Bearer ${token}` } }).then((res) => {
        if (res.status === 401) throw new Error('Unauthorized');
        return res.json();
      }),
      fetch('/api/media', { headers: { Authorization: `Bearer ${token}` } }).then((res) => {
        if (res.status === 401) throw new Error('Unauthorized');
        return res.json();
      })
    ])
      .then(([pageData, mediaData]) => {
        setPages(pageData);
        setMedia(mediaData);
        setSelectedId(pageData[0]?.id || null);
      })
      .catch((err) => {
        if (err.message === 'Unauthorized') {
          setAuthError('Session expired. Please sign in again.');
          handleLogout();
        } else {
          setError(err.message);
        }
      })
      .finally(() => setLoading(false));
  }, [token]);

  const handleLoginSuccess = (newToken) => {
    localStorage.setItem('cmsToken', newToken);
    setToken(newToken);
    setAuthError('');
  };

  const handleLogout = () => {
    localStorage.removeItem('cmsToken');
    setToken('');
    setPages([]);
    setMedia([]);
    setSelectedId(null);
  };

  const withAuth = (options = {}) => ({
    ...options,
    headers: {
      'Content-Type': 'application/json',
      Authorization: `Bearer ${token}`,
      ...(options.headers || {})
    }
  });

  const handleSave = async (data) => {
    setLoading(true);
    setError(null);
    const method = data.id ? 'PUT' : 'POST';
    const endpoint = data.id ? `${apiBase}/${data.id}` : apiBase;

    const response = await fetch(endpoint, withAuth({ method, body: JSON.stringify(data) }));

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
    const response = await fetch(`${apiBase}/${id}`, withAuth({ method: 'DELETE' }));
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

  if (!token) {
    return <Login onSuccess={handleLoginSuccess} error={authError} />;
  }

  return (
    <div className="layout layout--wide">
      <header className="hero hero--cms">
        <div>
          <p className="eyebrow">Invest Kenya CMS</p>
          <h1>Full-width workspace to author your site</h1>
          <p className="lede">
            Manage landing pages, hero slides, and shared media assets side-by-side. Changes save instantly with
            authenticated API calls.
          </p>
          {loading && <span className="pill">Syncing…</span>}
        </div>
        <div className="session-actions">
          <div className="session-pill">
            <span className="dot" aria-hidden />
            Logged in as admin
          </div>
          <Button variant="danger" onClick={handleLogout}>
            Sign out
          </Button>
        </div>
      </header>

      {error && <div className="error">{error}</div>}

      <div className="grid grid--cms">
        <section className="stack">
          <div className="panel panel--frosted">
            <div className="panel-header">
              <h2>Content library</h2>
            </div>
            <ContentList pages={pages} onSelect={setSelectedId} selectedId={selectedId} />
          </div>

          <div className="panel panel--frosted">
            <h2>{selectedPage ? 'Edit page' : 'Add new page'}</h2>
            <Editor
              key={selectedPage?.id || 'new'}
              page={selectedPage}
              mediaItems={media}
              onSave={handleSave}
              onDelete={selectedPage ? () => handleDelete(selectedPage.id) : null}
            />
          </div>

          <div className="panel panel--frosted">
            <MediaLibrary token={token} items={media} onUpdate={setMedia} />
          </div>
        </section>

        <section className="preview-shell">
          <div className="panel preview panel--glass">
            <div className="panel-header">
              <h2>Live preview</h2>
              <span className="pill pill--ghost">Reader view</span>
            </div>
            <PageView page={selectedPage || pages[0]} />
          </div>
        </section>
      </div>
    </div>
  );
}
