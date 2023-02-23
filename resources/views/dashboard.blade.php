@extends('layouts.layout')
@section('container')
<div class="row">
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-0">
            <div class="card-body">
                <div class="row no-gutters align-items-center px-3">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Total Data</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $total }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-lg-6">
    <div class="card shadow">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Proses SPARQL</h6>
        </div>
        <div class="card-body">
            <h4 class="small">{{ $sqltotal }}</h4>
            <h4 class="small">{{ $sql }}</h4>
        </div>
    </div>
  </div>
  <br>
<table class="table">
    <thead>
      <tr>
        <th scope="col">No</th>
        <th scope="col">Judul Skripsi</th>
        <th scope="col">Nama Mahasiswa</th>
        <th scope="col">Aksi</th>
      </tr>
    </thead>
    <tbody>
    @foreach ($list_skripsi as $index => $skripsi)
    <tr>
        <th scope="row">{{ $index+1 }}</th>
        <td>{{ $skripsi['judul'] }}</td>
        <td>{{ $skripsi['penulis']}}</td>
        <td>
            <a type="button" class="btn btn-primary" href="/detail/{{ $skripsi['id'] }}">Detail</a>
        </td>
      </tr>
        
    @endforeach

    </tbody>
  </table>

    
@endsection