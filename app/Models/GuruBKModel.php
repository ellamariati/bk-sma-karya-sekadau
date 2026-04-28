<?php

namespace App\Models;

use CodeIgniter\Model;

class GuruBKModel extends Model
{
    protected $table      = 'guru_bk';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'nip',
        'nama',
        'jenis_kelamin',  // L | P
        'no_hp',
        'email',
        'kelas_pengampu', // Contoh: X, XI, XII / semua
        'status',         // aktif | tidak aktif
    ];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    protected $validationRules = [
        'nip'   => 'required|min_length[5]',
        'nama'  => 'required|min_length[3]',
        'email' => 'required|valid_email',
    ];
}