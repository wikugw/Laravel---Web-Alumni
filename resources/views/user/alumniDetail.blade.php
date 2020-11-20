@extends('user.index')

@section('content')
@section('content')
<section class="hero-wrap hero-wrap-2 js-fullheight"
    style="background-image:url('{{  asset('user/images/bg_4.jpg')}}');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-center">
            <div class="col-md-9 ftco-animate   text-center">
                <h1 class="mb-3  bread">Biodata Alumni</h1>
                <p class="breadcrumbs"><span class="mr-2"><a href="#">{{ $alumniDetail->user->name }}</a></span></p>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section ftco-no-pt ftco-no-pb">
    <div class="container">
        <div class="row align-items-center py-3">
            <div class="col-lg-6">
                <div class="row justify-content-start pt-3 pb-3">
                    <div class="col-md-12 heading-section ftco-animate">
                        <span class="subheading">{{ $alumniDetail->jurusan }}</span>
                        <h2>{{ $alumniDetail->user->name }}</h2>
                        <p>Angkatan {{ $alumniDetail->angkatan }} | {{ $alumniDetail->kelamin }}</p>
                        <p> {{ $alumniDetail->title }}</p>
                        <div class="tabulation-2 mt-4">
                            <ul class="nav nav-pills nav-fill d-md-flex d-block">
                                <li class="nav-item mb-md-0 mb-2">
                                    <a class="nav-link active py-2" data-toggle="tab" href="#home1">Biodata</a>
                                </li>
                                <li class="nav-item px-lg-2 mb-md-0 mb-2">
                                    <a class="nav-link py-2" data-toggle="tab" href="#home2">Alamat</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link py-2 mb-md-0 mb-2" data-toggle="tab" href="#home3">Sosmed</a>
                                </li>
                            </ul>
                            <div class="tab-content bg-light rounded mt-2">
                                <div class="tab-pane container p-0 active" id="home1">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="row">
                                                <div class="col-2">
                                                    <span class="icon-phone"></span>
                                                </div>
                                                <div class="col-8">
                                                    <span>{{ $alumniDetail->no_hp }}</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="row">
                                                <div class="col-2">
                                                    <span class="icon-envelope"></span>
                                                </div>
                                                <div class="col-8">
                                                    <span>{{ $alumniDetail->user->email }}</span>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="tab-pane container p-0 fade" id="home2">
                                    <p>{{ $alumniDetail->alamat }}</p>
                                </div>
                                <div class="tab-pane container p-0 fade" id="home3">
                                    @if ($alumniDetail->facebook)
                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-3">
                                                <span class="icon-facebook"></span>
                                            </div>
                                            <div class="col-1">
                                                <span>:</span>
                                            </div>
                                            <div class="col-7">
                                                <a href="{{ $alumniDetail->facebook }}"
                                                    target="_blank">{{ $alumniDetail->facebook }}</a>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                    @if ($alumniDetail->twitter)
                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-3">
                                                <span class="icon-twitter"></span>
                                            </div>
                                            <div class="col-1">
                                                <span>:</span>
                                            </div>
                                            <div class="col-7">
                                                <a href="{{ $alumniDetail->twitter }}"
                                                    target="_blank">{{ $alumniDetail->twitter }}</a>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                    @if ($alumniDetail->instagram)
                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-3">
                                                <span class="icon-instagram"></span>
                                            </div>
                                            <div class="col-1">
                                                <span>:</span>
                                            </div>
                                            <div class="col-7">
                                                <a href="{{ $alumniDetail->instagram }}"
                                                    target="_blank">{{ $alumniDetail->instagram }}</a>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 px-2">
                <img class="img-thumbnail"
                    src="{{ ($alumniDetail->foto ?  $alumniDetail->foto : URL::asset('admin/img/user/default.png')) }}"
                    style="width: 100%" />
            </div>
        </div>
    </div>

    <div class="container mt-5">
        <h2>Cerita dari {{ $alumniDetail->user->name }}</h2>
        <div class="row d-flex mt-3">
            @forelse ($ceritas as $cerita)
            <div class="col-md-4 d-flex ftco-animate">
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
                <p class="text-center">Belum ada cerita yang ditambahkan</p>
            </div>
            @endforelse

        </div>
    </div>
</section>

@endsection
