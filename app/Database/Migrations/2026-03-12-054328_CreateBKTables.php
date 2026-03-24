<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateBKTables extends Migration
{
    public function up()
    {
        // ===== Tabel Siswa =====
        $this->forge->addField([
            'id'         => ['type' => 'INT', 'auto_increment' => true],
            'nisn'       => ['type' => 'VARCHAR', 'constraint' => 20, 'unique' => true],
            'nama'       => ['type' => 'VARCHAR', 'constraint' => 100],
            'kelas'      => ['type' => 'VARCHAR', 'constraint' => 30],
            'jurusan'    => ['type' => 'VARCHAR', 'constraint' => 50],
            'jk'         => ['type' => 'ENUM', 'constraint' => ['L', 'P']],
            'foto'       => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'no_hp_ortu' => ['type' => 'VARCHAR', 'constraint' => 20, 'null' => true],
            'created_at' => ['type' => 'DATETIME', 'null' => true],
            'updated_at' => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('siswa');

        // ===== Tabel Users (Konselor/Admin) =====
        $this->forge->addField([
            'id'         => ['type' => 'INT', 'auto_increment' => true],
            'nama'       => ['type' => 'VARCHAR', 'constraint' => 100],
            'email'      => ['type' => 'VARCHAR', 'constraint' => 150, 'unique' => true],
            'password'   => ['type' => 'VARCHAR', 'constraint' => 255],
            'role'       => ['type' => 'ENUM', 'constraint' => ['admin', 'konselor', 'guru']],
            'foto'       => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'created_at' => ['type' => 'DATETIME', 'null' => true],
            'updated_at' => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('users');

        // ===== Tabel Pelanggaran =====
        $this->forge->addField([
            'id'                 => ['type' => 'INT', 'auto_increment' => true],
            'siswa_id'           => ['type' => 'INT'],
            'konselor_id'        => ['type' => 'INT', 'null' => true],
            'jenis_pelanggaran'  => ['type' => 'VARCHAR', 'constraint' => 100],
            'deskripsi'          => ['type' => 'TEXT', 'null' => true],
            'tanggal_kejadian'   => ['type' => 'DATE'],
            'poin'               => ['type' => 'INT', 'default' => 0],
            'status'             => ['type' => 'ENUM', 'constraint' => ['baru', 'proses', 'diproses'], 'default' => 'baru'],
            'notif_ortu'         => ['type' => 'TINYINT', 'constraint' => 1, 'default' => 0],
            'catatan'            => ['type' => 'TEXT', 'null' => true],
            'created_at'         => ['type' => 'DATETIME', 'null' => true],
            'updated_at'         => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->addForeignKey('siswa_id', 'siswa', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('konselor_id', 'users', 'id', 'SET NULL', 'SET NULL');
        $this->forge->createTable('pelanggaran');
    }

    public function down()
    {
        $this->forge->dropTable('pelanggaran', true);
        $this->forge->dropTable('users', true);
        $this->forge->dropTable('siswa', true);
    }
}