@extends('layouts.layout')
@section('container')

<div class="col-lg-6 mt-4">
  <div class="card shadow">
      <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Proses SPARQL</h6>
      </div>
      <div class="card-body">
          <h4 class="small">{{ $sql }}</h4>
      </div>
  </div>
</div>
<br>
<div>
  <a type="button" class="btn btn-primary" href="/angkatan"><span data-feather="arrow-left" class="align-text-bottom"></span>Back</a>
</div>

<table class="table mt-4" >
    <thead>
      <tr>
        <th scope="col">No</th>
        <th scope="col">Judul Skripsi</th>
        <th scope="col">Nama Mahasiswa</th>
        <th scope="col">Aksi</th>
      </tr>
    </thead>
    <tbody>
    @foreach ($list_skripsi as $index => $skripsiakt)
    <tr>
        <th scope="row">{{ $index+1 }}</th>
        <td>{{ $skripsiakt['judul'] }}</td>
        <td>{{ $skripsiakt['penulis']}}</td>
        <td>
            <a type="button" class="btn btn-primary" href="/detail/{{ $skripsiakt['id'] }}">Detail</a>
        </td>
    </tr>
    @endforeach
  </tbody>
</table>
@endsection