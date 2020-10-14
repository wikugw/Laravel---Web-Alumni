@extends('user.index')

@section('content')
<section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('images/bg_1.jpg');"
    data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-center">
            <div class="col-md-9 ftco-animate   text-center">
                <h1 class="mb-3  bread" style="font-size: 5vw">{{ $cerita->judul }}</h1>
                <p class="breadcrumbs"><span class="mr-2"><a href="#">Ditulis oleh {{ $cerita->user->name }}</a></span>
                </p>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section ftco-degree-bg">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10 ftco-animate">
                <p align="center" class="mb-5">
                    <img src="{{ URL::asset('admin/img/cerita/' . $cerita->foto) }}" alt="" class="img-fluid">
                </p>
                <h2 class="mb-3">{{ $cerita->judul }}</h2>

                {!! $cerita->cerita !!}


                <div class="about-author d-flex p-4 bg-light">
                    <div class="bio mr-5">
                        <img src="{{ URL::asset('admin/img/user/' . $penulis->foto) }}" alt="Image placeholder"
                            style="border-radius: 75px; height: 150px; width: 150px; object-fit: fill"
                            class="img-fluid mb-4">
                    </div>
                    <div class="desc">
                        <a href="{{ route('alumni.detail', $penulis->user_id) }}"><h3>{{ $penulis->user->name }}</h3></a>
                        <span>Angkatan {{ $penulis->angkatan }}</span> <br>
                        <span>{{ $penulis->jurusan }}</span><br>
                        @if ($penulis->facebook)
                        <a class="btn btn-info mt-2" target="_blank" style="background-color: blue !important"
                            href="{{ $penulis->facebook }}"><span class="icon-facebook"></span></a>
                        @endif
                        @if ($penulis->twitter)
                        <a class="btn btn-info mt-2" target="_blank" href="{{ $penulis->twitter }}"><span
                                class="icon-twitter"></span></a>
                        @endif
                        @if ($penulis->instagram)
                        <a class="btn btn-secondary mt-2" target="_blank"
                            style="background: -moz-linear-gradient(45deg, #f09433 0%, #e6683c 25%, #dc2743 50%, #cc2366 75%, #bc1888 100%);
                background: -webkit-linear-gradient(45deg, #f09433 0%,#e6683c 25%,#dc2743 50%,#cc2366 75%,#bc1888 100%);
                background: linear-gradient(45deg, #f09433 0%,#e6683c 25%,#dc2743 50%,#cc2366 75%,#bc1888 100%);
                filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#f09433', endColorstr='#bc1888',GradientType=1 );"
                            href="{{ $penulis->instagram }}"><span class="icon-instagram"></span></a>
                        @endif
                    </div>
                </div>




            </div> <!-- .col-md-8 -->


        </div>
    </div>
</section>
@endsection
