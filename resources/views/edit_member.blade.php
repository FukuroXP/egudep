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
        @foreach($members as $member)
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="pull-left">Anggota</h5>
                            </div>
                            <div class="card-body add-post">
                                <form class="row needs-validation" novalidate="" action="/membup/{{ $member->id }}" method="post"
                                      enctype="multipart/form-data">
                                    @csrf
                                    <div class="col-sm-12">
                                        <div class="mb-3">
                                            <label for="validationCustom01">Nama:</label>
                                            <input class="form-control" id="validationCustom01" name="name" type="text"
                                                   placeholder="Nama" required="" value="{{ $member->name }}">
                                            <div class="valid-feedback">Looks good!</div>
                                        </div>
                                        <div class="mb-3">
                                            <div class="col-form-label">Jabatan:
                                                <select class="form-control form-select col-sm-12" name="title">
                                                    <option value="{{ $member->title }}">{{ $member->title }}</option>
                                                    <option value="Anggota">Anggota</option>
                                                    <option value="Ketua">Ketua</option>
                                                    <option value="Wakil Ketua">Wakil Ketua</option>
                                                    <option value="Sekertaris">Sekertaris</option>
                                                    <option value="Bendahara">Bendahara</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <div class="col-form-label">Status:
                                                <select class="form-control form-select col-sm-12" name="status">
                                                    @if($member->status == '1')
                                                        <option value="1">Aktif</option>
                                                        <option value="2">Tidak Aktif</option>
                                                    @elseif($member->status == '2')
                                                        <option value="2">Tidak Aktif</option>
                                                        <option value="1">Aktif</option>
                                                    @endif
                                                </select>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="validationCustom01">Telp:</label>
                                            <input class="form-control" id="validationCustom01" type="number"
                                                   name="contact" placeholder="Nomer Telepon" required="" value="{{ $member->contact }}">
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
                                                      name="address" placeholder="Alamat" required="">{{ $member->address }}</textarea>
                                        </div>
                                        <div class="mb-3">
                                            <label for="validationCustom01">Tanggal Lahir:</label>
                                            <input class="form-control" id="validationCustom01" type="date"
                                                   name="birth_date" placeholder="" required="" value="{{ $member->birth_date }}">
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="validationCustom01">Foto:</label>
                                        <br>
                                        <img class="img-fluid" style="max-width: 200px" src="{{ asset('photo/'.$member->photo) }}" alt="">
                                        <input type="file" name="photo" class="form-control mt-2" value="value="{{ $member->photo }}"">
                                    </div>
                                    <div class="btn-showcase mt-5">
                                        <button class="btn btn-primary" type="submit">Simpan</button>
                                        <a href="/anggota" class="btn btn-danger">Batal</a>
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
