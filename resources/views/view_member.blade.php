@extends('layouts.main')

@section('content')
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-title">
                <div class="row">
                    <div class="col-6">
                        <h3>Anggota</h3>
                    </div>
                    <div class="col-6">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/home"> <i data-feather="users"></i></a></li>
                            <li class="breadcrumb-item">Anggota</li>
                            <li class="breadcrumb-item active">Detail Anggota</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        @foreach($members as $member)
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-8">
                    <div class="card card-absolute">
                            <div class="card-header bg-primary">
                                <h5 class="pull-left">{{ $member->title }}</h5>
                            </div>
                            <div class="card-body">
                                <div class="row" style="font-size: 20px">
                                    <div class="col-md-4">
                                        <img class="img-fluid" style="max-width: 200px" src="{{ asset('photo/'.$member->photo) }}" alt="">
                                    </div>
                                    <div class="col-md-8">
                                        <table class="product-page-width">
                                            <tbody>
                                            <tr>
                                                <td>Nama</td>
                                                <td> &nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;&nbsp;</td>
                                                <td>{{ $member->name }}</td>
                                            </tr>
                                            <tr>
                                                <td>Jabatan</td>
                                                <td> &nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;&nbsp;</td>
                                                <td>{{ $member->title }}</td>
                                            </tr>
                                            <tr>
                                                <td>Status</td>
                                                <td> &nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;&nbsp;</td>
                                                <td>
                                                    @if($member->status == '1')
                                                        <span class="badge badge-success">Aktif</span>
                                                    @elseif($member->status == '2')
                                                        <span class="badge badge-danger">Tidak Aktif</span>
                                                    @endif
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Telp</td>
                                                <td> &nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;&nbsp;</td>
                                                <td>{{ $member->contact }}</td>
                                            </tr>
                                            <tr>
                                                <td>jenis Kelamin</td>
                                                <td> &nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;&nbsp;</td>
                                                <td>{{ $member->gender }}</td>
                                            </tr>
                                            <tr>
                                                <td>Tanggal Lahir</td>
                                                <td> &nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;&nbsp;</td>
                                                <td>{{ date('d F Y', strtotime($member->birth_date)) }}</td>
                                            </tr>
                                            <tr>
                                                <td>Alamat</td>
                                                <td> &nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;&nbsp;</td>
                                                <td style="max-width: 400px">{{ $member->address }}</td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="btn-showcase mt-5">
                                    <a href="/anggota" class="btn btn-primary" >Kembali</a>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    </div>
@endsection
