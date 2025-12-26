import React from 'react';

const ArrowIcon = () => (
  <span className="btn__icon" aria-hidden>
    <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
      <path d="M5 12h14" stroke="currentColor" strokeWidth="1.8" strokeLinecap="round" strokeLinejoin="round" />
      <path d="m13 6 6 6-6 6" stroke="currentColor" strokeWidth="1.8" strokeLinecap="round" strokeLinejoin="round" />
    </svg>
  </span>
);

export function Button({
  as,
  children,
  className = '',
  href,
  icon,
  iconPosition = 'right',
  variant = 'brand',
  size = 'md',
  ...rest
}) {
  const Component = as || (href ? 'a' : 'button');
  const hasIcon = Boolean(icon);
  const iconNode = hasIcon ? icon : null;

  return (
    <Component
      className={`btn btn--${variant} btn--${size} ${hasIcon ? 'btn--with-icon' : ''} ${className}`.trim()}
      href={href}
      type={Component === 'button' ? rest.type || 'button' : undefined}
      {...rest}
    >
      {iconNode && iconPosition === 'left' && iconNode}
      <span className="btn__label">{children}</span>
      {iconNode && iconPosition === 'right' && iconNode}
    </Component>
  );
}

export { ArrowIcon };
