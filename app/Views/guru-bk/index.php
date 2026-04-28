<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Guru BK — BK SMA Karya Sekadau</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800&family=DM+Sans:ital,wght@0,300;0,400;0,500;1,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        /* ═══ CSS VARIABLES & RESET (sama persis dengan pelanggaran) ═══ */
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

        /* ═══ SIDEBAR (copy dari pelanggaran) ═══ */
        .sidebar{width:var(--sidebar-w);min-height:100vh;background:linear-gradient(175deg,var(--blue-900) 0%,var(--blue-800) 50%,var(--blue-700) 100%);position:fixed;left:0;top:0;bottom:0;z-index:100;display:flex;flex-direction:column;box-shadow:4px 0 32px rgba(10,22,40,.25);transition:var(--transition);overflow-y:auto;overflow-x:hidden;}
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

        /* ═══ LAYOUT ═══ */
        .main-wrapper{margin-left:var(--sidebar-w);flex:1;display:flex;flex-direction:column;min-height:100vh}
        .navbar{height:var(--navbar-h);background:white;border-bottom:1px solid var(--gray-200);display:flex;align-items:center;padding:0 32px;position:sticky;top:0;z-index:50;gap:16px;box-shadow:0 2px 16px rgba(19,64,160,.06)}
        .navbar-hamburger{display:none;background:none;border:none;font-size:20px;color:var(--blue-600);cursor:pointer;padding:8px;border-radius:8px;transition:var(--transition)}
        .navbar-search{flex:1;max-width:400px;position:relative}
        .navbar-search input{width:100%;padding:9px 16px 9px 40px;border-radius:50px;border:1.5px solid var(--gray-200);background:var(--gray-50);font-family:'DM Sans',sans-serif;font-size:13.5px;outline:none;transition:var(--transition)}
        .navbar-search input:focus{border-color:var(--blue-400);background:white;box-shadow:0 0 0 3px rgba(59,130,246,.12)}
        .navbar-search i{position:absolute;left:14px;top:50%;transform:translateY(-50%);color:var(--gray-400);font-size:13px}
        .navbar-actions{display:flex;align-items:center;gap:8px;margin-left:auto}
        .nav-action-btn{width:40px;height:40px;border-radius:50%;border:none;background:var(--gray-100);color:var(--gray-600);cursor:pointer;display:flex;align-items:center;justify-content:center;font-size:16px;position:relative;transition:var(--transition)}
        .nav-action-btn:hover{background:var(--blue-100);color:var(--blue-600)}
        .notif-dot{position:absolute;top:8px;right:8px;width:9px;height:9px;background:var(--danger);border-radius:50%;border:2px solid white}
        .navbar-date{font-size:13px;color:var(--gray-600);padding:0 16px;border-left:1px solid var(--gray-200);display:flex;flex-direction:column;align-items:flex-end;gap:1px}
        .navbar-date .date-main{font-weight:500;color:var(--gray-800);font-size:13.5px}
        .navbar-date .date-sub{font-size:11px;color:var(--gray-400)}
        .page-content{padding:28px 32px;flex:1}

        /* ═══ PAGE HEADER & BUTTONS ═══ */
        .page-header{display:flex;align-items:flex-start;justify-content:space-between;margin-bottom:28px;gap:16px}
        .page-header-left h1{font-family:'Outfit',sans-serif;font-size:26px;font-weight:700;color:var(--blue-900);letter-spacing:-.5px}
        .page-header-left p{font-size:14px;color:var(--gray-400);margin-top:4px}
        .page-header-right{display:flex;gap:10px;flex-shrink:0}
        .btn-primary{padding:10px 20px;border-radius:var(--radius-sm);border:none;background:var(--blue-500);color:white;font-family:'DM Sans',sans-serif;font-size:13.5px;font-weight:500;cursor:pointer;transition:var(--transition);display:inline-flex;align-items:center;gap:8px;text-decoration:none}
        .btn-primary:hover{background:var(--blue-600);box-shadow:0 4px 14px rgba(26,86,219,.4)}
        .btn-outline{padding:10px 20px;border-radius:var(--radius-sm);border:1.5px solid var(--gray-200);background:white;color:var(--gray-600);font-family:'DM Sans',sans-serif;font-size:13.5px;font-weight:500;cursor:pointer;transition:var(--transition);display:inline-flex;align-items:center;gap:8px}
        .btn-outline:hover{border-color:var(--blue-400);color:var(--blue-600);background:var(--blue-50)}
        .btn-danger{padding:10px 20px;border-radius:var(--radius-sm);border:none;background:var(--danger);color:white;font-family:'DM Sans',sans-serif;font-size:13.5px;font-weight:500;cursor:pointer;transition:var(--transition);display:inline-flex;align-items:center;gap:8px}
        .btn-danger:hover{background:#dc2626}
        .btn-success{padding:10px 20px;border-radius:var(--radius-sm);border:none;background:var(--success);color:white;font-family:'DM Sans',sans-serif;font-size:13.5px;font-weight:500;cursor:pointer;transition:var(--transition);display:inline-flex;align-items:center;gap:8px}
        .btn-cancel{padding:10px 20px;border-radius:var(--radius-sm);border:1.5px solid var(--gray-200);background:white;font-family:'DM Sans',sans-serif;font-size:13px;color:var(--gray-600);cursor:pointer;transition:var(--transition)}
        .btn-cancel:hover{background:var(--gray-50)}

        /* ═══ FLASH ═══ */
        .flash-alert{padding:14px 18px;border-radius:var(--radius-sm);margin-bottom:20px;display:flex;align-items:center;gap:10px;font-size:13.5px;font-weight:500}
        .flash-alert.success{background:#d1fae5;color:#065f46;border:1px solid #6ee7b7}
        .flash-alert.error{background:#fee2e2;color:#991b1b;border:1px solid #fca5a5}

        /* ═══ STATS ═══ */
        .stats-grid{display:grid;grid-template-columns:repeat(3,1fr);gap:18px;margin-bottom:24px}
        .stat-card{background:white;border-radius:var(--radius);padding:20px 22px;box-shadow:var(--shadow);transition:var(--transition);position:relative;overflow:hidden;animation:fadeInUp .4s ease both}
        .stat-card:hover{transform:translateY(-3px);box-shadow:var(--shadow-lg)}
        .stat-card::after{content:'';position:absolute;bottom:0;left:0;right:0;height:3px}
        .stat-card.s1::after{background:linear-gradient(90deg,var(--blue-500),var(--blue-300))}
        .stat-card.s2::after{background:linear-gradient(90deg,var(--success),#34d399)}
        .stat-card.s3::after{background:linear-gradient(90deg,var(--gray-400),var(--gray-200))}
        .stat-card:nth-child(1){animation-delay:.05s}.stat-card:nth-child(2){animation-delay:.10s}.stat-card:nth-child(3){animation-delay:.15s}
        .stat-top{display:flex;justify-content:space-between;align-items:flex-start;margin-bottom:14px}
        .stat-ico{width:46px;height:46px;border-radius:12px;display:flex;align-items:center;justify-content:center;font-size:18px}
        .stat-card.s1 .stat-ico{background:var(--blue-100);color:var(--blue-500)}
        .stat-card.s2 .stat-ico{background:#d1fae5;color:#059669}
        .stat-card.s3 .stat-ico{background:var(--gray-100);color:var(--gray-400)}
        .stat-num{font-family:'Outfit',sans-serif;font-size:34px;font-weight:800;color:var(--blue-900);line-height:1;letter-spacing:-1px}
        .stat-lbl{font-size:12px;color:var(--gray-400);margin-top:4px;font-weight:500}

        /* ═══ FILTER BAR ═══ */
        .filter-bar{background:white;border-radius:var(--radius);padding:14px 20px;box-shadow:var(--shadow);display:flex;align-items:center;gap:10px;margin-bottom:18px;flex-wrap:wrap}
        .filter-search{flex:1;min-width:200px;position:relative}
        .filter-search input{width:100%;padding:9px 14px 9px 36px;border-radius:var(--radius-sm);border:1.5px solid var(--gray-200);background:var(--gray-50);font-family:'DM Sans',sans-serif;font-size:13px;outline:none;transition:var(--transition)}
        .filter-search input:focus{border-color:var(--blue-400);background:white;box-shadow:0 0 0 3px rgba(59,130,246,.1)}
        .filter-search i{position:absolute;left:11px;top:50%;transform:translateY(-50%);color:var(--gray-400);font-size:12px}
        .filter-select{padding:9px 12px;border-radius:var(--radius-sm);border:1.5px solid var(--gray-200);background:white;font-family:'DM Sans',sans-serif;font-size:12.5px;color:var(--gray-700);outline:none;cursor:pointer;transition:var(--transition)}
        .filter-select:focus{border-color:var(--blue-400)}

        /* ═══ TABLE CARD ═══ */
        .card{background:white;border-radius:var(--radius);box-shadow:var(--shadow);overflow:hidden}
        .table-wrap{overflow-x:auto}
        table{width:100%;border-collapse:collapse;font-size:13px}
        thead th{padding:12px 16px;text-align:left;font-size:11px;font-weight:600;text-transform:uppercase;letter-spacing:.6px;color:var(--gray-400);background:var(--gray-50);border-bottom:1px solid var(--gray-200);white-space:nowrap}
        tbody td{padding:13px 16px;border-bottom:1px solid var(--gray-100);color:var(--gray-800);vertical-align:middle}
        tbody tr:last-child td{border-bottom:none}
        tbody tr{transition:var(--transition)}
        tbody tr:hover{background:var(--blue-50)}
        .td-guru{display:flex;align-items:center;gap:10px}
        .td-avatar{width:38px;height:38px;border-radius:50%;display:flex;align-items:center;justify-content:center;font-size:13px;font-weight:700;color:white;flex-shrink:0}
        .td-name{font-weight:600;color:var(--blue-900);font-size:13px}
        .td-sub{font-size:11px;color:var(--gray-400);margin-top:1px}
        .badge{display:inline-flex;align-items:center;gap:4px;padding:4px 10px;border-radius:20px;font-size:11px;font-weight:600;white-space:nowrap}
        .badge::before{content:'';width:5px;height:5px;border-radius:50%;background:currentColor}
        .badge.aktif{background:#d1fae5;color:#059669}
        .badge.nonaktif{background:var(--gray-100);color:var(--gray-400)}
        .badge.laki{background:var(--blue-100);color:var(--blue-600)}
        .badge.perempuan{background:#fce7f3;color:#be185d}
        .action-btns{display:flex;gap:5px}
        .btn-icon{width:30px;height:30px;border-radius:7px;border:none;cursor:pointer;display:flex;align-items:center;justify-content:center;font-size:12px;transition:var(--transition)}
        .btn-icon.view{background:var(--blue-100);color:var(--blue-600)}
        .btn-icon.edit{background:#fef3c7;color:#b45309}
        .btn-icon.del{background:#fee2e2;color:#dc2626}
        .btn-icon:hover{opacity:.8;transform:scale(1.08)}
        .pagination-bar{display:flex;align-items:center;justify-content:space-between;padding:14px 22px;border-top:1px solid var(--gray-100);font-size:12.5px;color:var(--gray-400)}

        /* ═══ MODAL ═══ */
        .modal-overlay{display:none;position:fixed;inset:0;background:rgba(10,22,40,.55);z-index:300;align-items:center;justify-content:center;padding:20px}
        .modal-overlay.show{display:flex}
        .modal{background:white;border-radius:var(--radius);width:100%;max-height:90vh;overflow-y:auto;box-shadow:0 24px 80px rgba(10,22,40,.3);animation:modalIn .25s ease}
        @keyframes modalIn{from{opacity:0;transform:scale(.95) translateY(10px)}to{opacity:1;transform:scale(1) translateY(0)}}
        .modal-sm{max-width:420px}.modal-md{max-width:560px}.modal-lg{max-width:620px}
        .modal-header{padding:22px 26px 18px;display:flex;align-items:center;justify-content:space-between;position:sticky;top:0;z-index:1}
        .modal-header.blue{background:linear-gradient(135deg,var(--blue-800),var(--blue-500))}
        .modal-header.yellow{background:linear-gradient(135deg,#92400e,var(--warning))}
        .modal-header.red{background:linear-gradient(135deg,#991b1b,var(--danger))}
        .modal-header h2{font-family:'Outfit',sans-serif;font-size:17px;font-weight:700;color:white;display:flex;align-items:center;gap:10px}
        .modal-close{width:32px;height:32px;border-radius:8px;border:none;background:rgba(255,255,255,.15);color:white;cursor:pointer;font-size:15px;display:flex;align-items:center;justify-content:center;transition:var(--transition)}
        .modal-close:hover{background:rgba(255,255,255,.25)}
        .modal-body{padding:24px 26px}
        .modal-footer{padding:16px 26px;border-top:1px solid var(--gray-100);display:flex;justify-content:flex-end;gap:10px;position:sticky;bottom:0;background:white}
        .form-row{display:grid;grid-template-columns:1fr 1fr;gap:16px;margin-bottom:16px}
        .form-row.full{grid-template-columns:1fr}
        .form-group{display:flex;flex-direction:column;gap:6px}
        .form-label{font-size:12.5px;font-weight:600;color:var(--gray-700)}
        .form-label span{color:var(--danger)}
        .form-input,.form-select{padding:10px 14px;border-radius:var(--radius-sm);border:1.5px solid var(--gray-200);background:var(--gray-50);font-family:'DM Sans',sans-serif;font-size:13.5px;color:var(--gray-800);outline:none;transition:var(--transition);width:100%}
        .form-input:focus,.form-select:focus{border-color:var(--blue-400);background:white;box-shadow:0 0 0 3px rgba(59,130,246,.1)}

        /* ═══ DETAIL ═══ */
        .detail-hero{background:linear-gradient(135deg,var(--blue-900),var(--blue-700));padding:26px;display:flex;align-items:center;gap:18px}
        .detail-avatar{width:64px;height:64px;border-radius:50%;display:flex;align-items:center;justify-content:center;font-family:'Outfit',sans-serif;font-size:22px;font-weight:800;color:white;box-shadow:0 4px 14px rgba(0,0,0,.3);flex-shrink:0}
        .detail-hero-name{font-family:'Outfit',sans-serif;font-size:19px;font-weight:700;color:white}
        .detail-hero-meta{font-size:12.5px;color:var(--blue-300);margin-top:3px}
        .detail-grid{display:grid;grid-template-columns:1fr 1fr;gap:18px;margin-bottom:18px}
        .detail-item .dl{font-size:11px;font-weight:700;text-transform:uppercase;letter-spacing:.8px;color:var(--gray-400);margin-bottom:4px}
        .detail-item .dv{font-size:13.5px;font-weight:500;color:var(--gray-800)}
        .detail-divider{height:1px;background:var(--gray-100);margin:18px 0}

        /* ═══ CONFIRM HAPUS ═══ */
        .confirm-icon{width:60px;height:60px;border-radius:50%;background:#fee2e2;display:flex;align-items:center;justify-content:center;font-size:26px;color:var(--danger);margin:0 auto 16px}
        .confirm-title{font-family:'Outfit',sans-serif;font-size:18px;font-weight:700;color:var(--gray-900);text-align:center;margin-bottom:8px}
        .confirm-msg{font-size:13.5px;color:var(--gray-500);text-align:center;line-height:1.6}
        .confirm-name{font-weight:700;color:var(--gray-800)}

        ::-webkit-scrollbar{width:6px;height:6px}
        ::-webkit-scrollbar-track{background:transparent}
        ::-webkit-scrollbar-thumb{background:var(--gray-200);border-radius:10px}
        ::-webkit-scrollbar-thumb:hover{background:var(--blue-300)}
        @keyframes fadeInUp{from{opacity:0;transform:translateY(16px)}to{opacity:1;transform:translateY(0)}}
        .overlay{display:none;position:fixed;inset:0;background:rgba(10,22,40,.4);z-index:90}
        .overlay.show{display:block}
        @media(max-width:768px){:root{--sidebar-w:0px}.sidebar{transform:translateX(-270px);width:270px}.sidebar.open{transform:translateX(0)}.main-wrapper{margin-left:0}.navbar-hamburger{display:flex}.page-content{padding:20px 18px}.stats-grid{grid-template-columns:1fr}.page-header{flex-direction:column}.form-row{grid-template-columns:1fr}}
    </style>
</head>
<body>

<div class="overlay" id="overlay" onclick="closeSidebar()"></div>

<!-- ════ MODAL TAMBAH ════ -->
<div class="modal-overlay" id="modalTambah">
    <div class="modal modal-lg">
        <div class="modal-header blue">
            <h2><i class="fa fa-plus-circle"></i> Tambah Data Guru BK</h2>
            <button class="modal-close" onclick="closeModal('modalTambah')"><i class="fa fa-times"></i></button>
        </div>
        <form action="<?= base_url('guru-bk/simpan') ?>" method="POST">
            <?= csrf_field() ?>
            <div class="modal-body">
                <div class="form-row full">
                    <div class="form-group">
                        <label class="form-label">Nama Lengkap <span>*</span></label>
                        <input type="text" class="form-input" name="nama" placeholder="Contoh: Rina Marlina, S.Pd" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label class="form-label">NIP <span>*</span></label>
                        <input type="text" class="form-input" name="nip" placeholder="Contoh: 198501012010012001" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Jenis Kelamin</label>
                        <select class="form-select" name="jenis_kelamin">
                            <option value="L">Laki-laki</option>
                            <option value="P">Perempuan</option>
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label class="form-label">Email <span>*</span></label>
                        <input type="email" class="form-input" name="email" placeholder="guru@sekolah.sch.id" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label">No. HP / WA</label>
                        <input type="text" class="form-input" name="no_hp" placeholder="Contoh: 08123456789">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label class="form-label">Kelas Pengampu</label>
                        <select class="form-select" name="kelas_pengampu">
                            <option value="Semua Kelas">Semua Kelas</option>
                            <option value="X">Kelas X</option>
                            <option value="XI">Kelas XI</option>
                            <option value="XII">Kelas XII</option>
                            <option value="X & XI">Kelas X & XI</option>
                            <option value="XI & XII">Kelas XI & XII</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Status</label>
                        <select class="form-select" name="status">
                            <option value="aktif">Aktif</option>
                            <option value="tidak aktif">Tidak Aktif</option>
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

<!-- ════ MODAL DETAIL ════ -->
<div class="modal-overlay" id="modalDetail">
    <div class="modal modal-md">
        <div class="detail-hero" id="detailHero">
            <div class="detail-avatar" id="detailAvatar">RN</div>
            <div style="flex:1">
                <div class="detail-hero-name" id="detailNama">—</div>
                <div class="detail-hero-meta" id="detailMeta">—</div>
            </div>
            <button class="modal-close" onclick="closeModal('modalDetail')"><i class="fa fa-times"></i></button>
        </div>
        <div class="modal-body">
            <div class="detail-grid">
                <div class="detail-item"><div class="dl">NIP</div><div class="dv" id="dNip">—</div></div>
                <div class="detail-item"><div class="dl">Jenis Kelamin</div><div class="dv" id="dJK">—</div></div>
                <div class="detail-item"><div class="dl">Email</div><div class="dv" id="dEmail">—</div></div>
                <div class="detail-item"><div class="dl">No. HP</div><div class="dv" id="dHp">—</div></div>
                <div class="detail-item"><div class="dl">Kelas Pengampu</div><div class="dv" id="dKelas">—</div></div>
                <div class="detail-item"><div class="dl">Status</div><div class="dv" id="dStatus">—</div></div>
            </div>
        </div>
        <div class="modal-footer">
            <button class="btn-cancel" onclick="closeModal('modalDetail')">Tutup</button>
            <button class="btn-outline" onclick="openEditFromDetail()"><i class="fa fa-pen"></i> Edit</button>
        </div>
    </div>
</div>

<!-- ════ MODAL EDIT ════ -->
<div class="modal-overlay" id="modalEdit">
    <div class="modal modal-lg">
        <div class="modal-header yellow">
            <h2><i class="fa fa-pen"></i> Edit Data Guru BK</h2>
            <button class="modal-close" onclick="closeModal('modalEdit')"><i class="fa fa-times"></i></button>
        </div>
        <form id="formEdit" action="" method="POST">
            <?= csrf_field() ?>
            <div class="modal-body">
                <div class="form-row full">
                    <div class="form-group">
                        <label class="form-label">Nama Lengkap <span>*</span></label>
                        <input type="text" class="form-input" name="nama" id="editNama" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label class="form-label">NIP <span>*</span></label>
                        <input type="text" class="form-input" name="nip" id="editNip" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Jenis Kelamin</label>
                        <select class="form-select" name="jenis_kelamin" id="editJK">
                            <option value="L">Laki-laki</option>
                            <option value="P">Perempuan</option>
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label class="form-label">Email <span>*</span></label>
                        <input type="email" class="form-input" name="email" id="editEmail" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label">No. HP / WA</label>
                        <input type="text" class="form-input" name="no_hp" id="editHp">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label class="form-label">Kelas Pengampu</label>
                        <select class="form-select" name="kelas_pengampu" id="editKelas">
                            <option value="Semua Kelas">Semua Kelas</option>
                            <option value="X">Kelas X</option>
                            <option value="XI">Kelas XI</option>
                            <option value="XII">Kelas XII</option>
                            <option value="X & XI">Kelas X & XI</option>
                            <option value="XI & XII">Kelas XI & XII</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Status</label>
                        <select class="form-select" name="status" id="editStatus">
                            <option value="aktif">Aktif</option>
                            <option value="tidak aktif">Tidak Aktif</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn-cancel" onclick="closeModal('modalEdit')">Batal</button>
                <button type="submit" class="btn-primary" style="background:var(--warning)"><i class="fa fa-save"></i> Simpan Perubahan</button>
            </div>
        </form>
    </div>
</div>

<!-- ════ MODAL HAPUS ════ -->
<div class="modal-overlay" id="modalHapus">
    <div class="modal modal-sm">
        <div class="modal-header red">
            <h2><i class="fa fa-trash"></i> Konfirmasi Hapus</h2>
            <button class="modal-close" onclick="closeModal('modalHapus')"><i class="fa fa-times"></i></button>
        </div>
        <div class="modal-body" style="text-align:center;padding:32px 26px">
            <div class="confirm-icon"><i class="fa fa-trash"></i></div>
            <div class="confirm-title">Hapus Data Guru BK?</div>
            <p class="confirm-msg">
                Anda akan menghapus data<br>
                <span class="confirm-name" id="hapusNama">—</span><br>
                <span style="color:var(--danger);font-size:12px;font-weight:600">Tindakan ini tidak dapat dibatalkan!</span>
            </p>
        </div>
        <div class="modal-footer" style="justify-content:center;gap:14px">
            <button class="btn-cancel" style="min-width:100px" onclick="closeModal('modalHapus')">Batal</button>
            <a id="hapusLink" href="#" class="btn-danger" style="min-width:120px;text-decoration:none;justify-content:center">
                <i class="fa fa-trash"></i> Ya, Hapus
            </a>
        </div>
    </div>
</div>

<!-- ════ SIDEBAR ════ -->
<aside class="sidebar" id="sidebar">
    <div class="sidebar-brand">
        <div class="brand-icon" style="background:white;padding:3px;border-radius:13px;overflow:hidden;">
            <img src="<?= base_url('img/logo_sma.png') ?>" alt="Logo" style="width:40px;height:40px;object-fit:contain;display:block;">
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
    </div>
    <div class="sidebar-section">
        <div class="sidebar-section-label">Pengelolaan</div>
        <a class="nav-item <?= str_starts_with(uri_string(),'laporan')?'active':'' ?>" href="<?= base_url('laporan') ?>">
            <i class="fa fa-file-lines"></i> Laporan &amp; Rekap
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
        <div class="navbar-search">
            <i class="fa fa-magnifying-glass"></i>
            <input type="text" placeholder="Cari guru BK...">
        </div>
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
        <div class="flash-alert success">
            <i class="fa fa-circle-check"></i>
            <?= session()->getFlashdata('success') ?>
            <button onclick="this.parentElement.remove()" style="margin-left:auto;background:none;border:none;cursor:pointer;color:#065f46;font-size:16px"><i class="fa fa-times"></i></button>
        </div>
        <?php endif; ?>
        <?php if (session()->getFlashdata('error')): ?>
        <div class="flash-alert error"><i class="fa fa-circle-exclamation"></i> <?= session()->getFlashdata('error') ?></div>
        <?php endif; ?>

        <!-- Page Header -->
        <div class="page-header">
            <div class="page-header-left">
                <h1>Data Guru BK</h1>
                <p>Kelola data seluruh guru Bimbingan &amp; Konseling SMA Karya Sekadau</p>
            </div>
            <div class="page-header-right">
                <button class="btn-primary" onclick="openModal('modalTambah')">
                    <i class="fa fa-plus"></i> Tambah Guru BK
                </button>
            </div>
        </div>

        <!-- Stat Cards -->
        <div class="stats-grid">
            <div class="stat-card s1">
                <div class="stat-top"><div class="stat-ico"><i class="fa fa-chalkboard-user"></i></div></div>
                <div class="stat-num"><?= $stats['total'] ?></div>
                <div class="stat-lbl">Total Guru BK</div>
            </div>
            <div class="stat-card s2">
                <div class="stat-top"><div class="stat-ico"><i class="fa fa-circle-check"></i></div></div>
                <div class="stat-num"><?= $stats['aktif'] ?></div>
                <div class="stat-lbl">Guru Aktif</div>
            </div>
            <div class="stat-card s3">
                <div class="stat-top"><div class="stat-ico"><i class="fa fa-circle-xmark"></i></div></div>
                <div class="stat-num"><?= $stats['tidak_aktif'] ?></div>
                <div class="stat-lbl">Tidak Aktif</div>
            </div>
        </div>

        <!-- Filter Bar -->
        <form method="GET" action="<?= base_url('guru-bk') ?>" id="formFilter">
            <div class="filter-bar">
                <div class="filter-search">
                    <i class="fa fa-magnifying-glass"></i>
                    <input type="text" name="q" placeholder="Cari nama, NIP, atau email..."
                           value="<?= esc($filter['q'] ?? '') ?>" oninput="debounceFilter()">
                </div>
                <select class="filter-select" name="status" onchange="submitFilter()">
                    <option value="">Semua Status</option>
                    <option value="aktif"       <?= ($filter['status'] ?? '') === 'aktif'       ? 'selected' : '' ?>>Aktif</option>
                    <option value="tidak aktif" <?= ($filter['status'] ?? '') === 'tidak aktif' ? 'selected' : '' ?>>Tidak Aktif</option>
                </select>
                <?php if (!empty($filter['q']) || !empty($filter['status'])): ?>
                <a href="<?= base_url('guru-bk') ?>" class="btn-outline" style="padding:8px 14px;font-size:12.5px">
                    <i class="fa fa-times"></i> Reset
                </a>
                <?php endif; ?>
            </div>
        </form>

        <!-- Table Card -->
        <div class="card" style="margin-bottom:28px">
            <div class="table-wrap">
                <table>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Guru BK</th>
                            <th>NIP</th>
                            <th>Jenis Kelamin</th>
                            <th>No. HP</th>
                            <th>Kelas Pengampu</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (empty($listGuru)): ?>
                        <tr>
                            <td colspan="8" style="text-align:center;padding:40px;color:var(--gray-400)">
                                <i class="fa fa-inbox" style="font-size:28px;display:block;margin-bottom:10px;color:var(--gray-200)"></i>
                                Belum ada data guru BK
                            </td>
                        </tr>
                        <?php else: ?>
                        <?php
                        $avatarColors = ['#1a56db','#10b981','#f59e0b','#8b5cf6','#ef4444','#ec4899','#06b6d4','#f97316'];
                        foreach ($listGuru as $i => $g):
                            $inisial = strtoupper(substr(implode('', array_map(fn($w) => $w[0], explode(' ', $g['nama']))), 0, 2));
                            $color   = $avatarColors[$i % count($avatarColors)];
                            $jsNama  = addslashes($g['nama']);
                            $jsNip   = addslashes($g['nip']);
                            $jsEmail = addslashes($g['email'] ?? '');
                            $jsHp    = addslashes($g['no_hp'] ?? '');
                            $jsKelas = addslashes($g['kelas_pengampu'] ?? '');
                        ?>
                        <tr>
                            <td style="color:var(--gray-400);font-weight:500"><?= $i + 1 ?></td>
                            <td>
                                <div class="td-guru">
                                    <div class="td-avatar" style="background:<?= $color ?>"><?= $inisial ?></div>
                                    <div>
                                        <div class="td-name"><?= esc($g['nama']) ?></div>
                                        <div class="td-sub"><?= esc($g['email'] ?? '—') ?></div>
                                    </div>
                                </div>
                            </td>
                            <td style="font-family:monospace;font-size:12px;color:var(--gray-600)"><?= esc($g['nip']) ?></td>
                            <td>
                                <span class="badge <?= $g['jenis_kelamin'] === 'L' ? 'laki' : 'perempuan' ?>">
                                    <?= $g['jenis_kelamin'] === 'L' ? 'Laki-laki' : 'Perempuan' ?>
                                </span>
                            </td>
                            <td style="color:var(--gray-600)"><?= esc($g['no_hp'] ?? '—') ?></td>
                            <td style="color:var(--gray-600)"><?= esc($g['kelas_pengampu'] ?? '—') ?></td>
                            <td>
                                <span class="badge <?= $g['status'] === 'aktif' ? 'aktif' : 'nonaktif' ?>">
                                    <?= ucfirst($g['status']) ?>
                                </span>
                            </td>
                            <td>
                                <div class="action-btns">
                                    <button class="btn-icon view" title="Detail"
                                        onclick="openDetail(<?= $g['id'] ?>,'<?= $jsNama ?>','<?= $jsNip ?>','<?= $g['jenis_kelamin'] ?>','<?= $jsEmail ?>','<?= $jsHp ?>','<?= $jsKelas ?>','<?= $g['status'] ?>')">
                                        <i class="fa fa-eye"></i>
                                    </button>
                                    <button class="btn-icon edit" title="Edit"
                                        onclick="openEdit(<?= $g['id'] ?>,'<?= $jsNama ?>','<?= $jsNip ?>','<?= $g['jenis_kelamin'] ?>','<?= $jsEmail ?>','<?= $jsHp ?>','<?= $jsKelas ?>','<?= $g['status'] ?>')">
                                        <i class="fa fa-pen"></i>
                                    </button>
                                    <button class="btn-icon del" title="Hapus"
                                        onclick="openHapus(<?= $g['id'] ?>,'<?= $jsNama ?>')">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
            <div class="pagination-bar">
                <span>Menampilkan <?= count($listGuru ?? []) ?> data</span>
            </div>
        </div>

    </div>
</div>

<script>
// ── CLOCK ──
function updateClock(){
    const d=new Date(),days=['Minggu','Senin','Selasa','Rabu','Kamis','Jumat','Sabtu'],months=['Jan','Feb','Mar','Apr','Mei','Jun','Jul','Ags','Sep','Okt','Nov','Des'];
    document.getElementById('dateLive').textContent=days[d.getDay()]+', '+d.getDate()+' '+months[d.getMonth()]+' '+d.getFullYear();
    document.getElementById('timeLive').textContent=d.getHours().toString().padStart(2,'0')+':'+d.getMinutes().toString().padStart(2,'0')+':'+d.getSeconds().toString().padStart(2,'0')+' WIB';
}
setInterval(updateClock,1000); updateClock();

function toggleSidebar(){document.getElementById('sidebar').classList.toggle('open');document.getElementById('overlay').classList.toggle('show')}
function closeSidebar(){document.getElementById('sidebar').classList.remove('open');document.getElementById('overlay').classList.remove('show')}
function toggleFS(){if(!document.fullscreenElement){document.documentElement.requestFullscreen();document.getElementById('fsIcon').className='fa fa-compress'}else{document.exitFullscreen();document.getElementById('fsIcon').className='fa fa-expand'}}

// ── MODAL ──
function openModal(id){document.getElementById(id).classList.add('show')}
function closeModal(id){document.getElementById(id).classList.remove('show')}
document.querySelectorAll('.modal-overlay').forEach(m=>{
    m.addEventListener('click',e=>{if(e.target===m) m.classList.remove('show')});
});

// ── State untuk edit dari detail ──
let currentDetail = null;

// ── DETAIL ──
function openDetail(id, nama, nip, jk, email, hp, kelas, status) {
    currentDetail = {id, nama, nip, jk, email, hp, kelas, status};
    const inisial = nama.trim().split(' ').map(w=>w[0]).join('').toUpperCase().slice(0,2);
    document.getElementById('detailAvatar').textContent = inisial;
    document.getElementById('detailNama').textContent   = nama;
    document.getElementById('detailMeta').textContent   = nip + ' • ' + (jk === 'L' ? 'Laki-laki' : 'Perempuan');
    document.getElementById('dNip').textContent         = nip;
    document.getElementById('dJK').innerHTML            = `<span class="badge ${jk==='L'?'laki':'perempuan'}">${jk==='L'?'Laki-laki':'Perempuan'}</span>`;
    document.getElementById('dEmail').textContent       = email || '—';
    document.getElementById('dHp').textContent          = hp    || '—';
    document.getElementById('dKelas').textContent       = kelas || '—';
    document.getElementById('dStatus').innerHTML        = `<span class="badge ${status==='aktif'?'aktif':'nonaktif'}">${status.charAt(0).toUpperCase()+status.slice(1)}</span>`;
    openModal('modalDetail');
}

function openEditFromDetail() {
    closeModal('modalDetail');
    const r = currentDetail;
    if (!r) return;
    openEdit(r.id, r.nama, r.nip, r.jk, r.email, r.hp, r.kelas, r.status);
}

// ── EDIT ──
function openEdit(id, nama, nip, jk, email, hp, kelas, status) {
    document.getElementById('formEdit').action = `<?= base_url('guru-bk/update/') ?>${id}`;
    document.getElementById('editNama').value  = nama;
    document.getElementById('editNip').value   = nip;
    document.getElementById('editJK').value    = jk;
    document.getElementById('editEmail').value = email;
    document.getElementById('editHp').value    = hp;
    document.getElementById('editKelas').value = kelas;
    document.getElementById('editStatus').value= status;
    openModal('modalEdit');
}

// ── HAPUS ──
function openHapus(id, nama) {
    document.getElementById('hapusNama').textContent = nama;
    document.getElementById('hapusLink').href = `<?= base_url('guru-bk/hapus/') ?>${id}`;
    openModal('modalHapus');
}

// ── FILTER ──
let filterTimer;
function debounceFilter(){clearTimeout(filterTimer);filterTimer=setTimeout(()=>submitFilter(),500)}
function submitFilter(){document.getElementById('formFilter').submit()}
</script>
</body>
</html>