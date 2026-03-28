<?php

namespace App\Models;

use CodeIgniter\Model;

class TindaklanjutModel extends Model
{
    protected $table          = 'tindak_lanjut';
    protected $primaryKey     = 'id';
    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = [
        'pelanggaran_id', 'siswa_id', 'konselor_id',
        'masalah', 'tindak_lanjut', 'yang_menangani',
        'jenis_bimbingan',
        'tanggal', 'ttd', 'status',
    ];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    public function getAllWithSiswa(): array
    {
        return $this->db->table('tindak_lanjut tl')
            ->select('tl.*, s.nama as nama_siswa, s.kelas, s.nisn, s.jurusan, s.jk, s.no_hp_ortu')
            ->join('siswa s', 's.id = tl.siswa_id', 'left')
            ->orderBy('tl.tanggal', 'DESC')
            ->get()
            ->getResultArray();
    }

    public function getDetailById(int $id): ?array
    {
        $result = $this->db->table('tindak_lanjut tl')
            ->select('tl.*, s.nama as nama_siswa, s.kelas, s.nisn, s.jurusan, s.jk, s.no_hp_ortu')
            ->join('siswa s', 's.id = tl.siswa_id', 'left')
            ->where('tl.id', $id)
            ->get()
            ->getRowArray();

        return $result ?: null;
    }

    public function getStats(): array
    {
        $total = (int) $this->db->table('tindak_lanjut')->countAllResults();

        $rows = $this->db->table('tindak_lanjut')
            ->select('status, COUNT(*) as jumlah')
            ->groupBy('status')
            ->get()
            ->getResultArray();

        $proses  = 0;
        $selesai = 0;
        foreach ($rows as $r) {
            if ($r['status'] === 'proses')  $proses  = (int) $r['jumlah'];
            if ($r['status'] === 'selesai') $selesai = (int) $r['jumlah'];
        }

        $bulanIni = (int) $this->db->table('tindak_lanjut')
            ->where('MONTH(tanggal)', date('m'))
            ->where('YEAR(tanggal)',  date('Y'))
            ->countAllResults();

        return compact('total', 'proses', 'selesai', 'bulanIni');
    }
}