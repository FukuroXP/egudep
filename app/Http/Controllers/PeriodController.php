<?php

namespace App\Http\Controllers;

use App\Models\Balance;
use App\Models\Period;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PeriodController extends Controller
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
            'start_date' => 'required',
            'end_date' => 'required',
            'status' => 'required',
        ]);

        $period = new Period;
        $period->name = $request->name;
        $period->start_date = $request->start_date;
        $period->end_date = $request->end_date;
        $period->status = $request->status;
        $period->save();

        $balance = new Balance;
        $balance->balance = '0';
        $balance->period_id = $period->id;
        $balance->save();

//        dd($period);

        return redirect('/tabel_periode');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Period  $period
     * @return \Illuminate\Http\Response
     */
    public function show(Period $period)
    {
        $periods = DB::table('periods')
            ->select('periods.*')
            ->get();
        return view('show_period', compact('periods'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Period  $period
     * @return \Illuminate\Http\Response
     */
    public function edit(Period $period)
    {
        //
    }

    public function set_active(Period $period, $id)
    {
        if ( Period::where('status', '1')->exists() ){
            $dis = Period::where('status', '1')->first();
            $dis->status = '0';
            $dis->save();
            $acc = Period::where('id', $id)->first();
            $acc->status = '1';
            $acc->save();
        }
        else {
            $acc = Period::where('id', $id)->first();
            $acc->status = '1';
            $acc->save();
        }


        return redirect('/tabel_periode');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Period  $period
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Period $period)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Period  $period
     * @return \Illuminate\Http\Response
     */
    public function destroy(Period $period)
    {
        //
    }
}
