@extends('layouts.layout')
@section('container')
<div>
    <a type="button" class="btn btn-primary" href="/penelusuran"><span data-feather="arrow-left" class="align-text-bottom"></span>Back</a>
  </div>
    <div class="container" style="margin-top: 125px">
        <div class="row justify-content-center">
                <div class=" my-4 mx-5" style="width:200px;">
                    <div style="width: 250px; height:80px; border-radius:10px; background-color:white;  box-shadow: 0 0 29px 0 rgba(192, 208, 255, 0.975);"  class=" bg-blue-800 d-flex justify-content-center align-items-center">
                        <a class="card-title fs-7 text-dark font-weight-bold" style="text-decoration:none"
                            href="{{ route('detailjangkawaktu', 'kurang-dari-setahun') }}">< 1 Tahun<i class="fa fa-angle-double-right" aria-hidden="true"></i></a>
                    </div>
                </div>
                <div class=" my-4 mx-5" style="width:200px;">
                    <div style="width: 250px; height:80px; border-radius:10px; background-color:white;  box-shadow: 0 0 29px 0 rgba(192, 208, 255, 0.975);"  class=" bg-blue-800 d-flex justify-content-center align-items-center">
                        <a class="card-title fs-7 text-dark font-weight-bold" style="text-decoration:none"
                            href="{{ route('detailjangkawaktu', 'sama-dengan-setahun') }}">= 1 Tahun<i class="fa fa-angle-double-right" aria-hidden="true"></i></a>
                    </div>
                </div>
                <div class=" my-4 mx-5" style="width:200px;">
                    <div style="width: 250px; height:80px; border-radius:10px; background-color:white;  box-shadow: 0 0 29px 0 rgba(192, 208, 255, 0.975);"  class=" bg-blue-800 d-flex justify-content-center align-items-center">
                        <a class="card-title fs-7 text-dark font-weight-bold" style="text-decoration:none"
                            href="{{ route('detailjangkawaktu', 'lebih-dari-setahun') }}">> 1 Tahun<i class="fa fa-angle-double-right" aria-hidden="true"></i></a>
                    </div>
                </div>
        </div>
        </div>
    </div>
@endsection 