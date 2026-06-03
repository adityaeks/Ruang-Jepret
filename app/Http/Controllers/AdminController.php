<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function dashboard()
    {
        $totalFrames = \App\Models\Frame::count();
        $premiumFrames = \App\Models\Frame::where('category', 'premium')->count();
        $freeFrames = \App\Models\Frame::where('category', '!=', 'premium')->orWhereNull('category')->count();
        $totalUsers = \App\Models\User::count();

        // Category breakdown for chart
        $categoryBreakdown = \App\Models\Frame::selectRaw('COALESCE(category, "uncategorized") as cat, count(*) as total')
            ->groupBy('cat')
            ->pluck('total', 'cat');

        // Ratio distribution
        $ratioDistribution = \App\Models\Frame::selectRaw('COALESCE(rasio, "unknown") as ratio, count(*) as total')
            ->groupBy('ratio')
            ->pluck('total', 'ratio');

        // Recent frames
        $recentFrames = \App\Models\Frame::latest()->take(5)->get();

        // Frames added this month
        $framesThisMonth = \App\Models\Frame::whereMonth('created_at', now()->month)
            ->whereYear('created_at', now()->year)
            ->count();

        return view('admin.dashboard', compact(
            'totalFrames',
            'premiumFrames',
            'freeFrames',
            'totalUsers',
            'categoryBreakdown',
            'ratioDistribution',
            'recentFrames',
            'framesThisMonth'
        ));
    }
}
