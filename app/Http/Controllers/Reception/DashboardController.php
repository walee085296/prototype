<?php

namespace App\Http\Controllers\Reception;
use App\Http\Controllers\Controller;
namespace App\Http\Controllers\Reception;

use App\Http\Controllers\Controller; // مهم جداً عشان يورث منه
use App\Models\Visit;
use Illuminate\Http\Request;
class DashboardController extends Controller
{
   public function index() {
    $today = now()->today();

    $stats = [
        'total_today' => \App\Models\Visit::where('id', '!=', $today)->count(),
        'currently_inside' => \App\Models\Visit::where('status', 'entered')->count(),
        'completed_today' => \App\Models\Visit::whereDate('exit_at', $today)->count(),
    ];

    // آخر 8 حركات مسجلة
    $recent_activities = \App\Models\Visit::with('visitor')
        ->orderBy('updated_at', 'desc')
        ->take(8)
        ->get();

    return view('dashboard', compact('stats', 'recent_activities'));
}
}