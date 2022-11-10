@extends('layouts.layout')
@section('container')
<div class=" container browsing" style="margin-top: 120px">
    <div class="row text-center justify-content-center">
        <div class="col-lg-4 mb-3 mx-4 card" data-aos="fade-up" data-aos-delay="400">
            <div class="card-body">
                <h5 class="card-title">Penjurusan</h5>
                <p class="card-text">Jumlah :  {{ $data['jumlahpenjurusan'] }} </p>
                <a href="{{ route('daftarpenjurusan') }}" class="btn btn-primary">Tampilkan</a>
            </div>
        </div>
        <div class="col-lg-4 mb-3 mx-4 card" data-aos="fade-up" data-aos-delay="400">
            <div class="card-body">
                <h5 class="card-title">Dosen Pembimbing </h5>
                <p> Jumlah :  {{ $data['jumlahpembimbing'] }}</p>
                <a href="{{ route('daftardospem') }}"class="btn btn-primary">Tampilkan</a>
            </div>
        </div>

        <div class="col-lg-4 mb-3 mx-4 card" data-aos="fade-up" data-aos-delay="400">
            <div class="card-body">
                <h5 class="card-title">Mahasiswa Angkatan</h5>
                <p>Jumlah :  {{ $data['jumlahangkatan'] }} </p>
                <a href="{{ route('daftarangkatan') }}" class="btn btn-primary">Tampilkan</a>
            </div>
        </div>

        <div class="col-lg-4 mb-3 mx-4 card" data-aos="fade-up" data-aos-delay="400">
            <div class="card-body">
                <h5 class="card-title">Jangka Waktu Penelitian</h5>
                <p>Jumlah :</p>
                <a href="" class="btn btn-primary">Tampilkan</a>
            </div>
            </div>
        </div>
    </div>
</div>
@endsection