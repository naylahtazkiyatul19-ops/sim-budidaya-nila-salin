<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'SIM Budidaya Nila Salin')</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    
    <style>
        :root {
            --bg-primary: #0a0e1a;
            --bg-secondary: #111827;
            --bg-card: #1a2236;
            --text-primary: #e2e8f0;
            --text-secondary: #94a3b8;
            --border-color: #2d3748;
            --cyan-primary: #00d4ff;
            --cyan-secondary: #0891b2;
            --cyan-glow: rgba(0, 212, 255, 0.15);
        }

        * { margin: 0; padding: 0; box-sizing: border-box; }
        
        body {
            font-family: 'Inter', 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: var(--bg-primary);
            color: var(--text-primary);
            min-height: 100vh;
        }

        /* Sidebar */
        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            width: 270px;
            height: 100vh;
            background: var(--bg-secondary);
            border-right: 1px solid var(--border-color);
            padding: 20px 0;
            overflow-y: auto;
            z-index: 1050;
            transition: transform 0.3s ease;
        }

        .sidebar .brand {
            text-align: center;
            padding: 15px 20px 25px;
            border-bottom: 1px solid var(--border-color);
            margin-bottom: 15px;
        }

        .sidebar .brand h4 {
            color: var(--cyan-primary);
            font-weight: 700;
            font-size: 16px;
            margin-bottom: 3px;
            text-shadow: 0 0 20px var(--cyan-glow);
        }

        .sidebar .brand small {
            color: var(--text-secondary);
            font-size: 11px;
        }

        .sidebar .nav-section {
            padding: 8px 24px;
            font-size: 11px;
            text-transform: uppercase;
            color: #64748b;
            letter-spacing: 1.5px;
            font-weight: 600;
            margin-top: 10px;
        }

        .sidebar .nav-link {
            display: flex;
            align-items: center;
            padding: 10px 24px;
            color: var(--text-secondary);
            text-decoration: none;
            font-size: 14px;
            transition: all 0.2s ease;
            border-left: 3px solid transparent;
            margin: 2px 8px;
            border-radius: 8px;
        }

        .sidebar .nav-link:hover {
            background: var(--bg-card);
            color: var(--text-primary);
            border-left-color: var(--cyan-primary);
            transform: translateX(4px);
        }

        .sidebar .nav-link.active {
            background: var(--bg-card);
            color: var(--cyan-primary);
            border-left-color: var(--cyan-primary);
            box-shadow: 0 0 20px var(--cyan-glow);
        }

        .sidebar .nav-link i {
            width: 24px;
            font-size: 16px;
            margin-right: 12px;
            text-align: center;
        }

        /* Main Content */
        .main-content {
            margin-left: 270px;
            padding: 25px 30px;
            min-height: 100vh;
            background: var(--bg-primary);
        }

        /* Cards */
        .card {
            background: var(--bg-card);
            border: 1px solid var(--border-color);
            border-radius: 16px;
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.3);
            transition: all 0.3s ease;
            overflow: hidden;
        }

        .card:hover {
            border-color: var(--cyan-primary);
            box-shadow: 0 0 30px var(--cyan-glow);
        }

        .card-header {
            background: transparent;
            border-bottom: 1px solid var(--border-color);
            padding: 16px 20px;
            font-weight: 600;
            color: var(--text-primary);
        }

        .card-body {
            padding: 20px;
        }

        .card-footer {
            background: transparent;
            border-top: 1px solid var(--border-color);
            padding: 12px 20px;
        }

        /* Tables */
        .table {
            color: var(--text-primary) !important;
        }
        .table thead th {
            background: rgba(0,0,0,0.2);
            color: var(--text-secondary);
            font-weight: 600;
            font-size: 12px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            border-color: var(--border-color);
            padding: 12px 15px;
        }
        .table tbody td {
            padding: 12px 15px;
            border-color: var(--border-color);
            vertical-align: middle;
            color: var(--text-primary) !important;
        }
        .table tbody tr:hover {
            background: rgba(0,212,255,0.02);
        }

        /* Stat Cards */
        .stat-card {
            background: var(--bg-card);
            border: 1px solid var(--border-color);
            border-radius: 16px;
            padding: 20px;
            transition: all 0.3s ease;
        }

        .stat-card:hover {
            border-color: var(--cyan-primary);
            transform: translateY(-4px);
            box-shadow: 0 8px 40px var(--cyan-glow);
        }

        .stat-card .stat-icon {
            width: 50px;
            height: 50px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
        }

        .stat-card .stat-number {
            font-size: 28px;
            font-weight: 700;
            color: var(--text-primary);
        }

        .stat-card .stat-label {
            color: var(--text-secondary);
            font-size: 14px;
        }

        /* Buttons */
        .btn-cyan {
            background: linear-gradient(135deg, #00d4ff, #0891b2);
            color: #0a0e1a;
            font-weight: 600;
            border: none;
            border-radius: 10px;
            padding: 10px 24px;
            transition: all 0.3s;
        }
        .btn-cyan:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 30px rgba(0,212,255,0.3);
            color: #0a0e1a;
        }
        .btn-outline-cyan {
            background: transparent;
            color: #00d4ff;
            border: 2px solid #00d4ff;
            border-radius: 8px;
            padding: 6px 14px;
            font-size: 13px;
            transition: all 0.3s;
        }
        .btn-outline-cyan:hover {
            background: #00d4ff;
            color: #0a0e1a;
        }
        .btn-warning {
            background: rgba(251,191,36,0.15);
            border: 1px solid rgba(251,191,36,0.2);
            color: #fbbf24;
        }
        .btn-warning:hover {
            background: rgba(251,191,36,0.25);
            color: #fbbf24;
        }
        .btn-danger {
            background: rgba(239,68,68,0.15);
            border: 1px solid rgba(239,68,68,0.2);
            color: #f87171;
        }
        .btn-danger:hover {
            background: rgba(239,68,68,0.25);
            color: #f87171;
        }
        .btn-secondary {
            background: rgba(255,255,255,0.05);
            border: 1px solid rgba(255,255,255,0.1);
            color: #94a3b8;
            border-radius: 10px;
            padding: 10px 24px;
            transition: all 0.3s;
        }
        .btn-secondary:hover {
            background: rgba(255,255,255,0.1);
            color: #e2e8f0;
        }
        .btn-sm { padding: 5px 12px; font-size: 13px; border-radius: 6px; }

        /* Badges */
        .badge-success {
            background: rgba(16,185,129,0.15);
            color: #34d399;
            padding: 5px 12px;
            border-radius: 20px;
            font-weight: 500;
        }
        .badge-danger {
            background: rgba(239,68,68,0.15);
            color: #f87171;
            padding: 5px 12px;
            border-radius: 20px;
            font-weight: 500;
        }
        .badge-warning {
            background: rgba(251,191,36,0.15);
            color: #fbbf24;
            padding: 5px 12px;
            border-radius: 20px;
            font-weight: 500;
        }
        .badge-secondary {
            background: rgba(255,255,255,0.05);
            color: #94a3b8;
            padding: 5px 12px;
            border-radius: 20px;
            font-weight: 500;
        }

        /* Alerts */
        .alert-success {
            background: rgba(16,185,129,0.15);
            border: 1px solid rgba(16,185,129,0.2);
            color: #34d399;
            border-radius: 10px;
            padding: 12px 16px;
        }
        .alert-danger {
            background: rgba(239,68,68,0.15);
            border: 1px solid rgba(239,68,68,0.2);
            color: #f87171;
            border-radius: 10px;
            padding: 12px 16px;
        }
        .alert-info {
            background: rgba(0,212,255,0.05);
            border: 1px solid rgba(0,212,255,0.1);
            color: #94a3b8;
            border-radius: 10px;
            padding: 12px 16px;
        }

        /* Text Colors */
        .text-cyan { color: #00d4ff; }
        .text-light { color: #e2e8f0 !important; }
        .text-secondary { color: #94a3b8 !important; }
        .text-muted { color: #64748b !important; }

        /* Forms */
        .form-control {
            background: rgba(10,14,26,0.6);
            border: 1px solid rgba(0,212,255,0.08);
            color: #e2e8f0;
            border-radius: 10px;
            padding: 12px 16px;
            font-size: 15px;
        }
        .form-control:focus {
            background: rgba(10,14,26,0.8);
            border-color: #00d4ff;
            box-shadow: 0 0 30px rgba(0,212,255,0.05);
            color: #e2e8f0;
        }
        .form-control::placeholder { color: #475569; }
        .form-label { color: #94a3b8; font-weight: 500; font-size: 14px; }

        /* Pagination */
        .pagination .page-link {
            background: transparent;
            border-color: rgba(0,212,255,0.05);
            color: #94a3b8;
        }
        .pagination .page-link:hover {
            background: rgba(0,212,255,0.05);
            color: #00d4ff;
        }
        .pagination .page-item.active .page-link {
            background: #00d4ff;
            border-color: #00d4ff;
            color: #0a0e1a;
        }

        /* Responsive */
        @media (max-width: 991px) {
            .sidebar {
                transform: translateX(-100%);
            }
            .sidebar.show {
                transform: translateX(0);
            }
            .main-content {
                margin-left: 0;
                padding: 15px;
            }
        }

        /* Print */
        @media print {
            .sidebar { display: none !important; }
            .main-content { margin-left: 0 !important; padding: 20px !important; }
            .btn, .btn-cyan, .btn-outline-cyan { display: none !important; }
            .card { border: 1px solid #2d3748 !important; }
            .card-header { background: #111827 !important; color: white !important; }
            .table { color: black !important; }
            .table th { background: #1a2236 !important; color: white !important; }
            body { background: white !important; color: black !important; }
        }
    </style>
    @stack('styles')
</head>
<body>
    <!-- Sidebar -->
    @include('layouts.sidebar')
    
    <!-- Main Content -->
    <div class="main-content" id="mainContent">
        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    @stack('scripts')
</body>
</html>