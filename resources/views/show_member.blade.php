@extends('layouts.main')

@section('content')
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-title">
                <div class="row">
                    <div class="col-6">
                        <h3>Daftar Anggota</h3>
                    </div>
                    <div class="col-6">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/home"> <i data-feather="home"></i></a></li>
                            <li class="breadcrumb-item">Anggota</li>
                            <li class="breadcrumb-item active">Daftar Anggota</li>
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
                            <h5 class="pull-left">Anggota</h5>
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
                                <table class="stripe" id="show-hidden-row">
                                    <thead class="text-center">
                                    <tr>
                                        <th>ID</th>
                                        <th>Foto</th>
                                        <th>Nama</th>
                                        <th>Jabatan</th>
                                        <th>Telp</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Tanggal Lahir</th>
                                        <th>Alamat</th>
                                        <th>Status</th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($members as $member)
                                        <tr>
                                            <td class="text-center">{{ $member->id }}</td>
                                            <td><img width="80px" src="{{ asset('photo/'.$member->photo) }}"></td>
                                            <td>{{ $member->name }}</td>
                                            <td>{{ $member->title }}</td>
                                            <td>{{ $member->contact }}</td>
                                            <td>{{ $member->gender }}</td>
                                            <td>{{ date('d F Y', strtotime($member->birth_date)) }}</td>
                                            <td>{{ $member->address }}</td>
                                            <td>
                                                @if($member->status == '1')
                                                    <span class="badge badge-success">Aktif</span>
                                                @elseif($member->status == '2')
                                                    <span class="badge badge-danger">Tidak Aktif</span>
                                                @endif
                                            </td>
                                            <td>
                                                <form method="POST" action="{{ route('member.destroy', [$member->id]) }}">
                                                    {{ csrf_field() }}
                                                    {{ method_field('DELETE') }}
                                                    <div class="btn-group" role="group" aria-label="Basic example">
                                                        <button type="button" onclick="location.href='{{ route('member.view', [$member->id]) }}'" class="btn btn-info"><i
                                                                class="fas fa-eye"></i></button>
                                                        <button type="button" onclick="location.href='{{ route('member.edit', [$member->id]) }}'" class="btn btn-primary"><i
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
