@extends('layouts.layout')
@section('container')

@foreach ($skripsimhs as $detail)
<div class="card">
    <div class="card-body" style="text-align: justify">
        <h3 class="card-title mb-4">{{ $detail['judul'] }}</h3>
        <p class="card-text">
            <span>Nama Mahasiswa&emsp;&emsp;&nbsp;&nbsp;&emsp; : {{ $detail['penulis'] }} </span>
        </p>
        <p class="card-text">
            <span>NIM Mahasiswa&emsp;&emsp;&emsp;&nbsp;&emsp; : {{  $detail['nim'] }}</span>
        </p>
        <p class="card-text">
            <span>Mahasiswa Angkatan&emsp;&emsp; : {{ $detail ['angkatan'] }}</span>
        </p>
        <p class="card-text">
            <span>Penjurusan&emsp;&emsp;&emsp;&emsp;&emsp;&ensp;&emsp; : {{ $detail['penjurusan'] }}</span>
        </p>
        <p class="card-text">
            <span> Nama Pembimbing 1&emsp;&emsp; : {{ $detail['dospem1'] }}</span>
        </p>
        <p class="card-text">
            <span>Email Pembimbing 1&emsp;&nbsp;&emsp; : {{ $detail ['emailp1'] }}</span>
        </p>
        <p class="card-text">
            <span>Nama Pembimbing 2&emsp;&emsp; : {{ $detail['dospem2'] }}</span>
        </p>
        <p class="card-text">
            <span>Email Pembimbing 2&emsp;&nbsp;&emsp; : {{ $detail ['emailp2'] }} </span>
        </p>
        <p class="card-text">
            <span>Mulai Penelitian&emsp;&emsp;&emsp;&nbsp;&emsp; : {{ $detail['mulai'] }}</span>
        </p>
        <p class="card-text">
            <span>Selesai Penelitian&emsp;&emsp;&ensp;&nbsp;&emsp; : {{ $detail['selesai'] }}</span>
        </p>
        <p class="card-text">
            <span>Jangka Waktu Penelitian&ensp; : {{ $detail['jangkawaktu'] }}</span>
        </p>
        <p class="card-text">
            <span>Metode &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&ensp;&emsp; : {{ $detail['metode'] }}</span>
        </p>
        <p class="card-text">
            <span>Abstrak &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&ensp;&emsp; : {!! $detail['abstrak'] !!}</span>
        </p>
    </div>
  </div>
  @endforeach
  @endsection