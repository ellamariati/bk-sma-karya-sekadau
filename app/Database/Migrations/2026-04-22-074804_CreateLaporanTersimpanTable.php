<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

/**
 * Migration: CreateLaporanTersimpanTable
 *
 * Tabel ini menyimpan history laporan yang pernah di-generate/export
 * oleh Guru BK. Tidak menyimpan data bimbingan (sudah ada di tabel lain),
 * hanya menyimpan metadata laporan: siapa yang buat, periode, jenis, dll.
 *
 * Jalankan: php spark migrate
 */
class CreateLaporanTersimpanTable extends Migration
{
    public function up(): void
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            // Judul laporan, mis: "Laporan Bimbingan April 2026"
            'judul' => [
                'type'       => 'VARCHAR',
                'constraint' => 200,
            ],
            // Jenis laporan: bulanan | semesteran | tahunan | custom
            'jenis_laporan' => [
                'type'       => 'ENUM',
                'constraint' => ['bulanan', 'semesteran', 'tahunan', 'custom'],
                'default'    => 'bulanan',
            ],
            // Sumber data: bimbingan | pelanggaran | kunjungan | semua
            'sumber_data' => [
                'type'       => 'ENUM',
                'constraint' => ['bimbingan', 'pelanggaran', 'kunjungan', 'semua'],
                'default'    => 'semua',
            ],
            // 0 = semua bulan
            'periode_bulan' => [
                'type'       => 'TINYINT',
                'constraint' => 2,
                'unsigned'   => true,
                'default'    => 0,
            ],
            'periode_tahun' => [
                'type'       => 'SMALLINT',
                'constraint' => 4,
                'unsigned'   => true,
            ],
            // Filter kelas opsional: X / XI / XII / null = semua
            'filter_kelas' => [
                'type'       => 'VARCHAR',
                'constraint' => 10,
                'null'       => true,
            ],
            // Format export terakhir: pdf | excel | csv
            'format_export' => [
                'type'       => 'VARCHAR',
                'constraint' => 10,
                'null'       => true,
            ],
            // Siapa yang membuat laporan (relasi ke tabel users)
            'dibuat_oleh' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'   => true,
                'null'       => true,
            ],
            'catatan' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->addKey('periode_tahun');
        $this->forge->addKey('sumber_data');
        $this->forge->createTable('laporan_tersimpan', true);
    }

    public function down(): void
    {
        $this->forge->dropTable('laporan_tersimpan', true);
    }
}