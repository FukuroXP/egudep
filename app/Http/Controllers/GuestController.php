<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Member;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GuestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function elear(Post $post)
    {
        $posts = DB::table('posts')
            ->select('posts.*')
            ->orderByRaw('created_at DESC')
            ->get();

        $activities = Activity::join('periods', 'activities.period_id', '=', 'periods.id')
            ->select('activities.*', 'periods.name AS period_name')
            ->where('periods.status','1')
            ->orderByRaw('start_datetime DESC')
            ->limit(4)
            ->get();

        return view('guest.index', compact('posts', 'activities'));
    }

    public function view(Post $post, $id)
    {
        $posts = Post::join('users', 'posts.user_id', '=', 'users.id')
            ->select('posts.*', 'users.*')
            ->where('posts.id', $id)
            ->get();

        return view('guest.view_post', compact('posts'));
    }

    public function member(Member $member)
    {

        $members = Member::join('periods', 'members.period_id', '=', 'periods.id')
            ->select('members.*', 'periods.name AS period_name')
            ->where('periods.status','1')
            ->get();

        return view('guest.members', compact( 'members'));
    }

    public function activity(Activity $activity)
    {
        $activities = Activity::join('periods', 'activities.period_id', '=', 'periods.id')
            ->select('activities.*', 'periods.name AS period_name')
            ->where('periods.status','1')
            ->orderByRaw('start_datetime DESC')
            ->get();

        return view('guest.activity', compact( 'activities'));
    }

    public function view_activity($id)
    {
        $activities = DB::table('activities')
            ->select('activities.*')
            ->where('activities.id',$id)
            ->get();

        return view('guest.view_activity', compact('activities'));
    }

    public function download($file)
    {
        $url = public_path('/file/' . $file);

        return response()->download($url);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
