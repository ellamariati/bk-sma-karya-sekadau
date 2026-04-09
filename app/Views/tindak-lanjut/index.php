<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tindak Lanjut — BK SMA Karya Sekadau</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800&family=DM+Sans:ital,wght@0,300;0,400;0,500;1,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        :root{--blue-900:#0a1628;--blue-800:#0d2045;--blue-700:#0f2d6b;--blue-600:#1340a0;--blue-500:#1a56db;--blue-400:#3b82f6;--blue-300:#93c5fd;--blue-200:#bfdbfe;--blue-100:#dbeafe;--blue-50:#eff6ff;--gray-50:#f8fafc;--gray-100:#f1f5f9;--gray-200:#e2e8f0;--gray-400:#94a3b8;--gray-600:#475569;--gray-800:#1e293b;--success:#10b981;--warning:#f59e0b;--danger:#ef4444;--purple:#8b5cf6;--sidebar-w:270px;--navbar-h:72px;--radius:16px;--radius-sm:10px;--shadow:0 4px 24px rgba(19,64,160,.10);--shadow-lg:0 12px 40px rgba(19,64,160,.18);--transition:all .3s cubic-bezier(.4,0,.2,1)}
        *,*::before,*::after{box-sizing:border-box;margin:0;padding:0}
        body{font-family:'DM Sans',sans-serif;background:var(--gray-50);color:var(--gray-800);min-height:100vh;display:flex;overflow-x:hidden}
        .sidebar{width:var(--sidebar-w);min-height:100vh;background:linear-gradient(175deg,var(--blue-900) 0%,var(--blue-800) 50%,var(--blue-700) 100%);position:fixed;left:0;top:0;bottom:0;z-index:100;display:flex;flex-direction:column;box-shadow:4px 0 32px rgba(10,22,40,.25);transition:var(--transition);overflow-y:auto;overflow-x:hidden;}
        .sidebar-brand{padding:28px 24px 22px;display:flex;align-items:center;gap:14px;border-bottom:1px solid rgba(255,255,255,.08)}
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
        .nav-badge{margin-left:auto;background:var(--danger);color:white;font-size:10px;font-weight:600;padding:2px 7px;border-radius:20px}
        .nav-badge.warn{background:var(--warning);color:#92400e}
        .sidebar-footer{margin-top:auto;padding:16px 14px;border-top:1px solid rgba(255,255,255,.08)}
        .user-card{display:flex;align-items:center;gap:12px;padding:10px 12px;border-radius:var(--radius-sm);background:rgba(255,255,255,.07);cursor:pointer;transition:var(--transition)}
        .user-card:hover{background:rgba(255,255,255,.12)}
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
        .page-header{display:flex;align-items:flex-start;justify-content:space-between;margin-bottom:28px;gap:16px}
        .page-header-left h1{font-family:'Outfit',sans-serif;font-size:26px;font-weight:700;color:var(--blue-900);letter-spacing:-.5px}
        .page-header-left p{font-size:14px;color:var(--gray-400);margin-top:4px}
        .page-header-right{display:flex;gap:10px;flex-shrink:0}
        .btn-primary{padding:10px 20px;border-radius:var(--radius-sm);border:none;background:var(--blue-500);color:white;font-family:'DM Sans',sans-serif;font-size:13.5px;font-weight:500;cursor:pointer;transition:var(--transition);display:inline-flex;align-items:center;gap:8px;text-decoration:none}
        .btn-primary:hover{background:var(--blue-600);box-shadow:0 4px 14px rgba(26,86,219,.4)}
        .btn-outline{padding:10px 20px;border-radius:var(--radius-sm);border:1.5px solid var(--gray-200);background:white;color:var(--gray-600);font-family:'DM Sans',sans-serif;font-size:13.5px;font-weight:500;cursor:pointer;transition:var(--transition);display:inline-flex;align-items:center;gap:8px;text-decoration:none}
        .btn-outline:hover{border-color:var(--blue-400);color:var(--blue-600);background:var(--blue-50)}
        .stats-grid{display:grid;grid-template-columns:repeat(4,1fr);gap:18px;margin-bottom:24px}
        .stat-card{background:white;border-radius:var(--radius);padding:20px 22px;box-shadow:var(--shadow);display:flex;align-items:center;gap:16px;transition:var(--transition);border-left:4px solid transparent;animation:fadeInUp .4s ease both}
        .stat-card:hover{transform:translateY(-2px);box-shadow:var(--shadow-lg)}
        .stat-card.blue{border-left-color:var(--blue-500)}.stat-card.yellow{border-left-color:var(--warning)}.stat-card.green{border-left-color:var(--success)}.stat-card.purple{border-left-color:var(--purple)}
        .stat-ico{width:46px;height:46px;border-radius:12px;display:flex;align-items:center;justify-content:center;font-size:18px;flex-shrink:0}
        .stat-card.blue .stat-ico{background:var(--blue-100);color:var(--blue-500)}
        .stat-card.yellow .stat-ico{background:#fef3c7;color:#d97706}
        .stat-card.green .stat-ico{background:#d1fae5;color:#059669}
        .stat-card.purple .stat-ico{background:#ede9fe;color:#7c3aed}
        .stat-num{font-family:'Outfit',sans-serif;font-size:30px;font-weight:800;color:var(--blue-900);line-height:1;letter-spacing:-1px}
        .stat-lbl{font-size:12px;color:var(--gray-400);margin-top:3px;font-weight:500}
        .filter-bar{background:white;border-radius:var(--radius);padding:16px 22px;box-shadow:var(--shadow);display:flex;align-items:center;gap:12px;margin-bottom:20px;flex-wrap:wrap}
        .filter-search{flex:1;min-width:220px;position:relative}
        .filter-search input{width:100%;padding:9px 16px 9px 38px;border-radius:var(--radius-sm);border:1.5px solid var(--gray-200);background:var(--gray-50);font-family:'DM Sans',sans-serif;font-size:13px;outline:none;transition:var(--transition)}
        .filter-search input:focus{border-color:var(--blue-400);background:white}
        .filter-search i{position:absolute;left:12px;top:50%;transform:translateY(-50%);color:var(--gray-400);font-size:13px}
        .filter-select{padding:9px 14px;border-radius:var(--radius-sm);border:1.5px solid var(--gray-200);background:white;font-family:'DM Sans',sans-serif;font-size:13px;color:var(--gray-800);outline:none;cursor:pointer}
        .filter-select:focus{border-color:var(--blue-400)}
        .table-card{background:white;border-radius:var(--radius);box-shadow:var(--shadow);overflow:hidden;margin-bottom:24px}
        .table-wrap{overflow-x:auto}
        table{width:100%;border-collapse:collapse;font-size:13px}
        thead th{padding:12px 14px;text-align:left;font-size:11px;font-weight:700;text-transform:uppercase;letter-spacing:.6px;color:var(--gray-400);background:var(--gray-50);border-bottom:2px solid var(--gray-200);white-space:nowrap}
        tbody td{padding:13px 14px;border-bottom:1px solid var(--gray-100);color:var(--gray-800);vertical-align:middle}
        tbody tr:last-child td{border-bottom:none}
        tbody tr:hover{background:var(--blue-50)}
        .td-name{font-weight:600;color:var(--blue-900);font-size:13px}
        .td-sub{font-size:11.5px;color:var(--gray-400);margin-top:1px}
        .badge{display:inline-flex;align-items:center;gap:4px;padding:3px 9px;border-radius:20px;font-size:11px;font-weight:600;white-space:nowrap}
        .badge::before{content:'';width:5px;height:5px;border-radius:50%;background:currentColor;flex-shrink:0}
        .badge.proses{background:#fef3c7;color:#92400e}
        .badge.selesai{background:#d1fae5;color:#065f46}
        .badge.bk{background:var(--blue-100);color:var(--blue-700)}
        .badge.wk{background:#ede9fe;color:#5b21b6}
        .badge.bk-wk{background:#fce7f3;color:#9d174d}
        .jb-wrap{display:flex;flex-wrap:wrap;gap:3px}
        .jb-pill{display:inline-flex;align-items:center;gap:3px;padding:2px 7px;border-radius:20px;font-size:10px;font-weight:700;text-transform:uppercase;letter-spacing:.3px}
        .jb-pill.pribadi{background:#dbeafe;color:#1d4ed8}
        .jb-pill.sosial{background:#fce7f3;color:#9d174d}
        .jb-pill.belajar{background:#d1fae5;color:#065f46}
        .jb-pill.karir{background:#ede9fe;color:#5b21b6}
        .masalah-cell{max-width:200px;font-size:12.5px;color:var(--gray-600);line-height:1.5}
        .tindak-cell{max-width:220px;font-size:12.5px;color:var(--gray-700);line-height:1.5}
        .action-btns{display:flex;gap:5px}
        .btn-icon{width:30px;height:30px;border-radius:7px;border:none;cursor:pointer;display:flex;align-items:center;justify-content:center;font-size:12px;transition:var(--transition)}
        .btn-icon.view{background:var(--blue-100);color:var(--blue-600)}
        .btn-icon.edit{background:#fef3c7;color:#b45309}
        .btn-icon.del{background:#fee2e2;color:#dc2626}
        .btn-icon.check{background:#d1fae5;color:#059669}
        .btn-icon:hover{opacity:.8;transform:scale(1.08)}
        .empty-state{text-align:center;padding:60px 20px;color:var(--gray-400)}
        .empty-state i{font-size:48px;color:var(--gray-200);margin-bottom:14px;display:block}
        .info-bar{padding:12px 22px;font-size:13px;color:var(--gray-400);border-top:1px solid var(--gray-100)}
        .alert{padding:12px 18px;border-radius:var(--radius-sm);margin-bottom:20px;display:flex;align-items:center;gap:10px;font-size:13.5px;font-weight:500}
        .alert-success{background:#d1fae5;color:#065f46;border:1px solid #6ee7b7}
        .alert-error{background:#fee2e2;color:#991b1b;border:1px solid #fca5a5}
        .alert-close{margin-left:auto;cursor:pointer;opacity:.6}.alert-close:hover{opacity:1}
        .modal-overlay{display:none;position:fixed;inset:0;background:rgba(10,22,40,.5);z-index:300;align-items:center;justify-content:center;padding:16px}
        .modal-overlay.show{display:flex}
        .modal{background:white;border-radius:var(--radius);width:100%;max-width:640px;max-height:94vh;overflow-y:auto;box-shadow:0 24px 80px rgba(10,22,40,.3);animation:modalIn .25s ease}
        .modal.modal-sm{max-width:440px}
        @keyframes modalIn{from{opacity:0;transform:scale(.95) translateY(10px)}to{opacity:1;transform:scale(1) translateY(0)}}
        .modal-header{padding:20px 26px 16px;background:linear-gradient(135deg,var(--blue-800),var(--blue-600));display:flex;align-items:center;justify-content:space-between;position:sticky;top:0;z-index:10}
        .modal-header h2{font-family:'Outfit',sans-serif;font-size:17px;font-weight:700;color:white;display:flex;align-items:center;gap:10px}
        .modal-close{width:32px;height:32px;border-radius:8px;border:none;background:rgba(255,255,255,.15);color:white;cursor:pointer;font-size:15px;display:flex;align-items:center;justify-content:center}
        .modal-close:hover{background:rgba(255,255,255,.25)}
        .modal-body{padding:22px 26px}
        .form-row{display:grid;grid-template-columns:1fr 1fr;gap:16px;margin-bottom:16px}
        .form-row.full{grid-template-columns:1fr}
        .form-group{display:flex;flex-direction:column;gap:6px}
        .form-label{font-size:12.5px;font-weight:600;color:var(--gray-700)}
        .form-input,.form-select,.form-textarea{padding:10px 14px;border-radius:var(--radius-sm);border:1.5px solid var(--gray-200);background:var(--gray-50);font-family:'DM Sans',sans-serif;font-size:13.5px;color:var(--gray-800);outline:none;transition:var(--transition)}
        .form-input:focus,.form-select:focus,.form-textarea:focus{border-color:var(--blue-400);background:white;box-shadow:0 0 0 3px rgba(59,130,246,.1)}
        .form-textarea{resize:vertical;min-height:88px;line-height:1.6}
        .jb-check-group{display:flex;gap:10px;flex-wrap:wrap;padding:10px 14px;border-radius:var(--radius-sm);border:1.5px solid var(--gray-200);background:var(--gray-50)}
        .jb-check-label{display:flex;align-items:center;gap:6px;cursor:pointer;font-size:13px;color:var(--gray-700);user-select:none}
        .jb-check-label input[type=checkbox]{width:16px;height:16px;accent-color:var(--blue-500);cursor:pointer}
        .jb-check-label:has(input:checked){color:var(--blue-600);font-weight:600}
        .quick-btn{padding:5px 12px;border-radius:20px;border:1.5px solid var(--gray-200);background:white;font-size:11.5px;color:var(--gray-600);cursor:pointer;transition:var(--transition);font-family:'DM Sans',sans-serif}
        .quick-btn:hover{border-color:var(--blue-400);color:var(--blue-600);background:var(--blue-50)}
        .modal-footer{padding:14px 26px;border-top:1px solid var(--gray-100);display:flex;justify-content:flex-end;gap:10px;position:sticky;bottom:0;background:white}
        .btn-cancel{padding:10px 20px;border-radius:var(--radius-sm);border:1.5px solid var(--gray-200);background:white;font-family:'DM Sans',sans-serif;font-size:13px;color:var(--gray-600);cursor:pointer}
        .btn-cancel:hover{background:var(--gray-50)}
        .btn-danger{padding:10px 24px;border-radius:var(--radius-sm);border:none;background:var(--danger);color:white;font-family:'DM Sans',sans-serif;font-size:13.5px;font-weight:500;cursor:pointer;text-decoration:none;display:inline-flex;align-items:center;gap:8px}
        .btn-danger:hover{background:#dc2626}
        .detail-section{margin-bottom:20px}
        .detail-section-title{font-size:11px;font-weight:700;text-transform:uppercase;letter-spacing:1px;color:var(--blue-500);margin-bottom:10px;padding-bottom:6px;border-bottom:1px solid var(--blue-100)}
        .detail-grid{display:grid;grid-template-columns:1fr 1fr;gap:12px}
        .detail-item{display:flex;flex-direction:column;gap:3px}
        .detail-item .label{font-size:11.5px;color:var(--gray-400);font-weight:500}
        .detail-item .value{font-size:13.5px;color:var(--gray-800);font-weight:500}
        .detail-text-box{background:var(--gray-50);border-radius:var(--radius-sm);padding:14px;font-size:13px;color:var(--gray-700);line-height:1.7;border:1px solid var(--gray-200)}
        .overlay{display:none;position:fixed;inset:0;background:rgba(10,22,40,.4);z-index:90}.overlay.show{display:block}
        @keyframes fadeInUp{from{opacity:0;transform:translateY(16px)}to{opacity:1;transform:translateY(0)}}
        ::-webkit-scrollbar{width:6px;height:6px}::-webkit-scrollbar-track{background:transparent}::-webkit-scrollbar-thumb{background:var(--gray-200);border-radius:10px}

        /* ══ SEARCHABLE SISWA DROPDOWN ══ */
        .siswa-search-wrap{position:relative}
        .siswa-search-input{width:100%;padding:10px 14px 10px 38px;border-radius:var(--radius-sm);border:1.5px solid var(--gray-200);background:var(--gray-50);font-family:'DM Sans',sans-serif;font-size:13.5px;color:var(--gray-800);outline:none;transition:var(--transition);cursor:pointer}
        .siswa-search-input:focus{border-color:var(--blue-400);background:white;box-shadow:0 0 0 3px rgba(59,130,246,.1)}
        .siswa-search-input.has-value{background:white;border-color:var(--blue-300)}
        .siswa-search-icon{position:absolute;left:12px;top:50%;transform:translateY(-50%);color:var(--gray-400);font-size:13px;pointer-events:none;transition:var(--transition)}
        .siswa-search-input:focus ~ .siswa-search-icon{color:var(--blue-500)}
        .siswa-clear-btn{position:absolute;right:10px;top:50%;transform:translateY(-50%);width:20px;height:20px;border-radius:50%;border:none;background:var(--gray-300);color:white;font-size:10px;cursor:pointer;display:none;align-items:center;justify-content:center;transition:var(--transition)}
        .siswa-clear-btn:hover{background:var(--danger)}
        .siswa-clear-btn.show{display:flex}
        .siswa-dropdown{position:absolute;top:calc(100% + 6px);left:0;right:0;background:white;border-radius:var(--radius-sm);border:1.5px solid var(--blue-200);box-shadow:0 8px 32px rgba(19,64,160,.15);z-index:500;max-height:240px;overflow-y:auto;display:none}
        .siswa-dropdown.show{display:block;animation:dropIn .15s ease}
        @keyframes dropIn{from{opacity:0;transform:translateY(-6px)}to{opacity:1;transform:translateY(0)}}
        .siswa-dropdown-search{padding:10px 12px;border-bottom:1px solid var(--gray-100);position:sticky;top:0;background:white;z-index:1}
        .siswa-dropdown-search input{width:100%;padding:8px 12px 8px 32px;border-radius:8px;border:1.5px solid var(--gray-200);background:var(--gray-50);font-family:'DM Sans',sans-serif;font-size:12.5px;outline:none;transition:var(--transition)}
        .siswa-dropdown-search input:focus{border-color:var(--blue-400);background:white}
        .siswa-dropdown-search .search-icon{position:absolute;left:22px;top:50%;transform:translateY(-50%);color:var(--gray-400);font-size:11px;pointer-events:none}
        .siswa-option{display:flex;align-items:center;gap:10px;padding:10px 14px;cursor:pointer;transition:var(--transition);border-bottom:1px solid var(--gray-50)}
        .siswa-option:last-child{border-bottom:none}
        .siswa-option:hover{background:var(--blue-50)}
        .siswa-option.selected{background:var(--blue-50)}
        .siswa-opt-avatar{width:32px;height:32px;border-radius:50%;display:flex;align-items:center;justify-content:center;font-size:11px;font-weight:700;color:white;flex-shrink:0}
        .siswa-opt-name{font-size:13px;font-weight:600;color:var(--blue-900)}
        .siswa-opt-kelas{font-size:11px;color:var(--gray-400);margin-top:1px}
        .siswa-opt-nisn{font-size:10.5px;color:var(--gray-400)}
        .siswa-no-result{padding:20px;text-align:center;color:var(--gray-400);font-size:13px}
        .siswa-selected-card{display:none;align-items:center;gap:10px;padding:10px 14px;background:var(--blue-50);border-radius:var(--radius-sm);border:1.5px solid var(--blue-200);margin-top:6px}
        .siswa-selected-card.show{display:flex}
        .siswa-selected-name{font-size:13px;font-weight:600;color:var(--blue-900)}
        .siswa-selected-kelas{font-size:11.5px;color:var(--blue-600)}

        @media(max-width:1200px){.stats-grid{grid-template-columns:repeat(2,1fr)}}
        @media(max-width:768px){:root{--sidebar-w:0px}.sidebar{transform:translateX(-270px);width:270px}.sidebar.open{transform:translateX(0)}.main-wrapper{margin-left:0}.navbar-hamburger{display:flex}.navbar{padding:0 18px}.page-content{padding:20px 18px}.stats-grid{grid-template-columns:1fr 1fr}.page-header{flex-direction:column}.form-row{grid-template-columns:1fr}}
        @media(max-width:480px){.stats-grid{grid-template-columns:1fr}}
    </style>
</head>
<body>
<div class="overlay" id="overlay" onclick="closeSidebar()"></div>

<?php
// Data siswa untuk JS
$siswaJs = array_map(fn($s) => [
    'id'    => $s['id'],
    'nama'  => $s['nama'],
    'kelas' => $s['kelas'],
    'nisn'  => $s['nisn'] ?? '',
], $list_siswa);
?>

<!-- ════ MODAL TAMBAH ════ -->
<div class="modal-overlay" id="modalTambah">
    <div class="modal">
        <div class="modal-header">
            <h2><i class="fa fa-plus-circle"></i> Tambah Tindak Lanjut</h2>
            <button class="modal-close" onclick="closeModal('modalTambah')"><i class="fa fa-times"></i></button>
        </div>
        <form action="<?= base_url('tindak-lanjut/simpan') ?>" method="POST">
            <?= csrf_field() ?>
            <div class="modal-body">
                <?php if (session()->getFlashdata('errors')): ?>
                    <?php foreach (session()->getFlashdata('errors') as $err): ?>
                        <div class="alert alert-error"><i class="fa fa-circle-xmark"></i><?= esc($err) ?><span class="alert-close" onclick="this.parentElement.remove()">✕</span></div>
                    <?php endforeach; ?>
                <?php endif; ?>

                <div class="form-row">
                    <div class="form-group">
                        <label class="form-label">Nama Siswa <span style="color:var(--danger)">*</span></label>
                        <!-- Searchable Siswa -->
                        <input type="hidden" name="siswa_id" id="tambah_siswa_id" value="<?= old('siswa_id') ?>" required>
                        <div class="siswa-search-wrap">
                            <input type="text" class="siswa-search-input" id="tambah_siswa_display"
                                placeholder="Cari nama siswa..." readonly
                                onclick="toggleSiswaDropdown('tambah')" autocomplete="off">
                            <i class="fa fa-user-graduate siswa-search-icon"></i>
                            <button type="button" class="siswa-clear-btn" id="tambah_siswa_clear"
                                onclick="clearSiswa('tambah')"><i class="fa fa-times"></i></button>
                            <div class="siswa-dropdown" id="tambah_siswa_dropdown">
                                <div class="siswa-dropdown-search" style="position:relative">
                                    <i class="fa fa-magnifying-glass search-icon"></i>
                                    <input type="text" id="tambah_siswa_search"
                                        placeholder="Ketik nama siswa..."
                                        oninput="filterSiswaOptions('tambah')" autocomplete="off">
                                </div>
                                <div id="tambah_siswa_list"></div>
                            </div>
                        </div>
                        <div class="siswa-selected-card" id="tambah_siswa_card">
                            <div class="siswa-opt-avatar" id="tambah_siswa_avatar" style="background:#1a56db">--</div>
                            <div>
                                <div class="siswa-selected-name" id="tambah_siswa_name">—</div>
                                <div class="siswa-selected-kelas" id="tambah_siswa_kelas">—</div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Tanggal <span style="color:var(--danger)">*</span></label>
                        <input type="date" name="tanggal" class="form-input" value="<?= old('tanggal', date('Y-m-d')) ?>" required>
                    </div>
                </div>

                <div class="form-row full">
                    <div class="form-group">
                        <label class="form-label">Jenis Bimbingan</label>
                        <div class="jb-check-group">
                            <?php
                            $oldJb = is_array(old('jenis_bimbingan')) ? old('jenis_bimbingan') : [];
                            $jbList = ['pribadi'=>['🧠','Pribadi'],'sosial'=>['🤝','Sosial'],'belajar'=>['📚','Belajar'],'karir'=>['💼','Karir']];
                            foreach ($jbList as $val => [$ico, $lbl]): ?>
                            <label class="jb-check-label">
                                <input type="checkbox" name="jenis_bimbingan[]" value="<?= $val ?>" <?= in_array($val,$oldJb)?'checked':'' ?>>
                                <?= $ico ?> <?= $lbl ?>
                            </label>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>

                <div class="form-row full">
                    <div class="form-group">
                        <label class="form-label">Masalah / Pelanggaran <span style="color:var(--danger)">*</span></label>
                        <textarea name="masalah" class="form-textarea" placeholder="Deskripsikan masalah atau pelanggaran yang dilakukan siswa..." required><?= old('masalah') ?></textarea>
                    </div>
                </div>

                <div class="form-row full">
                    <div class="form-group">
                        <label class="form-label">Tindak Lanjut yang Diberikan <span style="color:var(--danger)">*</span></label>
                        <div style="display:flex;flex-wrap:wrap;gap:6px;margin-bottom:8px">
                            <button type="button" class="quick-btn" onclick="appendTindak('Konseling dan nasehat kepada siswa')">💬 Konseling</button>
                            <button type="button" class="quick-btn" onclick="appendTindak('Melakukan mediasi dengan kedua belah pihak')">🤝 Mediasi</button>
                            <button type="button" class="quick-btn" onclick="appendTindak('Membuat surat pernyataan')">📝 Surat Pernyataan</button>
                            <button type="button" class="quick-btn" onclick="appendTindak('Panggilan orang tua/wali')">📞 Panggilan Ortu</button>
                            <button type="button" class="quick-btn" onclick="appendTindak('Memberikan surat peringatan')">⚠️ Surat Peringatan</button>
                            <button type="button" class="quick-btn" onclick="appendTindak('Pemberian motivasi dan arahan')">🌟 Pembinaan</button>
                            <button type="button" class="quick-btn" onclick="appendTindak('Menasehati tentang dampak dan bahaya perilaku tersebut')">📖 Nasehat</button>
                            <button type="button" class="quick-btn" onclick="appendTindak('Skorsing selama ... hari')">🚫 Skorsing</button>
                        </div>
                        <textarea name="tindak_lanjut" id="inputTindak" class="form-textarea" placeholder="Deskripsikan tindak lanjut yang diberikan..." required><?= old('tindak_lanjut') ?></textarea>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label class="form-label">Yang Menangani <span style="color:var(--danger)">*</span></label>
                        <select name="yang_menangani" class="form-select" required>
                            <option value="">-- Pilih --</option>
                            <option value="BK"                       <?= old('yang_menangani')=='BK'?'selected':'' ?>>BK (Guru BK)</option>
                            <option value="WK"                       <?= old('yang_menangani')=='WK'?'selected':'' ?>>WK (Wali Kelas)</option>
                            <option value="WK - BK"                  <?= old('yang_menangani')=='WK - BK'?'selected':'' ?>>WK &amp; BK</option>
                            <option value="BK - Waka"                <?= old('yang_menangani')=='BK - Waka'?'selected':'' ?>>BK &amp; Waka</option>
                            <option value="BK - WK - Waka - Siswa"  <?= old('yang_menangani')=='BK - WK - Waka - Siswa'?'selected':'' ?>>BK, WK, Waka &amp; Siswa</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Nama TTD / Paraf</label>
                        <input type="text" name="ttd" class="form-input" placeholder="Nama yang menandatangani" value="<?= old('ttd') ?>">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn-cancel" onclick="closeModal('modalTambah')">Batal</button>
                <button type="submit" class="btn-primary"><i class="fa fa-save"></i> Simpan</button>
            </div>
        </form>
    </div>
</div>

<!-- ════ MODAL EDIT ════ -->
<div class="modal-overlay" id="modalEdit">
    <div class="modal">
        <div class="modal-header">
            <h2><i class="fa fa-pen-to-square"></i> Edit Tindak Lanjut</h2>
            <button class="modal-close" onclick="closeModal('modalEdit')"><i class="fa fa-times"></i></button>
        </div>
        <form id="formEdit" method="POST">
            <?= csrf_field() ?>
            <div class="modal-body">
                <div class="form-row">
                    <div class="form-group">
                        <label class="form-label">Nama Siswa <span style="color:var(--danger)">*</span></label>
                        <input type="hidden" name="siswa_id" id="edit_siswa_id">
                        <div class="siswa-search-wrap">
                            <input type="text" class="siswa-search-input" id="edit_siswa_display"
                                placeholder="Cari nama siswa..." readonly
                                onclick="toggleSiswaDropdown('edit')" autocomplete="off">
                            <i class="fa fa-user-graduate siswa-search-icon"></i>
                            <button type="button" class="siswa-clear-btn" id="edit_siswa_clear"
                                onclick="clearSiswa('edit')"><i class="fa fa-times"></i></button>
                            <div class="siswa-dropdown" id="edit_siswa_dropdown">
                                <div class="siswa-dropdown-search" style="position:relative">
                                    <i class="fa fa-magnifying-glass search-icon"></i>
                                    <input type="text" id="edit_siswa_search"
                                        placeholder="Ketik nama siswa..."
                                        oninput="filterSiswaOptions('edit')" autocomplete="off">
                                </div>
                                <div id="edit_siswa_list"></div>
                            </div>
                        </div>
                        <div class="siswa-selected-card" id="edit_siswa_card">
                            <div class="siswa-opt-avatar" id="edit_siswa_avatar" style="background:#1a56db">--</div>
                            <div>
                                <div class="siswa-selected-name" id="edit_siswa_name">—</div>
                                <div class="siswa-selected-kelas" id="edit_siswa_kelas">—</div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Tanggal</label>
                        <input type="date" name="tanggal" id="e_tanggal" class="form-input">
                    </div>
                </div>
                <div class="form-row full">
                    <div class="form-group">
                        <label class="form-label">Jenis Bimbingan</label>
                        <div class="jb-check-group">
                            <label class="jb-check-label"><input type="checkbox" name="jenis_bimbingan[]" value="pribadi" id="ejb_pribadi"> 🧠 Pribadi</label>
                            <label class="jb-check-label"><input type="checkbox" name="jenis_bimbingan[]" value="sosial"  id="ejb_sosial">  🤝 Sosial</label>
                            <label class="jb-check-label"><input type="checkbox" name="jenis_bimbingan[]" value="belajar" id="ejb_belajar"> 📚 Belajar</label>
                            <label class="jb-check-label"><input type="checkbox" name="jenis_bimbingan[]" value="karir"   id="ejb_karir">   💼 Karir</label>
                        </div>
                    </div>
                </div>
                <div class="form-row full">
                    <div class="form-group">
                        <label class="form-label">Masalah</label>
                        <textarea name="masalah" id="e_masalah" class="form-textarea"></textarea>
                    </div>
                </div>
                <div class="form-row full">
                    <div class="form-group">
                        <label class="form-label">Tindak Lanjut</label>
                        <textarea name="tindak_lanjut" id="e_tindak" class="form-textarea"></textarea>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label class="form-label">Yang Menangani</label>
                        <select name="yang_menangani" id="e_menangani" class="form-select">
                            <option value="BK">BK (Guru BK)</option>
                            <option value="WK">WK (Wali Kelas)</option>
                            <option value="WK - BK">WK &amp; BK</option>
                            <option value="BK - Waka">BK &amp; Waka</option>
                            <option value="BK - WK - Waka - Siswa">BK, WK, Waka &amp; Siswa</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Status</label>
                        <select name="status" id="e_status" class="form-select">
                            <option value="proses">Proses</option>
                            <option value="selesai">Selesai</option>
                        </select>
                    </div>
                </div>
                <div class="form-row full">
                    <div class="form-group">
                        <label class="form-label">TTD / Paraf</label>
                        <input type="text" name="ttd" id="e_ttd" class="form-input" placeholder="Nama yang menandatangani">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn-cancel" onclick="closeModal('modalEdit')">Batal</button>
                <button type="submit" class="btn-primary"><i class="fa fa-save"></i> Simpan Perubahan</button>
            </div>
        </form>
    </div>
</div>

<!-- ════ MODAL DETAIL ════ -->
<div class="modal-overlay" id="modalDetail">
    <div class="modal">
        <div class="modal-header" style="background:linear-gradient(135deg,#065f46,#059669)">
            <h2><i class="fa fa-book-open"></i> Detail Tindak Lanjut</h2>
            <button class="modal-close" onclick="closeModal('modalDetail')"><i class="fa fa-times"></i></button>
        </div>
        <div class="modal-body" id="detailBody">
            <div style="text-align:center;padding:40px;color:var(--gray-400)"><i class="fa fa-spinner fa-spin" style="font-size:28px"></i></div>
        </div>
        <div class="modal-footer">
            <button class="btn-cancel" onclick="closeModal('modalDetail')">Tutup</button>
        </div>
    </div>
</div>

<!-- ════ MODAL HAPUS ════ -->
<div class="modal-overlay" id="modalHapus">
    <div class="modal modal-sm">
        <div class="modal-body" style="text-align:center;padding:36px 26px">
            <div style="font-size:52px;color:var(--danger);margin-bottom:12px"><i class="fa fa-trash-can"></i></div>
            <h3 style="font-family:'Outfit',sans-serif;font-size:18px;font-weight:700;color:var(--blue-900);margin-bottom:8px">Hapus Tindak Lanjut?</h3>
            <p style="font-size:14px;color:var(--gray-600);margin-bottom:20px">Data tindak lanjut <strong id="hapusInfo">—</strong> akan dihapus permanen.</p>
            <div style="display:flex;gap:10px;justify-content:center">
                <button class="btn-cancel" onclick="closeModal('modalHapus')">Batal</button>
                <a id="hapusLink" href="#" class="btn-danger"><i class="fa fa-trash"></i> Ya, Hapus</a>
            </div>
        </div>
    </div>
</div>

<!-- ════ SIDEBAR ════ -->
<aside class="sidebar" id="sidebar">
    <div class="sidebar-brand">
        <div class="brand-icon" style="background:white;padding:3px;border-radius:13px;overflow:hidden;">
            <img src="<?= base_url('img/logo_sma.png') ?>" alt="Logo SMA Karya Sekadau" style="width:40px;height:40px;object-fit:contain;display:block;">
        </div>
        <div class="brand-text">
            <div class="brand-title">BK SMA Karya Sekadau</div>
            <div class="brand-sub">Bimbingan &amp; Konseling</div>
        </div>
    </div>
    <div class="sidebar-section">
        <div class="sidebar-section-label">Menu Utama</div>
        <a class="nav-item <?= (uri_string()==''||uri_string()=='dashboard')?'active':'' ?>" href="<?= base_url('/') ?>"><i class="fa fa-gauge-high"></i> Dashboard</a>
        <a class="nav-item <?= str_starts_with(uri_string(),'pelanggaran')?'active':'' ?>" href="<?= base_url('pelanggaran') ?>"><i class="fa fa-triangle-exclamation"></i> Data Pelanggaran<span class="nav-badge"><?= $stats['baru'] ?? 0 ?></span></a>
        <a class="nav-item <?= str_starts_with(uri_string(),'siswa')?'active':'' ?>" href="<?= base_url('siswa') ?>"><i class="fa fa-users"></i> Data Siswa</a>
        <a class="nav-item <?= str_starts_with(uri_string(),'tindak-lanjut')?'active':'' ?>" href="<?= base_url('tindak-lanjut') ?>"><i class="fa fa-list-check"></i> Tindak Lanjut</a>
        <a class="nav-item <?= str_starts_with(uri_string(),'buku-kunjungan')?'active':'' ?>" href="<?= base_url('buku-kunjungan') ?>"><i class="fa fa-book-open"></i> Buku Kunjungan</a>
    </div>
    <div class="sidebar-section">
        <div class="sidebar-section-label">Konseling</div>
        <a class="nav-item <?= str_starts_with(uri_string(),'jadwal')?'active':'' ?>" href="<?= base_url('jadwal') ?>"><i class="fa fa-calendar-check"></i> Jadwal Konseling <span class="nav-badge warn">3</span></a>
        <a class="nav-item <?= str_starts_with(uri_string(),'sesi-bimbingan')?'active':'' ?>" href="<?= base_url('sesi-bimbingan') ?>"><i class="fa fa-comments"></i> Sesi Bimbingan</a>
        <a class="nav-item <?= str_starts_with(uri_string(),'rekap-bimbingan')?'active':'' ?>" href="<?= base_url('rekap-bimbingan') ?>"><i class="fa fa-chart-bar"></i> Rekap Bimbingan</a>
    </div>
    <div class="sidebar-section">
        <div class="sidebar-section-label">Pengelolaan</div>
        <a class="nav-item <?= str_starts_with(uri_string(),'laporan')?'active':'' ?>" href="<?= base_url('laporan') ?>"><i class="fa fa-file-lines"></i> Laporan &amp; Rekap</a>
        <a class="nav-item <?= str_starts_with(uri_string(),'kategori-pelanggaran')?'active':'' ?>" href="<?= base_url('kategori-pelanggaran') ?>"><i class="fa fa-scale-balanced"></i> Kategori Pelanggaran</a>
        <a class="nav-item <?= str_starts_with(uri_string(),'surat-dokumen')?'active':'' ?>" href="<?= base_url('surat-dokumen') ?>"><i class="fa fa-file-signature"></i> Surat &amp; Dokumen</a>
        <a class="nav-item <?= str_starts_with(uri_string(),'notifikasi')?'active':'' ?>" href="<?= base_url('notifikasi') ?>"><i class="fa fa-bell"></i> Notifikasi <span class="nav-badge"><?= $stats['baru'] ?? 0 ?></span></a>
    </div>
    <div class="sidebar-section">
        <div class="sidebar-section-label">Sistem</div>
        <a class="nav-item <?= str_starts_with(uri_string(),'guru-bk')?'active':'' ?>" href="<?= base_url('guru-bk') ?>"><i class="fa fa-chalkboard-user"></i> Data Guru BK</a>
        <a class="nav-item <?= str_starts_with(uri_string(),'manajemen-user')?'active':'' ?>" href="<?= base_url('manajemen-user') ?>"><i class="fa fa-users-gear"></i> Manajemen User</a>
        <a class="nav-item <?= str_starts_with(uri_string(),'pengaturan')?'active':'' ?>" href="<?= base_url('pengaturan') ?>"><i class="fa fa-gear"></i> Pengaturan</a>
        <a class="nav-item <?= str_starts_with(uri_string(),'bantuan')?'active':'' ?>" href="<?= base_url('bantuan') ?>"><i class="fa fa-circle-question"></i> Bantuan</a>
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
        <div class="navbar-search"><i class="fa fa-magnifying-glass"></i><input type="text" placeholder="Cari siswa, tindak lanjut..."></div>
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

        <div class="page-header">
            <div class="page-header-left">
                <h1>Tindak Lanjut</h1>
                <p>Pencatatan dan pemantauan tindak lanjut pelanggaran siswa</p>
            </div>
            <div class="page-header-right">
                <a href="<?= base_url('tindak-lanjut/export') ?>" class="btn-outline"><i class="fa fa-file-export"></i> Export CSV</a>
                <button class="btn-primary" onclick="openModal('modalTambah')"><i class="fa fa-plus"></i> Tambah</button>
            </div>
        </div>

        <div class="stats-grid">
            <div class="stat-card blue" style="animation-delay:.05s">
                <div class="stat-ico"><i class="fa fa-list-check"></i></div>
                <div><div class="stat-num"><?= $total ?? 0 ?></div><div class="stat-lbl">Total Tindak Lanjut</div></div>
            </div>
            <div class="stat-card yellow" style="animation-delay:.10s">
                <div class="stat-ico"><i class="fa fa-spinner"></i></div>
                <div><div class="stat-num"><?= $proses ?? 0 ?></div><div class="stat-lbl">Sedang Diproses</div></div>
            </div>
            <div class="stat-card green" style="animation-delay:.15s">
                <div class="stat-ico"><i class="fa fa-circle-check"></i></div>
                <div><div class="stat-num"><?= $selesai ?? 0 ?></div><div class="stat-lbl">Selesai</div></div>
            </div>
            <div class="stat-card purple" style="animation-delay:.20s">
                <div class="stat-ico"><i class="fa fa-calendar-day"></i></div>
                <div><div class="stat-num"><?= $bulan_ini ?? 0 ?></div><div class="stat-lbl">Bulan Ini</div></div>
            </div>
        </div>

        <div class="filter-bar">
            <div class="filter-search">
                <i class="fa fa-magnifying-glass"></i>
                <input type="text" id="searchInput" placeholder="Cari nama siswa, masalah, tindak lanjut..." oninput="filterData()">
            </div>
            <select class="filter-select" id="filterStatus" onchange="filterData()">
                <option value="">Semua Status</option>
                <option value="proses">Proses</option>
                <option value="selesai">Selesai</option>
            </select>
            <select class="filter-select" id="filterMenangani" onchange="filterData()">
                <option value="">Semua Penanganan</option>
                <option value="BK">BK</option>
                <option value="WK">WK</option>
                <option value="WK - BK">WK &amp; BK</option>
            </select>
            <select class="filter-select" id="filterJb" onchange="filterData()">
                <option value="">Semua Jenis Bimbingan</option>
                <option value="pribadi">Pribadi</option>
                <option value="sosial">Sosial</option>
                <option value="belajar">Belajar</option>
                <option value="karir">Karir</option>
            </select>
            <select class="filter-select" id="filterKelas" onchange="filterData()">
                <option value="">Semua Kelas</option>
                <option value="X">Kelas X</option>
                <option value="XI">Kelas XI</option>
                <option value="XII">Kelas XII</option>
            </select>
        </div>

        <div class="table-card">
            <div class="table-wrap">
                <table>
                    <thead>
                        <tr>
                            <th>#</th><th>Hari / Tanggal</th><th>Nama Siswa</th>
                            <th>Jenis Bimbingan</th><th>Masalah</th><th>Tindak Lanjut</th>
                            <th>TTD</th><th>Yang Menangani</th><th>Status</th><th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody id="tableBody">
                        <?php if (empty($list_tindak_lanjut)): ?>
                            <tr><td colspan="10"><div class="empty-state"><i class="fa fa-list-check"></i><p>Belum ada data tindak lanjut</p></div></td></tr>
                        <?php else: ?>
                            <?php
                            $hariId = ['Sunday'=>'Minggu','Monday'=>'Senin','Tuesday'=>'Selasa','Wednesday'=>'Rabu','Thursday'=>'Kamis','Friday'=>'Jumat','Saturday'=>'Sabtu'];
                            $jbLabel = ['pribadi'=>'🧠 Pribadi','sosial'=>'🤝 Sosial','belajar'=>'📚 Belajar','karir'=>'💼 Karir'];
                            ?>
                            <?php foreach ($list_tindak_lanjut as $i => $tl): ?>
                            <?php
                                $tgl=$tl['tanggal']; $hariStr=($hariId[date('l',strtotime($tgl))]??date('l',strtotime($tgl))); $tglStr=date('d/m/Y',strtotime($tgl));
                                $jbArr=!empty($tl['jenis_bimbingan'])?explode(',',$tl['jenis_bimbingan']):[];
                                $nama=$tl['nama_siswa']??'—';
                                $m=$tl['yang_menangani']??'';
                                $mCls=(str_contains($m,'WK')&&str_contains($m,'BK'))?'bk-wk':(str_starts_with($m,'BK')?'bk':'wk');
                            ?>
                            <tr class="tr-data"
                                data-nama="<?= strtolower(esc((string)($tl['nama_siswa']??''))) ?>"
                                data-masalah="<?= strtolower(esc((string)($tl['masalah']??''))) ?>"
                                data-tindak="<?= strtolower(esc((string)($tl['tindak_lanjut']??''))) ?>"
                                data-status="<?= esc($tl['status']??'') ?>"
                                data-menangani="<?= esc($m) ?>"
                                data-jb="<?= esc($tl['jenis_bimbingan']??'') ?>"
                                data-kelas="<?= esc($tl['kelas']??'') ?>">
                                <td style="color:var(--gray-400);font-weight:500"><?= $i+1 ?></td>
                                <td style="white-space:nowrap">
                                    <div style="font-weight:600;font-size:12.5px;color:var(--blue-900)"><?= $hariStr ?></div>
                                    <div style="font-size:11.5px;color:var(--gray-400)"><?= $tglStr ?></div>
                                </td>
                                <td>
                                    <div class="td-name"><?= esc($nama) ?></div>
                                    <div class="td-sub"><?= esc($tl['kelas']??'—') ?> · <?= esc($tl['nisn']??'—') ?></div>
                                </td>
                                <td>
                                    <?php if(!empty($jbArr)): ?>
                                        <div class="jb-wrap"><?php foreach($jbArr as $jb): $jb=trim($jb); ?><span class="jb-pill <?= $jb ?>"><?= $jbLabel[$jb]??esc($jb) ?></span><?php endforeach; ?></div>
                                    <?php else: ?><span style="color:var(--gray-400);font-size:12px">—</span><?php endif; ?>
                                </td>
                                <td><div class="masalah-cell"><?= nl2br(esc(mb_strimwidth($tl['masalah']??'',0,80,'...'))) ?></div></td>
                                <td><div class="tindak-cell"><?= nl2br(esc(mb_strimwidth($tl['tindak_lanjut']??'',0,90,'...'))) ?></div></td>
                                <td style="font-size:12.5px;color:var(--gray-700)"><?= esc($tl['ttd']??'—') ?></td>
                                <td><span class="badge <?= $mCls ?>"><?= esc($m) ?></span></td>
                                <td><span class="badge <?= $tl['status'] ?>"><?= $tl['status']==='selesai'?'Selesai':'Proses' ?></span></td>
                                <td>
                                    <div class="action-btns">
                                        <button class="btn-icon view" title="Detail" onclick="openDetail(<?= $tl['id'] ?>)"><i class="fa fa-eye"></i></button>
                                        <button class="btn-icon check" title="<?= $tl['status']==='proses'?'Tandai Selesai':'Tandai Proses' ?>" onclick="toggleStatus(<?= $tl['id'] ?>,'<?= $tl['status'] ?>')"><i class="fa fa-<?= $tl['status']==='proses'?'check':'rotate-left' ?>"></i></button>
                                        <button class="btn-icon edit" title="Edit" onclick="openEdit(<?= $tl['id'] ?>)"><i class="fa fa-pen"></i></button>
                                        <button class="btn-icon del" title="Hapus" onclick="openHapus(<?= $tl['id'] ?>,'<?= esc($nama,'js') ?>')"><i class="fa fa-trash"></i></button>
                                    </div>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
            <div class="info-bar" id="infoBar">Menampilkan <?= count($list_tindak_lanjut) ?> data tindak lanjut</div>
        </div>
    </div>
</div>

<script>
const BASE_URL = '<?= base_url() ?>';

// ── Data siswa dari PHP ──
const SISWA_DATA = <?= json_encode($siswaJs) ?>;
const AVATAR_COLORS = ['#1a56db','#ef4444','#f59e0b','#10b981','#8b5cf6','#ec4899','#06b6d4','#f97316'];

function getAvatarColor(nama){
    let h=0; for(let c of nama) h=(h+c.charCodeAt(0))%AVATAR_COLORS.length;
    return AVATAR_COLORS[h];
}
function getInitials(nama){
    return nama.trim().split(' ').map(w=>w[0]).join('').toUpperCase().slice(0,2);
}

// ── Render daftar siswa di dropdown ──
function renderSiswaList(prefix, query=''){
    const list = document.getElementById(prefix+'_siswa_list');
    const selectedId = document.getElementById(prefix+'_siswa_id').value;
    const filtered = query
        ? SISWA_DATA.filter(s => s.nama.toLowerCase().includes(query.toLowerCase()) || s.kelas.toLowerCase().includes(query.toLowerCase()) || s.nisn.includes(query))
        : SISWA_DATA;

    if(!filtered.length){
        list.innerHTML = '<div class="siswa-no-result"><i class="fa fa-user-slash" style="font-size:22px;display:block;margin-bottom:6px;color:var(--gray-200)"></i>Siswa tidak ditemukan</div>';
        return;
    }
    list.innerHTML = filtered.map(s => `
        <div class="siswa-option ${s.id == selectedId ? 'selected' : ''}"
             onclick="selectSiswa('${prefix}', ${s.id}, '${s.nama.replace(/'/g,"\\'")}', '${s.kelas}', '${s.nisn}')">
            <div class="siswa-opt-avatar" style="background:${getAvatarColor(s.nama)}">${getInitials(s.nama)}</div>
            <div>
                <div class="siswa-opt-name">${s.nama}</div>
                <div class="siswa-opt-kelas">${s.kelas} ${s.nisn ? '· NISN: '+s.nisn : ''}</div>
            </div>
        </div>
    `).join('');
}

function toggleSiswaDropdown(prefix){
    const dd = document.getElementById(prefix+'_siswa_dropdown');
    const isOpen = dd.classList.contains('show');
    closeAllSiswaDropdowns();
    if(!isOpen){
        dd.classList.add('show');
        renderSiswaList(prefix);
        setTimeout(()=>{ const si=document.getElementById(prefix+'_siswa_search'); if(si){si.value='';si.focus();} }, 100);
    }
}

function closeAllSiswaDropdowns(){
    document.querySelectorAll('.siswa-dropdown').forEach(d=>d.classList.remove('show'));
}

function filterSiswaOptions(prefix){
    const q = document.getElementById(prefix+'_siswa_search').value;
    renderSiswaList(prefix, q);
}

function selectSiswa(prefix, id, nama, kelas, nisn){
    document.getElementById(prefix+'_siswa_id').value = id;
    document.getElementById(prefix+'_siswa_display').value = nama+' — '+kelas;
    document.getElementById(prefix+'_siswa_display').classList.add('has-value');
    document.getElementById(prefix+'_siswa_clear').classList.add('show');
    // Update card
    const card = document.getElementById(prefix+'_siswa_card');
    document.getElementById(prefix+'_siswa_avatar').textContent = getInitials(nama);
    document.getElementById(prefix+'_siswa_avatar').style.background = getAvatarColor(nama);
    document.getElementById(prefix+'_siswa_name').textContent = nama;
    document.getElementById(prefix+'_siswa_kelas').textContent = kelas + (nisn ? ' · NISN: '+nisn : '');
    card.classList.add('show');
    closeAllSiswaDropdowns();
}

function clearSiswa(prefix){
    document.getElementById(prefix+'_siswa_id').value = '';
    document.getElementById(prefix+'_siswa_display').value = '';
    document.getElementById(prefix+'_siswa_display').classList.remove('has-value');
    document.getElementById(prefix+'_siswa_clear').classList.remove('show');
    document.getElementById(prefix+'_siswa_card').classList.remove('show');
}

// Tutup dropdown kalau klik di luar
document.addEventListener('click', function(e){
    if(!e.target.closest('.siswa-search-wrap')) closeAllSiswaDropdowns();
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

function openModal(id){document.getElementById(id).classList.add('show')}
function closeModal(id){
    document.getElementById(id).classList.remove('show');
    closeAllSiswaDropdowns();
}
document.querySelectorAll('.modal-overlay').forEach(el=>{
    el.addEventListener('click',function(e){if(e.target===this){this.classList.remove('show');closeAllSiswaDropdowns();}})
});

function appendTindak(text){
    const ta=document.getElementById('inputTindak');
    ta.value=ta.value?ta.value+'\n- '+text:'- '+text; ta.focus();
}

function filterData(){
    const q=document.getElementById('searchInput').value.toLowerCase();
    const st=document.getElementById('filterStatus').value;
    const mn=document.getElementById('filterMenangani').value;
    const jb=document.getElementById('filterJb').value;
    const kls=document.getElementById('filterKelas').value;
    let count=0;
    document.querySelectorAll('.tr-data').forEach(tr=>{
        const show=(!q||tr.dataset.nama.includes(q)||tr.dataset.masalah.includes(q)||tr.dataset.tindak.includes(q))
                 &&(!st||tr.dataset.status===st)&&(!mn||tr.dataset.menangani.includes(mn))
                 &&(!jb||tr.dataset.jb.includes(jb))&&(!kls||tr.dataset.kelas.startsWith(kls));
        tr.style.display=show?'':'none'; if(show)count++;
    });
    document.getElementById('infoBar').textContent='Menampilkan '+count+' data tindak lanjut';
}

function openDetail(id){
    openModal('modalDetail');
    document.getElementById('detailBody').innerHTML='<div style="text-align:center;padding:40px;color:var(--gray-400)"><i class="fa fa-spinner fa-spin" style="font-size:28px"></i></div>';
    fetch(BASE_URL+'tindak-lanjut/detail/'+id).then(r=>r.json()).then(res=>{
        if(!res.success){document.getElementById('detailBody').innerHTML='<p style="color:var(--danger);text-align:center">Data tidak ditemukan.</p>';return;}
        const d=res.data;
        const jbLabels={pribadi:'🧠 Pribadi',sosial:'🤝 Sosial',belajar:'📚 Belajar',karir:'💼 Karir'};
        const jbColors={pribadi:'#dbeafe',sosial:'#fce7f3',belajar:'#d1fae5',karir:'#ede9fe'};
        const jbText={pribadi:'#1d4ed8',sosial:'#9d174d',belajar:'#065f46',karir:'#5b21b6'};
        let jbHtml='—';
        if(d.jenis_bimbingan_arr&&d.jenis_bimbingan_arr.length)
            jbHtml=d.jenis_bimbingan_arr.map(j=>`<span style="display:inline-flex;padding:3px 10px;border-radius:20px;font-size:11px;font-weight:700;background:${jbColors[j]||'#f1f5f9'};color:${jbText[j]||'#475569'};margin:2px">${jbLabels[j]||j}</span>`).join('');
        const stBg=d.status==='selesai'?'#d1fae5':'#fef3c7',stCol=d.status==='selesai'?'#065f46':'#92400e';
        document.getElementById('detailBody').innerHTML=`
            <div class="detail-section"><div class="detail-section-title">Informasi Siswa</div>
                <div class="detail-grid">
                    <div class="detail-item"><span class="label">Nama Siswa</span><span class="value">${d.nama_siswa||'—'}</span></div>
                    <div class="detail-item"><span class="label">NISN</span><span class="value">${d.nisn||'—'}</span></div>
                    <div class="detail-item"><span class="label">Kelas</span><span class="value">${d.kelas||'—'}</span></div>
                    <div class="detail-item"><span class="label">Jenis Kelamin</span><span class="value">${d.jk==='L'?'Laki-laki':'Perempuan'}</span></div>
                    <div class="detail-item"><span class="label">No HP Ortu</span><span class="value">${d.no_hp_ortu||'—'}</span></div>
                    <div class="detail-item"><span class="label">Tanggal</span><span class="value">${formatTgl(d.tanggal)}</span></div>
                </div>
            </div>
            <div class="detail-section"><div class="detail-section-title">Jenis Bimbingan</div><div style="padding:8px 0">${jbHtml}</div></div>
            <div class="detail-section"><div class="detail-section-title">Masalah / Pelanggaran</div><div class="detail-text-box">${(d.masalah||'').replace(/\n/g,'<br>')}</div></div>
            <div class="detail-section"><div class="detail-section-title">Tindak Lanjut yang Diberikan</div><div class="detail-text-box">${(d.tindak_lanjut||'').replace(/\n/g,'<br>')}</div></div>
            <div class="detail-section"><div class="detail-section-title">Penanganan & Status</div>
                <div class="detail-grid">
                    <div class="detail-item"><span class="label">Yang Menangani</span><span class="value">${d.yang_menangani||'—'}</span></div>
                    <div class="detail-item"><span class="label">TTD / Paraf</span><span class="value">${d.ttd||'—'}</span></div>
                    <div class="detail-item"><span class="label">Status</span><span style="display:inline-flex;align-items:center;gap:4px;padding:4px 12px;border-radius:20px;font-size:12px;font-weight:700;background:${stBg};color:${stCol}">${d.status==='selesai'?'✓ Selesai':'⏳ Proses'}</span></div>
                </div>
            </div>`;
    });
}

function openEdit(id){
    fetch(BASE_URL+'tindak-lanjut/edit/'+id).then(r=>r.json()).then(res=>{
        if(!res.success){alert('Data tidak ditemukan.');return;}
        const d=res.data;
        // Set siswa searchable
        const siswa = SISWA_DATA.find(s=>s.id==d.siswa_id);
        if(siswa) selectSiswa('edit', siswa.id, siswa.nama, siswa.kelas, siswa.nisn||'');
        else clearSiswa('edit');
        document.getElementById('e_tanggal').value=d.tanggal;
        document.getElementById('e_masalah').value=d.masalah||'';
        document.getElementById('e_tindak').value=d.tindak_lanjut||'';
        document.getElementById('e_menangani').value=d.yang_menangani;
        document.getElementById('e_status').value=d.status;
        document.getElementById('e_ttd').value=d.ttd||'';
        ['pribadi','sosial','belajar','karir'].forEach(j=>{
            const cb=document.getElementById('ejb_'+j);
            if(cb) cb.checked=d.jenis_bimbingan_arr&&d.jenis_bimbingan_arr.includes(j);
        });
        document.getElementById('formEdit').action=BASE_URL+'tindak-lanjut/update/'+id;
        openModal('modalEdit');
    });
}

function toggleStatus(id,currentStatus){
    const newStatus=currentStatus==='proses'?'selesai':'proses';
    const fd=new FormData(); fd.append('status',newStatus); fd.append('<?= csrf_token() ?>','<?= csrf_hash() ?>');
    fetch(BASE_URL+'tindak-lanjut/status/'+id,{method:'POST',body:fd}).then(r=>r.json()).then(res=>{if(res.success)location.reload();});
}

function openHapus(id,nama){
    document.getElementById('hapusInfo').textContent=nama;
    document.getElementById('hapusLink').href=BASE_URL+'tindak-lanjut/hapus/'+id;
    openModal('modalHapus');
}

function formatTgl(str){
    if(!str)return'—';
    const d=new Date(str),months=['Jan','Feb','Mar','Apr','Mei','Jun','Jul','Ags','Sep','Okt','Nov','Des'],days=['Minggu','Senin','Selasa','Rabu','Kamis','Jumat','Sabtu'];
    return days[d.getDay()]+', '+d.getDate()+' '+months[d.getMonth()]+' '+d.getFullYear();
}

// Buka modal jika ada validation error
<?php if (session()->getFlashdata('errors')): ?>
openModal('modalTambah');
// Restore nilai siswa yang dipilih sebelumnya
<?php if(old('siswa_id')): ?>
(function(){
    const s=SISWA_DATA.find(x=>x.id==<?= old('siswa_id') ?>);
    if(s) selectSiswa('tambah',s.id,s.nama,s.kelas,s.nisn||'');
})();
<?php endif; ?>
<?php endif; ?>
</script>
</body>
</html>