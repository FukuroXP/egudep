@extends('layouts.main')

@section('content')
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-title">
                <div class="row">
                    <div class="col-6">
                        <h3>Edit Kegiatan</h3>
                    </div>
                    <div class="col-6">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/home"> <i data-feather="home"></i></a></li>
                            <li class="breadcrumb-item">Kegiatan</li>
                            <li class="breadcrumb-item active">Edit Kegiatan</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- Container-fluid starts-->
        @foreach($activities as $activity)
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="pull-left">Kegiatan</h5>
                            </div>
                            <div class="card-body add-post">
                                <form class="row needs-validation" novalidate="" action="/actiup/{{ $activity->id }}" method="post"
                                      enctype="multipart/form-data">
                                    @csrf
                                    <div class="col-sm-12">
                                        <div class="mb-3">
                                            <label for="validationCustom01">Nama Kegiatan:</label>
                                            <input class="form-control" id="validationCustom01" name="name" type="text"
                                                   placeholder="Kegiatan" required="" value="{{ $activity->name }}">
                                        </div>
                                        <div class="mb-3">
                                            <label for="validationCustom01">Lokasi:</label>
                                            <input class="form-control" id="validationCustom01" name="location"
                                                   type="text" placeholder="Lokasi" required="" value="{{ $activity->location }}">
                                        </div>
                                        <div class="mb-3">
                                            <label for="validationCustom01">Peserta:</label>
                                            <input class="form-control" id="validationCustom01" type="text"
                                                   name="participant" placeholder="Peserta" required="" value="{{ $activity->participant }}">
                                        </div>
                                        <div class="mb-3">
                                            <label for="validationCustom01">Tanggal dan Waktu Mulai:</label>
                                            <input class="form-control" id="validationCustom01" type="text" onfocus="(this.type='datetime-local')"
                                                   name="start_datetime" placeholder="" required="" value="{{ $activity->start_datetime }}">
                                        </div>
                                        <div class="mb-3">
                                            <label for="validationCustom01">Tanggal dan Waktu Selesai:</label>
                                            <input class="form-control" id="validationCustom01" type="text" onfocus="(this.type='datetime-local')"
                                                   name="end_datetime" placeholder="{{ $activity->end_datetime }}" required="" value="{{ $activity->end_datetime }}">
                                        </div>
                                        <div class="mb-3">
                                            <label for="validationCustom01">Deskripsi:</label>
                                            <textarea class="form-control" id="validationCustom01" type="text"
                                                      name="description" placeholder="Deskripsi Kegiatan"
                                                      required="">{{ $activity->description }}</textarea>
                                        </div>
                                    </div>
                                    <div class="btn-showcase mt-5">
                                        <button class="btn btn-primary" type="submit">Simpan</button>
                                        <a href="/kegiatan" class="btn btn-danger" >Batal</a>
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
