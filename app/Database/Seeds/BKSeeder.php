<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class BKSeeder extends Seeder
{
    public function run()
    {
        // ===== SISWA =====
        $siswa = [
            ['nisn' => '0041234567', 'nama' => 'Rizky Aditya',    'kelas' => 'XII IPA 1', 'jurusan' => 'IPA', 'jk' => 'L'],
            ['nisn' => '0041234568', 'nama' => 'Sari Putri',       'kelas' => 'XI IPS 2',  'jurusan' => 'IPS', 'jk' => 'P'],
            ['nisn' => '0041234569', 'nama' => 'Budi Wijaya',      'kelas' => 'X MIPA 3',  'jurusan' => 'MIPA','jk' => 'L'],
            ['nisn' => '0041234570', 'nama' => 'Dian Fitriani',    'kelas' => 'XII IPS 1', 'jurusan' => 'IPS', 'jk' => 'P'],
            ['nisn' => '0041234571', 'nama' => 'Ahmad Prasetyo',   'kelas' => 'XI MIPA 2', 'jurusan' => 'MIPA','jk' => 'L'],
            ['nisn' => '0041234572', 'nama' => 'Nadia Lestari',    'kelas' => 'X IPS 1',   'jurusan' => 'IPS', 'jk' => 'P'],
        ];

        $this->db->table('siswa')->insertBatch($siswa);

        // ===== USERS (Konselor) =====
        $users = [
            [
                'nama'     => 'Arif Santoso, M.Pd',
                'email'    => 'arif@sman1.sch.id',
                'password' => password_hash('password123', PASSWORD_DEFAULT),
                'role'     => 'konselor',
            ],
            [
                'nama'     => 'Dewi Rahayu, S.Pd',
                'email'    => 'dewi@sman1.sch.id',
                'password' => password_hash('password123', PASSWORD_DEFAULT),
                'role'     => 'konselor',
            ],
            [
                'nama'     => 'Admin BK',
                'email'    => 'admin@sman1.sch.id',
                'password' => password_hash('admin123', PASSWORD_DEFAULT),
                'role'     => 'admin',
            ],
        ];

        $this->db->table('users')->insertBatch($users);

        // ===== PELANGGARAN =====
        $pelanggaran = [
            ['siswa_id'=>1,'konselor_id'=>1,'jenis_pelanggaran'=>'Perkelahian',            'poin'=>75,'status'=>'baru',      'tanggal_kejadian'=>'2026-03-12','notif_ortu'=>0],
            ['siswa_id'=>2,'konselor_id'=>2,'jenis_pelanggaran'=>'Keterlambatan Berulang',  'poin'=>25,'status'=>'proses',    'tanggal_kejadian'=>'2026-03-11','notif_ortu'=>1],
            ['siswa_id'=>3,'konselor_id'=>1,'jenis_pelanggaran'=>'Penggunaan HP di Kelas',  'poin'=>15,'status'=>'diproses',  'tanggal_kejadian'=>'2026-03-10','notif_ortu'=>0],
            ['siswa_id'=>4,'konselor_id'=>2,'jenis_pelanggaran'=>'Membolos Pelajaran',      'poin'=>30,'status'=>'baru',      'tanggal_kejadian'=>'2026-03-09','notif_ortu'=>0],
            ['siswa_id'=>5,'konselor_id'=>1,'jenis_pelanggaran'=>'Seragam Tidak Sesuai',    'poin'=>10,'status'=>'diproses',  'tanggal_kejadian'=>'2026-03-08','notif_ortu'=>0],
            ['siswa_id'=>6,'konselor_id'=>2,'jenis_pelanggaran'=>'Bullying Verbal',         'poin'=>50,'status'=>'proses',    'tanggal_kejadian'=>'2026-03-07','notif_ortu'=>1],
        ];

        $this->db->table('pelanggaran')->insertBatch($pelanggaran);
    }
}