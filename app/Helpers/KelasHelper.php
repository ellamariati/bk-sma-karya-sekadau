<?php

/**
 * Helper: KelasHelper
 * Konversi kode kelas (X A, XI B, dst) ke nama lengkap (X A (MIA 1))
 * SMA Karya Sekadau
 *
 * Cara pakai di controller atau view:
 *   helper('kelas');
 *   echo format_kelas('X A');      // → X A (MIA 1)
 *   echo format_kelas('XI C');     // → XI C (IIS 1)
 *   echo nama_kelas('X A');        // → MIA 1
 */

if (!function_exists('nama_kelas')) {
    /**
     * Ambil nama panjang dari huruf kelas.
     * A→MIA 1, B→MIA 2, C→IIS 1, D→IIS 2, E→IIS 3, F→IIS 4
     */
    function nama_kelas(string $kelas): string
    {
        // Ambil huruf terakhir (A–F), case-insensitive
        if (!preg_match('/([A-Fa-f])\s*$/', trim($kelas), $m)) {
            return $kelas; // kembalikan apa adanya jika tidak cocok
        }

        $map = [
            'A' => 'MIA 1',
            'B' => 'MIA 2',
            'C' => 'IIS 1',
            'D' => 'IIS 2',
            'E' => 'IIS 3',
            'F' => 'IIS 4',
        ];

        return $map[strtoupper($m[1])] ?? $kelas;
    }
}

if (!function_exists('format_kelas')) {
    /**
     * Format lengkap: "X A (MIA 1)"
     */
    function format_kelas(?string $kelas): string
    {
        if (empty($kelas)) return '—';
        $kelas = trim($kelas);
        $nama  = nama_kelas($kelas);
        // Jika nama_kelas tidak berubah (tidak dikenali), tampilkan apa adanya
        return $nama === $kelas ? $kelas : $kelas . ' (' . $nama . ')';
    }
}

if (!function_exists('list_kelas')) {
    /**
     * Kembalikan semua kombinasi kelas (untuk dropdown form).
     * [['kode'=>'X A','nama'=>'MIA 1','label'=>'X A (MIA 1)'], ...]
     */
    function list_kelas(): array
    {
        $tingkat = ['X', 'XI', 'XII'];
        $huruf   = [
            'A' => 'MIA 1',
            'B' => 'MIA 2',
            'C' => 'IIS 1',
            'D' => 'IIS 2',
            'E' => 'IIS 3',
            'F' => 'IIS 4',
        ];

        $result = [];
        foreach ($tingkat as $t) {
            foreach ($huruf as $h => $nama) {
                $kode     = $t . ' ' . $h;
                $result[] = [
                    'kode'  => $kode,
                    'nama'  => $nama,
                    'label' => $kode . ' (' . $nama . ')',
                ];
            }
        }
        return $result;
    }
}