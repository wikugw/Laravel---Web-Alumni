@extends('admin.index')

@section('content')
<form action="{{ route('souvenir.update', $souvenir->id) }}" method="POST">
  @method('PUT')
  @csrf
  <div class="row justify-content-center">
    <div class="col-6 card shadow mb-4">
      <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Tambah Resi</h6>
      </div>
      <div class="card-body">
        <!-- cerita -->
        <div class="form-group">
          <label for="resi">Resi <span style="color: red">*</span></label>
          <input
            type="text"
            class="form-control @error('resi') is-invalid @enderror"
            value="{{ old('resi') }}"
            id="resi"
            name="resi"
            placeholder="resi cerita">
          @error('resi')
          <div class="text-muted">{{ $message }}</div>
          @enderror
        </div>
      </div>

      <div class="form-footer pb-3">
        <button type="submit" class="btn btn-block btn-primary btn-default shadow-lg">Tambah resi</button>
        <a href="{{url()->previous()}}" class="btn btn-block btn-secondary btn-default shadow-lg" style="color: white;">Batal</a>
      </div>
    </div>
  </div>
</form>
@endsection