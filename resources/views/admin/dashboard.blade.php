@extends('layouts.admin')

@section('title', 'Admin Dashboard - RuangJepret')

@section('content')
<style>
    .dash-card {
        background: var(--bg-card);
        border: 1px solid var(--border-color);
        border-radius: 1.25rem;
        padding: 1.75rem;
        transition: all 0.4s cubic-bezier(.4,0,.2,1);
        position: relative;
        overflow: hidden;
    }
    .dash-card:hover {
        transform: translateY(-4px);
        box-shadow: var(--shadow-card-hover);
        border-color: var(--border-hover);
    }
    .dash-card .card-icon {
        width: 56px; height: 56px;
        border-radius: 16px;
        display: flex; align-items: center; justify-content: center;
        transition: transform 0.3s;
    }
    .dash-card:hover .card-icon { transform: scale(1.1) rotate(-3deg); }

    .stat-number {
        font-size: 2.25rem; font-weight: 800;
        line-height: 1; letter-spacing: -0.03em;
        color: var(--text-primary);
    }
    .card-accent { position:absolute; top:0; right:0; width:120px; height:120px; border-radius:0 0 0 100%; opacity:0.06; }

    .chart-container { background:var(--bg-card); border:1px solid var(--border-color); border-radius:1.25rem; padding:1.75rem; transition:all 0.3s; }
    .chart-container h3 { color: var(--text-primary); }
    .table-container { background:var(--bg-card); border:1px solid var(--border-color); border-radius:1.25rem; overflow:hidden; transition:all 0.3s; }
    .table-container table { width:100%; border-collapse:collapse; }
    .table-container th { padding:14px 20px; text-align:left; font-size:0.7rem; font-weight:700; text-transform:uppercase; letter-spacing:0.08em; color:var(--text-muted); border-bottom:1px solid var(--border-color); }
    .table-container td { padding:14px 20px; font-size:0.875rem; border-bottom:1px solid var(--border-color); vertical-align:middle; color:var(--text-secondary); }
    .table-container tr:last-child td { border-bottom:none; }
    .table-container tr:hover td { background:var(--bg-badge); }

    .badge { display:inline-flex; align-items:center; padding:4px 12px; border-radius:999px; font-size:0.65rem; font-weight:700; letter-spacing:0.04em; text-transform:uppercase; }
    .badge-premium { background:linear-gradient(135deg,#111,#333); color:white; }
    .badge-free { background:#ecfdf5; color:#047857; border:1px solid #a7f3d0; }
    [data-theme="dark"] .badge-free { background:rgba(5,150,105,0.15); color:#34d399; border-color:rgba(52,211,153,0.2); }

    .welcome-banner {
        background: linear-gradient(135deg, #0f0f0f 0%, #1a1a2e 50%, #16213e 100%);
        border-radius: 1.5rem; padding: 2.5rem; color: white;
        position: relative; overflow: hidden;
    }
    .welcome-banner::before {
        content:''; position:absolute; top:-50%; right:-20%; width:500px; height:500px;
        background: radial-gradient(circle, rgba(255,255,255,0.06) 0%, transparent 70%);
        border-radius:50%;
    }
    .welcome-banner::after {
        content:''; position:absolute; bottom:-40%; left:30%; width:300px; height:300px;
        background: radial-gradient(circle, rgba(255,255,255,0.04) 0%, transparent 70%);
        border-radius:50%;
    }

    .quick-action {
        display:flex; align-items:center; gap:12px; padding:14px 18px;
        border-radius:14px; border:1px solid var(--border-color);
        background:var(--bg-card); transition:all 0.3s; cursor:pointer; text-decoration:none; color:var(--text-secondary);
    }
    .quick-action:hover { background:var(--bg-badge); border-color:var(--border-hover); transform:translateX(4px); }
    .quick-action p:first-child { color: var(--text-primary); }

    .donut-legend-item { display:flex; align-items:center; gap:8px; font-size:0.8rem; color:var(--text-secondary); }
    .donut-legend-dot { width:10px; height:10px; border-radius:50%; flex-shrink:0; }

    .stat-label { color: var(--text-muted); }
    .table-link { color: var(--text-muted); transition: color 0.2s; }
    .table-link:hover { color: var(--text-primary); }
    .table-name { color: var(--text-primary); }
    .ratio-label { color: var(--text-secondary); }
    .ratio-count { color: var(--text-primary); }
    .ratio-bar-bg { background: var(--bg-badge); }

    @keyframes countUp { from { opacity:0; transform:translateY(12px); } to { opacity:1; transform:translateY(0); } }
    .animate-in { animation: countUp 0.6s ease-out forwards; }
    .delay-1 { animation-delay: 0.1s; opacity:0; }
    .delay-2 { animation-delay: 0.2s; opacity:0; }
    .delay-3 { animation-delay: 0.3s; opacity:0; }
    .delay-4 { animation-delay: 0.4s; opacity:0; }
</style>

<div class="space-y-8">
    <!-- Welcome Banner -->
    <div class="welcome-banner animate-in">
        <div class="relative z-10">
            <p class="text-white/50 text-sm font-medium mb-1">{{ now()->translatedFormat('l, d F Y') }}</p>
            <h2 class="text-3xl font-extrabold tracking-tight mb-2">Selamat Datang, {{ Auth::user()->name }} 👋</h2>
            <p class="text-white/60 text-sm max-w-xl">Kelola semua frame dan konten RuangJepret dari sini. Berikut ringkasan data terkini.</p>
        </div>
    </div>

    <!-- Stats Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-5">
        <div class="dash-card animate-in delay-1">
            <div class="card-accent" style="background:#000"></div>
            <div class="flex items-start justify-between mb-4">
                <div class="card-icon" style="background:linear-gradient(135deg,#111,#333)">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                </div>
                <span class="text-xs font-bold text-emerald-600 bg-emerald-50 px-2.5 py-1 rounded-full">Total</span>
            </div>
            <p class="stat-number mb-1">{{ $totalFrames }}</p>
            <p class="text-sm stat-label font-medium">Total Frame</p>
        </div>

        <div class="dash-card animate-in delay-2">
            <div class="card-accent" style="background:#7c3aed"></div>
            <div class="flex items-start justify-between mb-4">
                <div class="card-icon" style="background:linear-gradient(135deg,#7c3aed,#a855f7)">
                    <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd"/></svg>
                </div>
                <span class="text-xs font-bold text-purple-600 bg-purple-50 px-2.5 py-1 rounded-full">PRO</span>
            </div>
            <p class="stat-number mb-1">{{ $premiumFrames }}</p>
            <p class="text-sm stat-label font-medium">Frame Premium</p>
        </div>

        <div class="dash-card animate-in delay-3">
            <div class="card-accent" style="background:#059669"></div>
            <div class="flex items-start justify-between mb-4">
                <div class="card-icon" style="background:linear-gradient(135deg,#059669,#34d399)">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v13m0-13V6a2 2 0 112 2h-2zm0 0V5.5A2.5 2.5 0 109.5 8H12zm-7 4h14M5 12a2 2 0 110-4h14a2 2 0 110 4M5 12v7a2 2 0 002 2h10a2 2 0 002-2v-7"/></svg>
                </div>
                <span class="text-xs font-bold text-emerald-600 bg-emerald-50 px-2.5 py-1 rounded-full">FREE</span>
            </div>
            <p class="stat-number mb-1">{{ $freeFrames }}</p>
            <p class="text-sm stat-label font-medium">Frame Gratis</p>
        </div>

        <div class="dash-card animate-in delay-4">
            <div class="card-accent" style="background:#2563eb"></div>
            <div class="flex items-start justify-between mb-4">
                <div class="card-icon" style="background:linear-gradient(135deg,#2563eb,#60a5fa)">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                </div>
                <span class="text-xs font-bold text-blue-600 bg-blue-50 px-2.5 py-1 rounded-full">Bulan Ini</span>
            </div>
            <p class="stat-number mb-1">{{ $framesThisMonth }}</p>
            <p class="text-sm stat-label font-medium">Frame Baru</p>
        </div>
    </div>

    <!-- Charts + Quick Actions Row -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Donut Chart -->
        <div class="chart-container animate-in delay-2">
            <h3 class="text-lg font-bold mb-6">Distribusi Kategori</h3>
            <div class="flex flex-col items-center">
                <canvas id="categoryChart" width="220" height="220"></canvas>
                <div class="mt-6 flex flex-wrap justify-center gap-4" id="chartLegend"></div>
            </div>
        </div>

        <!-- Ratio Distribution -->
        <div class="chart-container animate-in delay-3">
            <h3 class="text-lg font-bold mb-6">Distribusi Rasio</h3>
            <div class="space-y-4">
                @php $maxRatio = $ratioDistribution->max() ?: 1; @endphp
                @forelse($ratioDistribution as $ratio => $count)
                <div>
                    <div class="flex justify-between items-center mb-1.5">
                        <span class="text-sm font-semibold ratio-label">{{ $ratio }}</span>
                        <span class="text-sm font-bold ratio-count">{{ $count }}</span>
                    </div>
                    <div class="w-full ratio-bar-bg rounded-full h-3 overflow-hidden">
                        <div class="h-full rounded-full transition-all duration-1000 ease-out" style="width: {{ ($count / $maxRatio) * 100 }}%; background: linear-gradient(90deg, #111, #444)"></div>
                    </div>
                </div>
                @empty
                <p class="text-sm text-gray-400 text-center py-8">Belum ada data rasio</p>
                @endforelse
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="chart-container animate-in delay-4">
            <h3 class="text-lg font-bold mb-6">Aksi Cepat</h3>
            <div class="space-y-3">
                <a href="{{ route('admin.frames.create') }}" class="quick-action">
                    <div class="w-10 h-10 rounded-xl flex items-center justify-center" style="background:linear-gradient(135deg,#111,#333)">
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                    </div>
                    <div>
                        <p class="text-sm font-bold table-name">Tambah Frame Baru</p>
                        <p class="text-xs stat-label">Upload template baru</p>
                    </div>
                </a>
                <a href="{{ route('admin.frames.index') }}" class="quick-action">
                    <div class="w-10 h-10 rounded-xl flex items-center justify-center" style="background:linear-gradient(135deg,#7c3aed,#a855f7)">
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/></svg>
                    </div>
                    <div>
                        <p class="text-sm font-bold table-name">Kelola Frame</p>
                        <p class="text-xs stat-label">Edit & hapus template</p>
                    </div>
                </a>
                <a href="{{ route('frame') }}" class="quick-action" target="_blank">
                    <div class="w-10 h-10 rounded-xl flex items-center justify-center" style="background:linear-gradient(135deg,#059669,#34d399)">
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                    </div>
                    <div>
                        <p class="text-sm font-bold table-name">Lihat Galeri</p>
                        <p class="text-xs stat-label">Buka halaman publik</p>
                    </div>
                </a>
                <a href="/" class="quick-action" target="_blank">
                    <div class="w-10 h-10 rounded-xl flex items-center justify-center" style="background:linear-gradient(135deg,#2563eb,#60a5fa)">
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
                    </div>
                    <div>
                        <p class="text-sm font-bold table-name">Homepage</p>
                        <p class="text-xs stat-label">Lihat tampilan utama</p>
                    </div>
                </a>
            </div>
        </div>
    </div>

    <!-- Recent Frames Table -->
    <div class="table-container animate-in delay-3">
        <div class="px-6 pt-5 pb-4 flex items-center justify-between">
            <h3 class="text-lg font-bold table-name">Frame Terbaru</h3>
            <a href="{{ route('admin.frames.index') }}" class="text-xs font-bold table-link uppercase tracking-wider">Lihat Semua →</a>
        </div>
        <table>
            <thead><tr><th>Preview</th><th>Nama</th><th>Kategori</th><th>Rasio</th><th>Foto</th><th>Ditambahkan</th></tr></thead>
            <tbody>
                @forelse($recentFrames as $frame)
                <tr>
                    <td>
                        <div class="w-12 h-12 rounded-xl overflow-hidden flex items-center justify-center" style="background:var(--bg-badge);border:1px solid var(--border-color)">
                            <img src="{{ asset('frames/' . $frame->image) }}" alt="{{ $frame->name }}" class="max-w-full max-h-full object-contain">
                        </div>
                    </td>
                    <td class="font-semibold table-name">{{ $frame->name }}</td>
                    <td>
                        @if(strtolower($frame->category) === 'premium')
                            <span class="badge badge-premium">Premium</span>
                        @else
                            <span class="badge badge-free">Free</span>
                        @endif
                    </td>
                    <td class="text-gray-500">{{ $frame->rasio ?? '-' }}</td>
                    <td class="text-gray-500">{{ $frame->qty_photo }}</td>
                    <td class="text-gray-400 text-xs">{{ $frame->created_at->diffForHumans() }}</td>
                </tr>
                @empty
                <tr><td colspan="6" class="text-center text-gray-400 py-10">Belum ada frame yang ditambahkan</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const canvas = document.getElementById('categoryChart');
    if (!canvas) return;
    const ctx = canvas.getContext('2d');

    const data = @json($categoryBreakdown);
    const labels = Object.keys(data);
    const values = Object.values(data);
    const total = values.reduce((a, b) => a + b, 0);

    if (total === 0) {
        ctx.font = '14px Inter, sans-serif';
        ctx.fillStyle = '#aaa';
        ctx.textAlign = 'center';
        ctx.fillText('Belum ada data', 110, 110);
        return;
    }

    const colors = ['#111111','#7c3aed','#059669','#2563eb','#f59e0b','#ef4444','#8b5cf6','#06b6d4'];
    const cx = 110, cy = 110, outerR = 90, innerR = 55;
    let startAngle = -Math.PI / 2;

    labels.forEach((label, i) => {
        const sliceAngle = (values[i] / total) * 2 * Math.PI;
        ctx.beginPath();
        ctx.arc(cx, cy, outerR, startAngle, startAngle + sliceAngle);
        ctx.arc(cx, cy, innerR, startAngle + sliceAngle, startAngle, true);
        ctx.closePath();
        ctx.fillStyle = colors[i % colors.length];
        ctx.fill();
        startAngle += sliceAngle;
    });

    // Center text - theme aware
    var textColor = getComputedStyle(document.documentElement).getPropertyValue('--text-primary').trim() || '#111';
    var mutedColor = getComputedStyle(document.documentElement).getPropertyValue('--text-muted').trim() || '#999';
    ctx.font = 'bold 28px Inter, sans-serif';
    ctx.fillStyle = textColor;
    ctx.textAlign = 'center';
    ctx.textBaseline = 'middle';
    ctx.fillText(total, cx, cy - 6);
    ctx.font = '11px Inter, sans-serif';
    ctx.fillStyle = mutedColor;
    ctx.fillText('Total', cx, cy + 14);

    // Legend
    const legend = document.getElementById('chartLegend');
    labels.forEach((label, i) => {
        const pct = ((values[i] / total) * 100).toFixed(0);
        const div = document.createElement('div');
        div.className = 'donut-legend-item';
        div.innerHTML = `<span class="donut-legend-dot" style="background:${colors[i % colors.length]}"></span>${label} (${pct}%)`;
        legend.appendChild(div);
    });
});
</script>
@endpush
