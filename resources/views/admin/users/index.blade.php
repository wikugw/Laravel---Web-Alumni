@extends('admin.index')

@section('content')
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Daftar Alumni</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Status</th>
                        <th>Role</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            @if ($user->isAuthenticated)
                            <span class="badge badge-success">Telah diverifikasi</span>
                            @else
                            <a href="{{ route('users.authenticate', $user->id) }}" class="btn btn-success btn-sm"
                                onclick="return confirm('Yakin ingin verifikasi alumni?');">
                                <i class="fas fa-check"></i>
                            </a>
                            <a href="{{ route('users.destroy', $user->id) }}" class="btn btn-danger btn-sm"
                                onclick="return confirm('Yakin ingin menghapus alumni?');">
                                <i class="fas fa-times"></i>
                            </a>
                            @endif
                        </td>
                        <td>
                            @if ($user->isAdmin)
                            <span class="badge badge-primary">Admin</span>
                            @else
                            <span class="badge badge-success">Alumni</span>
                            @endif
                        </td>
                        <td>
                            <a  href="{{ route('users.kirimSouvenir', $user->id) }}" class="btn btn-sm btn-info"><span class="fas fa-gift"></span></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
