@extends('user.index')

@section('content')
<section class="hero-wrap hero-wrap-2 js-fullheight"
    style="background-image:url('{{  asset('user/images/bg_3.jpg')}}');">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-center">
            <div class="col-md-9 ftco-animate mb-5 pb-5 text-center">
                <h1 class="mb-5 pb-5 bread">Alumni</h1>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section testimony-section">
    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-md-7 text-center heading-section ftco-animate">
                <span class="subheading">Alumni</span>
                <h2 class="mb-4">Yang Telah Bergabung</h2>
            </div>
        </div>
        <div class="row ftco-animate">
            @forelse ($alumniDetails as $alumniDetail)
            <div class="item col-lg-6">
                <div class="testimony-wrap py-4">
                    <div class="text">
                        <div class="row d-flex align-items-center">
                            <div class="col-4">
                                <img class="img-fluid"
                                    style="height: 150px; width: 150px; border-radius: 75px; object-fit: cover"
                                    src="{{  ($alumniDetail->foto ?  $alumniDetail->foto : URL::asset('admin/img/user/default.png')) }}" />
                            </div>
                            <div class="col-8">
                                <div class="pb-2">
                                    <a style="color: black; font-size: 20px"
                                        href="{{ route('alumni.detail', $alumniDetail->user_id) }}">{{ $alumniDetail->user->name }}</a>
                                </div>
                                <span class="position">Angkatan {{ $alumniDetail->angkatan }} |
                                    {{ $alumniDetail->kelamin }}</span><br>
                                <span style="font-size: 16px; color: black"> {{ $alumniDetail->title }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @empty
            <div class="row justify-content-center align-items-center">
                <p>Belum ada alumni yang bergabung</p>
            </div>
            @endforelse

        </div>
    </div>
    </div>
</section>
@endsection
