<?php
// app/Models/SesiBimbinganModel.php

namespace App\Models;
use CodeIgniter\Model;

class SesibimbinganModel extends Model
{
    protected $table         = 'sesi_bimbingan';
    protected $primaryKey    = 'id';
    protected $returnType    = 'array';
    protected $useSoftDeletes = false;
    protected $useTimestamps  = true;

    protected $allowedFields = [
        'siswa_id',
        'konselor',
        'tanggal',
        'waktu_mulai',
        'waktu_selesai',
        'jenis_sesi',
        'topik',
        'catatan',
        'rencana_tindak_lanjut',
        'status',
    ];

    protected $validationRules = [
        'siswa_id'   => 'required|integer',
        'konselor'   => 'required|max_length[100]',
        'tanggal'    => 'required|valid_date[Y-m-d]',
        'waktu_mulai'=> 'required',
        'jenis_sesi' => 'required|in_list[individual,kelompok,klasikal,online]',
        'topik'      => 'required|max_length[255]',
        'status'     => 'required|in_list[dijadwalkan,berlangsung,selesai]',
    ];

    protected $validationMessages = [
        'siswa_id' => ['required' => 'Siswa harus dipilih.'],
        'konselor' => ['required' => 'Konselor harus dipilih.'],
        'tanggal'  => ['required' => 'Tanggal harus diisi.'],
        'topik'    => ['required' => 'Topik sesi harus diisi.'],
    ];

    // ── Ambil semua sesi + nama siswa & kelas (JOIN) ──
    public function getAllWithSiswa(array $filter = []): array
    {
        $builder = $this->db->table('sesi_bimbingan sb')
            ->select('sb.*, s.nama AS nama_siswa, s.kelas')
            ->join('siswa s', 's.id = sb.siswa_id', 'left')
            ->orderBy('sb.tanggal', 'DESC')
            ->orderBy('sb.waktu_mulai', 'DESC');

        if (!empty($filter['jenis_sesi'])) {
            $builder->where('sb.jenis_sesi', $filter['jenis_sesi']);
        }
        if (!empty($filter['status'])) {
            $builder->where('sb.status', $filter['status']);
        }
        if (!empty($filter['kelas'])) {
            $builder->like('s.kelas', $filter['kelas'], 'after');
        }
        if (!empty($filter['q'])) {
            $builder->groupStart()
                ->like('s.nama', $filter['q'])
                ->orLike('sb.topik', $filter['q'])
                ->groupEnd();
        }

        return $builder->get()->getResultArray();
    }

    // ── Satu sesi + nama siswa & kelas ──
    public function getWithSiswa(int $id): ?array
    {
        return $this->db->table('sesi_bimbingan sb')
            ->select('sb.*, s.nama AS nama_siswa, s.kelas')
            ->join('siswa s', 's.id = sb.siswa_id', 'left')
            ->where('sb.id', $id)
            ->get()->getRowArray();
    }

    // ── Statistik ──
    public function getTotalSesi(): int
    {
        return $this->countAll();
    }

    public function getSesiBulanIni(): int
    {
        return $this->where('MONTH(tanggal)', date('m'))
                    ->where('YEAR(tanggal)', date('Y'))
                    ->countAllResults();
    }

    public function getSesiIndividual(): int
    {
        return $this->where('jenis_sesi', 'individual')->countAllResults();
    }

    public function getSesiSelesai(): int
    {
        return $this->where('status', 'selesai')->countAllResults();
    }
}