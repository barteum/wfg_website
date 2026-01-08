const CACHE_NAME = 'my-bible-edit-v1';
const ASSETS = [
  './bible.html',
  './manifest.json',
  './images/logo-wfg.png'
  // web.csv is cached dynamically due to size/updates
];

self.addEventListener('install', (event) => {
  event.waitUntil(
    caches.open(CACHE_NAME).then((cache) => cache.addAll(ASSETS))
  );
});

self.addEventListener('fetch', (event) => {
  // Network-First Strategy for HTML and CSV (Live Updates)
  if (event.request.mode === 'navigate' || event.request.url.endsWith('.csv')) {
    event.respondWith(
      fetch(event.request)
        .then((response) => {
          const clone = response.clone();
          caches.open(CACHE_NAME).then((cache) => cache.put(event.request, clone));
          return response;
        })
        .catch(() => caches.match(event.request))
    );
  } else {
    // Cache-First for others (Assets)
    event.respondWith(
      caches.match(event.request).then((response) => response || fetch(event.request))
    );
  }
});
