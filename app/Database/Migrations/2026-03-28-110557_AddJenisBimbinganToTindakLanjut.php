<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddJenisBimbinganToTindakLanjut extends Migration
{
    public function up()
    {
        $this->forge->addColumn('tindak_lanjut', [
            'jenis_bimbingan' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
                'null'       => true,
                'default'    => null,
                'after'      => 'yang_menangani',
                'comment'    => 'Coma-separated: pribadi,sosial,belajar,karir',
            ],
        ]);
    }

    public function down()
    {
        $this->forge->dropColumn('tindak_lanjut', 'jenis_bimbingan');
    }
}