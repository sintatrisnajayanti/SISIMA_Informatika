@extends('layouts.layout')
@section('container')
<div class="row">
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-0">
            <div class="card-body">
                <div class="row no-gutters align-items-center px-3">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Total Data</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">300</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    @foreach ($posts as $post)
        <div class="col-sm-6 mb-3" >
          <div class="card">
            <div class="card-body">
              <h6 class="card-title">{{ $post["judul"] }}</h6>
              <p class="card-text">{{ $post["nama"] }}.</p>
              <div class="d-flex justify-content-center">
              <a href="/detailskripsi/{{ $post["slug"] }}" class="btn btn-primary ">Detail</a>
            </div>
        </div>
     </div>
</div>

    
@endforeach
  
   
@endsection