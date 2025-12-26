import React, { useState } from 'react';

const blank = { title: '', body: '', category: 'page' };

export function Editor({ page, onSave, onDelete }) {
  const [form, setForm] = useState(page || blank);

  const handleChange = (event) => {
    const { name, value } = event.target;
    setForm((prev) => ({ ...prev, [name]: value }));
  };

  const handleSubmit = (event) => {
    event.preventDefault();
    onSave(form);
  };

  return (
    <form className="form" onSubmit={handleSubmit}>
      <label>
        Title
        <input name="title" value={form.title} onChange={handleChange} required />
      </label>

      <label>
        Category
        <input name="category" value={form.category} onChange={handleChange} />
      </label>

      <label>
        Body
        <textarea name="body" value={form.body} onChange={handleChange} rows={6} required />
      </label>

      <div className="actions">
        <button type="submit" className="primary">
          {page ? 'Update page' : 'Create page'}
        </button>
        {onDelete && (
          <button type="button" className="danger" onClick={onDelete}>
            Delete
          </button>
        )}
      </div>
    </form>
  );
}
