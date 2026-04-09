<?php

namespace App\Models;

use CodeIgniter\Model;

class JadwalKonselingModel extends Model
{
    protected $table = 'jadwal_konseling';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'nama_siswa',
        'tanggal',
        'waktu',
        'topik',
        'status'
    ];

    protected $useTimestamps = true;
}