<?php
$namaBulan = [
    '', 'Januari','Februari','Maret','April','Mei','Juni',
    'Juli','Agustus','September','Oktober','November','Desember'
];
$judulPeriode = $bulan_aktif > 0
    ? $namaBulan[$bulan_aktif] . ' ' . $tahun_aktif
    : 'Tahun ' . $tahun_aktif;
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan & Rekap — BK SMA Karya Sekadau</title>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800&family=DM+Sans:ital,wght@0,300;0,400;0,500;1,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        /* ── Scrollbar ─────────────────────────────────── */
        ::-webkit-scrollbar{width:6px;height:6px}
        ::-webkit-scrollbar-track{background:transparent}
        ::-webkit-scrollbar-thumb{background:var(--gray-200);border-radius:10px}
        ::-webkit-scrollbar-thumb:hover{background:var(--blue-300)}

        /* ── CSS Variables ─────────────────────────────── */
        :root{
            --blue-900:#0a1628;--blue-800:#0d2045;--blue-700:#0f2d6b;
            --blue-600:#1340a0;--blue-500:#1a56db;--blue-400:#3b82f6;
            --blue-300:#93c5fd;--blue-100:#dbeafe;--blue-50:#eff6ff;
            --gray-50:#f8fafc;--gray-100:#f1f5f9;--gray-200:#e2e8f0;
            --gray-400:#94a3b8;--gray-600:#475569;--gray-800:#1e293b;
            --success:#10b981;--warning:#f59e0b;--danger:#ef4444;
            --purple:#8b5cf6;--teal:#0d9488;--orange:#f77f00;
            --sidebar-w:270px;--navbar-h:72px;
            --radius:16px;--radius-sm:10px;
            --shadow:0 4px 24px rgba(19,64,160,.10);
            --shadow-lg:0 12px 40px rgba(19,64,160,.18);
            --transition:all .3s cubic-bezier(.4,0,.2,1)
        }

        *,*::before,*::after{box-sizing:border-box;margin:0;padding:0}
        body{font-family:'DM Sans',sans-serif;background:var(--gray-50);color:var(--gray-800);min-height:100vh;display:flex;overflow-x:hidden}

        /* ── Sidebar ─────────────────────────────────────── */
        .sidebar{width:var(--sidebar-w);min-height:100vh;background:linear-gradient(175deg,var(--blue-900) 0%,var(--blue-800) 50%,var(--blue-700) 100%);position:fixed;left:0;top:0;bottom:0;z-index:100;display:flex;flex-direction:column;box-shadow:4px 0 32px rgba(10,22,40,.25);transition:var(--transition);overflow-y:auto;overflow-x:hidden}
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

        /* ── Main wrapper ────────────────────────────────── */
        .main-wrapper{margin-left:var(--sidebar-w);flex:1;display:flex;flex-direction:column;min-height:100vh}

        /* ── Navbar ──────────────────────────────────────── */
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

        /* ── Page ────────────────────────────────────────── */
        .page-content{padding:28px 32px;flex:1}
        .overlay{display:none;position:fixed;inset:0;background:rgba(10,22,40,.4);z-index:90}
        .overlay.show{display:block}

        /* ── Alert ───────────────────────────────────────── */
        .alert{padding:12px 18px;border-radius:var(--radius-sm);margin-bottom:20px;display:flex;align-items:center;gap:10px;font-size:13.5px;font-weight:500}
        .alert-success{background:#d1fae5;color:#065f46;border:1px solid #6ee7b7}
        .alert-error{background:#fee2e2;color:#991b1b;border:1px solid #fca5a5}
        .alert-close{margin-left:auto;cursor:pointer;opacity:.6}

        /* ── Cards ───────────────────────────────────────── */
        .card{background:white;border-radius:var(--radius);box-shadow:var(--shadow)}
        .card-body{padding:20px}
        .card-header{padding:16px 20px 0;background:white;border:none}

        /* ── Buttons ─────────────────────────────────────── */
        .btn{display:inline-flex;align-items:center;gap:6px;padding:8px 16px;border-radius:var(--radius-sm);border:none;font-family:'DM Sans',sans-serif;font-size:13px;font-weight:500;cursor:pointer;text-decoration:none;transition:var(--transition)}
        .btn-success{background:var(--success);color:white}.btn-success:hover{background:#059669}
        .btn-primary{background:var(--blue-500);color:white}.btn-primary:hover{background:var(--blue-600)}
        .btn-danger{background:var(--danger);color:white}.btn-danger:hover{background:#dc2626}
        .btn-outline-secondary{background:white;color:var(--gray-600);border:1.5px solid var(--gray-200)}.btn-outline-secondary:hover{border-color:var(--blue-400);color:var(--blue-600)}
        .btn-sm{padding:6px 12px;font-size:12px}

        /* ── Forms ───────────────────────────────────────── */
        .form-select,.form-label,.form-control{font-family:'DM Sans',sans-serif}
        .form-select,.form-control{padding:8px 12px;border-radius:var(--radius-sm);border:1.5px solid var(--gray-200);background:white;font-size:13px;outline:none;transition:var(--transition)}
        .form-select:focus,.form-control:focus{border-color:var(--blue-400)}
        .form-label{font-size:12px;font-weight:600;color:var(--gray-600);display:block;margin-bottom:4px}

        /* ── Grid helper ─────────────────────────────────── */
        .row{display:flex;flex-wrap:wrap;margin:0 -8px}
        .g-3{margin:-8px}
        .g-3>[class*=col-]{padding:8px}
        .col-6{flex:0 0 50%;max-width:50%}
        .col-md-3{flex:0 0 25%;max-width:25%}
        .col-md-4{flex:0 0 33.333%;max-width:33.333%}
        .col-md-6{flex:0 0 50%;max-width:50%}
        .col-md-8{flex:0 0 66.666%;max-width:66.666%}

        /* ── Utility ─────────────────────────────────────── */
        .d-flex{display:flex}.align-items-center{align-items:center}.justify-content-between{justify-content:space-between}
        .mb-0{margin-bottom:0}.mb-1{margin-bottom:4px}.mb-2{margin-bottom:8px}.mb-3{margin-bottom:12px}.mb-4{margin-bottom:24px}
        .fw-bold{font-weight:700}.fw-semibold{font-weight:600}
        .text-muted{color:var(--gray-400)}.text-dark{color:var(--gray-800)}
        .fs-3{font-size:1.75rem}
        .h-100{height:100%}
        .p-0{padding:0!important}
        .border-0{border:0!important}
        .shadow-sm{box-shadow:var(--shadow)!important}
        .me-1{margin-right:4px}.ms-1{margin-left:4px}.me-2{margin-right:8px}
        .gap-2{gap:8px}.gap-3{gap:12px}

        /* ── Table ───────────────────────────────────────── */
        .table-responsive{overflow-x:auto}
        table{width:100%;border-collapse:collapse;font-size:13px}
        thead th{padding:11px 14px;text-align:left;font-size:11px;font-weight:700;text-transform:uppercase;letter-spacing:.6px;color:var(--gray-400);background:var(--gray-50);border-bottom:2px solid var(--gray-200);white-space:nowrap}
        tbody td{padding:13px 14px;border-bottom:1px solid var(--gray-100);color:var(--gray-800);vertical-align:middle}
        tbody tr:last-child td{border-bottom:none}
        tbody tr:hover{background:var(--blue-50)}

        /* ── Badge ───────────────────────────────────────── */
        .badge{display:inline-flex;align-items:center;padding:3px 9px;border-radius:20px;font-size:11px;font-weight:600}
        .badge-success{background:#d1fae5;color:#065f46}
        .badge-warning{background:#fef3c7;color:#92400e}
        .badge-danger{background:#fee2e2;color:#991b1b}
        .badge-primary{background:#dbeafe;color:#1d4ed8}
        .badge-purple{background:#ede9fe;color:#5b21b6}
        .badge-gray{background:var(--gray-100);color:var(--gray-600)}
        .badge-orange{background:#ffedd5;color:#9a3412}

        /* ── Tabs ────────────────────────────────────────── */
        .tab-wrapper{border-bottom:2px solid var(--gray-200);margin-bottom:20px;display:flex;gap:4px}
        .tab-btn{display:inline-flex;align-items:center;gap:6px;padding:10px 18px;border:none;background:none;font-family:'DM Sans',sans-serif;font-size:13px;font-weight:600;color:var(--gray-400);cursor:pointer;border-bottom:2px solid transparent;margin-bottom:-2px;transition:var(--transition)}
        .tab-btn:hover{color:var(--blue-500)}
        .tab-btn.active{color:var(--blue-500);border-bottom-color:var(--blue-500)}
        .tab-btn .tab-count{background:var(--blue-500);color:white;font-size:10px;padding:1px 6px;border-radius:10px;font-weight:700}
        .tab-btn.active-danger .tab-count{background:var(--danger)}
        .tab-panel{display:none}
        .tab-panel.active{display:block}

        /* ── Progress bar ────────────────────────────────── */
        .progress{background:var(--gray-100);border-radius:10px;overflow:hidden;height:6px}
        .progress-bar{height:100%;border-radius:10px;transition:width .4s}

        /* ── Kategori bar ────────────────────────────────── */
        .dist-item{display:flex;align-items:center;gap:10px;padding:8px 0;border-bottom:1px solid var(--gray-100)}
        .dist-item:last-child{border-bottom:none}
        .dist-dot{width:10px;height:10px;border-radius:50%;flex-shrink:0}
        .dist-bar-wrap{flex:1;height:6px;background:var(--gray-100);border-radius:10px;overflow:hidden}
        .dist-bar{height:100%;border-radius:10px}

        /* ── Export card ─────────────────────────────────── */
        .export-grid{display:grid;grid-template-columns:repeat(3,1fr);gap:14px}
        .export-card{border:1.5px dashed var(--gray-200);border-radius:var(--radius);padding:24px 20px;text-align:center;cursor:default;transition:var(--transition);background:white}
        .export-card:hover{border-color:var(--blue-400);background:var(--blue-50)}
        .export-icon{width:52px;height:52px;border-radius:12px;display:flex;align-items:center;justify-content:center;font-size:22px;margin:0 auto 12px}
        .export-icon.pdf{background:#fee2e2;color:#dc2626}
        .export-icon.csv{background:#d1fae5;color:#059669}
        .export-icon.print{background:#dbeafe;color:#2563eb}
        .export-name{font-size:14px;font-weight:700;margin-bottom:4px}
        .export-desc{font-size:12px;color:var(--gray-400);margin-bottom:14px}

        /* ── Status kelas ────────────────────────────────── */
        .status-baik{background:#d1fae5;color:#065f46}
        .status-perhatian{background:#fef3c7;color:#92400e}
        .status-perlu_perhatian{background:#fee2e2;color:#991b1b}

        /* ── Pagination ──────────────────────────────────── */
        .pagination{display:flex;gap:4px;align-items:center;margin-top:16px}
        .page-btn{padding:6px 12px;border-radius:8px;border:1.5px solid var(--gray-200);background:white;font-size:13px;cursor:pointer;text-decoration:none;color:var(--gray-800);transition:var(--transition)}
        .page-btn:hover,.page-btn.active{background:var(--blue-500);color:white;border-color:var(--blue-500)}
        .page-btn.disabled{opacity:.4;pointer-events:none}

        /* ── Responsive ──────────────────────────────────── */
        @media(max-width:768px){
            :root{--sidebar-w:0px}
            .sidebar{transform:translateX(-270px);width:270px}
            .sidebar.open{transform:translateX(0)}
            .main-wrapper{margin-left:0}
            .navbar-hamburger{display:flex}
            .page-content{padding:20px 18px}
            .col-md-3,.col-md-4,.col-md-6,.col-md-8{flex:0 0 100%;max-width:100%}
            .export-grid{grid-template-columns:1fr}
            .tab-wrapper{overflow-x:auto}
        }
        @media(max-width:576px){.col-6{flex:0 0 100%;max-width:100%}}
    </style>
</head>
<body>
<div class="overlay" id="overlay" onclick="closeSidebar()"></div>

<!-- ════════════════════════════════════════
     SIDEBAR
═════════════════════════════════════════ -->
<aside class="sidebar" id="sidebar">
    <div class="sidebar-brand">
        <div class="brand-icon" style="background:white;padding:3px;border-radius:13px;overflow:hidden;">
            <img src="<?= base_url('img/logo_sma.png') ?>" alt="Logo"
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

<!-- ════════════════════════════════════════
     MAIN WRAPPER
═════════════════════════════════════════ -->
<div class="main-wrapper">

    <!-- NAVBAR -->
    <nav class="navbar">
        <button class="navbar-hamburger" onclick="toggleSidebar()"><i class="fa fa-bars"></i></button>
        <div class="navbar-search">
            <i class="fa fa-magnifying-glass"></i>
            <input type="text" placeholder="Cari laporan..." id="navSearch">
        </div>
        <div class="navbar-actions">
            <button class="nav-action-btn"><i class="fa fa-bell"></i><span class="notif-dot"></span></button>
            <button class="nav-action-btn"><i class="fa fa-envelope"></i></button>
            <button class="nav-action-btn" onclick="toggleFS()"><i class="fa fa-expand" id="fsIcon"></i></button>
        </div>
        <div class="navbar-date">
            <span class="date-main" id="dateLive">—</span>
            <span class="date-sub"  id="timeLive">—</span>
        </div>
    </nav>

    <!-- PAGE CONTENT -->
    <div class="page-content">

        <!-- Flash messages -->
        <?php if (session()->getFlashdata('success')): ?>
        <div class="alert alert-success">
            <i class="fa fa-circle-check"></i>
            <?= session()->getFlashdata('success') ?>
            <span class="alert-close" onclick="this.parentElement.remove()">✕</span>
        </div>
        <?php endif; ?>
        <?php if (session()->getFlashdata('error')): ?>
        <div class="alert alert-error">
            <i class="fa fa-circle-xmark"></i>
            <?= session()->getFlashdata('error') ?>
            <span class="alert-close" onclick="this.parentElement.remove()">✕</span>
        </div>
        <?php endif; ?>

        <!-- ── PAGE HEADER ─────────────────────────────── -->
        <div class="d-flex align-items-center justify-content-between mb-4">
            <div>
                <h4 class="fw-bold mb-0 text-dark" style="font-family:'Outfit',sans-serif;font-size:26px;letter-spacing:-.5px">
                    Laporan &amp; Rekap
                </h4>
                <small class="text-muted">Periode: <?= esc($judulPeriode) ?></small>
            </div>
            <div class="d-flex gap-2">
                <a href="<?= base_url('laporan/export-csv-rekap?' . http_build_query(['bulan'=>$bulan_aktif,'tahun'=>$tahun_aktif]) ) ?>"
                   class="btn btn-success btn-sm">
                    <i class="fa fa-file-csv"></i> Export CSV
                </a>
            </div>
        </div>

        <!-- ── FILTER BAR ──────────────────────────────── -->
        <div class="card border-0 shadow-sm mb-4">
            <div class="card-body">
                <form method="get" action="<?= base_url('laporan') ?>"
                      style="display:flex;flex-wrap:wrap;gap:12px;align-items:flex-end;">

                    <!-- Pertahankan tab aktif saat filter -->
                    <input type="hidden" name="tab" value="<?= esc($tab_aktif) ?>">

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

                    <div>
                        <label class="form-label">Kelas</label>
                        <select name="kelas" class="form-select">
                            <option value="">Semua Kelas</option>
                            <?php foreach ($kelas_list as $k): ?>
                                <option value="<?= esc($k) ?>" <?= $kelas_aktif == $k ? 'selected' : '' ?>>
                                    <?= esc($k) ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div>
                        <label class="form-label">Cari Siswa</label>
                        <input type="text" name="search" class="form-control"
                               placeholder="Nama / NISN..." style="min-width:160px"
                               value="<?= esc($search_aktif) ?>">
                    </div>

                    <div style="display:flex;gap:8px;">
                        <button type="submit" class="btn btn-primary btn-sm">
                            <i class="fa fa-filter"></i> Filter
                        </button>
                        <a href="<?= base_url('laporan') ?>" class="btn btn-outline-secondary btn-sm">Reset</a>
                    </div>
                </form>
            </div>
        </div>

        <!-- ── SUMMARY CARDS ───────────────────────────── -->
        <div class="row g-3 mb-4">
            <div class="col-6 col-md-3">
                <div class="card border-0 shadow-sm h-100" style="border-left:4px solid #4361ee!important;">
                    <div class="card-body">
                        <div class="text-muted" style="font-size:12px;margin-bottom:4px">Total Bimbingan</div>
                        <div class="fs-3 fw-bold" style="color:#4361ee"><?= $summary['total_bimbingan'] ?></div>
                        <div class="text-muted" style="font-size:11px;">Kunjungan BK</div>
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-3">
                <div class="card border-0 shadow-sm h-100" style="border-left:4px solid var(--danger)!important;">
                    <div class="card-body">
                        <div class="text-muted" style="font-size:12px;margin-bottom:4px">Total Pelanggaran</div>
                        <div class="fs-3 fw-bold" style="color:var(--danger)"><?= $summary['total_pelanggaran'] ?></div>
                        <div class="text-muted" style="font-size:11px;">Kasus tercatat</div>
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-3">
                <div class="card border-0 shadow-sm h-100" style="border-left:4px solid var(--orange)!important;">
                    <div class="card-body">
                        <div class="text-muted" style="font-size:12px;margin-bottom:4px">Tindak Lanjut</div>
                        <div class="fs-3 fw-bold" style="color:var(--orange)"><?= $summary['total_tindak'] ?></div>
                        <div class="text-muted" style="font-size:11px;">Kasus ditindaklanjuti</div>
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-3">
                <div class="card border-0 shadow-sm h-100" style="border-left:4px solid var(--success)!important;">
                    <div class="card-body">
                        <div class="text-muted" style="font-size:12px;margin-bottom:4px">Total Siswa</div>
                        <div class="fs-3 fw-bold" style="color:var(--success)"><?= $summary['total_siswa'] ?></div>
                        <div class="text-muted" style="font-size:11px;">Terdaftar di sistem</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- ══════════════════════════════════════════════
             TABS
        ══════════════════════════════════════════════ -->
        <div class="tab-wrapper">
            <button class="tab-btn <?= $tab_aktif=='ringkasan'?'active':'' ?>"
                    onclick="switchTab('ringkasan')">
                <i class="fa fa-chart-pie"></i> Ringkasan
            </button>
            <button class="tab-btn <?= $tab_aktif=='bimbingan'?'active':'' ?>"
                    onclick="switchTab('bimbingan')">
                <i class="fa fa-comments"></i> Laporan Bimbingan
                <span class="tab-count"><?= $total_bimbingan ?></span>
            </button>
            <button class="tab-btn <?= $tab_aktif=='pelanggaran'?'active':'' ?>"
                    onclick="switchTab('pelanggaran')">
                <i class="fa fa-triangle-exclamation"></i> Laporan Pelanggaran
                <span class="tab-count" style="background:var(--danger)"><?= $total_pel ?></span>
            </button>
            <button class="tab-btn <?= $tab_aktif=='ekspor'?'active':'' ?>"
                    onclick="switchTab('ekspor')">
                <i class="fa fa-download"></i> Ekspor Laporan
            </button>
        </div>

        <!-- ══════════════════════════════════════════════
             TAB: RINGKASAN
        ══════════════════════════════════════════════ -->
        <div id="panel-ringkasan" class="tab-panel <?= $tab_aktif=='ringkasan'?'active':'' ?>">

            <!-- Chart row -->
            <div class="row g-3 mb-4">
                <div class="col-md-8">
                    <div class="card border-0 shadow-sm h-100">
                        <div class="card-header">
                            <h6 class="fw-bold mb-0">Kunjungan vs Pelanggaran per Bulan (<?= $tahun_aktif ?>)</h6>
                        </div>
                        <div class="card-body">
                            <canvas id="chartKomparasi" height="110"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card border-0 shadow-sm h-100">
                        <div class="card-header">
                            <h6 class="fw-bold mb-0">Jenis Bimbingan</h6>
                        </div>
                        <div class="card-body">
                            <canvas id="chartJenis" height="180"></canvas>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Distribusi kategori pelanggaran -->
            <div class="row g-3 mb-4">
                <div class="col-md-4">
                    <div class="card border-0 shadow-sm h-100">
                        <div class="card-header">
                            <h6 class="fw-bold mb-0">Kategori Pelanggaran</h6>
                        </div>
                        <div class="card-body">
                            <?php
                            $katColors = ['#ef4444','#f59e0b','#3b82f6','#8b5cf6','#10b981','#f77f00','#0d9488'];
                            foreach ($dist_kategori as $ci => $dk):
                            ?>
                            <div class="dist-item">
                                <div class="dist-dot" style="background:<?= $katColors[$ci % count($katColors)] ?>"></div>
                                <div style="flex:1;min-width:0">
                                    <div style="font-size:12px;font-weight:600;white-space:nowrap;overflow:hidden;text-overflow:ellipsis">
                                        <?= esc($dk['kategori'] ?? 'Tanpa Kategori') ?>
                                    </div>
                                    <div class="dist-bar-wrap" style="margin-top:4px">
                                        <div class="dist-bar" style="width:<?= $dk['persen'] ?>%;background:<?= $katColors[$ci % count($katColors)] ?>"></div>
                                    </div>
                                </div>
                                <div style="font-size:11px;font-weight:700;color:<?= $katColors[$ci % count($katColors)] ?>;white-space:nowrap">
                                    <?= $dk['total'] ?> <span style="color:var(--gray-400);font-weight:400">(<?= $dk['persen'] ?>%)</span>
                                </div>
                            </div>
                            <?php endforeach; ?>
                            <?php if (empty($dist_kategori)): ?>
                                <div style="text-align:center;color:var(--gray-400);padding:24px 0;font-size:13px">Belum ada data</div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card border-0 shadow-sm h-100">
                        <div class="card-header">
                            <h6 class="fw-bold mb-0">Sesi Bimbingan per Bulan</h6>
                        </div>
                        <div class="card-body">
                            <canvas id="chartSesi" height="140"></canvas>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Tabel rekap per kelas -->
            <div class="card border-0 shadow-sm mb-0">
                <div class="card-header" style="display:flex;justify-content:space-between;align-items:center;">
                    <h6 class="fw-bold mb-0">Rekap per Kelas</h6>
                    <a href="<?= base_url('laporan/export-csv-rekap?' . http_build_query(['bulan'=>$bulan_aktif,'tahun'=>$tahun_aktif]) ) ?>"
                       class="btn btn-outline-secondary btn-sm">
                        <i class="fa fa-download me-1"></i> Unduh CSV
                    </a>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table>
                            <thead>
                                <tr>
                                    <th style="padding-left:16px">Kelas</th>
                                    <th style="text-align:center">Jumlah Siswa</th>
                                    <th style="text-align:center">Total Bimbingan</th>
                                    <th style="text-align:center">Pelanggaran</th>
                                    <th style="text-align:center">Tindak Lanjut</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (empty($rekap_kelas)): ?>
                                <tr>
                                    <td colspan="6" style="text-align:center;color:var(--gray-400);padding:40px 20px">
                                        <i class="fa fa-inbox" style="font-size:28px;display:block;margin-bottom:8px;opacity:.3"></i>
                                        Belum ada data kelas
                                    </td>
                                </tr>
                                <?php else: ?>
                                <?php foreach ($rekap_kelas as $rk): ?>
                                <tr>
                                    <td style="padding-left:16px;font-weight:600"><?= esc($rk['kelas']) ?></td>
                                    <td style="text-align:center"><?= $rk['jumlah_siswa'] ?></td>
                                    <td style="text-align:center">
                                        <span class="badge badge-primary"><?= $rk['total_bimbingan'] ?> sesi</span>
                                    </td>
                                    <td style="text-align:center">
                                        <?php if ($rk['total_pelanggaran'] > 0): ?>
                                            <span class="badge badge-danger"><?= $rk['total_pelanggaran'] ?> kasus</span>
                                        <?php else: ?>
                                            <span class="text-muted" style="font-size:12px">—</span>
                                        <?php endif; ?>
                                    </td>
                                    <td style="text-align:center">
                                        <?php if ($rk['total_tindak'] > 0): ?>
                                            <span class="badge badge-warning"><?= $rk['total_tindak'] ?></span>
                                        <?php else: ?>
                                            <span class="text-muted" style="font-size:12px">—</span>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <span class="badge status-<?= $rk['status'] ?>">
                                            <?= match($rk['status']) {
                                                'perlu_perhatian' => 'Perlu Perhatian',
                                                'perhatian'       => 'Perhatian',
                                                default           => 'Baik'
                                            } ?>
                                        </span>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div><!-- /panel-ringkasan -->


        <!-- ══════════════════════════════════════════════
             TAB: LAPORAN BIMBINGAN
        ══════════════════════════════════════════════ -->
        <div id="panel-bimbingan" class="tab-panel <?= $tab_aktif=='bimbingan'?'active':'' ?>">
            <div class="card border-0 shadow-sm">
                <div class="card-header" style="display:flex;justify-content:space-between;align-items:center;">
                    <h6 class="fw-bold mb-0">Riwayat Kunjungan Bimbingan</h6>
                    <a href="<?= base_url('laporan/export-csv-bimbingan?' . http_build_query([
                        'bulan'  => $bulan_aktif,
                        'tahun'  => $tahun_aktif,
                        'kelas'  => $kelas_aktif,
                        'search' => $search_aktif,
                    ])) ?>" class="btn btn-success btn-sm">
                        <i class="fa fa-file-csv me-1"></i> Export CSV
                    </a>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table>
                            <thead>
                                <tr>
                                    <th style="padding-left:16px;width:40px">No</th>
                                    <th>Tanggal</th>
                                    <th>Nama Siswa</th>
                                    <th>NISN</th>
                                    <th>Kelas</th>
                                    <th>Jenis Kunjungan</th>
                                    <th>Jenis Bimbingan</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (empty($daftar_bimbingan)): ?>
                                <tr>
                                    <td colspan="9" style="text-align:center;color:var(--gray-400);padding:48px 20px">
                                        <i class="fa fa-inbox" style="font-size:32px;display:block;margin-bottom:8px;opacity:.3"></i>
                                        Tidak ada data untuk filter yang dipilih
                                    </td>
                                </tr>
                                <?php else: ?>
                                <?php
                                $noB = ($page - 1) * 15 + 1;
                                foreach ($daftar_bimbingan as $row):
                                    $initials = strtoupper(substr($row['nama'] ?? 'S', 0, 1));
                                    $avatarColors = ['#4361ee','#10b981','#f59e0b','#8b5cf6','#ef4444','#0d9488'];
                                    $ac = $avatarColors[crc32($row['nama'] ?? '') % count($avatarColors)];
                                ?>
                                <tr>
                                    <td style="padding-left:16px;color:var(--gray-400);font-size:11px"><?= $noB++ ?></td>
                                    <td style="white-space:nowrap">
                                        <?= isset($row['tanggal']) ? date('d/m/Y', strtotime($row['tanggal'])) : '-' ?>
                                    </td>
                                    <td>
                                        <div style="display:flex;align-items:center;gap:8px">
                                            <div style="width:28px;height:28px;border-radius:50%;background:<?= $ac ?>;color:white;font-size:11px;font-weight:700;display:flex;align-items:center;justify-content:center;flex-shrink:0">
                                                <?= $initials ?>
                                            </div>
                                            <span class="fw-semibold"><?= esc($row['nama'] ?? '-') ?></span>
                                        </div>
                                    </td>
                                    <td style="font-size:12px;color:var(--gray-400)"><?= esc($row['nisn'] ?? '-') ?></td>
                                    <td><?= esc($row['kelas'] ?? '-') ?></td>
                                    <td>
                                        <?php $jk = strtolower($row['jenis_kunjungan'] ?? ''); ?>
                                        <span class="badge <?= $jk === 'mandiri' ? 'badge-primary' : 'badge-orange' ?>">
                                            <?= ucfirst($jk ?: '-') ?>
                                        </span>
                                    </td>
                                    <td style="font-size:12px"><?= ucfirst($row['jenis_bimbingan'] ?? '-') ?></td>
                                    <td>
                                        <?php $st = strtolower($row['status'] ?? ''); ?>
                                        <span class="badge <?= match($st) {
                                            'selesai' => 'badge-success',
                                            'proses'  => 'badge-warning',
                                            default   => 'badge-gray'
                                        } ?>">
                                            <?= ucfirst($st ?: 'Baru') ?>
                                        </span>
                                    </td>
                                    <td>
                                        <a href="<?= base_url('buku-kunjungan/detail/' . $row['id']) ?>"
                                           class="btn btn-outline-secondary btn-sm">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>

                    <!-- Pagination bimbingan -->
                    <?php if ($total_page_bimbingan > 1): ?>
                    <div style="padding:16px 20px;border-top:1px solid var(--gray-100);display:flex;align-items:center;justify-content:space-between">
                        <small class="text-muted">
                            Menampilkan <?= min(($page-1)*15+1, $total_bimbingan) ?>–<?= min($page*15, $total_bimbingan) ?>
                            dari <?= $total_bimbingan ?> data
                        </small>
                        <div class="pagination">
                            <?php
                            $baseQuery = http_build_query(['bulan'=>$bulan_aktif,'tahun'=>$tahun_aktif,'kelas'=>$kelas_aktif,'search'=>$search_aktif,'tab'=>'bimbingan']);
                            ?>
                            <a href="<?= base_url('laporan?' . $baseQuery . '&page=' . max(1, $page-1)) ?>"
                               class="page-btn <?= $page <= 1 ? 'disabled' : '' ?>">
                                <i class="fa fa-chevron-left"></i>
                            </a>
                            <?php for ($p = max(1,$page-2); $p <= min($total_page_bimbingan, $page+2); $p++): ?>
                            <a href="<?= base_url('laporan?' . $baseQuery . '&page=' . $p) ?>"
                               class="page-btn <?= $p == $page ? 'active' : '' ?>"><?= $p ?></a>
                            <?php endfor; ?>
                            <a href="<?= base_url('laporan?' . $baseQuery . '&page=' . min($total_page_bimbingan, $page+1)) ?>"
                               class="page-btn <?= $page >= $total_page_bimbingan ? 'disabled' : '' ?>">
                                <i class="fa fa-chevron-right"></i>
                            </a>
                        </div>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div><!-- /panel-bimbingan -->


        <!-- ══════════════════════════════════════════════
             TAB: LAPORAN PELANGGARAN
        ══════════════════════════════════════════════ -->
        <div id="panel-pelanggaran" class="tab-panel <?= $tab_aktif=='pelanggaran'?'active':'' ?>">
            <div class="card border-0 shadow-sm">
                <div class="card-header" style="display:flex;justify-content:space-between;align-items:center;">
                    <h6 class="fw-bold mb-0">Riwayat Kasus Pelanggaran</h6>
                    <a href="<?= base_url('laporan/export-csv-pelanggaran?' . http_build_query([
                        'bulan'  => $bulan_aktif,
                        'tahun'  => $tahun_aktif,
                        'kelas'  => $kelas_aktif,
                        'search' => $search_aktif,
                    ])) ?>" class="btn btn-success btn-sm">
                        <i class="fa fa-file-csv me-1"></i> Export CSV
                    </a>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table>
                            <thead>
                                <tr>
                                    <th style="padding-left:16px;width:40px">No</th>
                                    <th>Tanggal</th>
                                    <th>Nama Siswa</th>
                                    <th>NISN</th>
                                    <th>Kelas</th>
                                    <th>Kategori</th>
                                    <th>Deskripsi</th>
                                    <th style="text-align:center">Poin</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (empty($daftar_pelanggaran)): ?>
                                <tr>
                                    <td colspan="10" style="text-align:center;color:var(--gray-400);padding:48px 20px">
                                        <i class="fa fa-inbox" style="font-size:32px;display:block;margin-bottom:8px;opacity:.3"></i>
                                        Tidak ada data pelanggaran
                                    </td>
                                </tr>
                                <?php else: ?>
                                <?php
                                $noP = ($page - 1) * 15 + 1;
                                foreach ($daftar_pelanggaran as $row):
                                    $initials = strtoupper(substr($row['nama'] ?? 'S', 0, 1));
                                    $avatarColors = ['#4361ee','#10b981','#f59e0b','#8b5cf6','#ef4444','#0d9488'];
                                    $ac = $avatarColors[crc32($row['nama'] ?? '') % count($avatarColors)];
                                ?>
                                <tr>
                                    <td style="padding-left:16px;color:var(--gray-400);font-size:11px"><?= $noP++ ?></td>
                                    <td style="white-space:nowrap">
                                        <?= isset($row['tanggal_kejadian']) ? date('d/m/Y', strtotime($row['tanggal_kejadian'])) : '-' ?>
                                    </td>
                                    <td>
                                        <div style="display:flex;align-items:center;gap:8px">
                                            <div style="width:28px;height:28px;border-radius:50%;background:<?= $ac ?>;color:white;font-size:11px;font-weight:700;display:flex;align-items:center;justify-content:center;flex-shrink:0">
                                                <?= $initials ?>
                                            </div>
                                            <span class="fw-semibold"><?= esc($row['nama'] ?? '-') ?></span>
                                        </div>
                                    </td>
                                    <td style="font-size:12px;color:var(--gray-400)"><?= esc($row['nisn'] ?? '-') ?></td>
                                    <td><?= esc($row['kelas'] ?? '-') ?></td>
                                    <td>
                                        <?php $poin = (int)($row['bobot_poin'] ?? 0); ?>
                                        <span class="badge <?= $poin >= 20 ? 'badge-danger' : ($poin >= 10 ? 'badge-warning' : 'badge-gray') ?>">
                                            <?= esc($row['kategori'] ?? '-') ?>
                                        </span>
                                    </td>
                                    <td style="max-width:200px;overflow:hidden;text-overflow:ellipsis;white-space:nowrap;font-size:12px">
                                        <?= esc($row['deskripsi'] ?? '-') ?>
                                    </td>
                                    <td style="text-align:center;font-weight:700;color:<?= $poin > 0 ? 'var(--danger)' : 'var(--gray-400)' ?>">
                                        <?= $poin > 0 ? '-' . $poin : '—' ?>
                                    </td>
                                    <td>
                                        <?php $st = strtolower($row['status'] ?? ''); ?>
                                        <span class="badge <?= match($st) {
                                            'selesai' => 'badge-success',
                                            'proses'  => 'badge-warning',
                                            default   => 'badge-gray'
                                        } ?>">
                                            <?= ucfirst($st ?: 'Baru') ?>
                                        </span>
                                    </td>
                                    <td>
                                        <a href="<?= base_url('pelanggaran/detail/' . $row['id']) ?>"
                                           class="btn btn-outline-secondary btn-sm">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>

                    <!-- Pagination pelanggaran -->
                    <?php if ($total_page_pel > 1): ?>
                    <div style="padding:16px 20px;border-top:1px solid var(--gray-100);display:flex;align-items:center;justify-content:space-between">
                        <small class="text-muted">
                            Menampilkan <?= min(($page-1)*15+1, $total_pel) ?>–<?= min($page*15, $total_pel) ?>
                            dari <?= $total_pel ?> data
                        </small>
                        <div class="pagination">
                            <?php
                            $baseQuery2 = http_build_query(['bulan'=>$bulan_aktif,'tahun'=>$tahun_aktif,'kelas'=>$kelas_aktif,'search'=>$search_aktif,'tab'=>'pelanggaran']);
                            ?>
                            <a href="<?= base_url('laporan?' . $baseQuery2 . '&page=' . max(1, $page-1)) ?>"
                               class="page-btn <?= $page <= 1 ? 'disabled' : '' ?>">
                                <i class="fa fa-chevron-left"></i>
                            </a>
                            <?php for ($p = max(1,$page-2); $p <= min($total_page_pel, $page+2); $p++): ?>
                            <a href="<?= base_url('laporan?' . $baseQuery2 . '&page=' . $p) ?>"
                               class="page-btn <?= $p == $page ? 'active' : '' ?>"><?= $p ?></a>
                            <?php endfor; ?>
                            <a href="<?= base_url('laporan?' . $baseQuery2 . '&page=' . min($total_page_pel, $page+1)) ?>"
                               class="page-btn <?= $page >= $total_page_pel ? 'disabled' : '' ?>">
                                <i class="fa fa-chevron-right"></i>
                            </a>
                        </div>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div><!-- /panel-pelanggaran -->


        <!-- ══════════════════════════════════════════════
             TAB: EKSPOR LAPORAN
        ══════════════════════════════════════════════ -->
        <div id="panel-ekspor" class="tab-panel <?= $tab_aktif=='ekspor'?'active':'' ?>">

            <!-- Export cards -->
            <div class="card border-0 shadow-sm mb-4">
                <div class="card-header">
                    <h6 class="fw-bold mb-0"><i class="fa fa-file-export me-2" style="color:var(--blue-500)"></i>Ekspor Data</h6>
                    <p style="font-size:12px;color:var(--gray-400);margin-top:4px">
                        Semua ekspor menggunakan filter periode yang sedang aktif: <strong><?= esc($judulPeriode) ?></strong>
                    </p>
                </div>
                <div class="card-body">
                    <div class="export-grid">

                        <!-- CSV Bimbingan -->
                        <div class="export-card">
                            <div class="export-icon csv"><i class="fa fa-file-csv"></i></div>
                            <div class="export-name">Data Bimbingan</div>
                            <div class="export-desc">Semua riwayat kunjungan BK dalam format CSV siap buka di Excel</div>
                            <a href="<?= base_url('laporan/export-csv-bimbingan?' . http_build_query(['bulan'=>$bulan_aktif,'tahun'=>$tahun_aktif,'kelas'=>$kelas_aktif])) ?>"
                               class="btn btn-success" style="width:100%;justify-content:center;">
                                <i class="fa fa-download"></i> Unduh CSV
                            </a>
                        </div>

                        <!-- CSV Pelanggaran -->
                        <div class="export-card">
                            <div class="export-icon pdf"><i class="fa fa-file-csv"></i></div>
                            <div class="export-name">Data Pelanggaran</div>
                            <div class="export-desc">Semua kasus pelanggaran beserta kategori dan poin dalam format CSV</div>
                            <a href="<?= base_url('laporan/export-csv-pelanggaran?' . http_build_query(['bulan'=>$bulan_aktif,'tahun'=>$tahun_aktif,'kelas'=>$kelas_aktif])) ?>"
                               class="btn btn-danger" style="width:100%;justify-content:center;">
                                <i class="fa fa-download"></i> Unduh CSV
                            </a>
                        </div>

                        <!-- CSV Rekap per Kelas -->
                        <div class="export-card">
                            <div class="export-icon print"><i class="fa fa-table"></i></div>
                            <div class="export-name">Rekap per Kelas</div>
                            <div class="export-desc">Ringkasan bimbingan dan pelanggaran per kelas untuk laporan kepala sekolah</div>
                            <a href="<?= base_url('laporan/export-csv-rekap?' . http_build_query(['bulan'=>$bulan_aktif,'tahun'=>$tahun_aktif])) ?>"
                               class="btn btn-primary" style="width:100%;justify-content:center;">
                                <i class="fa fa-download"></i> Unduh CSV
                            </a>
                        </div>

                    </div>
                </div>
            </div>

            <!-- Cetak langsung -->
            <div class="card border-0 shadow-sm">
                <div class="card-header">
                    <h6 class="fw-bold mb-0"><i class="fa fa-print me-2" style="color:var(--gray-600)"></i>Cetak Laporan</h6>
                </div>
                <div class="card-body p-0">
                    <table>
                        <thead>
                            <tr>
                                <th style="padding-left:16px">Jenis Laporan</th>
                                <th>Deskripsi</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td style="padding-left:16px;font-weight:600">
                                    <i class="fa fa-file-lines me-2" style="color:var(--blue-500)"></i>
                                    Rekap Bimbingan — <?= esc($judulPeriode) ?>
                                </td>
                                <td style="font-size:12px;color:var(--gray-400)">
                                    Halaman rekap semua sesi bimbingan dan kunjungan periode ini
                                </td>
                                <td>
                                    <a href="<?= base_url('rekap-bimbingan?bulan=' . $bulan_aktif . '&tahun=' . $tahun_aktif) ?>"
                                       target="_blank" class="btn btn-outline-secondary btn-sm">
                                        <i class="fa fa-arrow-up-right-from-square"></i> Buka
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td style="padding-left:16px;font-weight:600">
                                    <i class="fa fa-triangle-exclamation me-2" style="color:var(--danger)"></i>
                                    Data Pelanggaran — <?= esc($judulPeriode) ?>
                                </td>
                                <td style="font-size:12px;color:var(--gray-400)">
                                    Halaman daftar pelanggaran siswa untuk dicetak
                                </td>
                                <td>
                                    <a href="<?= base_url('pelanggaran?bulan=' . $bulan_aktif . '&tahun=' . $tahun_aktif) ?>"
                                       target="_blank" class="btn btn-outline-secondary btn-sm">
                                        <i class="fa fa-arrow-up-right-from-square"></i> Buka
                                    </a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

        </div><!-- /panel-ekspor -->

    </div><!-- /page-content -->
</div><!-- /main-wrapper -->


<!-- Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
// ── Data dari PHP ─────────────────────────────────────────────
const rekapBulanan = <?= json_encode(array_values($rekap_bulanan)) ?>;
const rekapSesi    = <?= json_encode(array_values($rekap_sesi)) ?>;
const rekapPel     = <?= json_encode(array_values($rekap_pelanggaran_bulan)) ?>;
const distJenis    = <?= json_encode($dist_jenis) ?>;
const labelBulan   = ['Jan','Feb','Mar','Apr','Mei','Jun','Jul','Ags','Sep','Okt','Nov','Des'];

// ── Chart: Komparasi Kunjungan vs Pelanggaran ─────────────────
new Chart(document.getElementById('chartKomparasi'), {
    type: 'bar',
    data: {
        labels: labelBulan,
        datasets: [
            {
                label: 'Kunjungan',
                data: rekapBulanan.map(r => r.total),
                backgroundColor: 'rgba(67,97,238,.8)',
                borderRadius: 5,
            },
            {
                label: 'Pelanggaran',
                data: rekapPel.map(r => r.total),
                backgroundColor: 'rgba(239,68,68,.75)',
                borderRadius: 5,
            }
        ]
    },
    options: {
        responsive: true,
        plugins: { legend: { position: 'top' } },
        scales: { y: { beginAtZero: true, ticks: { stepSize: 1 } } }
    }
});

// ── Chart: Jenis Bimbingan (Doughnut) ────────────────────────
new Chart(document.getElementById('chartJenis'), {
    type: 'doughnut',
    data: {
        labels: distJenis.map(r => r.jenis),
        datasets: [{
            data: distJenis.map(r => r.total),
            backgroundColor: ['#4361ee','#10b981','#f59e0b','#8b5cf6'],
            borderWidth: 2,
        }]
    },
    options: {
        responsive: true,
        plugins: { legend: { position: 'bottom', labels: { boxWidth: 12, font: { size: 11 } } } }
    }
});

// ── Chart: Sesi Bimbingan (Line) ─────────────────────────────
new Chart(document.getElementById('chartSesi'), {
    type: 'line',
    data: {
        labels: labelBulan,
        datasets: [{
            label: 'Sesi Bimbingan',
            data: rekapSesi.map(r => r.total),
            borderColor: '#3a86ff',
            backgroundColor: 'rgba(58,134,255,.1)',
            fill: true,
            tension: 0.4,
            pointBackgroundColor: '#3a86ff',
            pointRadius: 4,
        }]
    },
    options: {
        responsive: true,
        plugins: { legend: { display: false } },
        scales: { y: { beginAtZero: true, ticks: { stepSize: 1 } } }
    }
});

// ── Tab switching ─────────────────────────────────────────────
function switchTab(name) {
    document.querySelectorAll('.tab-btn').forEach(b => b.classList.remove('active'));
    document.querySelectorAll('.tab-panel').forEach(p => p.classList.remove('active'));
    document.getElementById('panel-' + name).classList.add('active');

    // Tandai tombol aktif
    const btns = document.querySelectorAll('.tab-btn');
    const map = { ringkasan: 0, bimbingan: 1, pelanggaran: 2, ekspor: 3 };
    btns[map[name]].classList.add('active');

    // Update URL query agar filter retain tab saat reload
    const url = new URL(window.location.href);
    url.searchParams.set('tab', name);
    history.replaceState(null, '', url.toString());
}

// ── Clock ─────────────────────────────────────────────────────
function updateClock() {
    const d = new Date();
    const days   = ['Minggu','Senin','Selasa','Rabu','Kamis','Jumat','Sabtu'];
    const months = ['Jan','Feb','Mar','Apr','Mei','Jun','Jul','Ags','Sep','Okt','Nov','Des'];
    document.getElementById('dateLive').textContent =
        days[d.getDay()] + ', ' + d.getDate() + ' ' + months[d.getMonth()] + ' ' + d.getFullYear();
    document.getElementById('timeLive').textContent =
        String(d.getHours()).padStart(2,'0') + ':' +
        String(d.getMinutes()).padStart(2,'0') + ':' +
        String(d.getSeconds()).padStart(2,'0') + ' WIB';
}
setInterval(updateClock, 1000);
updateClock();

// ── Sidebar toggle (mobile) ───────────────────────────────────
function toggleSidebar() {
    document.getElementById('sidebar').classList.toggle('open');
    document.getElementById('overlay').classList.toggle('show');
}
function closeSidebar() {
    document.getElementById('sidebar').classList.remove('open');
    document.getElementById('overlay').classList.remove('show');
}

// ── Fullscreen ────────────────────────────────────────────────
function toggleFS() {
    if (!document.fullscreenElement) {
        document.documentElement.requestFullscreen();
        document.getElementById('fsIcon').className = 'fa fa-compress';
    } else {
        document.exitFullscreen();
        document.getElementById('fsIcon').className = 'fa fa-expand';
    }
}
</script>
</body>
</html>