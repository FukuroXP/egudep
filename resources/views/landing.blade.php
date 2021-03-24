@extends('layouts.app')

<style>
    .iconlan {
        max-width: 200px;
    }

    .bs {
        border: 0;
        overflow: hidden;
        border-radius: 10px;
        box-shadow: 0px 0px 20px -1px rgba(0, 0, 0, 0.2);
    }
</style>

@section('content')
    <div class="container mt-5 pt-5">
        <div class="bs bg-white pt-5 pb-5 text-center">
            <img class="mb-4" style="max-width: 300px" src="{{ asset('landing/eg0.png') }}">
            <h3 class="mb-5">Selamat Datang di Aplikasi E-Gudep</h3>

            <div class="row justify-content-center">

                <div class="col-2 text-center">
                    <a href="/e-learning" class="btn">
                        <div class="bs">
                            <img class="iconlan" src="{{ asset('landing/1.png') }}">
                        </div>
                        <h4>E-Learning</h4>
                    </a>
                </div>

                <div class="col-2 text-center">
                    <a class="btn" href="/home">
                        <div class="bs">
                            <img class="iconlan" src="{{ asset('landing/2.png') }}">
                        </div>
                        <h4>Administrasi</h4>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
