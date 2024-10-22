const CACHE_NAME = 'offline-page';
const OFFLINE_URL = '/offline';

// Install event to cache the offline page
self.addEventListener('install', event => {
    event.waitUntil(
        caches.open(CACHE_NAME).then(cache => {
            return cache.add(OFFLINE_URL);
        })
    );
    console.log('Service Worker: Offline page cached.');
});

// Fetch event to intercept requests
self.addEventListener('fetch', event => {
    // Try to fetch from the network first
    event.respondWith(
        fetch(event.request).catch(() => {
            // If the request fails (offline), return the offline page
            return caches.match(OFFLINE_URL);
        })
    );
});
