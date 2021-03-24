<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Period;
use Carbon\CarbonPeriod;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ActivityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        //
    }

    public function add()
    {
        $periods = DB::table('periods')
            ->select('periods.*')
            ->where('status','1')
            ->get();
        return view('add_activity', compact('periods'));
    }

    public function view($id)
    {
        $activities = DB::table('activities')
            ->select('activities.*')
            ->where('activities.id',$id)
            ->get();

        return view('view_activity', compact('activities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'location' => 'required',
            'participant' => 'required',
            'start_datetime' => 'required',
            'end_datetime' => 'required',
            'description' => 'required'
        ]);

        $activity = new Activity;
        $activity->name = $request->name;
        $activity->period_id = $request->period_id;
        $activity->location = $request->location;
        $activity->participant = $request->participant;
        $activity->start_datetime = $request->start_datetime;
        $activity->end_datetime = $request->end_datetime;
        $activity->description = $request->description;

        $activity->save();

//        dd($activity);

        return redirect('/kegiatan')->with('success',"Kegiatan talah ditambahkan");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Activity  $activity
     * @return \Illuminate\Http\Response
     */
    public function show(Activity $activity)
    {
        $activities = Activity::join('periods', 'activities.period_id', '=', 'periods.id')
            ->select('activities.*', 'periods.name AS period_name')
            ->where('periods.status','1')
            ->get();

        $periods = Period::all()
            ->where('status','1');

        return view('show_activity', compact('activities', 'periods'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Activity  $activity
     * @return \Illuminate\Http\Response
     */
    public function edit(Activity $activity, $id)
    {
        $activities = DB::table('activities')
            ->select('activities.*')
            ->where('activities.id',$id)
            ->get();

        return view('edit_activity', compact('activities'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Activity  $activity
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Activity $activity, $id)
    {

        $activity = Activity::where('id',$id)->first();
        $activity->name = $request->name;
        $activity->location = $request->location;
        $activity->participant = $request->participant;
        $activity->start_datetime = $request->start_datetime;
        $activity->end_datetime = $request->end_datetime;
        $activity->description = $request->description;

        $activity->save();

//        dd($activity);

        return redirect('/kegiatan')->with('success',"Kegiatan talah diedit");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Activity  $activity
     * @return \Illuminate\Http\Response
     */
    public function destroy(Activity $activity, $id)
    {
        $activities = Activity::where('id',$id)->first();

        if ($activities != null) {
            $activities->delete();
            return redirect('/kegiatan')->with('success',"Data telah dihapus");
        }

        return redirect('/kegiatan')->with('fail',"Data tidak terhapus");
    }
}
