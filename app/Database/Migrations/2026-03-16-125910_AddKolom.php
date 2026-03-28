<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddKolomPelanggaran extends Migration
{
    public function up()
    {
   
        /** @var \CodeIgniter\Database\BaseConnection $db */
        $db     = $this->db;
        $fields = $db->getFieldNames('pelanggaran');
        
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