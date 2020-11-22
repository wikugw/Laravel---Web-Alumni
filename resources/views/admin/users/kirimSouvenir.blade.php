@extends('admin.index')

@section('content')
    <div class="row">
        <div class="col-6">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">
                        Informasi Admin
                    </h6>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-2">
                            Alamat
                        </div>
                        <div class="col-1">
                            :
                        </div>
                        <div class="col-9">
                            {{ $adminAddress->adrress }}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-2">
                            kota
                        </div>
                        <div class="col-1">
                            :
                        </div>
                        <div class="col-9">
                            {{ $adminAddress->city->city_name }}
                            <input type="hidden" value="{{ $adminAddress->city_id }}" id="originCity" name="originCity">
                        </div>
                    </div>
                    <div class="row d-flex">
                        <div class="col-2">
                            Provinsi
                        </div>
                        <div class="col-1">
                            :
                        </div>
                        <div class="col-9">
                            {{ $adminAddress->province->province }}
                        </div>
                    </div>
                    <div class="row  align-items-center">
                        <div class="col-2">
                            Kode Pos
                        </div>
                        <div class="col-1">
                            :
                        </div>
                        <div class="col-9">
                            {{ $adminAddress->postal_code }}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            Jasa pengiriman
                        </div>
                        <div class="col-1">
                            :
                        </div>
                        <div class="col-5">
                            <select class="form-control" name="service" id="service">
                                <option value="jne">JNE</option>
                                <option value="pos">Pos Indonesia</option>
                                <option value="tiki">Tiki</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">
                        Informasi Alumni
                    </h6>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-2">
                            Nama
                        </div>
                        <div class="col-1">
                            :
                        </div>
                        <div class="col-9">
                            {{ $user->name }}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-2">
                            Alamat
                        </div>
                        <div class="col-1">
                            :
                        </div>
                        <div class="col-9">
                            {{ $userAddress->adrress }}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-2">
                            kota
                        </div>
                        <div class="col-1">
                            :
                        </div>
                        <div class="col-9">
                            {{ $userAddress->city->city_name }}
                            <input type="hidden" value="{{  $user->id }}" id="userId" name="userId">
                            <input type="hidden" name="_token" id="_token" value="<?php echo csrf_token(); ?>">
                            <input type="hidden" value="{{ $userAddress->city_id }}" id="destinationCity" name="destinationCity">
                        </div>
                    </div>
                    <div class="row d-flex">
                        <div class="col-2">
                            Provinsi
                        </div>
                        <div class="col-1">
                            :
                        </div>
                        <div class="col-9">
                            {{ $userAddress->province->province }}
                        </div>
                    </div>
                    <div class="row  align-items-center">
                        <div class="col-2">
                            Kode Pos
                        </div>
                        <div class="col-1">
                            :
                        </div>
                        <div class="col-9">
                            {{ $userAddress->postal_code }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Jenis pengiriman tersedia JNE</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="serviceTable" class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nama Service</th>
                            <th>Harga Ongkir</th>
                            <th>Estimasi pengiriman (Hari)</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($services as $service)
                        <tr>
                            <td>{{ $service['service'] }} - {{$service['description']}}</td>
                            <td>{{ $service['cost'][0]['value'] }}</td>
                            <td>{{ $service['cost'][0]['etd'] }}</td>
                            <td>
                                <form action="{{ route('souvenir.store') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="ongkos_kirim" value="{{ $service['cost'][0]['value'] }}">
                                    <input type="hidden" name="service" value="{{$courier}} - {{ $service['service'] }}">
                                    <input type="hidden" name="user_id" value="{{ $user->id }}">
                                    <button type="submit" onclick="return confirm('Data akan ditambahkan pada histori pengiriman souvenir, lanjutkan?')" class="btn btn-sm btn-info"><span class="fas fa-gift"></span></button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
