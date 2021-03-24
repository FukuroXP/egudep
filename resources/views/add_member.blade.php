@extends('layouts.main')

@section('content')
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-title">
                <div class="row">
                    <div class="col-6">
                        <h3>Tambah Anggota</h3>
                    </div>
                    <div class="col-6">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html"> <i data-feather="home"></i></a></li>
                            <li class="breadcrumb-item">Anggota</li>
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
                                <h5 class="pull-left">Anggota</h5>
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
                                <form class="row needs-validation" novalidate="" action="membgo" method="post"
                                      enctype="multipart/form-data">
                                    @csrf
                                    <input class="form-control" id="validationCustom01" name="period_id" type="hidden"
                                           value="{{ $period->id }}" required="">
                                    <input class="form-control" id="validationCustom01" name="status" type="hidden"
                                           value="1" required="">
                                    <div class="col-sm-12">
                                        <div class="mb-3">
                                            <label for="validationCustom01">Nama:</label>
                                            <input class="form-control" id="validationCustom01" name="name" type="text"
                                                   placeholder="Nama" required="">
                                            <div class="valid-feedback">Looks good!</div>
                                        </div>
                                        <div class="mb-3">
                                            <div class="col-form-label">Jabatan:
                                                <select class="form-control form-select col-sm-12" name="title">
                                                    <option value="Anggota">Anggota</option>
                                                    <option value="Ketua">Ketua</option>
                                                    <option value="Wakil Ketua">Wakil Ketua</option>
                                                    <option value="Sekertaris">Sekertaris</option>
                                                    <option value="Bendahara">Bendahara</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="validationCustom01">Telp:</label>
                                            <input class="form-control" id="validationCustom01" type="number"
                                                   name="contact" placeholder="Nomer Telepon" required="">
                                        </div>
                                        <div class="mb-3">
                                            <div class="col-form-label">Jenis Kelamin:
                                                <select class="form-control form-select col-sm-12" name="gender">
                                                    <option value="L">Laki-laki</option>
                                                    <option value="P">Perempuan</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="validationCustom01">Alamat:</label>
                                            <textarea class="form-control" id="validationCustom01" type="text"
                                                      name="address" placeholder="Alamat" required=""></textarea>
                                        </div>
                                        <div class="mb-3">
                                            <label for="validationCustom01">Tanggal Lahir:</label>
                                            <input class="form-control" id="validationCustom01" type="date"
                                                   name="birth_date" placeholder="" required="">
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="validationCustom01">Foto:</label>
                                        <input type="file" name="photo" class="form-control">
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
