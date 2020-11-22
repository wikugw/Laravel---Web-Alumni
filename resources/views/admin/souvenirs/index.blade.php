@extends('admin.index')

@section('content')
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Histori pengiriman souvenir</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Penerima</th>
                        <th>Service</th>
                        <th>Ongkos Kirim</th>
                        <th>tanggal kirim</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($souvenirs as $souvenir)
                    <tr>
                        <td>{{ $souvenir->user->name }}</td>
                        <td>{{ $souvenir->service }}</td>
                        <td>Rp. {{ $souvenir->ongkos_kirim }}</td>
                        <td>{{ Carbon\Carbon::parse($souvenir->created_at)->format('d-m-Y') }}</td>

                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
