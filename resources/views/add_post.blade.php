@extends('layouts.main')

@section('content')
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-title">
                <div class="row">
                    <div class="col-6">
                        <h3>Tambah Post</h3>
                    </div>
                    <div class="col-6">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/home"> <i data-feather="home"></i></a></li>
                            <li class="breadcrumb-item">Post</li>
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
                            <h5>Post</h5>
                        </div>
                        <div class="card-body add-post">
                            <form class="row needs-validation" novalidate="" action="postgo" method="post"
                                  enctype="multipart/form-data">
                                @csrf
                                <input name="user_id" type="hidden" value="{{ auth()->user()->id }}">
                                <div class="col-sm-12">
                                    <div class="mb-3">
                                        <label for="validationCustom01">Judul:</label>
                                        <input name="title" class="form-control" id="validationCustom01" type="text"
                                               placeholder="Judul" required="">
                                        <div class="valid-feedback">Looks good!</div>
                                    </div>
                                    <div class="mb-3">
                                        <div class="col-form-label">Kategori:
                                            <select name="category" class="col-sm-12 form-select form-control">
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-form-label mb-3">Materi:
                                        <textarea class="form-control" name="contents" id="editor"></textarea>
                                    </div>
                                    <script>
                                        ClassicEditor
                                            .create(document.querySelector('#editor'))
                                            .catch(error => {
                                                console.error(error);
                                            });
                                    </script>
                                </div>
                                <div class="mb-3">
                                    <label for="validationCustom01">PDF:</label>
                                    <input type="file" name="file" class="form-control">
                                </div>

                                {{--                            <form class="dropzone" id="singleFileUpload" action="https://admin.pixelstrap.com/upload.php">--}}
                                {{--                                <div class="m-0 dz-message needsclick"><i class="fa fa-upload"></i>--}}
                                {{--                                    <h6 class="mb-0">Drop files here or click to upload.</h6>--}}
                                {{--                                </div>--}}
                                {{--                            </form>--}}


                                <div class="btn-showcase mt-5">
                                    <button class="btn btn-primary" type="submit">Simpan</button>
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
