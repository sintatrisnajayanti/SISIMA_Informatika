@extends('layouts.layout')
@section('container')
<div class="card">
    <div class="card-body">
        <h3 class="card-title mb-4">{{ $post["judul"] }}</h3>
        <p class="card-text">
            <span>Nama Mahasiswa : {{ $post["nama"] }} </span>
        </p>
        <p class="card-text">
            <span>NIM Mahasiswa : {{ $post["nim"] }}</span>
        </p>
        <p class="card-text">
            <span>Penjurusan : {{ $post["penjurusan"] }}</span>
        </p>
        <p class="card-text">
            <span> Nama Pembimbing 1 : {{ $post["namapembimbing1"] }}</span>
        </p>
        <p class="card-text">
            <span>Nama Pembimbing 2 : {{ $post["namapembimbing2"] }}</span>
        </p>
        <p class="card-text">
            <span>Email Pembimbing 1 : {{ $post["emailpembimbing1"] }}</span>
        </p>
        <p class="card-text">
            <span>Email Pembimbing 2 : {{ $post["emailpembimbing2"] }}</span>
        </p>
        <p class="card-text">
            <span>Tahun Pembuatan :{{ $post["tahun"] }}</span>
        </p>
        <p class="card-text">
            <span>Metode : {{ $post["metode"] }}</span>
        </p>
        <p class="card-text">
            <span>Topik Permasalahan : {{ $post["topik"] }}</span>
        </p>
        <p class="card-text">
            <span>Abstrak : {{ $post["abstrak"] }}</span>
        </p>
    </div>
  </div>
   
  @endsection