<?php

namespace App\Http\Controllers;

use App\Models\Balance;
use App\Models\Period;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Transactions;

class BalanceController extends Controller
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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    public function period(Request $request)
    {
        $request->validate([
            'period' => 'required',
            'balance' => 'required',
        ]);

        $period = new Balance;
        $period->period = $request->period;
        $period->balance = $request->balance;

        $period->save();

        dd($period);

        return redirect('/showpost');
    }

    public function trans(Request $request)
    {
        $request->validate([
            'balances_id' => 'required',
            'type' => 'required',
            'amount' => 'required',
            'transaction_date' => 'required',
            'descriptions' => 'required',
            'proof' => 'required',
        ]);

        $trans = new Transaction;
        $trans->balances_id = $request->balances_id;
        $trans->type = $request->type;
        $trans->amount = $request->amount;
        $trans->transaction_date = $request->transaction_date;
        $trans->descriptions = $request->descriptions;

        if ($request->hasFile('proof')) {
            $proof = $request->file('proof');
            $fileName = time() . '.' . $proof->getClientOriginalName();
            $ServicesPath = public_path('proof');
            $proof->move($ServicesPath, $fileName);
            $trans->proof = $fileName;
        }

        $trans->save();

        $balance = Balance::where('id', $trans->balances_id)->first();
        if ($trans->type == '1') {
            $pros = $balance->balance + $trans->amount;
        } elseif ($trans->type == '2') {
            $pros = $balance->balance - $trans->amount;
        }
        $balance->balance = $pros;

        $balance->save();

//        dd($trans);

        return redirect('/uang')->with('success',"Transaksi talah ditambahkan");
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Balance $balance
     * @return \Illuminate\Http\Response
     */
    public function show(Balance $balance)
    {

    }

    public function show_balances(Balance $balance)
    {

        $balances = Balance::join('transactions', 'balances.id', '=', 'transactions.balances_id')
            ->join('periods', 'periods.id', '=', 'balances.period_id')
            ->select('balances.*', 'transactions.*', 'periods.*', 'balances.id AS b_id', 'transactions.id AS t_id', 'periods.id AS p_id')
            ->orderByRaw('transactions.created_at DESC')
            ->where('periods.status', '1')
            ->get();

        $periods = Period::join('balances', 'periods.id', '=', 'balances.period_id')
            ->select('balances.*', 'periods.*')
            ->where('status', '1')
            ->get();

        return view('show_balance', compact('balances', 'periods'));

    }

    public function view_trans(Transaction $transaction, $id)
    {
        $transactions = DB::table('transactions')
            ->select('transactions.*')
            ->where('transactions.id',$id)
            ->get();

        return view('view_transaction', compact('transactions'));
    }

    public function add_trans(Balance $balance)
    {
        $balances = Balance::join('periods', 'balances.period_id', '=', 'periods.id')
            ->select('balances.*', 'periods.*', 'balances.id AS b_id', 'periods.id AS p_id')
            ->where('periods.status', '1')
            ->get();

        return view('add_transaction', compact('balances'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Balance $balance
     * @return \Illuminate\Http\Response
     */
    public function edit(Balance $balance)
    {
        //
    }

    public function edit_trans(Transaction $transaction, $id)
    {
        $transactions = DB::table('transactions')
            ->select('transactions.*')
            ->where('transactions.id',$id)
            ->get();

        return view('edit_transaction', compact('transactions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Balance $balance
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Balance $balance)
    {
        //
    }

    public function update_trans(Request $request, Balance $balance, $id)
    {
        $trans = Transaction::where('id', $id)->first();

        $balance = Balance::where('id', $trans->balances_id)->first();
        if ($trans->type == '1') {
            $pros = $balance->balance - $trans->amount;
        } elseif ($trans->type == '2') {
            $pros = $balance->balance + $trans->amount;
        }
        $balance->balance = $pros;

        $trans->type = $request->type;
        $trans->amount = $request->amount;
        $trans->transaction_date = $request->transaction_date;
        $trans->descriptions = $request->descriptions;

        if ($request->hasFile('proof')) {
            $proof = $request->file('proof');
            $fileName = time() . '.' . $proof->getClientOriginalName();
            $ServicesPath = public_path('proof');
            $proof->move($ServicesPath, $fileName);
            $trans->proof = $fileName;
        }

        $trans->save();

        if ($trans->type == '1') {
            $pros = $balance->balance + $trans->amount;
        } elseif ($trans->type == '2') {
            $pros = $balance->balance - $trans->amount;
        }
        $balance->balance = $pros;

        $balance->save();

//        dd($trans);

        return redirect('/uang')->with('success',"Transaksi talah diubah");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Balance $balance
     * @return \Illuminate\Http\Response
     */
    public function destroy(Balance $balance)
    {
        //
    }

    public function destroy_trans(Transaction $transaction, $id)
    {
        $trans = Transaction::where('id', $id)->first();

        $balance = Balance::where('id', $trans->balances_id)->first();
        if ($trans->type == '1') {
            $pros = $balance->balance - $trans->amount;
        } elseif ($trans->type == '2') {
            $pros = $balance->balance + $trans->amount;
        }
        $balance->balance = $pros;

        $balance->save();

        $trans = Transaction::where('id',$id)->first();

        if ($trans != null) {
            $trans->delete();
            return redirect('/uang')->with('success',"Data telah dihapus");
        }

        return redirect('/uang')->with('fail',"Data tidak terhapus");
    }
}
