@extends('user.index')

@section('content')
@section('content')
<section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('images/bg_1.jpg');"
    data-stellar-background-ratio="0.5">
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
                        <p>Angkatan {{ $alumniDetail->angkatan }}</p>
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
                                                <div class="col-3">
                                                    <span class="icon-phone"></span>
                                                </div>
                                                <div class="col-1">
                                                    <span>:</span>
                                                </div>
                                                <div class="col-7">
                                                    <span>{{ $alumniDetail->no_hp }}</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="row">
                                                <div class="col-3">
                                                    <span class="icon-envelope"></span>
                                                </div>
                                                <div class="col-1">
                                                    <span>:</span>
                                                </div>
                                                <div class="col-7">
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
                                                <a
                                                    href="{{ $alumniDetail->facebook }}">{{ $alumniDetail->facebook }}</a>
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
                                                <a href="{{ $alumniDetail->twitter }}">{{ $alumniDetail->twitter }}</a>
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
                                                <a
                                                    href="{{ $alumniDetail->instagram }}">{{ $alumniDetail->instagram }}</a>
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
            <div class="col-lg-6">
                <img class="img-thumbnail" src="{{ URL::asset('admin/img/user/' . $alumniDetail->foto) }}" />
            </div>
        </div>
    </div>
</section>

@endsection
