@extends('user.index')

@section('content')
<div class="hero-wrap js-fullheight" style="background-image: url('images/bg_1.jpg');"
    data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-start"
            data-scrollax-parent="true">
            <div class="col-md-12 ftco-animate">
                <h2 class="subheading">Hello! Selamat datang di Sistem Informasi Ikatan Alumni Pesantren</h2>
                <h1 class="mb-4 mb-md-0">Al Binaa</h1>
                <div class="row">
                    <div class="col-md-7">
                        <div class="text">
                            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia,
                                there live the blind texts. Separated they live in Bookmarksgrove right at the coast of
                                the Semantics, a large language ocean.</p>
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

<section class="ftco-section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @forelse ($ceritas as $cerita)
                <div class="case">
                    <div class="row">
                        <div class="col-md-6 col-lg-6 col-xl-6 d-flex">
                            <a href="{{ route('cerita.detail', $cerita->id) }}" class="img w-100 mb-3 mb-md-0" style="background-image:url('{{ asset('admin/img/cerita/' . $cerita->foto) }}');"></a>
                        </div>
                        <div class="col-md-6 col-lg-6 col-xl-6 d-flex">
                            <div class="text w-100 pl-md-3">
                                <span class="subheading">ditulis Oleh  {{ $cerita->user->name }}</span>
                                <h2><a href="{{ route('cerita.detail', $cerita->id) }}">{{ $cerita->judul }}</a></h2>
                                <div class="meta">
                                    <p class="mb-0"><a href="{{ route('cerita.detail', $cerita->id) }}">{{ $cerita->created_at }}</a></p>
                                </div>
                            </div>
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
    </div>
</section> @endsection
