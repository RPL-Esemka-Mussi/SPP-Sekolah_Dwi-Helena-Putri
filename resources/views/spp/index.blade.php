@extends('main.bootstrap')
@section('content')
<div class="text-center py-5 h-100 bg-dark text-white">
    <h3>Kelola SPP</h3>
</div>
<div class="container mt-4">
    <div class="d-flex justify-content-between">
        <div>
            <h4>Data SPP</h4>
        </div>
        <div>
            <a href="{{url('spp/tambah')}}" class="btn btn-success">tambah</a>
        </div>
    </div>
    @if(Session::get('sukses'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>sukses!</strong> {{Session::get('sukses')}}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @elseif(Session::get('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>gagal!</strong> {{Session::get('gagal')}}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    <hr>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Tahun</th>
                <th>Nominal</th>
                <th>Kelola</th>
            </tr>
        </thead>
        <tbody>
            @if($spp->count() == 0)
            <tr class="text-center">
                <td colspan="4"><strong>Belom ada data</strong> </td>
            </tr>
            @else
            @foreach($spp as $data)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $data->tahun }}</td>
                <td>{{ 'Rp. ' . $data->nominal }}</td>
                <td>
                    <a href="{{ url ('/spp/hapus' . '/' . $data->id) }}" class="btn btn-sn btn-danger">Hapus</a>
                    <a href="{{ url ('/spp/edit' . '/' . $data->id) }}" class="btn btn-sn btn-primary">Edit</a>
                </td>
            </tr>
            @endforeach
        @endif
        </tbody>
    </table>
</div>
@endsection