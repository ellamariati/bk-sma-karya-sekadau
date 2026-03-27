<?php

namespace App\Controllers;

use App\Models\SiswaModel;
use App\Models\PelanggaranModel;

class Siswa extends BaseController
{
    protected $siswaModel;
    protected $pelanggaranModel;

    public function __construct()
    {
        $this->siswaModel       = new SiswaModel();
        $this->pelanggaranModel = new PelanggaranModel();
    }

    // ════════════════════════════════════════════
    // INDEX — Daftar siswa
    // ════════════════════════════════════════════
    public function index()
    {
        $data['total_siswa']      = $this->siswaModel->countAll();
        $data['siswa_aktif']      = $this->siswaModel->countAll();
        $data['siswa_bermasalah'] = $this->siswaModel->getSiswaBermasalah();
        $data['siswa_kelas_x']    = $this->siswaModel
            ->like('kelas', 'X ', 'after')
            ->orLike('kelas', 'X\t', 'after')
            ->countAllResults();

        // Ambil semua siswa + total poin (untuk JS render)
        $data['list_siswa'] = $this->siswaModel->getAllWithPoin();

        // Stats untuk sidebar badge
        $data['stats'] = [
            'baru' => $this->pelanggaranModel
                ->where('status', 'baru')
                ->countAllResults(),
        ];

        return view('siswa/index', $data);
    }

