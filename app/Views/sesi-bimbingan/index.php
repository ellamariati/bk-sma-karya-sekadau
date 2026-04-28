<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Sesi Bimbingan — BK SMA Karya Sekadau</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800&family=DM+Sans:ital,wght@0,300;0,400;0,500;1,400&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
<style>
:root{
  --blue-900:#0a1628;--blue-800:#0d2045;--blue-700:#0f2d6b;
  --blue-600:#1340a0;--blue-500:#1a56db;--blue-400:#3b82f6;
  --blue-300:#93c5fd;--blue-200:#bfdbfe;--blue-100:#dbeafe;--blue-50:#eff6ff;
  --gray-50:#f8fafc;--gray-100:#f1f5f9;--gray-200:#e2e8f0;
  --gray-400:#94a3b8;--gray-600:#475569;--gray-700:#334155;--gray-800:#1e293b;
  --success:#10b981;--warning:#f59e0b;--danger:#ef4444;--purple:#8b5cf6;--teal:#14b8a6;
  --sidebar-w:270px;--navbar-h:72px;
  --radius:16px;--radius-sm:10px;
  --shadow:0 4px 24px rgba(19,64,160,.10);
  --shadow-lg:0 12px 40px rgba(19,64,160,.18);
  --transition:all .3s cubic-bezier(.4,0,.2,1);
}
*,*::before,*::after{box-sizing:border-box;margin:0;padding:0}
body{font-family:'DM Sans',sans-serif;background:var(--gray-50);color:var(--gray-800);min-height:100vh;display:flex;overflow-x:hidden}

