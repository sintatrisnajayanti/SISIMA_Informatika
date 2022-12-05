@extends('layouts.layout')
@section('container')
<div class="tab-content" id="nav-tabContent">
    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
        <p class="mt-2 font-weight-bold">Pencarian berdasarkan spesifikasi</p>   
        <form action="searching" method="post" id="cariSpesifikasi">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="input-group mb-3" >
                        <label class="input-group-text">Penjurusan</label>
                        <select class="form-select" aria-label="Default select example" id="cariJurusan" name="cariJurusan">
                            <option value="">Pilihlah salah satu</option>
                            @foreach($listPenjurusan as $item)
                                <option value="{{ $item['id'] }}">{{ str_replace('_',' ',$item['jalur'])}} </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="input-group mb-3" >
                        <label class="input-group-text">Mahasiswa Angkatan</label>
                        <select class="form-select" aria-label="Default select example" id="cariTahun" name="cariTahun">
                            <option value="">Pilihlah salah satu</option>
                            @foreach($listAngkatan as $item)
                                    <option value="{{ $item['id'] }}">{{$item['angkatan']}} </option>
                                 @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-6">   
                    <div class="input-group mb-3">
                        <label class="input-group-text">Dosen Pembimbing 1</label>
                        <select class="form-select" aria-label="Default select example"id="cariDosenPembimbing1" name="cariDosenPembimbing1">
                            <option value="">Pilihlah salah satu</option>
                               @foreach($listDosen as $item)
                                    <option value="{{ $item['id'] }}">{{ str_replace('_',' ',$item['dosen'])}} </option>
                                 @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-6">   
                    <div class="input-group mb-3">
                        <label class="input-group-text">Dosen Pembimbing 2</label>
                        <select class="form-select" aria-label="Default select example"id="cariDosenPembimbing2" name="cariDosenPembimbing2">
                            <option value="">Pilihlah salah satu</option>
                            @foreach($listDosen as $item)
                                <option value="{{ $item['id'] }}">{{ str_replace('_',' ',$item['dosen'])}} </option>
                             @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="input-group mb-3">
                        <label class="input-group-text">Jangka Waktu Penelitian</label>
                        <select class="form-select" aria-label="Default select example"id="cariJangkaWaktu" name="cariJangkaWaktu">
                            <option value="">Pilihlah salah satu</option>
                            
                        </select>
                    </div>
                </div>    
                <div class="col-md-6">
                    <div class="input-group mb-6">
                        <label class="input-group-text">Metode</label>
                        <input type="text" class="form-control" id="cariMetode" name="cariMetode">
                    </div>
                </div>
            </div>
            <div>
                <input type="submit" name="cariSpesifikasi" value="Cari" class="btn btn-primary">
                <input type="reset" name="reset" value="Reset" class="btn btn-danger">
            </div>
          
        </form>
    </div>
    {{-- <div class="row"> 
        <div class="col-lg-12 mb-4 mt-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Proses SPARQL</h6>
                </div>
                <div class="card-body">
                    <h4 class="small">{{ $list_skripsi['sql'] }}</h4>
                </div>
            </div>
        </div>
    </div> --}}


    
  
    @if (isset ($list_skripsi))
        @if(sizeof($list_skripsi) > 0)
        <div class="row">
            <div class="col-lg-12 mb-4 mt-4">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Hasil Pencarian</h6>
                    </div>
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Judul Penelitian</th>
                                <th scope="col">Nama Mahasiswa</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($list_skripsi as $index => $skripsi)
                            <tr>
                                <th scope="row">{{ $index+1 }}</th>
                                <td>{{ $skripsi['judul'] }}</td>
                                <td>{{ $skripsi['penulis']}}</td>
                        
                            </tr>  
                            @endforeach
                            </tbody>
                        </table> 
                    </div>
                </div>
            </div> 
         @else
            <div class="card shadow mb-4 mt-4 mb-4">
                <div class="card-header py-3">
                    <h6 class="font-weight-bold">Data tidak ditemukan<span></h6>
                </div>
            </div>
         @endif
    @endif
     
        

     {{-- <div class="row">
        <div class="col-lg-12 mb-4 mt-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Hasil Pencarian</h6>
                </div>
                <div class="card-body">
                    @if($list['resp'] == 0)
                        <h4 class="small font-weight-bold">Belum terdapat pencarian data<span> </h4>
                    @elseif($list['resp'] == 1 && $list['jumlahSkripsi'] == 0)
                        <h4 class="small font-weight-bold">Data tidak ditemukan<span></h4>
                    @else
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Judul Penelitian</th>
                            <th scope="col">Nama Mahasiswa</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($list_skripsi as $index => $skripsi)
                        <tr>
                            <th scope="row">{{ $index+1 }}</th>
                            <td>{{ $skripsi['judul'] }}</td>
                            <td>{{ $skripsi['penulis']}}</td>
                    
                        </tr>  
                        @endforeach
                        </tbody>
                    </table> 
                    @endif
                </div>
            </div>
        </div> 
    </div>  --}}

@endsection