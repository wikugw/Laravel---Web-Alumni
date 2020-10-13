@extends('admin.index')

@section('content')
<form action="{{ route('userdetails.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Update Biodata</h6>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-4">
                    {{-- alamat --}}
                    <div class="form-group">
                        <label for="alamat">Alamat <span style="color: red">*</span></label>
                        <textarea class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat"
                            rows="5">{{ old('alamat') }}</textarea>
                        @error('alamat')
                        <div class="text-muted">{{ $message }}</div>
                        @enderror
                    </div>

                </div>
                <div class="col-4">
                    {{-- select angkatan --}}
                    <div class="form-group">
                        <label for="angkatan">Angkatan <span style="color: red">*</span></label>
                        <select name="angkatan" class="form-control @error('angkatan') is-invalid @enderror"
                            value="{{ old('angkatan') }}">
                            <option value="" holder>Pilih Angkatan</option>
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
                        <select name="jurusan" value="{{ old('jurusan') }}"
                            class="form-control @error('jurusan') is-invalid @enderror">
                            <option value="" holder>Pilih Jurusan</option>
                            <option value="syari" holder>Syari</option>
                            <option value="ashri" holder>Ashri</option>
                        </select>
                        @error('jurusan')
                        <div class="text-muted">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-4">
                    {{-- no hp --}}
                    <div class="form-group">
                        <label for="no_hp">Nomor Handphone <span style="color: red">*</span></label>
                        <input type="text" class="form-control @error('no_hp') is-invalid @enderror"
                            value="{{ old('no_hp') }}" id="no_hp" name="no_hp" placeholder="Misal 082142709999">
                        @error('no_hp')
                        <div class="text-muted">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- foto profil --}}
                    <div class="form-group">
                        <label for="foto">Foto Profile</label>
                        <input type="file" class="form-control-file" name="foto" id="foto">
                    </div>
                    <div class="form-footer float-right pr-3">
                        <small style="color: red">*) wajib diisi</small>
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
                        <input type="text" class="form-control" value="{{ old('facebook') }}" id="facebook"
                            name="facebook" placeholder="masukkan url profile facebook">
                    </div>
                </div>
                <div class="col-4">
                    {{-- twitter --}}
                    <div class="form-group">
                        <label for="twitter">Twitter</label>
                        <input type="text" class="form-control" value="{{ old('twitter') }}" id="twitter" name="twitter"
                            placeholder="masukkan url profile twitter">
                    </div>
                </div>
                <div class="col-4">
                    {{-- instagram --}}
                    <div class="form-group">
                        <label for="instagram">Instagram</label>
                        <input type="text" class="form-control" value="{{ old('instagram') }}" id="instagram"
                            name="instagram" placeholder="masukkan url profile instagram">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="form-footer pb-3">
        <button type="submit" class="btn btn-block btn-primary btn-default shadow-lg">Save</button>
    </div>
</form>
@endsection
