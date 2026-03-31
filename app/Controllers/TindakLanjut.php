<?php

namespace App\Controllers;

use App\Models\TindaklanjutModel;
use App\Models\SiswaModel;

class TindakLanjut extends BaseController
{
    protected $tindakLanjutModel;
    protected $siswaModel;

    public function __construct()
    {
        $this->tindakLanjutModel = new TindaklanjutModel();
        $this->siswaModel        = new SiswaModel();
    }

    public function index()
    {
        $stats = $this->tindakLanjutModel->getStats();

        return view('tindak-lanjut/index', [
            'list_tindak_lanjut' => $this->tindakLanjutModel->getAllWithSiswa(),
            'list_siswa'         => $this->siswaModel->where('status', 'aktif')->orderBy('nama', 'ASC')->findAll(),
            'total'              => $stats['total'],
            'proses'             => $stats['proses'],
            'selesai'            => $stats['selesai'],
            'bulan_ini'          => $stats['bulanIni'],
            'stats'              => ['baru' => 0],
        ]);
    }

    public function simpan()
    {
        $rules = [
            'siswa_id'       => 'required|integer',
            'masalah'        => 'required|min_length[5]',
            'tindak_lanjut'  => 'required|min_length[5]',
            'yang_menangani' => 'required',
            'tanggal'        => 'required|valid_date',
        ];

        $messages = [
            'siswa_id'       => ['required' => 'Siswa wajib dipilih.'],
            'masalah'        => ['required' => 'Masalah wajib diisi.', 'min_length' => 'Masalah minimal 5 karakter.'],
            'tindak_lanjut'  => ['required' => 'Tindak lanjut wajib diisi.', 'min_length' => 'Tindak lanjut minimal 5 karakter.'],
            'yang_menangani' => ['required' => 'Pihak yang menangani wajib dipilih.'],
            'tanggal'        => ['required' => 'Tanggal wajib diisi.'],
        ];

        if (!$this->validate($rules, $messages)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Jenis bimbingan: array checkbox → simpan sebagai comma-separated
        $jenisBimbingan = $this->request->getPost('jenis_bimbingan');
        $jenisBimbinganStr = is_array($jenisBimbingan) ? implode(',', $jenisBimbingan) : null;

        $pelanggaranId = $this->request->getPost('pelanggaran_id');
        $pelanggaranId = ($pelanggaranId !== '' && $pelanggaranId !== null) ? (int) $pelanggaranId : null;

      $this->tindakLanjutModel->insert([
        'siswa_id'        => (int) $this->request->getPost('siswa_id'),
        'konselor_id'     => null,
        'masalah'         => $this->request->getPost('masalah'),
        'tindak_lanjut'   => $this->request->getPost('tindak_lanjut'),
        'yang_menangani'  => $this->request->getPost('yang_menangani'),
        'jenis_bimbingan' => $jenisBimbinganStr,
        'tanggal'         => $this->request->getPost('tanggal'),
        'ttd'             => $this->request->getPost('ttd') ?: null,
        'status'          => 'proses',
    ]);

        return redirect()->to(base_url('tindak-lanjut'))->with('success', 'Tindak lanjut berhasil ditambahkan.');
    }

    public function detail(int $id)
    {
        $data = $this->tindakLanjutModel->getDetailById($id);
        if (!$data) {
            return $this->response->setJSON(['success' => false, 'message' => 'Data tidak ditemukan.']);
        }
        // Pecah jenis_bimbingan jadi array untuk frontend
        $data['jenis_bimbingan_arr'] = $data['jenis_bimbingan']
            ? explode(',', $data['jenis_bimbingan'])
            : [];
        return $this->response->setJSON(['success' => true, 'data' => $data]);
    }

    public function edit(int $id)
    {
        $data = $this->tindakLanjutModel->getDetailById($id);
        if (!$data) {
            return $this->response->setJSON(['success' => false, 'message' => 'Data tidak ditemukan.']);
        }
        $data['jenis_bimbingan_arr'] = $data['jenis_bimbingan']
            ? explode(',', $data['jenis_bimbingan'])
            : [];
        return $this->response->setJSON(['success' => true, 'data' => $data]);
    }

    public function update(int $id)
    {
        if (!$this->tindakLanjutModel->find($id)) {
            return redirect()->to(base_url('tindak-lanjut'))
                ->with('error', 'Data tidak ditemukan.');
        }

        $rules = [
            'siswa_id'       => 'required|integer',
            'masalah'        => 'required|min_length[5]',
            'tindak_lanjut'  => 'required|min_length[5]',
            'yang_menangani' => 'required',
            'tanggal'        => 'required|valid_date',
            'status'         => 'required|in_list[proses,selesai]',
        ];

        if (!$this->validate($rules)) {
            return redirect()->to(base_url('tindak-lanjut'))
                ->with('error', 'Validasi gagal: ' . implode(', ', $this->validator->getErrors()));
        }

        $jenisBimbingan    = $this->request->getPost('jenis_bimbingan');
        $jenisBimbinganStr = is_array($jenisBimbingan) ? implode(',', $jenisBimbingan) : null;

        $this->tindakLanjutModel->update($id, [
            'siswa_id'        => (int) $this->request->getPost('siswa_id'),
            'masalah'         => $this->request->getPost('masalah'),
            'tindak_lanjut'   => $this->request->getPost('tindak_lanjut'),
            'yang_menangani'  => $this->request->getPost('yang_menangani'),
            'jenis_bimbingan' => $jenisBimbinganStr,
            'tanggal'         => $this->request->getPost('tanggal'),
            'ttd'             => $this->request->getPost('ttd') ?: null,
            'status'          => $this->request->getPost('status'),
        ]);

        return redirect()->to(base_url('tindak-lanjut'))
            ->with('success', 'Tindak lanjut berhasil diperbarui.');
    }
    public function updateStatus(int $id)
    {
        $status = $this->request->getPost('status');

        if (!in_array($status, ['proses', 'selesai'])) {
            return $this->response->setJSON(['success' => false, 'message' => 'Status tidak valid.']);
        }
        if (!$this->tindakLanjutModel->find($id)) {
            return $this->response->setJSON(['success' => false, 'message' => 'Data tidak ditemukan.']);
        }

        $this->tindakLanjutModel->update($id, ['status' => $status]);
        return $this->response->setJSON(['success' => true, 'status' => $status]);
    }

    public function hapus(int $id)
    {
        if (!$this->tindakLanjutModel->find($id)) {
            return redirect()->to(base_url('tindak-lanjut'))->with('error', 'Data tidak ditemukan.');
        }
        $this->tindakLanjutModel->delete($id);
        return redirect()->to(base_url('tindak-lanjut'))->with('success', 'Tindak lanjut berhasil dihapus.');
    }

    public function export()
    {
        $list = $this->tindakLanjutModel->getAllWithSiswa();

        header('Content-Type: text/csv; charset=UTF-8');
        header('Content-Disposition: attachment; filename="tindak_lanjut_' . date('Ymd_His') . '.csv"');
        header('Pragma: no-cache');

        $out = fopen('php://output', 'w');
        fprintf($out, chr(0xEF) . chr(0xBB) . chr(0xBF));

        fputcsv($out, ['No', 'Hari/Tgl', 'Nama Siswa', 'NISN', 'Kelas', 'Jurusan',
                       'Jenis Bimbingan', 'Masalah', 'Tindak Lanjut',
                       'Yang Menangani', 'TTD', 'Status']);

        $hariId = ['Sunday'=>'Minggu','Monday'=>'Senin','Tuesday'=>'Selasa',
                   'Wednesday'=>'Rabu','Thursday'=>'Kamis','Friday'=>'Jumat','Saturday'=>'Sabtu'];

        foreach ($list as $i => $row) {
            $tgl  = $row['tanggal'];
            $hari = $hariId[date('l', strtotime($tgl))] ?? date('l', strtotime($tgl));
            fputcsv($out, [
                $i + 1,
                $hari . ', ' . date('d/m/Y', strtotime($tgl)),
                $row['nama_siswa']    ?? '-',
                $row['nisn']          ?? '-',
                $row['kelas']         ?? '-',
                $row['jurusan']       ?? '-',
                $row['jenis_bimbingan'] ?? '-',
                $row['masalah'],
                $row['tindak_lanjut'],
                $row['yang_menangani'],
                $row['ttd']           ?? '-',
                ucfirst($row['status']),
            ]);
        }

        fclose($out);
        exit;
    }
}