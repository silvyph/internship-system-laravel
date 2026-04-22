<?php

namespace App\Http\Controllers;

use App\Models\Intern;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $year = $request->get('year', Carbon::now()->year);
        $month = $request->get('month', Carbon::now()->month);

        $monthlyData = Intern::with('division')
            ->where('status', 'Diterima')
            ->where(function ($query) use ($year) {
                $query->whereYear('start_date', $year)
                    ->orWhereYear('end_date', $year)
                    ->orWhere(function ($q) use ($year) {
                        $q->where('start_date', '<=', Carbon::create($year, 12, 31))
                            ->where('end_date', '>=', Carbon::create($year, 1, 1));
                    });
            })
            ->get();

        $formattedData = [];

        foreach ($monthlyData as $internship) {
            $divisionName = $internship->division->name ?? 'Tanpa Divisi';
            $startDate = Carbon::parse($internship->start_date);
            $endDate = Carbon::parse($internship->end_date);
            $participantCount = $participantCount = 1;


            $currentMonth = $startDate->copy();

            while ($currentMonth->lte($endDate)) {
                $monthKey = $currentMonth->format('Y-m');

                if (!isset($formattedData[$divisionName])) {
                    $formattedData[$divisionName] = [];
                }

                if (!isset($formattedData[$divisionName][$monthKey])) {
                    $formattedData[$divisionName][$monthKey] = 0;
                }

                $formattedData[$divisionName][$monthKey] += $participantCount;
                $currentMonth->addMonth();
            }
        }

        // Data harian
        $dailyData = [];
        $dates = [];

        $startDate = Carbon::create($year, $month, 1);
        $endDate = $startDate->copy()->endOfMonth();

        while ($startDate->lte($endDate)) {
            $dates[] = $startDate->format('Y-m-d');
            $startDate->addDay();
        }

        foreach ($monthlyData as $internship) {
            $divisionName = $internship->division->name ?? 'Tanpa Divisi';
            $startDate = Carbon::parse($internship->start_date);
            $endDate = Carbon::parse($internship->end_date);
            $participantCount = $participantCount = 1;


            $currentDate = $startDate->copy();

            while ($currentDate->lte($endDate)) {
                $dateKey = $currentDate->format('Y-m-d');

                if (!isset($dailyData[$divisionName])) {
                    $dailyData[$divisionName] = [];
                }

                if (!isset($dailyData[$divisionName][$dateKey])) {
                    $dailyData[$divisionName][$dateKey] = 0;
                }

                $dailyData[$divisionName][$dateKey] += $participantCount;
                $currentDate->addDay();
            }
        }

        // Tahun unik
        $years = Intern::where('status', 'Diterima')
            ->selectRaw('YEAR(start_date) as year')
            ->union(
                Intern::where('status', 'Diterima')->selectRaw('YEAR(end_date) as year')
            )
            ->distinct()
            ->pluck('year')
            ->sortDesc();

        return view('admin.dashboard', compact('formattedData', 'year', 'month', 'dailyData', 'dates', 'years'));
    }
}
