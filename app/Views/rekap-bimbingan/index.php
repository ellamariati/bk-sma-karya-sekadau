<?php
$namaBulan = ['', 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni',
              'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
$judulPeriode = $bulan_aktif > 0
    ? $namaBulan[$bulan_aktif] . ' ' . $tahun_aktif
    : 'Tahun ' . $tahun_aktif;
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rekap Bimbingan — BK SMA Karya Sekadau</title>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800&family=DM+Sans:ital,wght@0,300;0,400;0,500;1,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        /* Custom Scrollbar */
        ::-webkit-scrollbar{width:6px;height:6px}
        ::-webkit-scrollbar-track{background:transparent}
        ::-webkit-scrollbar-thumb{background:var(--gray-200);border-radius:10px}
        ::-webkit-scrollbar-thumb:hover{background:var(--blue-300)}
        :root{--blue-900:#0a1628;--blue-800:#0d2045;--blue-700:#0f2d6b;--blue-600:#1340a0;--blue-500:#1a56db;--blue-400:#3b82f6;--blue-300:#93c5fd;--blue-100:#dbeafe;--blue-50:#eff6ff;--gray-50:#f8fafc;--gray-100:#f1f5f9;--gray-200:#e2e8f0;--gray-400:#94a3b8;--gray-600:#475569;--gray-800:#1e293b;--success:#10b981;--warning:#f59e0b;--danger:#ef4444;--purple:#8b5cf6;--teal:#0d9488;--sidebar-w:270px;--navbar-h:72px;--radius:16px;--radius-sm:10px;--shadow:0 4px 24px rgba(19,64,160,.10);--shadow-lg:0 12px 40px rgba(19,64,160,.18);--transition:all .3s cubic-bezier(.4,0,.2,1)}
        *,*::before,*::after{box-sizing:border-box;margin:0;padding:0}
        body{font-family:'DM Sans',sans-serif;background:var(--gray-50);color:var(--gray-800);min-height:100vh;display:flex;overflow-x:hidden}
        .sidebar{width:var(--sidebar-w);min-height:100vh;background:linear-gradient(175deg,var(--blue-900) 0%,var(--blue-800) 50%,var(--blue-700) 100%);position:fixed;left:0;top:0;bottom:0;z-index:100;display:flex;flex-direction:column;box-shadow:4px 0 32px rgba(10,22,40,.25);transition:var(--transition);overflow-y:auto;overflow-x:hidden;}
        .sidebar-brand{padding:28px 24px 22px;display:flex;align-items:center;gap:14px;border-bottom:1px solid rgba(255,255,255,.08);flex-shrink:0}
        .brand-icon{width:46px;height:46px;background:linear-gradient(135deg,var(--blue-500),var(--blue-400));border-radius:13px;display:flex;align-items:center;justify-content:center;font-size:20px;color:white;flex-shrink:0}
        .brand-text .brand-title{font-family:'Outfit',sans-serif;font-weight:700;font-size:17px;color:white;line-height:1.1}
        .brand-text .brand-sub{font-size:11px;color:var(--blue-300);margin-top:2px}
        .sidebar-section{padding:18px 14px 6px}
        .sidebar-section-label{font-size:10px;font-weight:600;text-transform:uppercase;letter-spacing:1.5px;color:rgba(147,197,253,.5);padding:0 10px;margin-bottom:6px}
        .nav-item{display:flex;align-items:center;gap:12px;padding:11px 14px;border-radius:var(--radius-sm);color:rgba(255,255,255,.65);text-decoration:none;font-size:14px;transition:var(--transition);position:relative;margin-bottom:2px}
        .nav-item:hover{background:rgba(255,255,255,.08);color:white}
        .nav-item.active{background:linear-gradient(90deg,rgba(26,86,219,.6),rgba(26,86,219,.2));color:white;font-weight:500;box-shadow:inset 0 0 0 1px rgba(59,130,246,.3)}
        .nav-item.active::before{content:'';position:absolute;left:0;top:20%;bottom:20%;width:3px;background:var(--blue-400);border-radius:0 4px 4px 0}
        .nav-item i{width:20px;font-size:15px;text-align:center;flex-shrink:0}
        .sidebar-footer{margin-top:auto;padding:16px 14px;border-top:1px solid rgba(255,255,255,.08);flex-shrink:0}
        .user-card{display:flex;align-items:center;gap:12px;padding:10px 12px;border-radius:var(--radius-sm);background:rgba(255,255,255,.07)}
        .user-avatar{width:38px;height:38px;border-radius:50%;background:linear-gradient(135deg,var(--blue-500),#60a5fa);display:flex;align-items:center;justify-content:center;font-weight:700;font-size:15px;color:white;flex-shrink:0}
        .user-info .user-name{font-size:13px;font-weight:500;color:white}
        .user-info .user-role{font-size:11px;color:var(--blue-300);margin-top:1px}
        .logout-icon{margin-left:auto;color:rgba(255,255,255,.4);font-size:13px}
        .main-wrapper{margin-left:var(--sidebar-w);flex:1;display:flex;flex-direction:column;min-height:100vh}
        .navbar{height:var(--navbar-h);background:white;border-bottom:1px solid var(--gray-200);display:flex;align-items:center;padding:0 32px;position:sticky;top:0;z-index:50;gap:16px;box-shadow:0 2px 16px rgba(19,64,160,.06)}
        .navbar-hamburger{display:none;background:none;border:none;font-size:20px;color:var(--blue-600);cursor:pointer;padding:8px;border-radius:8px}
        .navbar-search{flex:1;max-width:400px;position:relative}
        .navbar-search input{width:100%;padding:9px 16px 9px 40px;border-radius:50px;border:1.5px solid var(--gray-200);background:var(--gray-50);font-family:'DM Sans',sans-serif;font-size:13.5px;outline:none;transition:var(--transition)}
        .navbar-search input:focus{border-color:var(--blue-400);background:white}
        .navbar-search i{position:absolute;left:14px;top:50%;transform:translateY(-50%);color:var(--gray-400);font-size:13px}
        .navbar-actions{display:flex;align-items:center;gap:8px;margin-left:auto}
        .nav-action-btn{width:40px;height:40px;border-radius:50%;border:none;background:var(--gray-100);color:var(--gray-600);cursor:pointer;display:flex;align-items:center;justify-content:center;font-size:16px;position:relative;transition:var(--transition)}
        .nav-action-btn:hover{background:var(--blue-100);color:var(--blue-600)}
        .notif-dot{position:absolute;top:8px;right:8px;width:9px;height:9px;background:var(--danger);border-radius:50%;border:2px solid white}
        .navbar-date{font-size:13px;color:var(--gray-600);padding:0 16px;border-left:1px solid var(--gray-200);display:flex;flex-direction:column;align-items:flex-end}
        .navbar-date .date-main{font-weight:500;color:var(--gray-800);font-size:13.5px}
        .navbar-date .date-sub{font-size:11px;color:var(--gray-400)}
        .page-content{padding:28px 32px;flex:1}
        .overlay{display:none;position:fixed;inset:0;background:rgba(10,22,40,.4);z-index:90}.overlay.show{display:block}
        .alert{padding:12px 18px;border-radius:var(--radius-sm);margin-bottom:20px;display:flex;align-items:center;gap:10px;font-size:13.5px;font-weight:500}
        .alert-success{background:#d1fae5;color:#065f46;border:1px solid #6ee7b7}
        .alert-error{background:#fee2e2;color:#991b1b;border:1px solid #fca5a5}
        .alert-close{margin-left:auto;cursor:pointer;opacity:.6}
        /* Card & table styles */
        .card{background:white;border-radius:var(--radius);box-shadow:var(--shadow)}
        .progress{background:var(--gray-100);border-radius:10px;overflow:hidden}
        .progress-bar{height:100%;border-radius:10px;transition:width .4s}
        /* Bootstrap-like utilities */
        .d-flex{display:flex}.align-items-center{align-items:center}.justify-content-between{justify-content:space-between}
        .mb-0{margin-bottom:0}.mb-1{margin-bottom:4px}.mb-2{margin-bottom:8px}.mb-4{margin-bottom:24px}
        .fw-bold{font-weight:700}.fw-semibold{font-weight:600}.text-muted{color:var(--gray-400)}.text-dark{color:var(--gray-800)}
        .text-primary{color:var(--blue-500)}.text-success{color:var(--success)}.text-warning{color:var(--warning)}
        .fs-3{font-size:1.75rem}
        .btn{display:inline-flex;align-items:center;gap:6px;padding:8px 16px;border-radius:var(--radius-sm);border:none;font-family:'DM Sans',sans-serif;font-size:13px;font-weight:500;cursor:pointer;text-decoration:none;transition:var(--transition)}
        .btn-success{background:var(--success);color:white}.btn-success:hover{background:#059669}
        .btn-primary{background:var(--blue-500);color:white}.btn-primary:hover{background:var(--blue-600)}
        .btn-outline-secondary{background:white;color:var(--gray-600);border:1.5px solid var(--gray-200)}.btn-outline-secondary:hover{border-color:var(--blue-400);color:var(--blue-600)}
        .btn-sm{padding:6px 12px;font-size:12px}
        .form-select,.form-label{font-family:'DM Sans',sans-serif}
        .form-select{padding:8px 12px;border-radius:var(--radius-sm);border:1.5px solid var(--gray-200);background:white;font-size:13px;outline:none;transition:var(--transition)}
        .form-select:focus{border-color:var(--blue-400)}
        .form-label{font-size:12px;font-weight:600;color:var(--gray-600);display:block;margin-bottom:4px}
        .row{display:flex;flex-wrap:wrap;margin:0 -8px}
        .g-2>.col-auto,.g-2>[class*=col-],.g-3>[class*=col-]{padding:8px}
        .g-3{margin:-8px}
        .col-auto{flex:0 0 auto}
        .col-6{flex:0 0 50%;max-width:50%}
        .col-md-3{flex:0 0 25%;max-width:25%}
        .col-md-4{flex:0 0 33.333%;max-width:33.333%}
        .col-md-6{flex:0 0 50%;max-width:50%}
        .col-md-8{flex:0 0 66.666%;max-width:66.666%}
        .card-body{padding:20px}
        .card-header{padding:16px 20px 0;background:white;border:none}
        .border-0{border:0!important}
        .shadow-sm{box-shadow:var(--shadow)!important}
        .h-100{height:100%}
        .p-0{padding:0!important}
        .pt-3{padding-top:16px!important}
        .pb-0{padding-bottom:0!important}
        .ps-3{padding-left:16px!important}
        .px-4{padding-left:24px!important;padding-right:24px!important}
        .py-3{padding-top:16px!important;padding-bottom:16px!important}
        .me-1{margin-right:4px}.ms-1{margin-left:4px}
        .table-responsive{overflow-x:auto}
        table{width:100%;border-collapse:collapse;font-size:13px}
        thead th{padding:11px 14px;text-align:left;font-size:11px;font-weight:700;text-transform:uppercase;letter-spacing:.6px;color:var(--gray-400);background:var(--gray-50);border-bottom:2px solid var(--gray-200);white-space:nowrap}
        tbody td{padding:13px 14px;border-bottom:1px solid var(--gray-100);color:var(--gray-800);vertical-align:middle}
        tbody tr:last-child td{border-bottom:none}
        tbody tr:hover{background:var(--blue-50)}
        .table-light{background:var(--gray-50)!important}
        .table-light td{background:var(--gray-50)!important}
        .badge{display:inline-flex;align-items:center;padding:3px 9px;border-radius:20px;font-size:11px;font-weight:600}
        .bg-warning{background:#f59e0b!important;color:white!important}
        .bg-secondary{background:var(--gray-400)!important;color:white!important}
        .bg-danger{background:var(--danger)!important;color:white!important}
        .bg-light{background:var(--gray-100)!important}
        .bg-success-subtle{background:#d1fae5!important}
        .bg-warning-subtle{background:#fef3c7!important}
        .text-dark{color:var(--gray-800)!important}
        .text-success{color:#065f46!important}
        .text-warning{color:#92400e!important}
        .rounded-pill{border-radius:50px!important}
        @media(max-width:768px){:root{--sidebar-w:0px}.sidebar{transform:translateX(-270px);width:270px}.sidebar.open{transform:translateX(0)}.main-wrapper{margin-left:0}.navbar-hamburger{display:flex}.page-content{padding:20px 18px}.col-md-3,.col-md-4,.col-md-6,.col-md-8{flex:0 0 100%;max-width:100%}}
        @media(max-width:576px){.col-6{flex:0 0 100%;max-width:100%}}
    </style>
</head>
<body>
<div class="overlay" id="overlay" onclick="closeSidebar()"></div>

<!-- ════ SIDEBAR ════ -->
<aside class="sidebar" id="sidebar">
    <div class="sidebar-brand">
        <div class="brand-icon" style="background:white;padding:3px;border-radius:13px;overflow:hidden;">
            <img src="<?= base_url('img/logo_sma.png') ?>" alt="Logo SMA Karya Sekadau" 
                style="width:40px;height:40px;object-fit:contain;display:block;">
        </div>
        <div class="brand-text">
            <div class="brand-title">BK SMA Karya Sekadau</div>
            <div class="brand-sub">Bimbingan &amp; Konseling</div>
        </div>
    </div>
    <div class="sidebar-section">
        <div class="sidebar-section-label">Menu Utama</div>
        <a class="nav-item <?= (uri_string()==''||uri_string()=='dashboard')?'active':'' ?>" href="<?= base_url('/') ?>"><i class="fa fa-gauge-high"></i> Dashboard</a>
        <a class="nav-item <?= str_starts_with(uri_string(),'pelanggaran')?'active':'' ?>" href="<?= base_url('pelanggaran') ?>"><i class="fa fa-triangle-exclamation"></i> Data Pelanggaran</a>
        <a class="nav-item <?= str_starts_with(uri_string(),'siswa')?'active':'' ?>" href="<?= base_url('siswa') ?>"><i class="fa fa-users"></i> Data Siswa</a>
        <a class="nav-item <?= str_starts_with(uri_string(),'tindak-lanjut')?'active':'' ?>" href="<?= base_url('tindak-lanjut') ?>"><i class="fa fa-list-check"></i> Tindak Lanjut</a>
        <a class="nav-item <?= str_starts_with(uri_string(),'buku-kunjungan')?'active':'' ?>" href="<?= base_url('buku-kunjungan') ?>"><i class="fa fa-book-open"></i> Buku Kunjungan</a>
    </div>
    <div class="sidebar-section">
        <div class="sidebar-section-label">Konseling</div>
        <a class="nav-item <?= str_starts_with(uri_string(),'jadwal')?'active':'' ?>" href="<?= base_url('jadwal') ?>"><i class="fa fa-calendar-check"></i> Jadwal Konseling</a>
        <a class="nav-item <?= str_starts_with(uri_string(),'sesi-bimbingan')?'active':'' ?>" href="<?= base_url('sesi-bimbingan') ?>"><i class="fa fa-comments"></i> Sesi Bimbingan</a>
        <a class="nav-item <?= str_starts_with(uri_string(),'rekap-bimbingan')?'active':'' ?>" href="<?= base_url('rekap-bimbingan') ?>"><i class="fa fa-chart-bar"></i> Rekap Bimbingan</a>
    </div>
    <div class="sidebar-section">
        <div class="sidebar-section-label">Pengelolaan</div>
        <a class="nav-item <?= str_starts_with(uri_string(),'laporan')?'active':'' ?>" href="<?= base_url('laporan') ?>"><i class="fa fa-file-lines"></i> Laporan &amp; Rekap</a>
        <a class="nav-item <?= str_starts_with(uri_string(),'kategori-pelanggaran')?'active':'' ?>" href="<?= base_url('kategori-pelanggaran') ?>"><i class="fa fa-scale-balanced"></i> Kategori Pelanggaran</a>
        <a class="nav-item <?= str_starts_with(uri_string(),'surat-dokumen')?'active':'' ?>" href="<?= base_url('surat-dokumen') ?>"><i class="fa fa-file-signature"></i> Surat &amp; Dokumen</a>
        <a class="nav-item <?= str_starts_with(uri_string(),'notifikasi')?'active':'' ?>" href="<?= base_url('notifikasi') ?>"><i class="fa fa-bell"></i> Notifikasi</a>
    </div>
    <div class="sidebar-section">
        <div class="sidebar-section-label">Sistem</div>
        <a class="nav-item <?= str_starts_with(uri_string(),'guru-bk')?'active':'' ?>" href="<?= base_url('guru-bk') ?>"><i class="fa fa-chalkboard-user"></i> Data Guru BK</a>
        <a class="nav-item <?= str_starts_with(uri_string(),'manajemen-user')?'active':'' ?>" href="<?= base_url('manajemen-user') ?>"><i class="fa fa-users-gear"></i> Manajemen User</a>
        <a class="nav-item <?= str_starts_with(uri_string(),'pengaturan')?'active':'' ?>" href="<?= base_url('pengaturan') ?>"><i class="fa fa-gear"></i> Pengaturan</a>
    </div>
    <div class="sidebar-footer">
        <div class="user-card">
            <div class="user-avatar">BK</div>
            <div class="user-info">
                <div class="user-name">Ibu Rina Marlina, S.Pd</div>
                <div class="user-role">Guru BK – Administrator</div>
            </div>
            <i class="fa fa-right-from-bracket logout-icon"></i>
        </div>
    </div>
</aside>

<!-- ════ MAIN ════ -->
<div class="main-wrapper">
    <nav class="navbar">
        <button class="navbar-hamburger" onclick="toggleSidebar()"><i class="fa fa-bars"></i></button>
        <div class="navbar-search"><i class="fa fa-magnifying-glass"></i><input type="text" placeholder="Cari data rekap..."></div>
        <div class="navbar-actions">
            <button class="nav-action-btn"><i class="fa fa-bell"></i><span class="notif-dot"></span></button>
            <button class="nav-action-btn"><i class="fa fa-envelope"></i></button>
            <button class="nav-action-btn" onclick="toggleFS()"><i class="fa fa-expand" id="fsIcon"></i></button>
        </div>
        <div class="navbar-date">
            <span class="date-main" id="dateLive">—</span>
            <span class="date-sub" id="timeLive">—</span>
        </div>
    </nav>

    <div class="page-content">

        <?php if (session()->getFlashdata('success')): ?>
            <div class="alert alert-success"><i class="fa fa-circle-check"></i><?= session()->getFlashdata('success') ?><span class="alert-close" onclick="this.parentElement.remove()">✕</span></div>
        <?php endif; ?>
        <?php if (session()->getFlashdata('error')): ?>
            <div class="alert alert-error"><i class="fa fa-circle-xmark"></i><?= session()->getFlashdata('error') ?><span class="alert-close" onclick="this.parentElement.remove()">✕</span></div>
        <?php endif; ?>

        <!-- Header -->
        <div class="d-flex align-items-center justify-content-between mb-4">
            <div>
                <h4 class="fw-bold mb-0 text-dark" style="font-family:'Outfit',sans-serif;font-size:26px;letter-spacing:-.5px">Rekap Bimbingan</h4>
                <small class="text-muted">Periode: <?= $judulPeriode ?></small>
            </div>
            <a href="<?= base_url('rekap-bimbingan/export-csv?bulan=' . $bulan_aktif . '&tahun=' . $tahun_aktif) ?>"
               class="btn btn-success btn-sm">
                <i class="fas fa-file-csv me-1"></i> Export CSV
            </a>
        </div>

        <!-- Filter -->
        <div class="card border-0 shadow-sm mb-4">
            <div class="card-body">
                <form method="get" action="<?= base_url('rekap-bimbingan') ?>" style="display:flex;flex-wrap:wrap;gap:12px;align-items:flex-end;">
                    <div>
                        <label class="form-label">Bulan</label>
                        <select name="bulan" class="form-select" style="min-width:140px">
                            <option value="0">Semua Bulan</option>
                            <?php for ($i = 1; $i <= 12; $i++): ?>
                                <option value="<?= $i ?>" <?= $bulan_aktif == $i ? 'selected' : '' ?>>
                                    <?= $namaBulan[$i] ?>
                                </option>
                            <?php endfor; ?>
                        </select>
                    </div>
                    <div>
                        <label class="form-label">Tahun</label>
                        <select name="tahun" class="form-select" style="min-width:100px">
                            <?php foreach ($tahun_list as $t): ?>
                                <option value="<?= $t ?>" <?= $tahun_aktif == $t ? 'selected' : '' ?>>
                                    <?= $t ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div style="display:flex;gap:8px;">
                        <button type="submit" class="btn btn-primary btn-sm">
                            <i class="fas fa-filter"></i> Filter
                        </button>
                        <a href="<?= base_url('rekap-bimbingan') ?>" class="btn btn-outline-secondary btn-sm">Reset</a>
                    </div>
                </form>
            </div>
        </div>

        <!-- Summary Cards -->
        <div class="row g-3 mb-4">
            <div class="col-6 col-md-3">
                <div class="card border-0 shadow-sm h-100" style="border-left:4px solid #4361ee!important;">
                    <div class="card-body">
                        <div class="text-muted" style="font-size:12px;margin-bottom:4px">Total Kunjungan</div>
                        <div class="fs-3 fw-bold text-primary"><?= $summary['total_kunjungan'] ?></div>
                        <div class="text-muted" style="font-size:11px;">Buku kunjungan BK</div>
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-3">
                <div class="card border-0 shadow-sm h-100" style="border-left:4px solid #3a86ff!important;">
                    <div class="card-body">
                        <div class="text-muted" style="font-size:12px;margin-bottom:4px">Total Sesi</div>
                        <div class="fs-3 fw-bold" style="color:#3a86ff;"><?= $summary['total_sesi'] ?></div>
                        <div class="text-muted" style="font-size:11px;">Sesi bimbingan</div>
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-3">
                <div class="card border-0 shadow-sm h-100" style="border-left:4px solid #f77f00!important;">
                    <div class="card-body">
                        <div class="text-muted" style="font-size:12px;margin-bottom:4px">Tindak Lanjut</div>
                        <div class="fs-3 fw-bold" style="color:#f77f00;"><?= $summary['total_tindak'] ?></div>
                        <div class="text-muted" style="font-size:11px;">Kasus ditindaklanjuti</div>
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-3">
                <div class="card border-0 shadow-sm h-100" style="border-left:4px solid #2dc653!important;">
                    <div class="card-body">
                        <div class="text-muted" style="font-size:12px;margin-bottom:4px">Total Siswa</div>
                        <div class="fs-3 fw-bold text-success"><?= $summary['total_siswa'] ?></div>
                        <div class="text-muted" style="font-size:11px;">Terdaftar di sistem</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Chart Kunjungan per Bulan -->
        <div class="row g-3 mb-4">
            <div class="col-md-8">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-header" style="padding:16px 20px 0;">
                        <h6 class="fw-bold mb-0">Kunjungan per Bulan (<?= $tahun_aktif ?>)</h6>
                    </div>
                    <div class="card-body">
                        <canvas id="chartKunjungan" height="100"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-header" style="padding:16px 20px 0;">
                        <h6 class="fw-bold mb-0">Jenis Bimbingan</h6>
                    </div>
                    <div class="card-body" style="display:flex;align-items:center;justify-content:center;">
                        <canvas id="chartJenis" height="200"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <!-- Chart Mandiri vs Panggilan -->
        <div class="row g-3 mb-4">
            <div class="col-md-6">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-header" style="padding:16px 20px 0;">
                        <h6 class="fw-bold mb-0">Mandiri vs Panggilan per Bulan</h6>
                    </div>
                    <div class="card-body">
                        <canvas id="chartMandiriPanggilan" height="120"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-header" style="padding:16px 20px 0;">
                        <h6 class="fw-bold mb-0">Sesi Bimbingan per Bulan</h6>
                    </div>
                    <div class="card-body">
                        <canvas id="chartSesi" height="120"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tabel Top Siswa -->
        <div class="card border-0 shadow-sm mb-4">
            <div class="card-header" style="padding:16px 20px 0;display:flex;justify-content:space-between;align-items:center;">
                <h6 class="fw-bold mb-0">Top 10 Siswa - Frekuensi Kunjungan</h6>
                <small class="text-muted">Periode: <?= $judulPeriode ?></small>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table>
                        <thead>
                            <tr>
                                <th style="padding-left:16px;width:40px">No</th>
                                <th>Nama Siswa</th>
                                <th>NISN</th>
                                <th>Kelas</th>
                                <th style="text-align:center">Total</th>
                                <th style="text-align:center">Selesai</th>
                                <th style="text-align:center">Proses</th>
                                <th>Progress</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (empty($rekap_siswa)): ?>
                                <tr>
                                    <td colspan="8" style="text-align:center;color:var(--gray-400);padding:48px 20px;">
                                        <i class="fas fa-inbox" style="font-size:32px;display:block;margin-bottom:8px;color:var(--gray-200)"></i>
                                        Belum ada data kunjungan
                                    </td>
                                </tr>
                            <?php else: ?>
                                <?php foreach ($rekap_siswa as $i => $row): ?>
                                    <?php
                                    $pct = $row['total'] > 0 ? round(($row['selesai'] / $row['total']) * 100) : 0;
                                    $badgeStyle = $i === 0
                                        ? 'background:#f59e0b;color:#1e293b'
                                        : ($i === 1 ? 'background:#94a3b8;color:white' : ($i === 2 ? 'background:#ef4444;color:white' : 'background:var(--gray-100);color:var(--gray-800)'));
                                    ?>
                                    <tr>
                                        <td style="padding-left:16px;">
                                            <span class="badge rounded-pill" style="<?= $badgeStyle ?>"><?= $i + 1 ?></span>
                                        </td>
                                        <td class="fw-semibold"><?= esc($row['nama'] ?? '-') ?></td>
                                        <td class="text-muted" style="font-size:12px"><?= esc($row['nisn'] ?? '-') ?></td>
                                        <td><?= esc($row['kelas'] ?? '-') ?></td>
                                        <td style="text-align:center;font-weight:700"><?= $row['total'] ?></td>
                                        <td style="text-align:center">
                                            <span class="badge bg-success-subtle text-success"><?= $row['selesai'] ?></span>
                                        </td>
                                        <td style="text-align:center">
                                            <span class="badge bg-warning-subtle text-warning"><?= $row['proses'] ?></span>
                                        </td>
                                        <td style="min-width:100px;">
                                            <div class="progress" style="height:6px;">
                                                <div class="progress-bar bg-success" style="width:<?= $pct ?>%;background:var(--success)"></div>
                                            </div>
                                            <small class="text-muted"><?= $pct ?>% selesai</small>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Tabel Rekap Bulanan -->
        <div class="card border-0 shadow-sm">
            <div class="card-header" style="padding:16px 20px 0;">
                <h6 class="fw-bold mb-0">Rekap Bulanan Kunjungan (<?= $tahun_aktif ?>)</h6>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table>
                        <thead>
                            <tr>
                                <th style="padding-left:16px">Bulan</th>
                                <th style="text-align:center">Total</th>
                                <th style="text-align:center">Mandiri</th>
                                <th style="text-align:center">Panggilan</th>
                                <th style="text-align:center">Selesai</th>
                                <th style="text-align:center">Proses</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $grandTotal = 0; ?>
                            <?php foreach ($rekap_bulan as $rb): ?>
                                <?php $grandTotal += $rb['total']; ?>
                                <tr style="<?= $rb['total'] == 0 ? 'color:var(--gray-400)' : '' ?>">
                                    <td style="padding-left:16px;font-weight:600"><?= $namaBulan[$rb['bulan']] ?></td>
                                    <td style="text-align:center;font-weight:700"><?= $rb['total'] ?: '-' ?></td>
                                    <td style="text-align:center"><?= $rb['mandiri'] ?: '-' ?></td>
                                    <td style="text-align:center"><?= $rb['panggilan'] ?: '-' ?></td>
                                    <td style="text-align:center">
                                        <?php if ($rb['selesai'] > 0): ?>
                                            <span class="badge bg-success-subtle text-success"><?= $rb['selesai'] ?></span>
                                        <?php else: ?> - <?php endif; ?>
                                    </td>
                                    <td style="text-align:center">
                                        <?php if ($rb['proses'] > 0): ?>
                                            <span class="badge bg-warning-subtle text-warning"><?= $rb['proses'] ?></span>
                                        <?php else: ?> - <?php endif; ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                            <tr style="background:var(--gray-50);font-weight:700;">
                                <td style="padding-left:16px;">TOTAL</td>
                                <td style="text-align:center"><?= $grandTotal ?></td>
                                <td style="text-align:center"><?= array_sum(array_column($rekap_bulan, 'mandiri')) ?></td>
                                <td style="text-align:center"><?= array_sum(array_column($rekap_bulan, 'panggilan')) ?></td>
                                <td style="text-align:center"><?= array_sum(array_column($rekap_bulan, 'selesai')) ?></td>
                                <td style="text-align:center"><?= array_sum(array_column($rekap_bulan, 'proses')) ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div><!-- end page-content -->
</div><!-- end main-wrapper -->

<!-- Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
const namaBulan = ['Jan','Feb','Mar','Apr','Mei','Jun','Jul','Ags','Sep','Okt','Nov','Des'];
const rekapBulan = <?= json_encode(array_values($rekap_bulan)) ?>;
const rekapJenis = <?= json_encode($rekap_jenis) ?>;
const rekapSesi  = <?= json_encode(array_values($rekap_sesi)) ?>;

// Chart Kunjungan per Bulan
new Chart(document.getElementById('chartKunjungan'), {
    type: 'bar',
    data: {
        labels: namaBulan,
        datasets: [{
            label: 'Total Kunjungan',
            data: rekapBulan.map(r => r.total),
            backgroundColor: 'rgba(67,97,238,0.8)',
            borderRadius: 6,
        }]
    },
    options: {
        responsive: true,
        plugins: { legend: { display: false } },
        scales: { y: { beginAtZero: true, ticks: { stepSize: 1 } } }
    }
});

// Chart Jenis Bimbingan (Doughnut)
new Chart(document.getElementById('chartJenis'), {
    type: 'doughnut',
    data: {
        labels: rekapJenis.map(r => r.jenis.charAt(0).toUpperCase() + r.jenis.slice(1)),
        datasets: [{
            data: rekapJenis.map(r => r.total),
            backgroundColor: ['#4361ee','#3a86ff','#f77f00','#2dc653'],
            borderWidth: 2,
        }]
    },
    options: {
        responsive: true,
        plugins: { legend: { position: 'bottom', labels: { boxWidth: 12 } } }
    }
});

// Chart Mandiri vs Panggilan
new Chart(document.getElementById('chartMandiriPanggilan'), {
    type: 'bar',
    data: {
        labels: namaBulan,
        datasets: [
            {
                label: 'Mandiri',
                data: rekapBulan.map(r => r.mandiri),
                backgroundColor: 'rgba(67,97,238,0.8)',
                borderRadius: 4,
            },
            {
                label: 'Panggilan',
                data: rekapBulan.map(r => r.panggilan),
                backgroundColor: 'rgba(247,127,0,0.8)',
                borderRadius: 4,
            }
        ]
    },
    options: {
        responsive: true,
        plugins: { legend: { position: 'top' } },
        scales: { x: { stacked: false }, y: { beginAtZero: true, ticks: { stepSize: 1 } } }
    }
});

// Chart Sesi Bimbingan
new Chart(document.getElementById('chartSesi'), {
    type: 'line',
    data: {
        labels: namaBulan,
        datasets: [{
            label: 'Sesi Bimbingan',
            data: rekapSesi.map(r => r.total),
            borderColor: '#3a86ff',
            backgroundColor: 'rgba(58,134,255,0.1)',
            fill: true,
            tension: 0.4,
            pointBackgroundColor: '#3a86ff',
        }]
    },
    options: {
        responsive: true,
        plugins: { legend: { display: false } },
        scales: { y: { beginAtZero: true, ticks: { stepSize: 1 } } }
    }
});

// Clock
function updateClock(){
    const d=new Date(),days=['Minggu','Senin','Selasa','Rabu','Kamis','Jumat','Sabtu'],months=['Jan','Feb','Mar','Apr','Mei','Jun','Jul','Ags','Sep','Okt','Nov','Des'];
    document.getElementById('dateLive').textContent=days[d.getDay()]+', '+d.getDate()+' '+months[d.getMonth()]+' '+d.getFullYear();
    document.getElementById('timeLive').textContent=String(d.getHours()).padStart(2,'0')+':'+String(d.getMinutes()).padStart(2,'0')+':'+String(d.getSeconds()).padStart(2,'0')+' WIB';
}
setInterval(updateClock,1000); updateClock();

function toggleSidebar(){document.getElementById('sidebar').classList.toggle('open');document.getElementById('overlay').classList.toggle('show')}
function closeSidebar(){document.getElementById('sidebar').classList.remove('open');document.getElementById('overlay').classList.remove('show')}
function toggleFS(){if(!document.fullscreenElement){document.documentElement.requestFullscreen();document.getElementById('fsIcon').className='fa fa-compress'}else{document.exitFullscreen();document.getElementById('fsIcon').className='fa fa-expand'}}
</script>
</body>
</html>