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
            <p className="muted">{page.body.slice(0, 80)}...</p>
          </button>
        </li>
      ))}
    </ul>
  );
}
