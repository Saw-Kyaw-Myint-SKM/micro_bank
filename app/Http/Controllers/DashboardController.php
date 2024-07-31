<?php

namespace App\Http\Controllers;

use App\Models\TransitionHistory;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{

    public function index()
    {
        $start = Carbon::now()->subMonths(4)->startOfMonth();
        $end = Carbon::now()->endOfMonth();

        // Fetch user counts grouped by month
        $userData = DB::table('users')
            ->select(
                DB::raw('COUNT(*) as count'),
                DB::raw('DATE_FORMAT(created_at, "%Y-%m") as month')
            )
            ->whereBetween('created_at', [$start, $end])
            ->groupBy(DB::raw('DATE_FORMAT(created_at, "%Y-%m")'))
            ->orderBy(DB::raw('DATE_FORMAT(created_at, "%Y-%m")'), 'asc')
            ->get()
            ->pluck('count', 'month')
            ->toArray();

        $transactionData = DB::table('transition_histories')
            ->select(
                DB::raw('COUNT(*) as count'),
                DB::raw('DATE_FORMAT(created_at, "%Y-%m") as month')
            )
            ->whereBetween('created_at', [$start, $end])
            ->groupBy(DB::raw('DATE_FORMAT(created_at, "%Y-%m")'))
            ->orderBy(DB::raw('DATE_FORMAT(created_at, "%Y-%m")'), 'asc')
            ->get()
            ->pluck('count', 'month')
            ->toArray();

        // Initialize the arrays for storing month names and user counts
        $monthNames = [];
        $userCounts = [];
        $transactionCounts = [];
        $current = Carbon::now()->subMonths(4)->startOfMonth();

        while ($current <= Carbon::now()->endOfMonth()) {
            $month = $current->format('Y-m');
            $monthNames[] = $current->format('F');
            $userCounts[] = $userData[$month] ?? 0;
            $transactionCounts[] = $transactionData[$month] ?? 0;
            $current->addMonth();
        }
        // for ($i = 4; $i >= 0; $i--) {
        //     $month = Carbon::now()->subMonths($i)->format('Y-m');
        //     $monthNames[] = Carbon::now()->subMonths($i)->format('F');

        // }
        // dd($monthNames);
        $cardStart = Carbon::now()->startOfMonth();
        $cardEnd = Carbon::now()->endOfMonth();

        // Query to get total transaction count and total amount for the current month
        $stats = DB::table('transition_histories')
            ->select(
                DB::raw('COUNT(*) as transition_month_count'),
                DB::raw('SUM(amount) as transition_month_amount')
            )
            ->whereBetween('created_at', [$cardStart, $cardEnd])
            ->first();
        $totalUser = User::count();
        $totalTransition = TransitionHistory::count();
        return view('dashboard', [
            'months' => $monthNames,
            'userCounts' => $userCounts,
            'transactionCounts' => $transactionCounts,
            'totalUser' => $totalUser,
            'totalTransition' => $totalTransition,
            'transition_month_count' => $stats->transition_month_count ?? 0,
            'transition_month_amount' => $stats->transition_month_amount ?? 0,
        ]);
    }
}
