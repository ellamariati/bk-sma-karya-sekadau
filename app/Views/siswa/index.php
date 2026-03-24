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
            --blue-900: #0a1628;
            --blue-800: #0d2045;
            --blue-700: #0f2d6b;
            --blue-600: #1340a0;
            --blue-500: #1a56db;
            --blue-400: #3b82f6;
            --blue-300: #93c5fd;
            --blue-200: #bfdbfe;
            --blue-100: #dbeafe;
            --blue-50:  #eff6ff;
            --white: #ffffff;
            --gray-50: #f8fafc;
            --gray-100: #f1f5f9;
            --gray-200: #e2e8f0;
            --gray-400: #94a3b8;
            --gray-600: #475569;
            --gray-800: #1e293b;
            --success: #10b981;
            --warning: #f59e0b;
            --danger: #ef4444;
            --sidebar-w: 270px;
            --navbar-h: 72px;
            --radius: 16px;
            --radius-sm: 10px;
            --shadow: 0 4px 24px rgba(19,64,160,0.10);
            --shadow-lg: 0 12px 40px rgba(19,64,160,0.18);
            --transition: all 0.3s cubic-bezier(0.4,0,0.2,1);
        }

        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        body {
            font-family: 'DM Sans', sans-serif;
            background: var(--gray-50);
            color: var(--gray-800);
            min-height: 100vh;
            display: flex;
            overflow-x: hidden;
        }

        /* ══ SIDEBAR ══ */
        .sidebar {
            width: var(--sidebar-w);
            min-height: 100vh;
            background: linear-gradient(175deg, var(--blue-900) 0%, var(--blue-800) 50%, var(--blue-700) 100%);
            position: fixed;
            left: 0; top: 0; bottom: 0;
            z-index: 100;
            display: flex;
            flex-direction: column;
            box-shadow: 4px 0 32px rgba(10,22,40,0.25);
            transition: var(--transition);
            overflow-y: auto;
        }
        .sidebar::before {
            content: '';
            position: absolute;
            top: 0; right: 0;
            width: 1px; height: 100%;
            background: linear-gradient(to bottom, transparent, rgba(59,130,246,0.4), transparent);
        }
        .sidebar::after {
            content: '';
            position: absolute;
            top: -60px; right: -60px;
            width: 200px; height: 200px;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(26,86,219,0.2) 0%, transparent 70%);
            pointer-events: none;
        }
        .sidebar-brand {
            padding: 28px 24px 22px;
            display: flex;
            align-items: center;
            gap: 14px;
            border-bottom: 1px solid rgba(255,255,255,0.08);
            position: relative;
            flex-shrink: 0;
        }
        .brand-icon {
            width: 46px; height: 46px;
            background: linear-gradient(135deg, var(--blue-500), var(--blue-400));
            border-radius: 13px;
            display: flex; align-items: center; justify-content: center;
            font-size: 20px; color: white;
            box-shadow: 0 4px 16px rgba(26,86,219,0.5);
            flex-shrink: 0;
        }
        .brand-text .brand-title {
            font-family: 'Outfit', sans-serif;
            font-weight: 700; font-size: 17px; color: white;
            line-height: 1.1; letter-spacing: -0.3px;
        }
        .brand-text .brand-sub {
            font-size: 11px; color: var(--blue-300);
            font-weight: 400; margin-top: 2px; letter-spacing: 0.4px;
        }
        .sidebar-section { padding: 18px 14px 6px; }
        .sidebar-section-label {
            font-size: 10px; font-weight: 600;
            text-transform: uppercase; letter-spacing: 1.5px;
            color: rgba(147,197,253,0.5);
            padding: 0 10px; margin-bottom: 6px;
        }
        .nav-item {
            display: flex; align-items: center; gap: 12px;
            padding: 11px 14px; border-radius: var(--radius-sm);
            color: rgba(255,255,255,0.65);
            text-decoration: none; font-size: 14px; font-weight: 400;
            transition: var(--transition); cursor: pointer;
            position: relative; margin-bottom: 2px;
        }
        .nav-item:hover { background: rgba(255,255,255,0.08); color: white; }
        .nav-item.active {
            background: linear-gradient(90deg, rgba(26,86,219,0.6), rgba(26,86,219,0.2));
            color: white; font-weight: 500;
            box-shadow: inset 0 0 0 1px rgba(59,130,246,0.3);
        }
        .nav-item.active::before {
            content: '';
            position: absolute;
            left: 0; top: 20%; bottom: 20%;
            width: 3px; background: var(--blue-400);
            border-radius: 0 4px 4px 0;
        }
        .nav-item i { width: 20px; font-size: 15px; text-align: center; flex-shrink: 0; }
        .nav-badge {
            margin-left: auto; background: var(--danger); color: white;
            font-size: 10px; font-weight: 600; padding: 2px 7px;
            border-radius: 20px; min-width: 20px; text-align: center;
        }
        .nav-badge.warn { background: var(--warning); color: #92400e; }
        .sidebar-footer {
            margin-top: auto; padding: 16px 14px;
            border-top: 1px solid rgba(255,255,255,0.08); flex-shrink: 0;
        }
        .user-card {
            display: flex; align-items: center; gap: 12px;
            padding: 10px 12px; border-radius: var(--radius-sm);
            background: rgba(255,255,255,0.07); cursor: pointer;
            transition: var(--transition);
        }
        .user-card:hover { background: rgba(255,255,255,0.12); }
        .user-avatar {
            width: 38px; height: 38px; border-radius: 50%;
            background: linear-gradient(135deg, var(--blue-500), #60a5fa);
            display: flex; align-items: center; justify-content: center;
            font-family: 'Outfit', sans-serif;
            font-weight: 700; font-size: 15px; color: white; flex-shrink: 0;
        }
        .user-info .user-name { font-size: 13px; font-weight: 500; color: white; }
        .user-info .user-role { font-size: 11px; color: var(--blue-300); margin-top: 1px; }
        .user-card .logout-icon {
            margin-left: auto; color: rgba(255,255,255,0.4);
            font-size: 13px; transition: var(--transition);
        }
        .user-card:hover .logout-icon { color: var(--danger); }

        /* ══ MAIN ══ */
        .main-wrapper {
            margin-left: var(--sidebar-w);
            flex: 1; display: flex; flex-direction: column; min-height: 100vh;
        }

        /* ══ NAVBAR ══ */
        .navbar {
            height: var(--navbar-h); background: white;
            border-bottom: 1px solid var(--gray-200);
            display: flex; align-items: center;
            padding: 0 32px; position: sticky; top: 0; z-index: 50;
            gap: 16px; box-shadow: 0 2px 16px rgba(19,64,160,0.06);
        }
        .navbar-hamburger {
            display: none; background: none; border: none;
            font-size: 20px; color: var(--blue-600); cursor: pointer;
            padding: 8px; border-radius: 8px; transition: var(--transition);
        }
        .navbar-hamburger:hover { background: var(--blue-50); }
        .navbar-search { flex: 1; max-width: 400px; position: relative; }
        .navbar-search input {
            width: 100%; padding: 9px 16px 9px 40px;
            border-radius: 50px; border: 1.5px solid var(--gray-200);
            background: var(--gray-50); font-family: 'DM Sans', sans-serif;
            font-size: 13.5px; color: var(--gray-800); outline: none;
            transition: var(--transition);
        }
        .navbar-search input:focus {
            border-color: var(--blue-400); background: white;
            box-shadow: 0 0 0 3px rgba(59,130,246,0.12);
        }
        .navbar-search i {
            position: absolute; left: 14px; top: 50%;
            transform: translateY(-50%); color: var(--gray-400); font-size: 13px;
        }
        .navbar-actions { display: flex; align-items: center; gap: 8px; margin-left: auto; }
        .nav-action-btn {
            width: 40px; height: 40px; border-radius: 50%; border: none;
            background: var(--gray-100); color: var(--gray-600); cursor: pointer;
            display: flex; align-items: center; justify-content: center;
            font-size: 16px; position: relative; transition: var(--transition);
        }
        .nav-action-btn:hover { background: var(--blue-100); color: var(--blue-600); }
        .notif-dot {
            position: absolute; top: 8px; right: 8px;
            width: 9px; height: 9px; background: var(--danger);
            border-radius: 50%; border: 2px solid white;
        }
        .navbar-date {
            font-size: 13px; color: var(--gray-600);
            padding: 0 16px; border-left: 1px solid var(--gray-200);
            display: flex; flex-direction: column; align-items: flex-end; gap: 1px;
        }
        .navbar-date .date-main { font-weight: 500; color: var(--gray-800); font-size: 13.5px; }
        .navbar-date .date-sub { font-size: 11px; color: var(--gray-400); }

        /* ══ PAGE CONTENT ══ */
        .page-content { padding: 28px 32px; flex: 1; }

        .page-header {
            display: flex; align-items: flex-start;
            justify-content: space-between; margin-bottom: 28px; gap: 16px;
        }
        .page-header-left h1 {
            font-family: 'Outfit', sans-serif;
            font-size: 26px; font-weight: 700;
            color: var(--blue-900); letter-spacing: -0.5px;
        }
        .page-header-left p { font-size: 14px; color: var(--gray-400); margin-top: 4px; }
        .page-header-right { display: flex; gap: 10px; flex-shrink: 0; }

        .btn-primary {
            padding: 10px 20px; border-radius: var(--radius-sm); border: none;
            background: var(--blue-500); color: white;
            font-family: 'DM Sans', sans-serif; font-size: 13.5px; font-weight: 500;
            cursor: pointer; transition: var(--transition);
            display: flex; align-items: center; gap: 8px;
        }
        .btn-primary:hover { background: var(--blue-600); box-shadow: 0 4px 14px rgba(26,86,219,0.4); }

        .btn-outline {
            padding: 10px 20px; border-radius: var(--radius-sm);
            border: 1.5px solid var(--gray-200); background: white;
            color: var(--gray-600); font-family: 'DM Sans', sans-serif;
            font-size: 13.5px; font-weight: 500; cursor: pointer;
            transition: var(--transition); display: flex; align-items: center; gap: 8px;
        }
        .btn-outline:hover { border-color: var(--blue-400); color: var(--blue-600); background: var(--blue-50); }

        /* ══ STAT CARDS ══ */
        .stats-grid {
            display: grid; grid-template-columns: repeat(4,1fr);
            gap: 18px; margin-bottom: 24px;
        }
        .stat-card {
            background: white; border-radius: var(--radius);
            padding: 20px 22px; box-shadow: var(--shadow);
            display: flex; align-items: center; gap: 16px;
            transition: var(--transition); cursor: default;
            border-left: 4px solid transparent;
        }
        .stat-card:hover { transform: translateY(-2px); box-shadow: var(--shadow-lg); }
        .stat-card.blue   { border-left-color: var(--blue-500); }
        .stat-card.green  { border-left-color: var(--success); }
        .stat-card.yellow { border-left-color: var(--warning); }
        .stat-card.purple { border-left-color: #8b5cf6; }
        .stat-ico {
            width: 46px; height: 46px; border-radius: 12px;
            display: flex; align-items: center; justify-content: center; font-size: 18px;
            flex-shrink: 0;
        }
        .stat-card.blue   .stat-ico { background: var(--blue-100); color: var(--blue-500); }
        .stat-card.green  .stat-ico { background: #d1fae5; color: #059669; }
        .stat-card.yellow .stat-ico { background: #fef3c7; color: #d97706; }
        .stat-card.purple .stat-ico { background: #ede9fe; color: #7c3aed; }
        .stat-info { flex: 1; }
        .stat-num {
            font-family: 'Outfit', sans-serif;
            font-size: 30px; font-weight: 800;
            color: var(--blue-900); line-height: 1; letter-spacing: -1px;
        }
        .stat-lbl { font-size: 12px; color: var(--gray-400); margin-top: 3px; font-weight: 500; }

        /* ══ FILTER BAR ══ */
        .filter-bar {
            background: white; border-radius: var(--radius);
            padding: 16px 22px; box-shadow: var(--shadow);
            display: flex; align-items: center; gap: 12px;
            margin-bottom: 20px; flex-wrap: wrap;
        }
        .filter-search { flex: 1; min-width: 220px; position: relative; }
        .filter-search input {
            width: 100%; padding: 9px 16px 9px 38px;
            border-radius: var(--radius-sm); border: 1.5px solid var(--gray-200);
            background: var(--gray-50); font-family: 'DM Sans', sans-serif;
            font-size: 13px; color: var(--gray-800); outline: none; transition: var(--transition);
        }
        .filter-search input:focus {
            border-color: var(--blue-400); background: white;
            box-shadow: 0 0 0 3px rgba(59,130,246,0.1);
        }
        .filter-search i {
            position: absolute; left: 12px; top: 50%;
            transform: translateY(-50%); color: var(--gray-400); font-size: 13px;
        }
        .filter-select {
            padding: 9px 14px; border-radius: var(--radius-sm);
            border: 1.5px solid var(--gray-200); background: white;
            font-family: 'DM Sans', sans-serif; font-size: 13px;
            color: var(--gray-700); outline: none; cursor: pointer;
            transition: var(--transition);
        }
        .filter-select:focus { border-color: var(--blue-400); }
        .filter-divider { width: 1px; height: 28px; background: var(--gray-200); }
        .view-toggle { display: flex; gap: 4px; }
        .view-btn {
            width: 36px; height: 36px; border-radius: 8px; border: 1.5px solid var(--gray-200);
            background: white; display: flex; align-items: center; justify-content: center;
            cursor: pointer; color: var(--gray-400); font-size: 14px; transition: var(--transition);
        }
        .view-btn.active, .view-btn:hover { background: var(--blue-500); border-color: var(--blue-500); color: white; }

        /* ══ CARD GRID VIEW ══ */
        .siswa-grid {
            display: grid; grid-template-columns: repeat(auto-fill, minmax(240px, 1fr));
            gap: 18px; margin-bottom: 24px;
        }
        .siswa-card {
            background: white; border-radius: var(--radius);
            box-shadow: var(--shadow); overflow: hidden;
            transition: var(--transition); cursor: pointer;
            border: 1.5px solid transparent;
        }
        .siswa-card:hover { transform: translateY(-4px); box-shadow: var(--shadow-lg); border-color: var(--blue-200); }
        .siswa-card-top {
            padding: 22px 20px 16px;
            display: flex; flex-direction: column; align-items: center; gap: 10px;
            background: linear-gradient(180deg, var(--blue-50) 0%, white 100%);
            position: relative;
        }
        .siswa-card-top .rank-badge {
            position: absolute; top: 12px; right: 12px;
            font-size: 10px; font-weight: 700; padding: 3px 8px;
            border-radius: 20px;
        }
        .siswa-avatar-lg {
            width: 68px; height: 68px; border-radius: 50%;
            display: flex; align-items: center; justify-content: center;
            font-family: 'Outfit', sans-serif; font-weight: 800;
            font-size: 22px; color: white;
            box-shadow: 0 4px 14px rgba(26,86,219,0.3);
        }
        .siswa-card-name {
            font-family: 'Outfit', sans-serif;
            font-size: 15px; font-weight: 600; color: var(--blue-900);
            text-align: center; line-height: 1.3;
        }
        .siswa-card-nisn { font-size: 11.5px; color: var(--gray-400); margin-top: -4px; }
        .siswa-card-body { padding: 14px 20px 16px; }
        .siswa-card-info { display: flex; flex-direction: column; gap: 8px; }
        .siswa-info-row {
            display: flex; align-items: center; gap: 8px;
            font-size: 12.5px; color: var(--gray-600);
        }
        .siswa-info-row i { color: var(--blue-400); font-size: 12px; width: 14px; text-align: center; }
        .siswa-card-footer {
            padding: 12px 20px;
            border-top: 1px solid var(--gray-100);
            display: flex; align-items: center; justify-content: space-between;
        }
        .pelanggaran-count {
            display: flex; align-items: center; gap: 5px;
            font-size: 12px; font-weight: 600;
        }
        .pelanggaran-count.danger { color: var(--danger); }
        .pelanggaran-count.warn   { color: var(--warning); }
        .pelanggaran-count.safe   { color: var(--success); }
        .card-actions-row { display: flex; gap: 6px; }
        .btn-icon {
            width: 30px; height: 30px; border-radius: 7px; border: none;
            cursor: pointer; display: flex; align-items: center; justify-content: center;
            font-size: 12px; transition: var(--transition);
        }
        .btn-icon.view { background: var(--blue-100); color: var(--blue-600); }
        .btn-icon.edit { background: #fef3c7; color: #b45309; }
        .btn-icon.del  { background: #fee2e2; color: #dc2626; }
        .btn-icon:hover { opacity: 0.8; transform: scale(1.08); }

        /* ══ TABLE VIEW ══ */
        .table-card {
            background: white; border-radius: var(--radius);
            box-shadow: var(--shadow); overflow: hidden; margin-bottom: 24px;
            display: none;
        }
        .table-card.show { display: block; }
        .siswa-grid-wrap { display: block; }
        .siswa-grid-wrap.hide { display: none; }

        .table-wrap { overflow-x: auto; }
        table { width: 100%; border-collapse: collapse; font-size: 13px; }
        thead th {
            padding: 13px 16px; text-align: left;
            font-size: 11px; font-weight: 600;
            text-transform: uppercase; letter-spacing: 0.6px;
            color: var(--gray-400); background: var(--gray-50);
            border-bottom: 1px solid var(--gray-200); white-space: nowrap;
        }
        tbody td {
            padding: 13px 16px; border-bottom: 1px solid var(--gray-100);
            color: var(--gray-800); vertical-align: middle;
        }
        tbody tr:last-child td { border-bottom: none; }
        tbody tr { transition: var(--transition); }
        tbody tr:hover { background: var(--blue-50); cursor: pointer; }
        .td-student { display: flex; align-items: center; gap: 11px; }
        .td-avatar {
            width: 36px; height: 36px; border-radius: 50%;
            display: flex; align-items: center; justify-content: center;
            font-size: 13px; font-weight: 700; color: white; flex-shrink: 0;
        }
        .td-name { font-weight: 600; color: var(--blue-900); font-size: 13.5px; }
        .td-nisn { font-size: 11.5px; color: var(--gray-400); margin-top: 1px; }
        .badge {
            display: inline-flex; align-items: center; gap: 4px;
            padding: 4px 10px; border-radius: 20px;
            font-size: 11px; font-weight: 600; white-space: nowrap;
        }
        .badge::before { content: ''; width: 5px; height: 5px; border-radius: 50%; background: currentColor; }
        .badge.laki   { background: #dbeafe; color: #1d4ed8; }
        .badge.perempuan { background: #fce7f3; color: #be185d; }
        .badge.ipa    { background: #d1fae5; color: #065f46; }
        .badge.ips    { background: #fef3c7; color: #92400e; }
        .badge.tkj    { background: #ede9fe; color: #5b21b6; }
        .badge.rpl    { background: #dbeafe; color: #1e40af; }
        .badge.mm     { background: #fce7f3; color: #9d174d; }
        .badge.akl    { background: #d1fae5; color: #065f46; }
        .badge.tsm    { background: #ffedd5; color: #9a3412; }
        .badge.ap     { background: #f0fdf4; color: #166534; }
        .poin-bar-wrap { display: flex; align-items: center; gap: 8px; }
        .poin-bar {
            flex: 1; height: 6px; background: var(--gray-100);
            border-radius: 10px; overflow: hidden; min-width: 60px;
        }
        .poin-bar-fill { height: 100%; border-radius: 10px; transition: width .6s ease; }
        .poin-num { font-size: 12px; font-weight: 700; min-width: 28px; }
        .poin-num.safe   { color: var(--success); }
        .poin-num.warn   { color: var(--warning); }
        .poin-num.danger { color: var(--danger); }
        .action-btns { display: flex; gap: 6px; }

        /* ══ PAGINATION ══ */
        .pagination-bar {
            display: flex; align-items: center; justify-content: space-between;
            padding: 14px 22px; border-top: 1px solid var(--gray-100);
            font-size: 12.5px; color: var(--gray-400);
        }
        .pagination-btns { display: flex; gap: 5px; }
        .pg-btn {
            width: 32px; height: 32px; border-radius: 8px;
            border: 1.5px solid var(--gray-200); background: white;
            display: flex; align-items: center; justify-content: center;
            cursor: pointer; font-size: 12.5px; color: var(--gray-600);
            font-family: 'DM Sans', sans-serif; transition: var(--transition);
        }
        .pg-btn:hover  { border-color: var(--blue-400); color: var(--blue-600); }
        .pg-btn.active { background: var(--blue-500); border-color: var(--blue-500); color: white; }

        /* ══ MODAL TAMBAH SISWA ══ */
        .modal-overlay {
            display: none; position: fixed; inset: 0;
            background: rgba(10,22,40,0.5); z-index: 300;
            align-items: center; justify-content: center;
        }
        .modal-overlay.show { display: flex; }
        .modal {
            background: white; border-radius: var(--radius);
            width: 100%; max-width: 560px; max-height: 90vh;
            overflow-y: auto; box-shadow: 0 24px 80px rgba(10,22,40,0.3);
            animation: modalIn .25s ease;
        }
        @keyframes modalIn {
            from { opacity: 0; transform: scale(0.95) translateY(10px); }
            to   { opacity: 1; transform: scale(1) translateY(0); }
        }
        .modal-header {
            padding: 22px 26px 18px;
            background: linear-gradient(135deg, var(--blue-800), var(--blue-600));
            display: flex; align-items: center; justify-content: space-between;
        }
        .modal-header h2 {
            font-family: 'Outfit', sans-serif;
            font-size: 17px; font-weight: 700; color: white;
            display: flex; align-items: center; gap: 10px;
        }
        .modal-close {
            width: 32px; height: 32px; border-radius: 8px;
            border: none; background: rgba(255,255,255,0.15);
            color: white; cursor: pointer; font-size: 15px;
            display: flex; align-items: center; justify-content: center;
            transition: var(--transition);
        }
        .modal-close:hover { background: rgba(255,255,255,0.25); }
        .modal-body { padding: 24px 26px; }
        .form-row { display: grid; grid-template-columns: 1fr 1fr; gap: 16px; margin-bottom: 16px; }
        .form-row.full { grid-template-columns: 1fr; }
        .form-group { display: flex; flex-direction: column; gap: 6px; }
        .form-label { font-size: 12.5px; font-weight: 600; color: var(--gray-700); }
        .form-input, .form-select {
            padding: 10px 14px; border-radius: var(--radius-sm);
            border: 1.5px solid var(--gray-200); background: var(--gray-50);
            font-family: 'DM Sans', sans-serif; font-size: 13.5px;
            color: var(--gray-800); outline: none; transition: var(--transition);
        }
        .form-input:focus, .form-select:focus {
            border-color: var(--blue-400); background: white;
            box-shadow: 0 0 0 3px rgba(59,130,246,0.1);
        }
        .modal-footer {
            padding: 16px 26px; border-top: 1px solid var(--gray-100);
            display: flex; justify-content: flex-end; gap: 10px;
        }
        .btn-cancel {
            padding: 10px 20px; border-radius: var(--radius-sm);
            border: 1.5px solid var(--gray-200); background: white;
            font-family: 'DM Sans', sans-serif; font-size: 13px;
            color: var(--gray-600); cursor: pointer; transition: var(--transition);
        }
        .btn-cancel:hover { background: var(--gray-50); }

        /* ══ EMPTY STATE ══ */
        .empty-state {
            text-align: center; padding: 60px 20px; color: var(--gray-400);
        }
        .empty-state i { font-size: 48px; color: var(--gray-200); margin-bottom: 14px; display: block; }
        .empty-state p { font-size: 14px; }

        /* ══ SCROLLBAR ══ */
        ::-webkit-scrollbar { width: 6px; height: 6px; }
        ::-webkit-scrollbar-track { background: transparent; }
        ::-webkit-scrollbar-thumb { background: var(--gray-200); border-radius: 10px; }
        ::-webkit-scrollbar-thumb:hover { background: var(--blue-300); }

        /* ══ ANIMATIONS ══ */
        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(16px); }
            to   { opacity: 1; transform: translateY(0); }
        }
        .stat-card { animation: fadeInUp 0.4s ease both; }
        .stat-card:nth-child(1) { animation-delay: 0.05s; }
        .stat-card:nth-child(2) { animation-delay: 0.10s; }
        .stat-card:nth-child(3) { animation-delay: 0.15s; }
        .stat-card:nth-child(4) { animation-delay: 0.20s; }
        .siswa-card { animation: fadeInUp 0.4s ease both; }

        /* ══ RESPONSIVE ══ */
        @media (max-width: 1200px) {
            .stats-grid { grid-template-columns: repeat(2,1fr); }
        }
        @media (max-width: 768px) {
            :root { --sidebar-w: 0px; }
            .sidebar { transform: translateX(-270px); width: 270px; }
            .sidebar.open { transform: translateX(0); }
            .main-wrapper { margin-left: 0; }
            .navbar-hamburger { display: flex; }
            .navbar { padding: 0 18px; }
            .page-content { padding: 20px 18px; }
            .stats-grid { grid-template-columns: 1fr 1fr; }
            .page-header { flex-direction: column; }
            .form-row { grid-template-columns: 1fr; }
        }
        @media (max-width: 480px) {
            .stats-grid { grid-template-columns: 1fr; }
        }

        /* Overlay mobile */
        .overlay {
            display: none; position: fixed; inset: 0;
            background: rgba(10,22,40,0.4); z-index: 90;
        }
        .overlay.show { display: block; }
    </style>
</head>
<body>

<div class="overlay" id="overlay" onclick="closeSidebar()"></div>

<!-- ════ MODAL TAMBAH SISWA ════ -->
<div class="modal-overlay" id="modalTambah">
    <div class="modal">
        <div class="modal-header">
            <h2><i class="fa fa-user-plus"></i> Tambah Data Siswa</h2>
            <button class="modal-close" onclick="closeModal()"><i class="fa fa-times"></i></button>
        </div>
        <div class="modal-body">
            <div class="form-row">
                <div class="form-group">
                    <label class="form-label">NISN <span style="color:var(--danger)">*</span></label>
                    <input type="text" class="form-input" placeholder="Contoh: 0041234567">
                </div>
                <div class="form-group">
                    <label class="form-label">NIS</label>
                    <input type="text" class="form-input" placeholder="Contoh: 2024001">
                </div>
            </div>
            <div class="form-row full">
                <div class="form-group">
                    <label class="form-label">Nama Lengkap <span style="color:var(--danger)">*</span></label>
                    <input type="text" class="form-input" placeholder="Masukkan nama lengkap">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group">
                    <label class="form-label">Jenis Kelamin <span style="color:var(--danger)">*</span></label>
                    <select class="form-select">
                        <option value="">-- Pilih --</option>
                        <option value="L">Laki-laki</option>
                        <option value="P">Perempuan</option>
                    </select>
                </div>
                <div class="form-group">
                    <label class="form-label">Tempat Lahir</label>
                    <input type="text" class="form-input" placeholder="Contoh: Jakarta">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group">
                    <label class="form-label">Tanggal Lahir</label>
                    <input type="date" class="form-input">
                </div>
                <div class="form-group">
                    <label class="form-label">Agama</label>
                    <select class="form-select">
                        <option value="">-- Pilih --</option>
                        <option>Islam</option>
                        <option>Kristen</option>
                        <option>Katolik</option>
                        <option>Hindu</option>
                        <option>Buddha</option>
                    </select>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group">
                    <label class="form-label">Kelas <span style="color:var(--danger)">*</span></label>
                    <select class="form-select">
                        <option value="">-- Pilih Kelas --</option>
                        <optgroup label="Kelas X">
                            <option>X TKJ 1</option><option>X TKJ 2</option>
                            <option>X RPL 1</option><option>X RPL 2</option>
                            <option>X MM 1</option><option>X AKL</option>
                            <option>X TSM 1</option>
                        </optgroup>
                        <optgroup label="Kelas XI">
                            <option>XI TKJ 1</option><option>XI TKJ 2</option>
                            <option>XI RPL 1</option><option>XI RPL 2</option>
                            <option>XI MM 1</option><option>XI MM 2</option>
                            <option>XI AKL 1</option><option>XI AKL 2</option>
                            <option>XI TSM 1</option><option>XI TSM 3</option>
                            <option>XI AP 1</option><option>XI AP 2</option>
                        </optgroup>
                        <optgroup label="Kelas XII">
                            <option>XII TKJ 1</option><option>XII TKJ 2</option>
                            <option>XII RPL 1</option><option>XII RPL 2</option>
                            <option>XII MM 1</option><option>XII MM 2</option>
                            <option>XII AP 1</option><option>XII TSM 2</option>
                        </optgroup>
                    </select>
                </div>
                <div class="form-group">
                    <label class="form-label">Jurusan <span style="color:var(--danger)">*</span></label>
                    <select class="form-select">
                        <option value="">-- Pilih Jurusan --</option>
                        <option>TKJ</option>
                        <option>RPL</option>
                        <option>MM</option>
                        <option>AKL</option>
                        <option>TSM</option>
                        <option>AP</option>
                    </select>
                </div>
            </div>
            <div class="form-row full">
                <div class="form-group">
                    <label class="form-label">No. HP Orang Tua / Wali</label>
                    <input type="text" class="form-input" placeholder="Contoh: 08123456789">
                </div>
            </div>
            <div class="form-row full">
                <div class="form-group">
                    <label class="form-label">Alamat</label>
                    <input type="text" class="form-input" placeholder="Masukkan alamat lengkap">
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button class="btn-cancel" onclick="closeModal()">Batal</button>
            <button class="btn-primary"><i class="fa fa-save"></i> Simpan Data</button>
        </div>
    </div>
</div>

<!-- ════ SIDEBAR ════ -->
<aside class="sidebar" id="sidebar">
    <div class="sidebar-brand">
        <div class="brand-icon"><i class="fa fa-graduation-cap"></i></div>
        <div class="brand-text">
            <div class="brand-title">BK SMKN 1</div>
            <div class="brand-sub">Bimbingan &amp; Konseling</div>
        </div>
    </div>

    <!-- ── MENU UTAMA ── -->
    <div class="sidebar-section">
        <div class="sidebar-section-label">Menu Utama</div>
        <a class="nav-item <?= (uri_string()==''||uri_string()=='dashboard')?'active':'' ?>"
           href="<?= base_url('/') ?>">
            <i class="fa fa-chart-pie"></i> Dashboard
        </a>
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
        <button class="navbar-hamburger" onclick="toggleSidebar()">
            <i class="fa fa-bars"></i>
        </button>
        <div class="navbar-search">
            <i class="fa fa-magnifying-glass"></i>
            <input type="text" placeholder="Cari siswa, pelanggaran...">
        </div>
        <div class="navbar-actions">
            <button class="nav-action-btn" title="Notifikasi">
                <i class="fa fa-bell"></i>
                <span class="notif-dot"></span>
            </button>
            <button class="nav-action-btn" title="Pesan">
                <i class="fa fa-envelope"></i>
            </button>
            <button class="nav-action-btn" title="Laporan">
                <i class="fa fa-file-arrow-down"></i>
            </button>
            <button class="nav-action-btn" title="Fullscreen" onclick="toggleFS()">
                <i class="fa fa-expand" id="fsIcon"></i>
            </button>
        </div>
        <div class="navbar-date">
            <span class="date-main" id="dateLive">—</span>
            <span class="date-sub" id="timeLive">—</span>
        </div>
    </nav>

    <!-- PAGE CONTENT -->
    <div class="page-content">

        <!-- Header -->
        <div class="page-header">
            <div class="page-header-left">
                <h1>Data Siswa</h1>
                <p>Kelola seluruh data siswa SMA Karya Sekadau Bimbingan Konseling</p>
            </div>
            <div class="page-header-right">
                <button class="btn-outline"><i class="fa fa-file-export"></i> Export</button>
                <button class="btn-outline"><i class="fa fa-file-import"></i> Import</button>
                <button class="btn-primary" onclick="openModal()"><i class="fa fa-plus"></i> Tambah Siswa</button>
            </div>
        </div>

        <!-- Stat Cards -->
        <div class="stats-grid">
            <div class="stat-card blue">
                <div class="stat-ico"><i class="fa fa-users"></i></div>
                <div class="stat-info">
                    <div class="stat-num"><?= $total_siswa ?? 842 ?></div>
                    <div class="stat-lbl">Total Siswa</div>
                </div>
            </div>
            <div class="stat-card green">
                <div class="stat-ico"><i class="fa fa-user-check"></i></div>
                <div class="stat-info">
                    <div class="stat-num"><?= $siswa_aktif ?? 825 ?></div>
                    <div class="stat-lbl">Siswa Aktif</div>
                </div>
            </div>
            <div class="stat-card yellow">
                <div class="stat-ico"><i class="fa fa-triangle-exclamation"></i></div>
                <div class="stat-info">
                    <div class="stat-num"><?= $siswa_bermasalah ?? 34 ?></div>
                    <div class="stat-lbl">Punya Pelanggaran</div>
                </div>
            </div>
            <div class="stat-card purple">
                <div class="stat-ico"><i class="fa fa-user-graduate"></i></div>
                <div class="stat-info">
                    <div class="stat-num"><?= $siswa_baru ?? 280 ?></div>
                    <div class="stat-lbl">Siswa Kelas X (Baru)</div>
                </div>
            </div>
        </div>

        <!-- Filter Bar -->
        <div class="filter-bar">
            <div class="filter-search">
                <i class="fa fa-magnifying-glass"></i>
                <input type="text" id="searchInput" placeholder="Cari nama, NISN, kelas..." oninput="filterSiswa()">
            </div>
            <select class="filter-select" id="filterKelas" onchange="filterSiswa()">
                <option value="">Semua Kelas</option>
                <option value="X">Kelas X</option>
                <option value="XI">Kelas XI</option>
                <option value="XII">Kelas XII</option>
            </select>
            <select class="filter-select" id="filterJurusan" onchange="filterSiswa()">
                <option value="">Semua Jurusan</option>
                <option value="TKJ">TKJ</option>
                <option value="RPL">RPL</option>
                <option value="MM">MM</option>
                <option value="AKL">AKL</option>
                <option value="TSM">TSM</option>
                <option value="AP">AP</option>
            </select>
            <select class="filter-select" id="filterStatus" onchange="filterSiswa()">
                <option value="">Semua Status</option>
                <option value="bermasalah">Ada Pelanggaran</option>
                <option value="bersih">Tanpa Pelanggaran</option>
            </select>
            <div class="filter-divider"></div>
            <div class="view-toggle">
                <button class="view-btn active" id="btnGrid" onclick="switchView('grid')" title="Tampilan Kartu">
                    <i class="fa fa-grip"></i>
                </button>
                <button class="view-btn" id="btnTable" onclick="switchView('table')" title="Tampilan Tabel">
                    <i class="fa fa-list"></i>
                </button>
            </div>
        </div>

        <!-- CARD GRID VIEW -->
        <div class="siswa-grid-wrap" id="gridView">
            <div class="siswa-grid" id="siswaGrid">
                <!-- Render by JS -->
            </div>
            <div class="pagination-bar">
                <span id="paginasiInfo">Menampilkan 1–12 dari 842 siswa</span>
                <div class="pagination-btns">
                    <button class="pg-btn">«</button>
                    <button class="pg-btn active">1</button>
                    <button class="pg-btn">2</button>
                    <button class="pg-btn">3</button>
                    <button class="pg-btn">...</button>
                    <button class="pg-btn">71</button>
                    <button class="pg-btn">»</button>
                </div>
            </div>
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
                            <th>Jurusan</th>
                            <th>JK</th>
                            <th>No. HP Ortu</th>
                            <th>Poin Pelanggaran</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody id="tableBodySiswa">
                        <!-- Render by JS -->
                    </tbody>
                </table>
            </div>
            <div class="pagination-bar">
                <span>Menampilkan 1–20 dari 842 siswa</span>
                <div class="pagination-btns">
                    <button class="pg-btn">«</button>
                    <button class="pg-btn active">1</button>
                    <button class="pg-btn">2</button>
                    <button class="pg-btn">3</button>
                    <button class="pg-btn">»</button>
                </div>
            </div>
        </div>

    </div>
</div>

<script>
// ── LIVE CLOCK ──
function updateClock() {
    const d = new Date();
    const days   = ['Minggu','Senin','Selasa','Rabu','Kamis','Jumat','Sabtu'];
    const months = ['Jan','Feb','Mar','Apr','Mei','Jun','Jul','Ags','Sep','Okt','Nov','Des'];
    document.getElementById('dateLive').textContent =
        days[d.getDay()] + ', ' + d.getDate() + ' ' + months[d.getMonth()] + ' ' + d.getFullYear();
    document.getElementById('timeLive').textContent =
        d.getHours().toString().padStart(2,'0') + ':' +
        d.getMinutes().toString().padStart(2,'0') + ':' +
        d.getSeconds().toString().padStart(2,'0') + ' WIB';
}
setInterval(updateClock, 1000);
updateClock();

// ── SIDEBAR ──
function toggleSidebar() {
    document.getElementById('sidebar').classList.toggle('open');
    document.getElementById('overlay').classList.toggle('show');
}
function closeSidebar() {
    document.getElementById('sidebar').classList.remove('open');
    document.getElementById('overlay').classList.remove('show');
}

// ── FULLSCREEN ──
function toggleFS() {
    if (!document.fullscreenElement) {
        document.documentElement.requestFullscreen();
        document.getElementById('fsIcon').className = 'fa fa-compress';
    } else {
        document.exitFullscreen();
        document.getElementById('fsIcon').className = 'fa fa-expand';
    }
}

// ── MODAL ──
function openModal()  { document.getElementById('modalTambah').classList.add('show'); }
function closeModal() { document.getElementById('modalTambah').classList.remove('show'); }
document.getElementById('modalTambah').addEventListener('click', function(e) {
    if (e.target === this) closeModal();
});

// ── VIEW TOGGLE ──
function switchView(v) {
    const grid  = document.getElementById('gridView');
    const table = document.getElementById('tableView');
    const btnG  = document.getElementById('btnGrid');
    const btnT  = document.getElementById('btnTable');
    if (v === 'grid') {
        grid.classList.remove('hide');
        table.classList.remove('show');
        btnG.classList.add('active');
        btnT.classList.remove('active');
    } else {
        grid.classList.add('hide');
        table.classList.add('show');
        btnT.classList.add('active');
        btnG.classList.remove('active');
        renderTable(filteredData);
    }
}

// ── DATA SISWA ──
const avatarColors = [
    '#1a56db','#ef4444','#f59e0b','#10b981',
    '#8b5cf6','#ec4899','#06b6d4','#f97316'
];

const siswaDummyData = [
    {no:1,  nama:'Aldi Firmansyah',   nisn:'0041230001',kelas:'XI RPL 2', jurusan:'RPL',jk:'L',hp:'081234567801',poin:85, inisial:'AF',color:avatarColors[0]},
    {no:2,  nama:'Putri Ayu Lestari', nisn:'0041230002',kelas:'X TKJ 1',  jurusan:'TKJ',jk:'P',hp:'081234567802',poin:45, inisial:'PA',color:avatarColors[1]},
    {no:3,  nama:'Rafi Hidayat',      nisn:'0041230003',kelas:'XII MM',   jurusan:'MM', jk:'L',hp:'081234567803',poin:70, inisial:'RH',color:avatarColors[2]},
    {no:4,  nama:'Sinta Wulandari',   nisn:'0041230004',kelas:'X AKL',    jurusan:'AKL',jk:'P',hp:'081234567804',poin:10, inisial:'SW',color:avatarColors[3]},
    {no:5,  nama:'Bima Saputra',      nisn:'0041230005',kelas:'XI TSM 3', jurusan:'TSM',jk:'L',hp:'081234567805',poin:35, inisial:'BS',color:avatarColors[4]},
    {no:6,  nama:'Nadia Pratiwi',     nisn:'0041230006',kelas:'XII AP 1', jurusan:'AP', jk:'P',hp:'081234567806',poin:0,  inisial:'NP',color:avatarColors[5]},
    {no:7,  nama:'Dandi Firmawan',    nisn:'0041230007',kelas:'XI TKJ 2', jurusan:'TKJ',jk:'L',hp:'081234567807',poin:25, inisial:'DF',color:avatarColors[6]},
    {no:8,  nama:'Mega Rahayu',       nisn:'0041230008',kelas:'X MM 1',   jurusan:'MM', jk:'P',hp:'081234567808',poin:15, inisial:'MR',color:avatarColors[7]},
    {no:9,  nama:'Kevin Prasetyo',    nisn:'0041230009',kelas:'XII RPL 1',jurusan:'RPL',jk:'L',hp:'081234567809',poin:90, inisial:'KP',color:avatarColors[0]},
    {no:10, nama:'Ayu Cahyani',       nisn:'0041230010',kelas:'XI AKL 2', jurusan:'AKL',jk:'P',hp:'081234567810',poin:50, inisial:'AC',color:avatarColors[1]},
    {no:11, nama:'Rizal Maulana',     nisn:'0041230011',kelas:'X TSM 1',  jurusan:'TSM',jk:'L',hp:'081234567811',poin:30, inisial:'RM',color:avatarColors[2]},
    {no:12, nama:'Tari Indah',        nisn:'0041230012',kelas:'XI MM 2',  jurusan:'MM', jk:'P',hp:'081234567812',poin:10, inisial:'TI',color:avatarColors[3]},
];

let filteredData = [...siswaDummyData];

function getPoinClass(p) {
    if (p >= 75) return 'danger';
    if (p >= 40) return 'warn';
    return 'safe';
}

function getPoinColor(p) {
    if (p >= 75) return '#ef4444';
    if (p >= 40) return '#f59e0b';
    return '#10b981';
}

function getPoinLabel(p) {
    if (p === 0)  return 'Bersih';
    if (p >= 75)  return 'Kritis';
    if (p >= 40)  return 'Sedang';
    return 'Ringan';
}

// ── RENDER GRID ──
function renderGrid(data) {
    const grid = document.getElementById('siswaGrid');
    if (!data.length) {
        grid.innerHTML = `<div class="empty-state" style="grid-column:1/-1">
            <i class="fa fa-users-slash"></i>
            <p>Tidak ada data siswa ditemukan</p>
        </div>`;
        return;
    }
    grid.innerHTML = data.map((s, i) => `
        <div class="siswa-card" style="animation-delay:${i * 0.04}s">
            <div class="siswa-card-top">
                ${s.poin >= 75 ? `<span class="rank-badge" style="background:#fee2e2;color:#dc2626">⚠ Kritis</span>` :
                  s.poin >= 40 ? `<span class="rank-badge" style="background:#fef3c7;color:#b45309">⚡ Sedang</span>` :
                  s.poin > 0   ? `<span class="rank-badge" style="background:#dbeafe;color:#1d4ed8">✓ Ringan</span>` :
                                 `<span class="rank-badge" style="background:#d1fae5;color:#065f46">✓ Bersih</span>`}
                <div class="siswa-avatar-lg" style="background:${s.color}">${s.inisial}</div>
                <div class="siswa-card-name">${s.nama}</div>
                <div class="siswa-card-nisn">NISN: ${s.nisn}</div>
            </div>
            <div class="siswa-card-body">
                <div class="siswa-card-info">
                    <div class="siswa-info-row"><i class="fa fa-school"></i> ${s.kelas}</div>
                    <div class="siswa-info-row"><i class="fa fa-book"></i> Jurusan ${s.jurusan}</div>
                    <div class="siswa-info-row"><i class="fa fa-venus-mars"></i> ${s.jk === 'L' ? 'Laki-laki' : 'Perempuan'}</div>
                    <div class="siswa-info-row"><i class="fa fa-phone"></i> ${s.hp}</div>
                </div>
            </div>
            <div class="siswa-card-footer">
                <div class="pelanggaran-count ${getPoinClass(s.poin)}">
                    <i class="fa fa-triangle-exclamation" style="font-size:11px"></i>
                    ${s.poin} poin — ${getPoinLabel(s.poin)}
                </div>
                <div class="card-actions-row">
                    <button class="btn-icon view" title="Lihat Detail"><i class="fa fa-eye"></i></button>
                    <button class="btn-icon edit" title="Edit"><i class="fa fa-pen"></i></button>
                    <button class="btn-icon del"  title="Hapus"><i class="fa fa-trash"></i></button>
                </div>
            </div>
        </div>
    `).join('');
}

// ── RENDER TABLE ──
function renderTable(data) {
    const tbody = document.getElementById('tableBodySiswa');
    if (!data.length) {
        tbody.innerHTML = `<tr><td colspan="8" style="text-align:center;padding:40px;color:var(--gray-400)">Tidak ada data siswa</td></tr>`;
        return;
    }
    const jurusanClass = { TKJ:'tkj', RPL:'rpl', MM:'mm', AKL:'akl', TSM:'tsm', AP:'ap' };
    tbody.innerHTML = data.map(s => `
        <tr>
            <td style="color:var(--gray-400);font-weight:500">${s.no}</td>
            <td>
                <div class="td-student">
                    <div class="td-avatar" style="background:${s.color}">${s.inisial}</div>
                    <div>
                        <div class="td-name">${s.nama}</div>
                        <div class="td-nisn">NISN: ${s.nisn}</div>
                    </div>
                </div>
            </td>
            <td><strong>${s.kelas}</strong></td>
            <td><span class="badge ${jurusanClass[s.jurusan] || ''}">${s.jurusan}</span></td>
            <td><span class="badge ${s.jk === 'L' ? 'laki' : 'perempuan'}">${s.jk === 'L' ? 'L' : 'P'}</span></td>
            <td style="color:var(--gray-600)">${s.hp}</td>
            <td>
                <div class="poin-bar-wrap">
                    <div class="poin-bar">
                        <div class="poin-bar-fill" style="width:${Math.min(s.poin,100)}%;background:${getPoinColor(s.poin)}"></div>
                    </div>
                    <span class="poin-num ${getPoinClass(s.poin)}">${s.poin}</span>
                </div>
            </td>
            <td>
                <div class="action-btns">
                    <button class="btn-icon view" title="Lihat"><i class="fa fa-eye"></i></button>
                    <button class="btn-icon edit" title="Edit"><i class="fa fa-pen"></i></button>
                    <button class="btn-icon del"  title="Hapus"><i class="fa fa-trash"></i></button>
                </div>
            </td>
        </tr>
    `).join('');
}

// ── FILTER ──
function filterSiswa() {
    const q       = document.getElementById('searchInput').value.toLowerCase();
    const kelas   = document.getElementById('filterKelas').value;
    const jurusan = document.getElementById('filterJurusan').value;
    const status  = document.getElementById('filterStatus').value;

    filteredData = siswaDummyData.filter(s => {
        const matchQ  = !q || s.nama.toLowerCase().includes(q) || s.nisn.includes(q) || s.kelas.toLowerCase().includes(q);
        const matchK  = !kelas   || s.kelas.startsWith(kelas);
        const matchJ  = !jurusan || s.jurusan === jurusan;
        const matchS  = !status  ||
                        (status === 'bermasalah' && s.poin > 0) ||
                        (status === 'bersih'     && s.poin === 0);
        return matchQ && matchK && matchJ && matchS;
    });

    renderGrid(filteredData);
    if (document.getElementById('tableView').classList.contains('show')) {
        renderTable(filteredData);
    }
}

// ── INIT ──
renderGrid(siswaDummyData);
</script>

</body>
</html>