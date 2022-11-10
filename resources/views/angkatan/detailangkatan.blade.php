@extends('layouts.layout')
@section('container')
<div>
  <a type="button" class="btn btn-primary" href="/angkatan"><span data-feather="arrow-left" class="align-text-bottom"></span>Back</a>
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