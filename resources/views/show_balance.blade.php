@extends('layouts.main')

@section('content')
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-title">
                <div class="row">
                    <div class="row col-6">
                        <div class="col-2">
                            <h3>Tabel Keuangan</h3>
                        </div>
                    </div>
                    <div class="col-6">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/home"> <i data-feather="home"></i></a></li>
                            <li class="breadcrumb-item">Uang</li>
                            <li class="breadcrumb-item active">Tabel Keuangan</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <!-- Container-fluid starts-->
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="pull-left">Keuangan</h5>
                            <div class="pull-right">
                                <h5>Angkatan </h5>
                                <div class="d-flex">
                                    <div>
                                        @foreach($periods as $period)
                                            <h2>{{ $period->name }}</h2>
                                        @endforeach
                                    </div>
                                    <div>
                                        <a href="/tabel_periode"><i class="fas fa-edit"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            @foreach($periods as $balance)
                                <h4>Saldo : Rp. {{ number_format($balance->balance, 0, ',','.') }}</h4>
                                <hr class="col-3">
                            @endforeach
                            <div class="dt-ext table-responsive">
                                <table class="stripe text-center" id="export-button">
                                    <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Jenis</th>
                                        <th>Jumlah</th>
                                        <th>Tanggal</th>
                                        <th>Deskripsi</th>
                                        <th>Bukti Transaksi</th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($balances as $balance)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>
                                                @if($balance->type == '1')
                                                    <span class="badge badge-success">Uang Masuk</span>
                                                @elseif($balance->type == '2')
                                                    <span class="badge badge-danger">Uang Keluar</span>
                                                @endif
                                            </td>
                                            <td>Rp. {{ number_format($balance->amount, 0, ',','.') }}</td>
                                            <td>{{ date('d-m-Y', strtotime($balance->transaction_date)) }}</td>
                                            <td>{{ $balance->descriptions }}</td>
                                            <td><img width="80px" src="{{ asset('proof/'.$balance->proof) }}" alt=""></td>
                                            <td>
                                                <form method="POST" action="{{ route('trans.destroy', [$balance->t_id]) }}">
                                                    {{ csrf_field() }}
                                                    {{ method_field('DELETE') }}
                                                <div class="btn-group" role="group" aria-label="Basic example">
                                                    <button type="button" onclick="location.href='{{ route('trans.view', [$balance->t_id]) }}'" class="btn btn-info"><i
                                                            class="fas fa-eye"></i></button>
                                                    <button type="button" onclick="location.href='{{ route('trans.edit', [$balance->t_id]) }}'" class="btn btn-primary"><i
                                                            class="fas fa-edit"></i></button>
                                                    <button type="submit" onclick="archiveFunction()"  class="btn btn-secondary delete1"><i
                                                            class="fas fa-trash"></i></button>
                                                </div>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Container-fluid Ends-->



    </div>
@endsection