/* ── SIDEBAR ── */
.sidebar{width:var(--sidebar-w);min-height:100vh;background:linear-gradient(175deg,var(--blue-900) 0%,var(--blue-800) 50%,var(--blue-700) 100%);position:fixed;left:0;top:0;bottom:0;z-index:100;display:flex;flex-direction:column;box-shadow:4px 0 32px rgba(10,22,40,.25);transition:var(--transition);overflow-y:auto;overflow-x:hidden}
.sidebar-brand{padding:28px 24px 22px;display:flex;align-items:center;gap:14px;border-bottom:1px solid rgba(255,255,255,.08);flex-shrink:0}
.brand-text .brand-title{font-family:'Outfit',sans-serif;font-weight:700;font-size:17px;color:white;line-height:1.1}
.brand-text .brand-sub{font-size:11px;color:var(--blue-300);margin-top:2px;letter-spacing:.4px}
.sidebar-section{padding:18px 14px 6px}
.sidebar-section-label{font-size:10px;font-weight:600;text-transform:uppercase;letter-spacing:1.5px;color:rgba(147,197,253,.5);padding:0 10px;margin-bottom:6px}
.nav-item{display:flex;align-items:center;gap:12px;padding:11px 14px;border-radius:var(--radius-sm);color:rgba(255,255,255,.65);text-decoration:none;font-size:14px;font-weight:400;transition:var(--transition);cursor:pointer;position:relative;margin-bottom:2px}
.nav-item:hover{background:rgba(255,255,255,.08);color:white}
.nav-item.active{background:linear-gradient(90deg,rgba(26,86,219,.6),rgba(26,86,219,.2));color:white;font-weight:500;box-shadow:inset 0 0 0 1px rgba(59,130,246,.3)}
.nav-item.active::before{content:'';position:absolute;left:0;top:20%;bottom:20%;width:3px;background:var(--blue-400);border-radius:0 4px 4px 0}
.nav-item i{width:20px;font-size:15px;text-align:center;flex-shrink:0}
.nav-badge{margin-left:auto;background:var(--danger);color:white;font-size:10px;font-weight:600;padding:2px 7px;border-radius:20px}
.nav-badge.warn{background:var(--warning);color:#92400e}
.sidebar-footer{margin-top:auto;padding:16px 14px;border-top:1px solid rgba(255,255,255,.08);flex-shrink:0}
.user-card{display:flex;align-items:center;gap:12px;padding:10px 12px;border-radius:var(--radius-sm);background:rgba(255,255,255,.07);cursor:pointer;transition:var(--transition)}
.user-card:hover{background:rgba(255,255,255,.12)}
.user-avatar{width:38px;height:38px;border-radius:50%;background:linear-gradient(135deg,var(--blue-500),#60a5fa);display:flex;align-items:center;justify-content:center;font-weight:700;font-size:15px;color:white;flex-shrink:0}
.user-info .user-name{font-size:13px;font-weight:500;color:white}
.user-info .user-role{font-size:11px;color:var(--blue-300);margin-top:1px}
.logout-icon{margin-left:auto;color:rgba(255,255,255,.4);font-size:13px;transition:var(--transition)}
.user-card:hover .logout-icon{color:var(--danger)}

/* ── MAIN ── */
.main-wrapper{margin-left:var(--sidebar-w);flex:1;display:flex;flex-direction:column;min-height:100vh}
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
.date-main{font-weight:500;color:var(--gray-800);font-size:13.5px}
.date-sub{font-size:11px;color:var(--gray-400)}

/* ── PAGE ── */
.page-content{padding:28px 32px;flex:1}
.page-header{display:flex;align-items:flex-start;justify-content:space-between;margin-bottom:28px;gap:16px}
.page-header-left h1{font-family:'Outfit',sans-serif;font-size:26px;font-weight:700;color:var(--blue-900);letter-spacing:-.5px}
.page-header-left p{font-size:14px;color:var(--gray-400);margin-top:4px}
.page-header-right{display:flex;gap:10px;flex-shrink:0}
.btn-primary{padding:10px 20px;border-radius:var(--radius-sm);border:none;background:var(--blue-500);color:white;font-family:'DM Sans',sans-serif;font-size:13.5px;font-weight:500;cursor:pointer;transition:var(--transition);display:inline-flex;align-items:center;gap:8px;text-decoration:none}
.btn-primary:hover{background:var(--blue-600);box-shadow:0 4px 14px rgba(26,86,219,.4)}
.btn-outline{padding:10px 20px;border-radius:var(--radius-sm);border:1.5px solid var(--gray-200);background:white;color:var(--gray-600);font-family:'DM Sans',sans-serif;font-size:13.5px;font-weight:500;cursor:pointer;transition:var(--transition);display:inline-flex;align-items:center;gap:8px;text-decoration:none}
.btn-outline:hover{border-color:var(--blue-400);color:var(--blue-600);background:var(--blue-50)}
.btn-cancel{padding:10px 20px;border-radius:var(--radius-sm);border:1.5px solid var(--gray-200);background:white;font-family:'DM Sans',sans-serif;font-size:13px;color:var(--gray-600);cursor:pointer;transition:var(--transition)}
.btn-cancel:hover{background:var(--gray-50)}
.btn-danger{padding:10px 20px;border-radius:var(--radius-sm);border:none;background:var(--danger);color:white;font-family:'DM Sans',sans-serif;font-size:13.5px;font-weight:500;cursor:pointer;transition:var(--transition);display:inline-flex;align-items:center;gap:8px}
.btn-danger:hover{background:#dc2626}

/* ── STATS ── */
.stats-grid{display:grid;grid-template-columns:repeat(4,1fr);gap:18px;margin-bottom:24px}
.stat-card{background:white;border-radius:var(--radius);padding:20px 22px;box-shadow:var(--shadow);transition:var(--transition);position:relative;overflow:hidden;animation:fadeInUp .4s ease both;border-left:4px solid transparent}
.stat-card:hover{transform:translateY(-3px);box-shadow:var(--shadow-lg)}
.stat-card.s1{border-left-color:var(--blue-500)}
.stat-card.s2{border-left-color:var(--teal)}
.stat-card.s3{border-left-color:var(--purple)}
.stat-card.s4{border-left-color:var(--warning)}
.stat-top{display:flex;justify-content:space-between;align-items:flex-start;margin-bottom:14px}
.stat-ico{width:46px;height:46px;border-radius:12px;display:flex;align-items:center;justify-content:center;font-size:18px}
.stat-card.s1 .stat-ico{background:var(--blue-100);color:var(--blue-500)}
.stat-card.s2 .stat-ico{background:#ccfbf1;color:#0f766e}
.stat-card.s3 .stat-ico{background:#ede9fe;color:#7c3aed}
.stat-card.s4 .stat-ico{background:#fef3c7;color:#d97706}
.stat-trend{font-size:11px;font-weight:600;padding:3px 8px;border-radius:20px}
.stat-trend.up{background:#d1fae5;color:#059669}
.stat-trend.same{background:var(--gray-100);color:var(--gray-600)}
.stat-num{font-family:'Outfit',sans-serif;font-size:34px;font-weight:800;color:var(--blue-900);line-height:1;letter-spacing:-1px}
.stat-lbl{font-size:12px;color:var(--gray-400);margin-top:4px;font-weight:500}

/* ── FILTER BAR ── */
.filter-bar{background:white;border-radius:var(--radius);padding:14px 20px;box-shadow:var(--shadow);display:flex;align-items:center;gap:10px;margin-bottom:18px;flex-wrap:wrap}
.filter-search{flex:1;min-width:200px;position:relative}
.filter-search input{width:100%;padding:9px 14px 9px 36px;border-radius:var(--radius-sm);border:1.5px solid var(--gray-200);background:var(--gray-50);font-family:'DM Sans',sans-serif;font-size:13px;color:var(--gray-800);outline:none;transition:var(--transition)}
.filter-search input:focus{border-color:var(--blue-400);background:white;box-shadow:0 0 0 3px rgba(59,130,246,.1)}
.filter-search i{position:absolute;left:11px;top:50%;transform:translateY(-50%);color:var(--gray-400);font-size:12px}
.filter-select{padding:9px 12px;border-radius:var(--radius-sm);border:1.5px solid var(--gray-200);background:white;font-family:'DM Sans',sans-serif;font-size:12.5px;color:var(--gray-700);outline:none;cursor:pointer;transition:var(--transition)}
.filter-select:focus{border-color:var(--blue-400)}

/* ── TABLE CARD ── */
.card{background:white;border-radius:var(--radius);box-shadow:var(--shadow);overflow:hidden}
.table-wrap{overflow-x:auto}
table{width:100%;border-collapse:collapse;font-size:13px}
thead th{padding:12px 16px;text-align:left;font-size:11px;font-weight:700;text-transform:uppercase;letter-spacing:.6px;color:var(--gray-400);background:var(--gray-50);border-bottom:2px solid var(--gray-200);white-space:nowrap}
tbody td{padding:13px 16px;border-bottom:1px solid var(--gray-100);color:var(--gray-800);vertical-align:middle}
tbody tr:last-child td{border-bottom:none}
tbody tr:hover{background:var(--blue-50);transition:var(--transition)}
.td-student{display:flex;align-items:center;gap:10px}
.td-avatar{width:34px;height:34px;border-radius:50%;display:flex;align-items:center;justify-content:center;font-size:12px;font-weight:700;color:white;flex-shrink:0}
.td-name{font-weight:600;color:var(--blue-900);font-size:13px}
.td-sub{font-size:11px;color:var(--gray-400);margin-top:1px}

/* ── BADGES ── */
.badge{display:inline-flex;align-items:center;gap:4px;padding:4px 10px;border-radius:20px;font-size:11px;font-weight:600;white-space:nowrap}
.badge::before{content:'';width:5px;height:5px;border-radius:50%;background:currentColor;flex-shrink:0}
.badge.individual{background:var(--blue-100);color:var(--blue-600)}
.badge.kelompok{background:#ede9fe;color:#7c3aed}
.badge.klasikal{background:#ccfbf1;color:#0f766e}
.badge.online{background:#fef3c7;color:#d97706}
.badge.selesai{background:#d1fae5;color:#059669}
.badge.berlangsung{background:#fef3c7;color:#d97706}
.badge.dijadwalkan{background:var(--blue-100);color:var(--blue-600)}

/* ── DURASI PILL ── */
.durasi-pill{display:inline-flex;align-items:center;gap:5px;padding:4px 10px;background:var(--gray-100);border-radius:20px;font-size:11.5px;font-weight:600;color:var(--gray-700)}
.durasi-pill i{font-size:10px;color:var(--gray-400)}

/* ── ACTION BTNS ── */
.action-btns{display:flex;gap:5px}
.btn-icon{width:30px;height:30px;border-radius:7px;border:none;cursor:pointer;display:flex;align-items:center;justify-content:center;font-size:12px;transition:var(--transition)}
.btn-icon.view{background:var(--blue-100);color:var(--blue-600)}
.btn-icon.edit{background:#fef3c7;color:#b45309}
.btn-icon.del{background:#fee2e2;color:#dc2626}
.btn-icon.check{background:#d1fae5;color:#059669}
.btn-icon:hover{opacity:.8;transform:scale(1.08)}

/* ── PAGINATION ── */
.pagination-bar{display:flex;align-items:center;justify-content:space-between;padding:14px 22px;border-top:1px solid var(--gray-100);font-size:12.5px;color:var(--gray-400)}
.pagination-btns{display:flex;gap:5px}
.pg-btn{width:32px;height:32px;border-radius:8px;border:1.5px solid var(--gray-200);background:white;display:flex;align-items:center;justify-content:center;cursor:pointer;font-size:12.5px;color:var(--gray-600);font-family:'DM Sans',sans-serif;transition:var(--transition)}
.pg-btn:hover{border-color:var(--blue-400);color:var(--blue-600)}
.pg-btn.active{background:var(--blue-500);border-color:var(--blue-500);color:white}

/* ── MODAL ── */
.modal-overlay{display:none;position:fixed;inset:0;background:rgba(10,22,40,.55);z-index:300;align-items:center;justify-content:center;padding:20px}
.modal-overlay.show{display:flex}
.modal{background:white;border-radius:var(--radius);width:100%;max-height:90vh;overflow-y:auto;box-shadow:0 24px 80px rgba(10,22,40,.3);animation:modalIn .25s ease}
.modal-sm{max-width:440px}.modal-md{max-width:620px}.modal-lg{max-width:720px}
@keyframes modalIn{from{opacity:0;transform:scale(.95) translateY(10px)}to{opacity:1;transform:scale(1) translateY(0)}}
.modal-header{padding:22px 26px 18px;display:flex;align-items:center;justify-content:space-between;position:sticky;top:0;z-index:1}
.modal-header.blue{background:linear-gradient(135deg,var(--blue-800),var(--blue-500))}
.modal-header.teal{background:linear-gradient(135deg,#065f46,var(--teal))}
.modal-header.red{background:linear-gradient(135deg,#991b1b,var(--danger))}
.modal-header.yellow{background:linear-gradient(135deg,#92400e,var(--warning))}
.modal-header h2{font-family:'Outfit',sans-serif;font-size:17px;font-weight:700;color:white;display:flex;align-items:center;gap:10px}
.modal-close{width:32px;height:32px;border-radius:8px;border:none;background:rgba(255,255,255,.15);color:white;cursor:pointer;font-size:15px;display:flex;align-items:center;justify-content:center;transition:var(--transition)}
.modal-close:hover{background:rgba(255,255,255,.25)}
.modal-body{padding:24px 26px}
.modal-footer{padding:16px 26px;border-top:1px solid var(--gray-100);display:flex;justify-content:flex-end;gap:10px;position:sticky;bottom:0;background:white}
.form-row{display:grid;grid-template-columns:1fr 1fr;gap:16px;margin-bottom:16px}
.form-row.full{grid-template-columns:1fr}
.form-row.three{grid-template-columns:1fr 1fr 1fr}
.form-group{display:flex;flex-direction:column;gap:6px}
.form-label{font-size:12.5px;font-weight:600;color:var(--gray-700)}
.form-label span{color:var(--danger)}
.form-input,.form-select,.form-textarea{padding:10px 14px;border-radius:var(--radius-sm);border:1.5px solid var(--gray-200);background:var(--gray-50);font-family:'DM Sans',sans-serif;font-size:13.5px;color:var(--gray-800);outline:none;transition:var(--transition);width:100%}
.form-input:focus,.form-select:focus,.form-textarea:focus{border-color:var(--blue-400);background:white;box-shadow:0 0 0 3px rgba(59,130,246,.1)}
.form-textarea{resize:vertical;min-height:88px;line-height:1.6}

/* ── DETAIL MODAL ── */
.detail-hero{background:linear-gradient(135deg,var(--blue-900),var(--teal));padding:26px;display:flex;align-items:center;gap:18px}
.detail-avatar{width:64px;height:64px;border-radius:50%;display:flex;align-items:center;justify-content:center;font-family:'Outfit',sans-serif;font-size:22px;font-weight:800;color:white;box-shadow:0 4px 14px rgba(0,0,0,.3);flex-shrink:0}
.detail-hero-name{font-family:'Outfit',sans-serif;font-size:19px;font-weight:700;color:white}
.detail-hero-meta{font-size:12.5px;color:rgba(255,255,255,.75);margin-top:3px}
.detail-grid{display:grid;grid-template-columns:1fr 1fr;gap:16px;margin-bottom:18px}
.detail-item .dl{font-size:11px;font-weight:700;text-transform:uppercase;letter-spacing:.8px;color:var(--gray-400);margin-bottom:4px}
.detail-item .dv{font-size:13.5px;font-weight:500;color:var(--gray-800)}
.detail-divider{height:1px;background:var(--gray-100);margin:18px 0}
.detail-catatan{background:var(--gray-50);border-radius:var(--radius-sm);padding:14px;font-size:13px;color:var(--gray-600);line-height:1.7;border-left:3px solid var(--teal)}

/* ── CONFIRM MODAL ── */
.confirm-icon{width:60px;height:60px;border-radius:50%;background:#fee2e2;display:flex;align-items:center;justify-content:center;font-size:26px;color:var(--danger);margin:0 auto 16px}
.confirm-title{font-family:'Outfit',sans-serif;font-size:18px;font-weight:700;color:var(--blue-900);text-align:center;margin-bottom:8px}
.confirm-msg{font-size:13.5px;color:var(--gray-500);text-align:center;line-height:1.6}

/* ── ALERT ── */
.alert{padding:12px 18px;border-radius:var(--radius-sm);margin-bottom:20px;display:flex;align-items:center;gap:10px;font-size:13.5px;font-weight:500}
.alert-success{background:#d1fae5;color:#065f46;border:1px solid #6ee7b7}
.alert-error{background:#fee2e2;color:#991b1b;border:1px solid #fca5a5}
.alert-close{margin-left:auto;cursor:pointer;opacity:.6}.alert-close:hover{opacity:1}

/* ── TIMELINE SECTION ── */
.timeline-row{display:flex;align-items:center;gap:10px;margin-bottom:18px}
.timeline-row .tl-icon{width:42px;height:42px;border-radius:50%;background:linear-gradient(135deg,var(--blue-500),var(--teal));display:flex;align-items:center;justify-content:center;color:white;font-size:15px;flex-shrink:0;box-shadow:0 4px 12px rgba(20,184,166,.3)}
.timeline-row .tl-content{flex:1}
.timeline-row .tl-title{font-weight:600;font-size:13.5px;color:var(--blue-900)}
.timeline-row .tl-sub{font-size:12px;color:var(--gray-400);margin-top:2px}

/* ── EMPTY STATE ── */
.empty-state{text-align:center;padding:56px 20px;color:var(--gray-400)}
.empty-state i{font-size:42px;color:var(--gray-200);display:block;margin-bottom:14px}
.empty-state p{font-size:14px}

/* ── OVERLAY & TOAST ── */
.overlay{display:none;position:fixed;inset:0;background:rgba(10,22,40,.4);z-index:90}
.overlay.show{display:block}
.toast-container{position:fixed;bottom:28px;right:28px;z-index:999;display:flex;flex-direction:column;gap:10px}
.toast{background:white;border-radius:12px;padding:14px 18px;box-shadow:0 8px 30px rgba(10,22,40,.2);display:flex;align-items:center;gap:12px;font-size:13.5px;font-weight:500;animation:slideIn .3s ease;min-width:280px;border-left:4px solid}
.toast.success{border-color:var(--success);color:#065f46}
.toast.error{border-color:var(--danger);color:#991b1b}
.toast.info{border-color:var(--blue-500);color:var(--blue-700)}
.toast i{font-size:16px}

/* ── ANIMATIONS ── */
@keyframes fadeInUp{from{opacity:0;transform:translateY(16px)}to{opacity:1;transform:translateY(0)}}
@keyframes slideIn{from{opacity:0;transform:translateX(30px)}to{opacity:1;transform:translateX(0)}}
@keyframes modalIn{from{opacity:0;transform:scale(.95) translateY(10px)}to{opacity:1;transform:scale(1) translateY(0)}}

/* ── SCROLLBAR ── */
::-webkit-scrollbar{width:6px;height:6px}
::-webkit-scrollbar-track{background:transparent}
::-webkit-scrollbar-thumb{background:var(--gray-200);border-radius:10px}
::-webkit-scrollbar-thumb:hover{background:var(--blue-300)}

/* ── RESPONSIVE ── */
@media(max-width:1200px){.stats-grid{grid-template-columns:repeat(2,1fr)}}
@media(max-width:768px){
  :root{--sidebar-w:0px}
  .sidebar{transform:translateX(-270px);width:270px}
  .sidebar.open{transform:translateX(0)}
  .main-wrapper{margin-left:0}
  .navbar-hamburger{display:flex}
  .navbar,.page-content{padding:0 18px}
  .page-content{padding:20px 18px}
  .stats-grid{grid-template-columns:1fr 1fr}
  .page-header{flex-direction:column}
  .form-row,.form-row.three{grid-template-columns:1fr}
}
@media(max-width:480px){.stats-grid{grid-template-columns:1fr}}
</style>
</head>
<body>

<div class="overlay" id="overlay" onclick="closeSidebar()"></div>
<div class="toast-container" id="toastContainer"></div>

<!-- ════ MODAL TAMBAH SESI ════ -->
<div class="modal-overlay" id="modalTambah">
  <div class="modal modal-lg">
    <div class="modal-header blue">
      <h2><i class="fa fa-plus-circle"></i> Tambah Sesi Bimbingan</h2>
      <button class="modal-close" onclick="closeModal('modalTambah')"><i class="fa fa-times"></i></button>
    </div>
    <form action="<?= base_url('sesi-bimbingan/simpan') ?>" method="POST">
      <?= csrf_field() ?>
      <div class="modal-body">
        <div class="form-row">
          <div class="form-group">
            <label class="form-label">Nama Siswa <span>*</span></label>
            <select name="siswa_id" class="form-select" required>
              <option value="">-- Pilih Siswa --</option>
              <?php foreach ($list_siswa as $s): ?>
              <option value="<?= $s['id'] ?>" <?= old('siswa_id')==$s['id']?'selected':'' ?>><?= esc($s['nama']) ?> — <?= esc($s['kelas']) ?></option>
              <?php endforeach; ?>
            </select>
          </div>
          <div class="form-group">
            <label class="form-label">Konselor <span>*</span></label>
            <select name="konselor" class="form-select" required>
              <option value="">-- Pilih Konselor --</option>
              <?php foreach ($list_konselor ?? [] as $k): ?>
              <option value="<?= esc($k['nama']) ?>" <?= old('konselor')==$k['nama']?'selected':'' ?>><?= esc($k['nama']) ?></option>
              <?php endforeach; ?>
              <option value="Ibu Rina Marlina, S.Pd" <?= old('konselor')=='Ibu Rina Marlina, S.Pd'?'selected':'' ?>>Ibu Rina Marlina, S.Pd</option>
            </select>
          </div>
        </div>
        <div class="form-row three">
          <div class="form-group">
            <label class="form-label">Tanggal <span>*</span></label>
            <input type="date" name="tanggal" class="form-input" value="<?= old('tanggal', date('Y-m-d')) ?>" required>
          </div>
          <div class="form-group">
            <label class="form-label">Waktu Mulai <span>*</span></label>
            <input type="time" name="waktu_mulai" class="form-input" value="<?= old('waktu_mulai', '08:00') ?>" required>
          </div>
          <div class="form-group">
            <label class="form-label">Waktu Selesai</label>
            <input type="time" name="waktu_selesai" class="form-input" value="<?= old('waktu_selesai', '09:00') ?>">
          </div>
        </div>
        <div class="form-row">
          <div class="form-group">
            <label class="form-label">Jenis Sesi <span>*</span></label>
            <select name="jenis_sesi" class="form-select" required>
              <option value="">-- Pilih Jenis --</option>
              <option value="individual"  <?= old('jenis_sesi')=='individual'?'selected':'' ?>>Individual</option>
              <option value="kelompok"    <?= old('jenis_sesi')=='kelompok'?'selected':'' ?>>Kelompok</option>
              <option value="klasikal"    <?= old('jenis_sesi')=='klasikal'?'selected':'' ?>>Klasikal</option>
              <option value="online"      <?= old('jenis_sesi')=='online'?'selected':'' ?>>Online</option>
            </select>
          </div>
          <div class="form-group">
            <label class="form-label">Status <span>*</span></label>
            <select name="status" class="form-select" required>
              <option value="dijadwalkan" <?= old('status')=='dijadwalkan'?'selected':'' ?>>Dijadwalkan</option>
              <option value="berlangsung" <?= old('status')=='berlangsung'?'selected':'' ?>>Berlangsung</option>
              <option value="selesai"     <?= old('status')=='selesai'?'selected':'' ?>>Selesai</option>
            </select>
          </div>
        </div>
        <div class="form-row full">
          <div class="form-group">
            <label class="form-label">Topik / Tujuan Sesi <span>*</span></label>
            <input type="text" name="topik" class="form-input" placeholder="Contoh: Motivasi belajar, Persiapan SNBT, Konflik pertemanan..." value="<?= old('topik') ?>" required>
          </div>
        </div>
        <div class="form-row full">
          <div class="form-group">
            <label class="form-label">Catatan / Hasil Sesi</label>
            <textarea name="catatan" class="form-textarea" placeholder="Uraikan hasil dan perkembangan dari sesi bimbingan ini..."><?= old('catatan') ?></textarea>
          </div>
        </div>
        <div class="form-row full">
          <div class="form-group">
            <label class="form-label">Rencana Tindak Lanjut</label>
            <textarea name="rencana_tindak_lanjut" class="form-textarea" style="min-height:70px" placeholder="Apa yang akan dilakukan pada sesi berikutnya?..."><?= old('rencana_tindak_lanjut') ?></textarea>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn-cancel" onclick="closeModal('modalTambah')">Batal</button>
        <button type="submit" class="btn-primary"><i class="fa fa-save"></i> Simpan Sesi</button>
      </div>
    </form>
  </div>
</div>

<!-- ════ MODAL EDIT SESI ════ -->
<div class="modal-overlay" id="modalEdit">
  <div class="modal modal-lg">
    <div class="modal-header yellow">
      <h2><i class="fa fa-pen"></i> Edit Sesi Bimbingan</h2>
      <button class="modal-close" onclick="closeModal('modalEdit')"><i class="fa fa-times"></i></button>
    </div>
    <form id="formEdit" method="POST">
      <?= csrf_field() ?>
      <div class="modal-body">
        <div class="form-row">
          <div class="form-group">
            <label class="form-label">Nama Siswa <span>*</span></label>
            <select name="siswa_id" id="e_siswa_id" class="form-select" required>
              <option value="">-- Pilih Siswa --</option>
              <?php foreach ($list_siswa as $s): ?>
              <option value="<?= $s['id'] ?>"><?= esc($s['nama']) ?> — <?= esc($s['kelas']) ?></option>
              <?php endforeach; ?>
            </select>
          </div>
          <div class="form-group">
            <label class="form-label">Konselor</label>
            <select name="konselor" id="e_konselor" class="form-select">
              <option value="Ibu Rina Marlina, S.Pd">Ibu Rina Marlina, S.Pd</option>
            </select>
          </div>
        </div>
        <div class="form-row three">
          <div class="form-group">
            <label class="form-label">Tanggal</label>
            <input type="date" name="tanggal" id="e_tanggal" class="form-input">
          </div>
          <div class="form-group">
            <label class="form-label">Waktu Mulai</label>
            <input type="time" name="waktu_mulai" id="e_waktu_mulai" class="form-input">
          </div>
          <div class="form-group">
            <label class="form-label">Waktu Selesai</label>
            <input type="time" name="waktu_selesai" id="e_waktu_selesai" class="form-input">
          </div>
        </div>
        <div class="form-row">
          <div class="form-group">
            <label class="form-label">Jenis Sesi</label>
            <select name="jenis_sesi" id="e_jenis_sesi" class="form-select">
              <option value="individual">Individual</option>
              <option value="kelompok">Kelompok</option>
              <option value="klasikal">Klasikal</option>
              <option value="online">Online</option>
            </select>
          </div>
          <div class="form-group">
            <label class="form-label">Status</label>
            <select name="status" id="e_status" class="form-select">
              <option value="dijadwalkan">Dijadwalkan</option>
              <option value="berlangsung">Berlangsung</option>
              <option value="selesai">Selesai</option>
            </select>
          </div>
        </div>
        <div class="form-row full">
          <div class="form-group">
            <label class="form-label">Topik / Tujuan Sesi</label>
            <input type="text" name="topik" id="e_topik" class="form-input">
          </div>
        </div>
        <div class="form-row full">
          <div class="form-group">
            <label class="form-label">Catatan / Hasil Sesi</label>
            <textarea name="catatan" id="e_catatan" class="form-textarea"></textarea>
          </div>
        </div>
        <div class="form-row full">
          <div class="form-group">
            <label class="form-label">Rencana Tindak Lanjut</label>
            <textarea name="rencana_tindak_lanjut" id="e_rencana" class="form-textarea" style="min-height:70px"></textarea>
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
  <div class="modal modal-md">
    <div class="detail-hero" id="detailHero">
      <div class="detail-avatar" id="detailAvatar">--</div>
      <div style="flex:1">
        <div class="detail-hero-name" id="detailNama">—</div>
        <div class="detail-hero-meta" id="detailMeta">—</div>
      </div>
      <button class="modal-close" onclick="closeModal('modalDetail')"><i class="fa fa-times"></i></button>
    </div>
    <div class="modal-body">
      <div class="detail-grid">
        <div class="detail-item"><div class="dl">Tanggal</div><div class="dv" id="dTanggal">—</div></div>
        <div class="detail-item"><div class="dl">Waktu</div><div class="dv" id="dWaktu">—</div></div>
        <div class="detail-item"><div class="dl">Jenis Sesi</div><div class="dv" id="dJenis">—</div></div>
        <div class="detail-item"><div class="dl">Durasi</div><div class="dv" id="dDurasi">—</div></div>
        <div class="detail-item"><div class="dl">Konselor</div><div class="dv" id="dKonselor">—</div></div>
        <div class="detail-item"><div class="dl">Status</div><div class="dv" id="dStatus">—</div></div>
      </div>
      <div class="detail-divider"></div>
      <div style="font-size:11px;font-weight:700;text-transform:uppercase;letter-spacing:.8px;color:var(--gray-400);margin-bottom:8px">Topik Sesi</div>
      <div class="detail-catatan" id="dTopik" style="margin-bottom:14px">—</div>
      <div style="font-size:11px;font-weight:700;text-transform:uppercase;letter-spacing:.8px;color:var(--gray-400);margin-bottom:8px">Catatan / Hasil</div>
      <div class="detail-catatan" id="dCatatan" style="margin-bottom:14px">—</div>
      <div style="font-size:11px;font-weight:700;text-transform:uppercase;letter-spacing:.8px;color:var(--gray-400);margin-bottom:8px">Rencana Tindak Lanjut</div>
      <div class="detail-catatan" id="dRencana">—</div>
    </div>
    <div class="modal-footer">
      <button class="btn-cancel" onclick="closeModal('modalDetail')">Tutup</button>
      <button class="btn-primary" id="detailEditBtn"><i class="fa fa-pen"></i> Edit</button>
    </div>
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
      <div class="confirm-title">Hapus Sesi Bimbingan?</div>
      <p class="confirm-msg">Anda akan menghapus sesi bimbingan milik<br>
        <strong id="hapusNama">—</strong><br>
        <span style="color:var(--danger);font-size:12px;font-weight:600">Tindakan ini tidak dapat dibatalkan!</span>
      </p>
    </div>
    <div class="modal-footer" style="justify-content:center;gap:14px">
      <button class="btn-cancel" style="min-width:100px" onclick="closeModal('modalHapus')">Batal</button>
      <a id="hapusLink" href="#" class="btn-danger" style="min-width:120px;justify-content:center;text-decoration:none"><i class="fa fa-trash"></i> Ya, Hapus</a>
    </div>
  </div>
</div>

<!-- ════ SIDEBAR ════ -->
<aside class="sidebar" id="sidebar">
  <div class="sidebar-brand">
    <div style="background:white;padding:3px;border-radius:13px;overflow:hidden;width:46px;height:46px;flex-shrink:0">
      <img src="<?= base_url('img/logo_sma.png') ?>" alt="Logo SMA Karya Sekadau" style="width:40px;height:40px;object-fit:contain;display:block;">
    </div>
    <div class="brand-text">
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
        <a class="nav-item <?= str_starts_with(uri_string(),'jadwal')?'active':'' ?>"
           href="<?= base_url('jadwal') ?>">
            <i class="fa fa-calendar-check"></i> Jadwal Konseling
            <span class="nav-badge warn">3</span>
        </a>
        <a class="nav-item <?= str_starts_with(uri_string(),'sesi-bimbingan')?'active':'' ?>"
           href="<?= base_url('sesi-bimbingan') ?>">
            <i class="fa fa-comments"></i> Sesi Bimbingan
        </a>
    </div>

    <!-- ── PENGELOLAAN ── -->
    <div class="sidebar-section">
        <div class="sidebar-section-label">Pengelolaan</div>
        <a class="nav-item <?= str_starts_with(uri_string(),'laporan')?'active':'' ?>"
           href="<?= base_url('laporan') ?>">
            <i class="fa fa-file-lines"></i> Laporan &amp; Rekap
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
  <nav class="navbar">
    <button class="navbar-hamburger" onclick="toggleSidebar()"><i class="fa fa-bars"></i></button>
    <div class="navbar-search">
      <i class="fa fa-magnifying-glass"></i>
      <input type="text" placeholder="Cari siswa, topik sesi...">
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
      <div class="alert alert-success"><i class="fa fa-circle-check"></i> <?= session()->getFlashdata('success') ?> <span class="alert-close" onclick="this.parentElement.remove()">✕</span></div>
    <?php endif; ?>
    <?php if (session()->getFlashdata('error')): ?>
      <div class="alert alert-error"><i class="fa fa-circle-xmark"></i> <?= session()->getFlashdata('error') ?> <span class="alert-close" onclick="this.parentElement.remove()">✕</span></div>
    <?php endif; ?>

    <div class="page-header">
      <div class="page-header-left">
        <h1>Sesi Bimbingan</h1>
        <p>Pencatatan dan pemantauan sesi bimbingan konseling siswa</p>
      </div>
      <div class="page-header-right">
        <a href="<?= base_url('sesi-bimbingan/export') ?>" class="btn-outline"><i class="fa fa-file-export"></i> Export CSV</a>
        <button class="btn-primary" onclick="openModal('modalTambah')"><i class="fa fa-plus"></i> Tambah Sesi</button>
      </div>
    </div>

    <!-- STATS -->
    <div class="stats-grid">
      <div class="stat-card s1" style="animation-delay:.05s">
        <div class="stat-top">
          <div class="stat-ico"><i class="fa fa-comments"></i></div>
          <span class="stat-trend up">↑ Aktif</span>
        </div>
        <div class="stat-num"><?= $total ?? 0 ?></div>
        <div class="stat-lbl">Total Sesi</div>
      </div>
      <div class="stat-card s2" style="animation-delay:.10s">
        <div class="stat-top">
          <div class="stat-ico"><i class="fa fa-calendar-day"></i></div>
          <span class="stat-trend up">↑ Bulan ini</span>
        </div>
        <div class="stat-num"><?= $bulan_ini ?? 0 ?></div>
        <div class="stat-lbl">Sesi Bulan Ini</div>
      </div>
      <div class="stat-card s3" style="animation-delay:.15s">
        <div class="stat-top">
          <div class="stat-ico"><i class="fa fa-user"></i></div>
          <span class="stat-trend same">Individual</span>
        </div>
        <div class="stat-num"><?= $individual ?? 0 ?></div>
        <div class="stat-lbl">Sesi Individual</div>
      </div>
      <div class="stat-card s4" style="animation-delay:.20s">
        <div class="stat-top">
          <div class="stat-ico"><i class="fa fa-circle-check"></i></div>
          <span class="stat-trend up">✓ Done</span>
        </div>
        <div class="stat-num"><?= $selesai ?? 0 ?></div>
        <div class="stat-lbl">Sesi Selesai</div>
      </div>
    </div>

    <!-- FILTER -->
    <div class="filter-bar">
      <div class="filter-search">
        <i class="fa fa-magnifying-glass"></i>
        <input type="text" id="searchInput" placeholder="Cari nama siswa atau topik..." oninput="filterTable()">
      </div>
      <select class="filter-select" id="filterJenis" onchange="filterTable()">
        <option value="">Semua Jenis</option>
        <option value="individual">Individual</option>
        <option value="kelompok">Kelompok</option>
        <option value="klasikal">Klasikal</option>
        <option value="online">Online</option>
      </select>
      <select class="filter-select" id="filterStatus" onchange="filterTable()">
        <option value="">Semua Status</option>
        <option value="dijadwalkan">Dijadwalkan</option>
        <option value="berlangsung">Berlangsung</option>
        <option value="selesai">Selesai</option>
      </select>
      <select class="filter-select" id="filterKelas" onchange="filterTable()">
        <option value="">Semua Kelas</option>
        <option value="X">Kelas X</option>
        <option value="XI">Kelas XI</option>
        <option value="XII">Kelas XII</option>
      </select>
    </div>

    <!-- TABLE -->
    <div class="card" style="margin-bottom:28px">
      <div class="table-wrap">
        <table>
          <thead>
            <tr>
              <th>#</th>
              <th>Siswa</th>
              <th>Tanggal & Waktu</th>
              <th>Durasi</th>
              <th>Jenis Sesi</th>
              <th>Topik</th>
              <th>Konselor</th>
              <th>Status</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody id="tableBody">
            <?php if (empty($list_sesi)): ?>
              <tr><td colspan="9">
                <div class="empty-state">
                  <i class="fa fa-comments"></i>
                  <p>Belum ada data sesi bimbingan</p>
                </div>
              </td></tr>
            <?php else: ?>
              <?php
              $days_id = ['Sunday'=>'Min','Monday'=>'Sen','Tuesday'=>'Sel','Wednesday'=>'Rab','Thursday'=>'Kam','Friday'=>'Jum','Saturday'=>'Sab'];
              $months  = ['Jan','Feb','Mar','Apr','Mei','Jun','Jul','Ags','Sep','Okt','Nov','Des'];
              $AVATAR_COLORS = ['#1a56db','#ef4444','#f59e0b','#10b981','#8b5cf6','#ec4899','#06b6d4','#f97316'];
              function getInitialsSesi($n){return strtoupper(implode('',array_map(fn($w)=>$w[0],array_slice(explode(' ',trim($n)),0,2))));}
              function getColorSesi($n,$c){$h=array_sum(array_map('ord',str_split($n)));return $c[$h%count($c)];}
              ?>
              <?php foreach ($list_sesi as $i => $s): ?>
              <?php
                $tgl = $s['tanggal'];
                $d   = new DateTime($tgl);
                $hari_str = $days_id[$d->format('l')] ?? $d->format('D');
                $tgl_str  = $d->format('d').' '.$months[(int)$d->format('m')-1].' '.$d->format('Y');
                // Hitung durasi
                $durasi = '—';
                if (!empty($s['waktu_mulai']) && !empty($s['waktu_selesai'])) {
                  $m = (strtotime($s['waktu_selesai']) - strtotime($s['waktu_mulai'])) / 60;
                  if ($m > 0) $durasi = $m >= 60 ? floor($m/60).'j '.($m%60?($m%60).'m':'') : $m.'m';
                }
                $nama  = $s['nama_siswa'] ?? '—';
                $kelas = $s['kelas'] ?? '—';
                $color = getColorSesi($nama, $AVATAR_COLORS);
                $inits = getInitialsSesi($nama);
              ?>
              <tr class="tr-data"
                  data-nama="<?= strtolower(esc($nama)) ?>"
                  data-topik="<?= strtolower(esc($s['topik'] ?? '')) ?>"
                  data-jenis="<?= esc($s['jenis_sesi'] ?? '') ?>"
                  data-status="<?= esc($s['status'] ?? '') ?>"
                  data-kelas="<?= esc($kelas) ?>">
                <td style="color:var(--gray-400);font-weight:500"><?= $i+1 ?></td>
                <td>
                  <div class="td-student">
                    <div class="td-avatar" style="background:<?= $color ?>"><?= $inits ?></div>
                    <div>
                      <div class="td-name"><?= esc($nama) ?></div>
                      <div class="td-sub"><?= esc($kelas) ?></div>
                    </div>
                  </div>
                </td>
                <td>
                  <div style="font-weight:600;font-size:12.5px;color:var(--blue-900)"><?= $hari_str ?>, <?= $tgl_str ?></div>
                  <div style="font-size:11.5px;color:var(--gray-400)"><?= esc($s['waktu_mulai'] ?? '—') ?><?= !empty($s['waktu_selesai']) ? ' – '.esc($s['waktu_selesai']) : '' ?> WIB</div>
                </td>
                <td>
                  <span class="durasi-pill"><i class="fa fa-clock"></i> <?= $durasi ?></span>
                </td>
                <td><span class="badge <?= esc($s['jenis_sesi'] ?? '') ?>"><?= ucfirst(esc($s['jenis_sesi'] ?? '—')) ?></span></td>
                <td style="max-width:200px;overflow:hidden;text-overflow:ellipsis;white-space:nowrap;color:var(--gray-600);font-size:12.5px"><?= esc(mb_strimwidth($s['topik'] ?? '', 0, 50, '...')) ?></td>
                <td style="font-size:12.5px;color:var(--gray-700)"><?= esc($s['konselor'] ?? '—') ?></td>
                <td><span class="badge <?= esc($s['status'] ?? '') ?>"><?= ucfirst(esc($s['status'] ?? '—')) ?></span></td>
                <td>
                  <div class="action-btns">
                    <button class="btn-icon view" title="Detail" onclick="openDetail(<?= $s['id'] ?>)"><i class="fa fa-eye"></i></button>
                    <button class="btn-icon check" title="Tandai Selesai" onclick="toggleStatus(<?= $s['id'] ?>,'<?= esc($s['status'] ?? '') ?>')"><i class="fa fa-<?= ($s['status'] ?? '') === 'selesai' ? 'rotate-left' : 'check' ?>"></i></button>
                    <button class="btn-icon edit" title="Edit" onclick="openEdit(<?= $s['id'] ?>)"><i class="fa fa-pen"></i></button>
                    <button class="btn-icon del" title="Hapus" onclick="openHapus(<?= $s['id'] ?>,'<?= esc($nama, 'js') ?>')"><i class="fa fa-trash"></i></button>
                  </div>
                </td>
              </tr>
              <?php endforeach; ?>
            <?php endif; ?>
          </tbody>
        </table>
      </div>
      <div class="pagination-bar">
        <span id="infoBar">Menampilkan <?= count($list_sesi ?? []) ?> data sesi bimbingan</span>
        <!-- pagination CI4 jika ada -->
        <?php if (!empty($pager)): ?>
        <div><?= $pager->links() ?></div>
        <?php endif; ?>
      </div>
    </div>
  </div>
</div>

<script>
const BASE_URL = '<?= base_url() ?>';

// ── Clock ──
function updateClock(){
  const d=new Date(),days=['Minggu','Senin','Selasa','Rabu','Kamis','Jumat','Sabtu'],months=['Jan','Feb','Mar','Apr','Mei','Jun','Jul','Ags','Sep','Okt','Nov','Des'];
  document.getElementById('dateLive').textContent=days[d.getDay()]+', '+d.getDate()+' '+months[d.getMonth()]+' '+d.getFullYear();
  document.getElementById('timeLive').textContent=String(d.getHours()).padStart(2,'0')+':'+String(d.getMinutes()).padStart(2,'0')+':'+String(d.getSeconds()).padStart(2,'0')+' WIB';
}
setInterval(updateClock,1000); updateClock();

// ── Filter ──
function filterTable(){
  const q   = document.getElementById('searchInput').value.toLowerCase();
  const jns = document.getElementById('filterJenis').value;
  const st  = document.getElementById('filterStatus').value;
  const kls = document.getElementById('filterKelas').value;
  let count = 0;
  document.querySelectorAll('.tr-data').forEach(tr=>{
    const show = (!q  || tr.dataset.nama.includes(q) || tr.dataset.topik.includes(q))
              && (!jns || tr.dataset.jenis  === jns)
              && (!st  || tr.dataset.status === st)
              && (!kls || tr.dataset.kelas.startsWith(kls));
    tr.style.display = show ? '' : 'none';
    if(show) count++;
  });
  document.getElementById('infoBar').textContent = 'Menampilkan '+count+' data sesi bimbingan';
}

// ── Modal Helpers ──
function openModal(id){ document.getElementById(id).classList.add('show') }
function closeModal(id){ document.getElementById(id).classList.remove('show') }
document.querySelectorAll('.modal-overlay').forEach(m=>{
  m.addEventListener('click', e=>{ if(e.target===m) m.classList.remove('show') });
});

// ── Detail ──
function openDetail(id){
  openModal('modalDetail');
  fetch(BASE_URL+'sesi-bimbingan/detail/'+id)
    .then(r=>r.json()).then(res=>{
      if(!res.success) return;
      const d = res.data;
      const colors = ['#1a56db','#ef4444','#f59e0b','#10b981','#8b5cf6','#ec4899','#06b6d4','#f97316'];
      const nama = d.nama_siswa || '—';
      const inits = nama.trim().split(' ').map(w=>w[0]).join('').toUpperCase().slice(0,2);
      const hue = nama.split('').reduce((a,c)=>a+c.charCodeAt(0),0) % colors.length;
      document.getElementById('detailAvatar').textContent = inits;
      document.getElementById('detailAvatar').style.background = colors[hue];
      document.getElementById('detailNama').textContent = nama;
      document.getElementById('detailMeta').textContent = (d.kelas||'') + ' · ' + (d.konselor||'');
      document.getElementById('dTanggal').textContent = formatTgl(d.tanggal);
      document.getElementById('dWaktu').textContent   = (d.waktu_mulai||'—') + (d.waktu_selesai?' – '+d.waktu_selesai:'')+' WIB';
      document.getElementById('dJenis').innerHTML     = `<span class="badge ${d.jenis_sesi||''}">${ucfirst(d.jenis_sesi||'—')}</span>`;
      document.getElementById('dDurasi').textContent  = hitungDurasi(d.waktu_mulai, d.waktu_selesai);
      document.getElementById('dKonselor').textContent= d.konselor||'—';
      document.getElementById('dStatus').innerHTML    = `<span class="badge ${d.status||''}">${ucfirst(d.status||'—')}</span>`;
      document.getElementById('dTopik').textContent   = d.topik||'—';
      document.getElementById('dCatatan').textContent = d.catatan||'(belum ada catatan)';
      document.getElementById('dRencana').textContent = d.rencana_tindak_lanjut||'(belum ada rencana)';
      document.getElementById('detailEditBtn').onclick = ()=>{ closeModal('modalDetail'); openEdit(id); };
    });
}

// ── Edit ──
function openEdit(id){
  fetch(BASE_URL+'sesi-bimbingan/edit/'+id)
    .then(r=>r.json()).then(res=>{
      if(!res.success){ alert('Data tidak ditemukan.'); return; }
      const d = res.data;
      document.getElementById('e_siswa_id').value    = d.siswa_id;
      document.getElementById('e_konselor').value    = d.konselor;
      document.getElementById('e_tanggal').value     = d.tanggal;
      document.getElementById('e_waktu_mulai').value = d.waktu_mulai;
      document.getElementById('e_waktu_selesai').value = d.waktu_selesai||'';
      document.getElementById('e_jenis_sesi').value  = d.jenis_sesi;
      document.getElementById('e_status').value      = d.status;
      document.getElementById('e_topik').value       = d.topik||'';
      document.getElementById('e_catatan').value     = d.catatan||'';
      document.getElementById('e_rencana').value     = d.rencana_tindak_lanjut||'';
      document.getElementById('formEdit').action     = BASE_URL+'sesi-bimbingan/update/'+id;
      openModal('modalEdit');
    });
}

// ── Toggle Status ──
function toggleStatus(id, current){
  const newStatus = current === 'selesai' ? 'dijadwalkan' : 'selesai';
  const fd = new FormData();
  fd.append('status', newStatus);
  fd.append('<?= csrf_token() ?>', '<?= csrf_hash() ?>');
  fetch(BASE_URL+'sesi-bimbingan/status/'+id, { method:'POST', body:fd })
    .then(r=>r.json()).then(res=>{ if(res.success) location.reload(); });
}

// ── Hapus ──
function openHapus(id, nama){
  document.getElementById('hapusNama').textContent = nama;
  document.getElementById('hapusLink').href = BASE_URL+'sesi-bimbingan/hapus/'+id;
  openModal('modalHapus');
}

// ── Helpers ──
function formatTgl(s){
  if(!s) return '—';
  const d=new Date(s),months=['Jan','Feb','Mar','Apr','Mei','Jun','Jul','Ags','Sep','Okt','Nov','Des'],days=['Minggu','Senin','Selasa','Rabu','Kamis','Jumat','Sabtu'];
  return days[d.getDay()]+', '+d.getDate()+' '+months[d.getMonth()]+' '+d.getFullYear();
}
function hitungDurasi(mulai, selesai){
  if(!mulai||!selesai) return '—';
  const m = (new Date('1970-01-01T'+selesai) - new Date('1970-01-01T'+mulai)) / 60000;
  if(m<=0) return '—';
  return m>=60 ? Math.floor(m/60)+'j '+(m%60?m%60+'m':'') : m+'m';
}
function ucfirst(s){ return s ? s.charAt(0).toUpperCase()+s.slice(1) : s; }

// ── Sidebar & FS ──
function toggleSidebar(){ document.getElementById('sidebar').classList.toggle('open'); document.getElementById('overlay').classList.toggle('show'); }
function closeSidebar(){ document.getElementById('sidebar').classList.remove('open'); document.getElementById('overlay').classList.remove('show'); }
function toggleFS(){ if(!document.fullscreenElement){ document.documentElement.requestFullscreen(); document.getElementById('fsIcon').className='fa fa-compress'; } else{ document.exitFullscreen(); document.getElementById('fsIcon').className='fa fa-expand'; } }

// ── Buka modal jika ada validation error ──
<?php if (session()->getFlashdata('errors')): ?>
openModal('modalTambah');
<?php endif; ?>
</script>
</body>
</html>