@extends('layouts.guest.main')
@section('content')
    @foreach($posts as $post)
        <div class="page-body">
            <div class="container-fluid">
                <div class="page-title">
                    <div class="row">
                        <div class="col-6">
                            @if( $post->category == '1' )
                                <h3>
                                    <span class="badge badge-success">Materi</span>
                                </h3>
                                    @elseif( $post->category == '2' )
                                <h3>
                                    <span class="badge badge-secondary">Pengumuman</span>
                                </h3>
                                            @endif
                        </div>
                        <div class="col-6">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/e-learning"> <i data-feather="home"></i></a></li>
                                <li class="breadcrumb-item active">Materi</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="blog-single">
                            <div class="blog-box blog-details">
                                <h2>{{ $post->title }}</h2>
                                <div class="blog-details">
                                    <ul class="blog-social">
                                        <li>{{ date('d F Y', strtotime($post->created_at)) }}</li>
                                        <li><i class="icofont icofont-user"></i>{{ $post->name }}</li>
                                        <li><i class="icofont icofont-book"></i>Materi</li>
                                        <a href="/download/{{ $post->file }}" class="btn btn-success f-right"><i class="fas fa-download"></i> Unduh Materi</a>
                                    </ul>
                                    <hr>
                                    <div class="single-blog-content-top">
                                        <div class="card p-5">
                                            {!! $post->contents !!}
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

@endsection
