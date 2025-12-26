import React from 'react';

export function ContentList({ pages, selectedId, onSelect }) {
  if (!pages.length) {
    return <p className="muted">No pages yet. Use the editor below to add one.</p>;
  }

  return (
    <ul className="list">
      {pages.map((page) => (
        <li key={page.id} className={page.id === selectedId ? 'active' : ''}>
          <button onClick={() => onSelect(page.id)}>
            <p className="eyebrow">{page.category || 'page'}</p>
            <p className="title">{page.title}</p>
            {page.category === 'home-hero' ? (
              <p className="muted">
                {page.heroSlides?.length ? `${page.heroSlides.length} slide${page.heroSlides.length > 1 ? 's' : ''}` : 'No slides yet'}
              </p>
            ) : (
              <p className="muted">{page.body?.slice(0, 80) || 'No body yet'}...</p>
            )}
          </button>
        </li>
      ))}
    </ul>
  );
}
