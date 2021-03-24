@extends('layouts.guest.main')
@section('content')

    <div class="page-body">
        <div class="container-fluid">
            <div class="page-title">
                <div class="row">
                    <div class="col-6">
                        <h3>Kegiatan</h3>
                    </div>
                    <div class="col-6">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/e-learning"> <i data-feather="home"></i></a></li>
                            <li class="breadcrumb-item active">Kegiatan</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- Container-fluid starts-->
        <div class="container-fluid product-wrapper">
            <div class="product-grid mb-5">

                <div class="row col-12">
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

                </div>

            </div>
        </div>
    </div>

@endsection
