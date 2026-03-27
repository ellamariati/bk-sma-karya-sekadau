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
        /* ── SIDEBAR ── */
        .sidebar{width:var(--sidebar-w);min-height:100vh;background:linear-gradient(175deg,var(--blue-900) 0%,var(--blue-800) 50%,var(--blue-700) 100%);position:fixed;left:0;top:0;bottom:0;z-index:100;display:flex;flex-direction:column;box-shadow:4px 0 32px rgba(10,22,40,.25);transition:var(--transition);overflow-y:auto}
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
        .user-card:hover .logout-icon{color:var(--danger)}
        /* ── MAIN ── */
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
        /* ── PAGE ── */
        .page-content{padding:28px 32px;flex:1}
        .page-header{display:flex;align-items:flex-start;justify-content:space-between;margin-bottom:28px;gap:16px}
        .page-header-left h1{font-family:'Outfit',sans-serif;font-size:26px;font-weight:700;color:var(--blue-900);letter-spacing:-.5px}
        .page-header-left p{font-size:14px;color:var(--gray-400);margin-top:4px}
        .page-header-right{display:flex;gap:10px;flex-shrink:0}
        .btn-primary{padding:10px 20px;border-radius:var(--radius-sm);border:none;background:var(--blue-500);color:white;font-family:'DM Sans',sans-serif;font-size:13.5px;font-weight:500;cursor:pointer;transition:var(--transition);display:flex;align-items:center;gap:8px;text-decoration:none}
        .btn-primary:hover{background:var(--blue-600);box-shadow:0 4px 14px rgba(26,86,219,.4)}
        .btn-outline{padding:10px 20px;border-radius:var(--radius-sm);border:1.5px solid var(--gray-200);background:white;color:var(--gray-600);font-family:'DM Sans',sans-serif;font-size:13.5px;font-weight:500;cursor:pointer;transition:var(--transition);display:flex;align-items:center;gap:8px;text-decoration:none}
        .btn-outline:hover{border-color:var(--blue-400);color:var(--blue-600);background:var(--blue-50)}
        /* ── STATS ── */
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
        /* ── FILTER BAR ── */
        .filter-bar{background:white;border-radius:var(--radius);padding:16px 22px;box-shadow:var(--shadow);display:flex;align-items:center;gap:12px;margin-bottom:20px;flex-wrap:wrap}
        .filter-search{flex:1;min-width:220px;position:relative}
        .filter-search input{width:100%;padding:9px 16px 9px 38px;border-radius:var(--radius-sm);border:1.5px solid var(--gray-200);background:var(--gray-50);font-family:'DM Sans',sans-serif;font-size:13px;outline:none;transition:var(--transition)}
        .filter-search input:focus{border-color:var(--blue-400);background:white}
        .filter-search i{position:absolute;left:12px;top:50%;transform:translateY(-50%);color:var(--gray-400);font-size:13px}
        .filter-select{padding:9px 14px;border-radius:var(--radius-sm);border:1.5px solid var(--gray-200);background:white;font-family:'DM Sans',sans-serif;font-size:13px;color:var(--gray-700);outline:none;cursor:pointer}
        .filter-select:focus{border-color:var(--blue-400)}
        /* ── TABLE ── */
        .table-card{background:white;border-radius:var(--radius);box-shadow:var(--shadow);overflow:hidden;margin-bottom:24px}
        .table-wrap{overflow-x:auto}
        table{width:100%;border-collapse:collapse;font-size:13px}
        thead th{padding:13px 16px;text-align:left;font-size:11px;font-weight:600;text-transform:uppercase;letter-spacing:.6px;color:var(--gray-400);background:var(--gray-50);border-bottom:1px solid var(--gray-200);white-space:nowrap}
        tbody td{padding:13px 16px;border-bottom:1px solid var(--gray-100);color:var(--gray-800);vertical-align:middle}
        tbody tr:last-child td{border-bottom:none}
        tbody tr:hover{background:var(--blue-50)}
        .td-student{display:flex;align-items:center;gap:10px}
        .td-avatar{width:36px;height:36px;border-radius:50%;display:flex;align-items:center;justify-content:center;font-size:12px;font-weight:700;color:white;flex-shrink:0}
        .td-name{font-weight:600;color:var(--blue-900);font-size:13px}
        .td-sub{font-size:11.5px;color:var(--gray-400);margin-top:1px}
        .badge{display:inline-flex;align-items:center;gap:4px;padding:4px 10px;border-radius:20px;font-size:11px;font-weight:600;white-space:nowrap}
        .badge::before{content:'';width:5px;height:5px;border-radius:50%;background:currentColor}
        .badge.proses{background:#fef3c7;color:#92400e}
        .badge.selesai{background:#d1fae5;color:#065f46}
        .badge.bk{background:var(--blue-100);color:var(--blue-700)}
        .badge.wk{background:#ede9fe;color:#5b21b6}
        .badge.bk-wk{background:#fce7f3;color:#9d174d}
        .masalah-cell{max-width:220px;font-size:12.5px;color:var(--gray-600);line-height:1.5}
        .tindak-cell{max-width:240px;font-size:12.5px;color:var(--gray-700);line-height:1.5}
        .action-btns{display:flex;gap:6px}
        .btn-icon{width:30px;height:30px;border-radius:7px;border:none;cursor:pointer;display:flex;align-items:center;justify-content:center;font-size:12px;transition:var(--transition)}
        .btn-icon.view{background:var(--blue-100);color:var(--blue-600)}
        .btn-icon.edit{background:#fef3c7;color:#b45309}
        .btn-icon.del{background:#fee2e2;color:#dc2626}
        .btn-icon.check{background:#d1fae5;color:#059669}
        .btn-icon:hover{opacity:.8;transform:scale(1.08)}
        .empty-state{text-align:center;padding:60px 20px;color:var(--gray-400)}
        .empty-state i{font-size:48px;color:var(--gray-200);margin-bottom:14px;display:block}
        .info-bar{padding:12px 22px;font-size:13px;color:var(--gray-400);border-top:1px solid var(--gray-100)}
        /* ── ALERT ── */
        .alert{padding:12px 18px;border-radius:var(--radius-sm);margin-bottom:20px;display:flex;align-items:center;gap:10px;font-size:13.5px;font-weight:500}
        .alert-success{background:#d1fae5;color:#065f46;border:1px solid #6ee7b7}
        .alert-error{background:#fee2e2;color:#991b1b;border:1px solid #fca5a5}
        .alert-close{margin-left:auto;cursor:pointer;opacity:.6}.alert-close:hover{opacity:1}
        /* ── MODAL ── */
        .modal-overlay{display:none;position:fixed;inset:0;background:rgba(10,22,40,.5);z-index:300;align-items:center;justify-content:center}
        .modal-overlay.show{display:flex}
        .modal{background:white;border-radius:var(--radius);width:100%;max-width:600px;max-height:92vh;overflow-y:auto;box-shadow:0 24px 80px rgba(10,22,40,.3);animation:modalIn .25s ease}
        .modal.modal-lg{max-width:700px}
        .modal.modal-sm{max-width:440px}
        @keyframes modalIn{from{opacity:0;transform:scale(.95) translateY(10px)}to{opacity:1;transform:scale(1) translateY(0)}}
        .modal-header{padding:22px 26px 18px;background:linear-gradient(135deg,var(--blue-800),var(--blue-600));display:flex;align-items:center;justify-content:space-between;flex-shrink:0}
        .modal-header h2{font-family:'Outfit',sans-serif;font-size:17px;font-weight:700;color:white;display:flex;align-items:center;gap:10px}
        .modal-close{width:32px;height:32px;border-radius:8px;border:none;background:rgba(255,255,255,.15);color:white;cursor:pointer;font-size:15px;display:flex;align-items:center;justify-content:center}
        .modal-close:hover{background:rgba(255,255,255,.25)}
        .modal-body{padding:24px 26px}
        .form-row{display:grid;grid-template-columns:1fr 1fr;gap:16px;margin-bottom:16px}
        .form-row.full{grid-template-columns:1fr}
        .form-group{display:flex;flex-direction:column;gap:6px}
        .form-label{font-size:12.5px;font-weight:600;color:var(--gray-700)}
        .form-input,.form-select,.form-textarea{padding:10px 14px;border-radius:var(--radius-sm);border:1.5px solid var(--gray-200);background:var(--gray-50);font-family:'DM Sans',sans-serif;font-size:13.5px;color:var(--gray-800);outline:none;transition:var(--transition)}
        .form-input:focus,.form-select:focus,.form-textarea:focus{border-color:var(--blue-400);background:white;box-shadow:0 0 0 3px rgba(59,130,246,.1)}
        .form-textarea{resize:vertical;min-height:90px;line-height:1.6}
        .modal-footer{padding:16px 26px;border-top:1px solid var(--gray-100);display:flex;justify-content:flex-end;gap:10px}
        .btn-cancel{padding:10px 20px;border-radius:var(--radius-sm);border:1.5px solid var(--gray-200);background:white;font-family:'DM Sans',sans-serif;font-size:13px;color:var(--gray-600);cursor:pointer}
        .btn-cancel:hover{background:var(--gray-50)}
        .btn-danger{padding:10px 24px;border-radius:var(--radius-sm);border:none;background:var(--danger);color:white;font-family:'DM Sans',sans-serif;font-size:13.5px;font-weight:500;cursor:pointer;text-decoration:none;display:inline-flex;align-items:center;gap:8px}
        .btn-danger:hover{background:#dc2626}
        /* ── DETAIL MODAL ── */
        .detail-section{margin-bottom:20px}
        .detail-section-title{font-size:11px;font-weight:700;text-transform:uppercase;letter-spacing:1px;color:var(--blue-500);margin-bottom:12px;padding-bottom:6px;border-bottom:1px solid var(--blue-100)}
        .detail-grid{display:grid;grid-template-columns:1fr 1fr;gap:12px}
        .detail-item{display:flex;flex-direction:column;gap:3px}
        .detail-item .label{font-size:11.5px;color:var(--gray-400);font-weight:500}
        .detail-item .value{font-size:13.5px;color:var(--gray-800);font-weight:500}
        .detail-text-box{background:var(--gray-50);border-radius:var(--radius-sm);padding:14px;font-size:13px;color:var(--gray-700);line-height:1.7;border:1px solid var(--gray-200)}
        .status-toggle{display:flex;gap:8px;align-items:center}
        .toggle-btn{padding:6px 16px;border-radius:20px;border:1.5px solid var(--gray-200);background:white;font-size:12px;font-weight:600;cursor:pointer;transition:var(--transition)}
        .toggle-btn.proses.active{background:#fef3c7;border-color:#f59e0b;color:#92400e}
        .toggle-btn.selesai.active{background:#d1fae5;border-color:#10b981;color:#065f46}
        /* ── OVERLAY ── */
        .overlay{display:none;position:fixed;inset:0;background:rgba(10,22,40,.4);z-index:90}.overlay.show{display:block}
        @keyframes fadeInUp{from{opacity:0;transform:translateY(16px)}to{opacity:1;transform:translateY(0)}}
        ::-webkit-scrollbar{width:6px;height:6px}::-webkit-scrollbar-track{background:transparent}::-webkit-scrollbar-thumb{background:var(--gray-200);border-radius:10px}
        @media(max-width:1200px){.stats-grid{grid-template-columns:repeat(2,1fr)}}
        @media(max-width:768px){:root{--sidebar-w:0px}.sidebar{transform:translateX(-270px);width:270px}.sidebar.open{transform:translateX(0)}.main-wrapper{margin-left:0}.navbar-hamburger{display:flex}.navbar{padding:0 18px}.page-content{padding:20px 18px}.stats-grid{grid-template-columns:1fr 1fr}.page-header{flex-direction:column}.form-row{grid-template-columns:1fr}}
        @media(max-width:480px){.stats-grid{grid-template-columns:1fr}}
    </style>
</head>
<body>
<div class="overlay" id="overlay" onclick="closeSidebar()"></div>

<!-- ════ MODAL TAMBAH ════ -->
<div class="modal-overlay" id="modalTambah">
    <div class="modal modal-lg">
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

                <div class="form-row full">
                    <div class="form-group">
                        <label class="form-label">Masalah / Pelanggaran <span style="color:var(--danger)">*</span></label>
                        <textarea name="masalah" class="form-textarea" placeholder="Deskripsikan masalah atau pelanggaran yang dilakukan siswa..." required><?= old('masalah') ?></textarea>
                    </div>
                </div>

                <div class="form-row full">
                    <div class="form-group">
                        <label class="form-label">Tindak Lanjut yang Diberikan <span style="color:var(--danger)">*</span></label>
                        <!-- Pilihan cepat -->
                        <div style="display:flex;flex-wrap:wrap;gap:6px;margin-bottom:8px" id="quickTindak">
                            <button type="button" class="quick-btn" onclick="appendTindak('Konseling dan nasehat kepada siswa')">💬 Konseling</button>
                            <button type="button" class="quick-btn" onclick="appendTindak('Membuat surat pernyataan')">📝 Surat Pernyataan</button>
                            <button type="button" class="quick-btn" onclick="appendTindak('Panggilan orang tua/wali')">📞 Panggilan Ortu</button>
                            <button type="button" class="quick-btn" onclick="appendTindak('Memberikan surat peringatan')">⚠️ Surat Peringatan</button>
                            <button type="button" class="quick-btn" onclick="appendTindak('Pemberian motivasi dan arahan')">🌟 Pembinaan</button>
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
                            <option value="BK" <?= old('yang_menangani')=='BK'?'selected':'' ?>>BK (Guru BK)</option>
                            <option value="WK" <?= old('yang_menangani')=='WK'?'selected':'' ?>>WK (Wali Kelas)</option>
                            <option value="BK - WK" <?= old('yang_menangani')=='BK - WK'?'selected':'' ?>>BK & WK</option>
                            <option value="BK - Waka" <?= old('yang_menangani')=='BK - Waka'?'selected':'' ?>>BK & Waka</option>
                            <option value="BK - WK - Waka - Siswa" <?= old('yang_menangani')=='BK - WK - Waka - Siswa'?'selected':'' ?>>BK, WK, Waka & Siswa</option>
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
    <div class="modal modal-lg">
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
                            <option value="BK - WK">BK & WK</option>
                            <option value="BK - Waka">BK & Waka</option>
                            <option value="BK - WK - Waka - Siswa">BK, WK, Waka & Siswa</option>
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
    <div class="modal modal-lg">
        <div class="modal-header" style="background:linear-gradient(135deg,#065f46,#059669)">
            <h2><i class="fa fa-eye"></i> Detail Tindak Lanjut</h2>
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
        <div class="brand-icon"><i class="fa fa-graduation-cap"></i></div>
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
        <a class="nav-item <?= str_starts_with(uri_string(),'jadwal-konseling')?'active':'' ?>" href="<?= base_url('jadwal-konseling') ?>"><i class="fa fa-calendar-check"></i> Jadwal Konseling <span class="nav-badge warn">3</span></a>
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
        <!-- Flash -->
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

        <!-- Stats -->
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

        <!-- Filter -->
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
                <option value="BK - WK">BK & WK</option>
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
                            <th>Siswa</th>
                            <th>Tanggal</th>
                            <th>Masalah</th>
                            <th>Tindak Lanjut</th>
                            <th>Yang Menangani</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody id="tableBody">
                        <?php if (empty($list_tindak_lanjut)): ?>
                            <tr><td colspan="8"><div class="empty-state"><i class="fa fa-list-check"></i><p>Belum ada data tindak lanjut</p></div></td></tr>
                        <?php else: ?>
                            <?php foreach ($list_tindak_lanjut as $i => $tl): ?>
                        <tr class="tr-data"
                            data-nama="<?= strtolower(esc((string)$tl['nama_siswa'] ?? '')) ?>"
                            data-masalah="<?= strtolower(esc((string)$tl['masalah'] ?? '')) ?>"
                            data-tindak="<?= strtolower(esc((string)$tl['tindak_lanjut'] ?? '')) ?>"
                            data-status="<?= esc($tl['status'] ?? '') ?>"
                            data-menangani="<?= esc($tl['yang_menangani'] ?? '') ?>"
                            data-kelas="<?= esc($tl['kelas'] ?? '') ?>">
                                <td style="color:var(--gray-400);font-weight:500"><?= $i+1 ?></td>
                                <td>
                                    <div class="td-student">
                                        <?php
                                            $nama  = $tl['nama_siswa'] ?? '—';
                                            $parts = explode(' ', trim($nama));
                                            $ini   = count($parts)>=2 ? strtoupper(substr($parts[0],0,1).substr($parts[1],0,1)) : strtoupper(substr($nama,0,2));
                                            $colors= ['#1a56db','#ef4444','#f59e0b','#10b981','#8b5cf6','#ec4899'];
                                            $ci    = abs(crc32($nama)) % count($colors);
                                        ?>
                                        <div class="td-avatar" style="background:<?= $colors[$ci] ?>"><?= $ini ?></div>
                                        <div>
                                            <div class="td-name"><?= esc($nama) ?></div>
                                            <div class="td-sub"><?= esc($tl['kelas'] ?? '—') ?> · NISN: <?= esc($tl['nisn'] ?? '—') ?></div>
                                        </div>
                                    </div>
                                </td>
                                <td style="white-space:nowrap;color:var(--gray-600);font-size:12.5px">
                                    <?= date('d M Y', strtotime($tl['tanggal'])) ?>
                                </td>
                                <td><div class="masalah-cell"><?= nl2br(esc(mb_strimwidth($tl['masalah'], 0, 80, '...'))) ?></div></td>
                                <td><div class="tindak-cell"><?= nl2br(esc(mb_strimwidth($tl['tindak_lanjut'], 0, 90, '...'))) ?></div></td>
                                <td>
                                    <?php
                                        $m   = $tl['yang_menangani'];
                                        $cls = str_contains($m,'WK') && str_contains($m,'BK') ? 'bk-wk' : (str_starts_with($m,'BK') ? 'bk' : 'wk');
                                    ?>
                                    <span class="badge <?= $cls ?>"><?= esc($m) ?></span>
                                </td>
                                <td>
                                    <span class="badge <?= $tl['status'] ?>" id="statusBadge<?= $tl['id'] ?>">
                                        <?= $tl['status'] === 'selesai' ? 'Selesai' : 'Proses' ?>
                                    </span>
                                </td>
                                <td>
                                    <div class="action-btns">
                                        <button class="btn-icon view" title="Detail" onclick="openDetail(<?= $tl['id'] ?>)"><i class="fa fa-eye"></i></button>
                                        <button class="btn-icon check" title="<?= $tl['status']==='proses'?'Tandai Selesai':'Tandai Proses' ?>" onclick="toggleStatus(<?= $tl['id'] ?>,'<?= $tl['status'] ?>')">
                                            <i class="fa fa-<?= $tl['status']==='proses'?'check':'rotate-left' ?>"></i>
                                        </button>
                                        <button class="btn-icon edit" title="Edit" onclick="openEdit(<?= $tl['id'] ?>)"><i class="fa fa-pen"></i></button>
                                       <button class="btn-icon del" title="Hapus" onclick="openHapus(<?= $tl['id'] ?>,'<?= esc($tl['nama_siswa'] ?? '', 'js') ?>')"><i class="fa fa-trash"></i></button>
                                    </div>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
            <div class="info-bar" id="infoBar">
                Menampilkan <?= count($list_tindak_lanjut) ?> data tindak lanjut
            </div>
        </div>
    </div>
</div>

<style>
.quick-btn{padding:5px 12px;border-radius:20px;border:1.5px solid var(--gray-200);background:white;font-size:11.5px;color:var(--gray-600);cursor:pointer;transition:var(--transition);font-family:'DM Sans',sans-serif}
.quick-btn:hover{border-color:var(--blue-400);color:var(--blue-600);background:var(--blue-50)}
</style>

<script>
const BASE_URL = '<?= base_url() ?>';

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

// ── Modal ──
function openModal(id){document.getElementById(id).classList.add('show')}
function closeModal(id){document.getElementById(id).classList.remove('show')}
document.querySelectorAll('.modal-overlay').forEach(el=>{
    el.addEventListener('click',function(e){if(e.target===this)this.classList.remove('show')})
});

// ── Quick tindak lanjut ──
function appendTindak(text){
    const ta=document.getElementById('inputTindak');
    ta.value = ta.value ? ta.value + '\n- ' + text : '- ' + text;
    ta.focus();
}

// ── Filter ──
function filterData(){
    const q   = document.getElementById('searchInput').value.toLowerCase();
    const st  = document.getElementById('filterStatus').value;
    const mn  = document.getElementById('filterMenangani').value;
    const kls = document.getElementById('filterKelas').value;
    let count = 0;
    document.querySelectorAll('.tr-data').forEach(tr=>{
        const matchQ  = !q || tr.dataset.nama.includes(q) || tr.dataset.masalah.includes(q) || tr.dataset.tindak.includes(q);
        const matchS  = !st  || tr.dataset.status === st;
        const matchM  = !mn  || tr.dataset.menangani.includes(mn);
        const matchK  = !kls || tr.dataset.kelas.startsWith(kls);
        const show = matchQ && matchS && matchM && matchK;
        tr.style.display = show ? '' : 'none';
        if(show) count++;
    });
    document.getElementById('infoBar').textContent = 'Menampilkan ' + count + ' data tindak lanjut';
}

// ── Detail via AJAX ──
function openDetail(id){
    openModal('modalDetail');
    document.getElementById('detailBody').innerHTML = '<div style="text-align:center;padding:40px;color:var(--gray-400)"><i class="fa fa-spinner fa-spin" style="font-size:28px"></i></div>';
    fetch(BASE_URL + 'tindak-lanjut/detail/' + id)
        .then(r=>r.json())
        .then(res=>{
            if(!res.success){document.getElementById('detailBody').innerHTML='<p style="color:var(--danger);text-align:center">Data tidak ditemukan.</p>';return;}
            const d = res.data;
            const statusColor = d.status==='selesai'?'#065f46':'#92400e';
            const statusBg    = d.status==='selesai'?'#d1fae5':'#fef3c7';
            document.getElementById('detailBody').innerHTML = `
                <div class="detail-section">
                    <div class="detail-section-title">Informasi Siswa</div>
                    <div class="detail-grid">
                        <div class="detail-item"><span class="label">Nama Siswa</span><span class="value">${d.nama_siswa||'—'}</span></div>
                        <div class="detail-item"><span class="label">NISN</span><span class="value">${d.nisn||'—'}</span></div>
                        <div class="detail-item"><span class="label">Kelas</span><span class="value">${d.kelas||'—'}</span></div>
                        <div class="detail-item"><span class="label">Jenis Kelamin</span><span class="value">${d.jk==='L'?'Laki-laki':'Perempuan'}</span></div>
                        <div class="detail-item"><span class="label">No HP Ortu</span><span class="value">${d.no_hp_ortu||'—'}</span></div>
                        <div class="detail-item"><span class="label">Tanggal</span><span class="value">${formatTanggal(d.tanggal)}</span></div>
                    </div>
                </div>
                <div class="detail-section">
                    <div class="detail-section-title">Masalah / Pelanggaran</div>
                    <div class="detail-text-box">${d.masalah.replace(/\n/g,'<br>')}</div>
                </div>
                <div class="detail-section">
                    <div class="detail-section-title">Tindak Lanjut yang Diberikan</div>
                    <div class="detail-text-box">${d.tindak_lanjut.replace(/\n/g,'<br>')}</div>
                </div>
                <div class="detail-section">
                    <div class="detail-section-title">Penanganan</div>
                    <div class="detail-grid">
                        <div class="detail-item"><span class="label">Yang Menangani</span><span class="value">${d.yang_menangani}</span></div>
                        <div class="detail-item"><span class="label">TTD / Paraf</span><span class="value">${d.ttd||'—'}</span></div>
                        <div class="detail-item"><span class="label">Status</span>
                            <span style="display:inline-flex;align-items:center;gap:4px;padding:4px 12px;border-radius:20px;font-size:12px;font-weight:700;background:${statusBg};color:${statusColor}">
                                ${d.status==='selesai'?'✓ Selesai':'⏳ Proses'}
                            </span>
                        </div>
                    </div>
                </div>
            `;
        });
}

// ── Edit via AJAX ──
function openEdit(id){
    fetch(BASE_URL + 'tindak-lanjut/edit/' + id)
        .then(r=>r.json())
        .then(res=>{
            if(!res.success){alert('Data tidak ditemukan.');return;}
            const d = res.data;
            document.getElementById('e_siswa').value    = d.siswa_id;
            document.getElementById('e_tanggal').value  = d.tanggal;
            document.getElementById('e_masalah').value  = d.masalah;
            document.getElementById('e_tindak').value   = d.tindak_lanjut;
            document.getElementById('e_menangani').value= d.yang_menangani;
            document.getElementById('e_status').value   = d.status;
            document.getElementById('e_ttd').value      = d.ttd||'';
            document.getElementById('formEdit').action  = BASE_URL + 'tindak-lanjut/update/' + id;
            openModal('modalEdit');
        });
}

// ── Toggle Status AJAX ──
function toggleStatus(id, currentStatus){
    const newStatus = currentStatus === 'proses' ? 'selesai' : 'proses';
    const fd = new FormData();
    fd.append('status', newStatus);
    fd.append('<?= csrf_token() ?>', '<?= csrf_hash() ?>');
    fetch(BASE_URL + 'tindak-lanjut/status/' + id, {method:'POST', body:fd})
        .then(r=>r.json())
        .then(res=>{
            if(res.success){ location.reload(); }
        });
}

// ── Hapus ──
function openHapus(id, nama){
    document.getElementById('hapusInfo').textContent = nama;
    document.getElementById('hapusLink').href = BASE_URL + 'tindak-lanjut/hapus/' + id;
    openModal('modalHapus');
}

// ── Format tanggal ──
function formatTanggal(str){
    if(!str)return'—';
    const d=new Date(str);
    const months=['Jan','Feb','Mar','Apr','Mei','Jun','Jul','Ags','Sep','Okt','Nov','Des'];
    return d.getDate()+' '+months[d.getMonth()]+' '+d.getFullYear();
}

// ── Auto-open modal jika ada error ──
<?php if (session()->getFlashdata('errors')): ?>
openModal('modalTambah');
<?php endif; ?>
</script>
</body>
</html>