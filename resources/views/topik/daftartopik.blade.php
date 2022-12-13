@extends('layouts.layout')
@section('container')
<div>
    <a type="button" class="btn btn-primary" href="/penelusuran"><span data-feather="arrow-left" class="align-text-bottom"></span>Back</a>
</div>
    <div class="container" style="margin-top: 80px">
        <div class="row justify-content-center mt-3">
            @foreach ($topikpermasalahan as $item)
                <div class=" my-3 mx-5" style="width:200px;">
                    <div style="width: 200px; height:100px; border-radius:10px; background-color:white;  box-shadow: 0 0 29px 0 rgba(192, 208, 255, 0.975);"  class=" bg-blue-800 d-flex justify-content-center align-items-center">
                        <a class="card-title fs-6 text-dark font-weight-bold" style="text-decoration:none"
                            href="{{ route('detailtopik', [$item['id']]) }}">{{ $item['nama'] }}<i
                                class="fa fa-angle-double-right" aria-hidden="true"></i></a>
                    </div>
                    </div>
            @endforeach
        </div>
        </div>
    </div>
@endsection