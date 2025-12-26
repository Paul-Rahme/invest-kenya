import React from 'react';

export function PageView({ page }) {
  if (!page) {
    return <p className="muted">Select or create a page to preview it here.</p>;
  }

  return (
    <article className="page-view">
      <p className="eyebrow">{page.category || 'page'}</p>
      <h3>{page.title}</h3>
      <p>{page.body}</p>
    </article>
  );
}
