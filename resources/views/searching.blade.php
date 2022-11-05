@extends('layouts.layout')
@section('container')
<div class="tab-content" id="nav-tabContent">
    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
        <p class="mt-2 font-weight-bold">Pencarian berdasarkan spesifikasi</p>   
        <form action="" method="GET" id="carispesifikasi">
            <div class="row">
                <div class="col-md-6">
                    <div class="input-group mb-3" >
                        <label class="input-group-text">Penjurusan</label>
                        <select class="form-select" aria-label="Default select example" id="cariJususan" name="cariJususan">
                            <option value="">Pilihlah salah satu</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="input-group mb-3" >
                        <label class="input-group-text">Tahun Angkatan</label>
                        <select class="form-select" aria-label="Default select example" id="cariTahun" name="cariTahun">
                            <option value="">Pilihlah salah satu</option>
                           
                        </select>
                    </div>
                </div>
                <div class="col-md-6">   
                    <div class="input-group mb-3">
                        <label class="input-group-text">Dosen Pembimbing 1</label>
                        <select class="form-select" aria-label="Default select example"id="cariDosenPembimbing1" name="cariDosenPembimbing1">
                            <option value="">Pilihlah salah satu</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">   
                    <div class="input-group mb-3">
                        <label class="input-group-text">Dosen Pembimbing 2</label>
                        <select class="form-select" aria-label="Default select example"id="cariDosenPembimbing2" name="cariDosenPembimbing2">
                            <option value="">Pilihlah salah satu</option>
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
                <input type="submit" name="reset" value="Reset" class="btn btn-danger">
            </div>
          
        </form>
    </div>
</div>
@endsection