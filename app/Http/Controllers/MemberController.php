<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\Period;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MemberController extends Controller
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
        return view('add_member', compact('periods'));
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
            'title' => 'required',
            'contact' => 'required',
            'gender' => 'required',
            'address' => 'required',
            'birth_date' => 'required',
            'photo' => 'required'
        ]);

        $member = new Member;
        $member->name = $request->name;
        $member->period_id = $request->period_id;
        $member->status = $request->status;
        $member->title = $request->title;
        $member->contact = $request->contact;
        $member->gender = $request->gender;
        $member->address = $request->address;
        $member->birth_date = $request->birth_date;

        if($request->hasFile('photo')){
            $photo = $request->file('photo');
            $fileName = time().'.'.$photo->getClientOriginalName();
            $ServicesPath = public_path('photo');
            $photo->move($ServicesPath, $fileName);
            $member->photo = $fileName;
        }

//        dd($member);

        $member->save();

        return redirect('/anggota')->with('success',"Anggota telah ditambahkan");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function show(Member $member)
    {
        $members = Member::join('periods', 'members.period_id', '=', 'periods.id')
            ->select('members.*', 'periods.name AS period_name')
            ->where('periods.status','1')
            ->get();

        $periods = Period::all()
            ->where('status','1');

        return view('show_member', compact('members', 'periods'));
    }

    public function view(Member $member, $id)
    {
        $members = DB::table('members')
            ->select('members.*')
            ->where('members.id',$id)
            ->get();

        return view('view_member', compact('members'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function edit(Member $member, $id)
    {
        $members = DB::table('members')
            ->select('members.*')
            ->where('members.id',$id)
            ->get();

        return view('edit_member', compact('members'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Member $member, $id)
    {
        $member = Member::where('id',$id)->first();

        $member->name = $request->name;
        $member->status = $request->status;
        $member->title = $request->title;
        $member->contact = $request->contact;
        $member->gender = $request->gender;
        $member->address = $request->address;
        $member->birth_date = $request->birth_date;

        if($request->hasFile('photo')){
            $photo = $request->file('photo');
            $fileName = time().'.'.$photo->getClientOriginalName();
            $ServicesPath = public_path('photo');
            $photo->move($ServicesPath, $fileName);
            $member->photo = $fileName;
        }

//        dd($member);

        $member->save();

        return redirect('/anggota')->with('success',"Anggota telah diubah");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function destroy(Member $member, $id)
    {
        $members = Member::where('id',$id)->first();

        if ($members != null) {
            $members->delete();
            return redirect('/anggota')->with('success',"Anggota telah dihapus");
        }

        return redirect('/anggota')->with('fail',"Anggota tidak terhapus");
    }
}
