@extends('layouts.main')

@section('content')
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-title">
                <div class="row">
                    <div class="col-6">
                        <h3>Daftar Kegiatan</h3>
                    </div>
                    <div class="col-6">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/home"> <i data-feather="home"></i></a></li>
                            <li class="breadcrumb-item active">Daftar Kegiatan</li>
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
                            <h5 class="pull-left">Kegiatan</h5>
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
                            <div class="dt-ext table-responsive">
                                <table class="stripe text-center" id="show-hidden-row">
                                    <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Kegiatan</th>
                                        <th>Lokasi</th>
                                        <th>Peserta</th>
                                        <th>Tanggal dan Waktu</th>
                                        <th>Lama Kegiatan</th>
                                        <th>Deskripsi</th>
                                        <th>Status</th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($activities as $activity)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $activity->name }}</td>
                                            <td>{{ $activity->location }}</td>
                                            <td>{{ $activity->participant }}</td>
                                            @if(date('d F Y', strtotime($activity->start_datetime)) == date('d F Y', strtotime($activity->end_datetime)))
                                                <td>{{ date('d F Y, H:i', strtotime($activity->start_datetime)) }}
                                                    -
                                                    {{ date('H:i', strtotime($activity->end_datetime)) }}
                                                </td>
                                            @else
                                                <td>{{ date('d F Y, H:i', strtotime($activity->start_datetime)) }} <br>
                                                    - <br>
                                                    {{ date('d F Y, H:i', strtotime($activity->end_datetime)) }}
                                                </td>
                                            @endif
                                            @php($long = strtotime($activity->end_datetime) - strtotime($activity->start_datetime))
                                            @if(floor($long / (60 * 60)) >= 24)
                                                <td>{{ floor($long / (60 * 60 * 24)) }} Hari</td>
                                            @else
                                                <td>{{ floor($long / (60 * 60)) }} Jam</td>
                                            @endif
                                            <td>{{ Str::limit($activity->description, 20) }}</td>
                                            <td>
                                                @if(\Carbon\Carbon::now() >= $activity->end_datetime)
                                                    <span class="badge badge-light-info">Selesai</span>
                                                @elseif(\Carbon\Carbon::now() >= $activity->start_datetime && \Carbon\Carbon::now() <= $activity->end_datetime)
                                                    <span class="badge badge-success">Berlangsung</span>
                                                @elseif(\Carbon\Carbon::now() < $activity->start_datetime)
                                                    <span class="badge badge-primary">Belum Terlaksana</span>
                                                    @endif
                                            </td>
                                            <td>
                                                <form method="POST" action="{{ route('activity.destroy', [$activity->id]) }}">
                                                    {{ csrf_field() }}
                                                    {{ method_field('DELETE') }}
                                                    <div class="btn-group" role="group" aria-label="Basic example">
                                                        <button type="button" onclick="location.href='{{ route('activity.view', [$activity->id]) }}'" class="btn btn-info"><i
                                                                class="fas fa-eye"></i></button>
                                                        <button type="button" onclick="location.href='{{ route('activity.edit', [$activity->id]) }}'" class="btn btn-primary"><i
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
