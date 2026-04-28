<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Jadwal Konseling — BK SMA Karya Sekadau</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800&family=DM+Sans:ital,wght@0,300;0,400;0,500;1,400&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
<style>
:root{
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
.sidebar{width:var(--sidebar-w);min-height:100vh;background:linear-gradient(175deg,var(--blue-900) 0%,var(--blue-800) 50%,var(--blue-700) 100%);position:fixed;left:0;top:0;bottom:0;z-index:100;display:flex;flex-direction:column;box-shadow:4px 0 32px rgba(10,22,40,.25);transition:var(--transition);overflow-y:auto;overflow-x:hidden}
.sidebar-brand{padding:28px 24px 22px;display:flex;align-items:center;gap:14px;border-bottom:1px solid rgba(255,255,255,.08);flex-shrink:0}
.brand-title{font-family:'Outfit',sans-serif;font-weight:700;font-size:17px;color:white;line-height:1.1}
.brand-sub{font-size:11px;color:var(--blue-300);font-weight:400;margin-top:2px;letter-spacing:.4px}
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
.user-name{font-size:13px;font-weight:500;color:white}
.user-role{font-size:11px;color:var(--blue-300);margin-top:1px}
.logout-icon{margin-left:auto;color:rgba(255,255,255,.4);font-size:13px;transition:var(--transition)}
.user-card:hover .logout-icon{color:var(--danger)}
.main-wrapper{margin-left:var(--sidebar-w);flex:1;display:flex;flex-direction:column;min-height:100vh}
.navbar{height:var(--navbar-h);background:white;border-bottom:1px solid var(--gray-200);display:flex;align-items:center;padding:0 32px;position:sticky;top:0;z-index:50;gap:16px;box-shadow:0 2px 16px rgba(19,64,160,.06)}
.navbar-hamburger{display:none;background:none;border:none;font-size:20px;color:var(--blue-600);cursor:pointer;padding:8px;border-radius:8px;transition:var(--transition)}
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
.page-content{padding:28px 32px;flex:1}
.page-header{display:flex;align-items:flex-start;justify-content:space-between;margin-bottom:28px;gap:16px}
.page-header-left h1{font-family:'Outfit',sans-serif;font-size:26px;font-weight:700;color:var(--blue-900);letter-spacing:-.5px}
.page-header-left p{font-size:14px;color:var(--gray-400);margin-top:4px}
.page-header-right{display:flex;gap:10px;flex-shrink:0}
.btn-primary{padding:10px 20px;border-radius:var(--radius-sm);border:none;background:var(--blue-500);color:white;font-family:'DM Sans',sans-serif;font-size:13.5px;font-weight:500;cursor:pointer;transition:var(--transition);display:inline-flex;align-items:center;gap:8px;text-decoration:none}
.btn-primary:hover{background:var(--blue-600);box-shadow:0 4px 14px rgba(26,86,219,.4)}
.btn-danger{padding:10px 20px;border-radius:var(--radius-sm);border:none;background:var(--danger);color:white;font-family:'DM Sans',sans-serif;font-size:13.5px;font-weight:500;cursor:pointer;transition:var(--transition);display:inline-flex;align-items:center;gap:8px}
.btn-danger:hover{background:#dc2626}
.btn-cancel{padding:10px 20px;border-radius:var(--radius-sm);border:1.5px solid var(--gray-200);background:white;font-family:'DM Sans',sans-serif;font-size:13px;color:var(--gray-600);cursor:pointer;transition:var(--transition)}
.btn-cancel:hover{background:var(--gray-50)}
.flash-alert{padding:14px 18px;border-radius:var(--radius-sm);margin-bottom:20px;display:flex;align-items:center;gap:10px;font-size:13.5px;font-weight:500;animation:fadeInUp .3s ease}
.flash-alert.success{background:#d1fae5;color:#065f46;border:1px solid #6ee7b7}
.flash-alert.error{background:#fee2e2;color:#991b1b;border:1px solid #fca5a5}
.stats-grid{display:grid;grid-template-columns:repeat(4,1fr);gap:18px;margin-bottom:24px}
.stat-card{background:white;border-radius:var(--radius);padding:20px 22px;box-shadow:var(--shadow);transition:var(--transition);position:relative;overflow:hidden}
.stat-card:hover{transform:translateY(-3px);box-shadow:var(--shadow-lg)}
.stat-card::after{content:'';position:absolute;bottom:0;left:0;right:0;height:3px}
.stat-card.s1::after{background:linear-gradient(90deg,var(--blue-500),var(--blue-300))}
.stat-card.s2::after{background:linear-gradient(90deg,var(--warning),#fcd34d)}
.stat-card.s3::after{background:linear-gradient(90deg,var(--success),#34d399)}
.stat-card.s4::after{background:linear-gradient(90deg,var(--danger),#f87171)}
.stat-top{display:flex;justify-content:space-between;align-items:flex-start;margin-bottom:14px}
.stat-ico{width:46px;height:46px;border-radius:12px;display:flex;align-items:center;justify-content:center;font-size:18px}
.stat-card.s1 .stat-ico{background:var(--blue-100);color:var(--blue-500)}
.stat-card.s2 .stat-ico{background:#fef3c7;color:#d97706}
.stat-card.s3 .stat-ico{background:#d1fae5;color:#059669}
.stat-card.s4 .stat-ico{background:#fee2e2;color:var(--danger)}
.stat-num{font-family:'Outfit',sans-serif;font-size:34px;font-weight:800;color:var(--blue-900);line-height:1;letter-spacing:-1px}
.stat-lbl{font-size:12px;color:var(--gray-400);margin-top:4px;font-weight:500}
.filter-bar{background:white;border-radius:var(--radius);padding:14px 20px;box-shadow:var(--shadow);display:flex;align-items:center;gap:10px;margin-bottom:18px;flex-wrap:wrap}
.filter-search{flex:1;min-width:200px;position:relative}
.filter-search input{width:100%;padding:9px 14px 9px 36px;border-radius:var(--radius-sm);border:1.5px solid var(--gray-200);background:var(--gray-50);font-family:'DM Sans',sans-serif;font-size:13px;color:var(--gray-800);outline:none;transition:var(--transition)}
.filter-search input:focus{border-color:var(--blue-400);background:white;box-shadow:0 0 0 3px rgba(59,130,246,.1)}
.filter-search i{position:absolute;left:11px;top:50%;transform:translateY(-50%);color:var(--gray-400);font-size:12px}
.filter-select{padding:9px 12px;border-radius:var(--radius-sm);border:1.5px solid var(--gray-200);background:white;font-family:'DM Sans',sans-serif;font-size:12.5px;color:var(--gray-700);outline:none;cursor:pointer;transition:var(--transition)}
.filter-select:focus{border-color:var(--blue-400)}
.card{background:white;border-radius:var(--radius);box-shadow:var(--shadow);overflow:hidden}
.tab-nav{display:flex;padding:0 22px;border-bottom:1px solid var(--gray-100);background:var(--gray-50)}
.tab-btn{padding:13px 16px;border:none;background:none;font-family:'DM Sans',sans-serif;font-size:13px;font-weight:400;color:var(--gray-400);cursor:pointer;position:relative;transition:var(--transition);white-space:nowrap;display:flex;align-items:center;gap:7px}
.tab-btn::after{content:'';position:absolute;bottom:0;left:0;right:0;height:2px;background:var(--blue-500);border-radius:2px 2px 0 0;transform:scaleX(0);transition:var(--transition)}
.tab-btn.active{color:var(--blue-600);font-weight:500}
.tab-btn.active::after{transform:scaleX(1)}
.tab-count{font-size:10px;font-weight:700;padding:2px 7px;border-radius:20px;background:var(--blue-100);color:var(--blue-600)}
.table-wrap{overflow-x:auto}
table{width:100%;border-collapse:collapse;font-size:13px}
thead th{padding:12px 16px;text-align:left;font-size:11px;font-weight:600;text-transform:uppercase;letter-spacing:.6px;color:var(--gray-400);background:var(--gray-50);border-bottom:1px solid var(--gray-200);white-space:nowrap}
tbody td{padding:13px 16px;border-bottom:1px solid var(--gray-100);color:var(--gray-800);vertical-align:middle}
tbody tr:last-child td{border-bottom:none}
tbody tr:hover{background:var(--blue-50)}
.td-student{display:flex;align-items:center;gap:10px}
.td-avatar{width:34px;height:34px;border-radius:50%;display:flex;align-items:center;justify-content:center;font-size:12px;font-weight:700;color:white;flex-shrink:0}
.td-name{font-weight:600;color:var(--blue-900);font-size:13px}
.td-sub{font-size:11px;color:var(--gray-400);margin-top:1px}
.badge{display:inline-flex;align-items:center;gap:4px;padding:4px 10px;border-radius:20px;font-size:11px;font-weight:600;white-space:nowrap}
.badge::before{content:'';width:5px;height:5px;border-radius:50%;background:currentColor}
.badge.menunggu{background:var(--blue-100);color:var(--blue-600)}
.badge.selesai{background:#d1fae5;color:#059669}
.badge.batal{background:#fee2e2;color:#dc2626}
.action-btns{display:flex;gap:5px}
.btn-icon{width:30px;height:30px;border-radius:7px;border:none;cursor:pointer;display:flex;align-items:center;justify-content:center;font-size:12px;transition:var(--transition)}
.btn-icon.view{background:var(--blue-100);color:var(--blue-600)}
.btn-icon.edit{background:#fef3c7;color:#b45309}
.btn-icon.del{background:#fee2e2;color:#dc2626}
.btn-icon:hover{opacity:.8;transform:scale(1.08)}
.pagination-bar{display:flex;align-items:center;justify-content:space-between;padding:14px 22px;border-top:1px solid var(--gray-100);font-size:12.5px;color:var(--gray-400)}
.pagination-btns{display:flex;gap:5px}
.pg-btn{width:32px;height:32px;border-radius:8px;border:1.5px solid var(--gray-200);background:white;display:flex;align-items:center;justify-content:center;cursor:pointer;font-size:12.5px;color:var(--gray-600);font-family:'DM Sans',sans-serif;transition:var(--transition)}
.pg-btn:hover{border-color:var(--blue-400);color:var(--blue-600)}
.pg-btn.active{background:var(--blue-500);border-color:var(--blue-500);color:white}
.empty-state{text-align:center;padding:56px 20px;color:var(--gray-400)}
.empty-state i{font-size:42px;color:var(--gray-200);display:block;margin-bottom:14px}
.empty-state p{font-size:14px}
.modal-overlay{display:none;position:fixed;inset:0;background:rgba(10,22,40,.55);z-index:300;align-items:center;justify-content:center;padding:20px}
.modal-overlay.show{display:flex}
.modal{background:white;border-radius:var(--radius);width:100%;max-height:90vh;overflow-y:auto;box-shadow:0 24px 80px rgba(10,22,40,.3);animation:modalIn .25s ease}
@keyframes modalIn{from{opacity:0;transform:scale(.95) translateY(10px)}to{opacity:1;transform:scale(1) translateY(0)}}
.modal-sm{max-width:420px}.modal-md{max-width:580px}
.modal-header{padding:22px 26px 18px;display:flex;align-items:center;justify-content:space-between;position:sticky;top:0;z-index:1}
.modal-header.blue{background:linear-gradient(135deg,var(--blue-800),var(--blue-500))}
.modal-header.red{background:linear-gradient(135deg,#991b1b,var(--danger))}
.modal-header.yellow{background:linear-gradient(135deg,#92400e,var(--warning))}
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
.form-input,.form-select,.form-textarea{padding:10px 14px;border-radius:var(--radius-sm);border:1.5px solid var(--gray-200);background:var(--gray-50);font-family:'DM Sans',sans-serif;font-size:13.5px;color:var(--gray-800);outline:none;transition:var(--transition);width:100%}
.form-input:focus,.form-select:focus,.form-textarea:focus{border-color:var(--blue-400);background:white;box-shadow:0 0 0 3px rgba(59,130,246,.1)}
.form-textarea{resize:vertical;min-height:90px}
.jam-wrap{display:flex;gap:6px;align-items:center}
.jam-wrap .form-select{flex:1}
.jam-sep{font-weight:700;color:var(--gray-600);flex-shrink:0}
.detail-hero{background:linear-gradient(135deg,var(--blue-900),var(--blue-700));padding:26px;display:flex;align-items:center;gap:18px}
.detail-avatar{width:64px;height:64px;border-radius:50%;display:flex;align-items:center;justify-content:center;font-family:'Outfit',sans-serif;font-size:22px;font-weight:800;color:white;box-shadow:0 4px 14px rgba(0,0,0,.3);flex-shrink:0}
.detail-hero-name{font-family:'Outfit',sans-serif;font-size:19px;font-weight:700;color:white}
.detail-hero-meta{font-size:12.5px;color:var(--blue-300);margin-top:3px}
.detail-grid{display:grid;grid-template-columns:1fr 1fr;gap:18px;margin-bottom:18px}
.detail-item .dl{font-size:11px;font-weight:700;text-transform:uppercase;letter-spacing:.8px;color:var(--gray-400);margin-bottom:4px}
.detail-item .dv{font-size:13.5px;font-weight:500;color:var(--gray-800)}
.detail-divider{height:1px;background:var(--gray-100);margin:18px 0}
.detail-catatan{background:var(--gray-50);border-radius:var(--radius-sm);padding:14px;font-size:13px;color:var(--gray-600);line-height:1.7;border-left:3px solid var(--blue-400)}
.confirm-icon{width:60px;height:60px;border-radius:50%;background:#fee2e2;display:flex;align-items:center;justify-content:center;font-size:26px;color:var(--danger);margin:0 auto 16px}
.confirm-title{font-family:'Outfit',sans-serif;font-size:18px;font-weight:700;color:var(--gray-900);text-align:center;margin-bottom:8px}
.confirm-msg{font-size:13.5px;color:var(--gray-500);text-align:center;line-height:1.6}
.confirm-name{font-weight:700;color:var(--gray-800)}
.overlay{display:none;position:fixed;inset:0;background:rgba(10,22,40,.4);z-index:90}
.overlay.show{display:block}
.toast-container{position:fixed;bottom:28px;right:28px;z-index:999;display:flex;flex-direction:column;gap:10px}
.toast{background:white;border-radius:12px;padding:14px 18px;box-shadow:0 8px 30px rgba(10,22,40,.2);display:flex;align-items:center;gap:12px;font-size:13.5px;font-weight:500;animation:slideIn .3s ease;min-width:280px;border-left:4px solid}
.toast.success{border-color:var(--success);color:#065f46}
.toast.error{border-color:var(--danger);color:#991b1b}
.toast.info{border-color:var(--blue-500);color:var(--blue-700)}
.toast i{font-size:16px}
::-webkit-scrollbar{width:6px;height:6px}::-webkit-scrollbar-track{background:transparent}::-webkit-scrollbar-thumb{background:var(--gray-200);border-radius:10px}
@keyframes fadeInUp{from{opacity:0;transform:translateY(16px)}to{opacity:1;transform:translateY(0)}}
@keyframes slideIn{from{opacity:0;transform:translateX(30px)}to{opacity:1;transform:translateX(0)}}
@media(max-width:1200px){.stats-grid{grid-template-columns:repeat(2,1fr)}}
@media(max-width:768px){:root{--sidebar-w:0px}.sidebar{transform:translateX(-270px);width:270px}.sidebar.open{transform:translateX(0)}.main-wrapper{margin-left:0}.navbar-hamburger{display:flex}.page-content{padding:20px 18px}.stats-grid{grid-template-columns:1fr 1fr}.page-header{flex-direction:column}.form-row{grid-template-columns:1fr}}
@media(max-width:480px){.stats-grid{grid-template-columns:1fr}}
</style>
</head>
<body>
<div class="overlay" id="overlay" onclick="closeSidebar()"></div>
<div class="toast-container" id="toastContainer"></div>

<?php
function jamOpts($sel='') {
  $o='';
  for($h=6;$h<=21;$h++){$hh=str_pad($h,2,'0',STR_PAD_LEFT);$o.="<option value=\"$hh\"".($hh===$sel?' selected':'').">$hh</option>";}
  return $o;
}
function menitOpts($sel='00') {
  $o='';
  foreach(['00','05','10','15','20','25','30','35','40','45','50','55'] as $m)
    $o.="<option value=\"$m\"".($m===$sel?' selected':'').">$m</option>";
  return $o;
}
?>

<!-- MODAL TAMBAH -->
<div class="modal-overlay" id="modalTambah">
  <div class="modal modal-md">
    <div class="modal-header blue">
      <h2><i class="fa fa-plus-circle"></i> Tambah Jadwal Konseling</h2>
      <button class="modal-close" onclick="closeModal('modalTambah')"><i class="fa fa-times"></i></button>
    </div>
    <div class="modal-body">
      <div class="form-row full">
        <div class="form-group">
          <label class="form-label">Pilih Siswa <span>*</span></label>
          <select class="form-select" id="f_siswa_id"><option value="">-- Pilih Siswa --</option></select>
        </div>
      </div>
      <div class="form-row">
        <div class="form-group">
          <label class="form-label">Tanggal <span>*</span></label>
          <input type="date" class="form-input" id="f_tanggal">
        </div>
        <div class="form-group">
          <label class="form-label">Jam Mulai <span>*</span></label>
          <div class="jam-wrap">
            <select class="form-select" id="f_jam_mulai_h"><?= jamOpts('08') ?></select>
            <span class="jam-sep">:</span>
            <select class="form-select" id="f_jam_mulai_m"><?= menitOpts('00') ?></select>
          </div>
        </div>
      </div>
      <div class="form-row">
        <div class="form-group">
          <label class="form-label">Jam Selesai</label>
          <div class="jam-wrap">
            <select class="form-select" id="f_jam_selesai_h"><option value="">--</option><?= jamOpts() ?></select>
            <span class="jam-sep">:</span>
            <select class="form-select" id="f_jam_selesai_m"><?= menitOpts('00') ?></select>
          </div>
        </div>
        <div class="form-group">
          <label class="form-label">Status</label>
          <select class="form-select" id="f_status">
            <option value="menunggu">Menunggu</option>
            <option value="selesai">Selesai</option>
            <option value="batal">Batal</option>
          </select>
        </div>
      </div>
      <div class="form-row full">
        <div class="form-group">
          <label class="form-label">Keperluan / Topik <span>*</span></label>
          <textarea class="form-textarea" id="f_keperluan" placeholder="Uraikan keperluan atau topik konseling..."></textarea>
        </div>
      </div>
      <div class="form-row full">
        <div class="form-group">
          <label class="form-label">Catatan</label>
          <textarea class="form-textarea" id="f_catatan" placeholder="Catatan tambahan (opsional)..."></textarea>
        </div>
      </div>
    </div>
    <div class="modal-footer">
      <button class="btn-cancel" onclick="closeModal('modalTambah')">Batal</button>
      <button class="btn-primary" onclick="simpanJadwal()"><i class="fa fa-save"></i> Simpan Jadwal</button>
    </div>
  </div>
</div>

<!-- MODAL EDIT -->
<div class="modal-overlay" id="modalEdit">
  <div class="modal modal-md">
    <div class="modal-header yellow">
      <h2><i class="fa fa-pen"></i> Edit Jadwal Konseling</h2>
      <button class="modal-close" onclick="closeModal('modalEdit')"><i class="fa fa-times"></i></button>
    </div>
    <div class="modal-body">
      <input type="hidden" id="e_id">
      <div class="form-row full">
        <div class="form-group">
          <label class="form-label">Pilih Siswa <span>*</span></label>
          <select class="form-select" id="e_siswa_id"><option value="">-- Pilih Siswa --</option></select>
        </div>
      </div>
      <div class="form-row">
        <div class="form-group">
          <label class="form-label">Tanggal <span>*</span></label>
          <input type="date" class="form-input" id="e_tanggal">
        </div>
        <div class="form-group">
          <label class="form-label">Jam Mulai <span>*</span></label>
          <div class="jam-wrap">
            <select class="form-select" id="e_jam_mulai_h"><?= jamOpts('08') ?></select>
            <span class="jam-sep">:</span>
            <select class="form-select" id="e_jam_mulai_m"><?= menitOpts('00') ?></select>
          </div>
        </div>
      </div>
      <div class="form-row">
        <div class="form-group">
          <label class="form-label">Jam Selesai</label>
          <div class="jam-wrap">
            <select class="form-select" id="e_jam_selesai_h"><option value="">--</option><?= jamOpts() ?></select>
            <span class="jam-sep">:</span>
            <select class="form-select" id="e_jam_selesai_m"><?= menitOpts('00') ?></select>
          </div>
        </div>
        <div class="form-group">
          <label class="form-label">Status</label>
          <select class="form-select" id="e_status">
            <option value="menunggu">Menunggu</option>
            <option value="selesai">Selesai</option>
            <option value="batal">Batal</option>
          </select>
        </div>
      </div>
      <div class="form-row full">
        <div class="form-group">
          <label class="form-label">Keperluan / Topik <span>*</span></label>
          <textarea class="form-textarea" id="e_keperluan"></textarea>
        </div>
      </div>
      <div class="form-row full">
        <div class="form-group">
          <label class="form-label">Catatan</label>
          <textarea class="form-textarea" id="e_catatan"></textarea>
        </div>
      </div>
    </div>
    <div class="modal-footer">
      <button class="btn-cancel" onclick="closeModal('modalEdit')">Batal</button>
      <button class="btn-primary" onclick="updateJadwal()"><i class="fa fa-save"></i> Perbarui Jadwal</button>
    </div>
  </div>
</div>

<!-- MODAL DETAIL -->
<div class="modal-overlay" id="modalDetail">
  <div class="modal modal-md">
    <div class="detail-hero">
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
        <div class="detail-item"><div class="dl">Jam Mulai</div><div class="dv" id="dJamMulai">—</div></div>
        <div class="detail-item"><div class="dl">Jam Selesai</div><div class="dv" id="dJamSelesai">—</div></div>
        <div class="detail-item"><div class="dl">Kelas</div><div class="dv" id="dKelas">—</div></div>
        <div class="detail-item"><div class="dl">Status</div><div class="dv" id="dStatus">—</div></div>
        <div class="detail-item"><div class="dl">No. HP Ortu</div><div class="dv" id="dKontak">—</div></div>
      </div>
      <div class="detail-divider"></div>
      <div style="font-size:11px;font-weight:700;text-transform:uppercase;letter-spacing:.8px;color:var(--gray-400);margin-bottom:8px">Keperluan / Topik</div>
      <div class="detail-catatan" id="dKeperluan">—</div>
      <div style="font-size:11px;font-weight:700;text-transform:uppercase;letter-spacing:.8px;color:var(--gray-400);margin:14px 0 8px">Catatan</div>
      <div class="detail-catatan" id="dCatatan" style="border-color:var(--success)">—</div>
    </div>
    <div class="modal-footer">
      <button class="btn-cancel" onclick="closeModal('modalDetail')">Tutup</button>
      <button class="btn-primary" id="detailEditBtn"><i class="fa fa-pen"></i> Edit</button>
    </div>
  </div>
</div>

<!-- MODAL HAPUS -->
<div class="modal-overlay" id="modalHapus">
  <div class="modal modal-sm">
    <div class="modal-header red">
      <h2><i class="fa fa-trash"></i> Konfirmasi Hapus</h2>
      <button class="modal-close" onclick="closeModal('modalHapus')"><i class="fa fa-times"></i></button>
    </div>
    <div class="modal-body" style="text-align:center;padding:32px 26px">
      <div class="confirm-icon"><i class="fa fa-trash"></i></div>
      <div class="confirm-title">Hapus Jadwal Konseling?</div>
      <p class="confirm-msg">Anda akan menghapus jadwal konseling milik<br>
        <span class="confirm-name" id="hapusNama">—</span><br>
        <span style="color:var(--danger);font-size:12px;font-weight:600">Tindakan ini tidak dapat dibatalkan!</span>
      </p>
    </div>
    <div class="modal-footer" style="justify-content:center;gap:14px">
      <button class="btn-cancel" style="min-width:100px" onclick="closeModal('modalHapus')">Batal</button>
      <button class="btn-danger" style="min-width:120px" onclick="hapusJadwal()"><i class="fa fa-trash"></i> Ya, Hapus</button>
    </div>
  </div>
</div>

<!-- SIDEBAR -->
<aside class="sidebar" id="sidebar">
  <div class="sidebar-brand">
    <div style="background:white;padding:3px;border-radius:13px;overflow:hidden;width:46px;height:46px;flex-shrink:0">
      <img src="<?= base_url('img/logo_sma.png') ?>" alt="Logo" style="width:40px;height:40px;object-fit:contain;display:block;">
    </div>
    <div><div class="brand-title">BK SMA Karya Sekadau</div><div class="brand-sub">Bimbingan &amp; Konseling</div></div>
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

<!-- MAIN -->
<div class="main-wrapper">
  <nav class="navbar">
    <button class="navbar-hamburger" onclick="toggleSidebar()"><i class="fa fa-bars"></i></button>
    <div class="navbar-search"><i class="fa fa-magnifying-glass"></i><input type="text" placeholder="Cari siswa, jadwal konseling..."></div>
    <div class="navbar-actions">
      <button class="nav-action-btn"><i class="fa fa-bell"></i><span class="notif-dot"></span></button>
      <button class="nav-action-btn"><i class="fa fa-envelope"></i></button>
      <button class="nav-action-btn" onclick="toggleFS()"><i class="fa fa-expand" id="fsIcon"></i></button>
    </div>
    <div class="navbar-date"><span class="date-main" id="dateLive">—</span><span class="date-sub" id="timeLive">—</span></div>
  </nav>

  <div class="page-content">
    <div id="flashZone"></div>
    <div class="page-header">
      <div class="page-header-left"><h1>Jadwal Konseling</h1><p>Kelola dan pantau seluruh jadwal sesi konseling siswa</p></div>
      <div class="page-header-right"><button class="btn-primary" onclick="openTambah()"><i class="fa fa-plus"></i> Tambah Jadwal</button></div>
    </div>

    <div class="stats-grid">
      <div class="stat-card s1"><div class="stat-top"><div class="stat-ico"><i class="fa fa-calendar-check"></i></div></div><div class="stat-num"><?= $summary['total'] ?></div><div class="stat-lbl">Total Jadwal</div></div>
      <div class="stat-card s2"><div class="stat-top"><div class="stat-ico"><i class="fa fa-clock"></i></div></div><div class="stat-num"><?= $summary['terjadwal'] ?></div><div class="stat-lbl">Menunggu</div></div>
      <div class="stat-card s3"><div class="stat-top"><div class="stat-ico"><i class="fa fa-circle-check"></i></div></div><div class="stat-num"><?= $summary['selesai'] ?></div><div class="stat-lbl">Selesai</div></div>
      <div class="stat-card s4"><div class="stat-top"><div class="stat-ico"><i class="fa fa-circle-xmark"></i></div></div><div class="stat-num"><?= $summary['batal'] ?></div><div class="stat-lbl">Dibatalkan</div></div>
    </div>

    <div class="filter-bar">
      <div class="filter-search"><i class="fa fa-magnifying-glass"></i><input type="text" id="searchInput" placeholder="Cari nama siswa atau keperluan..." oninput="filterTable()"></div>
      <select class="filter-select" id="filterStatus" onchange="filterTable()">
        <option value="">Semua Status</option><option value="menunggu">Menunggu</option><option value="selesai">Selesai</option><option value="batal">Batal</option>
      </select>
      <select class="filter-select" id="filterSort" onchange="filterTable()">
        <option value="newest">Terbaru Dulu</option><option value="oldest">Terlama Dulu</option><option value="name">Nama A-Z</option>
      </select>
    </div>

    <div class="card" style="margin-bottom:28px">
      <div class="tab-nav"><button class="tab-btn active"><i class="fa fa-calendar-check"></i> Semua Jadwal <span class="tab-count" id="tabCount">0</span></button></div>
      <div class="table-wrap">
        <table>
          <thead><tr><th>#</th><th>Nama Siswa</th><th>Kelas</th><th>Tanggal</th><th>Jam Mulai</th><th>Keperluan</th><th>Status</th><th>Aksi</th></tr></thead>
          <tbody id="tableBody"><tr><td colspan="8"><div class="empty-state"><i class="fa fa-spinner fa-spin"></i><p>Memuat data...</p></div></td></tr></tbody>
        </table>
      </div>
      <div class="pagination-bar">
        <span id="paginationInfo">Menampilkan 0 data</span>
        <div class="pagination-btns" id="paginationBtns"></div>
      </div>
    </div>
  </div>
</div>

<script>
const BASE_URL        = '<?= base_url() ?>';
const CSRF_TOKEN_NAME = '<?= csrf_token() ?>';
const CSRF_HASH       = '<?= csrf_hash() ?>';
const AVATAR_COLORS   = ['#1a56db','#ef4444','#f59e0b','#10b981','#8b5cf6','#ec4899','#06b6d4','#f97316'];

let allData=[], hapusId=null, currentPage=1;
const perPage=10;

function getInitials(n){return String(n||'?').split(' ').map(w=>w[0]).join('').toUpperCase().slice(0,2);}
function getColor(n){const h=String(n||'').split('').reduce((a,c)=>a+c.charCodeAt(0),0);return AVATAR_COLORS[h%AVATAR_COLORS.length];}
function fmtTgl(s){if(!s)return'—';const d=new Date(s+'T00:00:00'),m=['Jan','Feb','Mar','Apr','Mei','Jun','Jul','Ags','Sep','Okt','Nov','Des'];return d.getDate()+' '+m[d.getMonth()]+' '+d.getFullYear();}
function esc(s){return String(s||'').replace(/&/g,'&amp;').replace(/</g,'&lt;').replace(/>/g,'&gt;').replace(/"/g,'&quot;');}
function csrfHeaders(){return{'Content-Type':'application/json','X-Requested-With':'XMLHttpRequest',[CSRF_TOKEN_NAME]:CSRF_HASH};}

// Ambil nilai jam dari dropdown
function getJam(hId, mId) {
  const h = document.getElementById(hId)?.value;
  const m = document.getElementById(mId)?.value;
  return (h && h !== '') ? (h + ':' + (m||'00') + ':00') : null;
}

// Load daftar siswa
async function loadSiswa() {
  try {
    const res  = await fetch(`${BASE_URL}jadwal/get-siswa`,{headers:{'X-Requested-With':'XMLHttpRequest'}});
    const json = await res.json();
    const opts = (json.data||[]).map(s=>`<option value="${s.id}">${esc(s.nama)} — ${esc(s.kelas)}</option>`).join('');
    const base = '<option value="">-- Pilih Siswa --</option>';
    document.getElementById('f_siswa_id').innerHTML = base+opts;
    document.getElementById('e_siswa_id').innerHTML = base+opts;
  } catch(e){console.error(e);}
}

// Load data jadwal
async function loadData() {
  const p = new URLSearchParams({
    search: document.getElementById('searchInput').value,
    status: document.getElementById('filterStatus').value,
    sort  : document.getElementById('filterSort').value,
  });
  const res  = await fetch(`${BASE_URL}jadwal/get-data?${p}`,{headers:{'X-Requested-With':'XMLHttpRequest'}});
  const json = await res.json();
  allData = json.data||[];
  renderTable();
}

function renderTable() {
  const total=allData.length, pages=Math.ceil(total/perPage)||1;
  if(currentPage>pages) currentPage=pages;
  const slice=allData.slice((currentPage-1)*perPage,currentPage*perPage);
  document.getElementById('tabCount').textContent=total;
  document.getElementById('paginationInfo').textContent=`Menampilkan ${slice.length} dari ${total} data`;
  const tbody=document.getElementById('tableBody');
  if(!slice.length){
    tbody.innerHTML=`<tr><td colspan="8"><div class="empty-state"><i class="fa fa-calendar-xmark"></i><p>Belum ada jadwal konseling</p></div></td></tr>`;
  } else {
    tbody.innerHTML=slice.map((j,i)=>{
      const num=(currentPage-1)*perPage+i+1, sc=(j.status||'menunggu').toLowerCase(), lbl=sc.charAt(0).toUpperCase()+sc.slice(1);
      return `<tr>
        <td style="color:var(--gray-400);font-weight:500">${num}</td>
        <td><div class="td-student"><div class="td-avatar" style="background:${getColor(j.nama)}">${getInitials(j.nama)}</div>
          <div><div class="td-name">${esc(j.nama)}</div><div class="td-sub">${esc(j.nisn||'')}</div></div></div></td>
        <td style="color:var(--gray-600)">${esc(j.kelas||'—')}</td>
        <td style="color:var(--gray-600)">${fmtTgl(j.tanggal)}</td>
        <td style="color:var(--gray-600)">${esc(j.jam_mulai||'—')}</td>
        <td style="max-width:200px;overflow:hidden;text-overflow:ellipsis;white-space:nowrap;color:var(--gray-600)" title="${esc(j.keperluan)}">${esc(j.keperluan)}</td>
        <td><span class="badge ${sc}">${lbl}</span></td>
        <td><div class="action-btns">
          <button class="btn-icon view" onclick="openDetail(${j.id})"><i class="fa fa-eye"></i></button>
          <button class="btn-icon edit" onclick="openEdit(${j.id})"><i class="fa fa-pen"></i></button>
          <button class="btn-icon del"  onclick="openHapus(${j.id},'${esc(j.nama)}')"><i class="fa fa-trash"></i></button>
        </div></td></tr>`;
    }).join('');
  }
  const pb=document.getElementById('paginationBtns');
  let b=`<button class="pg-btn" onclick="goPage(${currentPage-1})" ${currentPage===1?'disabled':''}>«</button>`;
  for(let p=1;p<=pages;p++) b+=`<button class="pg-btn ${p===currentPage?'active':''}" onclick="goPage(${p})">${p}</button>`;
  b+=`<button class="pg-btn" onclick="goPage(${currentPage+1})" ${currentPage===pages?'disabled':''}>»</button>`;
  pb.innerHTML=b;
}

function goPage(p){const pg=Math.ceil(allData.length/perPage)||1;if(p<1||p>pg)return;currentPage=p;renderTable();}
function filterTable(){currentPage=1;loadData();}

// ── TAMBAH ──
function openTambah(){
  document.getElementById('f_siswa_id').value='';
  document.getElementById('f_tanggal').value=new Date().toISOString().split('T')[0];
  document.getElementById('f_jam_mulai_h').value='08';
  document.getElementById('f_jam_mulai_m').value='00';
  document.getElementById('f_jam_selesai_h').value='';
  document.getElementById('f_jam_selesai_m').value='00';
  document.getElementById('f_keperluan').value='';
  document.getElementById('f_catatan').value='';
  document.getElementById('f_status').value='menunggu';
  openModal('modalTambah');
}

async function simpanJadwal(){
  try {
    const payload={
      siswa_id   : document.getElementById('f_siswa_id').value,
      tanggal    : document.getElementById('f_tanggal').value,
      jam_mulai  : getJam('f_jam_mulai_h','f_jam_mulai_m'),
      jam_selesai: getJam('f_jam_selesai_h','f_jam_selesai_m'),
      keperluan  : document.getElementById('f_keperluan').value.trim(),
      catatan    : document.getElementById('f_catatan').value.trim(),
      status     : document.getElementById('f_status').value,
    };
    if(!payload.siswa_id||!payload.tanggal||!payload.jam_mulai||!payload.keperluan){
      showFlash('Harap lengkapi semua field yang wajib diisi!','error'); return;
    }
    const res=await fetch(`${BASE_URL}jadwal/simpan`,{method:'POST',headers:csrfHeaders(),body:JSON.stringify(payload)});
    const json=await res.json();
    if(json.status==='ok'){closeModal('modalTambah');showToast('Jadwal berhasil ditambahkan!','success');loadData();}
    else showFlash(json.message||'Gagal menyimpan.','error');
  } catch(err){showFlash('Error: '+err.message,'error');console.error(err);}
}

// ── EDIT ──
function openEdit(id){
  const j=allData.find(x=>x.id==id); if(!j) return;
  const mn=['00','05','10','15','20','25','30','35','40','45','50','55'];
  const [mh,mm]=(j.jam_mulai||'08:00').split(':');
  const [sh,sm]=(j.jam_selesai||'').split(':');
  document.getElementById('e_id').value=j.id;
  document.getElementById('e_siswa_id').value=j.siswa_id;
  document.getElementById('e_tanggal').value=j.tanggal;
  document.getElementById('e_jam_mulai_h').value=mh||'08';
  document.getElementById('e_jam_mulai_m').value=mn.includes(mm)?mm:'00';
  document.getElementById('e_jam_selesai_h').value=sh||'';
  document.getElementById('e_jam_selesai_m').value=mn.includes(sm)?sm:'00';
  document.getElementById('e_keperluan').value=j.keperluan;
  document.getElementById('e_catatan').value=j.catatan||'';
  document.getElementById('e_status').value=j.status;
  openModal('modalEdit');
}

async function updateJadwal(){
  try {
    const id=document.getElementById('e_id').value;
    const payload={
      siswa_id   : document.getElementById('e_siswa_id').value,
      tanggal    : document.getElementById('e_tanggal').value,
      jam_mulai  : getJam('e_jam_mulai_h','e_jam_mulai_m'),
      jam_selesai: getJam('e_jam_selesai_h','e_jam_selesai_m'),
      keperluan  : document.getElementById('e_keperluan').value.trim(),
      catatan    : document.getElementById('e_catatan').value.trim(),
      status     : document.getElementById('e_status').value,
    };
    if(!payload.siswa_id||!payload.tanggal||!payload.jam_mulai||!payload.keperluan){
      showFlash('Harap lengkapi semua field yang wajib diisi!','error'); return;
    }
    const res=await fetch(`${BASE_URL}jadwal/update/${id}`,{method:'POST',headers:csrfHeaders(),body:JSON.stringify(payload)});
    const json=await res.json();
    if(json.status==='ok'){closeModal('modalEdit');showToast('Jadwal berhasil diperbarui!','success');loadData();}
    else showFlash(json.message||'Gagal memperbarui.','error');
  } catch(err){showFlash('Error: '+err.message,'error');console.error(err);}
}

// ── HAPUS ──
function openHapus(id,nama){hapusId=id;document.getElementById('hapusNama').textContent=nama;openModal('modalHapus');}
async function hapusJadwal(){
  if(!hapusId) return;
  const res=await fetch(`${BASE_URL}jadwal/hapus/${hapusId}`,{method:'POST',headers:{'X-Requested-With':'XMLHttpRequest',[CSRF_TOKEN_NAME]:CSRF_HASH}});
  const json=await res.json();
  if(json.status==='ok'){closeModal('modalHapus');showToast('Jadwal berhasil dihapus!','info');loadData();}
  else showFlash(json.message||'Gagal menghapus.','error');
  hapusId=null;
}

// ── DETAIL ──
async function openDetail(id){
  const res=await fetch(`${BASE_URL}jadwal/detail/${id}`,{headers:{'X-Requested-With':'XMLHttpRequest'}});
  const json=await res.json();
  if(json.status!=='ok') return;
  const j=json.data, sc=(j.status||'menunggu').toLowerCase(), lbl=sc.charAt(0).toUpperCase()+sc.slice(1);
  document.getElementById('detailAvatar').textContent=getInitials(j.nama);
  document.getElementById('detailAvatar').style.background=getColor(j.nama);
  document.getElementById('detailNama').textContent=j.nama||'—';
  document.getElementById('detailMeta').textContent=fmtTgl(j.tanggal)+' • '+(j.jam_mulai||'—');
  document.getElementById('dTanggal').textContent=fmtTgl(j.tanggal);
  document.getElementById('dJamMulai').textContent=j.jam_mulai||'—';
  document.getElementById('dJamSelesai').textContent=j.jam_selesai||'—';
  document.getElementById('dKelas').textContent=j.kelas||'—';
  document.getElementById('dStatus').innerHTML=`<span class="badge ${sc}">${lbl}</span>`;
  document.getElementById('dKontak').textContent=j.no_hp_ortu||'—';
  document.getElementById('dKeperluan').textContent=j.keperluan||'—';
  document.getElementById('dCatatan').textContent=j.catatan||'(tidak ada catatan)';
  document.getElementById('detailEditBtn').onclick=()=>{closeModal('modalDetail');openEdit(id);};
  openModal('modalDetail');
}

// ── TOAST & FLASH ──
function showToast(msg,type='success'){
  const icons={success:'fa-circle-check',error:'fa-circle-exclamation',info:'fa-circle-info'};
  const el=document.createElement('div');el.className=`toast ${type}`;
  el.innerHTML=`<i class="fa ${icons[type]}"></i> ${msg}`;
  document.getElementById('toastContainer').appendChild(el);
  setTimeout(()=>el.style.opacity='0',3000);setTimeout(()=>el.remove(),3400);
}
function showFlash(msg,type='success'){
  const icons={success:'fa-circle-check',error:'fa-circle-exclamation',info:'fa-circle-info'};
  const z=document.getElementById('flashZone');
  z.innerHTML=`<div class="flash-alert ${type}"><i class="fa ${icons[type]}"></i> ${msg}</div>`;
  setTimeout(()=>z.innerHTML='',4000);
}

function openModal(id){document.getElementById(id).classList.add('show');}
function closeModal(id){document.getElementById(id).classList.remove('show');}
document.querySelectorAll('.modal-overlay').forEach(m=>m.addEventListener('click',e=>{if(e.target===m)m.classList.remove('show');}));

function toggleSidebar(){document.getElementById('sidebar').classList.toggle('open');document.getElementById('overlay').classList.toggle('show');}
function closeSidebar(){document.getElementById('sidebar').classList.remove('open');document.getElementById('overlay').classList.remove('show');}
function toggleFS(){if(!document.fullscreenElement){document.documentElement.requestFullscreen();document.getElementById('fsIcon').className='fa fa-compress';}else{document.exitFullscreen();document.getElementById('fsIcon').className='fa fa-expand';}}

function updateClock(){
  const d=new Date(),dy=['Minggu','Senin','Selasa','Rabu','Kamis','Jumat','Sabtu'],mn=['Jan','Feb','Mar','Apr','Mei','Jun','Jul','Ags','Sep','Okt','Nov','Des'];
  document.getElementById('dateLive').textContent=dy[d.getDay()]+', '+d.getDate()+' '+mn[d.getMonth()]+' '+d.getFullYear();
  document.getElementById('timeLive').textContent=String(d.getHours()).padStart(2,'0')+':'+String(d.getMinutes()).padStart(2,'0')+':'+String(d.getSeconds()).padStart(2,'0')+' WIB';
}
setInterval(updateClock,1000);updateClock();

loadSiswa();
loadData();
</script>
</body>
</html>