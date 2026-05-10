@extends('layouts.admin')

@section('title', 'Admin Dashboard - RuangJepret')

@section('content')
<div>
    <h2 class="text-3xl font-extrabold text-black mb-8">Dashboard Overview</h2>
    
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <!-- Card 1 -->
        <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100 flex items-center space-x-4">
            <div class="bg-black text-white p-4 rounded-xl">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
            </div>
            <div>
                <p class="text-sm font-medium text-gray-500">Total Frames</p>
                <p class="text-2xl font-bold text-black">{{ \App\Models\Frame::count() }}</p>
            </div>
        </div>
        
        <!-- Add more cards as needed -->
    </div>
</div>
@endsection
