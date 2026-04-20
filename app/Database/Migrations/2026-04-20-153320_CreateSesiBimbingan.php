<?php
// app/Database/Migrations/2024-01-01-000001_CreateSesiBimbingan.php

namespace App\Database\Migrations;
use CodeIgniter\Database\Migration;

class CreateSesiBimbingan extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'siswa_id' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'   => true,
            ],
            'konselor' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
            ],
            'tanggal' => [
                'type' => 'DATE',
            ],
            'waktu_mulai' => [
                'type'       => 'TIME',
                'null'       => false,
            ],
            'waktu_selesai' => [
                'type' => 'TIME',
                'null' => true,
            ],
            'jenis_sesi' => [
                'type'       => 'ENUM',
                'constraint' => ['individual', 'kelompok', 'klasikal', 'online'],
            ],
            'topik' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
            'catatan' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'rencana_tindak_lanjut' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'status' => [
                'type'       => 'ENUM',
                'constraint' => ['dijadwalkan', 'berlangsung', 'selesai'],
                'default'    => 'dijadwalkan',
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
        $this->forge->addForeignKey('siswa_id', 'siswa', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('sesi_bimbingan');
    }

    public function down()
    {
        $this->forge->dropTable('sesi_bimbingan', true);
    }
}