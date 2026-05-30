// Minimal service worker — required for PWA "Add to Home Screen" prompt.
// No caching strategy; all requests go to the network as normal.
self.addEventListener('install', () => self.skipWaiting());
self.addEventListener('activate', e => e.waitUntil(clients.claim()));
self.addEventListener('fetch', () => {});
