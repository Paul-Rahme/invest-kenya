import React, { useState } from 'react';
import { Button } from './Button.jsx';

export function Login({ onSuccess, error }) {
  const [username, setUsername] = useState('');
  const [password, setPassword] = useState('');
  const [loading, setLoading] = useState(false);
  const [localError, setLocalError] = useState('');

  const handleSubmit = async (event) => {
    event.preventDefault();
    setLoading(true);
    setLocalError('');

    try {
      const response = await fetch('/api/login', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ username, password })
      });

      if (!response.ok) {
        setLocalError('Invalid credentials. Please try again.');
        setLoading(false);
        return;
      }

      const payload = await response.json();
      onSuccess(payload.token);
    } catch (err) {
      setLocalError(err.message);
      setLoading(false);
    }
  };

  return (
    <div className="login-shell">
      <div className="login-card">
        <p className="eyebrow">CMS access</p>
        <h1>Sign in to manage content</h1>
        <p className="lede">Secure the editor with shared credentials before making updates.</p>

        <form className="form login-form" onSubmit={handleSubmit}>
          <label>
            Username
            <input value={username} onChange={(e) => setUsername(e.target.value)} autoComplete="username" required />
          </label>

          <label>
            Password
            <input
              type="password"
              value={password}
              autoComplete="current-password"
              onChange={(e) => setPassword(e.target.value)}
              required
            />
          </label>

          {(error || localError) && <div className="error">{error || localError}</div>}

          <Button type="submit" variant="brand" className="login-btn" disabled={loading}>
            {loading ? 'Signing in…' : 'Access CMS'}
          </Button>
        </form>
      </div>
    </div>
  );
}
