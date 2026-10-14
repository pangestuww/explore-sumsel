<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Destinasi;
use App\Models\Budaya;
use App\Models\Kuliner;
use App\Models\Review;
use App\Models\Kabupaten;
use App\Models\Provinsi;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'totalUsers'      => User::count(),
            'totalDestinasi'  => Destinasi::count(),
            'totalBudaya'     => Budaya::count(),
            'totalKuliner'    => Kuliner::count(),
            'totalReview'     => Review::count(),
            'totalProvinsi'   => Provinsi::count(),
            'totalKabupaten'  => Kabupaten::count(),
        ];

        // User terbaru
        $recentUsers = User::latest()->take(5)->get();

        // Review terbaru
        $recentReviews = Review::with(['user', 'destinasi'])
            ->latest()
            ->take(5)
            ->get();

        return view('admin.dashboard', compact('stats', 'recentUsers', 'recentReviews'));
    }
}