    // ════════════════════════════════════════════
    // SIMPAN — Tambah siswa baru
    // ════════════════════════════════════════════
    public function simpan()
    {
        $rules = [
            'nisn'  => 'required|min_length[8]|max_length[20]|is_unique[siswa.nisn]',
            'nama'  => 'required|min_length[3]|max_length[100]',
            'kelas' => 'required',
            'jk'    => 'required|in_list[L,P]',
        ];

        $messages = [
            'nisn' => [
                'required'    => 'NISN wajib diisi.',
                'min_length'  => 'NISN minimal 8 digit.',
                'is_unique'   => 'NISN sudah terdaftar.',
            ],
            'nama'  => ['required' => 'Nama wajib diisi.', 'min_length' => 'Nama minimal 3 karakter.'],
            'kelas' => ['required' => 'Kelas wajib dipilih.'],
            'jk'    => ['required' => 'Jenis kelamin wajib dipilih.'],
        ];

        if (!$this->validate($rules, $messages)) {
            return redirect()->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        $kelas   = $this->request->getPost('kelas');
        $jurusan = SiswaModel::jurusanFromKelas($kelas);

        $this->siswaModel->insert([
            'nisn'       => $this->request->getPost('nisn'),
            'nama'       => $this->request->getPost('nama'),
            'kelas'      => $kelas,
            'jurusan'    => $jurusan,
            'jk'         => $this->request->getPost('jk'),
            'no_hp_ortu' => $this->request->getPost('no_hp_ortu'),
            'status'     => 'aktif',
        ]);

        return redirect()->to(base_url('siswa'))
            ->with('success', 'Data siswa berhasil ditambahkan.');
    }

    // ════════════════════════════════════════════
    // DETAIL — Riwayat pelanggaran siswa
    // ════════════════════════════════════════════
    public function detail(int $id)
    {
        $siswa = $this->siswaModel->find($id);
        if (!$siswa) {
            return redirect()->to(base_url('siswa'))->with('error', 'Data siswa tidak ditemukan.');
        }

        $pelanggaran = $this->pelanggaranModel
            ->where('siswa_id', $id)
            ->orderBy('created_at', 'DESC')
            ->findAll();

        $data['siswa']       = $siswa;
        $data['pelanggaran'] = $pelanggaran;
        $data['total_poin']  = array_sum(array_column($pelanggaran, 'poin'));
        $data['stats']       = ['baru' => 0];

        return view('siswa/detail', $data);
    }

    // ════════════════════════════════════════════
    // EDIT — Form edit (JSON untuk modal AJAX)
    // ════════════════════════════════════════════
    public function edit(int $id)
    {
        $siswa = $this->siswaModel->find($id);
        if (!$siswa) {
            return $this->response->setJSON(['success' => false, 'message' => 'Data tidak ditemukan.']);
        }
        return $this->response->setJSON(['success' => true, 'data' => $siswa]);
    }

    // ════════════════════════════════════════════
    // UPDATE — Simpan perubahan data siswa
    // ════════════════════════════════════════════
    public function update(int $id)
    {
        $siswa = $this->siswaModel->find($id);
        if (!$siswa) {
            return redirect()->to(base_url('siswa'))->with('error', 'Data siswa tidak ditemukan.');
        }

        $rules = [
            'nama'  => 'required|min_length[3]|max_length[100]',
            'kelas' => 'required',
            'jk'    => 'required|in_list[L,P]',
            'nisn'  => "required|min_length[8]|is_unique[siswa.nisn,id,{$id}]",
        ];

        $messages = [
            'nisn' => ['is_unique' => 'NISN sudah digunakan siswa lain.'],
            'nama' => ['required' => 'Nama wajib diisi.'],
        ];

        if (!$this->validate($rules, $messages)) {
            return redirect()->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        $kelas   = $this->request->getPost('kelas');
        $jurusan = SiswaModel::jurusanFromKelas($kelas);

        $this->siswaModel->update($id, [
            'nisn'       => $this->request->getPost('nisn'),
            'nama'       => $this->request->getPost('nama'),
            'kelas'      => $kelas,
            'jurusan'    => $jurusan,
            'jk'         => $this->request->getPost('jk'),
            'no_hp_ortu' => $this->request->getPost('no_hp_ortu'),
        ]);

        return redirect()->to(base_url('siswa'))
            ->with('success', 'Data siswa berhasil diperbarui.');
    }

    // ════════════════════════════════════════════
    // HAPUS — Delete siswa
    // ════════════════════════════════════════════
    public function hapus(int $id)
    {
        $siswa = $this->siswaModel->find($id);
        if (!$siswa) {
            return redirect()->to(base_url('siswa'))->with('error', 'Data siswa tidak ditemukan.');
        }
        $this->siswaModel->delete($id);
        return redirect()->to(base_url('siswa'))->with('success', 'Data siswa berhasil dihapus.');
    }

    // ════════════════════════════════════════════
    // SEARCH — AJAX autocomplete
    // ════════════════════════════════════════════
    public function search()
    {
        $q = $this->request->getGet('q');
        $result = $this->siswaModel
            ->like('nama', $q)
            ->orLike('nisn', $q)
            ->orLike('kelas', $q)
            ->limit(10)
            ->findAll();
        return $this->response->setJSON($result);
    }

    // ════════════════════════════════════════════
    // EXPORT — Download CSV
    // ════════════════════════════════════════════
    public function export()
    {
        $siswa = $this->siswaModel->getAllWithPoin();

        header('Content-Type: text/csv; charset=UTF-8');
        header('Content-Disposition: attachment; filename="data_siswa_' . date('Ymd_His') . '.csv"');
        header('Pragma: no-cache');

        $out = fopen('php://output', 'w');
        // BOM agar Excel tidak garble UTF-8
        fprintf($out, chr(0xEF) . chr(0xBB) . chr(0xBF));

        fputcsv($out, ['No', 'NISN', 'Nama', 'Kelas', 'Jurusan', 'JK', 'No HP Ortu', 'Total Poin']);

        foreach ($siswa as $i => $s) {
            fputcsv($out, [
                $i + 1,
                $s['nisn'],
                $s['nama'],
                $s['kelas'],
                $s['jurusan'],
                $s['jk'] === 'L' ? 'Laki-laki' : 'Perempuan',
                $s['no_hp_ortu'] ?? '-',
                $s['total_poin'],
            ]);
        }
        fclose($out);
        exit;
    }

    // ════════════════════════════════════════════
    // IMPORT — Upload & proses CSV
    // ════════════════════════════════════════════
    public function import()
    {
        $file = $this->request->getFile('file_csv');

        if (!$file || !$file->isValid()) {
            return redirect()->to(base_url('siswa'))->with('error', 'File tidak valid.');
        }

        if ($file->getClientExtension() !== 'csv') {
            return redirect()->to(base_url('siswa'))->with('error', 'Hanya file CSV yang diperbolehkan.');
        }

        $handle = fopen($file->getTempName(), 'r');
        // Skip header
        fgetcsv($handle);

        $berhasil = 0;
        $gagal    = 0;

        while (($row = fgetcsv($handle)) !== false) {
            // Format CSV: No, NISN, Nama, Kelas, Jurusan, JK, No HP Ortu
            if (count($row) < 6) { $gagal++; continue; }

            [, $nisn, $nama, $kelas, , $jk] = $row;
            $hp = $row[6] ?? null;

            $nisn = trim($nisn);
            $nama = trim($nama);

            if (!$nisn || !$nama || !$kelas) { $gagal++; continue; }

            // Skip jika NISN sudah ada
            if (!$this->siswaModel->isNisnUnique($nisn)) { $gagal++; continue; }

            $jkNorm = strtoupper(trim($jk));
            if (!in_array($jkNorm, ['L', 'P'])) {
                $jkNorm = str_contains(strtolower($jk), 'per') ? 'P' : 'L';
            }

            $this->siswaModel->insert([
                'nisn'       => $nisn,
                'nama'       => $nama,
                'kelas'      => trim($kelas),
                'jurusan'    => SiswaModel::jurusanFromKelas(trim($kelas)),
                'jk'         => $jkNorm,
                'no_hp_ortu' => $hp ? trim($hp) : null,
                'status'     => 'aktif',
            ]);
            $berhasil++;
        }
        fclose($handle);

        return redirect()->to(base_url('siswa'))
            ->with('success', "Import selesai: {$berhasil} data berhasil, {$gagal} data gagal/duplikat.");
    }
}