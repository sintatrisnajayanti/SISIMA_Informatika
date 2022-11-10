@extends('layouts.layout')
@section('container')
<div>
  <a type="button" class="btn btn-primary" href="/penjurusan"><span data-feather="arrow-left" class="align-text-bottom"></span>Back</a>
</div>

<table class="table mt-4" >
    <thead>
      <tr>
        <th scope="col">No</th>
        <th scope="col">Judul Penelitian</th>
        <th scope="col">Nama Mahasiswa</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
    @foreach ($list_skripsi as $index => $getskripsi)
    <tr>
        <th scope="row">{{ $index+1 }}</th>
        <td>{{ $getskripsi['judul'] }}</td>
        <td>{{ $getskripsi['penulis']}}</td>
        <td>
            <a type="button" class="btn btn-primary" href="/detail/{{ $getskripsi['id'] }}">Detail</a>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
@endsection