<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Balance;
use App\Models\Period;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Member;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $posts = DB::table('posts')
            ->count();

        $members = DB::table('members')
            ->count();

        $activity = DB::table('activities')
            ->count();

        $periods = Period::join('balances', 'periods.id', '=', 'balances.period_id')
            ->select('balances.*', 'periods.*')
            ->where('status','1')
            ->get();

        $balances = Balance::join('transactions', 'balances.id', '=', 'transactions.balances_id')
            ->join('periods', 'periods.id', '=', 'balances.period_id')
            ->select('balances.*', 'transactions.*', 'periods.*', 'balances.id AS b_id', 'transactions.id AS t_id', 'periods.id AS p_id')
            ->where('periods.status', '1')
            ->orderByRaw('transactions.created_at DESC')
            ->limit(4)
            ->get();

        $activities = Activity::join('periods', 'activities.period_id', '=', 'periods.id')
            ->select('activities.*', 'periods.name AS period_name')
            ->where('periods.status','1')
            ->where('activities.start_datetime', '>', Carbon::now())
            ->orderByRaw('activities.start_datetime ASC')
            ->limit(4)
            ->get();

//        dd($activities);

        return view('index', compact('posts', 'members', 'periods', 'activities', 'balances', 'activity'));
    }
}
