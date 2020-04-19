@extends('master')
@section('content')
<div class="row">
    <div class="col-xl-8 order-xl-1 " >
      <div class="card" >
        <div class="card-header">
          <div class="row align-items-center">
            <div class="col-8">
              <h3 class="mb-0">Buat Kategori</h3>
            </div>

          </div>
        </div>
        <div class="card-body " >
            @if($errors->any())
            <div class="alert alert-danger" role="alert">
                {{$errors->first()}}
            </div>
            @endif
        <form method="POST" action="{{route('category.store')}}">
            @csrf
            <div class="pl-lg-4">
              <div class="row">
                <div class="col-lg-8">
                  <div class="form-group">
                    <label class="form-control-label" for="category">Nama Kategori</label>
                    <input type="text" id="category" name="category" required class="form-control" >
                  </div>
                </div>
              </div>
              <button type="submit" class="btn btn-primary" name="simpan_kategori">Simpan</button>
            </div>
            <hr class="my-4">
            </div>
          </form>
        </div>
      </div>
    </div>



@endsection
