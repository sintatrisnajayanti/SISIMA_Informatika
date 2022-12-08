@extends('layouts.layout')
@section('container')

@foreach ($skripsimhs as $detail)
<div class="card">
    <div class="card-body">
        <h3 class="card-title mb-4">{{ $detail['judul'] }}</h3>
        <p class="card-text">
            <span>Nama Mahasiswa&emsp;&emsp;&nbsp;&nbsp; : {{ $detail['penulis'] }} </span>
        </p>
        <p class="card-text">
            <span>NIM Mahasiswa&emsp;&emsp;&emsp;&nbsp; : {{  $detail['nim'] }}</span>
        </p>
        <p class="card-text">
            <span>Mahasiswa Angkatan&emsp; : {{ $detail ['angkatan'] }}</span>
        </p>
        <p class="card-text">
            <span>Penjurusan&emsp;&emsp;&emsp;&emsp;&emsp;&ensp; : {{ $detail['penjurusan'] }}</span>
        </p>
        <p class="card-text">
            <span> Nama Pembimbing 1&emsp; : {{ $detail['dospem1'] }}</span>
        </p>
        <p class="card-text">
            <span>Email Pembimbing 1&emsp;&nbsp; : {{ $detail ['emailp1'] }}</span>
        </p>
        <p class="card-text">
            <span>Nama Pembimbing 2&emsp; : {{ $detail['dospem2'] }}</span>
        </p>
        <p class="card-text">
            <span>Email Pembimbing 2&emsp;&nbsp; : {{ $detail ['emailp2'] }} </span>
        </p>
        <p class="card-text">
            <span>Mulai Penelitian&emsp;&emsp;&emsp;&nbsp; : {{ $detail['mulai'] }}</span>
        </p>
        <p class="card-text">
            <span>Selesai Penelitian&emsp;&emsp;&ensp;&nbsp; : {{ $detail['selesai'] }}</span>
        </p>
        <p class="card-text">
            <span>Metode &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&ensp; : {{ $detail['metode'] }}</span>
        </p>
    </div>
  </div>
  @endforeach
  @endsection