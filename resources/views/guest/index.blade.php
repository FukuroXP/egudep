@extends('layouts.guest.main')
@section('content')

    <div class="page-body">
        <div class="container-fluid">
            <div class="page-title">
                <div class="row">
                    <div class="col-6">
                        <h3>Mome</h3>
                    </div>
                    <div class="col-6">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/e-learning"> <i data-feather="home"></i></a></li>
                            <li class="breadcrumb-item active">Home</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- Container-fluid starts-->
        <div class="container-fluid product-wrapper">
            <div class="product-grid mb-5">

                <div class="row col-12">
                    <h6>Kegiatan</h6>
                    <hr>
                    @foreach($activities as $activity)
                        <div class="col-sm-3">
                            <a href="{{ route('guest.activity.view', [$activity->id]) }}">
                                <div class="card o-hidden">
                                    @if(\Carbon\Carbon::now() >= $activity->end_datetime)
                                        <div class="ribbon ribbon-bookmark ribbon-vertical-right ribbon-success"><i class="fas fa-check"></i> </div>
                                    @elseif(\Carbon\Carbon::now() >= $activity->start_datetime && \Carbon\Carbon::now() <= $activity->end_datetime)
                                        <div class="ribbon ribbon-bookmark ribbon-vertical-right ribbon-warning"><i class="fas fa-play"></i> </div>
                                    @elseif(\Carbon\Carbon::now() < $activity->start_datetime)
                                        <div class="ribbon ribbon-bookmark ribbon-vertical-right ribbon-dark"><i class="fas fa-hourglass-start"></i> </div>
                                    @endif
                                    <div class="row no-gutters">
                                        <div class="col-auto">
                                            <img width="120" src="{{ asset('landing/5.jpg') }}" class="img-fluid" alt="">
                                        </div>
                                        <div class="col">
                                            <div class="card-block pt-3">
                                                <h6 class="text-dark">{{ Str::limit($activity->name, 20) }}</h6>
                                                <h6 class="text-secondary">Peserta : {{ $activity->participant }} <br>
                                                    Lokasi : {{ $activity->location }}</h6>
                                                <div class="text-dark" style="font-size: 10px; margin-top: auto">
                                                    @if(date('d F Y', strtotime($activity->start_datetime)) == date('d F Y', strtotime($activity->end_datetime))){{ date('d F Y, H:i', strtotime($activity->start_datetime)) }}
                                                    -
                                                    {{ date('H:i', strtotime($activity->end_datetime)) }}

                                                    @else{{ date('d F Y', strtotime($activity->start_datetime)) }}
                                                    -
                                                    {{ date('d F Y', strtotime($activity->end_datetime)) }}

                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                    <div class="col-12">
                        <a href="/kegiatan_" class="btn btn-link f-right">Semua <i class="fas fa-arrow-right"></i> </a>
                    </div>
                </div>

                <div class="row">
                    <h6>Materi</h6>
                    <hr>
                    <div class="col-md-6 products-total">
                        <div class="square-product-setting d-inline-block"><a class="icon-grid grid-layout-view"
                                                                              href="#" data-original-title=""
                                                                              title=""><i data-feather="grid"></i></a>
                        </div>
                        <div class="square-product-setting d-inline-block"><a class="icon-grid m-0 list-layout-view"
                                                                              href="#" data-original-title=""
                                                                              title=""><i data-feather="list"></i></a>
                        </div>
                        <span class="d-none-productlist filter-toggle">
                            <span class="ms-2"><i class="toggle-data" data-feather="chevron-down"></i></span></span>
                        <div class="grid-options d-inline-block">
                            <ul>
                                <li><a class="product-2-layout-view" href="#" data-original-title="" title=""><span
                                            class="line-grid line-grid-1 bg-primary"></span><span
                                            class="line-grid line-grid-2 bg-primary"></span></a></li>
                                <li><a class="product-3-layout-view" href="#" data-original-title="" title=""><span
                                            class="line-grid line-grid-3 bg-primary"></span><span
                                            class="line-grid line-grid-4 bg-primary"></span><span
                                            class="line-grid line-grid-5 bg-primary"></span></a></li>
                                <li><a class="product-4-layout-view" href="#" data-original-title="" title=""><span
                                            class="line-grid line-grid-6 bg-primary"></span><span
                                            class="line-grid line-grid-7 bg-primary"></span><span
                                            class="line-grid line-grid-8 bg-primary"></span><span
                                            class="line-grid line-grid-9 bg-primary"></span></a></li>
                                <li><a class="product-6-layout-view" href="#" data-original-title="" title=""><span
                                            class="line-grid line-grid-10 bg-primary"></span><span
                                            class="line-grid line-grid-11 bg-primary"></span><span
                                            class="line-grid line-grid-12 bg-primary"></span><span
                                            class="line-grid line-grid-13 bg-primary"></span><span
                                            class="line-grid line-grid-14 bg-primary"></span><span
                                            class="line-grid line-grid-15 bg-primary"></span></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div id="test" class="test product-wrapper-grid">
                <div class="row">
                    @foreach($posts as $post)
                        <div class="col-xl-2 col-sm-6 xl-4">
                            <div class="card">
                                <div class="product-box">
                                    @if( $post->category == '1' )
                                        <div class="product-img"><img class="img-fluid"
                                                                      src="{{ asset('landing/3.jpg') }}" alt="">
                                            @elseif( $post->category == '2' )
                                                <div class="product-img"><img class="img-fluid"
                                                                              src="{{ asset('landing/4.jpg') }}" alt="">
                                                    @endif
                                                    <div class="product-hover">
                                                        <ul>
                                                            <li>
                                                                <a href="/view/{{ $post->id }}" class="btn"><i
                                                                        class="fas fa-search"></i></a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="product-details">
                                                    <b>{{ Str::limit($post->title, 22) }}</b>
                                                    {{-- <p>{{ date('j F Y', strtotime($post->created_at)) }}</p> --}}
                                                    <p>{{ \Carbon\Carbon::parse($post->created_at)->diffForhumans() }}</p>
                                                </div>
                                        </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                </div>
            </div>
        </div>
        <!-- Container-fluid Ends-->
<script>
    $(window).on('resize', function() {
        if($(window).width() < 400) {
            $('#test').addClass('list-view');
        }
    })
</script>
@endsection
