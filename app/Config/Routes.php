<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */

// ══ Dashboard ══
$routes->get('/',          'Dashboard::index');
$routes->get('/dashboard', 'Dashboard::index');

// ══ Pelanggaran ══
$routes->get( 'pelanggaran',                   'Pelanggaran::index');
$routes->post('pelanggaran/simpan',             'Pelanggaran::simpan');
$routes->get( 'pelanggaran/detail/(:num)',      'Pelanggaran::detail/$1');   // JSON
$routes->post('pelanggaran/update/(:num)',      'Pelanggaran::update/$1');
$routes->post('pelanggaran/status/(:num)',      'Pelanggaran::status/$1');
$routes->get( 'pelanggaran/hapus/(:num)',       'Pelanggaran::hapus/$1');


// Data Siswa
$routes->get('siswa',                'Siswa::index');
$routes->post('siswa/simpan',        'Siswa::simpan');
$routes->get('siswa/detail/(:num)',  'Siswa::detail/$1');
$routes->get('siswa/edit/(:num)',    'Siswa::edit/$1');      // AJAX → JSON
$routes->post('siswa/update/(:num)', 'Siswa::update/$1');
$routes->get('siswa/hapus/(:num)',   'Siswa::hapus/$1');
$routes->get('siswa/export',         'Siswa::export');
$routes->post('siswa/import',        'Siswa::import');
$routes->get('siswa/search',         'Siswa::search');       // AJAX search

// ══ Tindak Lanjut ══  ← 
$routes->get( 'tindak-lanjut',               'TindakLanjut::index');
$routes->post('tindak-lanjut/simpan',        'TindakLanjut::simpan');
$routes->get( 'tindak-lanjut/detail/(:num)', 'TindakLanjut::detail/$1');
$routes->get( 'tindak-lanjut/edit/(:num)',   'TindakLanjut::edit/$1');
$routes->post('tindak-lanjut/update/(:num)', 'TindakLanjut::update/$1');
$routes->post('tindak-lanjut/status/(:num)', 'TindakLanjut::updateStatus/$1');
$routes->get( 'tindak-lanjut/hapus/(:num)',  'TindakLanjut::hapus/$1');
$routes->get( 'tindak-lanjut/export',        'TindakLanjut::export');

// Buku Kunjungan
$routes->get( 'buku-kunjungan',                   'BukuKunjungan::index');
$routes->post('buku-kunjungan/simpan',             'BukuKunjungan::simpan');
$routes->get( 'buku-kunjungan/detail/(:num)',      'BukuKunjungan::detail/$1');
$routes->get( 'buku-kunjungan/edit/(:num)',        'BukuKunjungan::edit/$1');
$routes->post('buku-kunjungan/update/(:num)',      'BukuKunjungan::update/$1');
$routes->post('buku-kunjungan/status/(:num)',      'BukuKunjungan::updateStatus/$1');
$routes->get( 'buku-kunjungan/hapus/(:num)',       'BukuKunjungan::hapus/$1');
$routes->get( 'buku-kunjungan/export',             'BukuKunjungan::export');

$routes->get('jadwal', 'JadwalKonseling::index');
$routes->post('jadwal/store', 'JadwalKonseling::store');

// ══ Auth ══
$routes->get( 'login',  'Auth::index');
$routes->post('login',  'Auth::proses');
$routes->get( 'logout', 'Auth::logout');

// ===== API (AJAX) =====
$routes->group('api', function($routes) {
    $routes->get('statistik/bulanan',    'Api\Statistik::bulanan');
    $routes->get('statistik/jenis',      'Api\Statistik::jenis');
    $routes->get('pelanggaran/terbaru',  'Api\Pelanggaran::terbaru');
    
});
