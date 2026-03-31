<?php

namespace App\Controllers;

use App\Models\BukuKunjunganModel;
use App\Models\SiswaModel;

class BukuKunjungan extends BaseController
{
    protected $bukuKunjunganModel;
    protected $siswaModel;

    public function __construct()
    {
        $this->bukuKunjunganModel = new BukuKunjunganModel();
        $this->siswaModel         = new SiswaModel();
    }

    // ═══════════════════════════════════════
    // INDEX
    // ═══════════════════════════════════════
    public function index()
    {
        $stats = $this->bukuKunjunganModel->getStats();

        return view('buku-kunjungan/index', [
            'list_kunjungan' => $this->bukuKunjunganModel->getAllWithSiswa(),
            'list_siswa'     => $this->siswaModel->where('status', 'aktif')->orderBy('nama', 'ASC')->findAll(),
            'stats'          => $stats,
        ]);
    }

    // ═══════════════════════════════════════
    // SIMPAN
    // ═══════════════════════════════════════
    public function simpan()
    {
        $rules = [
            'siswa_id'        => 'required|integer',
            'tanggal'         => 'required|valid_date',
            'jenis_kunjungan' => 'required|in_list[mandiri,panggilan]',
            'keperluan'       => 'required|min_length[5]',
            'hasil_kunjungan' => 'required|min_length[5]',
            'yang_menangani'  => 'required',
        ];

        $messages = [
            'siswa_id'        => ['required' => 'Siswa wajib dipilih.'],
            'tanggal'         => ['required' => 'Tanggal wajib diisi.'],
            'jenis_kunjungan' => ['required' => 'Jenis kunjungan wajib dipilih.'],
            'keperluan'       => ['required' => 'Keperluan wajib diisi.', 'min_length' => 'Keperluan minimal 5 karakter.'],
            'hasil_kunjungan' => ['required' => 'Hasil kunjungan wajib diisi.', 'min_length' => 'Minimal 5 karakter.'],
            'yang_menangani'  => ['required' => 'Yang menangani wajib dipilih.'],
        ];

        if (!$this->validate($rules, $messages)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $jenisBimbingan    = $this->request->getPost('jenis_bimbingan');
        $jenisBimbinganStr = is_array($jenisBimbingan) ? implode(',', $jenisBimbingan) : null;

        $jam = $this->request->getPost('jam');

        $this->bukuKunjunganModel->insert([
            'siswa_id'        => (int) $this->request->getPost('siswa_id'),
            'tanggal'         => $this->request->getPost('tanggal'),
            'jam'             => ($jam !== '' && $jam !== null) ? $jam : null,
            'jenis_kunjungan' => $this->request->getPost('jenis_kunjungan'),
            'jenis_bimbingan' => $jenisBimbinganStr,
            'keperluan'       => $this->request->getPost('keperluan'),
            'hasil_kunjungan' => $this->request->getPost('hasil_kunjungan'),
            'yang_menangani'  => $this->request->getPost('yang_menangani'),
            'ttd'             => $this->request->getPost('ttd') ?: null,
            'status'          => 'proses',
        ]);

        return redirect()->to(base_url('buku-kunjungan'))
            ->with('success', 'Data kunjungan berhasil ditambahkan.');
    }

    // ═══════════════════════════════════════
    // DETAIL — JSON untuk modal
    // ═══════════════════════════════════════
    public function detail(int $id)
    {
        $data = $this->bukuKunjunganModel->getDetailById($id);
        if (!$data) {
            return $this->response->setJSON(['success' => false, 'message' => 'Data tidak ditemukan.']);
        }
        $data['jenis_bimbingan_arr'] = $data['jenis_bimbingan']
            ? explode(',', $data['jenis_bimbingan']) : [];
        return $this->response->setJSON(['success' => true, 'data' => $data]);
    }

    // ═══════════════════════════════════════
    // EDIT — JSON untuk modal edit
    // ═══════════════════════════════════════
    public function edit(int $id)
    {
        $data = $this->bukuKunjunganModel->getDetailById($id);
        if (!$data) {
            return $this->response->setJSON(['success' => false, 'message' => 'Data tidak ditemukan.']);
        }
        $data['jenis_bimbingan_arr'] = $data['jenis_bimbingan']
            ? explode(',', $data['jenis_bimbingan']) : [];
        return $this->response->setJSON(['success' => true, 'data' => $data]);
    }

    // ═══════════════════════════════════════
    // UPDATE
    // ═══════════════════════════════════════
    public function update(int $id)
    {
        if (!$this->bukuKunjunganModel->find($id)) {
            return redirect()->to(base_url('buku-kunjungan'))->with('error', 'Data tidak ditemukan.');
        }

        $rules = [
            'siswa_id'        => 'required|integer',
            'tanggal'         => 'required|valid_date',
            'jenis_kunjungan' => 'required|in_list[mandiri,panggilan]',
            'keperluan'       => 'required|min_length[5]',
            'hasil_kunjungan' => 'required|min_length[5]',
            'yang_menangani'  => 'required',
            'status'          => 'required|in_list[proses,selesai]',
        ];

        if (!$this->validate($rules)) {
            return redirect()->to(base_url('buku-kunjungan'))
                ->with('error', 'Validasi gagal: ' . implode(', ', $this->validator->getErrors()));
        }

        $jenisBimbingan    = $this->request->getPost('jenis_bimbingan');
        $jenisBimbinganStr = is_array($jenisBimbingan) ? implode(',', $jenisBimbingan) : null;

        $jam = $this->request->getPost('jam');

        $this->bukuKunjunganModel->update($id, [
            'siswa_id'        => (int) $this->request->getPost('siswa_id'),
            'tanggal'         => $this->request->getPost('tanggal'),
            'jam'             => ($jam !== '' && $jam !== null) ? $jam : null,
            'jenis_kunjungan' => $this->request->getPost('jenis_kunjungan'),
            'jenis_bimbingan' => $jenisBimbinganStr,
            'keperluan'       => $this->request->getPost('keperluan'),
            'hasil_kunjungan' => $this->request->getPost('hasil_kunjungan'),
            'yang_menangani'  => $this->request->getPost('yang_menangani'),
            'ttd'             => $this->request->getPost('ttd') ?: null,
            'status'          => $this->request->getPost('status'),
        ]);

        return redirect()->to(base_url('buku-kunjungan'))
            ->with('success', 'Data kunjungan berhasil diperbarui.');
    }

    // ═══════════════════════════════════════
    // UPDATE STATUS AJAX
    // ═══════════════════════════════════════
    public function updateStatus(int $id)
    {
        $status = $this->request->getPost('status');
        if (!in_array($status, ['proses', 'selesai'])) {
            return $this->response->setJSON(['success' => false, 'message' => 'Status tidak valid.']);
        }
        if (!$this->bukuKunjunganModel->find($id)) {
            return $this->response->setJSON(['success' => false, 'message' => 'Data tidak ditemukan.']);
        }
        $this->bukuKunjunganModel->update($id, ['status' => $status]);
        return $this->response->setJSON(['success' => true, 'status' => $status]);
    }

    // ═══════════════════════════════════════
    // HAPUS
    // ═══════════════════════════════════════
    public function hapus(int $id)
    {
        if (!$this->bukuKunjunganModel->find($id)) {
            return redirect()->to(base_url('buku-kunjungan'))->with('error', 'Data tidak ditemukan.');
        }
        $this->bukuKunjunganModel->delete($id);
        return redirect()->to(base_url('buku-kunjungan'))
            ->with('success', 'Data kunjungan berhasil dihapus.');
    }

    // ═══════════════════════════════════════
    // EXPORT CSV
    // ═══════════════════════════════════════
    public function export()
    {
        $list = $this->bukuKunjunganModel->getAllWithSiswa();

        header('Content-Type: text/csv; charset=UTF-8');
        header('Content-Disposition: attachment; filename="buku_kunjungan_' . date('Ymd_His') . '.csv"');
        header('Pragma: no-cache');

        $out = fopen('php://output', 'w');
        fprintf($out, chr(0xEF) . chr(0xBB) . chr(0xBF));

        fputcsv($out, ['No', 'Hari/Tgl', 'Jam', 'Nama Siswa', 'NISN', 'Kelas',
                       'Jenis Kunjungan', 'Jenis Bimbingan', 'Keperluan',
                       'Hasil Kunjungan', 'Yang Menangani', 'TTD', 'Status']);

        $hariId = ['Sunday'=>'Minggu','Monday'=>'Senin','Tuesday'=>'Selasa',
                   'Wednesday'=>'Rabu','Thursday'=>'Kamis','Friday'=>'Jumat','Saturday'=>'Sabtu'];

        foreach ($list as $i => $row) {
            $tgl  = $row['tanggal'];
            $hari = $hariId[date('l', strtotime($tgl))] ?? date('l', strtotime($tgl));
            fputcsv($out, [
                $i + 1,
                $hari . ', ' . date('d/m/Y', strtotime($tgl)),
                $row['jam'] ?? '-',
                $row['nama_siswa']       ?? '-',
                $row['nisn']             ?? '-',
                $row['kelas']            ?? '-',
                ucfirst($row['jenis_kunjungan']),
                $row['jenis_bimbingan']  ?? '-',
                $row['keperluan'],
                $row['hasil_kunjungan'],
                $row['yang_menangani'],
                $row['ttd']              ?? '-',
                ucfirst($row['status']),
            ]);
        }

        fclose($out);
        exit;
    }
}