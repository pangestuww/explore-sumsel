<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Destinasi;
use App\Models\Budaya;
use App\Models\Kuliner;
use App\Models\Review;
use Illuminate\Support\Facades\DB;

class AdminDashboardController extends Controller
{
    public function index()
    {
        // 1. Stats Grid
        $stats = [
            'totalDestinasi' => Destinasi::count(),
            'totalBudaya' => Budaya::count(),
            'totalKuliner' => Kuliner::count(),
            'totalReview' => Review::count(),
        ];

        // 2. Grafik Distribusi Rating (Bintang 1-5)
        $chartData = [];
        for ($i = 1; $i <= 5; $i++) {
            $chartData[] = Review::where('rating', $i)->count();
        }

        // 3. Distribusi Konten
        $contentStats = [$stats['totalDestinasi'], $stats['totalBudaya'], $stats['totalKuliner']];

        // 4. Top 5 Destinasi
        $topDestinasi = Destinasi::withCount('reviews')->orderByDesc('reviews_count')->take(5)->get();
        $topDestinasiLabels = $topDestinasi->pluck('nama')->toArray();
        $topDestinasiData = $topDestinasi->pluck('reviews_count')->toArray();

        // 🌟 5. Top 5 Kuliner (BARU) 🌟
        $topKuliner = Kuliner::withCount('reviews')->orderByDesc('reviews_count')->take(5)->get();
        $topKulinerLabels = $topKuliner->pluck('nama')->toArray();
        $topKulinerData = $topKuliner->pluck('reviews_count')->toArray();

        // 🌟 6. Top 5 Budaya (BARU) 🌟
        $topBudaya = Budaya::withCount('reviews')->orderByDesc('reviews_count')->take(5)->get();
        $topBudayaLabels = $topBudaya->pluck('nama')->toArray();
        $topBudayaData = $topBudaya->pluck('reviews_count')->toArray();

        // 7. GRAFIK: User yang Telah Menilai
        $userReviews = User::withCount('reviews')->has('reviews')->orderByDesc('reviews_count')->take(5)->get();
        $userReviewLabels = $userReviews->pluck('name')->toArray();
        $userReviewData = $userReviews->pluck('reviews_count')->toArray();

        // 8. GRAFIK: Sebaran Destinasi per Kabupaten
        $kabupatenStats = Destinasi::join('kabupatens', 'destinasis.kabupaten_id', '=', 'kabupatens.id')
            ->select('kabupatens.nama', DB::raw('COUNT(destinasis.id) as total'))
            ->groupBy('kabupatens.id', 'kabupatens.nama')
            ->orderByDesc('total')
            ->take(5)
            ->get();
        $kabLabels = $kabupatenStats->pluck('nama')->toArray();
        $kabData = $kabupatenStats->pluck('total')->toArray();

        // Fallback jika data kosong
        if (empty($topDestinasiLabels)) {
            $topDestinasiLabels = ['Belum ada data'];
            $topDestinasiData = [0];
        }
        if (empty($topKulinerLabels)) {
            $topKulinerLabels = ['Belum ada data'];
            $topKulinerData = [0];
        }
        if (empty($topBudayaLabels)) {
            $topBudayaLabels = ['Belum ada data'];
            $topBudayaData = [0];
        }
        if (empty($userReviewLabels)) {
            $userReviewLabels = ['Belum ada user'];
            $userReviewData = [0];
        }
        if (empty($kabLabels)) {
            $kabLabels = ['Belum ada data'];
            $kabData = [0];
        }

        return view('admin.dashboard', compact(
            'stats',
            'chartData',
            'contentStats',
            'topDestinasiLabels',
            'topDestinasiData',
            'topKulinerLabels',
            'topKulinerData',
            'topBudayaLabels',
            'topBudayaData',
            'userReviewLabels',
            'userReviewData',
            'kabLabels',
            'kabData'
        ));
    }
}
