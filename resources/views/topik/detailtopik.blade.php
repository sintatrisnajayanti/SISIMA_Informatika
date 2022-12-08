@extends('layouts.layout')
@section('container')
<div>
  <a type="button" class="btn btn-primary" href="/topikpermasalahan"><span data-feather="arrow-left" class="align-text-bottom"></span>Back</a>
</div>

<table class="table mt-4" >
    <thead>
      <tr>
        <th scope="col">No</th>
        <th scope="col">Judul Penelitian</th>
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