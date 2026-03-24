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


// ══ Siswa ══
$routes->get( 'siswa',                'Siswa::index');
$routes->post('siswa/simpan',         'Siswa::simpan');
$routes->get( 'siswa/detail/(:num)',  'Siswa::detail/$1');
$routes->get( 'siswa/edit/(:num)',    'Siswa::edit/$1');
$routes->post('siswa/update/(:num)',  'Siswa::update/$1');
$routes->get( 'siswa/hapus/(:num)',   'Siswa::hapus/$1');
$routes->get( 'siswa/search',         'Siswa::search');

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
