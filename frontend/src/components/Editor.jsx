import React, { useEffect, useMemo, useState } from 'react';
import { Button } from './Button.jsx';

const createEmptySlide = () => ({
  image: '',
  imageId: '',
  titlePartOne: '',
  titlePartTwo: '',
  primaryButtonLabel: '',
  primaryButtonUrl: '',
  secondaryButtonLabel: '',
  secondaryButtonUrl: ''
});

const blank = { title: '', body: '', category: 'page', heroSlides: [] };

export function Editor({ page, onSave, onDelete, mediaItems = [] }) {
  const initialForm = useMemo(() => page || { ...blank }, [page]);
  const [form, setForm] = useState(initialForm);

  useEffect(() => {
    setForm(initialForm);
  }, [initialForm]);

  const isHero = form.category === 'home-hero';

  useEffect(() => {
    if (isHero && (!form.heroSlides || !form.heroSlides.length)) {
      setForm((prev) => ({ ...prev, heroSlides: [createEmptySlide(), createEmptySlide(), createEmptySlide()] }));
    }
  }, [form.heroSlides, isHero]);

  const handleChange = (event) => {
    const { name, value } = event.target;
    setForm((prev) => ({ ...prev, [name]: value }));
  };

  const updateSlide = (index, key, value) => {
    setForm((prev) => {
      const next = prev.heroSlides ? [...prev.heroSlides] : [];
      const nextSlide = { ...(next[index] || createEmptySlide()), [key]: value };

      if (key === 'image') {
        nextSlide.imageId = '';
      }

      next[index] = nextSlide;
      return { ...prev, heroSlides: next };
    });
  };

  const applyMediaToSlide = (index, mediaId) => {
    const match = mediaItems.find((item) => item.id === mediaId);
    setForm((prev) => {
      const next = prev.heroSlides ? [...prev.heroSlides] : [];
      next[index] = {
        ...(next[index] || createEmptySlide()),
        imageId: mediaId,
        image: match?.url || ''
      };
      return { ...prev, heroSlides: next };
    });
  };

  const addSlide = () => {
    setForm((prev) => ({ ...prev, heroSlides: [...(prev.heroSlides || []), createEmptySlide()] }));
  };

  const removeSlide = (index) => {
    setForm((prev) => ({ ...prev, heroSlides: prev.heroSlides.filter((_, idx) => idx !== index) }));
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
        <select name="category" value={form.category} onChange={handleChange}>
          <option value="page">Page</option>
          <option value="home-hero">Homepage hero</option>
        </select>
      </label>

      {!isHero && (
        <label>
          Body
          <textarea name="body" value={form.body} onChange={handleChange} rows={6} required />
        </label>
      )}

      {isHero && (
        <div className="hero-form">
          <p className="muted">
            Configure the home banner slides. Use the CMS to control titles, background images, and call-to-action
            links shown on the React homepage.
          </p>
          {(form.heroSlides || []).map((slide, idx) => (
            <div key={idx} className="slide-card">
              <div className="slide-card__header">
                <h4>Slide {idx + 1}</h4>
                {form.heroSlides.length > 1 && (
                  <Button type="button" variant="danger" size="sm" onClick={() => removeSlide(idx)}>
                    Remove
                  </Button>
                )}
              </div>
              <label>
                Background image URL
                <input
                  name={`image-${idx}`}
                  value={slide.image || ''}
                  onChange={(e) => updateSlide(idx, 'image', e.target.value)}
                  placeholder="https://example.com/banner.jpg"
                  required
                />
                {slide.imageId && <p className="muted">Linked media ID: {slide.imageId}</p>}
              </label>
              <label>
                Or pick from media library
                <select
                  name={`media-${idx}`}
                  value={slide.imageId || ''}
                  onChange={(e) => applyMediaToSlide(idx, e.target.value)}
                >
                  <option value="">Custom URL</option>
                  {mediaItems.map((item) => (
                    <option key={item.id} value={item.id}>
                      {item.label} ({item.id})
                    </option>
                  ))}
                </select>
              </label>
              <label>
                Title line 1
                <input
                  name={`titlePartOne-${idx}`}
                  value={slide.titlePartOne || ''}
                  onChange={(e) => updateSlide(idx, 'titlePartOne', e.target.value)}
                />
              </label>
              <label>
                Title line 2
                <input
                  name={`titlePartTwo-${idx}`}
                  value={slide.titlePartTwo || ''}
                  onChange={(e) => updateSlide(idx, 'titlePartTwo', e.target.value)}
                />
              </label>
              <div className="slide-card__grid">
                <label>
                  Primary button label
                  <input
                    name={`primaryButtonLabel-${idx}`}
                    value={slide.primaryButtonLabel || ''}
                    onChange={(e) => updateSlide(idx, 'primaryButtonLabel', e.target.value)}
                  />
                </label>
                <label>
                  Primary button URL
                  <input
                    name={`primaryButtonUrl-${idx}`}
                    value={slide.primaryButtonUrl || ''}
                    onChange={(e) => updateSlide(idx, 'primaryButtonUrl', e.target.value)}
                    placeholder="/contact"
                  />
                </label>
              </div>
              <div className="slide-card__grid">
                <label>
                  Secondary button label
                  <input
                    name={`secondaryButtonLabel-${idx}`}
                    value={slide.secondaryButtonLabel || ''}
                    onChange={(e) => updateSlide(idx, 'secondaryButtonLabel', e.target.value)}
                  />
                </label>
                <label>
                  Secondary button URL
                  <input
                    name={`secondaryButtonUrl-${idx}`}
                    value={slide.secondaryButtonUrl || ''}
                    onChange={(e) => updateSlide(idx, 'secondaryButtonUrl', e.target.value)}
                    placeholder="/about"
                  />
                </label>
              </div>
            </div>
          ))}
          <Button type="button" variant="brand" onClick={addSlide}>
            Add slide
          </Button>
        </div>
      )}

      <div className="actions">
        <Button type="submit" variant="brand">
          {page ? 'Update page' : 'Create page'}
        </Button>
        {onDelete && (
          <Button type="button" variant="danger" onClick={onDelete}>
            Delete
          </Button>
        )}
      </div>
    </form>
  );
}
