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
/* SIDEBAR */
.sidebar{width:var(--sidebar-w);min-height:100vh;background:linear-gradient(175deg,var(--blue-900) 0%,var(--blue-800) 50%,var(--blue-700) 100%);position:fixed;left:0;top:0;bottom:0;z-index:100;display:flex;flex-direction:column;box-shadow:4px 0 32px rgba(10,22,40,.25);transition:var(--transition);overflow-y:auto;overflow-x:hidden}
.sidebar-brand{padding:28px 24px 22px;display:flex;align-items:center;gap:14px;border-bottom:1px solid rgba(255,255,255,.08);flex-shrink:0}
.brand-icon{width:46px;height:46px;background:linear-gradient(135deg,var(--blue-500),var(--blue-400));border-radius:13px;display:flex;align-items:center;justify-content:center;font-size:20px;color:white;flex-shrink:0}
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
/* MAIN */
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
/* NOTIF PANEL */
.notif-panel{position:absolute;top:calc(var(--navbar-h) + 4px);right:80px;width:360px;background:white;border-radius:var(--radius);box-shadow:var(--shadow-lg);border:1px solid var(--gray-200);z-index:200;display:none;animation:fadeInUp .2s ease}
.notif-panel.show{display:block}
.notif-header{padding:16px 18px 12px;border-bottom:1px solid var(--gray-100);display:flex;justify-content:space-between;align-items:center}
.notif-header h3{font-family:'Outfit',sans-serif;font-size:15px;font-weight:700;color:var(--blue-900)}
.notif-badge-count{background:var(--danger);color:white;font-size:10px;font-weight:700;padding:2px 7px;border-radius:20px}
.notif-clear{font-size:12px;color:var(--blue-500);cursor:pointer;background:none;border:none;font-family:'DM Sans',sans-serif;font-weight:500}
.notif-clear:hover{text-decoration:underline}
.notif-list{max-height:340px;overflow-y:auto}
.notif-item{padding:12px 18px;border-bottom:1px solid var(--gray-50);display:flex;align-items:flex-start;gap:10px;cursor:pointer;transition:var(--transition)}
.notif-item:hover{background:var(--blue-50)}
.notif-item.unread{background:#eff6ff}
.notif-ico{width:36px;height:36px;border-radius:50%;display:flex;align-items:center;justify-content:center;font-size:14px;flex-shrink:0}
.notif-ico.blue{background:var(--blue-100);color:var(--blue-600)}
.notif-ico.green{background:#d1fae5;color:#059669}
.notif-ico.red{background:#fee2e2;color:var(--danger)}
.notif-ico.yellow{background:#fef3c7;color:#d97706}
.notif-text{flex:1}
.notif-text p{font-size:13px;color:var(--gray-800);line-height:1.4}
.notif-text span{font-size:11px;color:var(--gray-400);display:block;margin-top:3px}
.notif-unread-dot{width:8px;height:8px;border-radius:50%;background:var(--blue-500);flex-shrink:0;margin-top:5px}
.notif-footer{padding:12px 18px;text-align:center;border-top:1px solid var(--gray-100)}
.notif-footer a{font-size:13px;color:var(--blue-500);font-weight:500;text-decoration:none}
.notif-footer a:hover{text-decoration:underline}
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
.btn-danger{padding:10px 20px;border-radius:var(--radius-sm);border:none;background:var(--danger);color:white;font-family:'DM Sans',sans-serif;font-size:13.5px;font-weight:500;cursor:pointer;transition:var(--transition);display:inline-flex;align-items:center;gap:8px}
.btn-danger:hover{background:#dc2626}
.btn-success{padding:10px 20px;border-radius:var(--radius-sm);border:none;background:var(--success);color:white;font-family:'DM Sans',sans-serif;font-size:13.5px;font-weight:500;cursor:pointer;transition:var(--transition);display:inline-flex;align-items:center;gap:8px}
.btn-success:hover{background:#059669}
.btn-cancel{padding:10px 20px;border-radius:var(--radius-sm);border:1.5px solid var(--gray-200);background:white;font-family:'DM Sans',sans-serif;font-size:13px;color:var(--gray-600);cursor:pointer;transition:var(--transition)}
.btn-cancel:hover{background:var(--gray-50)}
/* FLASH */
.flash-alert{padding:14px 18px;border-radius:var(--radius-sm);margin-bottom:20px;display:flex;align-items:center;gap:10px;font-size:13.5px;font-weight:500;animation:fadeInUp .3s ease}
.flash-alert.success{background:#d1fae5;color:#065f46;border:1px solid #6ee7b7}
.flash-alert.error{background:#fee2e2;color:#991b1b;border:1px solid #fca5a5}
.flash-alert.info{background:var(--blue-100);color:var(--blue-700);border:1px solid var(--blue-300)}
#flashZone{min-height:0}
/* STATS */
.stats-grid{display:grid;grid-template-columns:repeat(4,1fr);gap:18px;margin-bottom:24px}
.stat-card{background:white;border-radius:var(--radius);padding:20px 22px;box-shadow:var(--shadow);transition:var(--transition);position:relative;overflow:hidden;animation:fadeInUp .4s ease both}
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
/* FILTER */
.filter-bar{background:white;border-radius:var(--radius);padding:14px 20px;box-shadow:var(--shadow);display:flex;align-items:center;gap:10px;margin-bottom:18px;flex-wrap:wrap}
.filter-search{flex:1;min-width:200px;position:relative}
.filter-search input{width:100%;padding:9px 14px 9px 36px;border-radius:var(--radius-sm);border:1.5px solid var(--gray-200);background:var(--gray-50);font-family:'DM Sans',sans-serif;font-size:13px;color:var(--gray-800);outline:none;transition:var(--transition)}
.filter-search input:focus{border-color:var(--blue-400);background:white;box-shadow:0 0 0 3px rgba(59,130,246,.1)}
.filter-search i{position:absolute;left:11px;top:50%;transform:translateY(-50%);color:var(--gray-400);font-size:12px}
.filter-select{padding:9px 12px;border-radius:var(--radius-sm);border:1.5px solid var(--gray-200);background:white;font-family:'DM Sans',sans-serif;font-size:12.5px;color:var(--gray-700);outline:none;cursor:pointer;transition:var(--transition)}
.filter-select:focus{border-color:var(--blue-400)}
/* TABLE */
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
tbody tr{transition:var(--transition)}
tbody tr:hover{background:var(--blue-50)}
.td-student{display:flex;align-items:center;gap:10px}
.td-avatar{width:34px;height:34px;border-radius:50%;display:flex;align-items:center;justify-content:center;font-size:12px;font-weight:700;color:white;flex-shrink:0}
.td-name{font-weight:600;color:var(--blue-900);font-size:13px}
.td-class{font-size:11px;color:var(--gray-400);margin-top:1px}
.badge{display:inline-flex;align-items:center;gap:4px;padding:4px 10px;border-radius:20px;font-size:11px;font-weight:600;white-space:nowrap}
.badge::before{content:'';width:5px;height:5px;border-radius:50%;background:currentColor}
.badge.terjadwal{background:var(--blue-100);color:var(--blue-600)}
.badge.selesai{background:#d1fae5;color:#059669}
.badge.batal{background:#fee2e2;color:#dc2626}
.action-btns{display:flex;gap:5px}
.btn-icon{width:30px;height:30px;border-radius:7px;border:none;cursor:pointer;display:flex;align-items:center;justify-content:center;font-size:12px;transition:var(--transition)}
.btn-icon.view{background:var(--blue-100);color:var(--blue-600)}
.btn-icon.edit{background:#fef3c7;color:#b45309}
.btn-icon.del{background:#fee2e2;color:#dc2626}
.btn-icon.email-btn{background:#d1fae5;color:#059669}
.btn-icon:hover{opacity:.8;transform:scale(1.08)}
.pagination-bar{display:flex;align-items:center;justify-content:space-between;padding:14px 22px;border-top:1px solid var(--gray-100);font-size:12.5px;color:var(--gray-400)}
.pagination-btns{display:flex;gap:5px}
.pg-btn{width:32px;height:32px;border-radius:8px;border:1.5px solid var(--gray-200);background:white;display:flex;align-items:center;justify-content:center;cursor:pointer;font-size:12.5px;color:var(--gray-600);font-family:'DM Sans',sans-serif;transition:var(--transition)}
.pg-btn:hover{border-color:var(--blue-400);color:var(--blue-600)}
.pg-btn.active{background:var(--blue-500);border-color:var(--blue-500);color:white}
.empty-state{text-align:center;padding:56px 20px;color:var(--gray-400)}
.empty-state i{font-size:42px;color:var(--gray-200);display:block;margin-bottom:14px}
.empty-state p{font-size:14px}
/* MODALS */
.modal-overlay{display:none;position:fixed;inset:0;background:rgba(10,22,40,.55);z-index:300;align-items:center;justify-content:center;padding:20px}
.modal-overlay.show{display:flex}
.modal{background:white;border-radius:var(--radius);width:100%;max-height:90vh;overflow-y:auto;box-shadow:0 24px 80px rgba(10,22,40,.3);animation:modalIn .25s ease}
@keyframes modalIn{from{opacity:0;transform:scale(.95) translateY(10px)}to{opacity:1;transform:scale(1) translateY(0)}}
.modal-sm{max-width:420px}.modal-md{max-width:580px}.modal-lg{max-width:700px}
.modal-header{padding:22px 26px 18px;display:flex;align-items:center;justify-content:space-between;position:sticky;top:0;z-index:1}
.modal-header.blue{background:linear-gradient(135deg,var(--blue-800),var(--blue-500))}
.modal-header.red{background:linear-gradient(135deg,#991b1b,var(--danger))}
.modal-header.yellow{background:linear-gradient(135deg,#92400e,var(--warning))}
.modal-header.green{background:linear-gradient(135deg,#065f46,var(--success))}
.modal-header.export-h{background:linear-gradient(135deg,#1e1b4b,#4338ca)}
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
/* CONFIRM MODAL */
.confirm-icon{width:60px;height:60px;border-radius:50%;background:#fee2e2;display:flex;align-items:center;justify-content:center;font-size:26px;color:var(--danger);margin:0 auto 16px}
.confirm-title{font-family:'Outfit',sans-serif;font-size:18px;font-weight:700;color:var(--gray-900);text-align:center;margin-bottom:8px}
.confirm-msg{font-size:13.5px;color:var(--gray-500);text-align:center;line-height:1.6}
.confirm-name{font-weight:700;color:var(--gray-800)}
/* DETAIL MODAL */
.detail-hero{background:linear-gradient(135deg,var(--blue-900),var(--blue-700));padding:26px;display:flex;align-items:center;gap:18px}
.detail-avatar{width:64px;height:64px;border-radius:50%;display:flex;align-items:center;justify-content:center;font-family:'Outfit',sans-serif;font-size:22px;font-weight:800;color:white;box-shadow:0 4px 14px rgba(0,0,0,.3);flex-shrink:0}
.detail-hero-name{font-family:'Outfit',sans-serif;font-size:19px;font-weight:700;color:white}
.detail-hero-meta{font-size:12.5px;color:var(--blue-300);margin-top:3px}
.detail-grid{display:grid;grid-template-columns:1fr 1fr;gap:18px;margin-bottom:18px}
.detail-item .dl{font-size:11px;font-weight:700;text-transform:uppercase;letter-spacing:.8px;color:var(--gray-400);margin-bottom:4px}
.detail-item .dv{font-size:13.5px;font-weight:500;color:var(--gray-800)}
.detail-divider{height:1px;background:var(--gray-100);margin:18px 0}
.detail-catatan{background:var(--gray-50);border-radius:var(--radius-sm);padding:14px;font-size:13px;color:var(--gray-600);line-height:1.7;border-left:3px solid var(--blue-400)}
/* EXPORT OPTIONS */
.export-grid{display:grid;grid-template-columns:1fr 1fr;gap:12px;margin-bottom:20px}
.export-card{padding:16px;border-radius:var(--radius-sm);border:2px solid var(--gray-200);cursor:pointer;transition:var(--transition);display:flex;align-items:center;gap:14px}
.export-card:hover{border-color:var(--blue-400);background:var(--blue-50)}
.export-card.selected{border-color:var(--blue-500);background:var(--blue-50)}
.export-ico{width:42px;height:42px;border-radius:10px;display:flex;align-items:center;justify-content:center;font-size:18px;flex-shrink:0}
.export-ico.csv{background:#d1fae5;color:#059669}
.export-ico.pdf{background:#fee2e2;color:#dc2626}
.export-ico.excel{background:#d1fae5;color:#065f46}
.export-ico.print{background:var(--gray-100);color:var(--gray-600)}
.export-label{font-size:13.5px;font-weight:600;color:var(--gray-800)}
.export-desc{font-size:11.5px;color:var(--gray-400);margin-top:2px}
/* EMAIL MODAL */
.email-to-chip{display:inline-flex;align-items:center;gap:6px;padding:4px 12px;background:var(--blue-100);color:var(--blue-700);border-radius:20px;font-size:12px;font-weight:600;margin:3px}
/* OVERLAY */
.overlay{display:none;position:fixed;inset:0;background:rgba(10,22,40,.4);z-index:90}
.overlay.show{display:block}
/* ANIMATIONS */
@keyframes fadeInUp{from{opacity:0;transform:translateY(16px)}to{opacity:1;transform:translateY(0)}}
@keyframes slideIn{from{opacity:0;transform:translateX(30px)}to{opacity:1;transform:translateX(0)}}
/* TOAST */
.toast-container{position:fixed;bottom:28px;right:28px;z-index:999;display:flex;flex-direction:column;gap:10px}
.toast{background:white;border-radius:12px;padding:14px 18px;box-shadow:0 8px 30px rgba(10,22,40,.2);display:flex;align-items:center;gap:12px;font-size:13.5px;font-weight:500;animation:slideIn .3s ease;min-width:280px;border-left:4px solid}
.toast.success{border-color:var(--success);color:#065f46}
.toast.error{border-color:var(--danger);color:#991b1b}
.toast.info{border-color:var(--blue-500);color:var(--blue-700)}
.toast i{font-size:16px}
/* RESPONSIVE */
::-webkit-scrollbar{width:6px;height:6px}
::-webkit-scrollbar-track{background:transparent}
::-webkit-scrollbar-thumb{background:var(--gray-200);border-radius:10px}
::-webkit-scrollbar-thumb:hover{background:var(--blue-300)}
@media(max-width:1200px){.stats-grid{grid-template-columns:repeat(2,1fr)}}
@media(max-width:768px){:root{--sidebar-w:0px}.sidebar{transform:translateX(-270px);width:270px}.sidebar.open{transform:translateX(0)}.main-wrapper{margin-left:0}.navbar-hamburger{display:flex}.navbar,.page-content{padding:0 18px}.page-content{padding:20px 18px}.stats-grid{grid-template-columns:1fr 1fr}.page-header{flex-direction:column}.form-row{grid-template-columns:1fr}.export-grid{grid-template-columns:1fr}}
@media(max-width:480px){.stats-grid{grid-template-columns:1fr}}
</style>
</head>
<body>

<div class="overlay" id="overlay" onclick="closeSidebar()"></div>
<div class="toast-container" id="toastContainer"></div>

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
          <label class="form-label">Nama Siswa <span>*</span></label>
          <input type="text" class="form-input" id="f_nama" placeholder="Nama lengkap siswa" required>
        </div>
      </div>
      <div class="form-row">
        <div class="form-group">
          <label class="form-label">Kelas</label>
          <input type="text" class="form-input" id="f_kelas" placeholder="Contoh: XII IPA 1">
        </div>
        <div class="form-group">
          <label class="form-label">No. HP / Email Orang Tua</label>
          <input type="text" class="form-input" id="f_kontak" placeholder="email@gmail.com">
        </div>
      </div>
      <div class="form-row">
        <div class="form-group">
          <label class="form-label">Tanggal <span>*</span></label>
          <input type="date" class="form-input" id="f_tanggal" required>
        </div>
        <div class="form-group">
          <label class="form-label">Waktu <span>*</span></label>
          <input type="time" class="form-input" id="f_waktu" required>
        </div>
      </div>
      <div class="form-row full">
        <div class="form-group">
          <label class="form-label">Topik Konseling <span>*</span></label>
          <textarea class="form-textarea" id="f_topik" placeholder="Uraikan topik atau permasalahan yang akan dibahas..." required></textarea>
        </div>
      </div>
      <div class="form-row full">
        <div class="form-group">
          <label class="form-label">Status</label>
          <select class="form-select" id="f_status">
            <option value="Terjadwal">Terjadwal</option>
            <option value="Selesai">Selesai</option>
            <option value="Batal">Batal</option>
          </select>
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
          <label class="form-label">Nama Siswa <span>*</span></label>
          <input type="text" class="form-input" id="e_nama" required>
        </div>
      </div>
      <div class="form-row">
        <div class="form-group">
          <label class="form-label">Kelas</label>
          <input type="text" class="form-input" id="e_kelas">
        </div>
        <div class="form-group">
          <label class="form-label">No. HP / Email Orang Tua</label>
          <input type="text" class="form-input" id="e_kontak">
        </div>
      </div>
      <div class="form-row">
        <div class="form-group">
          <label class="form-label">Tanggal <span>*</span></label>
          <input type="date" class="form-input" id="e_tanggal" required>
        </div>
        <div class="form-group">
          <label class="form-label">Waktu <span>*</span></label>
          <input type="time" class="form-input" id="e_waktu" required>
        </div>
      </div>
      <div class="form-row full">
        <div class="form-group">
          <label class="form-label">Topik Konseling <span>*</span></label>
          <textarea class="form-textarea" id="e_topik" required></textarea>
        </div>
      </div>
      <div class="form-row full">
        <div class="form-group">
          <label class="form-label">Status</label>
          <select class="form-select" id="e_status">
            <option value="Terjadwal">Terjadwal</option>
            <option value="Selesai">Selesai</option>
            <option value="Batal">Batal</option>
          </select>
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
        <div class="detail-item"><div class="dl">Kelas</div><div class="dv" id="dKelas">—</div></div>
        <div class="detail-item"><div class="dl">Status</div><div class="dv" id="dStatus">—</div></div>
        <div class="detail-item"><div class="dl">Kontak Ortu</div><div class="dv" id="dKontak">—</div></div>
        <div class="detail-item"><div class="dl">Dibuat</div><div class="dv" id="dCreated">—</div></div>
      </div>
      <div class="detail-divider"></div>
      <div style="font-size:11px;font-weight:700;text-transform:uppercase;letter-spacing:.8px;color:var(--gray-400);margin-bottom:8px">Topik Konseling</div>
      <div class="detail-catatan" id="dTopik">—</div>
    </div>
    <div class="modal-footer">
      <button class="btn-cancel" onclick="closeModal('modalDetail')">Tutup</button>
      <button class="btn-primary" id="detailEditBtn" onclick="closeModal('modalDetail')"><i class="fa fa-pen"></i> Edit</button>
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

<!-- MODAL EXPORT -->
<div class="modal-overlay" id="modalExport">
  <div class="modal modal-md">
    <div class="modal-header export-h">
      <h2><i class="fa fa-file-export"></i> Export Data Jadwal</h2>
      <button class="modal-close" onclick="closeModal('modalExport')"><i class="fa fa-times"></i></button>
    </div>
    <div class="modal-body">
      <p style="font-size:13.5px;color:var(--gray-600);margin-bottom:18px">Pilih format export dan rentang data yang ingin diunduh:</p>
      <div class="export-grid">
        <div class="export-card selected" onclick="selectExport(this,'csv')">
          <div class="export-ico csv"><i class="fa fa-file-csv"></i></div>
          <div><div class="export-label">CSV</div><div class="export-desc">Kompatibel dengan Excel</div></div>
        </div>
        <div class="export-card" onclick="selectExport(this,'excel')">
          <div class="export-ico excel"><i class="fa fa-file-excel"></i></div>
          <div><div class="export-label">Excel (XLSX)</div><div class="export-desc">Spreadsheet lengkap</div></div>
        </div>
        <div class="export-card" onclick="selectExport(this,'pdf')">
          <div class="export-ico pdf"><i class="fa fa-file-pdf"></i></div>
          <div><div class="export-label">PDF</div><div class="export-desc">Siap cetak &amp; bagikan</div></div>
        </div>
        <div class="export-card" onclick="selectExport(this,'print')">
          <div class="export-ico print"><i class="fa fa-print"></i></div>
          <div><div class="export-label">Cetak</div><div class="export-desc">Langsung ke printer</div></div>
        </div>
      </div>
      <div class="form-row">
        <div class="form-group">
          <label class="form-label">Filter Status</label>
          <select class="form-select" id="expStatus">
            <option value="">Semua Status</option>
            <option value="Terjadwal">Terjadwal</option>
            <option value="Selesai">Selesai</option>
            <option value="Batal">Batal</option>
          </select>
        </div>
        <div class="form-group">
          <label class="form-label">Nama File</label>
          <input type="text" class="form-input" id="expFilename" value="jadwal_konseling">
        </div>
      </div>
      <div style="background:var(--blue-50);border-radius:var(--radius-sm);padding:12px 14px;font-size:13px;color:var(--blue-700);display:flex;align-items:center;gap:8px">
        <i class="fa fa-circle-info"></i> Total <strong id="expCount">0</strong> data akan diekspor
      </div>
    </div>
    <div class="modal-footer">
      <button class="btn-cancel" onclick="closeModal('modalExport')">Batal</button>
      <button class="btn-primary" onclick="doExport()"><i class="fa fa-download"></i> Download</button>
    </div>
  </div>
</div>

<!-- MODAL EMAIL -->
<div class="modal-overlay" id="modalEmail">
  <div class="modal modal-md">
    <div class="modal-header green">
      <h2><i class="fa fa-envelope"></i> Kirim Notifikasi Email</h2>
      <button class="modal-close" onclick="closeModal('modalEmail')"><i class="fa fa-times"></i></button>
    </div>
    <div class="modal-body">
      <div class="form-row full" style="margin-bottom:12px">
        <div class="form-group">
          <label class="form-label">Kepada (Siswa / Orang Tua)</label>
          <div id="emailToChips" style="margin-bottom:8px"></div>
          <input type="email" class="form-input" id="emailTo" placeholder="Tambah email penerima...">
        </div>
      </div>
      <div class="form-row full">
        <div class="form-group">
          <label class="form-label">Subjek Email <span>*</span></label>
          <input type="text" class="form-input" id="emailSubject" value="Pemberitahuan Jadwal Konseling BK">
        </div>
      </div>
      <div class="form-row full">
        <div class="form-group">
          <label class="form-label">Isi Pesan <span>*</span></label>
          <textarea class="form-textarea" id="emailBody" style="min-height:140px"></textarea>
        </div>
      </div>
      <div style="background:#d1fae5;border-radius:var(--radius-sm);padding:12px 14px;font-size:13px;color:#065f46;display:flex;align-items:center;gap:8px;margin-top:4px">
        <i class="fa fa-circle-info"></i> Email akan dikirim dari <strong>bk@smakarya-sekadau.sch.id</strong>
      </div>
    </div>
    <div class="modal-footer">
      <button class="btn-cancel" onclick="closeModal('modalEmail')">Batal</button>
      <button class="btn-success" onclick="kirimEmail()"><i class="fa fa-paper-plane"></i> Kirim Email</button>
    </div>
  </div>
</div>

<!-- SIDEBAR -->
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
    <a class="nav-item <?= (uri_string()==''||uri_string()=='dashboard')?'active':'' ?>" href="<?= base_url('/') ?>">
      <i class="fa fa-gauge-high"></i> Dashboard</a>
    <a class="nav-item <?= str_starts_with(uri_string(),'pelanggaran')?'active':'' ?>" href="<?= base_url('pelanggaran') ?>">
      <i class="fa fa-triangle-exclamation"></i> Data Pelanggaran
      <span class="nav-badge"><?= $stats['baru'] ?? 0 ?></span></a>
    <a class="nav-item <?= str_starts_with(uri_string(),'siswa')?'active':'' ?>" href="<?= base_url('siswa') ?>">
      <i class="fa fa-users"></i> Data Siswa</a>
    <a class="nav-item <?= str_starts_with(uri_string(),'tindak-lanjut')?'active':'' ?>" href="<?= base_url('tindak-lanjut') ?>">
      <i class="fa fa-list-check"></i> Tindak Lanjut</a>
    <a class="nav-item <?= str_starts_with(uri_string(),'buku-kunjungan')?'active':'' ?>" href="<?= base_url('buku-kunjungan') ?>">
      <i class="fa fa-book-open"></i> Buku Kunjungan</a>
  </div>

  <div class="sidebar-section">
    <div class="sidebar-section-label">Konseling</div>
    <a class="nav-item <?= str_starts_with(uri_string(),'jadwal')?'active':'' ?>" href="<?= base_url('jadwal') ?>">
      <i class="fa fa-calendar-check"></i> Jadwal Konseling
      <span class="nav-badge warn" id="sidebarBadge">0</span></a>
    <a class="nav-item <?= str_starts_with(uri_string(),'sesi-bimbingan')?'active':'' ?>" href="<?= base_url('sesi-bimbingan') ?>">
      <i class="fa fa-comments"></i> Sesi Bimbingan</a>
    <a class="nav-item <?= str_starts_with(uri_string(),'rekap-bimbingan')?'active':'' ?>" href="<?= base_url('rekap-bimbingan') ?>">
      <i class="fa fa-chart-bar"></i> Rekap Bimbingan</a>
  </div>

  <div class="sidebar-section">
    <div class="sidebar-section-label">Pengelolaan</div>
    <a class="nav-item <?= str_starts_with(uri_string(),'laporan')?'active':'' ?>" href="<?= base_url('laporan') ?>">
      <i class="fa fa-file-lines"></i> Laporan &amp; Rekap</a>
    <a class="nav-item <?= str_starts_with(uri_string(),'kategori-pelanggaran')?'active':'' ?>" href="<?= base_url('kategori-pelanggaran') ?>">
      <i class="fa fa-scale-balanced"></i> Kategori Pelanggaran</a>
    <a class="nav-item <?= str_starts_with(uri_string(),'surat-dokumen')?'active':'' ?>" href="<?= base_url('surat-dokumen') ?>">
      <i class="fa fa-file-signature"></i> Surat &amp; Dokumen</a>
    <a class="nav-item <?= str_starts_with(uri_string(),'notifikasi')?'active':'' ?>" href="<?= base_url('notifikasi') ?>">
      <i class="fa fa-bell"></i> Notifikasi
      <span class="nav-badge" id="sidebarNotifBadge"><?= $stats['baru'] ?? 0 ?></span></a>
  </div>

  <div class="sidebar-section">
    <div class="sidebar-section-label">Sistem</div>
    <a class="nav-item <?= str_starts_with(uri_string(),'guru-bk')?'active':'' ?>" href="<?= base_url('guru-bk') ?>">
      <i class="fa fa-chalkboard-user"></i> Data Guru BK</a>
    <a class="nav-item <?= str_starts_with(uri_string(),'manajemen-user')?'active':'' ?>" href="<?= base_url('manajemen-user') ?>">
      <i class="fa fa-users-gear"></i> Manajemen User</a>
    <a class="nav-item <?= str_starts_with(uri_string(),'pengaturan')?'active':'' ?>" href="<?= base_url('pengaturan') ?>">
      <i class="fa fa-gear"></i> Pengaturan</a>
    <a class="nav-item <?= str_starts_with(uri_string(),'bantuan')?'active':'' ?>" href="<?= base_url('bantuan') ?>">
      <i class="fa fa-circle-question"></i> Bantuan</a>
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

<!-- MAIN -->
<div class="main-wrapper">
  <nav class="navbar" style="position:relative">
    <button class="navbar-hamburger" onclick="toggleSidebar()"><i class="fa fa-bars"></i></button>
    <div class="navbar-search">
      <i class="fa fa-magnifying-glass"></i>
      <input type="text" placeholder="Cari siswa, jadwal konseling...">
    </div>
    <div class="navbar-actions">
      <button class="nav-action-btn" id="notifBtn" onclick="toggleNotifPanel()">
        <i class="fa fa-bell"></i>
        <span class="notif-dot" id="notifDot"></span>
      </button>
      <button class="nav-action-btn" onclick="openEmailBlast()"><i class="fa fa-envelope"></i></button>
      <button class="nav-action-btn" onclick="toggleFS()"><i class="fa fa-expand" id="fsIcon"></i></button>
    </div>
    <div class="navbar-date">
      <span class="date-main" id="dateLive">—</span>
      <span class="date-sub" id="timeLive">—</span>
    </div>

    <!-- NOTIF PANEL -->
    <div class="notif-panel" id="notifPanel">
      <div class="notif-header">
        <h3><i class="fa fa-bell" style="color:var(--blue-500);margin-right:6px"></i> Notifikasi</h3>
        <div style="display:flex;align-items:center;gap:8px">
          <span class="notif-badge-count" id="unreadCount">2</span>
          <button class="notif-clear" onclick="clearAllNotif()">Tandai semua dibaca</button>
        </div>
      </div>
      <div class="notif-list" id="notifList"></div>
      <div class="notif-footer"><a href="#">Lihat semua notifikasi →</a></div>
    </div>
  </nav>

  <div class="page-content">
    <div id="flashZone"></div>

    <div class="page-header">
      <div class="page-header-left">
        <h1>Jadwal Konseling</h1>
        <p>Kelola dan pantau seluruh jadwal sesi konseling siswa</p>
      </div>
      <div class="page-header-right">
        <button class="btn-outline" onclick="openModal('modalExport')"><i class="fa fa-file-export"></i> Export</button>
        <button class="btn-primary" onclick="openTambah()"><i class="fa fa-plus"></i> Tambah Jadwal</button>
      </div>
    </div>

    <div class="stats-grid">
      <div class="stat-card s1">
        <div class="stat-top"><div class="stat-ico"><i class="fa fa-calendar-check"></i></div></div>
        <div class="stat-num" id="statTotal">0</div>
        <div class="stat-lbl">Total Jadwal</div>
      </div>
      <div class="stat-card s2">
        <div class="stat-top"><div class="stat-ico"><i class="fa fa-clock"></i></div></div>
        <div class="stat-num" id="statTerjadwal">0</div>
        <div class="stat-lbl">Terjadwal</div>
      </div>
      <div class="stat-card s3">
        <div class="stat-top"><div class="stat-ico"><i class="fa fa-circle-check"></i></div></div>
        <div class="stat-num" id="statSelesai">0</div>
        <div class="stat-lbl">Selesai</div>
      </div>
      <div class="stat-card s4">
        <div class="stat-top"><div class="stat-ico"><i class="fa fa-circle-xmark"></i></div></div>
        <div class="stat-num" id="statBatal">0</div>
        <div class="stat-lbl">Dibatalkan</div>
      </div>
    </div>

    <div class="filter-bar">
      <div class="filter-search">
        <i class="fa fa-magnifying-glass"></i>
        <input type="text" id="searchInput" placeholder="Cari nama siswa atau topik..." oninput="filterTable()">
      </div>
      <select class="filter-select" id="filterStatus" onchange="filterTable()">
        <option value="">Semua Status</option>
        <option value="Terjadwal">Terjadwal</option>
        <option value="Selesai">Selesai</option>
        <option value="Batal">Batal</option>
      </select>
      <select class="filter-select" id="filterSort" onchange="filterTable()">
        <option value="newest">Terbaru Dulu</option>
        <option value="oldest">Terlama Dulu</option>
        <option value="name">Nama A-Z</option>
      </select>
    </div>

    <div class="card" style="margin-bottom:28px">
      <div class="tab-nav">
        <button class="tab-btn active">
          <i class="fa fa-calendar-check"></i> Semua Jadwal
          <span class="tab-count" id="tabCount">0</span>
        </button>
      </div>
      <div class="table-wrap">
        <table id="jadwalTable">
          <thead>
            <tr>
              <th>#</th>
              <th>Nama Siswa</th>
              <th>Kelas</th>
              <th>Tanggal</th>
              <th>Waktu</th>
              <th>Topik</th>
              <th>Status</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody id="tableBody"></tbody>
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
// ═══════════════════════════════════════════
// DATA STORE (localStorage)
// ═══════════════════════════════════════════
const STORAGE_KEY = 'bk_jadwal_v1';
const NOTIF_KEY = 'bk_notif_v1';
const AVATAR_COLORS = ['#1a56db','#ef4444','#f59e0b','#10b981','#8b5cf6','#ec4899','#06b6d4','#f97316'];

function loadData() {
  const raw = localStorage.getItem(STORAGE_KEY);
  if (raw) return JSON.parse(raw);
  // Seed data awal
  const seed = [
    {id:1,nama:'Ahmad Fauzi',kelas:'XII IPA 1',kontak:'085678901234',tanggal:'2025-04-16',waktu:'08:00',topik:'Masalah motivasi belajar dan rencana studi lanjut ke perguruan tinggi.',status:'Terjadwal',created:'2025-04-10'},
    {id:2,nama:'Siti Rahayu',kelas:'XI IPS 2',kontak:'siti.ortu@gmail.com',tanggal:'2025-04-17',waktu:'10:00',topik:'Konflik dengan teman sekelas yang berdampak pada konsentrasi belajar.',status:'Terjadwal',created:'2025-04-11'},
    {id:3,nama:'Budi Santoso',kelas:'X MIPA 3',kontak:'',tanggal:'2025-04-10',waktu:'09:30',topik:'Pelanggaran tata tertib sekolah, absen berturut-turut 3 hari.',status:'Selesai',created:'2025-04-08'},
    {id:4,nama:'Dewi Anggraini',kelas:'XII IPS 1',kontak:'dewi.ibu@gmail.com',tanggal:'2025-04-12',waktu:'13:00',topik:'Kecemasan menghadapi ujian nasional dan persiapan SNBT.',status:'Selesai',created:'2025-04-09'},
    {id:5,nama:'Rizky Pratama',kelas:'XI MIPA 1',kontak:'',tanggal:'2025-04-14',waktu:'11:00',topik:'Masalah keluarga yang berdampak pada prestasi akademik siswa.',status:'Batal',created:'2025-04-10'},
  ];
  saveData(seed);
  return seed;
}

function saveData(data) {
  localStorage.setItem(STORAGE_KEY, JSON.stringify(data));
}

function loadNotif() {
  const raw = localStorage.getItem(NOTIF_KEY);
  if (raw) return JSON.parse(raw);
  const seed = [
    {id:1,type:'blue',icon:'fa-calendar-plus',text:'Jadwal baru untuk Ahmad Fauzi telah ditambahkan.',time:'5 menit lalu',unread:true},
    {id:2,type:'yellow',icon:'fa-clock',text:'Jadwal Siti Rahayu besok pukul 10:00 WIB.',time:'1 jam lalu',unread:true},
    {id:3,type:'green',icon:'fa-circle-check',text:'Sesi konseling Budi Santoso telah selesai.',time:'2 hari lalu',unread:false},
    {id:4,type:'red',icon:'fa-circle-xmark',text:'Jadwal Rizky Pratama dibatalkan.',time:'2 hari lalu',unread:false},
  ];
  localStorage.setItem(NOTIF_KEY, JSON.stringify(seed));
  return seed;
}

function saveNotif(data) { localStorage.setItem(NOTIF_KEY, JSON.stringify(data)); }

let jadwal = loadData();
let notifData = loadNotif();
let hapusId = null;
let exportFormat = 'csv';
let currentPage = 1;
const perPage = 10;

// ═══════════════════════════════════════════
// RENDER
// ═══════════════════════════════════════════
function getInitials(nama) {
  return nama.split(' ').map(w=>w[0]).join('').toUpperCase().slice(0,2);
}
function getColor(nama) {
  const hash = nama.split('').reduce((a,c)=>a+c.charCodeAt(0),0);
  return AVATAR_COLORS[hash % AVATAR_COLORS.length];
}
function fmtTgl(s) {
  const d = new Date(s+'T00:00:00');
  const m = ['Jan','Feb','Mar','Apr','Mei','Jun','Jul','Ags','Sep','Okt','Nov','Des'];
  return d.getDate()+' '+m[d.getMonth()]+' '+d.getFullYear();
}

function getFiltered() {
  let list = [...jadwal];
  const q = document.getElementById('searchInput').value.toLowerCase();
  const st = document.getElementById('filterStatus').value;
  const sort = document.getElementById('filterSort').value;
  if (q) list = list.filter(j=>(j.nama+j.topik+j.kelas).toLowerCase().includes(q));
  if (st) list = list.filter(j=>j.status===st);
  if (sort==='oldest') list.sort((a,b)=>a.tanggal.localeCompare(b.tanggal));
  else if (sort==='name') list.sort((a,b)=>a.nama.localeCompare(b.nama));
  else list.sort((a,b)=>b.tanggal.localeCompare(a.tanggal));
  return list;
}

function renderTable() {
  const list = getFiltered();
  const total = list.length;
  const pages = Math.ceil(total/perPage) || 1;
  if (currentPage > pages) currentPage = pages;
  const slice = list.slice((currentPage-1)*perPage, currentPage*perPage);

  const tbody = document.getElementById('tableBody');
  document.getElementById('tabCount').textContent = total;
  document.getElementById('paginationInfo').textContent = `Menampilkan ${slice.length} dari ${total} data`;

  if (!slice.length) {
    tbody.innerHTML = `<tr><td colspan="8"><div class="empty-state"><i class="fa fa-calendar-xmark"></i><p>Belum ada jadwal konseling</p></div></td></tr>`;
  } else {
    tbody.innerHTML = slice.map((j,i) => {
      const num = (currentPage-1)*perPage + i + 1;
      const sc = j.status.toLowerCase();
      return `<tr>
        <td style="color:var(--gray-400);font-weight:500">${num}</td>
        <td><div class="td-student">
          <div class="td-avatar" style="background:${getColor(j.nama)}">${getInitials(j.nama)}</div>
          <div><div class="td-name">${esc(j.nama)}</div></div>
        </div></td>
        <td style="color:var(--gray-600)">${esc(j.kelas||'—')}</td>
        <td style="color:var(--gray-600)">${fmtTgl(j.tanggal)}</td>
        <td style="color:var(--gray-600)">${j.waktu} WIB</td>
        <td style="max-width:200px;overflow:hidden;text-overflow:ellipsis;white-space:nowrap;color:var(--gray-600)">${esc(j.topik)}</td>
        <td><span class="badge ${sc}">${esc(j.status)}</span></td>
        <td><div class="action-btns">
          <button class="btn-icon view" title="Detail" onclick="openDetail(${j.id})"><i class="fa fa-eye"></i></button>
          <button class="btn-icon edit" title="Edit" onclick="openEdit(${j.id})"><i class="fa fa-pen"></i></button>
          <button class="btn-icon email-btn" title="Kirim Email" onclick="openEmailSingle(${j.id})"><i class="fa fa-envelope"></i></button>
          <button class="btn-icon del" title="Hapus" onclick="openHapus(${j.id})"><i class="fa fa-trash"></i></button>
        </div></td>
      </tr>`;
    }).join('');
  }

  // pagination buttons
  const pb = document.getElementById('paginationBtns');
  let btns = `<button class="pg-btn" onclick="goPage(${currentPage-1})" ${currentPage===1?'disabled':''}>«</button>`;
  for (let p=1;p<=pages;p++) btns += `<button class="pg-btn ${p===currentPage?'active':''}" onclick="goPage(${p})">${p}</button>`;
  btns += `<button class="pg-btn" onclick="goPage(${currentPage+1})" ${currentPage===pages?'disabled':''}>»</button>`;
  pb.innerHTML = btns;

  updateStats();
}

function goPage(p) {
  const pages = Math.ceil(getFiltered().length/perPage)||1;
  if (p<1||p>pages) return;
  currentPage = p;
  renderTable();
}

function updateStats() {
  const total = jadwal.length;
  const tj = jadwal.filter(j=>j.status==='Terjadwal').length;
  const sl = jadwal.filter(j=>j.status==='Selesai').length;
  const bt = jadwal.filter(j=>j.status==='Batal').length;
  document.getElementById('statTotal').textContent = total;
  document.getElementById('statTerjadwal').textContent = tj;
  document.getElementById('statSelesai').textContent = sl;
  document.getElementById('statBatal').textContent = bt;
  document.getElementById('sidebarBadge').textContent = tj;
  document.getElementById('expCount').textContent = total;
}

function esc(s) {
  return String(s||'').replace(/&/g,'&amp;').replace(/</g,'&lt;').replace(/>/g,'&gt;').replace(/"/g,'&quot;');
}

function filterTable() { currentPage=1; renderTable(); }

// ═══════════════════════════════════════════
// CRUD
// ═══════════════════════════════════════════
function nextId() { return jadwal.length ? Math.max(...jadwal.map(j=>j.id))+1 : 1; }

function openTambah() {
  document.getElementById('f_nama').value='';
  document.getElementById('f_kelas').value='';
  document.getElementById('f_kontak').value='';
  document.getElementById('f_tanggal').value=new Date().toISOString().split('T')[0];
  document.getElementById('f_waktu').value='08:00';
  document.getElementById('f_topik').value='';
  document.getElementById('f_status').value='Terjadwal';
  openModal('modalTambah');
}

function simpanJadwal() {
  const nama = document.getElementById('f_nama').value.trim();
  const tanggal = document.getElementById('f_tanggal').value;
  const waktu = document.getElementById('f_waktu').value;
  const topik = document.getElementById('f_topik').value.trim();
  if (!nama||!tanggal||!waktu||!topik) { showFlash('Harap lengkapi semua field yang wajib diisi!','error'); return; }
  const baru = {
    id: nextId(),
    nama, kelas: document.getElementById('f_kelas').value.trim(),
    kontak: document.getElementById('f_kontak').value.trim(),
    tanggal, waktu,
    topik, status: document.getElementById('f_status').value,
    created: new Date().toISOString().split('T')[0]
  };
  jadwal.unshift(baru);
  saveData(jadwal);
  addNotif('blue','fa-calendar-plus',`Jadwal baru untuk ${nama} telah ditambahkan.`);
  closeModal('modalTambah');
  renderTable();
  renderNotif();
  showToast('Jadwal konseling berhasil ditambahkan!','success');
}

function openEdit(id) {
  const j = jadwal.find(x=>x.id===id);
  if (!j) return;
  document.getElementById('e_id').value = id;
  document.getElementById('e_nama').value = j.nama;
  document.getElementById('e_kelas').value = j.kelas||'';
  document.getElementById('e_kontak').value = j.kontak||'';
  document.getElementById('e_tanggal').value = j.tanggal;
  document.getElementById('e_waktu').value = j.waktu;
  document.getElementById('e_topik').value = j.topik;
  document.getElementById('e_status').value = j.status;
  openModal('modalEdit');
}

function updateJadwal() {
  const id = parseInt(document.getElementById('e_id').value);
  const nama = document.getElementById('e_nama').value.trim();
  const tanggal = document.getElementById('e_tanggal').value;
  const waktu = document.getElementById('e_waktu').value;
  const topik = document.getElementById('e_topik').value.trim();
  if (!nama||!tanggal||!waktu||!topik) { showFlash('Harap lengkapi semua field yang wajib diisi!','error'); return; }
  jadwal = jadwal.map(j=>j.id===id ? {...j,nama,kelas:document.getElementById('e_kelas').value.trim(),kontak:document.getElementById('e_kontak').value.trim(),tanggal,waktu,topik,status:document.getElementById('e_status').value} : j);
  saveData(jadwal);
  addNotif('yellow','fa-pen',`Jadwal ${nama} telah diperbarui.`);
  closeModal('modalEdit');
  renderTable();
  renderNotif();
  showToast('Jadwal berhasil diperbarui!','success');
}

function openHapus(id) {
  const j = jadwal.find(x=>x.id===id);
  if (!j) return;
  hapusId = id;
  document.getElementById('hapusNama').textContent = j.nama;
  openModal('modalHapus');
}

function hapusJadwal() {
  if (!hapusId) return;
  const j = jadwal.find(x=>x.id===hapusId);
  jadwal = jadwal.filter(x=>x.id!==hapusId);
  saveData(jadwal);
  addNotif('red','fa-trash',`Jadwal ${j?j.nama:''} telah dihapus.`);
  closeModal('modalHapus');
  renderTable();
  renderNotif();
  showToast('Jadwal berhasil dihapus!','info');
  hapusId = null;
}

// ═══════════════════════════════════════════
// DETAIL
// ═══════════════════════════════════════════
function openDetail(id) {
  const j = jadwal.find(x=>x.id===id);
  if (!j) return;
  document.getElementById('detailAvatar').textContent = getInitials(j.nama);
  document.getElementById('detailAvatar').style.background = getColor(j.nama);
  document.getElementById('detailNama').textContent = j.nama;
  document.getElementById('detailMeta').textContent = fmtTgl(j.tanggal)+' • '+j.waktu+' WIB';
  document.getElementById('dTanggal').textContent = fmtTgl(j.tanggal);
  document.getElementById('dWaktu').textContent = j.waktu+' WIB';
  document.getElementById('dKelas').textContent = j.kelas||'—';
  document.getElementById('dStatus').innerHTML = `<span class="badge ${j.status.toLowerCase()}">${j.status}</span>`;
  document.getElementById('dKontak').textContent = j.kontak||'—';
  document.getElementById('dCreated').textContent = j.created ? fmtTgl(j.created) : '—';
  document.getElementById('dTopik').textContent = j.topik||'—';
  document.getElementById('detailEditBtn').onclick = ()=>{closeModal('modalDetail');openEdit(id)};
  openModal('modalDetail');
}

// ═══════════════════════════════════════════
// EXPORT
// ═══════════════════════════════════════════
function selectExport(el, fmt) {
  document.querySelectorAll('.export-card').forEach(c=>c.classList.remove('selected'));
  el.classList.add('selected');
  exportFormat = fmt;
  const st = document.getElementById('expStatus').value;
  const list = st ? jadwal.filter(j=>j.status===st) : jadwal;
  document.getElementById('expCount').textContent = list.length;
}

document.getElementById('expStatus').addEventListener('change', function(){
  const list = this.value ? jadwal.filter(j=>j.status===this.value) : jadwal;
  document.getElementById('expCount').textContent = list.length;
});

function doExport() {
  const st = document.getElementById('expStatus').value;
  const fname = document.getElementById('expFilename').value || 'jadwal_konseling';
  const list = st ? jadwal.filter(j=>j.status===st) : jadwal;

  if (exportFormat === 'csv' || exportFormat === 'excel') {
    const header = ['No','Nama Siswa','Kelas','Tanggal','Waktu','Topik','Status','Dibuat'];
    const rows = list.map((j,i)=>[i+1,j.nama,j.kelas||'',j.tanggal,j.waktu,j.topik,j.status,j.created]);
    const csv = [header,...rows].map(r=>r.map(c=>`"${String(c).replace(/"/g,'""')}"`).join(',')).join('\n');
    const blob = new Blob(['\uFEFF'+csv],{type:'text/csv;charset=utf-8'});
    downloadBlob(blob,fname+'.csv');
    showToast('File CSV berhasil diunduh!','success');
  } else if (exportFormat === 'pdf') {
    let html = `<html><head><meta charset="UTF-8"><style>
      body{font-family:sans-serif;font-size:12px;padding:20px}
      h2{color:#0a1628;margin-bottom:4px}
      p{color:#666;margin-bottom:16px}
      table{width:100%;border-collapse:collapse}
      th{background:#0f2d6b;color:white;padding:8px;text-align:left;font-size:11px}
      td{padding:7px 8px;border-bottom:1px solid #e2e8f0}
      tr:nth-child(even){background:#f8fafc}
    </style></head><body>
    <h2>Jadwal Konseling — BK SMA Karya Sekadau</h2>
    <p>Total: ${list.length} jadwal | Dicetak: ${new Date().toLocaleDateString('id-ID')}</p>
    <table><tr><th>#</th><th>Nama</th><th>Kelas</th><th>Tanggal</th><th>Waktu</th><th>Topik</th><th>Status</th></tr>
    ${list.map((j,i)=>`<tr><td>${i+1}</td><td>${j.nama}</td><td>${j.kelas||'—'}</td><td>${fmtTgl(j.tanggal)}</td><td>${j.waktu}</td><td>${j.topik.substring(0,60)}${j.topik.length>60?'...':''}</td><td>${j.status}</td></tr>`).join('')}
    </table></body></html>`;
    const w = window.open('','_blank');
    w.document.write(html);
    w.document.close();
    w.focus();
    w.print();
    showToast('Dokumen disiapkan untuk cetak!','info');
  } else if (exportFormat === 'print') {
    doExport_print(list);
    showToast('Halaman cetak dibuka!','info');
  }
  closeModal('modalExport');
}

function doExport_print(list) {
  let html = `<html><head><meta charset="UTF-8"><style>
    body{font-family:sans-serif;font-size:12px;padding:20px}
    h2{color:#0a1628}table{width:100%;border-collapse:collapse;margin-top:16px}
    th{background:#0f2d6b;color:white;padding:8px;font-size:11px}
    td{padding:7px;border-bottom:1px solid #ddd}
    @media print{button{display:none}}
  </style></head><body>
  <button onclick="window.print()" style="padding:8px 16px;background:#1a56db;color:white;border:none;border-radius:6px;cursor:pointer;margin-bottom:16px">Cetak Sekarang</button>
  <h2>Jadwal Konseling — BK SMA Karya Sekadau</h2>
  <table><tr><th>#</th><th>Nama</th><th>Kelas</th><th>Tanggal</th><th>Waktu</th><th>Topik</th><th>Status</th></tr>
  ${list.map((j,i)=>`<tr><td>${i+1}</td><td>${j.nama}</td><td>${j.kelas||'—'}</td><td>${fmtTgl(j.tanggal)}</td><td>${j.waktu}</td><td>${j.topik}</td><td>${j.status}</td></tr>`).join('')}
  </table></body></html>`;
  const w = window.open('','_blank');
  w.document.write(html);
  w.document.close();
}

function downloadBlob(blob, filename) {
  const a = document.createElement('a');
  a.href = URL.createObjectURL(blob);
  a.download = filename;
  a.click();
  URL.revokeObjectURL(a.href);
}

// ═══════════════════════════════════════════
// EMAIL
// ═══════════════════════════════════════════
let emailChips = [];

function openEmailSingle(id) {
  const j = jadwal.find(x=>x.id===id);
  if (!j) return;
  emailChips = j.kontak ? [j.kontak] : [];
  document.getElementById('emailTo').value = '';
  document.getElementById('emailSubject').value = `Pemberitahuan Jadwal Konseling BK — ${j.nama}`;
  document.getElementById('emailBody').value =
`Yth. Orang Tua / Wali Siswa ${j.nama},

Dengan hormat, kami ingin memberitahukan bahwa putra/putri Bapak/Ibu telah dijadwalkan untuk mengikuti sesi konseling di SMA Karya Sekadau:

📅 Tanggal : ${fmtTgl(j.tanggal)}
⏰ Waktu   : ${j.waktu} WIB
📋 Topik   : ${j.topik}

Mohon pastikan siswa hadir tepat waktu. Jika ada pertanyaan, silakan hubungi ruang BK.

Hormat kami,
Ibu Rina Marlina, S.Pd
Guru BK — SMA Karya Sekadau`;
  renderEmailChips();
  openModal('modalEmail');
}

function openEmailBlast() {
  emailChips = [];
  document.getElementById('emailTo').value = '';
  document.getElementById('emailSubject').value = 'Pengingat Jadwal Konseling BK';
  document.getElementById('emailBody').value = `Yth. Siswa/Orang Tua,\n\nBerikut pengingat jadwal konseling yang telah ditetapkan. Mohon hadir tepat waktu.\n\nHormat kami,\nGuru BK SMA Karya Sekadau`;
  renderEmailChips();
  openModal('modalEmail');
}

function renderEmailChips() {
  document.getElementById('emailToChips').innerHTML = emailChips.map((e,i)=>
    `<span class="email-to-chip">${e} <i class="fa fa-times" style="cursor:pointer;margin-left:4px" onclick="removeChip(${i})"></i></span>`
  ).join('');
}

function removeChip(i) {
  emailChips.splice(i,1);
  renderEmailChips();
}

document.getElementById('emailTo').addEventListener('keydown', function(e) {
  if (e.key==='Enter'||e.key===',') {
    e.preventDefault();
    const v = this.value.trim().replace(/,$/,'');
    if (v && !emailChips.includes(v)) { emailChips.push(v); renderEmailChips(); }
    this.value='';
  }
});

function kirimEmail() {
  const to = document.getElementById('emailTo').value.trim();
  if (to) { emailChips.push(to); renderEmailChips(); document.getElementById('emailTo').value=''; }
  if (!emailChips.length) { showFlash('Masukkan setidaknya satu alamat email penerima!','error'); return; }
  const subject = document.getElementById('emailSubject').value.trim();
  const body = document.getElementById('emailBody').value.trim();
  if (!subject||!body) { showFlash('Subjek dan isi pesan tidak boleh kosong!','error'); return; }
  // Simulate sending
  addNotif('green','fa-envelope',`Email "${subject}" berhasil dikirim ke ${emailChips.length} penerima.`);
  closeModal('modalEmail');
  renderNotif();
  showToast(`Email berhasil dikirim ke ${emailChips.length} penerima!`,'success');
  emailChips = [];
}

// ═══════════════════════════════════════════
// NOTIFIKASI
// ═══════════════════════════════════════════
function addNotif(type, icon, text) {
  notifData.unshift({id:Date.now(),type,icon,text,time:'Baru saja',unread:true});
  if (notifData.length > 20) notifData = notifData.slice(0,20);
  saveNotif(notifData);
}

function renderNotif() {
  const unread = notifData.filter(n=>n.unread).length;
  document.getElementById('unreadCount').textContent = unread;
  document.getElementById('notifDot').style.display = unread ? 'block' : 'none';
  document.getElementById('sidebarNotifBadge').textContent = unread || '';
  document.getElementById('notifList').innerHTML = notifData.slice(0,8).map(n=>`
    <div class="notif-item ${n.unread?'unread':''}" onclick="markRead(${n.id})">
      <div class="notif-ico ${n.type}"><i class="fa ${n.icon}"></i></div>
      <div class="notif-text"><p>${n.text}</p><span>${n.time}</span></div>
      ${n.unread?'<div class="notif-unread-dot"></div>':''}
    </div>`).join('');
}

function markRead(id) {
  notifData = notifData.map(n=>n.id===id?{...n,unread:false}:n);
  saveNotif(notifData);
  renderNotif();
}

function clearAllNotif() {
  notifData = notifData.map(n=>({...n,unread:false}));
  saveNotif(notifData);
  renderNotif();
  showToast('Semua notifikasi ditandai dibaca','info');
}

function toggleNotifPanel() {
  document.getElementById('notifPanel').classList.toggle('show');
}

document.addEventListener('click', e=>{
  const panel = document.getElementById('notifPanel');
  const btn = document.getElementById('notifBtn');
  if (!panel.contains(e.target) && !btn.contains(e.target)) panel.classList.remove('show');
});

// ═══════════════════════════════════════════
// TOAST & FLASH
// ═══════════════════════════════════════════
function showToast(msg, type='success') {
  const icons = {success:'fa-circle-check',error:'fa-circle-exclamation',info:'fa-circle-info'};
  const el = document.createElement('div');
  el.className = `toast ${type}`;
  el.innerHTML = `<i class="fa ${icons[type]}"></i> ${msg}`;
  document.getElementById('toastContainer').appendChild(el);
  setTimeout(()=>el.style.opacity='0',3000);
  setTimeout(()=>el.remove(),3400);
}

function showFlash(msg, type='success') {
  const icons = {success:'fa-circle-check',error:'fa-circle-exclamation',info:'fa-circle-info'};
  const zone = document.getElementById('flashZone');
  zone.innerHTML = `<div class="flash-alert ${type}"><i class="fa ${icons[type]}"></i> ${msg}</div>`;
  setTimeout(()=>zone.innerHTML='',4000);
}

// ═══════════════════════════════════════════
// MODAL HELPERS
// ═══════════════════════════════════════════
function openModal(id){ document.getElementById(id).classList.add('show') }
function closeModal(id){ document.getElementById(id).classList.remove('show') }
document.querySelectorAll('.modal-overlay').forEach(m=>{
  m.addEventListener('click',e=>{if(e.target===m)m.classList.remove('show')})
});

// ═══════════════════════════════════════════
// SIDEBAR & FULLSCREEN
// ═══════════════════════════════════════════
function toggleSidebar(){document.getElementById('sidebar').classList.toggle('open');document.getElementById('overlay').classList.toggle('show')}
function closeSidebar(){document.getElementById('sidebar').classList.remove('open');document.getElementById('overlay').classList.remove('show')}
function toggleFS(){if(!document.fullscreenElement){document.documentElement.requestFullscreen();document.getElementById('fsIcon').className='fa fa-compress'}else{document.exitFullscreen();document.getElementById('fsIcon').className='fa fa-expand'}}

// ═══════════════════════════════════════════
// CLOCK
// ═══════════════════════════════════════════
function updateClock(){
  const d=new Date(),days=['Minggu','Senin','Selasa','Rabu','Kamis','Jumat','Sabtu'],months=['Jan','Feb','Mar','Apr','Mei','Jun','Jul','Ags','Sep','Okt','Nov','Des'];
  document.getElementById('dateLive').textContent=days[d.getDay()]+', '+d.getDate()+' '+months[d.getMonth()]+' '+d.getFullYear();
  document.getElementById('timeLive').textContent=d.getHours().toString().padStart(2,'0')+':'+d.getMinutes().toString().padStart(2,'0')+':'+d.getSeconds().toString().padStart(2,'0')+' WIB';
}
setInterval(updateClock,1000); updateClock();


// INIT
renderTable();
renderNotif();
</script>
</body>
</html>