<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

/**
 * Jalankan: php spark migrate
 * Menambah kolom kategori & lokasi ke tabel pelanggaran
 * (jika tabel sudah ada dari migrasi sebelumnya)
 */
class AddKolomPelanggaran extends Migration
{
    public function up()
    {
        // Cek apakah kolom sudah ada sebelum menambahkan
        $fields = $this->db->getFieldNames('pelanggaran');

        if (!in_array('kategori', $fields)) {
            $this->forge->addColumn('pelanggaran', [
                'kategori' => [
                    'type'       => 'ENUM',
                    'constraint' => ['ringan', 'sedang', 'berat'],
                    'default'    => 'ringan',
                    'after'      => 'jenis_pelanggaran',
                ],
            ]);
        }

        if (!in_array('lokasi', $fields)) {
            $this->forge->addColumn('pelanggaran', [
                'lokasi' => [
                    'type'       => 'VARCHAR',
                    'constraint' => 100,
                    'null'       => true,
                    'after'      => 'deskripsi',
                ],
            ]);
        }
    }

    public function down()
    {
        $this->forge->dropColumn('pelanggaran', 'kategori');
        $this->forge->dropColumn('pelanggaran', 'lokasi');
    }
}