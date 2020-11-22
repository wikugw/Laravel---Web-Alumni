@extends('admin.index')

@section('content')
<form action="{{ route('userdetails.update', $user->id) }}" method="POST" enctype="multipart/form-data">
    @method('PUT')
    @csrf
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Edit Biodata</h6>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-4">
                {{-- select Kelamin --}}
                <div class="form-group">
                    <label for="kelamin">kelamin <span style="color: red">*</span></label>
                    <select name="kelamin" value="{{ old('kelamin') ? old('kelamin') : $userDetail->kelamin }}"
                        class="form-control @error('kelamin') is-invalid @enderror">
                        <option value="{{ old('kelamin') ? old('kelamin') : $userDetail->kelamin }}">{{ old('kelamin') ? old('kelamin') : $userDetail->kelamin }}</option>
                        <option value="Putra" holder>Putra</option>
                            <option value="Putri" holder>Putri</option>
                    </select>
                    @error('kelamin')
                    <div class="text-muted">{{ $message }}</div>
                    @enderror
                </div>

            </div>
            <div class="col-4">
                {{-- nama --}}
                <div class="form-group">
                    <label for="name">Nama <span style="color: red">*</span></label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                    value="{{ old('name') ? old('name') : $user->name }}" id="name" name="name" placeholder="Masukkan nama lengkap">
                    @error('name')
                    <div class="text-muted">{{ $message }}</div>
                    @enderror
                </div>
                {{-- select angkatan --}}
                <div class="form-group">
                    <label for="angkatan">Angkatan <span style="color: red">*</span></label>
                    <select name="angkatan" class="form-control @error('angkatan') is-invalid @enderror"
                    value="{{ old('angkatan') ? old('angkatan') : $userDetail->angkatan }}">
                        <option value="{{ old('angkatan') ? old('angkatan') : $userDetail->angkatan }}">Angkatan {{ old('angkatan') ? old('angkatan') : $userDetail->angkatan }}</option>
                        @for ($i = 1; $i < 13; $i++) <option value={{ $i }} holder>Angkatan {{ $i }}</option>
                            @endfor
                    </select>
                    @error('angkatan')
                    <div class="text-muted">{{ $message }}</div>
                    @enderror
                </div>
                {{-- select Jurusan --}}
                <div class="form-group">
                    <label for="jurusan">Jurusan <span style="color: red">*</span></label>
                    <select name="jurusan" value="{{ old('jurusan') ? old('jurusan') : $userDetail->jurusan }}"
                        class="form-control @error('jurusan') is-invalid @enderror">
                        <option value="{{ old('jurusan') ? old('jurusan') : $userDetail->jurusan }}">{{ old('jurusan') ? old('jurusan') : $userDetail->jurusan }}</option>
                        <option value="Syari" holder>Syari</option>
                        <option value="Ashri" holder>Ashri</option>
                    </select>
                    @error('jurusan')
                    <div class="text-muted">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-4">
                {{-- email --}}
                <div class="form-group">
                    <label for="email">Email <span style="color: red">*</span></label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror"
                    value="{{ old('email') ? old('email') : $user->email }}" id="email" name="email" placeholder="Masukkan email">
                    @error('email')
                    <div class="text-muted">{{ $message }}</div>
                    @enderror
                </div>
                {{-- no hp --}}
                <div class="form-group">
                    <label for="no_hp">Nomor Handphone <span style="color: red">*</span></label>
                    <input type="text" class="form-control @error('no_hp') is-invalid @enderror"
                    value="{{ old('no_hp') ? old('no_hp') : $userDetail->no_hp }}" id="no_hp" name="no_hp" placeholder="Misal 082142709999">
                    @error('no_hp')
                    <div class="text-muted">{{ $message }}</div>
                    @enderror
                </div>

                {{-- foto profil --}}
                <div class="form-group">
                    <label for="foto">Foto Profile</label>
                    <input type="file" class="form-control @error('no_hp') is-invalid @enderror" name="foto" id="foto">
                    @error('foto')
                    <div class="text-muted">{{ $message }}</div>
                    @enderror
                </div>

            </div>

        </div>
        <div class="row">
            <div class="col-12">
                {{-- nama --}}
                <div class="form-group">
                    <label for="title">title <span style="color: red">*</span></label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror"
                    value="{{ old('title') ? old('title') : $userDetail->title }}" id="title" name="title" placeholder="Masukkan title">
                    @error('title')
                    <div class="text-muted">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>
        <div class="form-footer float-right pr-3">
            <small style="color: red">*) wajib diisi</small>
        </div>
    </div>
</div>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Update Biodata</h6>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-6">

                {{-- adrress --}}
                <div class="form-group">
                    <label for="adrress">adrress <span style="color: red">*</span></label>
                    <textarea class="form-control @error('adrress') is-invalid @enderror" id="adrress" name="adrress"
                        rows="5">{{ old('adrress') ? old('adrress') : $address->adrress }}</textarea>
                    @error('adrress')
                    <div class="text-muted">{{ $message }}</div>
                    @enderror
                </div>

            </div>
            <div class="col-6">
              {{-- kode pos --}}
              <div class="form-group">
                <label for="postal_code">Kode Pos <span style="color: red">*</span></label>
                <input type="number" class="form-control" id="postal_code" name="postal_code" placeholder="Masukkan Kode Pos">
            </div>
            {{-- select provinsi --}}
            <div class="form-group">
                <label for="province_id">Provinsi <span style="color: red">*</span></label>
                <select name="province_id" class="form-control">
                    <option value="{{ $address->province_id }}" holder>{{ $address->province->province }}</option>
                    @foreach ($provinces as $province)
                        <option value="{{ $province->id }}">{{ $province->province }}</option>
                    @endforeach
                </select>
            </div>
            {{-- select kota --}}
            <div class="form-group">
                <label for="city_id">Kota <span style="color: red">*</span></label>
                <select name="city_id" class="form-control">
                    <option value="{{ $address->city_id }}" holder>{{ $address->city->city_name }}</option>
                    @foreach ($cities as $city)
                        <option value="{{ $city->id }}">{{ $city->city_name }}</option>
                    @endforeach
                </select>
            </div>
            </div>
        </div>

    </div>
</div>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Sosial Media</h6>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-4">
                {{-- facebook --}}
                <div class="form-group">
                    <label for="facebook">Facebook</label>
                    <input type="text" class="form-control @error('facebook') is-invalid @enderror" value="{{ old('facebook') ? old('facebook') : $userDetail->facebook }}" id="facebook"
                        name="facebook" placeholder="masukkan url profile facebook">
                        @error('facebook')
                    <div class="text-muted">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-4">
                {{-- twitter --}}
                <div class="form-group">
                    <label for="twitter">Twitter</label>
                    <input type="text" class="form-control @error('facebook') is-invalid @enderror" value="{{ old('twitter') ? old('twitter') : $userDetail->twitter }}" id="twitter" name="twitter"
                        placeholder="masukkan url profile twitter">
                        @error('twitter')
                    <div class="text-muted">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-4">
                {{-- instagram --}}
                <div class="form-group">
                    <label for="instagram">Instagram</label>
                    <input type="text" class="form-control @error('facebook') is-invalid @enderror" value="{{ old('instagram') ? old('instagram') : $userDetail->instagram }}" id="instagram"
                        name="instagram" placeholder="masukkan url profile instagram">
                        @error('instagram')
                    <div class="text-muted">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>
    </div>
</div>
<div class="form-footer pb-3">
    <button type="submit" class="btn btn-block btn-primary btn-default shadow-lg">Update</button>
</div>
</form>
@endsection
