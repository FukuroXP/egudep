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
                            <li class="breadcrumb-item"><a href="index.html"> <i data-feather="home"></i></a></li>
                            <li class="breadcrumb-item">Uang</li>
                            <li class="breadcrumb-item active">Transaksi</li>
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
                            <h5 class="pull-left">Transaksi</h5>
                            <div class="pull-right">
                                <h5>Angkatan </h5>
                                <div class="d-flex">
                                    <div>
                                        @foreach($balances as $balance)
                                            <h2>{{ $balance->name }}</h2>
                                        @endforeach
                                    </div>
                                    <div>
                                        <a href="/tabel_periode"><i class="fas fa-edit"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body add-post">
                            <form class="row needs-validation" novalidate="" action="transgo" method="post"
                                  enctype="multipart/form-data">
                                @csrf
                                <div class="col-sm-12">
                                    @foreach($balances as $balance)
                                        <input class="form-control col-sm-12" type="hidden" name="balances_id"
                                               value="{{ $balance->b_id }}">
                                    @endforeach
                                    <div class="mb-3">
                                        <div class="col-form-label">Jenis:
                                            <select class="form-control form-select col-sm-12" name="type">
                                                <option value="1">Uang Masuk</option>
                                                <option value="2">Uang Keluar</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="validationCustom01">Jumlah:</label>
                                        <input class="form-control" id="validationCustom01" type="number" name="amount"
                                               placeholder="Rp." required="">
                                    </div>
                                    <div class="mb-3">
                                        <label for="validationCustom01">Tanggal Transaksi:</label>
                                        <input class="form-control" id="validationCustom01" type="date"
                                               name="transaction_date" required="">
                                    </div>
                                    <div class="mb-3">
                                        <label for="validationCustom01">Deskripsi:</label>
                                        <textarea class="form-control" id="validationCustom01" type="text"
                                                  name="descriptions" required=""></textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label for="validationCustom01">Bukti Transaksi:</label>
                                        <input type="file" name="proof" class="form-control">
                                    </div>
                                </div>
                                <div class="btn-showcase mt-5">
                                    <button class="btn btn-primary" type="submit">Tambah</button>
                                    <input class="btn btn-light" type="reset" value="Discard">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Container-fluid Ends-->
    </div>

    {{--    <script>--}}
    {{--        $(document).ready(function () {--}}
    {{--            $('.date').datetimepicker({--}}
    {{--                format: 'DD/MM/YYYY',--}}
    {{--                locale: 'en'--}}
    {{--            });--}}
    {{--        });--}}
    {{--    </script>--}}
@endsection
