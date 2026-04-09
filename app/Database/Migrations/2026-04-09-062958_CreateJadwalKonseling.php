<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateJadwalKonseling extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'auto_increment' => true,
            ],
            'nama_siswa' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'tanggal' => [
                'type' => 'DATE',
            ],
            'waktu' => [
                'type' => 'TIME',
            ],
            'topik' => [
                'type' => 'TEXT',
            ],
            'status' => [
                'type' => 'ENUM',
                'constraint' => ['Terjadwal', 'Selesai', 'Batal'],
                'default' => 'Terjadwal'
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
        $this->forge->createTable('jadwal_konseling');
    }

    public function down()
    {
        $this->forge->dropTable('jadwal_konseling');
    }
}