@extends('layouts.main')

@section('content')
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-title">
                <div class="row">
                    <div class="col-6">
                        <h3>Kegiatan</h3>
                    </div>
                    <div class="col-6">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/home"> <i data-feather="home"></i></a></li>
                            <li class="breadcrumb-item">Daftar Kegiatan</li>
                            <li class="breadcrumb-item active">Kegiatan</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        @foreach($activities as $activity)
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-8">
                    <div class="card card-absolute">
                        <div class="card-header bg-success">
                            <h5 class="pull-left">Kegiatan <i class="fas fa-flag"></i> </h5>
                        </div>
                            <div class="card-body">
                                <div class="row" style="font-size: 20px">
                                    <div class="col-md-12">
                                        <table class="product-page-width">
                                            <tbody>
                                            <tr>
                                                <td>Nama Kegiatan</td>
                                                <td> &nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;&nbsp;</td>
                                                <td>{{ $activity->name }}</td>
                                            </tr>
                                            <tr>
                                                <td>Lokasi</td>
                                                <td> &nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;&nbsp;</td>
                                                <td>{{ $activity->location }}</td>
                                            </tr>
                                            <tr>
                                                <td>Peserta</td>
                                                <td> &nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;&nbsp;</td>
                                                <td>{{ $activity->participant }}</td>
                                            </tr>
                                            <tr>
                                                <td>Lama Kegiatan</td>
                                                <td> &nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;&nbsp;</td>
                                                @php($long = strtotime($activity->end_datetime) - strtotime($activity->start_datetime))
                                                @if(floor($long / (60 * 60)) >= 24)
                                                    <td>{{ floor($long / (60 * 60 * 24)) }} Hari</td>
                                                @else
                                                    <td>{{ floor($long / (60 * 60)) }} Jam</td>
                                                @endif
                                            </tr>
                                            <tr>
                                                <td>Tanggal</td>
                                                <td> &nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;&nbsp;</td>
                                                @if(date('d F Y', strtotime($activity->start_datetime)) == date('d F Y', strtotime($activity->end_datetime)))
                                                    <td>{{ date('d F Y, H:i', strtotime($activity->start_datetime)) }}
                                                        -
                                                        {{ date('H:i', strtotime($activity->end_datetime)) }}
                                                    </td>
                                                @else
                                                    <td>{{ date('d F Y, H:i', strtotime($activity->start_datetime)) }}
                                                        -
                                                        {{ date('d F Y, H:i', strtotime($activity->end_datetime)) }}
                                                    </td>
                                                    @endif
                                            </tr>
                                            <tr>
                                                <td>Deskripsi</td>
                                                <td> &nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;&nbsp;</td>
                                                <td>{{ $activity->description }}</td>
                                            </tr>
                                            <tr>
                                                <td>Status</td>
                                                <td> &nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;&nbsp;</td>
                                                <td>
                                                    @if(\Carbon\Carbon::now() >= $activity->end_datetime)
                                                        <span class="badge badge-success">Selesai</span>
                                                    @elseif(\Carbon\Carbon::now() >= $activity->start_datetime && \Carbon\Carbon::now() <= $activity->end_datetime)
                                                        <span class="badge badge-warning">Berlangsung</span>
                                                    @elseif(\Carbon\Carbon::now() < $activity->start_datetime)
                                                        <span class="badge badge-dark">Belum Terlaksana</span>
                                                    @endif
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="btn-showcase mt-5">
                                    <a href="/kegiatan" class="btn btn-primary" >Kembali</a>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    </div>
@endsection
