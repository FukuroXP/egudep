@extends('layouts.guest.main')
@section('content')

    <div class="page-body">
        <div class="container-fluid">
            <div class="page-title">
                <div class="row">
                    <div class="col-6">
                        <h3>Keanggotaan</h3>
                    </div>
                    <div class="col-6">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/e-learning"> <i data-feather="home"></i></a></li>
                            <li class="breadcrumb-item active">Keanggotaan</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- Container-fluid starts-->
        <div class="container-fluid product-wrapper">
            <div class="product-grid mb-5">

                <div class="row col-12 justify-content-center">
                    <h6>Pimpinan</h6>
                    <hr>
                    @foreach($members as $member)
                        @if($member->title == 'Ketua' || $member->title == 'Wakil Ketua')
                            <div class="col-sm-3">
                                <div class="card o-hidden">
                                    <div class="row no-gutters">
                                        <div class="col-auto">
                                            <img style="height: 120px; width: 120px" src="{{ asset('photo/'.$member->photo) }}" class="img-fluid" alt="">
                                        </div>
                                        <div class="col">
                                            <div class="card-block pt-3">

                                                <h5>{{ $member->name }}</h5>
                                                <h6>
                                                    {{ $member->title }}
                                                </h6>
                                                @if($member->status == '1')
                                                    <span class="badge badge-success">Aktif</span>
                                                @elseif($member->status == '2')
                                                    <span class="badge badge-danger">Tidak Aktif</span>
                                                @endif

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach

                    <h6>BPH</h6>
                    <hr>
                    @foreach($members as $member)
                        @if($member->title == 'Sekertaris' || $member->title == 'Bendahara')
                            <div class="col-sm-3">
                                <div class="card o-hidden">
                                    <div class="row no-gutters">
                                        <div class="col-auto">
                                            <img style="height: 120px; width: 120px" src="{{ asset('photo/'.$member->photo) }}" class="img-fluid" alt="">
                                        </div>
                                        <div class="col">
                                            <div class="card-block pt-3">

                                                <h5>{{ $member->name }}</h5>
                                                <h6>
                                                    {{ $member->title }}
                                                </h6>
                                                @if($member->status == '1')
                                                    <span class="badge badge-success">Aktif</span>
                                                @elseif($member->status == '2')
                                                    <span class="badge badge-danger">Tidak Aktif</span>
                                                @endif

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach

                    <h6>Anggota</h6>
                    <hr>
                    @foreach($members as $member)
                        @if($member->title == 'Anggota')
                            <div class="col-sm-3">
                                <div class="card o-hidden">
                                    <div class="row no-gutters">
                                        <div class="col-auto">
                                            <img style="height: 120px; width: 120px" src="{{ asset('photo/'.$member->photo) }}" class="img-fluid" alt="">
                                        </div>
                                        <div class="col">
                                            <div class="card-block pt-3">

                                                <h5>{{ $member->name }}</h5>
                                                <h6>
                                                    {{ $member->title }}
                                                </h6>
                                                @if($member->status == '1')
                                                    <span class="badge badge-success">Aktif</span>
                                                @elseif($member->status == '2')
                                                    <span class="badge badge-danger">Tidak Aktif</span>
                                                @endif

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
                </div>
            </div>
        </div>
        <!-- Container-fluid Ends-->
@endsection
