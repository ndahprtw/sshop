<?php

// Pengaturan login SSO. Nilai sebenarnya diambil dari .env (SSO_*);
// nilai kedua pada env() hanya cadangan bila variabel .env tidak ada.

return [
    'base_url' => rtrim(env('SSO_BASE_URL', 'https://sso.ndhprtw.my.id'), '/'),
    'client_id' => env('SSO_CLIENT_ID'),
    'client_secret' => env('SSO_CLIENT_SECRET'),
    'redirect_uri' => env('SSO_REDIRECT_URI'),

    // Seberapa sering (detik) aplikasi memeriksa apakah sesi SSO masih berlaku.
    'check_interval' => env('SSO_CHECK_INTERVAL', 60),
];
