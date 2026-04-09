<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pelanggaran — BK SMA Karya Sekadau</title>
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
        .navbar-date .date-main{font-weight:500;color:var(--gray-800);font-size:13.5px}
        .navbar-date .date-sub{font-size:11px;color:var(--gray-400)}
        .page-content{padding:28px 32px;flex:1}
        .page-header{display:flex;align-items:flex-start;justify-content:space-between;margin-bottom:28px;gap:16px}
        .page-header-left h1{font-family:'Outfit',sans-serif;font-size:26px;font-weight:700;color:var(--blue-900);letter-spacing:-.5px}
        .page-header-left p{font-size:14px;color:var(--gray-400);margin-top:4px}
        .page-header-right{display:flex;gap:10px;flex-shrink:0}
        .btn-primary{padding:10px 20px;border-radius:var(--radius-sm);border:none;background:var(--blue-500);color:white;font-family:'DM Sans',sans-serif;font-size:13.5px;font-weight:500;cursor:pointer;transition:var(--transition);display:inline-flex;align-items:center;gap:8px}
        .btn-primary:hover{background:var(--blue-600);box-shadow:0 4px 14px rgba(26,86,219,.4)}
        .btn-outline{padding:10px 20px;border-radius:var(--radius-sm);border:1.5px solid var(--gray-200);background:white;color:var(--gray-600);font-family:'DM Sans',sans-serif;font-size:13.5px;font-weight:500;cursor:pointer;transition:var(--transition);display:inline-flex;align-items:center;gap:8px}
        .btn-outline:hover{border-color:var(--blue-400);color:var(--blue-600);background:var(--blue-50)}
        .btn-danger{padding:10px 20px;border-radius:var(--radius-sm);border:none;background:var(--danger);color:white;font-family:'DM Sans',sans-serif;font-size:13.5px;font-weight:500;cursor:pointer;transition:var(--transition);display:inline-flex;align-items:center;gap:8px}
        .btn-danger:hover{background:#dc2626}
        .btn-success{padding:10px 20px;border-radius:var(--radius-sm);border:none;background:var(--success);color:white;font-family:'DM Sans',sans-serif;font-size:13.5px;font-weight:500;cursor:pointer;transition:var(--transition);display:inline-flex;align-items:center;gap:8px}
        .btn-success:hover{background:#059669}
        .btn-cancel{padding:10px 20px;border-radius:var(--radius-sm);border:1.5px solid var(--gray-200);background:white;font-family:'DM Sans',sans-serif;font-size:13px;color:var(--gray-600);cursor:pointer;transition:var(--transition)}
        .btn-cancel:hover{background:var(--gray-50)}
        .flash-alert{padding:14px 18px;border-radius:var(--radius-sm);margin-bottom:20px;display:flex;align-items:center;gap:10px;font-size:13.5px;font-weight:500}
        .flash-alert.success{background:#d1fae5;color:#065f46;border:1px solid #6ee7b7}
        .flash-alert.error{background:#fee2e2;color:#991b1b;border:1px solid #fca5a5}
        .stats-grid{display:grid;grid-template-columns:repeat(4,1fr);gap:18px;margin-bottom:24px}
        .stat-card{background:white;border-radius:var(--radius);padding:20px 22px;box-shadow:var(--shadow);transition:var(--transition);position:relative;overflow:hidden}
        .stat-card:hover{transform:translateY(-3px);box-shadow:var(--shadow-lg)}
        .stat-card::after{content:'';position:absolute;bottom:0;left:0;right:0;height:3px}
        .stat-card.s1::after{background:linear-gradient(90deg,var(--blue-500),var(--blue-300))}
        .stat-card.s2::after{background:linear-gradient(90deg,var(--danger),#f87171)}
        .stat-card.s3::after{background:linear-gradient(90deg,var(--warning),#fcd34d)}
        .stat-card.s4::after{background:linear-gradient(90deg,var(--success),#34d399)}
        .stat-top{display:flex;justify-content:space-between;align-items:flex-start;margin-bottom:14px}
        .stat-ico{width:46px;height:46px;border-radius:12px;display:flex;align-items:center;justify-content:center;font-size:18px}
        .stat-card.s1 .stat-ico{background:var(--blue-100);color:var(--blue-500)}
        .stat-card.s2 .stat-ico{background:#fee2e2;color:var(--danger)}
        .stat-card.s3 .stat-ico{background:#fef3c7;color:#d97706}
        .stat-card.s4 .stat-ico{background:#d1fae5;color:#059669}
        .stat-trend{display:flex;align-items:center;gap:3px;font-size:11px;font-weight:700;padding:3px 8px;border-radius:20px}
        .stat-trend.up{background:#dcfce7;color:#16a34a}
        .stat-trend.same{background:var(--gray-100);color:var(--gray-500)}
        .stat-num{font-family:'Outfit',sans-serif;font-size:34px;font-weight:800;color:var(--blue-900);line-height:1;letter-spacing:-1px}
        .stat-lbl{font-size:12px;color:var(--gray-400);margin-top:4px;font-weight:500}
        .filter-bar{background:white;border-radius:var(--radius);padding:14px 20px;box-shadow:var(--shadow);display:flex;align-items:center;gap:10px;margin-bottom:18px;flex-wrap:wrap}
        .filter-search{flex:1;min-width:200px;position:relative}
        .filter-search input{width:100%;padding:9px 14px 9px 36px;border-radius:var(--radius-sm);border:1.5px solid var(--gray-200);background:var(--gray-50);font-family:'DM Sans',sans-serif;font-size:13px;color:var(--gray-800);outline:none;transition:var(--transition)}
        .filter-search input:focus{border-color:var(--blue-400);background:white;box-shadow:0 0 0 3px rgba(59,130,246,.1)}
        .filter-search i{position:absolute;left:11px;top:50%;transform:translateY(-50%);color:var(--gray-400);font-size:12px}
        .filter-select{padding:9px 12px;border-radius:var(--radius-sm);border:1.5px solid var(--gray-200);background:white;font-family:'DM Sans',sans-serif;font-size:12.5px;color:var(--gray-700);outline:none;cursor:pointer;transition:var(--transition)}
        .filter-select:focus{border-color:var(--blue-400)}
        .tab-nav{display:flex;padding:0 22px;border-bottom:1px solid var(--gray-100);background:var(--gray-50)}
        .tab-btn{padding:13px 16px;border:none;background:none;font-family:'DM Sans',sans-serif;font-size:13px;font-weight:400;color:var(--gray-400);cursor:pointer;position:relative;transition:var(--transition);white-space:nowrap;display:flex;align-items:center;gap:7px;text-decoration:none}
        .tab-btn::after{content:'';position:absolute;bottom:0;left:0;right:0;height:2px;background:var(--blue-500);border-radius:2px 2px 0 0;transform:scaleX(0);transition:var(--transition)}
        .tab-btn.active{color:var(--blue-600);font-weight:500}
        .tab-btn.active::after{transform:scaleX(1)}
        .tab-btn:hover{color:var(--blue-500)}
        .tab-count{font-size:10px;font-weight:700;padding:2px 7px;border-radius:20px;background:var(--blue-100);color:var(--blue-600)}
        .tab-count.red{background:#fee2e2;color:#dc2626}
        .tab-count.warn{background:#fef3c7;color:#b45309}
        .card{background:white;border-radius:var(--radius);box-shadow:var(--shadow);overflow:hidden}
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
        .badge.baru{background:#fee2e2;color:#dc2626}
        .badge.proses{background:#fef3c7;color:#b45309}
        .badge.diproses{background:#dcfce7;color:#16a34a}
        .badge.ringan{background:var(--blue-100);color:var(--blue-600)}
        .badge.sedang{background:#fef3c7;color:#b45309}
        .badge.berat{background:#fee2e2;color:#dc2626}
        .poin-chip{display:inline-flex;align-items:center;padding:4px 10px;border-radius:20px;font-size:11px;font-weight:700}
        .poin-chip.high{background:#fee2e2;color:#dc2626}
        .poin-chip.medium{background:#fef3c7;color:#b45309}
        .poin-chip.low{background:var(--blue-50);color:var(--blue-600)}
        .action-btns{display:flex;gap:5px}
        .btn-icon{width:30px;height:30px;border-radius:7px;border:none;cursor:pointer;display:flex;align-items:center;justify-content:center;font-size:12px;transition:var(--transition)}
        .btn-icon.view{background:var(--blue-100);color:var(--blue-600)}
        .btn-icon.edit{background:#fef3c7;color:#b45309}
        .btn-icon.ok{background:#d1fae5;color:#059669}
        .btn-icon.del{background:#fee2e2;color:#dc2626}
        .btn-icon:hover{opacity:.8;transform:scale(1.08)}
        .pagination-bar{display:flex;align-items:center;justify-content:space-between;padding:14px 22px;border-top:1px solid var(--gray-100);font-size:12.5px;color:var(--gray-400)}
        .pagination-btns{display:flex;gap:5px}
        .pg-btn{width:32px;height:32px;border-radius:8px;border:1.5px solid var(--gray-200);background:white;display:flex;align-items:center;justify-content:center;cursor:pointer;font-size:12.5px;color:var(--gray-600);font-family:'DM Sans',sans-serif;transition:var(--transition)}
        .pg-btn:hover{border-color:var(--blue-400);color:var(--blue-600)}
        .pg-btn.active{background:var(--blue-500);border-color:var(--blue-500);color:white}
        .modal-overlay{display:none;position:fixed;inset:0;background:rgba(10,22,40,.55);z-index:300;align-items:center;justify-content:center;padding:20px}
        .modal-overlay.show{display:flex}
        .modal{background:white;border-radius:var(--radius);width:100%;max-height:90vh;overflow-y:auto;box-shadow:0 24px 80px rgba(10,22,40,.3);animation:modalIn .25s ease}
        @keyframes modalIn{from{opacity:0;transform:scale(.95) translateY(10px)}to{opacity:1;transform:scale(1) translateY(0)}}
        .modal-sm{max-width:420px}.modal-md{max-width:580px}.modal-lg{max-width:660px}
        .modal-header{padding:22px 26px 18px;display:flex;align-items:center;justify-content:space-between;position:sticky;top:0;z-index:1}
        .modal-header.blue{background:linear-gradient(135deg,var(--blue-800),var(--blue-500))}
        .modal-header.green{background:linear-gradient(135deg,#065f46,var(--success))}
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
        .form-input,.form-select,.form-textarea{padding:10px 14px;border-radius:var(--radius-sm);border:1.5px solid var(--gray-200);background:var(--gray-50);font-family:'DM Sans',sans-serif;font-size:13.5px;color:var(--gray-800);outline:none;transition:var(--transition);width:100%}
        .form-input:focus,.form-select:focus,.form-textarea:focus{border-color:var(--blue-400);background:white;box-shadow:0 0 0 3px rgba(59,130,246,.1)}
        .form-input[readonly]{background:var(--gray-100);color:var(--gray-500);cursor:not-allowed}
        .form-textarea{resize:vertical;min-height:90px}
        .poin-preview{margin-top:6px;padding:10px 14px;border-radius:var(--radius-sm);background:var(--blue-50);border:1px solid var(--blue-200);font-size:13px;color:var(--blue-700);display:none;align-items:center;gap:8px}
        .poin-preview.show{display:flex}
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
        .status-options{display:flex;flex-direction:column;gap:10px;margin-top:4px}
        .status-option{display:flex;align-items:center;gap:14px;padding:14px 16px;border-radius:var(--radius-sm);border:2px solid var(--gray-200);cursor:pointer;transition:var(--transition)}
        .status-option:hover{border-color:var(--blue-400);background:var(--blue-50)}
        .status-option.selected{border-color:var(--blue-500);background:var(--blue-50)}
        .status-option input[type=radio]{display:none}
        .status-dot{width:14px;height:14px;border-radius:50%;flex-shrink:0}
        .status-option-text .st-title{font-weight:600;font-size:13.5px;color:var(--gray-800)}
        .status-option-text .st-desc{font-size:11.5px;color:var(--gray-400);margin-top:2px}
        /* kelas-badge: label nama kelas */
        .kelas-badge{display:inline-block;font-size:10.5px;font-weight:600;padding:2px 7px;border-radius:5px;background:var(--blue-50);color:var(--blue-600);margin-left:4px;white-space:nowrap}
        ::-webkit-scrollbar{width:6px;height:6px}
        ::-webkit-scrollbar-track{background:transparent}
        ::-webkit-scrollbar-thumb{background:var(--gray-200);border-radius:10px}
        ::-webkit-scrollbar-thumb:hover{background:var(--blue-300)}
        @keyframes fadeInUp{from{opacity:0;transform:translateY(16px)}to{opacity:1;transform:translateY(0)}}
        .stat-card{animation:fadeInUp .4s ease both}
        .stat-card:nth-child(1){animation-delay:.05s}.stat-card:nth-child(2){animation-delay:.10s}
        .stat-card:nth-child(3){animation-delay:.15s}.stat-card:nth-child(4){animation-delay:.20s}
        @media(max-width:1200px){.stats-grid{grid-template-columns:repeat(2,1fr)}}
        @media(max-width:768px){:root{--sidebar-w:0px}.sidebar{transform:translateX(-270px);width:270px}.sidebar.open{transform:translateX(0)}.main-wrapper{margin-left:0}.navbar-hamburger{display:flex}.navbar,.page-content{padding:0 18px}.page-content{padding:20px 18px}.stats-grid{grid-template-columns:1fr 1fr}.page-header{flex-direction:column}.form-row{grid-template-columns:1fr}}
        @media(max-width:480px){.stats-grid{grid-template-columns:1fr}}
        .overlay{display:none;position:fixed;inset:0;background:rgba(10,22,40,.4);z-index:90}
        .overlay.show{display:block}
    </style>
</head>
<body>

<div class="overlay" id="overlay" onclick="closeSidebar()"></div>

<?php
// ── Helper format kelas ──
// Simpan di app/Helpers/KelasHelper.php dan load via helper('kelas')
// Di sini didefinisikan inline agar file ini standalone
if (!function_exists('format_kelas')) {
    function format_kelas(?string $kelas): string {
        if (empty($kelas)) return '—';
        $kelas = trim($kelas);
        $map = ['A'=>'MIA 1','B'=>'MIA 2','C'=>'IIS 1','D'=>'IIS 2','E'=>'IIS 3','F'=>'IIS 4'];
        if (preg_match('/([A-Fa-f])\s*$/', $kelas, $m)) {
            $nama = $map[strtoupper($m[1])] ?? null;
            if ($nama) return $kelas . ' (' . $nama . ')';
        }
        return $kelas;
    }
}

// ── Data dummy siswa (format kelas baru) ──
$listSiswa = [
    ['id'=>1, 'nisn'=>'0041230001','nama'=>'Aldi Firmansyah',   'kelas'=>'XI A'],
    ['id'=>2, 'nisn'=>'0041230002','nama'=>'Putri Ayu Lestari', 'kelas'=>'X C'],
    ['id'=>3, 'nisn'=>'0041230003','nama'=>'Rafi Hidayat',      'kelas'=>'XII B'],
    ['id'=>4, 'nisn'=>'0041230004','nama'=>'Sinta Wulandari',   'kelas'=>'X A'],
    ['id'=>5, 'nisn'=>'0041230005','nama'=>'Bima Saputra',      'kelas'=>'XI D'],
    ['id'=>6, 'nisn'=>'0041230006','nama'=>'Nadia Pratiwi',     'kelas'=>'XII E'],
    ['id'=>7, 'nisn'=>'0041230007','nama'=>'Dandi Firmawan',    'kelas'=>'XI C'],
    ['id'=>8, 'nisn'=>'0041230008','nama'=>'Mega Rahayu',       'kelas'=>'X B'],
    ['id'=>9, 'nisn'=>'0041230009','nama'=>'Kevin Prasetyo',    'kelas'=>'XII A'],
    ['id'=>10,'nisn'=>'0041230010','nama'=>'Ayu Cahyani',       'kelas'=>'XI F'],
];

$jenisPelanggaran = [
    'Ringan' => [
        'Terlambat Masuk'       => 10,
        'Seragam Tidak Sesuai'  => 10,
        'Atribut Tidak Lengkap' => 10,
        'Rambut Tidak Sesuai'   => 15,
        'Tidak Hadir (Alpha)'   => 10,
    ],
    'Sedang' => [
        'Penggunaan HP di Kelas'=> 25,
        'Membolos Pelajaran'    => 30,
        'Berkata Kasar'         => 35,
        'Bolos Berulang'        => 50,
        'Merokok di Lingkungan' => 50,
    ],
    'Berat'  => [
        'Perkelahian'           => 75,
        'Membawa Rokok'         => 75,
        'Bullying / Intimidasi' => 80,
        'Membawa Senjata Tajam' => 100,
        'Terlibat Narkoba'      => 100,
    ],
];
?>

<!-- ════ MODAL TAMBAH ════ -->
<div class="modal-overlay" id="modalTambah">
    <div class="modal modal-lg">
        <div class="modal-header blue">
            <h2><i class="fa fa-plus-circle"></i> Tambah Data Pelanggaran</h2>
            <button class="modal-close" onclick="closeModal('modalTambah')"><i class="fa fa-times"></i></button>
        </div>
        <form action="<?= base_url('pelanggaran/simpan') ?>" method="POST">
            <?= csrf_field() ?>
            <div class="modal-body">

                <div class="form-row full">
                    <div class="form-group">
                        <label class="form-label">Siswa <span>*</span></label>
                        <select class="form-select" name="siswa_id" required onchange="fillSiswaInfo(this)">
                            <option value="">— Pilih Siswa —</option>
                            <?php foreach ($listSiswa as $s): ?>
                            <option value="<?= $s['id'] ?>"
                                    data-kelas="<?= esc($s['kelas']) ?>"
                                    data-kelas-label="<?= esc(format_kelas($s['kelas'])) ?>"
                                    data-nisn="<?= esc($s['nisn']) ?>">
                                <?= esc($s['nama']) ?> — <?= esc(format_kelas($s['kelas'])) ?>
                            </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>

                <div class="form-row" id="siswaInfoTambah" style="display:none">
                    <div class="form-group">
                        <label class="form-label">Kelas</label>
                        <input type="text" class="form-input" id="kelasInfoTambah" readonly>
                    </div>
                    <div class="form-group">
                        <label class="form-label">NISN</label>
                        <input type="text" class="form-input" id="nisnInfoTambah" readonly>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label class="form-label">Tanggal Kejadian <span>*</span></label>
                        <input type="date" class="form-input" name="tanggal_kejadian" value="<?= date('Y-m-d') ?>" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Lokasi Kejadian</label>
                        <input type="text" class="form-input" name="lokasi" placeholder="Contoh: Kantin, Kelas...">
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label class="form-label">Jenis Pelanggaran <span>*</span></label>
                        <select class="form-select" name="jenis_pelanggaran" id="selectJenisTambah" required onchange="autoFillPoin('tambah')">
                            <option value="">— Pilih Jenis —</option>
                            <?php foreach ($jenisPelanggaran as $kat => $items): ?>
                            <optgroup label="Pelanggaran <?= $kat ?>">
                                <?php foreach ($items as $nama => $poin): ?>
                                <option value="<?= esc($nama) ?>" data-poin="<?= $poin ?>" data-kat="<?= strtolower($kat) ?>">
                                    <?= esc($nama) ?> (<?= $poin ?> poin)
                                </option>
                                <?php endforeach; ?>
                            </optgroup>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Kategori <span>*</span></label>
                        <select class="form-select" name="kategori" id="selectKategoriTambah" required>
                            <option value="ringan">Ringan</option>
                            <option value="sedang">Sedang</option>
                            <option value="berat">Berat</option>
                        </select>
                    </div>
                </div>

                <div id="poinPreviewTambah" class="poin-preview">
                    <i class="fa fa-star" style="color:var(--warning)"></i>
                    <span id="poinTextTambah">—</span>
                </div>

                <div class="form-row" style="margin-top:14px">
                    <div class="form-group">
                        <label class="form-label">Poin <span>*</span></label>
                        <input type="number" class="form-input" name="poin" id="inputPoinTambah" placeholder="1–100" min="1" max="100" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Guru BK / Konselor</label>
                        <select class="form-select" name="konselor_id">
                            <option value="1">Bu Rina Marlina, S.Pd</option>
                            <option value="2">Pak Budi Santoso, S.Pd</option>
                            <option value="3">Bu Siti Aminah, S.Pd</option>
                        </select>
                    </div>
                </div>

                <div class="form-row full">
                    <div class="form-group">
                        <label class="form-label">Deskripsi Kejadian</label>
                        <textarea class="form-textarea" name="deskripsi" placeholder="Ceritakan kronologi kejadian..."></textarea>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label class="form-label">Status</label>
                        <select class="form-select" name="status">
                            <option value="baru">Baru Masuk</option>
                            <option value="proses">Dalam Proses</option>
                            <option value="diproses">Sudah Diproses</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Notifikasi Orang Tua</label>
                        <select class="form-select" name="notif_ortu">
                            <option value="0">Belum Dikirim</option>
                            <option value="1">Sudah Dikirim</option>
                        </select>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn-cancel" onclick="closeModal('modalTambah')">Batal</button>
                <button type="submit" class="btn-primary"><i class="fa fa-save"></i> Simpan Pelanggaran</button>
            </div>
        </form>
    </div>
</div>

<!-- ════ MODAL DETAIL ════ -->
<div class="modal-overlay" id="modalDetail">
    <div class="modal modal-md">
        <div class="detail-hero" id="detailHero">
            <div class="detail-avatar" id="detailAvatar">AF</div>
            <div style="flex:1">
                <div class="detail-hero-name" id="detailNama">—</div>
                <div class="detail-hero-meta" id="detailMeta">—</div>
            </div>
            <button class="modal-close" onclick="closeModal('modalDetail')"><i class="fa fa-times"></i></button>
        </div>
        <div class="modal-body">
            <div class="detail-grid">
                <div class="detail-item"><div class="dl">Jenis Pelanggaran</div><div class="dv" id="dJenis">—</div></div>
                <div class="detail-item"><div class="dl">Kategori</div><div class="dv" id="dKategori">—</div></div>
                <div class="detail-item"><div class="dl">Tanggal</div><div class="dv" id="dTanggal">—</div></div>
                <div class="detail-item"><div class="dl">Poin</div><div class="dv" id="dPoin">—</div></div>
                <div class="detail-item"><div class="dl">Guru BK</div><div class="dv" id="dGuru">—</div></div>
                <div class="detail-item"><div class="dl">Status</div><div class="dv" id="dStatus">—</div></div>
                <div class="detail-item"><div class="dl">Notif Ortu</div><div class="dv" id="dNotif">—</div></div>
                <div class="detail-item"><div class="dl">Lokasi</div><div class="dv" id="dLokasi">—</div></div>
            </div>
            <div class="detail-divider"></div>
            <div style="font-size:11px;font-weight:700;text-transform:uppercase;letter-spacing:.8px;color:var(--gray-400);margin-bottom:8px">Deskripsi Kejadian</div>
            <div class="detail-catatan" id="dDeskripsi">—</div>
        </div>
        <div class="modal-footer">
            <button class="btn-cancel" onclick="closeModal('modalDetail')">Tutup</button>
            <button class="btn-outline" onclick="openEditFromDetail()"><i class="fa fa-pen"></i> Edit</button>
            <button class="btn-primary" onclick="openUpdateStatusFromDetail()"><i class="fa fa-rotate"></i> Update Status</button>
        </div>
    </div>
</div>

<!-- ════ MODAL EDIT ════ -->
<div class="modal-overlay" id="modalEdit">
    <div class="modal modal-lg">
        <div class="modal-header yellow">
            <h2><i class="fa fa-pen"></i> Edit Data Pelanggaran</h2>
            <button class="modal-close" onclick="closeModal('modalEdit')"><i class="fa fa-times"></i></button>
        </div>
        <form id="formEdit" action="" method="POST">
            <?= csrf_field() ?>
            <input type="hidden" name="_method" value="POST">
            <div class="modal-body">
                <div class="form-row full">
                    <div class="form-group">
                        <label class="form-label">Siswa</label>
                        <input type="text" class="form-input" id="editSiswaLabel" readonly>
                        <input type="hidden" name="siswa_id" id="editSiswaId">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label class="form-label">Kelas</label>
                        <input type="text" class="form-input" id="editKelas" readonly>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Tanggal Kejadian <span>*</span></label>
                        <input type="date" class="form-input" name="tanggal_kejadian" id="editTanggal" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label class="form-label">Jenis Pelanggaran <span>*</span></label>
                        <select class="form-select" name="jenis_pelanggaran" id="selectJenisEdit" required onchange="autoFillPoin('edit')">
                            <option value="">— Pilih Jenis —</option>
                            <?php foreach ($jenisPelanggaran as $kat => $items): ?>
                            <optgroup label="Pelanggaran <?= $kat ?>">
                                <?php foreach ($items as $nama => $poin): ?>
                                <option value="<?= esc($nama) ?>" data-poin="<?= $poin ?>" data-kat="<?= strtolower($kat) ?>">
                                    <?= esc($nama) ?> (<?= $poin ?> poin)
                                </option>
                                <?php endforeach; ?>
                            </optgroup>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Kategori</label>
                        <select class="form-select" name="kategori" id="selectKategoriEdit">
                            <option value="ringan">Ringan</option>
                            <option value="sedang">Sedang</option>
                            <option value="berat">Berat</option>
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label class="form-label">Poin <span>*</span></label>
                        <input type="number" class="form-input" name="poin" id="inputPoinEdit" min="1" max="100" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Lokasi Kejadian</label>
                        <input type="text" class="form-input" name="lokasi" id="editLokasi">
                    </div>
                </div>
                <div class="form-row full">
                    <div class="form-group">
                        <label class="form-label">Deskripsi Kejadian</label>
                        <textarea class="form-textarea" name="deskripsi" id="editDeskripsi"></textarea>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label class="form-label">Status</label>
                        <select class="form-select" name="status" id="editStatus">
                            <option value="baru">Baru Masuk</option>
                            <option value="proses">Dalam Proses</option>
                            <option value="diproses">Sudah Diproses</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Notifikasi Orang Tua</label>
                        <select class="form-select" name="notif_ortu" id="editNotifOrtu">
                            <option value="0">Belum Dikirim</option>
                            <option value="1">Sudah Dikirim</option>
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

<!-- ════ MODAL UPDATE STATUS ════ -->
<div class="modal-overlay" id="modalStatus">
    <div class="modal modal-sm">
        <div class="modal-header green">
            <h2><i class="fa fa-rotate"></i> Update Status Penanganan</h2>
            <button class="modal-close" onclick="closeModal('modalStatus')"><i class="fa fa-times"></i></button>
        </div>
        <form id="formStatus" action="" method="POST">
            <?= csrf_field() ?>
            <div class="modal-body">
                <p style="font-size:13px;color:var(--gray-500);margin-bottom:16px">
                    Perbarui status penanganan untuk: <strong id="statusSiswaName" style="color:var(--gray-800)">—</strong>
                </p>
                <div class="status-options">
                    <label class="status-option" onclick="selectStatus(this,'baru')">
                        <input type="radio" name="status" value="baru">
                        <span class="status-dot" style="background:var(--danger)"></span>
                        <div class="status-option-text"><div class="st-title">Baru Masuk</div><div class="st-desc">Pelanggaran baru diterima, belum ditangani</div></div>
                    </label>
                    <label class="status-option" onclick="selectStatus(this,'proses')">
                        <input type="radio" name="status" value="proses">
                        <span class="status-dot" style="background:var(--warning)"></span>
                        <div class="status-option-text"><div class="st-title">Dalam Proses</div><div class="st-desc">Sedang dalam proses konseling / investigasi</div></div>
                    </label>
                    <label class="status-option" onclick="selectStatus(this,'diproses')">
                        <input type="radio" name="status" value="diproses">
                        <span class="status-dot" style="background:var(--success)"></span>
                        <div class="status-option-text"><div class="st-title">Sudah Diproses</div><div class="st-desc">Pelanggaran telah diselesaikan dan ditutup</div></div>
                    </label>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn-cancel" onclick="closeModal('modalStatus')">Batal</button>
                <button type="submit" class="btn-success"><i class="fa fa-check"></i> Simpan Status</button>
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
            <div class="confirm-title">Hapus Data Pelanggaran?</div>
            <p class="confirm-msg">
                Anda akan menghapus pelanggaran milik<br>
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
        <div class="navbar-search">
            <i class="fa fa-magnifying-glass"></i>
            <input type="text" placeholder="Cari siswa, pelanggaran...">
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
        <div class="flash-alert success"><i class="fa fa-circle-check"></i> <?= session()->getFlashdata('success') ?></div>
        <?php endif; ?>
        <?php if (session()->getFlashdata('error')): ?>
        <div class="flash-alert error"><i class="fa fa-circle-exclamation"></i> <?= session()->getFlashdata('error') ?></div>
        <?php endif; ?>

        <div class="page-header">
            <div class="page-header-left">
                <h1>Data Pelanggaran</h1>
                <p>Kelola dan pantau seluruh pelanggaran siswa SMA Karya Sekadau</p>
            </div>
            <div class="page-header-right">
                <button class="btn-outline"><i class="fa fa-file-export"></i> Export</button>
                <button class="btn-outline"><i class="fa fa-print"></i> Cetak</button>
                <button class="btn-primary" onclick="openModal('modalTambah')"><i class="fa fa-plus"></i> Tambah Pelanggaran</button>
            </div>
        </div>

        <!-- Stat Cards -->
        <div class="stats-grid">
            <div class="stat-card s1">
                <div class="stat-top">
                    <div class="stat-ico"><i class="fa fa-triangle-exclamation"></i></div>
                    <span class="stat-trend up"><i class="fa fa-arrow-up" style="font-size:9px"></i> 12%</span>
                </div>
                <div class="stat-num"><?= $stats['total'] ?? 0 ?></div>
                <div class="stat-lbl">Total Pelanggaran</div>
            </div>
            <div class="stat-card s2">
                <div class="stat-top">
                    <div class="stat-ico"><i class="fa fa-circle-exclamation"></i></div>
                    <span class="stat-trend up"><i class="fa fa-arrow-up" style="font-size:9px"></i> 24%</span>
                </div>
                <div class="stat-num"><?= $stats['baru'] ?? 0 ?></div>
                <div class="stat-lbl">Baru Masuk</div>
            </div>
            <div class="stat-card s3">
                <div class="stat-top">
                    <div class="stat-ico"><i class="fa fa-spinner"></i></div>
                    <span class="stat-trend same"><i class="fa fa-minus" style="font-size:9px"></i> 0%</span>
                </div>
                <div class="stat-num"><?= $stats['proses'] ?? 0 ?></div>
                <div class="stat-lbl">Dalam Proses</div>
            </div>
            <div class="stat-card s4">
                <div class="stat-top">
                    <div class="stat-ico"><i class="fa fa-circle-check"></i></div>
                    <span class="stat-trend up"><i class="fa fa-arrow-up" style="font-size:9px"></i> 8%</span>
                </div>
                <div class="stat-num"><?= $stats['diproses'] ?? 0 ?></div>
                <div class="stat-lbl">Sudah Diproses</div>
            </div>
        </div>

        <!-- Filter Bar -->
        <form method="GET" action="<?= base_url('pelanggaran') ?>" id="formFilter">
            <input type="hidden" name="tab" value="<?= esc($tab_aktif) ?>">
            <div class="filter-bar">
                <div class="filter-search">
                    <i class="fa fa-magnifying-glass"></i>
                    <input type="text" name="q" placeholder="Cari nama siswa, jenis pelanggaran..."
                           value="<?= esc($filter['q'] ?? '') ?>" oninput="debounceFilter()">
                </div>
                <select class="filter-select" name="kategori" onchange="submitFilter()">
                    <option value="">Semua Kategori</option>
                    <option value="ringan" <?= ($filter['kategori'] ?? '') === 'ringan' ? 'selected' : '' ?>>Ringan</option>
                    <option value="sedang" <?= ($filter['kategori'] ?? '') === 'sedang' ? 'selected' : '' ?>>Sedang</option>
                    <option value="berat"  <?= ($filter['kategori'] ?? '') === 'berat'  ? 'selected' : '' ?>>Berat</option>
                </select>
                <!-- Filter kelas: X, XI, XII -->
                <select class="filter-select" name="kelas" onchange="submitFilter()">
                    <option value="">Semua Kelas</option>
                    <option value="X"   <?= ($filter['kelas'] ?? '') === 'X'   ? 'selected' : '' ?>>Kelas X</option>
                    <option value="XI"  <?= ($filter['kelas'] ?? '') === 'XI'  ? 'selected' : '' ?>>Kelas XI</option>
                    <option value="XII" <?= ($filter['kelas'] ?? '') === 'XII' ? 'selected' : '' ?>>Kelas XII</option>
                </select>
                <select class="filter-select" name="guru" onchange="submitFilter()">
                    <option value="">Semua Guru BK</option>
                    <option value="1" <?= ($filter['guru'] ?? '') == '1' ? 'selected' : '' ?>>Bu Rina Marlina</option>
                    <option value="2" <?= ($filter['guru'] ?? '') == '2' ? 'selected' : '' ?>>Pak Budi Santoso</option>
                    <option value="3" <?= ($filter['guru'] ?? '') == '3' ? 'selected' : '' ?>>Bu Siti Aminah</option>
                </select>
                <?php if (!empty($filter['q']) || !empty($filter['kategori']) || !empty($filter['kelas']) || !empty($filter['guru'])): ?>
                <a href="<?= base_url('pelanggaran?tab='.$tab_aktif) ?>" class="btn-outline" style="padding:8px 14px;font-size:12.5px">
                    <i class="fa fa-times"></i> Reset
                </a>
                <?php endif; ?>
            </div>
        </form>

        <!-- Table Card -->
        <div class="card" style="margin-bottom:28px">
            <?php
            $qStr = http_build_query(array_filter(['q'=>$filter['q']??'','kategori'=>$filter['kategori']??'','kelas'=>$filter['kelas']??'','guru'=>$filter['guru']??'']));
            $qStr = $qStr ? '&'.$qStr : '';
            ?>
            <div class="tab-nav">
                <a class="tab-btn <?= $tab_aktif === 'baru'     ? 'active' : '' ?>" href="<?= base_url('pelanggaran?tab=baru'.$qStr) ?>">
                    <i class="fa fa-circle-exclamation"></i> Baru Masuk <span class="tab-count red"><?= $stats['baru'] ?></span>
                </a>
                <a class="tab-btn <?= $tab_aktif === 'proses'   ? 'active' : '' ?>" href="<?= base_url('pelanggaran?tab=proses'.$qStr) ?>">
                    <i class="fa fa-spinner"></i> Dalam Proses <span class="tab-count warn"><?= $stats['proses'] ?></span>
                </a>
                <a class="tab-btn <?= $tab_aktif === 'diproses' ? 'active' : '' ?>" href="<?= base_url('pelanggaran?tab=diproses'.$qStr) ?>">
                    <i class="fa fa-circle-check"></i> Sudah Diproses <span class="tab-count"><?= $stats['diproses'] ?></span>
                </a>
                <a class="tab-btn <?= $tab_aktif === 'semua'    ? 'active' : '' ?>" href="<?= base_url('pelanggaran?tab=semua'.$qStr) ?>">
                    <i class="fa fa-list"></i> Semua <span class="tab-count"><?= $stats['total'] ?></span>
                </a>
            </div>

            <div class="table-wrap">
                <table>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Siswa</th>
                            <th>Jenis Pelanggaran</th>
                            <th>Kategori</th>
                            <th>Poin</th>
                            <th>Tanggal</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (empty($list_pelanggaran)): ?>
                        <tr>
                            <td colspan="8" style="text-align:center;padding:40px;color:var(--gray-400)">
                                <i class="fa fa-inbox" style="font-size:28px;display:block;margin-bottom:10px;color:var(--gray-200)"></i>
                                Tidak ada data pelanggaran
                            </td>
                        </tr>
                        <?php else: ?>
                        <?php
                        $avatarColors = ['#1a56db','#ef4444','#f59e0b','#10b981','#8b5cf6','#ec4899','#06b6d4','#f97316'];
                        foreach ($list_pelanggaran as $i => $r):
                            $nama      = $r['nama_siswa'] ?? 'Tidak Diketahui';
                            $inisial   = strtoupper(substr(implode('', array_map(fn($w)=>$w[0], explode(' ', $nama))), 0, 2));
                            $color     = $avatarColors[$i % count($avatarColors)];
                            $poinClass = $r['poin'] >= 75 ? 'high' : ($r['poin'] >= 30 ? 'medium' : 'low');
                            $katClass  = $r['kategori'] ?? 'ringan';
                            $statusLabel = ['baru'=>'Baru','proses'=>'Proses','diproses'=>'Selesai'];
                            // Format kelas dari DB
                            $kelasRaw    = $r['kelas'] ?? '';
                            $kelasFormat = format_kelas($kelasRaw);
                            // Data untuk JS (escape untuk inline onclick)
                            $jsKelas = addslashes($kelasFormat);
                            $jsNama  = addslashes($nama);
                            $jsJenis = addslashes($r['jenis_pelanggaran']);
                            $jsLok   = addslashes($r['lokasi'] ?? '');
                            $jsDesk  = addslashes($r['deskripsi'] ?? '');
                        ?>
                        <tr>
                            <td style="color:var(--gray-400);font-weight:500"><?= $i + 1 ?></td>
                            <td>
                                <div class="td-student">
                                    <div class="td-avatar" style="background:<?= $color ?>"><?= $inisial ?></div>
                                    <div>
                                        <div class="td-name"><?= esc($nama) ?></div>
                                        <!-- KELAS FORMAT BARU: X A (MIA 1) -->
                                        <div class="td-class"><?= esc($kelasFormat) ?></div>
                                    </div>
                                </div>
                            </td>
                            <td><?= esc($r['jenis_pelanggaran']) ?></td>
                            <td><span class="badge <?= $katClass ?>"><?= ucfirst($katClass) ?></span></td>
                            <td><span class="poin-chip <?= $poinClass ?>"><?= $r['poin'] ?> poin</span></td>
                            <td style="color:var(--gray-400)"><?= date('d M Y', strtotime($r['tanggal_kejadian'])) ?></td>
                            <td><span class="badge <?= $r['status'] ?>"><?= $statusLabel[$r['status']] ?></span></td>
                            <td>
                                <div class="action-btns">
                                    <button class="btn-icon view" title="Detail"
                                        onclick="openDetail(<?= $r['id'] ?>,'<?= $jsNama ?>','<?= $jsKelas ?>','<?= $jsJenis ?>','<?= $katClass ?>',<?= $r['poin'] ?>,'<?= $r['tanggal_kejadian'] ?>','<?= $r['status'] ?>',<?= (int)$r['notif_ortu'] ?>,'<?= $jsLok ?>',`<?= $jsDesk ?>`)">
                                        <i class="fa fa-eye"></i>
                                    </button>
                                    <button class="btn-icon edit" title="Edit"
                                        onclick="openEdit(<?= $r['id'] ?>,'<?= $jsNama ?>','<?= $jsKelas ?>','<?= $jsJenis ?>','<?= $katClass ?>',<?= $r['poin'] ?>,'<?= $r['tanggal_kejadian'] ?>','<?= $r['status'] ?>',<?= (int)$r['notif_ortu'] ?>,'<?= $jsLok ?>',`<?= $jsDesk ?>`,<?= $r['siswa_id'] ?>)">
                                        <i class="fa fa-pen"></i>
                                    </button>
                                    <button class="btn-icon ok" title="Update Status"
                                        onclick="openUpdateStatus(<?= $r['id'] ?>,'<?= $r['status'] ?>','<?= $jsNama ?>')">
                                        <i class="fa fa-rotate"></i>
                                    </button>
                                    <button class="btn-icon del" title="Hapus"
                                        onclick="openHapus(<?= $r['id'] ?>,'<?= $jsNama ?>','<?= $jsJenis ?>')">
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
                <span>Menampilkan <?= count($list_pelanggaran ?? []) ?> data</span>
                <div class="pagination-btns">
                    <button class="pg-btn">«</button>
                    <button class="pg-btn active">1</button>
                    <button class="pg-btn">»</button>
                </div>
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
setInterval(updateClock,1000);updateClock();

function toggleSidebar(){document.getElementById('sidebar').classList.toggle('open');document.getElementById('overlay').classList.toggle('show')}
function closeSidebar(){document.getElementById('sidebar').classList.remove('open');document.getElementById('overlay').classList.remove('show')}
function toggleFS(){if(!document.fullscreenElement){document.documentElement.requestFullscreen();document.getElementById('fsIcon').className='fa fa-compress'}else{document.exitFullscreen();document.getElementById('fsIcon').className='fa fa-expand'}}

function openModal(id){document.getElementById(id).classList.add('show')}
function closeModal(id){document.getElementById(id).classList.remove('show')}
document.querySelectorAll('.modal-overlay').forEach(m=>{m.addEventListener('click',e=>{if(e.target===m)m.classList.remove('show')})});

// ── FILL SISWA INFO (format kelas baru) ──
function fillSiswaInfo(sel){
    const opt=sel.options[sel.selectedIndex];
    if(!opt.value){document.getElementById('siswaInfoTambah').style.display='none';return}
    // Tampilkan format X A (MIA 1)
    document.getElementById('kelasInfoTambah').value = opt.dataset.kelasLabel || opt.dataset.kelas || '';
    document.getElementById('nisnInfoTambah').value  = opt.dataset.nisn || '';
    document.getElementById('siswaInfoTambah').style.display='grid';
}

function autoFillPoin(mode){
    const sel=document.getElementById(mode==='tambah'?'selectJenisTambah':'selectJenisEdit');
    const opt=sel.options[sel.selectedIndex];
    if(!opt.value)return;
    const poin=opt.dataset.poin||0,kat=opt.dataset.kat||'ringan';
    if(mode==='tambah'){
        document.getElementById('inputPoinTambah').value=poin;
        document.getElementById('selectKategoriTambah').value=kat;
        document.getElementById('poinTextTambah').textContent='Poin otomatis: '+poin+' — Kategori: '+kat.charAt(0).toUpperCase()+kat.slice(1);
        document.getElementById('poinPreviewTambah').classList.add('show');
    } else {
        document.getElementById('inputPoinEdit').value=poin;
        document.getElementById('selectKategoriEdit').value=kat;
    }
}

function selectStatus(el,val){
    document.querySelectorAll('.status-option').forEach(o=>o.classList.remove('selected'));
    el.classList.add('selected');el.querySelector('input').checked=true;
}

// ── Helper JS format kelas (sama dengan PHP) ──
function formatKelas(kelas){
    if(!kelas)return'—';
    const map={A:'MIA 1',B:'MIA 2',C:'IIS 1',D:'IIS 2',E:'IIS 3',F:'IIS 4'};
    const m=kelas.trim().match(/([A-Fa-f])\s*$/);
    if(m&&map[m[1].toUpperCase()])return kelas.trim()+' ('+map[m[1].toUpperCase()]+')';
    return kelas;
}

function fmtTgl(s){const d=new Date(s),m=['Jan','Feb','Mar','Apr','Mei','Jun','Jul','Ags','Sep','Okt','Nov','Des'];return d.getDate()+' '+m[d.getMonth()]+' '+d.getFullYear()}
function getPoinClass(p){return p>=75?'high':p>=30?'medium':'low'}

let currentDetailIdx=null;

function openDetail(id,nama,kelas,jenis,kat,poin,tgl,status,notif,lokasi,deskripsi){
    const colors=['#1a56db','#ef4444','#f59e0b','#10b981','#8b5cf6','#ec4899','#06b6d4','#f97316'];
    const inisial=nama.split(' ').map(w=>w[0]).join('').toUpperCase().slice(0,2);
    currentDetailIdx={id,nama,kelas,jenis,kat,poin,tgl,status,notif,lokasi,deskripsi,siswaId:id};
    document.getElementById('detailAvatar').textContent=inisial;
    document.getElementById('detailAvatar').style.background=colors[id%colors.length];
    document.getElementById('detailNama').textContent=nama;
    // Tampilkan kelas format baru di detail
    document.getElementById('detailMeta').textContent=kelas+' • '+fmtTgl(tgl);
    document.getElementById('dJenis').textContent=jenis;
    document.getElementById('dKategori').innerHTML=`<span class="badge ${kat}">${kat.charAt(0).toUpperCase()+kat.slice(1)}</span>`;
    document.getElementById('dTanggal').textContent=fmtTgl(tgl);
    document.getElementById('dPoin').innerHTML=`<span class="poin-chip ${getPoinClass(poin)}">${poin} poin</span>`;
    document.getElementById('dGuru').textContent='—';
    const sl={baru:'<span class="badge baru">Baru</span>',proses:'<span class="badge proses">Proses</span>',diproses:'<span class="badge diproses">Selesai</span>'};
    document.getElementById('dStatus').innerHTML=sl[status]||status;
    document.getElementById('dNotif').textContent=notif==1?'✅ Sudah Dikirim':'❌ Belum Dikirim';
    document.getElementById('dLokasi').textContent=lokasi||'—';
    document.getElementById('dDeskripsi').textContent=deskripsi||'—';
    openModal('modalDetail');
}

function openEditFromDetail(){closeModal('modalDetail');const r=currentDetailIdx;if(!r)return;openEdit(r.id,r.nama,r.kelas,r.jenis,r.kat,r.poin,r.tgl,r.status,r.notif,r.lokasi,r.deskripsi,r.siswaId??0)}
function openUpdateStatusFromDetail(){closeModal('modalDetail');const r=currentDetailIdx;if(!r)return;openUpdateStatus(r.id,r.status,r.nama)}

function openEdit(id,nama,kelas,jenis,kat,poin,tgl,status,notif,lokasi,deskripsi,siswaId){
    document.getElementById('formEdit').action=`<?= base_url('pelanggaran/update/') ?>${id}`;
    document.getElementById('editSiswaLabel').value=nama+' — '+kelas;
    document.getElementById('editSiswaId').value=siswaId||id;
    // Tampilkan format kelas baru di field edit
    document.getElementById('editKelas').value=kelas;
    document.getElementById('editTanggal').value=tgl;
    document.getElementById('inputPoinEdit').value=poin;
    document.getElementById('editLokasi').value=lokasi||'';
    document.getElementById('editDeskripsi').value=deskripsi||'';
    document.getElementById('editStatus').value=status;
    document.getElementById('editNotifOrtu').value=notif;
    document.getElementById('selectKategoriEdit').value=kat;
    const sel=document.getElementById('selectJenisEdit');
    for(let i=0;i<sel.options.length;i++){if(sel.options[i].value===jenis){sel.selectedIndex=i;break}}
    closeModal('modalDetail');openModal('modalEdit');
}

function openUpdateStatus(id,currentStatus,nama){
    document.getElementById('formStatus').action=`<?= base_url('pelanggaran/status/') ?>${id}`;
    document.getElementById('statusSiswaName').textContent=nama;
    document.querySelectorAll('.status-option').forEach(o=>{o.classList.remove('selected');const inp=o.querySelector('input');if(inp.value===currentStatus){o.classList.add('selected');inp.checked=true}});
    openModal('modalStatus');
}

function openHapus(id,nama,jenis){
    document.getElementById('hapusNama').textContent=nama+' — '+jenis;
    document.getElementById('hapusLink').href=`<?= base_url('pelanggaran/hapus/') ?>${id}`;
    openModal('modalHapus');
}

let filterTimer;
function debounceFilter(){clearTimeout(filterTimer);filterTimer=setTimeout(()=>submitFilter(),500)}
function submitFilter(){document.getElementById('formFilter').submit()}
</script>
</body>
</html>