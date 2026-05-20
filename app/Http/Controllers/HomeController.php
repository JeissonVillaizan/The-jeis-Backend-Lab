<?php

namespace App\Http\Controllers;

use App\Models\Certification;
use App\Models\DashboardVisit;
use App\Models\ContactMessage;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class HomeController extends Controller
{
    public function index()
    {
        $currentMonthKey = now()->format('Y-m');
        $monthVisits = 1430;

        if (Schema::hasTable('dashboard_visits')) {
            DashboardVisit::firstOrCreate([
                'month_key' => $currentMonthKey,
            ], [
                'visits' => 1430,
            ]);

            $monthVisits = DB::transaction(function () use ($currentMonthKey) {
                $visit = DashboardVisit::where('month_key', $currentMonthKey)->lockForUpdate()->first();
                $currentVisits = $visit?->visits ?? 1430;

                if ($visit) {
                    $visit->update(['visits' => $currentVisits + 1]);
                }

                return $currentVisits;
            });
        }

        $recentProjects = Project::latest()->take(3)->get();
        $projectsCount = Project::where('status', 'Completado')->count();
        $certificationsCount = Certification::count();
        $contactsReceivedCount = 47 + ContactMessage::count(); // Count stored contact messages plus the initial 47

        return view('pages.home', compact('recentProjects', 'projectsCount', 'monthVisits', 'certificationsCount', 'contactsReceivedCount'));
    }
}
