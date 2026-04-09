<?php

namespace App\Controllers;

use App\Models\JadwalKonselingModel;

class JadwalKonseling extends BaseController
{
    public function index()
    {
    $model = new JadwalKonselingModel();
    $semua = $model->findAll();

    $data['jadwal'] = $semua;
    $data['stats_jadwal'] = [
        'total'      => count($semua),
        'terjadwal'  => count(array_filter($semua, fn($j) => $j['status'] === 'Terjadwal')),
        'selesai'    => count(array_filter($semua, fn($j) => $j['status'] === 'Selesai')),
        'batal'      => count(array_filter($semua, fn($j) => $j['status'] === 'Batal')),
    ];
    $data['stats'] = ['baru' => 0]; // atau ambil dari model pelanggaran

    return view('jadwal/index', $data);
    }
}