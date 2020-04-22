@extends('auth.main')

@section('title')
    Buku Tamu
@endsection

@section('content')
 <!-- Header -->
 <div class="header bg-gradient-primary py-7 py-lg-8 pt-lg-9">
    <div class="container">
      <div class="header-body text-center mb-7">

      </div>
    </div>
    <div class="separator separator-bottom separator-skew zindex-100">
      <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
        <polygon class="fill-default" points="2560 0 2560 100 0 100"></polygon>
      </svg>
    </div>
  </div>
  <!-- Page content -->
  <div class="container mt--8 pb-5">
    <div class="row justify-content-center">
      <div class="col-md-10">
        <div class="card bg-secondary border-0 mb-0">

          <div class="card-body px-lg-8 py-lg-8">
            <div class="text-center text-muted mb-4">
             <b> <h2>Buku Tamu</h2></b>
            </div>
        <form method="POST" role="form" action="{{route('bukutamu.store')}}">
                @csrf
              <div class="form-group mb-3">
                <label for="nama">Nama</label>
                <div class="input-group input-group-merge input-group-alternative">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="ni "></i></span>
                  </div>
                  <input required autocomplete="nama" id="nama" autofocus class="form-control " name="nama" placeholder="Nama" type="text">
                </div>
              </div>
              <div class="form-group mb-3">
                  <label for="jenis_kelamin">Jenis Kelamin</label>
                <div class="input-group input-group-merge input-group-alternative">
                    <select class="form-control" id="jenis_kelamin" name="jenis_kelamin">
                    <option value="null">Pilih Jenis Kelamin</option>
                    <option value="Laki_laki">Laki-laki</option>
                    <option value="Perempuan">Perempuan</option>
                    </select>
                </div>
              </div>
              <div class="form-group mb-3">
                <label for="umur">Umur</label>
                <div class="input-group input-group-merge input-group-alternative">

                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="ni "></i></span>
                  </div>
                  <input required autocomplete="umur" id="umur" autofocus class="form-control " name="umur" placeholder="Contoh: 20 tahun" type="text">
                </div>
              </div>
              <div class="form-group mb-3">
                <label for="pekerjaan">Pekerjaan</label>
                <div class="input-group input-group-merge input-group-alternative">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="ni "></i></span>
                  </div>
                  <input required autocomplete="Pekerjaan" id="pekerjaan" autofocus class="form-control " name="pekerjaan" placeholder="Pekerjaan" type="text">
                </div>
              </div>
              <div class="form-group mb-3">
                <label for="nohp">No Hp</label>
                <div class="input-group input-group-merge input-group-alternative">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="ni "></i></span>
                  </div>
                  <input required autocomplete="nohp" id="nohp" autofocus class="form-control " name="nohp" placeholder="contoh: 08123455678" type="text">
                </div>
              </div>

              <div class="text-center">
                <button type="submit" class="btn btn-primary my-4">Next</button>
              </div>
            </form>
          </div>
        </div>
        <div class="row mt-3">


        </div>
      </div>
    </div>
  </div>
@endsection
