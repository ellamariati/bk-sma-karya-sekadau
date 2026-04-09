<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Siswa — BK SMA Karya Sekadau</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800&family=DM+Sans:ital,wght@0,300;0,400;0,500;1,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        :root {
            --blue-900:#0a1628;--blue-800:#0d2045;--blue-700:#0f2d6b;--blue-600:#1340a0;
            --blue-500:#1a56db;--blue-400:#3b82f6;--blue-300:#93c5fd;--blue-200:#bfdbfe;
            --blue-100:#dbeafe;--blue-50:#eff6ff;--white:#ffffff;
            --gray-50:#f8fafc;--gray-100:#f1f5f9;--gray-200:#e2e8f0;
            --gray-400:#94a3b8;--gray-600:#475569;--gray-800:#1e293b;
            --success:#10b981;--warning:#f59e0b;--danger:#ef4444;
            --sidebar-w:270px;--navbar-h:72px;--radius:16px;--radius-sm:10px;
            --shadow:0 4px 24px rgba(19,64,160,.10);--shadow-lg:0 12px 40px rgba(19,64,160,.18);
            --transition:all .3s cubic-bezier(.4,0,.2,1);
        }
        *,*::before,*::after{box-sizing:border-box;margin:0;padding:0}
        body{font-family:'DM Sans',sans-serif;background:var(--gray-50);color:var(--gray-800);min-height:100vh;display:flex;overflow-x:hidden}
        .sidebar{width:var(--sidebar-w);min-height:100vh;background:linear-gradient(175deg,var(--blue-900) 0%,var(--blue-800) 50%,var(--blue-700) 100%);position:fixed;left:0;top:0;bottom:0;z-index:100;display:flex;flex-direction:column;box-shadow:4px 0 32px rgba(10,22,40,.25);transition:var(--transition);overflow-y:auto;overflow-x:hidden;}
        .sidebar-brand{padding:28px 24px 22px;display:flex;align-items:center;gap:14px;border-bottom:1px solid rgba(255,255,255,.08)}
        .brand-icon{width:46px;height:46px;background:linear-gradient(135deg,var(--blue-500),var(--blue-400));border-radius:13px;display:flex;align-items:center;justify-content:center;font-size:20px;color:white;box-shadow:0 4px 16px rgba(26,86,219,.5);flex-shrink:0}
        .brand-text .brand-title{font-family:'Outfit',sans-serif;font-weight:700;font-size:17px;color:white;line-height:1.1}
        .brand-text .brand-sub{font-size:11px;color:var(--blue-300);font-weight:400;margin-top:2px}
        .sidebar-section{padding:18px 14px 6px}
        .sidebar-section-label{font-size:10px;font-weight:600;text-transform:uppercase;letter-spacing:1.5px;color:rgba(147,197,253,.5);padding:0 10px;margin-bottom:6px}
        .nav-item{display:flex;align-items:center;gap:12px;padding:11px 14px;border-radius:var(--radius-sm);color:rgba(255,255,255,.65);text-decoration:none;font-size:14px;font-weight:400;transition:var(--transition);cursor:pointer;position:relative;margin-bottom:2px}
        .nav-item:hover{background:rgba(255,255,255,.08);color:white}
        .nav-item.active{background:linear-gradient(90deg,rgba(26,86,219,.6),rgba(26,86,219,.2));color:white;font-weight:500;box-shadow:inset 0 0 0 1px rgba(59,130,246,.3)}
        .nav-item.active::before{content:'';position:absolute;left:0;top:20%;bottom:20%;width:3px;background:var(--blue-400);border-radius:0 4px 4px 0}
        .nav-item i{width:20px;font-size:15px;text-align:center;flex-shrink:0}
        .nav-badge{margin-left:auto;background:var(--danger);color:white;font-size:10px;font-weight:600;padding:2px 7px;border-radius:20px}
        .nav-badge.warn{background:var(--warning);color:#92400e}
        .sidebar-footer{margin-top:auto;padding:16px 14px;border-top:1px solid rgba(255,255,255,.08)}
        .user-card{display:flex;align-items:center;gap:12px;padding:10px 12px;border-radius:var(--radius-sm);background:rgba(255,255,255,.07);cursor:pointer;transition:var(--transition)}
        .user-card:hover{background:rgba(255,255,255,.12)}
        .user-avatar{width:38px;height:38px;border-radius:50%;background:linear-gradient(135deg,var(--blue-500),#60a5fa);display:flex;align-items:center;justify-content:center;font-family:'Outfit',sans-serif;font-weight:700;font-size:15px;color:white;flex-shrink:0}
        .user-info .user-name{font-size:13px;font-weight:500;color:white}
        .user-info .user-role{font-size:11px;color:var(--blue-300);margin-top:1px}
        .user-card .logout-icon{margin-left:auto;color:rgba(255,255,255,.4);font-size:13px}
        .user-card:hover .logout-icon{color:var(--danger)}
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
        .btn-primary{padding:10px 20px;border-radius:var(--radius-sm);border:none;background:var(--blue-500);color:white;font-family:'DM Sans',sans-serif;font-size:13.5px;font-weight:500;cursor:pointer;transition:var(--transition);display:flex;align-items:center;gap:8px;text-decoration:none}
        .btn-primary:hover{background:var(--blue-600);box-shadow:0 4px 14px rgba(26,86,219,.4)}
        .btn-outline{padding:10px 20px;border-radius:var(--radius-sm);border:1.5px solid var(--gray-200);background:white;color:var(--gray-600);font-family:'DM Sans',sans-serif;font-size:13.5px;font-weight:500;cursor:pointer;transition:var(--transition);display:flex;align-items:center;gap:8px;text-decoration:none}
        .btn-outline:hover{border-color:var(--blue-400);color:var(--blue-600);background:var(--blue-50)}
        .stats-grid{display:grid;grid-template-columns:repeat(4,1fr);gap:18px;margin-bottom:24px}
        .stat-card{background:white;border-radius:var(--radius);padding:20px 22px;box-shadow:var(--shadow);display:flex;align-items:center;gap:16px;transition:var(--transition);border-left:4px solid transparent;animation:fadeInUp .4s ease both}
        .stat-card:hover{transform:translateY(-2px);box-shadow:var(--shadow-lg)}
        .stat-card.blue{border-left-color:var(--blue-500)}.stat-card.green{border-left-color:var(--success)}
        .stat-card.yellow{border-left-color:var(--warning)}.stat-card.purple{border-left-color:#8b5cf6}
        .stat-ico{width:46px;height:46px;border-radius:12px;display:flex;align-items:center;justify-content:center;font-size:18px;flex-shrink:0}
        .stat-card.blue .stat-ico{background:var(--blue-100);color:var(--blue-500)}
        .stat-card.green .stat-ico{background:#d1fae5;color:#059669}
        .stat-card.yellow .stat-ico{background:#fef3c7;color:#d97706}
        .stat-card.purple .stat-ico{background:#ede9fe;color:#7c3aed}
        .stat-num{font-family:'Outfit',sans-serif;font-size:30px;font-weight:800;color:var(--blue-900);line-height:1;letter-spacing:-1px}
        .stat-lbl{font-size:12px;color:var(--gray-400);margin-top:3px;font-weight:500}
        .filter-bar{background:white;border-radius:var(--radius);padding:16px 22px;box-shadow:var(--shadow);display:flex;align-items:center;gap:12px;margin-bottom:20px;flex-wrap:wrap}
        .filter-search{flex:1;min-width:220px;position:relative}
        .filter-search input{width:100%;padding:9px 16px 9px 38px;border-radius:var(--radius-sm);border:1.5px solid var(--gray-200);background:var(--gray-50);font-family:'DM Sans',sans-serif;font-size:13px;outline:none;transition:var(--transition)}
        .filter-search input:focus{border-color:var(--blue-400);background:white}
        .filter-search i{position:absolute;left:12px;top:50%;transform:translateY(-50%);color:var(--gray-400);font-size:13px}
        .filter-select{padding:9px 14px;border-radius:var(--radius-sm);border:1.5px solid var(--gray-200);background:white;font-family:'DM Sans',sans-serif;font-size:13px;color:var(--gray-700);outline:none;cursor:pointer}
        .filter-select:focus{border-color:var(--blue-400)}
        .filter-divider{width:1px;height:28px;background:var(--gray-200)}
        .view-toggle{display:flex;gap:4px}
        .view-btn{width:36px;height:36px;border-radius:8px;border:1.5px solid var(--gray-200);background:white;display:flex;align-items:center;justify-content:center;cursor:pointer;color:var(--gray-400);font-size:14px;transition:var(--transition)}
        .view-btn.active,.view-btn:hover{background:var(--blue-500);border-color:var(--blue-500);color:white}
        /* Alert */
        .alert{padding:12px 18px;border-radius:var(--radius-sm);margin-bottom:20px;display:flex;align-items:center;gap:10px;font-size:13.5px;font-weight:500}
        .alert-success{background:#d1fae5;color:#065f46;border:1px solid #6ee7b7}
        .alert-error{background:#fee2e2;color:#991b1b;border:1px solid #fca5a5}
        .alert-close{margin-left:auto;cursor:pointer;font-size:14px;opacity:.6}
        .alert-close:hover{opacity:1}
        /* Grid */
        .siswa-grid{display:grid;grid-template-columns:repeat(auto-fill,minmax(240px,1fr));gap:18px;margin-bottom:24px}
        .siswa-card{background:white;border-radius:var(--radius);box-shadow:var(--shadow);overflow:hidden;transition:var(--transition);border:1.5px solid transparent;animation:fadeInUp .4s ease both}
        .siswa-card:hover{transform:translateY(-4px);box-shadow:var(--shadow-lg);border-color:var(--blue-200)}
        .siswa-card-top{padding:22px 20px 16px;display:flex;flex-direction:column;align-items:center;gap:10px;background:linear-gradient(180deg,var(--blue-50) 0%,white 100%);position:relative}
        .rank-badge{position:absolute;top:12px;right:12px;font-size:10px;font-weight:700;padding:3px 8px;border-radius:20px}
        .siswa-avatar-lg{width:68px;height:68px;border-radius:50%;display:flex;align-items:center;justify-content:center;font-family:'Outfit',sans-serif;font-weight:800;font-size:22px;color:white;box-shadow:0 4px 14px rgba(26,86,219,.3)}
        .siswa-card-name{font-family:'Outfit',sans-serif;font-size:15px;font-weight:600;color:var(--blue-900);text-align:center;line-height:1.3}
        .siswa-card-nisn{font-size:11.5px;color:var(--gray-400);margin-top:-4px}
        .siswa-card-body{padding:14px 20px 16px}
        .siswa-card-info{display:flex;flex-direction:column;gap:8px}
        .siswa-info-row{display:flex;align-items:center;gap:8px;font-size:12.5px;color:var(--gray-600)}
        .siswa-info-row i{color:var(--blue-400);font-size:12px;width:14px;text-align:center}
        .siswa-card-footer{padding:12px 20px;border-top:1px solid var(--gray-100);display:flex;align-items:center;justify-content:space-between}
        .pelanggaran-count{display:flex;align-items:center;gap:5px;font-size:12px;font-weight:600}
        .pelanggaran-count.danger{color:var(--danger)}.pelanggaran-count.warn{color:var(--warning)}.pelanggaran-count.safe{color:var(--success)}
        .card-actions-row{display:flex;gap:6px}
        .btn-icon{width:30px;height:30px;border-radius:7px;border:none;cursor:pointer;display:flex;align-items:center;justify-content:center;font-size:12px;transition:var(--transition)}
        .btn-icon.view{background:var(--blue-100);color:var(--blue-600)}.btn-icon.edit{background:#fef3c7;color:#b45309}.btn-icon.del{background:#fee2e2;color:#dc2626}
        .btn-icon:hover{opacity:.8;transform:scale(1.08)}
        /* Table */
        .table-card{background:white;border-radius:var(--radius);box-shadow:var(--shadow);overflow:hidden;margin-bottom:24px;display:none}
        .table-card.show{display:block}
        .siswa-grid-wrap{display:block}.siswa-grid-wrap.hide{display:none}
        .table-wrap{overflow-x:auto}
        table{width:100%;border-collapse:collapse;font-size:13px}
        thead th{padding:13px 16px;text-align:left;font-size:11px;font-weight:600;text-transform:uppercase;letter-spacing:.6px;color:var(--gray-400);background:var(--gray-50);border-bottom:1px solid var(--gray-200);white-space:nowrap}
        tbody td{padding:13px 16px;border-bottom:1px solid var(--gray-100);color:var(--gray-800);vertical-align:middle}
        tbody tr:last-child td{border-bottom:none}
        tbody tr:hover{background:var(--blue-50)}
        .td-student{display:flex;align-items:center;gap:11px}
        .td-avatar{width:36px;height:36px;border-radius:50%;display:flex;align-items:center;justify-content:center;font-size:13px;font-weight:700;color:white;flex-shrink:0}
        .td-name{font-weight:600;color:var(--blue-900);font-size:13.5px}
        .td-nisn{font-size:11.5px;color:var(--gray-400);margin-top:1px}
        .badge{display:inline-flex;align-items:center;gap:4px;padding:4px 10px;border-radius:20px;font-size:11px;font-weight:600;white-space:nowrap}
        .badge::before{content:'';width:5px;height:5px;border-radius:50%;background:currentColor}
        .badge.laki{background:#dbeafe;color:#1d4ed8}.badge.perempuan{background:#fce7f3;color:#be185d}
        .badge.mipa{background:#d1fae5;color:#065f46}.badge.ips{background:#fef3c7;color:#92400e}
        .poin-bar-wrap{display:flex;align-items:center;gap:8px}
        .poin-bar{flex:1;height:6px;background:var(--gray-100);border-radius:10px;overflow:hidden;min-width:60px}
        .poin-bar-fill{height:100%;border-radius:10px}
        .poin-num{font-size:12px;font-weight:700;min-width:28px}
        .poin-num.safe{color:var(--success)}.poin-num.warn{color:var(--warning)}.poin-num.danger{color:var(--danger)}
        .action-btns{display:flex;gap:6px}
        .pagination-bar{display:flex;align-items:center;justify-content:space-between;padding:14px 22px;border-top:1px solid var(--gray-100);font-size:12.5px;color:var(--gray-400)}
        /* Modal */
        .modal-overlay{display:none;position:fixed;inset:0;background:rgba(10,22,40,.5);z-index:300;align-items:center;justify-content:center}
        .modal-overlay.show{display:flex}
        .modal{background:white;border-radius:var(--radius);width:100%;max-width:580px;max-height:90vh;overflow-y:auto;box-shadow:0 24px 80px rgba(10,22,40,.3);animation:modalIn .25s ease}
        @keyframes modalIn{from{opacity:0;transform:scale(.95) translateY(10px)}to{opacity:1;transform:scale(1) translateY(0)}}
        .modal-header{padding:22px 26px 18px;background:linear-gradient(135deg,var(--blue-800),var(--blue-600));display:flex;align-items:center;justify-content:space-between}
        .modal-header h2{font-family:'Outfit',sans-serif;font-size:17px;font-weight:700;color:white;display:flex;align-items:center;gap:10px}
        .modal-close{width:32px;height:32px;border-radius:8px;border:none;background:rgba(255,255,255,.15);color:white;cursor:pointer;font-size:15px;display:flex;align-items:center;justify-content:center}
        .modal-close:hover{background:rgba(255,255,255,.25)}
        .modal-body{padding:24px 26px}
        .form-row{display:grid;grid-template-columns:1fr 1fr;gap:16px;margin-bottom:16px}
        .form-row.full{grid-template-columns:1fr}
        .form-group{display:flex;flex-direction:column;gap:6px}
        .form-label{font-size:12.5px;font-weight:600;color:var(--gray-700)}
        .form-input,.form-select{padding:10px 14px;border-radius:var(--radius-sm);border:1.5px solid var(--gray-200);background:var(--gray-50);font-family:'DM Sans',sans-serif;font-size:13.5px;color:var(--gray-800);outline:none;transition:var(--transition)}
        .form-input:focus,.form-select:focus{border-color:var(--blue-400);background:white;box-shadow:0 0 0 3px rgba(59,130,246,.1)}
        .form-error{font-size:11.5px;color:var(--danger);margin-top:2px}
        .modal-footer{padding:16px 26px;border-top:1px solid var(--gray-100);display:flex;justify-content:flex-end;gap:10px}
        .btn-cancel{padding:10px 20px;border-radius:var(--radius-sm);border:1.5px solid var(--gray-200);background:white;font-family:'DM Sans',sans-serif;font-size:13px;color:var(--gray-600);cursor:pointer}
        .btn-cancel:hover{background:var(--gray-50)}
        /* Modal Hapus */
        .modal-hapus .modal-body{text-align:center;padding:32px 26px}
        .modal-hapus .hapus-icon{font-size:48px;color:var(--danger);margin-bottom:12px}
        .modal-hapus h3{font-family:'Outfit',sans-serif;font-size:18px;font-weight:700;color:var(--blue-900);margin-bottom:8px}
        .modal-hapus p{font-size:14px;color:var(--gray-600)}
        .btn-danger{padding:10px 20px;border-radius:var(--radius-sm);border:none;background:var(--danger);color:white;font-family:'DM Sans',sans-serif;font-size:13.5px;font-weight:500;cursor:pointer}
        .btn-danger:hover{background:#dc2626}
        /* Modal Import */
        .import-zone{border:2px dashed var(--gray-200);border-radius:var(--radius-sm);padding:32px;text-align:center;cursor:pointer;transition:var(--transition)}
        .import-zone:hover{border-color:var(--blue-400);background:var(--blue-50)}
        .import-zone i{font-size:36px;color:var(--blue-400);margin-bottom:10px;display:block}
        .import-zone p{font-size:13px;color:var(--gray-600)}
        .import-zone small{font-size:11px;color:var(--gray-400)}
        /* Empty state */
        .empty-state{text-align:center;padding:60px 20px;color:var(--gray-400)}
        .empty-state i{font-size:48px;color:var(--gray-200);margin-bottom:14px;display:block}
        /* Toast */
        .toast-container{position:fixed;bottom:24px;right:24px;z-index:500;display:flex;flex-direction:column;gap:10px}
        .toast{padding:14px 20px;border-radius:var(--radius-sm);box-shadow:var(--shadow-lg);font-size:13.5px;font-weight:500;display:flex;align-items:center;gap:10px;animation:toastIn .3s ease;min-width:280px;max-width:380px}
        .toast-success{background:white;border-left:4px solid var(--success);color:#065f46}
        .toast-error{background:white;border-left:4px solid var(--danger);color:#991b1b}
        @keyframes toastIn{from{opacity:0;transform:translateX(40px)}to{opacity:1;transform:translateX(0)}}
        @keyframes toastOut{from{opacity:1;transform:translateX(0)}to{opacity:0;transform:translateX(40px)}}
        .overlay{display:none;position:fixed;inset:0;background:rgba(10,22,40,.4);z-index:90}.overlay.show{display:block}
        @keyframes fadeInUp{from{opacity:0;transform:translateY(16px)}to{opacity:1;transform:translateY(0)}}
        ::-webkit-scrollbar{width:6px;height:6px}::-webkit-scrollbar-track{background:transparent}
        ::-webkit-scrollbar-thumb{background:var(--gray-200);border-radius:10px}
        @media(max-width:1200px){.stats-grid{grid-template-columns:repeat(2,1fr)}}
        @media(max-width:768px){:root{--sidebar-w:0px}.sidebar{transform:translateX(-270px);width:270px}.sidebar.open{transform:translateX(0)}.main-wrapper{margin-left:0}.navbar-hamburger{display:flex}.navbar{padding:0 18px}.page-content{padding:20px 18px}.stats-grid{grid-template-columns:1fr 1fr}.page-header{flex-direction:column}.form-row{grid-template-columns:1fr}}
        @media(max-width:480px){.stats-grid{grid-template-columns:1fr}}
    </style>
</head>
<body>

<div class="overlay" id="overlay" onclick="closeSidebar()"></div>

<!-- Toast Container -->
<div class="toast-container" id="toastContainer"></div>

<!-- ════ MODAL TAMBAH SISWA ════ -->
<div class="modal-overlay" id="modalTambah">
    <div class="modal">
        <div class="modal-header">
            <h2><i class="fa fa-user-plus"></i> Tambah Data Siswa</h2>
            <button class="modal-close" onclick="closeModal('modalTambah')"><i class="fa fa-times"></i></button>
        </div>
        <form action="<?= base_url('siswa/simpan') ?>" method="POST" id="formTambah">
            <?= csrf_field() ?>
            <div class="modal-body">
                <?php if (session()->getFlashdata('errors')): ?>
                    <?php foreach (session()->getFlashdata('errors') as $err): ?>
                        <div class="alert alert-error"><i class="fa fa-circle-xmark"></i><?= esc($err) ?><span class="alert-close" onclick="this.parentElement.remove()">✕</span></div>
                    <?php endforeach; ?>
                <?php endif; ?>
                <div class="form-row">
                    <div class="form-group">
                        <label class="form-label">NISN <span style="color:var(--danger)">*</span></label>
                        <input type="text" name="nisn" class="form-input" placeholder="Contoh: 0041234567" value="<?= old('nisn') ?>" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label">NIS</label>
                        <input type="text" name="nis" class="form-input" placeholder="Contoh: 2024001" value="<?= old('nis') ?>">
                    </div>
                </div>
                <div class="form-row full">
                    <div class="form-group">
                        <label class="form-label">Nama Lengkap <span style="color:var(--danger)">*</span></label>
                        <input type="text" name="nama" class="form-input" placeholder="Masukkan nama lengkap" value="<?= old('nama') ?>" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label class="form-label">Jenis Kelamin <span style="color:var(--danger)">*</span></label>
                        <select name="jk" class="form-select" required>
                            <option value="">-- Pilih --</option>
                            <option value="L" <?= old('jk')=='L'?'selected':'' ?>>Laki-laki</option>
                            <option value="P" <?= old('jk')=='P'?'selected':'' ?>>Perempuan</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-label">No. HP Orang Tua / Wali</label>
                        <input type="text" name="no_hp_ortu" class="form-input" placeholder="Contoh: 08123456789" value="<?= old('no_hp_ortu') ?>">
                    </div>
                </div>
                <div class="form-row full">
                    <div class="form-group">
                        <label class="form-label">Kelas <span style="color:var(--danger)">*</span></label>
                        <select name="kelas" class="form-select" required>
                            <option value="">-- Pilih Kelas --</option>
                            <optgroup label="── Kelas X ──">
                                <option value="X A" <?= old('kelas')=='X A'?'selected':'' ?>>X A (MIPA 1)</option>
                                <option value="X B" <?= old('kelas')=='X B'?'selected':'' ?>>X B (MIPA 2)</option>
                                <option value="X C" <?= old('kelas')=='X C'?'selected':'' ?>>X C (IPS 1)</option>
                                <option value="X D" <?= old('kelas')=='X D'?'selected':'' ?>>X D (IPS 2)</option>
                                <option value="X E" <?= old('kelas')=='X E'?'selected':'' ?>>X E (IPS 3)</option>
                                <option value="X F" <?= old('kelas')=='X F'?'selected':'' ?>>X F (IPS 4)</option>
                            </optgroup>
                            <optgroup label="── Kelas XI ──">
                                <option value="XI A" <?= old('kelas')=='XI A'?'selected':'' ?>>XI A (MIPA 1)</option>
                                <option value="XI B" <?= old('kelas')=='XI B'?'selected':'' ?>>XI B (MIPA 2)</option>
                                <option value="XI C" <?= old('kelas')=='XI C'?'selected':'' ?>>XI C (IPS 1)</option>
                                <option value="XI D" <?= old('kelas')=='XI D'?'selected':'' ?>>XI D (IPS 2)</option>
                                <option value="XI E" <?= old('kelas')=='XI E'?'selected':'' ?>>XI E (IPS 3)</option>
                                <option value="XI F" <?= old('kelas')=='XI F'?'selected':'' ?>>XI F (IPS 4)</option>
                            </optgroup>
                            <optgroup label="── Kelas XII ──">
                                <option value="XII A" <?= old('kelas')=='XII A'?'selected':'' ?>>XII A (MIPA 1)</option>
                                <option value="XII B" <?= old('kelas')=='XII B'?'selected':'' ?>>XII B (MIPA 2)</option>
                                <option value="XII C" <?= old('kelas')=='XII C'?'selected':'' ?>>XII C (IPS 1)</option>
                                <option value="XII D" <?= old('kelas')=='XII D'?'selected':'' ?>>XII D (IPS 2)</option>
                                <option value="XII E" <?= old('kelas')=='XII E'?'selected':'' ?>>XII E (IPS 3)</option>
                                <option value="XII F" <?= old('kelas')=='XII F'?'selected':'' ?>>XII F (IPS 4)</option>
                            </optgroup>
                        </select>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn-cancel" onclick="closeModal('modalTambah')">Batal</button>
                <button type="submit" class="btn-primary"><i class="fa fa-save"></i> Simpan Data</button>
            </div>
        </form>
    </div>
</div>

<!-- ════ MODAL EDIT SISWA ════ -->
<div class="modal-overlay" id="modalEdit">
    <div class="modal">
        <div class="modal-header">
            <h2><i class="fa fa-pen-to-square"></i> Edit Data Siswa</h2>
            <button class="modal-close" onclick="closeModal('modalEdit')"><i class="fa fa-times"></i></button>
        </div>
        <form id="formEdit" method="POST">
            <?= csrf_field() ?>
            <div class="modal-body">
                <div class="form-row">
                    <div class="form-group">
                        <label class="form-label">NISN <span style="color:var(--danger)">*</span></label>
                        <input type="text" name="nisn" id="edit_nisn" class="form-input" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Jenis Kelamin</label>
                        <select name="jk" id="edit_jk" class="form-select">
                            <option value="L">Laki-laki</option>
                            <option value="P">Perempuan</option>
                        </select>
                    </div>
                </div>
                <div class="form-row full">
                    <div class="form-group">
                        <label class="form-label">Nama Lengkap <span style="color:var(--danger)">*</span></label>
                        <input type="text" name="nama" id="edit_nama" class="form-input" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label class="form-label">Kelas <span style="color:var(--danger)">*</span></label>
                        <select name="kelas" id="edit_kelas" class="form-select" required>
                            <option value="">-- Pilih Kelas --</option>
                            <optgroup label="── Kelas X ──">
                                <option value="X A">X A (MIPA 1)</option><option value="X B">X B (MIPA 2)</option>
                                <option value="X C">X C (IPS 1)</option><option value="X D">X D (IPS 2)</option>
                                <option value="X E">X E (IPS 3)</option><option value="X F">X F (IPS 4)</option>
                            </optgroup>
                            <optgroup label="── Kelas XI ──">
                                <option value="XI A">XI A (MIPA 1)</option><option value="XI B">XI B (MIPA 2)</option>
                                <option value="XI C">XI C (IPS 1)</option><option value="XI D">XI D (IPS 2)</option>
                                <option value="XI E">XI E (IPS 3)</option><option value="XI F">XI F (IPS 4)</option>
                            </optgroup>
                            <optgroup label="── Kelas XII ──">
                                <option value="XII A">XII A (MIPA 1)</option><option value="XII B">XII B (MIPA 2)</option>
                                <option value="XII C">XII C (IPS 1)</option><option value="XII D">XII D (IPS 2)</option>
                                <option value="XII E">XII E (IPS 3)</option><option value="XII F">XII F (IPS 4)</option>
                            </optgroup>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-label">No. HP Orang Tua / Wali</label>
                        <input type="text" name="no_hp_ortu" id="edit_hp" class="form-input">
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

<!-- ════ MODAL HAPUS ════ -->
<div class="modal-overlay" id="modalHapus">
    <div class="modal modal-hapus" style="max-width:420px">
        <div class="modal-body" style="text-align:center;padding:36px 26px">
            <div style="font-size:52px;color:var(--danger);margin-bottom:12px"><i class="fa fa-trash-can"></i></div>
            <h3 style="font-family:'Outfit',sans-serif;font-size:18px;font-weight:700;color:var(--blue-900);margin-bottom:8px">Hapus Data Siswa?</h3>
            <p style="font-size:14px;color:var(--gray-600);margin-bottom:20px">Data <strong id="hapusNama">—</strong> akan dihapus permanen dan tidak dapat dikembalikan.</p>
            <div style="display:flex;gap:10px;justify-content:center">
                <button class="btn-cancel" onclick="closeModal('modalHapus')">Batal</button>
                <a id="hapusLink" href="#" class="btn-danger" style="padding:10px 24px;border-radius:var(--radius-sm);text-decoration:none;font-size:13.5px;font-weight:500">
                    <i class="fa fa-trash"></i> Ya, Hapus
                </a>
            </div>
        </div>
    </div>
</div>

<!-- ════ MODAL IMPORT ════ -->
<div class="modal-overlay" id="modalImport">
    <div class="modal" style="max-width:480px">
        <div class="modal-header">
            <h2><i class="fa fa-file-import"></i> Import Data Siswa</h2>
            <button class="modal-close" onclick="closeModal('modalImport')"><i class="fa fa-times"></i></button>
        </div>
        <form action="<?= base_url('siswa/import') ?>" method="POST" enctype="multipart/form-data">
            <?= csrf_field() ?>
            <div class="modal-body">
                <div class="import-zone" onclick="document.getElementById('fileCSV').click()">
                    <i class="fa fa-file-csv"></i>
                    <p>Klik untuk pilih file CSV</p>
                    <small>Format: No, NISN, Nama, Kelas, Jurusan, JK, No HP Ortu</small>
                </div>
                <input type="file" name="file_csv" id="fileCSV" accept=".csv" style="display:none" onchange="showFileName(this)">
                <p id="fileNameDisplay" style="margin-top:10px;font-size:13px;color:var(--gray-600);text-align:center"></p>
                <div style="margin-top:16px;padding:12px 16px;background:var(--blue-50);border-radius:var(--radius-sm);font-size:12px;color:var(--gray-600)">
                    <strong>Format CSV:</strong><br>
                    No | NISN | Nama | Kelas | Jurusan | JK (L/P) | No HP Ortu<br>
                    <em style="color:var(--gray-400)">* Baris pertama = header (dilewati otomatis)</em>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn-cancel" onclick="closeModal('modalImport')">Batal</button>
                <button type="submit" class="btn-primary"><i class="fa fa-upload"></i> Upload & Import</button>
            </div>
        </form>
    </div>
</div>

<!-- ════ SIDEBAR ════ -->
<aside class="sidebar" id="sidebar">
    <div class="sidebar-brand">
        <div class="brand-icon" style="background:white;padding:3px;border-radius:13px;overflow:hidden;">
            <img src="<?= base_url('img/logo_sma.png') ?>" 
                alt="Logo SMA Karya Sekadau" 
                style="width:40px;height:40px;object-fit:contain;display:block;">
        </div>
        <div class="brand-text">
            <div class="brand-title">BK SMA Karya Sekadau</div>
            <div class="brand-sub">Bimbingan &amp; Konseling</div>
        </div>
    </div>
    <div class="sidebar-section">
        <div class="sidebar-section-label">Menu Utama</div>
        <a class="nav-item <?= (uri_string()==''||uri_string()=='dashboard')?'active':'' ?>" href="<?= base_url('/') ?>">
            <i class="fa fa-gauge-high"></i> Dashboard
        </a>
        <a class="nav-item <?= str_starts_with(uri_string(),'pelanggaran')?'active':'' ?>" href="<?= base_url('pelanggaran') ?>">
            <i class="fa fa-triangle-exclamation"></i> Data Pelanggaran
            <span class="nav-badge"><?= $stats['baru'] ?? 0 ?></span>
        </a>
        <a class="nav-item <?= str_starts_with(uri_string(),'siswa')?'active':'' ?>" href="<?= base_url('siswa') ?>">
            <i class="fa fa-users"></i> Data Siswa
        </a>
        <a class="nav-item <?= str_starts_with(uri_string(),'tindak-lanjut')?'active':'' ?>" href="<?= base_url('tindak-lanjut') ?>">
            <i class="fa fa-list-check"></i> Tindak Lanjut
        </a>
        <a class="nav-item <?= str_starts_with(uri_string(),'buku-kunjungan')?'active':'' ?>" href="<?= base_url('buku-kunjungan') ?>">
            <i class="fa fa-book-open"></i> Buku Kunjungan
        </a>
    </div>
    <div class="sidebar-section">
        <div class="sidebar-section-label">Konseling</div>
        <a class="nav-item <?= str_starts_with(uri_string(),'jadwal')?'active':'' ?>" href="<?= base_url('jadwal') ?>">
            <i class="fa fa-calendar-check"></i> Jadwal Konseling <span class="nav-badge warn">3</span>
        </a>
        <a class="nav-item <?= str_starts_with(uri_string(),'sesi-bimbingan')?'active':'' ?>" href="<?= base_url('sesi-bimbingan') ?>">
            <i class="fa fa-comments"></i> Sesi Bimbingan
        </a>
        <a class="nav-item <?= str_starts_with(uri_string(),'rekap-bimbingan')?'active':'' ?>" href="<?= base_url('rekap-bimbingan') ?>">
            <i class="fa fa-chart-bar"></i> Rekap Bimbingan
        </a>
    </div>
    <div class="sidebar-section">
        <div class="sidebar-section-label">Pengelolaan</div>
        <a class="nav-item <?= str_starts_with(uri_string(),'laporan')?'active':'' ?>" href="<?= base_url('laporan') ?>">
            <i class="fa fa-file-lines"></i> Laporan &amp; Rekap
        </a>
        <a class="nav-item <?= str_starts_with(uri_string(),'kategori-pelanggaran')?'active':'' ?>" href="<?= base_url('kategori-pelanggaran') ?>">
            <i class="fa fa-scale-balanced"></i> Kategori Pelanggaran
        </a>
        <a class="nav-item <?= str_starts_with(uri_string(),'surat-dokumen')?'active':'' ?>" href="<?= base_url('surat-dokumen') ?>">
            <i class="fa fa-file-signature"></i> Surat &amp; Dokumen
        </a>
        <a class="nav-item <?= str_starts_with(uri_string(),'notifikasi')?'active':'' ?>" href="<?= base_url('notifikasi') ?>">
            <i class="fa fa-bell"></i> Notifikasi <span class="nav-badge"><?= $stats['baru'] ?? 0 ?></span>
        </a>
    </div>
    <div class="sidebar-section">
        <div class="sidebar-section-label">Sistem</div>
        <a class="nav-item <?= str_starts_with(uri_string(),'guru-bk')?'active':'' ?>" href="<?= base_url('guru-bk') ?>">
            <i class="fa fa-chalkboard-user"></i> Data Guru BK
        </a>
        <a class="nav-item <?= str_starts_with(uri_string(),'manajemen-user')?'active':'' ?>" href="<?= base_url('manajemen-user') ?>">
            <i class="fa fa-users-gear"></i> Manajemen User
        </a>
        <a class="nav-item <?= str_starts_with(uri_string(),'pengaturan')?'active':'' ?>" href="<?= base_url('pengaturan') ?>">
            <i class="fa fa-gear"></i> Pengaturan
        </a>
        <a class="nav-item <?= str_starts_with(uri_string(),'bantuan')?'active':'' ?>" href="<?= base_url('bantuan') ?>">
            <i class="fa fa-circle-question"></i> Bantuan
        </a>
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
        <div class="navbar-search"><i class="fa fa-magnifying-glass"></i><input type="text" placeholder="Cari siswa, pelanggaran..."></div>
        <div class="navbar-actions">
            <button class="nav-action-btn"><i class="fa fa-bell"></i><span class="notif-dot"></span></button>
            <button class="nav-action-btn"><i class="fa fa-envelope"></i></button>
            <button class="nav-action-btn"><i class="fa fa-file-arrow-down"></i></button>
            <button class="nav-action-btn" onclick="toggleFS()"><i class="fa fa-expand" id="fsIcon"></i></button>
        </div>
        <div class="navbar-date">
            <span class="date-main" id="dateLive">—</span>
            <span class="date-sub" id="timeLive">—</span>
        </div>
    </nav>

    <div class="page-content">
        <!-- Flash Messages -->
        <?php if (session()->getFlashdata('success')): ?>
            <div class="alert alert-success"><i class="fa fa-circle-check"></i><?= session()->getFlashdata('success') ?><span class="alert-close" onclick="this.parentElement.remove()">✕</span></div>
        <?php endif; ?>
        <?php if (session()->getFlashdata('error')): ?>
            <div class="alert alert-error"><i class="fa fa-circle-xmark"></i><?= session()->getFlashdata('error') ?><span class="alert-close" onclick="this.parentElement.remove()">✕</span></div>
        <?php endif; ?>

        <div class="page-header">
            <div class="page-header-left">
                <h1>Data Siswa</h1>
                <p>Kelola seluruh data siswa SMA Karya Sekadau Bimbingan Konseling</p>
            </div>
            <div class="page-header-right">
                <a href="<?= base_url('siswa/export') ?>" class="btn-outline"><i class="fa fa-file-export"></i> Export CSV</a>
                <button class="btn-outline" onclick="openModal('modalImport')"><i class="fa fa-file-import"></i> Import</button>
                <button class="btn-primary" onclick="openModal('modalTambah')"><i class="fa fa-plus"></i> Tambah Siswa</button>
            </div>
        </div>

        <div class="stats-grid">
            <div class="stat-card blue" style="animation-delay:.05s"><div class="stat-ico"><i class="fa fa-users"></i></div><div><div class="stat-num"><?= $total_siswa ?? 0 ?></div><div class="stat-lbl">Total Siswa</div></div></div>
            <div class="stat-card green" style="animation-delay:.10s"><div class="stat-ico"><i class="fa fa-user-check"></i></div><div><div class="stat-num"><?= $siswa_aktif ?? 0 ?></div><div class="stat-lbl">Siswa Aktif</div></div></div>
            <div class="stat-card yellow" style="animation-delay:.15s"><div class="stat-ico"><i class="fa fa-triangle-exclamation"></i></div><div><div class="stat-num"><?= $siswa_bermasalah ?? 0 ?></div><div class="stat-lbl">Punya Pelanggaran</div></div></div>
            <div class="stat-card purple" style="animation-delay:.20s"><div class="stat-ico"><i class="fa fa-user-graduate"></i></div><div><div class="stat-num"><?= $siswa_kelas_x ?? 0 ?></div><div class="stat-lbl">Siswa Kelas X (Baru)</div></div></div>
        </div>

        <div class="filter-bar">
            <div class="filter-search">
                <i class="fa fa-magnifying-glass"></i>
                <input type="text" id="searchInput" placeholder="Cari nama, NISN, kelas..." oninput="filterSiswa()">
            </div>
            <select class="filter-select" id="filterKelas" onchange="filterSiswa()">
                <option value="">Semua Tingkat</option>
                <option value="X ">Kelas X</option>
                <option value="XI ">Kelas XI</option>
                <option value="XII ">Kelas XII</option>
            </select>
            <select class="filter-select" id="filterProdi" onchange="filterSiswa()">
                <option value="">Semua Program</option>
                <option value="MIPA">MIPA</option>
                <option value="IPS">IPS</option>
            </select>
            <select class="filter-select" id="filterStatus" onchange="filterSiswa()">
                <option value="">Semua Status</option>
                <option value="bermasalah">Ada Pelanggaran</option>
                <option value="bersih">Tanpa Pelanggaran</option>
            </select>
            <div class="filter-divider"></div>
            <div class="view-toggle">
                <button class="view-btn active" id="btnGrid" onclick="switchView('grid')" title="Kartu"><i class="fa fa-grip"></i></button>
                <button class="view-btn" id="btnTable" onclick="switchView('table')" title="Tabel"><i class="fa fa-list"></i></button>
            </div>
        </div>

        <!-- GRID VIEW -->
        <div class="siswa-grid-wrap" id="gridView">
            <div class="siswa-grid" id="siswaGrid"></div>
            <div id="emptyGrid" class="empty-state" style="display:none">
                <i class="fa fa-users-slash"></i>
                <p>Tidak ada data siswa ditemukan</p>
            </div>
            <div style="padding:10px 0;font-size:13px;color:var(--gray-400)" id="infoGrid"></div>
        </div>

        <!-- TABLE VIEW -->
        <div class="table-card" id="tableView">
            <div class="table-wrap">
                <table>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Siswa</th>
                            <th>Kelas</th>
                            <th>Program</th>
                            <th>JK</th>
                            <th>No. HP Ortu</th>
                            <th>Poin Pelanggaran</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody id="tableBodySiswa"></tbody>
                </table>
            </div>
            <div style="padding:12px 22px;font-size:13px;color:var(--gray-400)" id="infoTable"></div>
        </div>
    </div>
</div>

<!-- ════ DATA DARI PHP → JS ════ -->
<script>
// Inject data dari controller ke JavaScript
const siswaDariDB = <?= json_encode(array_map(function($s) {
    $nama    = $s['nama'] ?? '';
    $inisial = '';
    $parts   = explode(' ', trim($nama));
    if (count($parts) >= 2) {
        $inisial = strtoupper(substr($parts[0], 0, 1) . substr($parts[1], 0, 1));
    } else {
        $inisial = strtoupper(substr($nama, 0, 2));
    }
    $colors  = ['#1a56db','#ef4444','#f59e0b','#10b981','#8b5cf6','#ec4899','#06b6d4','#f97316'];
    $colorIdx = crc32($nama) % count($colors);
    if ($colorIdx < 0) $colorIdx += count($colors);
    return [
        'id'         => $s['id'],
        'nisn'       => $s['nisn'] ?? '-',
        'nama'       => $nama,
        'kelas'      => $s['kelas'] ?? '-',
        'jurusan'    => $s['jurusan'] ?? '-',
        'jk'         => $s['jk'] ?? '-',
        'no_hp_ortu' => $s['no_hp_ortu'] ?? '-',
        'total_poin' => (int)($s['total_poin'] ?? 0),
        'inisial'    => $inisial,
        'color'      => $colors[$colorIdx],
    ];
}, $list_siswa ?? [])) ?>;

const BASE_URL = '<?= base_url() ?>';

// ── Helpers ──
function formatKelas(kelas) {
    if (!kelas) return '—';
    const map = {A:'MIPA 1',B:'MIPA 2',C:'IPS 1',D:'IPS 2',E:'IPS 3',F:'IPS 4'};
    const m = kelas.trim().match(/([A-Fa-f])\s*$/);
    if (m && map[m[1].toUpperCase()]) return kelas.trim() + ' (' + map[m[1].toUpperCase()] + ')';
    return kelas;
}
function getPoinClass(p) { return p >= 75 ? 'danger' : p >= 40 ? 'warn' : 'safe'; }
function getPoinColor(p) { return p >= 75 ? '#ef4444' : p >= 40 ? '#f59e0b' : '#10b981'; }
function getPoinLabel(p) { if(p===0)return'Bersih';if(p>=75)return'Kritis';if(p>=40)return'Sedang';return'Ringan'; }

// ── Render Grid ──
let filteredData = [...siswaDariDB];

function renderGrid(data) {
    const grid = document.getElementById('siswaGrid');
    const empty = document.getElementById('emptyGrid');
    const info  = document.getElementById('infoGrid');
    if (!data.length) {
        grid.innerHTML = ''; empty.style.display = 'block';
        info.textContent = '';return;
    }
    empty.style.display = 'none';
    info.textContent = 'Menampilkan ' + data.length + ' siswa';
    grid.innerHTML = data.map((s, i) => `
        <div class="siswa-card" style="animation-delay:${i*.04}s">
            <div class="siswa-card-top">
                ${s.total_poin>=75?`<span class="rank-badge" style="background:#fee2e2;color:#dc2626">⚠ Kritis</span>`:
                  s.total_poin>=40?`<span class="rank-badge" style="background:#fef3c7;color:#b45309">⚡ Sedang</span>`:
                  s.total_poin>0 ?`<span class="rank-badge" style="background:#dbeafe;color:#1d4ed8">✓ Ringan</span>`:
                                  `<span class="rank-badge" style="background:#d1fae5;color:#065f46">✓ Bersih</span>`}
                <div class="siswa-avatar-lg" style="background:${s.color}">${s.inisial}</div>
                <div class="siswa-card-name">${s.nama}</div>
                <div class="siswa-card-nisn">NISN: ${s.nisn}</div>
            </div>
            <div class="siswa-card-body">
                <div class="siswa-card-info">
                    <div class="siswa-info-row"><i class="fa fa-school"></i> ${formatKelas(s.kelas)}</div>
                    <div class="siswa-info-row"><i class="fa fa-book"></i> Program ${s.jurusan}</div>
                    <div class="siswa-info-row"><i class="fa fa-venus-mars"></i> ${s.jk==='L'?'Laki-laki':'Perempuan'}</div>
                    <div class="siswa-info-row"><i class="fa fa-phone"></i> ${s.no_hp_ortu||'-'}</div>
                </div>
            </div>
            <div class="siswa-card-footer">
                <div class="pelanggaran-count ${getPoinClass(s.total_poin)}">
                    <i class="fa fa-triangle-exclamation" style="font-size:11px"></i>
                    ${s.total_poin} poin — ${getPoinLabel(s.total_poin)}
                </div>
                <div class="card-actions-row">
                    <button class="btn-icon view" title="Lihat Detail" onclick="window.location='${BASE_URL}siswa/detail/${s.id}'"><i class="fa fa-eye"></i></button>
                    <button class="btn-icon edit" title="Edit" onclick="openEdit(${s.id},'${escStr(s.nisn)}','${escStr(s.nama)}','${escStr(s.kelas)}','${escStr(s.jk)}','${escStr(s.no_hp_ortu)}')"><i class="fa fa-pen"></i></button>
                    <button class="btn-icon del" title="Hapus" onclick="openHapus(${s.id},'${escStr(s.nama)}')"><i class="fa fa-trash"></i></button>
                </div>
            </div>
        </div>
    `).join('');
}

// ── Render Table ──
function renderTable(data) {
    const tbody = document.getElementById('tableBodySiswa');
    const info  = document.getElementById('infoTable');
    if (!data.length) {
        tbody.innerHTML = `<tr><td colspan="8" style="text-align:center;padding:40px;color:var(--gray-400)">Tidak ada data siswa</td></tr>`;
        info.textContent='';return;
    }
    info.textContent = 'Menampilkan ' + data.length + ' siswa';
    tbody.innerHTML = data.map((s, i) => `
        <tr>
            <td style="color:var(--gray-400);font-weight:500">${i+1}</td>
            <td>
                <div class="td-student">
                    <div class="td-avatar" style="background:${s.color}">${s.inisial}</div>
                    <div>
                        <div class="td-name">${s.nama}</div>
                        <div class="td-nisn">NISN: ${s.nisn}</div>
                    </div>
                </div>
            </td>
            <td><strong>${formatKelas(s.kelas)}</strong></td>
            <td><span class="badge ${s.jurusan.toLowerCase()}">${s.jurusan}</span></td>
            <td><span class="badge ${s.jk==='L'?'laki':'perempuan'}">${s.jk==='L'?'Laki-laki':'Perempuan'}</span></td>
            <td style="color:var(--gray-600)">${s.no_hp_ortu||'-'}</td>
            <td>
                <div class="poin-bar-wrap">
                    <div class="poin-bar"><div class="poin-bar-fill" style="width:${Math.min(s.total_poin,100)}%;background:${getPoinColor(s.total_poin)}"></div></div>
                    <span class="poin-num ${getPoinClass(s.total_poin)}">${s.total_poin}</span>
                </div>
            </td>
            <td>
                <div class="action-btns">
                    <button class="btn-icon view" title="Lihat" onclick="window.location='${BASE_URL}siswa/detail/${s.id}'"><i class="fa fa-eye"></i></button>
                    <button class="btn-icon edit" title="Edit" onclick="openEdit(${s.id},'${escStr(s.nisn)}','${escStr(s.nama)}','${escStr(s.kelas)}','${escStr(s.jk)}','${escStr(s.no_hp_ortu)}')"><i class="fa fa-pen"></i></button>
                    <button class="btn-icon del" title="Hapus" onclick="openHapus(${s.id},'${escStr(s.nama)}')"><i class="fa fa-trash"></i></button>
                </div>
            </td>
        </tr>
    `).join('');
}

// ── Filter ──
function filterSiswa() {
    const q      = document.getElementById('searchInput').value.toLowerCase();
    const kelas  = document.getElementById('filterKelas').value;   // "X ", "XI ", "XII "
    const prodi  = document.getElementById('filterProdi').value;   // "MIPA" / "IPS"
    const status = document.getElementById('filterStatus').value;

    filteredData = siswaDariDB.filter(s => {
        const matchQ  = !q || s.nama.toLowerCase().includes(q) || s.nisn.includes(q) || s.kelas.toLowerCase().includes(q);
        const matchK  = !kelas || s.kelas.startsWith(kelas.trim());
        const matchP  = !prodi || s.jurusan === prodi;
        const matchS  = !status || (status==='bermasalah' && s.total_poin>0) || (status==='bersih' && s.total_poin===0);
        return matchQ && matchK && matchP && matchS;
    });

    renderGrid(filteredData);
    if (document.getElementById('tableView').classList.contains('show')) renderTable(filteredData);
}

// ── Switch View ──
function switchView(v) {
    const grid=document.getElementById('gridView'), table=document.getElementById('tableView');
    const btnG=document.getElementById('btnGrid'), btnT=document.getElementById('btnTable');
    if (v==='grid') {
        grid.classList.remove('hide'); table.classList.remove('show');
        btnG.classList.add('active'); btnT.classList.remove('active');
    } else {
        grid.classList.add('hide'); table.classList.add('show');
        btnT.classList.add('active'); btnG.classList.remove('active');
        renderTable(filteredData);
    }
}

// ── Modal helpers ──
function openModal(id)  { document.getElementById(id).classList.add('show'); }
function closeModal(id) { document.getElementById(id).classList.remove('show'); }
document.querySelectorAll('.modal-overlay').forEach(el => {
    el.addEventListener('click', function(e) { if (e.target===this) this.classList.remove('show'); });
});

// ── Edit: fetch data via AJAX lalu isi form ──
function openEdit(id, nisn, nama, kelas, jk, hp) {
    document.getElementById('edit_nisn').value  = nisn;
    document.getElementById('edit_nama').value  = nama;
    document.getElementById('edit_kelas').value = kelas;
    document.getElementById('edit_jk').value    = jk;
    document.getElementById('edit_hp').value    = hp !== 'null' ? hp : '';
    document.getElementById('formEdit').action  = BASE_URL + 'siswa/update/' + id;
    openModal('modalEdit');
}

// ── Hapus: konfirmasi ──
function openHapus(id, nama) {
    document.getElementById('hapusNama').textContent = nama;
    document.getElementById('hapusLink').href = BASE_URL + 'siswa/hapus/' + id;
    openModal('modalHapus');
}

// ── Import file name display ──
function showFileName(input) {
    const el = document.getElementById('fileNameDisplay');
    el.textContent = input.files[0] ? '📄 ' + input.files[0].name : '';
}

// ── Escape string untuk onclick attr ──
function escStr(s) { return (s||'').replace(/'/g,"\\'").replace(/"/g,'&quot;'); }

// ── Clock ──
function updateClock(){
    const d=new Date(),days=['Minggu','Senin','Selasa','Rabu','Kamis','Jumat','Sabtu'],months=['Jan','Feb','Mar','Apr','Mei','Jun','Jul','Ags','Sep','Okt','Nov','Des'];
    document.getElementById('dateLive').textContent=days[d.getDay()]+', '+d.getDate()+' '+months[d.getMonth()]+' '+d.getFullYear();
    document.getElementById('timeLive').textContent=d.getHours().toString().padStart(2,'0')+':'+d.getMinutes().toString().padStart(2,'0')+':'+d.getSeconds().toString().padStart(2,'0')+' WIB';
}
setInterval(updateClock,1000); updateClock();

function toggleSidebar(){document.getElementById('sidebar').classList.toggle('open');document.getElementById('overlay').classList.toggle('show')}
function closeSidebar(){document.getElementById('sidebar').classList.remove('open');document.getElementById('overlay').classList.remove('show')}
function toggleFS(){if(!document.fullscreenElement){document.documentElement.requestFullscreen();document.getElementById('fsIcon').className='fa fa-compress'}else{document.exitFullscreen();document.getElementById('fsIcon').className='fa fa-expand'}}

// ── Auto-open modal jika ada error validasi (redirect back withInput) ──
<?php if (session()->getFlashdata('errors')): ?>
openModal('modalTambah');
<?php endif; ?>

// ── Initial render ──
renderGrid(siswaDariDB);
</script>
</body>
</html>