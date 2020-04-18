@extends('master')
@section('content')



<div class="row">

    <div class="col-xl-8 order-xl-1 " >
      <div class="card" >
        <div class="card-header">
          <div class="row align-items-center">
            <div class="col-8">
              <h3 class="mb-0">Buat kuesioner</h3>
            </div>

          </div>
        </div>
        <div class="card-body " >
          <form>
            <div class="pl-lg-4">
              <div class="row">
                <div class="col-lg-8">
                  <div class="form-group">
                    <label class="form-control-label" for="nama_kuesioner">Nama kuesioner</label>
                    <input type="text" id="nama_kuesioner" class="form-control" >
                  </div>
                </div>
              </div>
              <button type="submit" class="btn btn-primary" name="simpan_kuesioner">Simpan</button>
            </div>
            <hr class="my-4">
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

@endsection
