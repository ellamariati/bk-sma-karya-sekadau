<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buku Kunjungan — BK SMA Karya Sekadau</title>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800&family=DM+Sans:ital,wght@0,300;0,400;0,500;1,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        :root{--blue-900:#0a1628;--blue-800:#0d2045;--blue-700:#0f2d6b;--blue-600:#1340a0;--blue-500:#1a56db;--blue-400:#3b82f6;--blue-300:#93c5fd;--blue-100:#dbeafe;--blue-50:#eff6ff;--gray-50:#f8fafc;--gray-100:#f1f5f9;--gray-200:#e2e8f0;--gray-400:#94a3b8;--gray-600:#475569;--gray-800:#1e293b;--success:#10b981;--warning:#f59e0b;--danger:#ef4444;--purple:#8b5cf6;--teal:#0d9488;--sidebar-w:270px;--navbar-h:72px;--radius:16px;--radius-sm:10px;--shadow:0 4px 24px rgba(19,64,160,.10);--shadow-lg:0 12px 40px rgba(19,64,160,.18);--transition:all .3s cubic-bezier(.4,0,.2,1)}
        *,*::before,*::after{box-sizing:border-box;margin:0;padding:0}
        body{font-family:'DM Sans',sans-serif;background:var(--gray-50);color:var(--gray-800);min-height:100vh;display:flex;overflow-x:hidden}
        /* SIDEBAR */
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
        .user-card{display:flex;align-items:center;gap:12px;padding:10px 12px;border-radius:var(--radius-sm);background:rgba(255,255,255,.07)}
        .user-avatar{width:38px;height:38px;border-radius:50%;background:linear-gradient(135deg,var(--blue-500),#60a5fa);display:flex;align-items:center;justify-content:center;font-weight:700;font-size:15px;color:white;flex-shrink:0}
        .user-info .user-name{font-size:13px;font-weight:500;color:white}
        .user-info .user-role{font-size:11px;color:var(--blue-300);margin-top:1px}
        .logout-icon{margin-left:auto;color:rgba(255,255,255,.4);font-size:13px}
        /* MAIN */
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
        /* PAGE */
        .page-content{padding:28px 32px;flex:1}
        .page-header{display:flex;align-items:flex-start;justify-content:space-between;margin-bottom:28px;gap:16px}
        .page-header-left h1{font-family:'Outfit',sans-serif;font-size:26px;font-weight:700;color:var(--blue-900);letter-spacing:-.5px}
        .page-header-left p{font-size:14px;color:var(--gray-400);margin-top:4px}
        .page-header-right{display:flex;gap:10px;flex-shrink:0}
        .btn-primary{padding:10px 20px;border-radius:var(--radius-sm);border:none;background:var(--blue-500);color:white;font-family:'DM Sans',sans-serif;font-size:13.5px;font-weight:500;cursor:pointer;transition:var(--transition);display:inline-flex;align-items:center;gap:8px;text-decoration:none}
        .btn-primary:hover{background:var(--blue-600);box-shadow:0 4px 14px rgba(26,86,219,.4)}
        .btn-outline{padding:10px 20px;border-radius:var(--radius-sm);border:1.5px solid var(--gray-200);background:white;color:var(--gray-600);font-family:'DM Sans',sans-serif;font-size:13.5px;font-weight:500;cursor:pointer;transition:var(--transition);display:inline-flex;align-items:center;gap:8px;text-decoration:none}
        .btn-outline:hover{border-color:var(--blue-400);color:var(--blue-600);background:var(--blue-50)}
        /* STATS */
        .stats-grid{display:grid;grid-template-columns:repeat(5,1fr);gap:16px;margin-bottom:24px}
        .stat-card{background:white;border-radius:var(--radius);padding:18px 20px;box-shadow:var(--shadow);display:flex;align-items:center;gap:14px;transition:var(--transition);border-left:4px solid transparent;animation:fadeInUp .4s ease both}
        .stat-card:hover{transform:translateY(-2px);box-shadow:var(--shadow-lg)}
        .stat-card.blue{border-left-color:var(--blue-500)}
        .stat-card.yellow{border-left-color:var(--warning)}
        .stat-card.green{border-left-color:var(--success)}
        .stat-card.purple{border-left-color:var(--purple)}
        .stat-card.teal{border-left-color:var(--teal)}
        .stat-ico{width:42px;height:42px;border-radius:11px;display:flex;align-items:center;justify-content:center;font-size:17px;flex-shrink:0}
        .stat-card.blue  .stat-ico{background:var(--blue-100);color:var(--blue-500)}
        .stat-card.yellow .stat-ico{background:#fef3c7;color:#d97706}
        .stat-card.green  .stat-ico{background:#d1fae5;color:#059669}
        .stat-card.purple .stat-ico{background:#ede9fe;color:#7c3aed}
        .stat-card.teal   .stat-ico{background:#ccfbf1;color:#0f766e}
        .stat-num{font-family:'Outfit',sans-serif;font-size:28px;font-weight:800;color:var(--blue-900);line-height:1;letter-spacing:-1px}
        .stat-lbl{font-size:11.5px;color:var(--gray-400);margin-top:3px;font-weight:500}
        /* FILTER */
        .filter-bar{background:white;border-radius:var(--radius);padding:16px 22px;box-shadow:var(--shadow);display:flex;align-items:center;gap:12px;margin-bottom:20px;flex-wrap:wrap}
        .filter-search{flex:1;min-width:200px;position:relative}
        .filter-search input{width:100%;padding:9px 16px 9px 38px;border-radius:var(--radius-sm);border:1.5px solid var(--gray-200);background:var(--gray-50);font-family:'DM Sans',sans-serif;font-size:13px;outline:none;transition:var(--transition)}
        .filter-search input:focus{border-color:var(--blue-400);background:white}
        .filter-search i{position:absolute;left:12px;top:50%;transform:translateY(-50%);color:var(--gray-400);font-size:13px}
        .filter-select{padding:9px 14px;border-radius:var(--radius-sm);border:1.5px solid var(--gray-200);background:white;font-family:'DM Sans',sans-serif;font-size:13px;color:var(--gray-800);outline:none;cursor:pointer}
        .filter-select:focus{border-color:var(--blue-400)}
        /* TABLE */
        .table-card{background:white;border-radius:var(--radius);box-shadow:var(--shadow);overflow:hidden;margin-bottom:24px}
        .table-wrap{overflow-x:auto}
        table{width:100%;border-collapse:collapse;font-size:13px}
        thead th{padding:12px 14px;text-align:left;font-size:11px;font-weight:700;text-transform:uppercase;letter-spacing:.6px;color:var(--gray-400);background:var(--gray-50);border-bottom:2px solid var(--gray-200);white-space:nowrap}
        tbody td{padding:13px 14px;border-bottom:1px solid var(--gray-100);color:var(--gray-800);vertical-align:middle}
        tbody tr:last-child td{border-bottom:none}
        tbody tr:hover{background:var(--blue-50)}
        .td-name{font-weight:600;color:var(--blue-900);font-size:13px}
        .td-sub{font-size:11.5px;color:var(--gray-400);margin-top:1px}
        /* BADGES */
        .badge{display:inline-flex;align-items:center;gap:4px;padding:3px 9px;border-radius:20px;font-size:11px;font-weight:600;white-space:nowrap}
        .badge::before{content:'';width:5px;height:5px;border-radius:50%;background:currentColor;flex-shrink:0}
        .badge.proses{background:#fef3c7;color:#92400e}
        .badge.selesai{background:#d1fae5;color:#065f46}
        .badge.mandiri{background:#dbeafe;color:#1d4ed8}
        .badge.panggilan{background:#ede9fe;color:#5b21b6}
        .badge.bk{background:var(--blue-100);color:var(--blue-700)}
        .badge.wk{background:#ede9fe;color:#5b21b6}
        .badge.bk-wk{background:#fce7f3;color:#9d174d}
        /* JB PILLS */
        .jb-wrap{display:flex;flex-wrap:wrap;gap:3px}
        .jb-pill{display:inline-flex;align-items:center;padding:2px 7px;border-radius:20px;font-size:10px;font-weight:700;text-transform:uppercase}
        .jb-pill.pribadi{background:#dbeafe;color:#1d4ed8}
        .jb-pill.sosial{background:#fce7f3;color:#9d174d}
        .jb-pill.belajar{background:#d1fae5;color:#065f46}
        .jb-pill.karir{background:#ede9fe;color:#5b21b6}
        .text-cell{max-width:200px;font-size:12.5px;color:var(--gray-600);line-height:1.5}
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
        /* ALERT */
        .alert{padding:12px 18px;border-radius:var(--radius-sm);margin-bottom:20px;display:flex;align-items:center;gap:10px;font-size:13.5px;font-weight:500}
        .alert-success{background:#d1fae5;color:#065f46;border:1px solid #6ee7b7}
        .alert-error{background:#fee2e2;color:#991b1b;border:1px solid #fca5a5}
        .alert-close{margin-left:auto;cursor:pointer;opacity:.6}
        /* MODAL */
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
        .form-row.three{grid-template-columns:1fr 1fr 1fr}
        .form-group{display:flex;flex-direction:column;gap:6px}
        .form-label{font-size:12.5px;font-weight:600;color:var(--gray-700)}
        .form-input,.form-select,.form-textarea{padding:10px 14px;border-radius:var(--radius-sm);border:1.5px solid var(--gray-200);background:var(--gray-50);font-family:'DM Sans',sans-serif;font-size:13.5px;color:var(--gray-800);outline:none;transition:var(--transition)}
        .form-input:focus,.form-select:focus,.form-textarea:focus{border-color:var(--blue-400);background:white;box-shadow:0 0 0 3px rgba(59,130,246,.1)}
        .form-textarea{resize:vertical;min-height:88px;line-height:1.6}
        .jb-check-group{display:flex;gap:10px;flex-wrap:wrap;padding:10px 14px;border-radius:var(--radius-sm);border:1.5px solid var(--gray-200);background:var(--gray-50)}
        .jb-check-label{display:flex;align-items:center;gap:6px;cursor:pointer;font-size:13px;color:var(--gray-700);user-select:none}
        .jb-check-label input[type=checkbox]{width:16px;height:16px;accent-color:var(--blue-500);cursor:pointer}
        .quick-btn{padding:5px 12px;border-radius:20px;border:1.5px solid var(--gray-200);background:white;font-size:11.5px;color:var(--gray-600);cursor:pointer;transition:var(--transition);font-family:'DM Sans',sans-serif}
        .quick-btn:hover{border-color:var(--blue-400);color:var(--blue-600);background:var(--blue-50)}
        .modal-footer{padding:14px 26px;border-top:1px solid var(--gray-100);display:flex;justify-content:flex-end;gap:10px;position:sticky;bottom:0;background:white}
        .btn-cancel{padding:10px 20px;border-radius:var(--radius-sm);border:1.5px solid var(--gray-200);background:white;font-family:'DM Sans',sans-serif;font-size:13px;color:var(--gray-600);cursor:pointer}
        .btn-danger{padding:10px 24px;border-radius:var(--radius-sm);border:none;background:var(--danger);color:white;font-family:'DM Sans',sans-serif;font-size:13.5px;font-weight:500;cursor:pointer;text-decoration:none;display:inline-flex;align-items:center;gap:8px}
        /* DETAIL */
        .detail-section{margin-bottom:20px}
        .detail-section-title{font-size:11px;font-weight:700;text-transform:uppercase;letter-spacing:1px;color:var(--blue-500);margin-bottom:10px;padding-bottom:6px;border-bottom:1px solid var(--blue-100)}
        .detail-grid{display:grid;grid-template-columns:1fr 1fr;gap:12px}
        .detail-item .label{font-size:11.5px;color:var(--gray-400);font-weight:500;display:block}
        .detail-item .value{font-size:13.5px;color:var(--gray-800);font-weight:500}
        .detail-text-box{background:var(--gray-50);border-radius:var(--radius-sm);padding:14px;font-size:13px;color:var(--gray-700);line-height:1.7;border:1px solid var(--gray-200)}
        .overlay{display:none;position:fixed;inset:0;background:rgba(10,22,40,.4);z-index:90}.overlay.show{display:block}
        @keyframes fadeInUp{from{opacity:0;transform:translateY(16px)}to{opacity:1;transform:translateY(0)}}
        ::-webkit-scrollbar{width:6px;height:6px}::-webkit-scrollbar-track{background:transparent}::-webkit-scrollbar-thumb{background:var(--gray-200);border-radius:10px}
        @media(max-width:1300px){.stats-grid{grid-template-columns:repeat(3,1fr)}}
        @media(max-width:900px){.stats-grid{grid-template-columns:repeat(2,1fr)}}
        @media(max-width:768px){:root{--sidebar-w:0px}.sidebar{transform:translateX(-270px);width:270px}.sidebar.open{transform:translateX(0)}.main-wrapper{margin-left:0}.navbar-hamburger{display:flex}.page-content{padding:20px 18px}.form-row,.form-row.three{grid-template-columns:1fr}}
    </style>
</head>
<body>
<div class="overlay" id="overlay" onclick="closeSidebar()"></div>

<!-- ════ MODAL TAMBAH ════ -->
<div class="modal-overlay" id="modalTambah">
    <div class="modal">
        <div class="modal-header">
            <h2><i class="fa fa-plus-circle"></i> Tambah Data Kunjungan</h2>
            <button class="modal-close" onclick="closeModal('modalTambah')"><i class="fa fa-times"></i></button>
        </div>
        <form action="<?= base_url('buku-kunjungan/simpan') ?>" method="POST">
            <?= csrf_field() ?>
            <div class="modal-body">
                <?php if (session()->getFlashdata('errors')): ?>
                    <?php foreach (session()->getFlashdata('errors') as $err): ?>
                        <div class="alert alert-error"><i class="fa fa-circle-xmark"></i><?= esc($err) ?><span class="alert-close" onclick="this.parentElement.remove()">✕</span></div>
                    <?php endforeach; ?>
                <?php endif; ?>

                <!-- Siswa + Tanggal + Jam -->
                <div class="form-row">
                    <div class="form-group">
                        <label class="form-label">Nama Siswa <span style="color:var(--danger)">*</span></label>
                        <select name="siswa_id" class="form-select" required>
                            <option value="">-- Pilih Siswa --</option>
                            <?php foreach ($list_siswa as $s): ?>
                                <option value="<?= $s['id'] ?>" <?= old('siswa_id')==$s['id']?'selected':'' ?>>
                                    <?= esc($s['nama']) ?> — <?= esc($s['kelas']) ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Tanggal <span style="color:var(--danger)">*</span></label>
                        <input type="date" name="tanggal" class="form-input" value="<?= old('tanggal', date('Y-m-d')) ?>" required>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label class="form-label">Jam Kunjungan</label>
                        <input type="time" name="jam" class="form-input" value="<?= old('jam', date('H:i')) ?>">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Jenis Kunjungan <span style="color:var(--danger)">*</span></label>
                        <select name="jenis_kunjungan" class="form-select" required>
                            <option value="">-- Pilih --</option>
                            <option value="mandiri"   <?= old('jenis_kunjungan')=='mandiri'  ?'selected':'' ?>>🚶 Mandiri (Siswa datang sendiri)</option>
                            <option value="panggilan" <?= old('jenis_kunjungan')=='panggilan'?'selected':'' ?>>📢 Panggilan (Dipanggil BK)</option>
                        </select>
                    </div>
                </div>

                <!-- Jenis Bimbingan -->
                <div class="form-row full">
                    <div class="form-group">
                        <label class="form-label">Jenis Bimbingan</label>
                        <div class="jb-check-group">
                            <?php
                            $oldJb  = is_array(old('jenis_bimbingan')) ? old('jenis_bimbingan') : [];
                            $jbList = ['pribadi'=>['🧠','Pribadi'],'sosial'=>['🤝','Sosial'],'belajar'=>['📚','Belajar'],'karir'=>['💼','Karir']];
                            foreach ($jbList as $val => [$ico, $lbl]):
                            ?>
                            <label class="jb-check-label">
                                <input type="checkbox" name="jenis_bimbingan[]" value="<?= $val ?>" <?= in_array($val,$oldJb)?'checked':'' ?>>
                                <?= $ico ?> <?= $lbl ?>
                            </label>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>

                <!-- Keperluan -->
                <div class="form-row full">
                    <div class="form-group">
                        <label class="form-label">Keperluan / Masalah <span style="color:var(--danger)">*</span></label>
                        <textarea name="keperluan" class="form-textarea" placeholder="Deskripsikan keperluan atau masalah yang dibawa siswa..." required><?= old('keperluan') ?></textarea>
                    </div>
                </div>

                <!-- Hasil Kunjungan -->
                <div class="form-row full">
                    <div class="form-group">
                        <label class="form-label">Hasil / Tindak Lanjut Kunjungan <span style="color:var(--danger)">*</span></label>
                        <div style="display:flex;flex-wrap:wrap;gap:6px;margin-bottom:8px">
                            <button type="button" class="quick-btn" onclick="appendHasil('Memberikan konseling dan nasehat kepada siswa')">💬 Konseling</button>
                            <button type="button" class="quick-btn" onclick="appendHasil('Melakukan mediasi dengan kedua belah pihak')">🤝 Mediasi</button>
                            <button type="button" class="quick-btn" onclick="appendHasil('Memberikan motivasi dan arahan')">🌟 Motivasi</button>
                            <button type="button" class="quick-btn" onclick="appendHasil('Mendengarkan cerita dan keluhan siswa')">👂 Mendengarkan</button>
                            <button type="button" class="quick-btn" onclick="appendHasil('Memberikan informasi dan saran')">📋 Informasi</button>
                            <button type="button" class="quick-btn" onclick="appendHasil('Dirujuk ke pihak terkait')">🔀 Rujuk</button>
                        </div>
                        <textarea name="hasil_kunjungan" id="inputHasil" class="form-textarea" placeholder="Deskripsikan hasil atau tindak lanjut dari kunjungan..." required><?= old('hasil_kunjungan') ?></textarea>
                    </div>
                </div>

                <!-- Yang Menangani + TTD -->
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
            <h2><i class="fa fa-pen-to-square"></i> Edit Data Kunjungan</h2>
            <button class="modal-close" onclick="closeModal('modalEdit')"><i class="fa fa-times"></i></button>
        </div>
        <form id="formEdit" method="POST">
            <?= csrf_field() ?>
            <div class="modal-body">
                <div class="form-row">
                    <div class="form-group">
                        <label class="form-label">Nama Siswa *</label>
                        <select name="siswa_id" id="e_siswa" class="form-select" required>
                            <option value="">-- Pilih Siswa --</option>
                            <?php foreach ($list_siswa as $s): ?>
                                <option value="<?= $s['id'] ?>"><?= esc($s['nama']) ?> — <?= esc($s['kelas']) ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Tanggal</label>
                        <input type="date" name="tanggal" id="e_tanggal" class="form-input">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label class="form-label">Jam Kunjungan</label>
                        <input type="time" name="jam" id="e_jam" class="form-input">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Jenis Kunjungan</label>
                        <select name="jenis_kunjungan" id="e_jenis_kunjungan" class="form-select">
                            <option value="mandiri">🚶 Mandiri</option>
                            <option value="panggilan">📢 Panggilan</option>
                        </select>
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
                        <label class="form-label">Keperluan / Masalah</label>
                        <textarea name="keperluan" id="e_keperluan" class="form-textarea"></textarea>
                    </div>
                </div>
                <div class="form-row full">
                    <div class="form-group">
                        <label class="form-label">Hasil / Tindak Lanjut</label>
                        <textarea name="hasil_kunjungan" id="e_hasil" class="form-textarea"></textarea>
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
        <div class="modal-header" style="background:linear-gradient(135deg,#0f766e,#0d9488)">
            <h2><i class="fa fa-book-open"></i> Detail Kunjungan</h2>
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
            <h3 style="font-family:'Outfit',sans-serif;font-size:18px;font-weight:700;color:var(--blue-900);margin-bottom:8px">Hapus Data Kunjungan?</h3>
            <p style="font-size:14px;color:var(--gray-600);margin-bottom:20px">Data kunjungan <strong id="hapusInfo">—</strong> akan dihapus permanen.</p>
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
        <a class="nav-item <?= (uri_string()==''||uri_string()=='dashboard')?'active':'' ?>" href="<?= base_url('/') ?>"><i class="fa fa-gauge-high"></i> Dashboard</a>
        <a class="nav-item <?= str_starts_with(uri_string(),'pelanggaran')?'active':'' ?>" href="<?= base_url('pelanggaran') ?>"><i class="fa fa-triangle-exclamation"></i> Data Pelanggaran</a>
        <a class="nav-item <?= str_starts_with(uri_string(),'siswa')?'active':'' ?>" href="<?= base_url('siswa') ?>"><i class="fa fa-users"></i> Data Siswa</a>
        <a class="nav-item <?= str_starts_with(uri_string(),'tindak-lanjut')?'active':'' ?>" href="<?= base_url('tindak-lanjut') ?>"><i class="fa fa-list-check"></i> Tindak Lanjut</a>
        <a class="nav-item <?= str_starts_with(uri_string(),'buku-kunjungan')?'active':'' ?>" href="<?= base_url('buku-kunjungan') ?>"><i class="fa fa-book-open"></i> Buku Kunjungan</a>
    </div>
    <div class="sidebar-section">
        <div class="sidebar-section-label">Konseling</div>
        <a class="nav-item <?= str_starts_with(uri_string(),'jadwal-konseling')?'active':'' ?>" href="<?= base_url('jadwal') ?>"><i class="fa fa-calendar-check"></i> Jadwal Konseling</a>
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
        <div class="navbar-search"><i class="fa fa-magnifying-glass"></i><input type="text" placeholder="Cari siswa, kunjungan..."></div>
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
                <h1>Buku Kunjungan</h1>
                <p>Pencatatan kunjungan siswa ke ruang Bimbingan &amp; Konseling</p>
            </div>
            <div class="page-header-right">
                <a href="<?= base_url('buku-kunjungan/export') ?>" class="btn-outline"><i class="fa fa-file-export"></i> Export CSV</a>
                <button class="btn-primary" onclick="openModal('modalTambah')"><i class="fa fa-plus"></i> Tambah</button>
            </div>
        </div>

        <!-- Stats -->
        <div class="stats-grid">
            <div class="stat-card blue" style="animation-delay:.05s">
                <div class="stat-ico"><i class="fa fa-book-open"></i></div>
                <div><div class="stat-num"><?= $stats['total'] ?? 0 ?></div><div class="stat-lbl">Total Kunjungan</div></div>
            </div>
            <div class="stat-card yellow" style="animation-delay:.08s">
                <div class="stat-ico"><i class="fa fa-spinner"></i></div>
                <div><div class="stat-num"><?= $stats['proses'] ?? 0 ?></div><div class="stat-lbl">Sedang Diproses</div></div>
            </div>
            <div class="stat-card green" style="animation-delay:.11s">
                <div class="stat-ico"><i class="fa fa-circle-check"></i></div>
                <div><div class="stat-num"><?= $stats['selesai'] ?? 0 ?></div><div class="stat-lbl">Selesai</div></div>
            </div>
            <div class="stat-card teal" style="animation-delay:.14s">
                <div class="stat-ico"><i class="fa fa-person-walking"></i></div>
                <div><div class="stat-num"><?= $stats['mandiri'] ?? 0 ?></div><div class="stat-lbl">Mandiri</div></div>
            </div>
            <div class="stat-card purple" style="animation-delay:.17s">
                <div class="stat-ico"><i class="fa fa-bullhorn"></i></div>
                <div><div class="stat-num"><?= $stats['panggilan'] ?? 0 ?></div><div class="stat-lbl">Panggilan</div></div>
            </div>
        </div>

        <!-- Filter -->
        <div class="filter-bar">
            <div class="filter-search">
                <i class="fa fa-magnifying-glass"></i>
                <input type="text" id="searchInput" placeholder="Cari nama siswa, keperluan..." oninput="filterData()">
            </div>
            <select class="filter-select" id="filterStatus" onchange="filterData()">
                <option value="">Semua Status</option>
                <option value="proses">Proses</option>
                <option value="selesai">Selesai</option>
            </select>
            <select class="filter-select" id="filterJenisKunjungan" onchange="filterData()">
                <option value="">Semua Jenis</option>
                <option value="mandiri">Mandiri</option>
                <option value="panggilan">Panggilan</option>
            </select>
            <select class="filter-select" id="filterJb" onchange="filterData()">
                <option value="">Semua Bimbingan</option>
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

        <!-- Table -->
        <div class="table-card">
            <div class="table-wrap">
                <table>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Hari / Tanggal</th>
                            <th>Nama Siswa</th>
                            <th>Jenis</th>
                            <th>Jenis Bimbingan</th>
                            <th>Keperluan</th>
                            <th>Hasil Kunjungan</th>
                            <th>TTD</th>
                            <th>Yang Menangani</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody id="tableBody">
                        <?php if (empty($list_kunjungan)): ?>
                            <tr><td colspan="11">
                                <div class="empty-state">
                                    <i class="fa fa-book-open"></i>
                                    <p>Belum ada data kunjungan</p>
                                </div>
                            </td></tr>
                        <?php else: ?>
                            <?php
                            $hariId  = ['Sunday'=>'Minggu','Monday'=>'Senin','Tuesday'=>'Selasa','Wednesday'=>'Rabu','Thursday'=>'Kamis','Friday'=>'Jumat','Saturday'=>'Sabtu'];
                            $jbLabel = ['pribadi'=>'🧠 Pribadi','sosial'=>'🤝 Sosial','belajar'=>'📚 Belajar','karir'=>'💼 Karir'];
                            ?>
                            <?php foreach ($list_kunjungan as $i => $kj): ?>
                            <?php
                                $tgl     = $kj['tanggal'];
                                $hariStr = $hariId[date('l', strtotime($tgl))] ?? date('l', strtotime($tgl));
                                $tglStr  = date('d/m/Y', strtotime($tgl));
                                $jamStr  = $kj['jam'] ? substr($kj['jam'], 0, 5) : '—';
                                $jbArr   = !empty($kj['jenis_bimbingan']) ? explode(',', $kj['jenis_bimbingan']) : [];
                                $nama    = $kj['nama_siswa'] ?? '—';
                                $m       = $kj['yang_menangani'] ?? '';
                                $mCls    = (str_contains($m,'WK') && str_contains($m,'BK')) ? 'bk-wk' : (str_starts_with($m,'BK') ? 'bk' : 'wk');
                            ?>
                            <tr class="tr-data"
                                data-nama="<?= strtolower(esc((string)($kj['nama_siswa']??''))) ?>"
                                data-keperluan="<?= strtolower(esc((string)($kj['keperluan']??''))) ?>"
                                data-status="<?= esc($kj['status']??'') ?>"
                                data-jenis="<?= esc($kj['jenis_kunjungan']??'') ?>"
                                data-jb="<?= esc($kj['jenis_bimbingan']??'') ?>"
                                data-kelas="<?= esc($kj['kelas']??'') ?>">
                                <td style="color:var(--gray-400);font-weight:500"><?= $i+1 ?></td>
                                <td style="white-space:nowrap">
                                    <div style="font-weight:600;font-size:12.5px;color:var(--blue-900)"><?= $hariStr ?></div>
                                    <div style="font-size:11.5px;color:var(--gray-400)"><?= $tglStr ?></div>
                                    <?php if ($jamStr !== '—'): ?>
                                    <div style="font-size:11px;color:var(--gray-400)"><i class="fa fa-clock" style="font-size:10px"></i> <?= $jamStr ?></div>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <div class="td-name"><?= esc($nama) ?></div>
                                    <div class="td-sub"><?= esc($kj['kelas']??'—') ?> · <?= esc($kj['nisn']??'—') ?></div>
                                </td>
                                <td>
                                    <span class="badge <?= $kj['jenis_kunjungan'] ?>">
                                        <?= $kj['jenis_kunjungan'] === 'mandiri' ? '🚶 Mandiri' : '📢 Panggilan' ?>
                                    </span>
                                </td>
                                <td>
                                    <?php if (!empty($jbArr)): ?>
                                        <div class="jb-wrap">
                                            <?php foreach ($jbArr as $jb): ?>
                                                <?php $jb = trim($jb); ?>
                                                <span class="jb-pill <?= $jb ?>"><?= $jbLabel[$jb] ?? esc($jb) ?></span>
                                            <?php endforeach; ?>
                                        </div>
                                    <?php else: ?>
                                        <span style="color:var(--gray-400);font-size:12px">—</span>
                                    <?php endif; ?>
                                </td>
                                <td><div class="text-cell"><?= nl2br(esc(mb_strimwidth($kj['keperluan']??'', 0, 70, '...'))) ?></div></td>
                                <td><div class="text-cell"><?= nl2br(esc(mb_strimwidth($kj['hasil_kunjungan']??'', 0, 70, '...'))) ?></div></td>
                                <td style="font-size:12.5px;color:var(--gray-700)"><?= esc($kj['ttd']??'—') ?></td>
                                <td><span class="badge <?= $mCls ?>"><?= esc($m) ?></span></td>
                                <td><span class="badge <?= $kj['status'] ?>"><?= $kj['status']==='selesai'?'Selesai':'Proses' ?></span></td>
                                <td>
                                    <div class="action-btns">
                                        <button class="btn-icon view" title="Detail" onclick="openDetail(<?= $kj['id'] ?>)"><i class="fa fa-eye"></i></button>
                                        <button class="btn-icon check" title="<?= $kj['status']==='proses'?'Tandai Selesai':'Tandai Proses' ?>" onclick="toggleStatus(<?= $kj['id'] ?>,'<?= $kj['status'] ?>')">
                                            <i class="fa fa-<?= $kj['status']==='proses'?'check':'rotate-left' ?>"></i>
                                        </button>
                                        <button class="btn-icon edit" title="Edit" onclick="openEdit(<?= $kj['id'] ?>)"><i class="fa fa-pen"></i></button>
                                        <button class="btn-icon del" title="Hapus" onclick="openHapus(<?= $kj['id'] ?>,'<?= esc($nama,'js') ?>')"><i class="fa fa-trash"></i></button>
                                    </div>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
            <div class="info-bar" id="infoBar">
                Menampilkan <?= count($list_kunjungan) ?> data kunjungan
            </div>
        </div>
    </div>
</div>

<script>
const BASE_URL = '<?= base_url() ?>';

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
function closeModal(id){document.getElementById(id).classList.remove('show')}
document.querySelectorAll('.modal-overlay').forEach(el=>{el.addEventListener('click',function(e){if(e.target===this)this.classList.remove('show')})});

function appendHasil(text){
    const ta=document.getElementById('inputHasil');
    ta.value = ta.value ? ta.value+'\n- '+text : '- '+text;
    ta.focus();
}

function filterData(){
    const q   = document.getElementById('searchInput').value.toLowerCase();
    const st  = document.getElementById('filterStatus').value;
    const jk  = document.getElementById('filterJenisKunjungan').value;
    const jb  = document.getElementById('filterJb').value;
    const kls = document.getElementById('filterKelas').value;
    let count = 0;
    document.querySelectorAll('.tr-data').forEach(tr=>{
        const show = (!q||tr.dataset.nama.includes(q)||tr.dataset.keperluan.includes(q))
                  && (!st  || tr.dataset.status===st)
                  && (!jk  || tr.dataset.jenis===jk)
                  && (!jb  || tr.dataset.jb.includes(jb))
                  && (!kls || tr.dataset.kelas.startsWith(kls));
        tr.style.display = show ? '' : 'none';
        if(show) count++;
    });
    document.getElementById('infoBar').textContent = 'Menampilkan '+count+' data kunjungan';
}

function openDetail(id){
    openModal('modalDetail');
    document.getElementById('detailBody').innerHTML='<div style="text-align:center;padding:40px;color:var(--gray-400)"><i class="fa fa-spinner fa-spin" style="font-size:28px"></i></div>';
    fetch(BASE_URL+'buku-kunjungan/detail/'+id)
        .then(r=>r.json())
        .then(res=>{
            if(!res.success){document.getElementById('detailBody').innerHTML='<p style="color:var(--danger);text-align:center">Data tidak ditemukan.</p>';return;}
            const d = res.data;
            const jbLabels={pribadi:'🧠 Pribadi',sosial:'🤝 Sosial',belajar:'📚 Belajar',karir:'💼 Karir'};
            const jbColors={pribadi:'#dbeafe',sosial:'#fce7f3',belajar:'#d1fae5',karir:'#ede9fe'};
            const jbText={pribadi:'#1d4ed8',sosial:'#9d174d',belajar:'#065f46',karir:'#5b21b6'};
            let jbHtml='—';
            if(d.jenis_bimbingan_arr&&d.jenis_bimbingan_arr.length){
                jbHtml=d.jenis_bimbingan_arr.map(j=>`<span style="display:inline-flex;padding:3px 10px;border-radius:20px;font-size:11px;font-weight:700;background:${jbColors[j]||'#f1f5f9'};color:${jbText[j]||'#475569'};margin:2px">${jbLabels[j]||j}</span>`).join('');
            }
            const stBg=d.status==='selesai'?'#d1fae5':'#fef3c7';
            const stCol=d.status==='selesai'?'#065f46':'#92400e';
            const jkBg=d.jenis_kunjungan==='mandiri'?'#dbeafe':'#ede9fe';
            const jkCol=d.jenis_kunjungan==='mandiri'?'#1d4ed8':'#5b21b6';
            const jam = d.jam ? d.jam.substring(0,5) : '—';
            document.getElementById('detailBody').innerHTML=`
                <div class="detail-section">
                    <div class="detail-section-title">Informasi Siswa</div>
                    <div class="detail-grid">
                        <div class="detail-item"><span class="label">Nama Siswa</span><span class="value">${d.nama_siswa||'—'}</span></div>
                        <div class="detail-item"><span class="label">NISN</span><span class="value">${d.nisn||'—'}</span></div>
                        <div class="detail-item"><span class="label">Kelas</span><span class="value">${d.kelas||'—'}</span></div>
                        <div class="detail-item"><span class="label">Jenis Kelamin</span><span class="value">${d.jk==='L'?'Laki-laki':'Perempuan'}</span></div>
                        <div class="detail-item"><span class="label">No HP Ortu</span><span class="value">${d.no_hp_ortu||'—'}</span></div>
                        <div class="detail-item"><span class="label">Tanggal &amp; Jam</span><span class="value">${formatTgl(d.tanggal)} · ${jam}</span></div>
                    </div>
                </div>
                <div class="detail-section">
                    <div class="detail-section-title">Jenis Kunjungan &amp; Bimbingan</div>
                    <div style="display:flex;flex-wrap:wrap;gap:8px;padding:4px 0">
                        <span style="display:inline-flex;padding:4px 12px;border-radius:20px;font-size:12px;font-weight:700;background:${jkBg};color:${jkCol}">
                            ${d.jenis_kunjungan==='mandiri'?'🚶 Mandiri':'📢 Panggilan'}
                        </span>
                        ${jbHtml}
                    </div>
                </div>
                <div class="detail-section">
                    <div class="detail-section-title">Keperluan / Masalah</div>
                    <div class="detail-text-box">${(d.keperluan||'').replace(/\n/g,'<br>')}</div>
                </div>
                <div class="detail-section">
                    <div class="detail-section-title">Hasil / Tindak Lanjut Kunjungan</div>
                    <div class="detail-text-box">${(d.hasil_kunjungan||'').replace(/\n/g,'<br>')}</div>
                </div>
                <div class="detail-section">
                    <div class="detail-section-title">Penanganan &amp; Status</div>
                    <div class="detail-grid">
                        <div class="detail-item"><span class="label">Yang Menangani</span><span class="value">${d.yang_menangani||'—'}</span></div>
                        <div class="detail-item"><span class="label">TTD / Paraf</span><span class="value">${d.ttd||'—'}</span></div>
                        <div class="detail-item"><span class="label">Status</span>
                            <span style="display:inline-flex;padding:4px 12px;border-radius:20px;font-size:12px;font-weight:700;background:${stBg};color:${stCol}">
                                ${d.status==='selesai'?'✓ Selesai':'⏳ Proses'}
                            </span>
                        </div>
                    </div>
                </div>
            `;
        });
}

function openEdit(id){
    fetch(BASE_URL+'buku-kunjungan/edit/'+id)
        .then(r=>r.json())
        .then(res=>{
            if(!res.success){alert('Data tidak ditemukan.');return;}
            const d=res.data;
            document.getElementById('e_siswa').value           = d.siswa_id;
            document.getElementById('e_tanggal').value         = d.tanggal;
            document.getElementById('e_jam').value             = d.jam||'';
            document.getElementById('e_jenis_kunjungan').value = d.jenis_kunjungan;
            document.getElementById('e_keperluan').value       = d.keperluan||'';
            document.getElementById('e_hasil').value           = d.hasil_kunjungan||'';
            document.getElementById('e_menangani').value       = d.yang_menangani;
            document.getElementById('e_status').value          = d.status;
            document.getElementById('e_ttd').value             = d.ttd||'';
            ['pribadi','sosial','belajar','karir'].forEach(j=>{
                const cb=document.getElementById('ejb_'+j);
                if(cb) cb.checked = d.jenis_bimbingan_arr && d.jenis_bimbingan_arr.includes(j);
            });
            document.getElementById('formEdit').action = BASE_URL+'buku-kunjungan/update/'+id;
            openModal('modalEdit');
        });
}

function toggleStatus(id, currentStatus){
    const newStatus=currentStatus==='proses'?'selesai':'proses';
    const fd=new FormData();
    fd.append('status',newStatus);
    fd.append('<?= csrf_token() ?>','<?= csrf_hash() ?>');
    fetch(BASE_URL+'buku-kunjungan/status/'+id,{method:'POST',body:fd})
        .then(r=>r.json())
        .then(res=>{if(res.success)location.reload();});
}

function openHapus(id,nama){
    document.getElementById('hapusInfo').textContent=nama;
    document.getElementById('hapusLink').href=BASE_URL+'buku-kunjungan/hapus/'+id;
    openModal('modalHapus');
}

function formatTgl(str){
    if(!str)return'—';
    const d=new Date(str);
    const months=['Jan','Feb','Mar','Apr','Mei','Jun','Jul','Ags','Sep','Okt','Nov','Des'];
    const days=['Minggu','Senin','Selasa','Rabu','Kamis','Jumat','Sabtu'];
    return days[d.getDay()]+', '+d.getDate()+' '+months[d.getMonth()]+' '+d.getFullYear();
}

<?php if(session()->getFlashdata('errors')): ?>openModal('modalTambah');<?php endif; ?>
</script>
</body>
</html>