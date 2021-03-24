@extends('layouts.main')

@section('content')
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-title">
                <div class="row">
                    <div class="col-6">
                        <h3>Tambah Kegiatan</h3>
                    </div>
                    <div class="col-6">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html"> <i data-feather="home"></i></a></li>
                            <li class="breadcrumb-item">Kegiatan</li>
                            <li class="breadcrumb-item active">Tambah</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- Container-fluid starts-->
        @foreach($periods as $period)
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
                                            <h2>{{ $period->name }}</h2>
                                        </div>
                                        <div>
                                            <a href="/tabel_periode"><i class="fas fa-edit"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body add-post">
                                <form class="row needs-validation" novalidate="" action="actigo" method="post"
                                      enctype="multipart/form-data">
                                    @csrf
                                    <input class="form-control" id="validationCustom01" name="period_id" type="hidden"
                                           value="{{ $period->id }}" required="">
                                    <div class="col-sm-12">
                                        <div class="mb-3">
                                            <label for="validationCustom01">Nama Kegiatan:</label>
                                            <input class="form-control" id="validationCustom01" name="name" type="text"
                                                   placeholder="Kegiatan" required="">
                                        </div>
                                        <div class="mb-3">
                                            <label for="validationCustom01">Lokasi:</label>
                                            <input class="form-control" id="validationCustom01" name="location"
                                                   type="text" placeholder="Lokasi" required="">
                                        </div>
                                        <div class="mb-3">
                                            <label for="validationCustom01">Peserta:</label>
                                            <input class="form-control" id="validationCustom01" type="text"
                                                   name="participant" placeholder="Peserta" required="">
                                        </div>
                                        <div class="mb-3">
                                            <label for="validationCustom01">Tanggal dan Waktu Mulai:</label>
                                            <input class="form-control" id="validationCustom01" type="datetime-local"
                                                   name="start_datetime" placeholder="" required="">
                                        </div>
                                        <div class="mb-3">
                                            <label for="validationCustom01">Tanggal dan Waktu Selesai:</label>
                                            <input class="form-control" id="validationCustom01" type="datetime-local"
                                                   name="end_datetime" placeholder="" required="">
                                        </div>
                                        <div class="mb-3">
                                            <label for="validationCustom01">Deskripsi:</label>
                                            <textarea class="form-control" id="validationCustom01" type="text"
                                                      name="description" placeholder="Deskripsi Kegiatan"
                                                      required=""></textarea>
                                        </div>
                                    </div>
                                    <div class="btn-showcase mt-5">
                                        <button class="btn btn-primary" type="submit">Tambah</button>
                                        <input class="btn btn-light" type="reset" value="Bershikan">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    @endforeach
    <!-- Container-fluid Ends-->
    </div>
@endsection
