@extends('layouts.main')
@section('content')

    <!-- Page Sidebar Ends-->
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-title">
                <div class="row">
                    <div class="col-6">
                        <h3>Home</h3>
                    </div>
                    <div class="col-6">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/home"> <i data-feather="home"></i></a></li>
                            <li class="breadcrumb-item">Dashboard</li>
                            <li class="breadcrumb-item active">Home</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- Container-fluid starts-->
        <div class="container-fluid">
            <div class="row second-chart-list third-news-update">
                <div class="col-xl-6 col-lg-12 xl-50 morning-sec box-col-12">
                    <div class="card o-hidden profile-greeting">
                        <div class="card-body">
                            <div class="media">
                                <div class="badge-groups w-100">
                                    {{-- <div class="badge f-12"><i class="me-1" data-feather="clock"></i><span id="txt"></span></div> --}}
                                    {{-- <div class="badge f-12"><i class="fa fa-spin fa-cog f-14"></i></div> --}}
                                </div>
                            </div>
                            <div class="greeting-user text-center">
                                <h4 class="f-w-600"><span id="greeting">Good Morning</span> <span
                                        class="right-circle"><i class="fa fa-check-circle f-14 middle"></i></span></h4>
                                <p><span>Selamat datang di Aplikasi E-Gudep</span></p>
                                @foreach($periods as $period)
                                    <div class="whatsnew-btn"><a class="btn btn-primary">Angkatan {{ $period->name }}</a>
                                    </div>
                                @endforeach
                                {{-- <div class="left-icon"><i class="fa fa-bell"> </i></div> --}}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row col-xl-6 xl-100 dashboard-sec box-col-12">
                    <div class="col-sm-6 col-xl-6 col-lg-6">
                        <a href="/anggota">
                            <div class="card o-hidden">
                                <div class="bg-info b-r-4 card-body">
                                    <div class="media static-top-widget">
                                        <div class="align-self-center text-center"><i data-feather="users"></i></div>
                                        <div class="media-body"><span class="m-0">Anggota</span>
                                            <h4 class="mb-0 counter">{{ $members }}</h4><i class="icon-bg"
                                                                                           data-feather="users"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-sm-6 col-xl-6 col-lg-6">
                        <a href="/kegiatan">
                            <div class="card o-hidden">
                                <div class="bg-secondary b-r-4 card-body">
                                    <div class="media static-top-widget">
                                        <div class="align-self-center text-center"><i data-feather="flag"></i></div>
                                        <div class="media-body"><span class="m-0">Kegiatan</span>
                                            <h4 class="mb-0 counter">{{ $activity }}</h4><i class="icon-bg"
                                                                                              data-feather="flag"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-sm-6 col-xl-6 col-lg-6">
                        <a href="/showpost">
                            <div class="card o-hidden">
                                <div class="bg-primary b-r-4 card-body">
                                    <div class="media static-top-widget">
                                        <div class="align-self-center text-center"><i data-feather="book"></i></div>
                                        <div class="media-body"><span class="m-0">Kepramukaan</span>
                                            <h4 class="mb-0 counter">{{ $posts }}</h4><i class="icon-bg"
                                                                                         data-feather="book"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-sm-6 col-xl-6 col-lg-6">
                        @foreach($periods as $balance)
                            <a href="/uang">
                                <div class="card o-hidden">
                                    <div class="bg-success b-r-4 card-body">
                                        <div class="media static-top-widget">
                                            <div class="align-self-center text-center"><i data-feather="credit-card"></i>
                                            </div>
                                            <div class="media-body"><span class="m-0">Saldo {{ $balance->name }}</span>
                                                <h4 class="mb-0 counter">
                                                    RP. {{ number_format($balance->balance, 0, ',','.') }}</h4><i
                                                    class="icon-bg" data-feather="credit-card"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
                <div class="col-xl-6 xl-100 box-col-12">
                    <div class="card card-absolute">
                        <div class="card-header bg-secondary">
                            <h5 class="pull-left"><i class="fas fa-flag"></i> Kegiatan yang akan datang</h5>
                        </div>
                        <div class="card-body">
                                @if(!$activities->isEmpty())
                            <div class="dt-ext table-responsive">
                                <table class="text-left table table-striped table-borderless" id="">
                                    <thead>
                                    <tr>
                                        <th>Pelakasanaan</th>
                                        <th>Nama Kegiatan</th>
                                        <th>Lokasi</th>
                                        <th>Peserta</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($activities as $activity)
                                        <tr>
                                            <td>{{ \Carbon\Carbon::parse($activity->start_datetime)->diffForhumans() }}</td>
                                            <td>{{ $activity->name }}</td>
                                            <td>{{ $activity->location }}</td>
                                            <td>{{ $activity->participant }}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                                @else
                                    <h4 class="text-center">Belum ada kegiatan baru</h4>
                                @endif
                        </div>
                    </div>
                </div>

                <div class="col-xl-6 xl-100 box-col-12">
                    <div class="card card-absolute">
                        <div class="card-header bg-success">
                            <h5 class="pull-left"><i class="fas fa-exchange"></i> Transaksi Terbaru</h5>
                        </div>
                        <div class="card-body">
                            @if(!$balances->isEmpty())
                            <div class="dt-ext table-responsive">
                                <table class="text-left table table-striped table-borderless" id="">
                                    <thead>
                                    <tr>
                                        <th>Tanggal</th>
                                        <th>Jenis</th>
                                        <th>Jumlah</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($balances as $balance)
                                        <tr>
                                            <td>{{ date('d F Y', strtotime($balance->transaction_date)) }}</td>
                                            <td>
                                                @if($balance->type == '1')
                                                    <span class="badge badge-success">Uang Masuk</span>
                                                @elseif($balance->type == '2')
                                                    <span class="badge badge-danger">Uang Keluar</span>
                                                @endif
                                            </td>
                                            <td>Rp. {{ number_format($balance->amount, 0, ',','.') }}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            @else
                                <h4 class="text-center">Belum ada transaksi baru</h4>
                            @endif
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!-- Container-fluid Ends-->
    </div>
    <!-- footer start-->

@endsection
