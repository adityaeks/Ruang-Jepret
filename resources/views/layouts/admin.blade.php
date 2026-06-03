<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Dashboard - RuangJepret')</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        * { font-family: 'Inter', sans-serif; }

        /* ── Sidebar ── */
        .admin-sidebar {
            width: 272px;
            background: linear-gradient(180deg, #0a0a0a 0%, #111113 50%, #0d0d10 100%);
            display: flex;
            flex-direction: column;
            position: relative;
            overflow: hidden;
            flex-shrink: 0;
        }
        .admin-sidebar::before {
            content: '';
            position: absolute;
            top: 0; left: 0; right: 0;
            height: 200px;
            background: radial-gradient(ellipse at 30% 0%, rgba(124,58,237,0.08) 0%, transparent 70%);
            pointer-events: none;
        }
        .admin-sidebar::after {
            content: '';
            position: absolute;
            bottom: 0; left: 0; right: 0;
            height: 150px;
            background: radial-gradient(ellipse at 70% 100%, rgba(37,99,235,0.06) 0%, transparent 70%);
            pointer-events: none;
        }

        /* Brand */
        .sidebar-brand {
            padding: 28px 24px 24px;
            position: relative;
            z-index: 1;
        }
        .sidebar-brand-logo {
            display: flex;
            align-items: center;
            gap: 12px;
        }
        .sidebar-brand-icon {
            width: 42px; height: 42px;
            border-radius: 12px;
            background: linear-gradient(135deg, #7c3aed, #2563eb);
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 4px 16px rgba(124,58,237,0.3);
        }
        .sidebar-brand-text h1 {
            font-size: 1.2rem;
            font-weight: 800;
            color: #fff;
            letter-spacing: -0.02em;
            line-height: 1.2;
        }
        .sidebar-brand-text span {
            font-size: 0.6rem;
            font-weight: 700;
            color: rgba(255,255,255,0.35);
            letter-spacing: 0.15em;
            text-transform: uppercase;
        }
        .sidebar-divider {
            height: 1px;
            margin: 0 20px;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.08), transparent);
        }

        /* Nav section */
        .sidebar-nav {
            flex: 1;
            padding: 20px 16px;
            position: relative;
            z-index: 1;
            overflow-y: auto;
        }
        .sidebar-nav-label {
            font-size: 0.6rem;
            font-weight: 700;
            color: rgba(255,255,255,0.25);
            letter-spacing: 0.14em;
            text-transform: uppercase;
            padding: 0 12px;
            margin-bottom: 10px;
        }
        .sidebar-nav-group {
            margin-bottom: 24px;
        }

        /* Nav item */
        .nav-item {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 11px 14px;
            border-radius: 12px;
            color: rgba(255,255,255,0.45);
            text-decoration: none;
            font-size: 0.875rem;
            font-weight: 500;
            transition: all 0.25s cubic-bezier(.4,0,.2,1);
            position: relative;
            margin-bottom: 4px;
        }
        .nav-item:hover {
            color: rgba(255,255,255,0.85);
            background: rgba(255,255,255,0.05);
        }
        .nav-item.active {
            color: #fff;
            background: rgba(255,255,255,0.08);
            font-weight: 600;
        }
        .nav-item.active::before {
            content: '';
            position: absolute;
            left: 0; top: 50%;
            transform: translateY(-50%);
            width: 3px;
            height: 20px;
            border-radius: 0 4px 4px 0;
            background: linear-gradient(180deg, #7c3aed, #2563eb);
            box-shadow: 0 0 12px rgba(124,58,237,0.5);
        }
        .nav-item-icon {
            width: 36px; height: 36px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: rgba(255,255,255,0.04);
            transition: all 0.25s;
            flex-shrink: 0;
        }
        .nav-item:hover .nav-item-icon {
            background: rgba(255,255,255,0.08);
        }
        .nav-item.active .nav-item-icon {
            background: linear-gradient(135deg, rgba(124,58,237,0.2), rgba(37,99,235,0.15));
        }
        .nav-item-icon svg {
            width: 18px; height: 18px;
        }
        .nav-item-badge {
            margin-left: auto;
            font-size: 0.65rem;
            font-weight: 700;
            padding: 2px 8px;
            border-radius: 999px;
            background: rgba(124,58,237,0.15);
            color: #a78bfa;
        }

        /* Footer */
        .sidebar-footer {
            padding: 16px;
            position: relative;
            z-index: 1;
        }
        .sidebar-user-card {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 12px 14px;
            border-radius: 14px;
            background: rgba(255,255,255,0.04);
            border: 1px solid rgba(255,255,255,0.06);
            margin-bottom: 12px;
        }
        .sidebar-user-avatar {
            width: 36px; height: 36px;
            border-radius: 10px;
            background: linear-gradient(135deg, #1e1b4b, #312e81);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.8rem;
            font-weight: 700;
            color: #a78bfa;
            flex-shrink: 0;
        }
        .sidebar-user-info {
            overflow: hidden;
        }
        .sidebar-user-name {
            font-size: 0.8rem;
            font-weight: 600;
            color: rgba(255,255,255,0.85);
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }
        .sidebar-user-role {
            font-size: 0.65rem;
            color: rgba(255,255,255,0.3);
            font-weight: 500;
        }

        .logout-btn {
            display: flex;
            width: 100%;
            align-items: center;
            gap: 10px;
            padding: 10px 14px;
            border-radius: 12px;
            border: none;
            background: transparent;
            color: rgba(255,255,255,0.3);
            font-size: 0.8rem;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.25s;
        }
        .logout-btn:hover {
            background: rgba(239,68,68,0.08);
            color: #f87171;
        }
        .logout-btn svg {
            width: 18px; height: 18px;
        }

        /* ── Dark Mode Variables ── */
        :root {
            --bg-main: #f8f9fb;
            --bg-card: #ffffff;
            --bg-topbar: rgba(255,255,255,0.8);
            --border-color: rgba(0,0,0,0.06);
            --border-hover: rgba(0,0,0,0.12);
            --text-primary: #111;
            --text-secondary: #555;
            --text-muted: #888;
            --text-faint: #aaa;
            --shadow-card: 0 1px 3px rgba(0,0,0,0.04);
            --shadow-card-hover: 0 20px 40px -12px rgba(0,0,0,0.1);
            --bg-badge: #f3f4f6;
            --success-bg: linear-gradient(135deg, #ecfdf5, #f0fdf4);
            --success-border: #a7f3d0;
        }
        [data-theme="dark"] {
            --bg-main: #111114;
            --bg-card: #1a1a1f;
            --bg-topbar: rgba(17,17,20,0.85);
            --border-color: rgba(255,255,255,0.06);
            --border-hover: rgba(255,255,255,0.12);
            --text-primary: #f0f0f2;
            --text-secondary: #a0a0a8;
            --text-muted: #6b6b75;
            --text-faint: #4a4a52;
            --shadow-card: 0 1px 3px rgba(0,0,0,0.2);
            --shadow-card-hover: 0 20px 40px -12px rgba(0,0,0,0.4);
            --bg-badge: rgba(255,255,255,0.06);
            --success-bg: linear-gradient(135deg, #052e16, #064e3b);
            --success-border: #065f46;
        }

        /* ── Main Content ── */
        .admin-main {
            flex: 1;
            overflow-y: auto;
            background: var(--bg-main);
            position: relative;
            transition: background 0.3s;
        }
        .admin-topbar {
            padding: 20px 32px;
            background: var(--bg-topbar);
            backdrop-filter: blur(12px);
            border-bottom: 1px solid var(--border-color);
            display: flex;
            align-items: center;
            justify-content: space-between;
            position: sticky;
            top: 0;
            z-index: 30;
            transition: background 0.3s, border-color 0.3s;
        }
        .admin-topbar-title {
            font-size: 0.8rem;
            font-weight: 600;
            color: var(--text-muted);
        }
        .admin-topbar-actions {
            display: flex;
            align-items: center;
            gap: 8px;
        }
        .topbar-btn {
            width: 38px; height: 38px;
            border-radius: 10px;
            border: 1px solid var(--border-color);
            background: var(--bg-card);
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.2s;
            color: var(--text-muted);
        }
        .topbar-btn:hover {
            border-color: var(--border-hover);
            color: var(--text-primary);
            box-shadow: 0 2px 8px rgba(0,0,0,0.06);
        }
        .admin-content-area {
            padding: 32px;
        }

        /* Theme toggle */
        .theme-toggle {
            width: 38px; height: 38px;
            border-radius: 10px;
            border: 1px solid var(--border-color);
            background: var(--bg-card);
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.3s;
            color: var(--text-muted);
            position: relative;
            overflow: hidden;
        }
        .theme-toggle:hover {
            border-color: var(--border-hover);
            color: var(--text-primary);
            box-shadow: 0 2px 8px rgba(0,0,0,0.06);
        }
        .theme-toggle .icon-sun,
        .theme-toggle .icon-moon {
            position: absolute;
            transition: all 0.4s cubic-bezier(.4,0,.2,1);
        }
        .theme-toggle .icon-sun {
            opacity: 1; transform: rotate(0deg) scale(1);
        }
        .theme-toggle .icon-moon {
            opacity: 0; transform: rotate(-90deg) scale(0.5);
        }
        [data-theme="dark"] .theme-toggle .icon-sun {
            opacity: 0; transform: rotate(90deg) scale(0.5);
        }
        [data-theme="dark"] .theme-toggle .icon-moon {
            opacity: 1; transform: rotate(0deg) scale(1);
        }

        /* Success toast */
        .success-toast {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 16px 20px;
            background: linear-gradient(135deg, #ecfdf5, #f0fdf4);
            border: 1px solid #a7f3d0;
            border-radius: 14px;
            margin-bottom: 24px;
            animation: slideDown 0.4s ease-out;
        }
        .success-toast-icon {
            width: 32px; height: 32px;
            border-radius: 8px;
            background: #059669;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }
        @keyframes slideDown {
            from { opacity: 0; transform: translateY(-8px); }
            to { opacity: 1; transform: translateY(0); }
        }

        /* Mobile toggle */
        .mobile-toggle {
            display: none;
            position: fixed;
            bottom: 24px;
            right: 24px;
            z-index: 50;
            width: 52px; height: 52px;
            border-radius: 16px;
            background: linear-gradient(135deg, #0a0a0a, #1a1a2e);
            border: none;
            color: white;
            cursor: pointer;
            box-shadow: 0 8px 24px rgba(0,0,0,0.3);
        }
        @media (max-width: 768px) {
            .admin-sidebar {
                position: fixed;
                left: -280px;
                top: 0; bottom: 0;
                z-index: 50;
                transition: left 0.35s cubic-bezier(.4,0,.2,1);
            }
            .admin-sidebar.open { left: 0; }
            .mobile-toggle { display: flex; align-items: center; justify-content: center; }
            .sidebar-backdrop {
                position: fixed; inset: 0; background: rgba(0,0,0,0.5);
                z-index: 40; display: none;
            }
            .sidebar-backdrop.open { display: block; }
            .admin-content-area { padding: 20px; }
            .admin-topbar { padding: 16px 20px; }
        }
    </style>
</head>
<body class="antialiased" style="margin:0; background:var(--bg-main);">
    <script>
        // Apply saved theme BEFORE render to prevent flash
        (function(){
            var t = localStorage.getItem('admin-theme');
            if(t === 'dark') document.documentElement.setAttribute('data-theme','dark');
        })();
    </script>
    @auth
        <div class="flex h-screen overflow-hidden">
            <!-- Mobile backdrop -->
            <div class="sidebar-backdrop" id="sidebarBackdrop" onclick="toggleSidebar()"></div>

            <!-- Sidebar Component -->
            <x-admin-sidebar />

            <!-- Main Content -->
            <div class="admin-main">
                <!-- Topbar Component -->
                <x-admin-topbar />

                <!-- Content Area -->
                <div class="admin-content-area">
                    @if(session('success'))
                        <div class="success-toast">
                            <div class="success-toast-icon">
                                <svg width="16" height="16" fill="none" stroke="white" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>
                            </div>
                            <div>
                                <div style="font-size:0.875rem; font-weight:600; color:#065f46;">Berhasil!</div>
                                <div style="font-size:0.8rem; color:#047857;">{{ session('success') }}</div>
                            </div>
                        </div>
                    @endif
                    @yield('content')
                </div>
            </div>
        </div>

        <!-- Mobile Toggle -->
        <button class="mobile-toggle" onclick="toggleSidebar()">
            <svg width="22" height="22" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
        </button>

        <script>
        function toggleSidebar() {
            document.getElementById('adminSidebar').classList.toggle('open');
            document.getElementById('sidebarBackdrop').classList.toggle('open');
        }

        // Dark/Light mode toggle
        document.getElementById('themeToggle').addEventListener('click', function() {
            var html = document.documentElement;
            var isDark = html.getAttribute('data-theme') === 'dark';
            if (isDark) {
                html.removeAttribute('data-theme');
                localStorage.setItem('admin-theme', 'light');
            } else {
                html.setAttribute('data-theme', 'dark');
                localStorage.setItem('admin-theme', 'dark');
            }
        });
        </script>
    @else
        @yield('content')
    @endauth
    
    @stack('scripts')
</body>
</html>
