import React, { useEffect, useMemo, useRef, useState } from 'react';

const AUTOPLAY_MS = 8000;
const FALLBACK_IMAGE =
  'https://images.unsplash.com/photo-1517245386807-bb43f82c33c4?auto=format&fit=crop&w=1600&q=80';

const ArrowIcon = () => (
  <span className="hero-banner__btn-icon" aria-hidden>
    <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
      <path
        d="M5 12h14"
        stroke="currentColor"
        strokeWidth="1.8"
        strokeLinecap="round"
        strokeLinejoin="round"
      />
      <path
        d="m13 6 6 6-6 6"
        stroke="currentColor"
        strokeWidth="1.8"
        strokeLinecap="round"
        strokeLinejoin="round"
      />
    </svg>
  </span>
);

export function HeroBanner({ slides = [] }) {
  const validSlides = useMemo(
    () =>
      slides
        .filter((slide) => slide && (slide.titlePartOne || slide.titlePartTwo || slide.image))
        .map((slide) => ({
          image: slide.image || FALLBACK_IMAGE,
          titlePartOne: slide.titlePartOne || '',
          titlePartTwo: slide.titlePartTwo || '',
          primaryButtonLabel: slide.primaryButtonLabel || '',
          primaryButtonUrl: slide.primaryButtonUrl || '#',
          secondaryButtonLabel: slide.secondaryButtonLabel || '',
          secondaryButtonUrl: slide.secondaryButtonUrl || '#'
        })),
    [slides]
  );

  const [activeIndex, setActiveIndex] = useState(0);
  const progressRef = useRef(null);
  const timerRef = useRef(null);

  useEffect(() => {
    if (!validSlides.length) return;
    setActiveIndex((prev) => (prev >= validSlides.length ? 0 : prev));
  }, [validSlides.length]);

  useEffect(() => {
    if (!validSlides.length) return undefined;

    const restart = () => {
      clearInterval(timerRef.current);
      timerRef.current = setInterval(() => {
        setActiveIndex((prev) => (prev + 1) % validSlides.length);
      }, AUTOPLAY_MS);
    };

    restart();
    return () => clearInterval(timerRef.current);
  }, [validSlides.length]);

  useEffect(() => {
    if (!progressRef.current) return;
    progressRef.current.style.transition = 'none';
    progressRef.current.style.width = '0%';

    requestAnimationFrame(() => {
      if (!progressRef.current) return;
      progressRef.current.style.transition = `width ${AUTOPLAY_MS}ms linear`;
      progressRef.current.style.width = '100%';
    });
  }, [activeIndex]);

  const handleSelect = (index) => {
    setActiveIndex(index);
  };

  if (!validSlides.length) {
    return <p className="muted">Add banner slides to preview the homepage hero.</p>;
  }

  return (
    <div className="hero-banner">
      <div className="hero-banner__slides">
        {validSlides.map((slide, idx) => (
          <div
            key={`${slide.titlePartOne}-${idx}`}
            className={`hero-banner__slide ${idx === activeIndex ? 'is-active' : ''}`}
            style={{ backgroundImage: `url(${slide.image})` }}
          >
            <div className="hero-banner__gradient" aria-hidden />
            <div className="hero-banner__content">
              <div className="hero-banner__redline" />
              {slide.titlePartOne && <p className="hero-banner__title-1">{slide.titlePartOne}</p>}
              {slide.titlePartTwo && <p className="hero-banner__title-2">{slide.titlePartTwo}</p>}

              <div className="hero-banner__footer">
                <div className="hero-banner__index">{String(idx + 1).padStart(2, '0')}</div>
                <div className="hero-banner__progress">
                  <div className="hero-banner__progress-fill" ref={idx === activeIndex ? progressRef : null} />
                </div>
                <div className="hero-banner__actions">
                  {slide.primaryButtonLabel && (
                    <a className="btn btn-red" href={slide.primaryButtonUrl}>
                      <span>{slide.primaryButtonLabel}</span>
                      <ArrowIcon />
                    </a>
                  )}
                  {slide.secondaryButtonLabel && (
                    <a className="btn btn-white" href={slide.secondaryButtonUrl}>
                      <span>{slide.secondaryButtonLabel}</span>
                      <ArrowIcon />
                    </a>
                  )}
                </div>
              </div>
            </div>
          </div>
        ))}
      </div>

      <div className="hero-banner__dots" role="tablist" aria-label="Select banner slide">
        {validSlides.map((_, idx) => (
          <button
            key={idx}
            className={`hero-banner__dot ${idx === activeIndex ? 'is-active' : ''}`}
            aria-label={`Go to slide ${idx + 1}`}
            aria-pressed={idx === activeIndex}
            onClick={() => handleSelect(idx)}
            type="button"
          />
        ))}
      </div>
    </div>
  );
}
