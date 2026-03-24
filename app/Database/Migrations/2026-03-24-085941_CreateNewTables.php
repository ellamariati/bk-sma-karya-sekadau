<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateNewTables extends Migration
{
    public function up()
    {
        // ══ TINDAK LANJUT ══
        $this->forge->addField([
            'id'              => ['type'=>'INT','auto_increment'=>true],
            'pelanggaran_id'  => ['type'=>'INT'],
            'siswa_id'        => ['type'=>'INT'],
            'konselor_id'     => ['type'=>'INT','null'=>true],
            'masalah'         => ['type'=>'TEXT'],
            'tindak_lanjut'   => ['type'=>'TEXT'],
            'yang_menangani'  => ['type'=>'VARCHAR','constraint'=>100],
            'tanggal'         => ['type'=>'DATE'],
            'ttd'             => ['type'=>'VARCHAR','constraint'=>255,'null'=>true],
            'status'          => ['type'=>'ENUM','constraint'=>['proses','selesai'],'default'=>'proses'],
            'created_at'      => ['type'=>'DATETIME','null'=>true],
            'updated_at'      => ['type'=>'DATETIME','null'=>true],
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->addForeignKey('pelanggaran_id','pelanggaran','id','CASCADE','CASCADE');
        $this->forge->addForeignKey('siswa_id','siswa','id','CASCADE','CASCADE');
        $this->forge->createTable('tindak_lanjut');

        // ══ BUKU KUNJUNGAN ══
        $this->forge->addField([
            'id'               => ['type'=>'INT','auto_increment'=>true],
            'siswa_id'         => ['type'=>'INT'],
            'konselor_id'      => ['type'=>'INT','null'=>true],
            'tanggal'          => ['type'=>'DATE'],
            'jenis_bimbingan'  => ['type'=>'ENUM','constraint'=>['pribadi','sosial','belajar','karir']],
            'materi'           => ['type'=>'TEXT','null'=>true],
            'keterangan'       => ['type'=>'TEXT','null'=>true],
            'created_at'       => ['type'=>'DATETIME','null'=>true],
            'updated_at'       => ['type'=>'DATETIME','null'=>true],
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->addForeignKey('siswa_id','siswa','id','CASCADE','CASCADE');
        $this->forge->createTable('buku_kunjungan');

        // ══ JADWAL KONSELING ══
        $this->forge->addField([
            'id'           => ['type'=>'INT','auto_increment'=>true],
            'siswa_id'     => ['type'=>'INT'],
            'konselor_id'  => ['type'=>'INT','null'=>true],
            'tanggal'      => ['type'=>'DATE'],
            'jam_mulai'    => ['type'=>'TIME'],
            'jam_selesai'  => ['type'=>'TIME','null'=>true],
            'keperluan'    => ['type'=>'VARCHAR','constraint'=>255],
            'status'       => ['type'=>'ENUM','constraint'=>['menunggu','selesai','batal'],'default'=>'menunggu'],
            'catatan'      => ['type'=>'TEXT','null'=>true],
            'created_at'   => ['type'=>'DATETIME','null'=>true],
            'updated_at'   => ['type'=>'DATETIME','null'=>true],
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->addForeignKey('siswa_id','siswa','id','CASCADE','CASCADE');
        $this->forge->createTable('jadwal_konseling');

        // ══ KATEGORI PELANGGARAN ══
        $this->forge->addField([
            'id'         => ['type'=>'INT','auto_increment'=>true],
            'nama'       => ['type'=>'VARCHAR','constraint'=>100],
            'kode'       => ['type'=>'VARCHAR','constraint'=>20,'null'=>true],
            'kategori'   => ['type'=>'ENUM','constraint'=>['ringan','sedang','berat']],
            'poin'       => ['type'=>'INT','default'=>0],
            'deskripsi'  => ['type'=>'TEXT','null'=>true],
            'created_at' => ['type'=>'DATETIME','null'=>true],
            'updated_at' => ['type'=>'DATETIME','null'=>true],
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('kategori_pelanggaran');

        // ══ SURAT DOKUMEN ══
        $this->forge->addField([
            'id'           => ['type'=>'INT','auto_increment'=>true],
            'siswa_id'     => ['type'=>'INT'],
            'konselor_id'  => ['type'=>'INT','null'=>true],
            'jenis_surat'  => ['type'=>'VARCHAR','constraint'=>100],
            'nomor_surat'  => ['type'=>'VARCHAR','constraint'=>50,'null'=>true],
            'tanggal'      => ['type'=>'DATE'],
            'isi'          => ['type'=>'TEXT','null'=>true],
            'file_path'    => ['type'=>'VARCHAR','constraint'=>255,'null'=>true],
            'created_at'   => ['type'=>'DATETIME','null'=>true],
            'updated_at'   => ['type'=>'DATETIME','null'=>true],
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->addForeignKey('siswa_id','siswa','id','CASCADE','CASCADE');
        $this->forge->createTable('surat_dokumen');

        // ══ GURU BK ══
        $this->forge->addField([
            'id'         => ['type'=>'INT','auto_increment'=>true],
            'user_id'    => ['type'=>'INT','null'=>true],
            'nip'        => ['type'=>'VARCHAR','constraint'=>30,'null'=>true],
            'nama'       => ['type'=>'VARCHAR','constraint'=>100],
            'jabatan'    => ['type'=>'VARCHAR','constraint'=>100,'null'=>true],
            'no_hp'      => ['type'=>'VARCHAR','constraint'=>20,'null'=>true],
            'email'      => ['type'=>'VARCHAR','constraint'=>150,'null'=>true],
            'foto'       => ['type'=>'VARCHAR','constraint'=>255,'null'=>true],
            'created_at' => ['type'=>'DATETIME','null'=>true],
            'updated_at' => ['type'=>'DATETIME','null'=>true],
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('guru_bk');
    }

    public function down()
    {
        $this->forge->dropTable('tindak_lanjut',        true);
        $this->forge->dropTable('buku_kunjungan',       true);
        $this->forge->dropTable('jadwal_konseling',     true);
        $this->forge->dropTable('kategori_pelanggaran', true);
        $this->forge->dropTable('surat_dokumen',        true);
        $this->forge->dropTable('guru_bk',              true);
    }
}