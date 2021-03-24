@extends('layouts.main')

@section('content')
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-title">
                <div class="row">
                    <div class="col-6">
                        <h3>Tambah Angkatan</h3>
                    </div>
                    <div class="col-6">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/home"> <i data-feather="home"></i></a></li>
                            <li class="breadcrumb-item">Angkatan</li>
                            <li class="breadcrumb-item active">Tambah</li>
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
                        <div class="card-body add-post">
                            <form class="row needs-validation" novalidate="" action="perigo" method="post"
                                  enctype="multipart/form-data">
                                @csrf
                                <div class="col-sm-12">
                                    <div class="mb-3">
                                        <label for="validationCustom01">Angkatan:</label>
                                        <input class="form-control" id="validationCustom01" name="name" type="text"
                                               placeholder="Angkatan" required="">
                                        <input class="form-control" id="validationCustom01" name="status" type="hidden"
                                               required="" value="0">
                                    </div>
                                    <div class="mb-3">
                                        <label for="validationCustom01">Tanggal Mulai:</label>
                                        <input class="form-control" id="validationCustom01" type="date"
                                               name="start_date" placeholder="Mulai" required="">
                                    </div>
                                    <div class="mb-3">
                                        <label for="validationCustom01">Tanggal Selesai:</label>
                                        <input class="form-control" id="validationCustom01" type="date" name="end_date"
                                               placeholder="Selesai" required="">
                                    </div>
                                </div>
                                <div class="btn-showcase mt-5">
                                    <button class="btn btn-primary" type="submit">Tambah</button>
                                    <input class="btn btn-light" type="reset" value="Bersihkan">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Container-fluid Ends-->
    </div>
@endsection
