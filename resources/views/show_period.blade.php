@extends('layouts.main')

@section('content')
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-title">
                <div class="row">
                    <div class="col-6">
                        <h3>Daftar Angkatan</h3>
                    </div>
                    <div class="col-6">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/home"> <i data-feather="home"></i></a></li>
                            <li class="breadcrumb-item">Angkatan</li>
                            <li class="breadcrumb-item active">Daftar Angkatan</li>
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
                            <h5>Angkatan</h5>
                        </div>
                        <div class="card-body">
                            <div class="dt-ext table-responsive">
                                <table class="display text-center" id="show-hidden-row">
                                    <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Periode</th>
                                        <th>Tanggal Mulai</th>
                                        <th>tanggal Selesai</th>
                                        <th>Status</th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($periods as $period)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $period->name }}</td>
                                            <td>{{ $period->start_date }}</td>
                                            <td>{{ $period->end_date }}</td>
                                            <td>
                                                @if($period->status == '1')
                                                    <span class="badge badge-success">Periode Aktif</span>
                                                @elseif($period->status == '0')
                                                    <span class="badge badge-danger">Periode Tidak Aktif</span>
                                                @endif
                                            </td>
                                            <td>
                                                <form action="/set_active/{{ $period->id }}" method="post"
                                                      enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="btn-group" role="group" aria-label="Basic example">
                                                        @if($period->status == '1')
                                                            <button type="button" disabled class="btn btn-success"><i
                                                                    class="fas fa-check"></i></button>
                                                        @elseif($period->status == '0')
                                                            <button type="submit"
                                                                    class="btn btn-outline-success-2x text-success"><i
                                                                    class="fas fa-check"></i></button>
                                                        @endif
                                                        <button onclick="location.href='/home'" type="button"
                                                                class="btn btn-primary"><i class="fas fa-edit"></i>
                                                        </button>
                                                        <button type="button" class="btn btn-danger"><i
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
