<?php

namespace App\Http\Controllers;

use App\Models\OPDVisit;
use Carbon\Carbon;
use Illuminate\Http\Request;

class OPDDashboardController extends Controller
{
    /**
     * OPD dashboard.
     */
    public function index()
    {
        $today = OPDVisit::whereDate('visit_date', today())->count();

        $thisMonth = OPDVisit::whereMonth('visit_date', now()->month)
            ->whereYear('visit_date', now()->year)
            ->count();

        $treated = OPDVisit::where('outcome', 'Treated')
            ->whereMonth('visit_date', now()->month)
            ->whereYear('visit_date', now()->year)
            ->count();

        $referred = OPDVisit::where('outcome', 'Referred')
            ->whereMonth('visit_date', now()->month)
            ->whereYear('visit_date', now()->year)
            ->count();

        $admitted = OPDVisit::where('outcome', 'Admitted')
            ->whereMonth('visit_date', now()->month)
            ->whereYear('visit_date', now()->year)
            ->count();

        $followUp = OPDVisit::where('outcome', 'Follow-up')
            ->whereMonth('visit_date', now()->month)
            ->whereYear('visit_date', now()->year)
            ->count();

        $recentVisits = OPDVisit::with('patient')
            ->latest('visit_date')
            ->latest('id')
            ->take(10)
            ->get();

        return view('opd.dashboard', compact(
            'today',
            'thisMonth',
            'treated',
            'referred',
            'admitted',
            'followUp',
            'recentVisits'
        ));
    }

    /**
     * Display the monthly OPD report.
     */
    public function report(Request $request)
    {
        $month = $request->input('month', now()->format('Y-m'));

        $date = Carbon::createFromFormat('Y-m', $month);

        $visits = OPDVisit::with('patient')
            ->whereMonth('visit_date', $date->month)
            ->whereYear('visit_date', $date->year)
            ->orderBy('visit_date')
            ->orderBy('id')
            ->get();

        $total = $visits->count();

        $treated = $visits->where('outcome', 'Treated')->count();
        $referred = $visits->where('outcome', 'Referred')->count();
        $admitted = $visits->where('outcome', 'Admitted')->count();
        $followUp = $visits->where('outcome', 'Follow-up')->count();

        $male = $visits->filter(
            fn ($visit) => $visit->patient?->gender === 'Male'
        )->count();

        $female = $visits->filter(
            fn ($visit) => $visit->patient?->gender === 'Female'
        )->count();

        return view('opd.report', compact(
            'month',
            'date',
            'visits',
            'total',
            'treated',
            'referred',
            'admitted',
            'followUp',
            'male',
            'female'
        ));
    }

    public function print(Request $request)
{
    $month = $request->input('month', now()->format('Y-m'));

    $date = \Carbon\Carbon::createFromFormat('Y-m', $month);

    $visits = OPDVisit::with('patient')
        ->whereYear('visit_date', $date->year)
        ->whereMonth('visit_date', $date->month)
        ->orderBy('visit_date')
        ->get();

    $total = $visits->count();

    $treated = $visits->where('outcome', 'Treated')->count();
    $referred = $visits->where('outcome', 'Referred')->count();
    $admitted = $visits->where('outcome', 'Admitted')->count();
    $followUp = $visits->where('outcome', 'Follow-up')->count();

    $male = $visits->filter(
        fn ($visit) => $visit->patient?->gender === 'Male'
    )->count();

    $female = $visits->filter(
        fn ($visit) => $visit->patient?->gender === 'Female'
    )->count();

    return view('opd.print', compact(
        'month',
        'date',
        'visits',
        'total',
        'treated',
        'referred',
        'admitted',
        'followUp',
        'male',
        'female'
    ));
}
}