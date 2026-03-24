<?php

namespace App\Models;

use CodeIgniter\Model;

class SiswaModel extends Model
{
    protected $table      = 'siswa';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'nisn', 'nis', 'nama', 'jk',
        'tempat_lahir', 'tanggal_lahir',
        'agama', 'kelas', 'jurusan',
        'no_hp_ortu', 'alamat', 'foto',
        'status', // aktif | alumni | keluar
    ];

    protected $useTimestamps = true;

    protected $validationRules = [
        'nisn'    => 'required|min_length[8]',
        'nama'    => 'required|min_length[3]',
        'kelas'   => 'required',
        'jurusan' => 'required',
        'jk'      => 'required|in_list[L,P]',
    ];

    /**
     * Jumlah siswa yang memiliki pelanggaran
     */
    public function getSiswaBermasalah(): int
    {
        $result = $this->db->table('siswa s')
            ->select('COUNT(DISTINCT p.siswa_id) as total')
            ->join('pelanggaran p', 'p.siswa_id = s.id', 'inner')
            ->get()->getRow();

        return (int) ($result->total ?? 0);
    }

    /**
     * Data siswa lengkap dengan total poin pelanggaran
     */
    public function getWithPoin(array $filter = []): array
    {
        $builder = $this->db->table('siswa s')
            ->select('s.*, COALESCE(SUM(p.poin), 0) as total_poin, COUNT(p.id) as jml_pelanggaran')
            ->join('pelanggaran p', 'p.siswa_id = s.id', 'left')
            ->groupBy('s.id')
            ->orderBy('s.nama', 'ASC');

        if (!empty($filter['kelas'])) {
            $builder->like('s.kelas', $filter['kelas'], 'after');
        }
        if (!empty($filter['jurusan'])) {
            $builder->where('s.jurusan', $filter['jurusan']);
        }
        if (!empty($filter['q'])) {
            $builder->groupStart()
                ->like('s.nama', $filter['q'])
                ->orLike('s.nisn', $filter['q'])
                ->orLike('s.kelas', $filter['q'])
                ->groupEnd();
        }

        return $builder->get()->getResultArray();
    }
}