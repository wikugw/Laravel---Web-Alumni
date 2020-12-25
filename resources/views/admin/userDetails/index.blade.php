@extends('admin.index')

@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Biodata</h6>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-lg-4">
                @if ($userDetail->foto)
                <img src="{{ Storage::url($userDetail->foto) }}" class="img-fluid rounded mb-3"
                    alt="...">
                @else
                <img src="{{ URL::asset('admin/img/user/default.png') }}" class="img-fluid rounded mb-3" alt="...">
                @endif
            </div>
            <div class="col-lg-8">
                {{-- baris 1 --}}
                <div class="row">
                    <div class="col-lg-6">
                        <div class="row">
                            <div class="col-4">
                                <span class="font-weight-bold">Nama</span>
                            </div>
                            <div class="col-1">
                                <span>:</span>
                            </div>
                            <div class="col-7">
                                <span>{{ $user->name }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="row">
                            <div class="col-4">
                                <span class="font-weight-bold">Email</span>
                            </div>
                            <div class="col-1">
                                <span>:</span>
                            </div>
                            <div class="col-7">
                                <span>{{ $user->email }}</span>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- baris 2 --}}
                <div class="row mt-2">
                    <div class="col-lg-6">
                        <div class="row">
                            <div class="col-4">
                                <span class="font-weight-bold">Jurusan</span>
                            </div>
                            <div class="col-1">
                                <span>:</span>
                            </div>
                            <div class="col-7">
                                <span>{{ $userDetail->jurusan }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="row">
                            <div class="col-4">
                                <span class="font-weight-bold">Angkatan</span>
                            </div>
                            <div class="col-1">
                                <span>:</span>
                            </div>
                            <div class="col-7">
                                <span>{{ $userDetail->angkatan }}</span>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- baris 3 --}}
                <div class="row mt-2">
                    <div class="col-lg-12">
                        <div class="row my-2">
                                <div class="col-4 mb-2">
                                    <span class="font-weight-bold">Title</span>
                                </div>
                                <div class="col-12">
                                    <span>{{ $userDetail->title }}</span>
                                </div>
                        </div>
                    </div>
                </div>
                {{-- baris 4 --}}
                <div class="row mt-2">
                    <div class="col-lg-6">
                        <div class="row">
                            <div class="col-4 mb-2">
                                <span class="font-weight-bold">Alamat</span>
                            </div>
                            <div class="col-12">
                                <span>
                                    {{ $user->address->adrress }}, 
                                    {{ $user->address->city->city_name }}, 
                                    {{ $user->address->province->province }},
                                    Kode pos {{$user->address->postal_code}}
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="row">
                            <div class="col-4 mb-2">
                                <span class="font-weight-bold">Sosmed</span>
                            </div>
                            <div class="col-12">
                                @if ($userDetail->facebook)
                                <a href="{{ $userDetail->facebook }}" class="btn btn-primary" target="_blank">
                                    <i class="fab fa-facebook-f"></i>
                                </a>
                                @endif
                                @if ($userDetail->twitter)
                                <a href="{{ $userDetail->twitter }}" class="btn btn-info" target="_blank">
                                    <i class="fab fa-twitter"></i>
                                </a>
                                @endif
                                @if ($userDetail->instagram)
                                <a href="{{ $userDetail->instagram }}" class="btn btn-danger" target="_blank"
                                    style="background: -moz-linear-gradient(45deg, #f09433 0%, #e6683c 25%, #dc2743 50%, #cc2366 75%, #bc1888 100%);
                                    background: -webkit-linear-gradient(45deg, #f09433 0%,#e6683c 25%,#dc2743 50%,#cc2366 75%,#bc1888 100%);
                                    background: linear-gradient(45deg, #f09433 0%,#e6683c 25%,#dc2743 50%,#cc2366 75%,#bc1888 100%);
                                    filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#f09433', endColorstr='#bc1888',GradientType=1 );">
                                    <i class="fab fa-instagram"></i>
                                </a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<div class="form-footer pb-3">
    <a href="{{ route('userdetails.edit', $user->id) }}" class="btn btn-block btn-success btn-default shadow-lg">Edit Biodata</a>
</div>
@endsection
