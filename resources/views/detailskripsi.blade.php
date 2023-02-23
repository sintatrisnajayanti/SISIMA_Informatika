@extends('layouts.layout')
@section('container')

@foreach ($skripsimhs as $detail)
<div class="card">
    <div class="card-body" style="text-align: justify">
        <h3 class="card-title mb-4">{{ $detail['judul'] }}</h3>
        <p class="card-text">
            <span><b>Nama Mahasiswa</b>&emsp;&emsp;&nbsp;&nbsp;&emsp; : {{ $detail['penulis'] }} </span>
        </p>
        <p class="card-text">
            <span><b>NIM Mahasiswa</b>&emsp;&emsp;&emsp;&nbsp;&emsp; : {{  $detail['nim'] }}</span>
        </p>
        <p class="card-text">
            <span><b>Mahasiswa Angkatan</b>&emsp;&emsp; : {{ $detail ['angkatan'] }}</span>
        </p>
        <p class="card-text">
            <span><b>Penjurusan</b>&emsp;&emsp;&emsp;&emsp;&emsp;&ensp;&emsp; : {{ $detail['penjurusan'] }}</span>
        </p>
        <p class="card-text">
            <span><b>Nama Pembimbing 1</b>&emsp;&emsp; : {{ $detail['dospem1'] }}</span>
        </p>
        <p class="card-text">
            <span><b>Email Pembimbing 1</b>&emsp;&nbsp;&emsp; : {{ $detail ['emailp1'] }}</span>
        </p>
        <p class="card-text">
            <span><b>Nama Pembimbing 2</b>&emsp;&emsp; : {{ $detail['dospem2'] }}</span>
        </p>
        <p class="card-text">
            <span><b>Email Pembimbing 2</b>&emsp;&nbsp;&emsp; : {{ $detail ['emailp2'] }} </span>
        </p>
        <p class="card-text">
            <span><b>Mulai Penelitian</b>&emsp;&emsp;&emsp;&nbsp;&emsp; : {{ $detail['mulai'] }}</span>
        </p>
        <p class="card-text">
            <span><b>Selesai Penelitian</b>&emsp;&emsp;&ensp;&nbsp;&emsp; : {{ $detail['selesai'] }}</span>
        </p>
        <p class="card-text">
            <span><b>Jangka Waktu Penelitian</b>&ensp; : {{ $detail['jangkawaktu'] }}</span>
        </p>
        <p class="card-text">
            <span><b>Metode</b>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&ensp;&emsp;&emsp; : {{ $detail['metode'] }}</span>
        </p>
        <p class="card-text">
            <span><b>Abstrak</b>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&ensp;&emsp;&emsp; : {!! $detail['abstrak'] !!}</span>
        </p>
    </div>
  </div>
  @endforeach
  @endsection