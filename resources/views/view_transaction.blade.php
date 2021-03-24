@extends('layouts.main')

@section('content')
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-title">
                <div class="row">
                    <div class="col-6">
                        <h3>Transaksi</h3>
                    </div>
                    <div class="col-6">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/home"> <i data-feather="home"></i></a></li>
                            <li class="breadcrumb-item">Uang</li>
                            <li class="breadcrumb-item active">Transaksi</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        @foreach($transactions as $trans)
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-8">
                    <div class="card card-absolute">
                        @if($trans->type == '1')
                            <div class="card-header bg-success">
                                <h5 class="pull-left">Uang Masuk <i class="fas fa-arrow-down"></i> </h5>
                            </div>
                        @else
                            <div class="card-header bg-danger">
                                <h5 class="pull-left">Uang Keluar <i class="fas fa-arrow-up"></i> </h5>
                            </div>
                        @endif
                            <div class="card-body">
                                <div class="row" style="font-size: 20px">
                                    <div class="col-md-6">
                                        <table class="product-page-width">
                                            <tbody>
                                            <tr>
                                                <td>Jumlah</td>
                                                <td> &nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;&nbsp;</td>
                                                <td><h4>
                                                        @if($trans->type == '1')
                                                            +
                                                        @else
                                                            -
                                                        @endif
                                                        Rp. {{ number_format($trans->amount, 0, ',','.') }}
                                                    </h4></td>
                                            </tr>
                                            <tr>
                                                <td>Tanggal Transaksi</td>
                                                <td> &nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;&nbsp;</td>
                                                <td>{{ date('d F Y', strtotime($trans->transaction_date)) }}</td>
                                            </tr>
                                            <tr>
                                                <td>Deskripsi</td>
                                                <td> &nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;&nbsp;</td>
                                                <td>{{ $trans->descriptions }}</td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="col-md-6 text-left">
                                        Bukti Transaksi &nbsp;&nbsp;&nbsp;:
                                        <br>
                                        <img class="img-fluid" style="max-width: 200px" src="{{ asset('proof/'.$trans->proof) }}" alt="">
                                    </div>
                                </div>
                                <div class="btn-showcase mt-5">
                                    <a href="/uang" class="btn btn-primary" >Kembali</a>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    </div>
@endsection
