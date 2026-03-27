<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BK SMA Karya Sekadau — Dashboard Bimbingan Konseling</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800&family=DM+Sans:ital,wght@0,300;0,400;0,500;1,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.4.1/chart.umd.min.js"></script>
    <style>
        :root {
            --blue-900:#0a1628;--blue-800:#0d2045;--blue-700:#0f2d6b;
            --blue-600:#1340a0;--blue-500:#1a56db;--blue-400:#3b82f6;
            --blue-300:#93c5fd;--blue-200:#bfdbfe;--blue-100:#dbeafe;--blue-50:#eff6ff;
            --gray-50:#f8fafc;--gray-100:#f1f5f9;--gray-200:#e2e8f0;
            --gray-400:#94a3b8;--gray-600:#475569;--gray-800:#1e293b;
            --success:#10b981;--warning:#f59e0b;--danger:#ef4444;
            --sidebar-w:270px;--navbar-h:72px;
            --radius:16px;--radius-sm:10px;
            --shadow:0 4px 24px rgba(19,64,160,.10);
            --shadow-lg:0 12px 40px rgba(19,64,160,.18);
            --transition:all .3s cubic-bezier(.4,0,.2,1);
        }
        *,*::before,*::after{box-sizing:border-box;margin:0;padding:0}
        body{font-family:'DM Sans',sans-serif;background:var(--gray-50);color:var(--gray-800);min-height:100vh;display:flex;overflow-x:hidden}

        /* ══ SIDEBAR ══ */
        .sidebar{width:var(--sidebar-w);min-height:100vh;background:linear-gradient(175deg,var(--blue-900) 0%,var(--blue-800) 50%,var(--blue-700) 100%);position:fixed;left:0;top:0;bottom:0;z-index:100;display:flex;flex-direction:column;box-shadow:4px 0 32px rgba(10,22,40,.25);transition:var(--transition);overflow-y:auto}
        .sidebar::before{content:'';position:absolute;top:0;right:0;width:1px;height:100%;background:linear-gradient(to bottom,transparent,rgba(59,130,246,.4),transparent)}
        .sidebar::after{content:'';position:absolute;top:-60px;right:-60px;width:200px;height:200px;border-radius:50%;background:radial-gradient(circle,rgba(26,86,219,.2) 0%,transparent 70%);pointer-events:none}
        .sidebar-brand{padding:28px 24px 22px;display:flex;align-items:center;gap:14px;border-bottom:1px solid rgba(255,255,255,.08);position:relative;flex-shrink:0}
        .brand-icon{width:46px;height:46px;background:linear-gradient(135deg,var(--blue-500),var(--blue-400));border-radius:13px;display:flex;align-items:center;justify-content:center;font-size:20px;color:white;box-shadow:0 4px 16px rgba(26,86,219,.5);flex-shrink:0}
        .brand-text .brand-title{font-family:'Outfit',sans-serif;font-weight:700;font-size:17px;color:white;line-height:1.1;letter-spacing:-.3px}
        .brand-text .brand-sub{font-size:11px;color:var(--blue-300);font-weight:400;margin-top:2px;letter-spacing:.4px}
        .sidebar-section{padding:18px 14px 6px}
        .sidebar-section-label{font-size:10px;font-weight:600;text-transform:uppercase;letter-spacing:1.5px;color:rgba(147,197,253,.5);padding:0 10px;margin-bottom:6px}
        .nav-item{display:flex;align-items:center;gap:12px;padding:11px 14px;border-radius:var(--radius-sm);color:rgba(255,255,255,.65);text-decoration:none;font-size:14px;font-weight:400;transition:var(--transition);cursor:pointer;position:relative;margin-bottom:2px}
        .nav-item:hover{background:rgba(255,255,255,.08);color:white}
        .nav-item.active{background:linear-gradient(90deg,rgba(26,86,219,.6),rgba(26,86,219,.2));color:white;font-weight:500;box-shadow:inset 0 0 0 1px rgba(59,130,246,.3)}
        .nav-item.active::before{content:'';position:absolute;left:0;top:20%;bottom:20%;width:3px;background:var(--blue-400);border-radius:0 4px 4px 0}
        .nav-item i{width:20px;font-size:15px;text-align:center;flex-shrink:0}
        .nav-badge{margin-left:auto;background:var(--danger);color:white;font-size:10px;font-weight:600;padding:2px 7px;border-radius:20px;min-width:20px;text-align:center}
        .nav-badge.warn{background:var(--warning);color:#92400e}
        .sidebar-footer{margin-top:auto;padding:16px 14px;border-top:1px solid rgba(255,255,255,.08);flex-shrink:0}
        .user-card{display:flex;align-items:center;gap:12px;padding:10px 12px;border-radius:var(--radius-sm);background:rgba(255,255,255,.07);cursor:pointer;transition:var(--transition)}
        .user-card:hover{background:rgba(255,255,255,.12)}
        .user-avatar{width:38px;height:38px;border-radius:50%;background:linear-gradient(135deg,var(--blue-500),#60a5fa);display:flex;align-items:center;justify-content:center;font-family:'Outfit',sans-serif;font-weight:700;font-size:15px;color:white;flex-shrink:0}
        .user-info .user-name{font-size:13px;font-weight:500;color:white}
        .user-info .user-role{font-size:11px;color:var(--blue-300);margin-top:1px}
        .user-card .logout-icon{margin-left:auto;color:rgba(255,255,255,.4);font-size:13px;transition:var(--transition)}
        .user-card:hover .logout-icon{color:var(--danger)}

        /* ══ MAIN ══ */
        .main-wrapper{margin-left:var(--sidebar-w);flex:1;display:flex;flex-direction:column;min-height:100vh}

        /* ══ NAVBAR ══ */
        .navbar{height:var(--navbar-h);background:white;border-bottom:1px solid var(--gray-200);display:flex;align-items:center;padding:0 32px;position:sticky;top:0;z-index:50;gap:16px;box-shadow:0 2px 16px rgba(19,64,160,.06)}
        .navbar-hamburger{display:none;background:none;border:none;font-size:20px;color:var(--blue-600);cursor:pointer;padding:8px;border-radius:8px;transition:var(--transition)}
        .navbar-hamburger:hover{background:var(--blue-50)}
        .navbar-search{flex:1;max-width:400px;position:relative}
        .navbar-search input{width:100%;padding:9px 16px 9px 40px;border-radius:50px;border:1.5px solid var(--gray-200);background:var(--gray-50);font-family:'DM Sans',sans-serif;font-size:13.5px;color:var(--gray-800);outline:none;transition:var(--transition)}
        .navbar-search input:focus{border-color:var(--blue-400);background:white;box-shadow:0 0 0 3px rgba(59,130,246,.12)}
        .navbar-search i{position:absolute;left:14px;top:50%;transform:translateY(-50%);color:var(--gray-400);font-size:13px}
        .navbar-actions{display:flex;align-items:center;gap:8px;margin-left:auto}
        .nav-action-btn{width:40px;height:40px;border-radius:50%;border:none;background:var(--gray-100);color:var(--gray-600);cursor:pointer;display:flex;align-items:center;justify-content:center;font-size:16px;position:relative;transition:var(--transition)}
        .nav-action-btn:hover{background:var(--blue-100);color:var(--blue-600)}
        .notif-dot{position:absolute;top:8px;right:8px;width:9px;height:9px;background:var(--danger);border-radius:50%;border:2px solid white}
        .navbar-date{font-size:13px;color:var(--gray-600);padding:0 16px;border-left:1px solid var(--gray-200);display:flex;flex-direction:column;align-items:flex-end;gap:1px}
        .navbar-date .date-main{font-weight:500;color:var(--gray-800);font-size:13.5px}
        .navbar-date .date-sub{font-size:11px;color:var(--gray-400)}

        /* ══ PAGE ══ */
        .page-content{padding:28px 32px;flex:1}
        .page-header{margin-bottom:28px}
        .page-header h1{font-family:'Outfit',sans-serif;font-size:26px;font-weight:700;color:var(--blue-900);letter-spacing:-.5px}
        .page-header p{font-size:14px;color:var(--gray-400);margin-top:4px}

        /* ══ STAT CARDS ══ */
        .stats-grid{display:grid;grid-template-columns:repeat(4,1fr);gap:20px;margin-bottom:28px}
        .stat-card{background:white;border-radius:var(--radius);padding:22px 24px;box-shadow:var(--shadow);display:flex;flex-direction:column;gap:16px;position:relative;overflow:hidden;transition:var(--transition);cursor:pointer;text-decoration:none}
        .stat-card::after{content:'';position:absolute;bottom:0;left:0;right:0;height:3px;border-radius:0 0 var(--radius) var(--radius)}
        .stat-card:hover{transform:translateY(-3px);box-shadow:var(--shadow-lg)}
        .stat-card.total::after{background:linear-gradient(90deg,var(--blue-500),var(--blue-300))}
        .stat-card.new::after{background:linear-gradient(90deg,#f59e0b,#fbbf24)}
        .stat-card.proc::after{background:linear-gradient(90deg,#8b5cf6,#a78bfa)}
        .stat-card.done::after{background:linear-gradient(90deg,var(--success),#34d399)}
        .stat-top{display:flex;align-items:flex-start;justify-content:space-between}
        .stat-label{font-size:12.5px;font-weight:500;color:var(--gray-400);text-transform:uppercase;letter-spacing:.5px}
        .stat-icon{width:44px;height:44px;border-radius:12px;display:flex;align-items:center;justify-content:center;font-size:18px}
        .stat-card.total .stat-icon{background:var(--blue-100);color:var(--blue-500)}
        .stat-card.new .stat-icon{background:#fef3c7;color:#d97706}
        .stat-card.proc .stat-icon{background:#ede9fe;color:#7c3aed}
        .stat-card.done .stat-icon{background:#d1fae5;color:#059669}
        .stat-value{font-family:'Outfit',sans-serif;font-size:36px;font-weight:800;color:var(--blue-900);line-height:1;letter-spacing:-1px}
        .stat-footer{display:flex;align-items:center;gap:6px;font-size:12px}
        .stat-change{display:flex;align-items:center;gap:3px;font-weight:600;padding:3px 7px;border-radius:20px}
        .stat-change.up{background:#dcfce7;color:#16a34a}
        .stat-change.same{background:var(--gray-100);color:var(--gray-600)}
        .stat-period{color:var(--gray-400)}

        /* ══ NOTIF BANNER ══ */
        .notif-banner{background:linear-gradient(135deg,var(--blue-700) 0%,var(--blue-500) 100%);border-radius:var(--radius);padding:16px 24px;display:flex;align-items:center;gap:16px;margin-bottom:28px;box-shadow:var(--shadow-lg);position:relative;overflow:hidden}
        .notif-banner::before{content:'';position:absolute;right:-40px;top:-40px;width:160px;height:160px;border-radius:50%;background:rgba(255,255,255,.05)}
        .notif-icon-wrap{width:46px;height:46px;background:rgba(255,255,255,.15);border-radius:12px;display:flex;align-items:center;justify-content:center;font-size:20px;color:white;flex-shrink:0;animation:pulse-ring 2s infinite}
        @keyframes pulse-ring{0%,100%{box-shadow:0 0 0 0 rgba(255,255,255,.3)}50%{box-shadow:0 0 0 8px rgba(255,255,255,0)}}
        .notif-content{flex:1}
        .notif-content .notif-title{font-family:'Outfit',sans-serif;font-weight:600;font-size:15px;color:white}
        .notif-content .notif-items{display:flex;gap:20px;margin-top:6px;flex-wrap:wrap}
        .notif-item{display:flex;align-items:center;gap:6px;font-size:12.5px;color:rgba(255,255,255,.8);padding:4px 10px;background:rgba(255,255,255,.12);border-radius:20px;cursor:pointer}
        .notif-item .dot{width:6px;height:6px;border-radius:50%}
        .notif-actions{display:flex;gap:8px;flex-shrink:0}
        .btn-notif{padding:9px 18px;border-radius:8px;border:none;font-family:'DM Sans',sans-serif;font-size:13px;font-weight:500;cursor:pointer;transition:var(--transition);display:inline-flex;align-items:center;gap:6px}
        .btn-notif.primary{background:white;color:var(--blue-700)}
        .btn-notif.primary:hover{background:var(--blue-50)}
        .btn-notif.ghost{background:rgba(255,255,255,.12);color:white;border:1px solid rgba(255,255,255,.2)}
        .btn-notif.ghost:hover{background:rgba(255,255,255,.22)}

        /* ══ GRID ══ */
        .dashboard-grid{display:grid;grid-template-columns:1fr 380px;gap:24px;margin-bottom:28px}

        /* ══ CARD ══ */
        .card{background:white;border-radius:var(--radius);box-shadow:var(--shadow);overflow:hidden}
        .card-header{padding:20px 24px 16px;border-bottom:1px solid var(--gray-100);display:flex;align-items:center;justify-content:space-between}
        .card-title{font-family:'Outfit',sans-serif;font-size:16px;font-weight:600;color:var(--blue-900);display:flex;align-items:center;gap:10px}
        .card-title i{color:var(--blue-500);font-size:15px}
        .card-actions{display:flex;gap:6px}
        .btn-sm{padding:6px 14px;border-radius:8px;border:1.5px solid var(--gray-200);background:white;font-family:'DM Sans',sans-serif;font-size:12px;font-weight:500;color:var(--gray-600);cursor:pointer;transition:var(--transition)}
        .btn-sm:hover,.btn-sm.active{background:var(--blue-500);border-color:var(--blue-500);color:white}
        .btn-primary{padding:8px 18px;border-radius:8px;border:none;background:var(--blue-500);color:white;font-family:'DM Sans',sans-serif;font-size:13px;font-weight:500;cursor:pointer;transition:var(--transition);display:inline-flex;align-items:center;gap:6px;text-decoration:none}
        .btn-primary:hover{background:var(--blue-600);box-shadow:0 3px 10px rgba(26,86,219,.4)}
        .card-body{padding:20px 24px}
        .chart-container{position:relative;height:280px;padding:0 4px}

        /* ══ NEWS ══ */
        .news-list{display:flex;flex-direction:column}
        .news-item{display:flex;gap:14px;padding:16px 24px;border-bottom:1px solid var(--gray-100);transition:var(--transition);cursor:pointer;text-decoration:none}
        .news-item:last-child{border-bottom:none}
        .news-item:hover{background:var(--blue-50)}
        .news-badge{width:10px;height:10px;border-radius:50%;flex-shrink:0;margin-top:5px}
        .news-content .news-title{font-size:13.5px;font-weight:500;color:var(--blue-900);line-height:1.4}
        .news-content .news-meta{display:flex;align-items:center;gap:10px;margin-top:5px;flex-wrap:wrap}
        .news-meta span{font-size:11.5px;color:var(--gray-400);display:flex;align-items:center;gap:4px}
        .news-tag{font-size:10.5px;font-weight:600;padding:2px 8px;border-radius:20px;white-space:nowrap}

        /* ══ RINGKASAN PELANGGARAN ══ */
        .ringkasan-section{margin-bottom:28px}
        .ringkasan-grid{display:grid;grid-template-columns:repeat(3,1fr);gap:16px}
        .ringkasan-card{background:white;border-radius:var(--radius);padding:20px 22px;box-shadow:var(--shadow);display:flex;align-items:center;gap:16px;text-decoration:none;transition:var(--transition);border:2px solid transparent;position:relative;overflow:hidden}
        .ringkasan-card::before{content:'';position:absolute;inset:0;opacity:0;transition:var(--transition)}
        .ringkasan-card:hover{transform:translateY(-2px);box-shadow:var(--shadow-lg);border-color:var(--blue-200)}
        .ringkasan-card:hover::before{opacity:1}
        .ringkasan-icon{width:52px;height:52px;border-radius:14px;display:flex;align-items:center;justify-content:center;font-size:20px;flex-shrink:0}
        .ringkasan-icon.berat{background:#fee2e2;color:#dc2626}
        .ringkasan-icon.sedang{background:#fef3c7;color:#b45309}
        .ringkasan-icon.ringan{background:var(--blue-100);color:var(--blue-600)}
        .ringkasan-body{flex:1}
        .ringkasan-label{font-size:12px;font-weight:500;color:var(--gray-400);text-transform:uppercase;letter-spacing:.5px;margin-bottom:4px}
        .ringkasan-val{font-family:'Outfit',sans-serif;font-size:28px;font-weight:800;color:var(--blue-900);letter-spacing:-1px;line-height:1}
        .ringkasan-sub{font-size:11.5px;color:var(--gray-400);margin-top:4px;display:flex;align-items:center;gap:4px}
        .ringkasan-arrow{color:var(--blue-400);font-size:13px;transition:var(--transition)}
        .ringkasan-card:hover .ringkasan-arrow{transform:translateX(4px)}

        /* ══ SISWA BERMASALAH ══ */
        .siswa-list{display:flex;flex-direction:column}
        .siswa-item{display:flex;align-items:center;gap:14px;padding:14px 24px;border-bottom:1px solid var(--gray-100);transition:var(--transition);cursor:pointer;text-decoration:none}
        .siswa-item:last-child{border-bottom:none}
        .siswa-item:hover{background:var(--blue-50)}
        .siswa-avatar{width:38px;height:38px;border-radius:50%;display:flex;align-items:center;justify-content:center;font-family:'Outfit',sans-serif;font-size:13px;font-weight:700;color:white;flex-shrink:0}
        .siswa-info{flex:1}
        .siswa-name{font-size:13.5px;font-weight:500;color:var(--blue-900)}
        .siswa-meta{font-size:11.5px;color:var(--gray-400);margin-top:2px}
        .siswa-poin{text-align:right}
        .poin-badge{font-family:'Outfit',sans-serif;font-size:15px;font-weight:700;padding:4px 10px;border-radius:8px}
        .poin-badge.high{background:#fee2e2;color:#dc2626}
        .poin-badge.mid{background:#fef3c7;color:#b45309}
        .poin-badge.low{background:var(--blue-100);color:var(--blue-600)}
        .siswa-poin-label{font-size:10px;color:var(--gray-400);margin-top:2px}

        /* ══ NOTIF POPUP ══ */
        .notif-popup{position:fixed;top:80px;right:20px;width:320px;background:white;border-radius:var(--radius);box-shadow:0 20px 60px rgba(10,22,40,.2);z-index:200;display:none;overflow:hidden;animation:slideDown .25s ease}
        @keyframes slideDown{from{opacity:0;transform:translateY(-10px)}to{opacity:1;transform:translateY(0)}}
        .notif-popup.show{display:block}
        .notif-popup-header{padding:16px 18px 12px;background:linear-gradient(90deg,var(--blue-800),var(--blue-600));color:white;display:flex;align-items:center;justify-content:space-between}
        .notif-popup-header h3{font-family:'Outfit',sans-serif;font-size:14px;font-weight:600}
        .notif-popup-list{max-height:320px;overflow-y:auto}
        .notif-popup-item{display:flex;gap:12px;padding:13px 18px;border-bottom:1px solid var(--gray-100);transition:var(--transition);cursor:pointer}
        .notif-popup-item:hover{background:var(--blue-50)}
        .notif-popup-item:last-child{border-bottom:none}
        .notif-popup-dot{width:8px;height:8px;border-radius:50%;flex-shrink:0;margin-top:4px}
        .notif-popup-text .title{font-size:12.5px;font-weight:500;color:var(--gray-800)}
        .notif-popup-text .time{font-size:11px;color:var(--gray-400);margin-top:2px}
        .notif-popup-footer{padding:12px 18px;text-align:center;font-size:12.5px;color:var(--blue-500);border-top:1px solid var(--gray-100);cursor:pointer;font-weight:500}
        .notif-popup-footer:hover{background:var(--blue-50)}

        /* ══ TOAST ══ */
        .toast{position:fixed;bottom:28px;right:28px;background:var(--blue-900);color:white;padding:14px 20px;border-radius:var(--radius-sm);font-size:13.5px;font-weight:500;box-shadow:var(--shadow-lg);z-index:999;display:flex;align-items:center;gap:10px;transform:translateY(80px);opacity:0;transition:all .35s cubic-bezier(.4,0,.2,1)}
        .toast.show{transform:translateY(0);opacity:1}
        .toast.success{border-left:4px solid var(--success)}
        .toast.info{border-left:4px solid var(--blue-400)}

        /* ══ SCROLLBAR ══ */
        ::-webkit-scrollbar{width:6px;height:6px}
        ::-webkit-scrollbar-track{background:transparent}
        ::-webkit-scrollbar-thumb{background:var(--gray-200);border-radius:10px}
        ::-webkit-scrollbar-thumb:hover{background:var(--blue-300)}

        /* ══ RESPONSIVE ══ */
        @media(max-width:1200px){.stats-grid{grid-template-columns:repeat(2,1fr)}.dashboard-grid{grid-template-columns:1fr}.ringkasan-grid{grid-template-columns:1fr 1fr}}
        @media(max-width:768px){:root{--sidebar-w:0px}.sidebar{transform:translateX(-270px);width:270px}.sidebar.open{transform:translateX(0)}.main-wrapper{margin-left:0}.navbar-hamburger{display:flex}.navbar{padding:0 18px}.page-content{padding:20px 18px}.stats-grid{grid-template-columns:1fr 1fr}.ringkasan-grid{grid-template-columns:1fr}}
        @media(max-width:480px){.stats-grid{grid-template-columns:1fr}}
        .overlay{display:none;position:fixed;inset:0;background:rgba(10,22,40,.4);z-index:90}
        .overlay.show{display:block}
    </style>
</head>
<body>

<div class="overlay" id="overlay" onclick="closeSidebar()"></div>

<!-- ══ TOAST ══ -->
<div class="toast success" id="toast">
    <i class="fa fa-circle-check"></i>
    <span id="toastMsg">—</span>
</div>

<!-- ══ NOTIF POPUP ══ -->
<div class="notif-popup" id="notifPopup">
    <div class="notif-popup-header">
        <h3><i class="fa fa-bell" style="margin-right:8px"></i> Notifikasi Pelanggaran</h3>
        <button onclick="toggleNotif()" style="background:none;border:none;color:white;cursor:pointer;font-size:16px;">
            <i class="fa fa-times"></i>
        </button>
    </div>
    <div class="notif-popup-list" id="notifList">
        <?php
        $notifs = [
            ['color'=>'#ef4444','title'=>'Aldi Firmansyah (XI RPL 2) — Perkelahian',        'time'=>'5 menit lalu'],
            ['color'=>'#f59e0b','title'=>'Putri Ayu (X TKJ 1) — Membolos 3x berturut',      'time'=>'22 menit lalu'],
            ['color'=>'#ef4444','title'=>'Rafi Hidayat (XII MM) — Membawa rokok',            'time'=>'1 jam lalu'],
            ['color'=>'#1a56db','title'=>'Sinta Wulandari (X AKL) — Terlambat',             'time'=>'2 jam lalu'],
            ['color'=>'#f59e0b','title'=>'Bima Saputra (XI TSM 3) — Seragam tidak lengkap', 'time'=>'3 jam lalu'],
            ['color'=>'#1a56db','title'=>'Nadia Pratiwi (XII AP 1) — Tidak hadir',          'time'=>'5 jam lalu'],
        ];
        foreach ($notifs as $i => $n): ?>
        <div class="notif-popup-item" id="notifItem<?= $i ?>" onclick="tandaiSatuNotif(<?= $i ?>)">
            <div class="notif-popup-dot" style="background:<?= $n['color'] ?>;margin-top:6px"></div>
            <div class="notif-popup-text">
                <div class="title"><?= esc($n['title']) ?></div>
                <div class="time"><i class="fa fa-clock"></i> <?= esc($n['time']) ?></div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
    <div class="notif-popup-footer" onclick="lihatSemuaNotif()">
        Lihat semua notifikasi →
    </div>
</div>

<!-- ════════════ SIDEBAR ════════════ -->
<aside class="sidebar" id="sidebar">
    <div class="sidebar-brand">
        <div class="brand-icon"><i class="fa fa-graduation-cap"></i></div>
        <div class="brand-text">
            <!-- NAMA SEKOLAH DIGANTI -->
            <div class="brand-title">BK SMA Karya Sekadau</div>
            <div class="brand-sub">Bimbingan &amp; Konseling</div>
        </div>
    </div>

    <!-- ── MENU UTAMA ── -->
    <div class="sidebar-section">
        <div class="sidebar-section-label">Menu Utama</div>
        <!-- IKON DASHBOARD: fa-gauge-high (konsisten) -->
        <a class="nav-item <?= (uri_string()==''||uri_string()=='dashboard')?'active':'' ?>"
           href="<?= base_url('/') ?>">
            <i class="fa fa-gauge-high"></i> Dashboard
        </a>
        <!-- IKON DATA PELANGGARAN: fa-triangle-exclamation (konsisten) -->
        <a class="nav-item <?= str_starts_with(uri_string(),'pelanggaran')?'active':'' ?>"
           href="<?= base_url('pelanggaran') ?>">
            <i class="fa fa-triangle-exclamation"></i> Data Pelanggaran
            <span class="nav-badge"><?= $stats['baru'] ?? 0 ?></span>
        </a>
        <a class="nav-item <?= str_starts_with(uri_string(),'siswa')?'active':'' ?>"
           href="<?= base_url('siswa') ?>">
            <i class="fa fa-users"></i> Data Siswa
        </a>
        <a class="nav-item <?= str_starts_with(uri_string(),'tindak-lanjut')?'active':'' ?>"
           href="<?= base_url('tindak-lanjut') ?>">
            <i class="fa fa-list-check"></i> Tindak Lanjut
        </a>
        <a class="nav-item <?= str_starts_with(uri_string(),'buku-kunjungan')?'active':'' ?>"
           href="<?= base_url('buku-kunjungan') ?>">
            <i class="fa fa-book-open"></i> Buku Kunjungan
        </a>
    </div>

    <!-- ── KONSELING ── -->
    <div class="sidebar-section">
        <div class="sidebar-section-label">Konseling</div>
        <a class="nav-item <?= str_starts_with(uri_string(),'jadwal-konseling')?'active':'' ?>"
           href="<?= base_url('jadwal-konseling') ?>">
            <i class="fa fa-calendar-check"></i> Jadwal Konseling
            <span class="nav-badge warn">3</span>
        </a>
        <a class="nav-item <?= str_starts_with(uri_string(),'sesi-bimbingan')?'active':'' ?>"
           href="<?= base_url('sesi-bimbingan') ?>">
            <i class="fa fa-comments"></i> Sesi Bimbingan
        </a>
        <a class="nav-item <?= str_starts_with(uri_string(),'rekap-bimbingan')?'active':'' ?>"
           href="<?= base_url('rekap-bimbingan') ?>">
            <i class="fa fa-chart-bar"></i> Rekap Bimbingan
        </a>
    </div>

    <!-- ── PENGELOLAAN ── -->
    <div class="sidebar-section">
        <div class="sidebar-section-label">Pengelolaan</div>
        <a class="nav-item <?= str_starts_with(uri_string(),'laporan')?'active':'' ?>"
           href="<?= base_url('laporan') ?>">
            <i class="fa fa-file-lines"></i> Laporan &amp; Rekap
        </a>
        <a class="nav-item <?= str_starts_with(uri_string(),'kategori-pelanggaran')?'active':'' ?>"
           href="<?= base_url('kategori-pelanggaran') ?>">
            <i class="fa fa-scale-balanced"></i> Kategori Pelanggaran
        </a>
        <a class="nav-item <?= str_starts_with(uri_string(),'surat-dokumen')?'active':'' ?>"
           href="<?= base_url('surat-dokumen') ?>">
            <i class="fa fa-file-signature"></i> Surat &amp; Dokumen
        </a>
        <a class="nav-item <?= str_starts_with(uri_string(),'notifikasi')?'active':'' ?>"
           href="<?= base_url('notifikasi') ?>">
            <i class="fa fa-bell"></i> Notifikasi
            <span class="nav-badge"><?= $stats['baru'] ?? 0 ?></span>
        </a>
    </div>

    <!-- ── SISTEM ── -->
    <div class="sidebar-section">
        <div class="sidebar-section-label">Sistem</div>
        <a class="nav-item <?= str_starts_with(uri_string(),'guru-bk')?'active':'' ?>"
           href="<?= base_url('guru-bk') ?>">
            <i class="fa fa-chalkboard-user"></i> Data Guru BK
        </a>
        <a class="nav-item <?= str_starts_with(uri_string(),'manajemen-user')?'active':'' ?>"
           href="<?= base_url('manajemen-user') ?>">
            <i class="fa fa-users-gear"></i> Manajemen User
        </a>
        <a class="nav-item <?= str_starts_with(uri_string(),'pengaturan')?'active':'' ?>"
           href="<?= base_url('pengaturan') ?>">
            <i class="fa fa-gear"></i> Pengaturan
        </a>
        <a class="nav-item <?= str_starts_with(uri_string(),'bantuan')?'active':'' ?>"
           href="<?= base_url('bantuan') ?>">
            <i class="fa fa-circle-question"></i> Bantuan
        </a>
    </div>

    <!-- ── USER FOOTER ── -->
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

    <!-- NAVBAR -->
    <nav class="navbar">
        <button class="navbar-hamburger" onclick="toggleSidebar()"><i class="fa fa-bars"></i></button>
        <div class="navbar-search">
            <i class="fa fa-magnifying-glass"></i>
            <input type="text" placeholder="Cari siswa, pelanggaran..." onkeypress="handleSearch(event, this.value)">
        </div>
        <div class="navbar-actions">
            <button class="nav-action-btn" title="Notifikasi" onclick="toggleNotif()">
                <i class="fa fa-bell"></i>
                <span class="notif-dot" id="notifDot"></span>
            </button>
            <button class="nav-action-btn" title="Pesan"><i class="fa fa-envelope"></i></button>
            <button class="nav-action-btn" title="Laporan" onclick="window.location='<?= base_url('pelanggaran') ?>'"><i class="fa fa-file-arrow-down"></i></button>
            <button class="nav-action-btn" title="Fullscreen" onclick="toggleFS()"><i class="fa fa-expand" id="fsIcon"></i></button>
        </div>
        <div class="navbar-date">
            <span class="date-main" id="dateLive">—</span>
            <span class="date-sub" id="timeLive">—</span>
        </div>
    </nav>

    <!-- PAGE CONTENT -->
    <div class="page-content">

        <!-- Flash Messages -->
        <?php if (session()->getFlashdata('success')): ?>
        <div style="padding:14px 18px;border-radius:var(--radius-sm);margin-bottom:20px;display:flex;align-items:center;gap:10px;font-size:13.5px;font-weight:500;background:#d1fae5;color:#065f46;border:1px solid #6ee7b7">
            <i class="fa fa-circle-check"></i> <?= session()->getFlashdata('success') ?>
        </div>
        <?php endif; ?>

        <div class="page-header">
            <h1>Dashboard Bimbingan Konseling</h1>
            <!-- NAMA SEKOLAH DIGANTI -->
            <p>Selamat datang di sistem BK SMA Karya Sekadau. Berikut ringkasan aktivitas pelanggaran hari ini.</p>
        </div>

        <!-- 4 STAT CARDS — klik langsung ke halaman pelanggaran -->
        <div class="stats-grid">
            <a class="stat-card total" href="<?= base_url('pelanggaran?tab=semua') ?>" title="Lihat semua pelanggaran">
                <div class="stat-top">
                    <div class="stat-label">Total Pelanggaran</div>
                    <!-- IKON SAMAKAN: fa-triangle-exclamation -->
                    <div class="stat-icon"><i class="fa fa-triangle-exclamation"></i></div>
                </div>
                <div class="stat-value"><?= $stats['total'] ?? 0 ?></div>
                <div class="stat-footer">
                    <span class="stat-change up"><i class="fa fa-arrow-up" style="font-size:9px"></i> 12%</span>
                    <span class="stat-period">dari bulan lalu</span>
                </div>
            </a>
            <a class="stat-card new" href="<?= base_url('pelanggaran?tab=baru') ?>" title="Lihat pelanggaran baru">
                <div class="stat-top">
                    <div class="stat-label">Baru Masuk</div>
                    <div class="stat-icon"><i class="fa fa-circle-exclamation"></i></div>
                </div>
                <div class="stat-value"><?= $stats['baru'] ?? 0 ?></div>
                <div class="stat-footer">
                    <span class="stat-change up"><i class="fa fa-arrow-up" style="font-size:9px"></i> 5</span>
                    <span class="stat-period">hari ini</span>
                </div>
            </a>
            <a class="stat-card proc" href="<?= base_url('pelanggaran?tab=proses') ?>" title="Lihat yang dalam proses">
                <div class="stat-top">
                    <div class="stat-label">Dalam Proses</div>
                    <div class="stat-icon"><i class="fa fa-spinner"></i></div>
                </div>
                <div class="stat-value"><?= $stats['proses'] ?? 0 ?></div>
                <div class="stat-footer">
                    <span class="stat-change same"><i class="fa fa-minus" style="font-size:9px"></i> 0%</span>
                    <span class="stat-period">dari kemarin</span>
                </div>
            </a>
            <a class="stat-card done" href="<?= base_url('pelanggaran?tab=diproses') ?>" title="Lihat yang sudah diproses">
                <div class="stat-top">
                    <div class="stat-label">Sudah Diproses</div>
                    <div class="stat-icon"><i class="fa fa-circle-check"></i></div>
                </div>
                <div class="stat-value"><?= $stats['diproses'] ?? 0 ?></div>
                <div class="stat-footer">
                    <span class="stat-change up"><i class="fa fa-arrow-up" style="font-size:9px"></i> 8%</span>
                    <span class="stat-period">dari bulan lalu</span>
                </div>
            </a>
        </div>

        <!-- NOTIFICATION BANNER -->
        <div class="notif-banner" id="notifBanner">
            <div class="notif-icon-wrap"><i class="fa fa-bell"></i></div>
            <div class="notif-content">
                <div class="notif-title">
                    ⚠️ Ada <?= ($stats['baru'] ?? 0) ?> pelanggaran baru yang membutuhkan perhatian
                </div>
                <div class="notif-items">
                    <div class="notif-item" onclick="window.location='<?= base_url('pelanggaran?tab=baru&kategori=berat') ?>'">
                        <span class="dot" style="background:#ef4444"></span> <?= $notifikasi['kritis'] ?? 0 ?> Pelanggaran Berat
                    </div>
                    <div class="notif-item" onclick="window.location='<?= base_url('pelanggaran?tab=baru&kategori=sedang') ?>'">
                        <span class="dot" style="background:#f59e0b"></span> Pelanggaran Sedang
                    </div>
                    <div class="notif-item" onclick="window.location='<?= base_url('pelanggaran?tab=baru&kategori=ringan') ?>'">
                        <span class="dot" style="background:#93c5fd"></span> Pelanggaran Ringan
                    </div>
                    <div class="notif-item">
                        <span class="dot" style="background:#10b981"></span> <?= $notifikasi['menunggu_ortu'] ?? 0 ?> Menunggu Notif Ortu
                    </div>
                </div>
            </div>
            <div class="notif-actions">
                <button class="btn-notif primary" onclick="window.location='<?= base_url('pelanggaran?tab=baru') ?>'">
                    <i class="fa fa-eye"></i> Lihat Semua
                </button>
                <button class="btn-notif ghost" id="btnTandaiBaca" onclick="tandaiBannerDibaca()">
                    <i class="fa fa-check"></i> Tandai Dibaca
                </button>
            </div>
        </div>

        <!-- CHART + NEWS -->
        <div class="dashboard-grid">

            <!-- Chart -->
            <div class="card">
                <div class="card-header">
                    <div class="card-title"><i class="fa fa-chart-bar"></i> Grafik Pelanggaran Mingguan</div>
                    <div class="card-actions">
                        <button class="btn-sm active" id="btnMinggu" onclick="switchChart('minggu')">Minggu</button>
                        <button class="btn-sm" id="btnBulan"  onclick="switchChart('bulan')">Bulan</button>
                        <button class="btn-sm" id="btnTahun"  onclick="switchChart('tahun')">Tahun</button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="chart-container">
                        <canvas id="pelanggaranChart"></canvas>
                    </div>
                </div>
            </div>

            <!-- Berita Pelanggaran Terbaru — klik ke halaman pelanggaran -->
            <div class="card">
                <div class="card-header">
                    <div class="card-title"><i class="fa fa-newspaper"></i> Pelanggaran Terbaru</div>
                    <a href="<?= base_url('pelanggaran') ?>" class="btn-primary" style="font-size:12px;padding:6px 14px">
                        <i class="fa fa-arrow-right"></i> Lihat Semua
                    </a>
                </div>
                <div class="news-list">
                    <?php
                    $news = [
                        ['color'=>'#ef4444','cat'=>'Berat',  'catClr'=>'#fee2e2;color:#dc2626','title'=>'Aldi Firmansyah terlibat perkelahian di kantin',   'kelas'=>'XI RPL 2','time'=>'08:35'],
                        ['color'=>'#f59e0b','cat'=>'Sedang', 'catClr'=>'#fef3c7;color:#b45309','title'=>'Putri Ayu membolos 3 hari berturut-turut',         'kelas'=>'X TKJ 1', 'time'=>'09:10'],
                        ['color'=>'#ef4444','cat'=>'Berat',  'catClr'=>'#fee2e2;color:#dc2626','title'=>'Rafi Hidayat kedapatan membawa rokok',             'kelas'=>'XII MM',  'time'=>'09:55'],
                        ['color'=>'#1a56db','cat'=>'Ringan', 'catClr'=>'#dbeafe;color:#1d4ed8','title'=>'Sinta Wulandari terlambat masuk kelas',            'kelas'=>'X AKL',   'time'=>'10:20'],
                        ['color'=>'#f59e0b','cat'=>'Sedang', 'catClr'=>'#fef3c7;color:#b45309','title'=>'Bima Saputra seragam tidak lengkap (3x)',          'kelas'=>'XI TSM 3','time'=>'11:00'],
                        ['color'=>'#1a56db','cat'=>'Ringan', 'catClr'=>'#dbeafe;color:#1d4ed8','title'=>'Nadia Pratiwi tidak hadir tanpa keterangan',       'kelas'=>'XII AP 1','time'=>'11:30'],
                    ];
                    foreach ($news as $n): ?>
                    <a class="news-item" href="<?= base_url('pelanggaran?tab=semua') ?>">
                        <div class="news-badge" style="background:<?= $n['color'] ?>"></div>
                        <div class="news-content">
                            <div class="news-title"><?= esc($n['title']) ?></div>
                            <div class="news-meta">
                                <span><i class="fa fa-user-graduate"></i> <?= esc($n['kelas']) ?></span>
                                <span><i class="fa fa-clock"></i> <?= esc($n['time']) ?></span>
                                <span class="news-tag" style="background:<?= $n['catClr'] ?>"><?= esc($n['cat']) ?></span>
                            </div>
                        </div>
                    </a>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>

        <!-- ══ RINGKASAN PER KATEGORI + SISWA AKUMULASI POIN TERBANYAK ══ -->
        <div class="dashboard-grid" style="margin-bottom:28px">

            <!-- Ringkasan per Kategori -->
            <div class="card">
                <div class="card-header">
                    <div class="card-title"><i class="fa fa-layer-group"></i> Ringkasan per Kategori</div>
                    <a href="<?= base_url('pelanggaran') ?>" class="btn-primary" style="font-size:12px;padding:6px 14px">
                        <i class="fa fa-arrow-right"></i> Detail
                    </a>
                </div>
                <div class="card-body" style="padding-bottom:8px">
                    <div class="ringkasan-grid">
                        <!-- Pelanggaran Berat -->
                        <a class="ringkasan-card" href="<?= base_url('pelanggaran?tab=semua&kategori=berat') ?>">
                            <div class="ringkasan-icon berat"><i class="fa fa-triangle-exclamation"></i></div>
                            <div class="ringkasan-body">
                                <div class="ringkasan-label">Berat</div>
                                <div class="ringkasan-val"><?= $stats['berat'] ?? 0 ?></div>
                                <div class="ringkasan-sub"><i class="fa fa-circle" style="font-size:7px;color:#dc2626"></i> Perlu tindak lanjut segera</div>
                            </div>
                            <i class="fa fa-chevron-right ringkasan-arrow"></i>
                        </a>
                        <!-- Pelanggaran Sedang -->
                        <a class="ringkasan-card" href="<?= base_url('pelanggaran?tab=semua&kategori=sedang') ?>">
                            <div class="ringkasan-icon sedang"><i class="fa fa-circle-exclamation"></i></div>
                            <div class="ringkasan-body">
                                <div class="ringkasan-label">Sedang</div>
                                <div class="ringkasan-val"><?= $stats['sedang'] ?? 0 ?></div>
                                <div class="ringkasan-sub"><i class="fa fa-circle" style="font-size:7px;color:#b45309"></i> Dalam pemantauan</div>
                            </div>
                            <i class="fa fa-chevron-right ringkasan-arrow"></i>
                        </a>
                        <!-- Pelanggaran Ringan -->
                        <a class="ringkasan-card" href="<?= base_url('pelanggaran?tab=semua&kategori=ringan') ?>">
                            <div class="ringkasan-icon ringan"><i class="fa fa-circle-info"></i></div>
                            <div class="ringkasan-body">
                                <div class="ringkasan-label">Ringan</div>
                                <div class="ringkasan-val"><?= $stats['ringan'] ?? 0 ?></div>
                                <div class="ringkasan-sub"><i class="fa fa-circle" style="font-size:7px;color:#1a56db"></i> Penanganan standar</div>
                            </div>
                            <i class="fa fa-chevron-right ringkasan-arrow"></i>
                        </a>
                    </div>

                    <!-- Tabel ringkas pelanggaran per jenis -->
                    <div style="margin-top:20px">
                        <div style="font-size:12px;font-weight:600;color:var(--gray-400);text-transform:uppercase;letter-spacing:.5px;margin-bottom:12px">Jenis Pelanggaran Terbanyak</div>
                        <?php
                        // Gunakan $jenis_terbanyak dari controller, fallback ke dummy
                        $jenisList = $jenis_terbanyak ?? [
                            ['jenis'=>'Terlambat Masuk',   'jumlah'=>14,'persen'=>42,'kat'=>'ringan'],
                            ['jenis'=>'Seragam Tidak Sesuai','jumlah'=>8,'persen'=>24,'kat'=>'ringan'],
                            ['jenis'=>'Membolos',           'jumlah'=>6,'persen'=>18,'kat'=>'sedang'],
                            ['jenis'=>'Perkelahian',        'jumlah'=>3,'persen'=>9, 'kat'=>'berat'],
                            ['jenis'=>'Penggunaan HP',      'jumlah'=>2,'persen'=>6, 'kat'=>'sedang'],
                        ];
                        $barColors = ['ringan'=>'var(--blue-400)','sedang'=>'#f59e0b','berat'=>'#ef4444'];
                        foreach ($jenisList as $j): ?>
                        <div style="margin-bottom:12px">
                            <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:4px">
                                <span style="font-size:12.5px;color:var(--gray-800);font-weight:500"><?= esc($j['jenis']) ?></span>
                                <span style="font-size:12px;font-weight:600;color:var(--gray-600)"><?= $j['jumlah'] ?> kasus</span>
                            </div>
                            <div style="height:6px;background:var(--gray-100);border-radius:10px;overflow:hidden">
                                <div style="height:100%;width:<?= $j['persen'] ?>%;background:<?= $barColors[$j['kat']] ?? 'var(--blue-400)' ?>;border-radius:10px;transition:width .6s ease"></div>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>

            <!-- Siswa dengan Akumulasi Poin Terbanyak -->
            <div class="card">
                <div class="card-header">
                    <div class="card-title"><i class="fa fa-user-xmark"></i> Siswa Poin Tertinggi</div>
                    <a href="<?= base_url('siswa') ?>" class="btn-primary" style="font-size:12px;padding:6px 14px">
                        <i class="fa fa-arrow-right"></i> Data Siswa
                    </a>
                </div>
                <div class="siswa-list">
                    <?php
                    // Gunakan $siswa_poin dari controller, fallback ke dummy
                    $siswaPoin = $siswa_poin ?? [
                        ['nama'=>'Aldi Firmansyah','kelas'=>'XI RPL 2','poin'=>175,'warna'=>'#ef4444'],
                        ['nama'=>'Rafi Hidayat',   'kelas'=>'XII MM',  'poin'=>150,'warna'=>'#ef4444'],
                        ['nama'=>'Putri Ayu',       'kelas'=>'X TKJ 1', 'poin'=>95, 'warna'=>'#f59e0b'],
                        ['nama'=>'Bima Saputra',    'kelas'=>'XI TSM 3','poin'=>80, 'warna'=>'#f59e0b'],
                        ['nama'=>'Sinta Wulandari', 'kelas'=>'X AKL',  'poin'=>30, 'warna'=>'#1a56db'],
                    ];
                    foreach ($siswaPoin as $s):
                        $inisial = strtoupper(implode('', array_map(fn($w)=>$w[0], array_slice(explode(' ', $s['nama']), 0, 2))));
                        $poin    = $s['poin'];
                        $level   = $poin >= 100 ? 'high' : ($poin >= 50 ? 'mid' : 'low');
                    ?>
                    <a class="siswa-item" href="<?= base_url('siswa') ?>">
                        <div class="siswa-avatar" style="background:<?= $s['warna'] ?>"><?= $inisial ?></div>
                        <div class="siswa-info">
                            <div class="siswa-name"><?= esc($s['nama']) ?></div>
                            <div class="siswa-meta"><i class="fa fa-user-graduate" style="font-size:10px"></i> <?= esc($s['kelas']) ?></div>
                        </div>
                        <div class="siswa-poin">
                            <div class="poin-badge <?= $level ?>"><?= $poin ?></div>
                            <div class="siswa-poin-label">poin</div>
                        </div>
                    </a>
                    <?php endforeach; ?>
                </div>
                <div style="padding:12px 24px;border-top:1px solid var(--gray-100);text-align:center">
                    <a href="<?= base_url('siswa') ?>" style="font-size:12.5px;color:var(--blue-500);font-weight:500;text-decoration:none;display:inline-flex;align-items:center;gap:5px">
                        Lihat semua siswa <i class="fa fa-arrow-right" style="font-size:11px"></i>
                    </a>
                </div>
            </div>
        </div>

    </div><!-- /page-content -->
</div><!-- /main-wrapper -->

<script>
// ══ CLOCK ══
function updateClock(){
    const d=new Date(),
    days=['Minggu','Senin','Selasa','Rabu','Kamis','Jumat','Sabtu'],
    months=['Jan','Feb','Mar','Apr','Mei','Jun','Jul','Ags','Sep','Okt','Nov','Des'];
    document.getElementById('dateLive').textContent=days[d.getDay()]+', '+d.getDate()+' '+months[d.getMonth()]+' '+d.getFullYear();
    document.getElementById('timeLive').textContent=d.getHours().toString().padStart(2,'0')+':'+d.getMinutes().toString().padStart(2,'0')+':'+d.getSeconds().toString().padStart(2,'0')+' WIB';
}
setInterval(updateClock,1000); updateClock();

// ══ SIDEBAR ══
function toggleSidebar(){document.getElementById('sidebar').classList.toggle('open');document.getElementById('overlay').classList.toggle('show')}
function closeSidebar(){document.getElementById('sidebar').classList.remove('open');document.getElementById('overlay').classList.remove('show')}

// ══ FULLSCREEN ══
function toggleFS(){if(!document.fullscreenElement){document.documentElement.requestFullscreen();document.getElementById('fsIcon').className='fa fa-compress'}else{document.exitFullscreen();document.getElementById('fsIcon').className='fa fa-expand'}}

// ══ TOAST ══
function showToast(msg, type='success'){
    const t=document.getElementById('toast');
    document.getElementById('toastMsg').textContent=msg;
    t.className='toast '+type;
    t.classList.add('show');
    setTimeout(()=>t.classList.remove('show'),3500);
}

// ══ NOTIF POPUP ══
function toggleNotif(){document.getElementById('notifPopup').classList.toggle('show')}
document.addEventListener('click',e=>{
    const popup=document.getElementById('notifPopup');
    if(popup.classList.contains('show')&&!popup.contains(e.target)&&!e.target.closest('[title="Notifikasi"]'))
        popup.classList.remove('show');
});
function tandaiSatuNotif(idx){
    const item=document.getElementById('notifItem'+idx);
    if(item){item.style.opacity='.4';item.style.textDecoration='line-through';showToast('Notifikasi ditandai dibaca','info')}
}
function lihatSemuaNotif(){
    document.getElementById('notifPopup').classList.remove('show');
    window.location='<?= base_url('pelanggaran?tab=baru') ?>';
}

// ══ TANDAI BANNER ══
function tandaiBannerDibaca(){
    document.getElementById('notifBanner').style.opacity='.6';
    const btn=document.getElementById('btnTandaiBaca');
    btn.disabled=true;
    btn.innerHTML='<i class="fa fa-check"></i> Sudah Dibaca';
    document.getElementById('notifDot').style.display='none';
    showToast('Semua notifikasi ditandai dibaca ✓','success');
}

// ══ NAVBAR SEARCH ══
function handleSearch(e,val){
    if(e.key==='Enter'&&val.trim())
        window.location='<?= base_url('pelanggaran') ?>?tab=semua&q='+encodeURIComponent(val.trim());
}

// ══ CHART ══
const chartData={
    minggu:{labels:['Senin','Selasa','Rabu','Kamis','Jumat','Sabtu'],datasets:[{label:'Terlambat',data:[12,8,15,6,10,4],color:'#1a56db'},{label:'Bolos',data:[5,9,3,11,7,2],color:'#f59e0b'},{label:'Seragam',data:[8,4,7,5,3,6],color:'#8b5cf6'},{label:'Lainnya',data:[3,6,4,8,5,1],color:'#ef4444'}]},
    bulan:{labels:['Jan','Feb','Mar','Apr','Mei','Jun','Jul','Ags','Sep','Okt','Nov','Des'],datasets:[{label:'Terlambat',data:[45,38,52,41,60,35,48,55,42,38,50,44],color:'#1a56db'},{label:'Bolos',data:[22,18,30,25,35,20,28,32,24,19,27,23],color:'#f59e0b'},{label:'Seragam',data:[18,15,22,17,26,14,20,23,18,14,21,17],color:'#8b5cf6'},{label:'Lainnya',data:[10,8,14,11,16,9,12,15,11,9,13,10],color:'#ef4444'}]},
    tahun:{labels:['2020','2021','2022','2023','2024','2025'],datasets:[{label:'Terlambat',data:[320,285,410,370,460,390],color:'#1a56db'},{label:'Bolos',data:[180,160,220,200,260,220],color:'#f59e0b'},{label:'Seragam',data:[140,120,170,150,200,175],color:'#8b5cf6'},{label:'Lainnya',data:[80,70,110,90,130,100],color:'#ef4444'}]}
};
let myChart;
function buildChart(key){
    const d=chartData[key];
    const ctx=document.getElementById('pelanggaranChart').getContext('2d');
    if(myChart) myChart.destroy();
    myChart=new Chart(ctx,{type:'bar',data:{labels:d.labels,datasets:d.datasets.map(ds=>({label:ds.label,data:ds.data,backgroundColor:ds.color+'cc',borderColor:ds.color,borderWidth:1.5,borderRadius:6,borderSkipped:false}))},options:{responsive:true,maintainAspectRatio:false,plugins:{legend:{position:'top',labels:{font:{family:'DM Sans',size:12},padding:16,usePointStyle:true,pointStyleWidth:8}},tooltip:{backgroundColor:'#0a1628',titleFont:{family:'Outfit',size:13},bodyFont:{family:'DM Sans',size:12},padding:12,cornerRadius:10}},scales:{x:{grid:{display:false},ticks:{font:{family:'DM Sans',size:11},color:'#94a3b8'}},y:{grid:{color:'#f1f5f9'},ticks:{font:{family:'DM Sans',size:11},color:'#94a3b8'},beginAtZero:true}}}});
}
function switchChart(key){
    buildChart(key);
    ['Minggu','Bulan','Tahun'].forEach(k=>document.getElementById('btn'+k).classList.remove('active'));
    document.getElementById('btn'+key.charAt(0).toUpperCase()+key.slice(1)).classList.add('active');
}
buildChart('minggu');
</script>

</body>
</html>