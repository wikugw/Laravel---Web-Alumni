@extends('user.index')

@section('content')
<div class="hero-wrap js-fullheight" style="background-image:url('{{  asset('user/images/bg_2.jpg')}}');"
    data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-start"
            data-scrollax-parent="true">
            <div class="col-md-12 ftco-animate">
                <h2 class="subheading">Hello! Selamat datang di Sistem Informasi Ikatan Alumni Pesantren</h2>
                <h1 class="mb-4 mb-md-0" style="color: black">Al Binaa</h1>
                <div class="row">
                    <div class="col-md-7">
                        <div class="text">
                            <div class="mouse">
                                <a href="#" class="mouse-icon">
                                    <div class="mouse-wheel"><span class="ion-ios-arrow-round-down"></span></div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<section class="ftco-section bg-light">
    <div class="container">
        <div class="row d-flex">
            @forelse ($ceritas as $cerita)
            <div class="col-md-4  ftco-animate">
                <div class="blog-entry justify-content-end">
                    <a href="{{ route('cerita.detail', $cerita->id) }}" class="block-20"
                        style="background-image:url('{{ $cerita->foto ?  $cerita->foto : asset('admin/img/cerita/default.jpg')}}');">
                    </a>
                    <div class="text p-4 float-right d-block">
                        <div class="topper d-flex align-items-center">
                            <div class="one py-2 pl-3 pr-1 align-self-stretch">
                                <span class="day">{{ $cerita->created_at->format('d') }}</span>
                            </div>
                            <div class="two pl-0 pr-3 py-2 align-self-stretch">
                                <span class="yr">{{ $cerita->created_at->format('Y') }}</span>
                                <span class="mos">{{ $cerita->created_at->format('M') }}</span>
                            </div>
                        </div>
                        <h3 class="heading mb-3"><a
                                href="{{ route('cerita.detail', $cerita->id) }}">{{ $cerita->judul }}</a></h3>
                        <p><a href="{{ route('cerita.detail', $cerita->id) }}" class="btn-custom"><span
                                    class="ion-ios-arrow-round-forward mr-3"></span>Read more</a></p>
                    </div>
                </div>
            </div>
            @empty
            <div class="row justify-content-center align-items-center">
                <p>Belum ada cerita yang ditambahkan</p>
            </div>
            @endforelse

        </div>
    </div>
</section>
@endsection
