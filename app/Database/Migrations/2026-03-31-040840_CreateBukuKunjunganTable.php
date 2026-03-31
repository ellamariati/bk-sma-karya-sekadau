<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateBukuKunjunganTable extends Migration
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
                'unsigned'   => false,
            ],
            'tanggal' => [
                'type' => 'DATE',
            ],
            'jam' => [
                'type'    => 'TIME',
                'null'    => true,
                'default' => null,
            ],
            'jenis_kunjungan' => [
                'type'       => 'ENUM',
                'constraint' => ['mandiri', 'panggilan'],
                'default'    => 'mandiri',
                'comment'    => 'mandiri=siswa datang sendiri, panggilan=dipanggil BK',
            ],
            'jenis_bimbingan' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
                'null'       => true,
                'default'    => null,
                'comment'    => 'comma-separated: pribadi,sosial,belajar,karir',
            ],
            'keperluan' => [
                'type' => 'TEXT',
            ],
            'hasil_kunjungan' => [
                'type' => 'TEXT',
            ],
            'yang_menangani' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
            ],
            'ttd' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => true,
                'default'    => null,
            ],
            'status' => [
                'type'       => 'ENUM',
                'constraint' => ['proses', 'selesai'],
                'default'    => 'proses',
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
        $this->forge->addKey('siswa_id');
        $this->forge->addKey('tanggal');
        $this->forge->createTable('buku_kunjungan');
    }

    public function down()
    {
        $this->forge->dropTable('buku_kunjungan');
    }
}