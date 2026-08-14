'use strict';

const ALLOWED_INTERESTS = {
  'sfo-community': 'SFO community connection',
  'peer-exchange': 'Peer perspective exchange',
  'general-enquiry': 'General enquiry'
};
const EMAIL_RE = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
const buckets = new Map();

function reply(res, status, body) {
  res.setHeader('Cache-Control', 'no-store');
  res.setHeader('Content-Type', 'application/json; charset=utf-8');
  return res.status(status).json(body);
}

function text(value, max) {
  return typeof value === 'string' ? value.trim().slice(0, max) : '';
}

function rateLimited(req) {
  const ip = text(req.headers['x-forwarded-for'] || req.socket?.remoteAddress || 'unknown', 100).split(',')[0];
  const now = Date.now();
  const recent = (buckets.get(ip) || []).filter((time) => now - time < 15 * 60 * 1000);
  recent.push(now);
  buckets.set(ip, recent);
  return recent.length > 5;
}

module.exports = async function contact(req, res) {
  const origin = text(req.headers.origin || '', 300);
  const allowedOrigin = !origin || /^https:\/\/(www\.)?mwealth\.online$/.test(origin) || /^https:\/\/[^/]+\.vercel\.app$/.test(origin);
  if (!allowedOrigin) return reply(res, 403, { error: 'Request origin is not allowed.' });
  if (req.method !== 'POST') {
    res.setHeader('Allow', 'POST');
    return reply(res, 405, { error: 'Method not allowed.' });
  }
  if (!process.env.RESEND_API_KEY || !process.env.CONTACT_FROM_EMAIL) {
    return reply(res, 503, { error: 'Online enquiries are temporarily unavailable. Please email info@mwealth.online.' });
  }
  if (rateLimited(req)) return reply(res, 429, { error: 'Too many attempts. Please try again later.' });

  const body = req.body && typeof req.body === 'object' ? req.body : {};
  if (text(body.website, 200)) return reply(res, 200, { ok: true });

  const name = text(body.name, 100);
  const email = text(body.email, 254).toLowerCase();
  const phone = text(body.phone, 40);
  const interest = text(body.interest, 40);
  const message = text(body.message, 3000);
  const startedAt = Number(body.startedAt);
  if (!startedAt || Date.now() - startedAt < 2500) return reply(res, 400, { error: 'Please take a moment to complete the form.' });
  if (!name || !EMAIL_RE.test(email) || !ALLOWED_INTERESTS[interest] || message.length < 10 || body.privacyAcknowledged !== 'yes') {
    return reply(res, 400, { error: 'Please complete all required fields correctly.' });
  }

  const content = `Name: ${name}\nEmail: ${email}\nPhone: ${phone || 'Not provided'}\nReason: ${ALLOWED_INTERESTS[interest]}\n\nMessage:\n${message}`;
  try {
    const response = await fetch('https://api.resend.com/emails', {
      method: 'POST',
      headers: { Authorization: `Bearer ${process.env.RESEND_API_KEY}`, 'Content-Type': 'application/json' },
      body: JSON.stringify({
        from: process.env.CONTACT_FROM_EMAIL,
        to: ['info@mwealth.online'],
        reply_to: email,
        subject: `Website enquiry: ${ALLOWED_INTERESTS[interest]} — ${name}`,
        text: content
      })
    });
    if (!response.ok) throw new Error(`Email provider returned ${response.status}`);
    return reply(res, 200, { ok: true });
  } catch (error) {
    console.error('Contact delivery failed:', error.message);
    return reply(res, 502, { error: 'We could not send your message. Please email info@mwealth.online.' });
  }
};
