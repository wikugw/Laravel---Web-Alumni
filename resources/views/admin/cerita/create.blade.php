@extends('admin.index')

@section('content')

<form action="{{ route('cerita.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Buat Cerita</h6>
    </div>
    <div class="card-body">
        <div class="form-group">
            <label for="judul">Judul <span style="color: red">*</span></label>
            <input type="text" class="form-control @error('judul') is-invalid @enderror"
                value="{{ old('judul') }}" id="judul" name="judul" placeholder="Judul cerita">
            @error('judul')
            <div class="text-muted">{{ $message }}</div>
            @enderror
        </div>

        {{-- cerita --}}
        <div class="form-group">
            <label for="cerita">Cerita <span style="color: red">*</span></label>
            <textarea class="ckeditor form-control @error('cerita') is-invalid @enderror" id="cerita" name="cerita">{{ old('cerita') }}</textarea>
            @error('cerita')
            <div class="text-muted">{{ $message }}</div>
            @enderror
        </div>

        {{-- foto  --}}
        <div class="form-group">
            <label for="foto">Foto Header</label>
            <input type="file" class="form-control @error('foto') is-invalid @enderror" name="foto" id="foto">
            @error('foto')
            <div class="text-muted">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-footer float-right pr-3">
            <small style="color: red">*) wajib diisi</small>
        </div>
    </div>
</div>

<div class="form-footer pb-3">
    <button type="submit" class="btn btn-block btn-primary btn-default shadow-lg">Publikasikan Cerita</button>
</div>
</form>

@endsection
