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
        <form method="POST" action="{{route('kuesioner.store')}}">
            @csrf
                <div class="form-group">
                  <label for="kategori_kuesioer">Kategori kuesioner</label>
                  <select class="form-control" id="kategori_kuesioer" name="kategori_kuesioner">
                      @foreach($category as $row)
                  <option value="{{$row->id}}">{{$row->name}}</option>
                    @endforeach
                  </select>
                </div>

                <div class="form-group">
                  <label for="pertanyaan">Pertanyaan</label>
                  <textarea class="form-control" id="pertanyaan" name="pertanyaan" required rows="3"></textarea>
                </div>
                <button type="submit" class="btn btn-primary" name="simpan_kuesioner">Simpan</button>
              </form>

        </div>
      </div>
    </div>
  </div>

@endsection
