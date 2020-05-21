@extends('book.main')

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
      <div class="col-md-12">
        <div class="card bg-secondary border-0 mb-0">

          <div class="card-body px-lg-10 py-lg-10">
            <div class="text-center text-muted mb-4">
             <b> <h2>Kuesioner</h2></b>
            </div>
            <form method="POST" role="form" action="#">
                @csrf
                <div class="table-responsive">
                    <table class="table align-items-center table-flush">
                      <thead class="thead-light">
                        <tr>
                        <th scope="col">No</th>
                          <th scope="col" class="sort" data-sort="name">Pertanyaan</th>
                          <th scope="col" style="text-align: center">Jawaban Anda</th>
                            <th></th>
                        </tr>
                      </thead>
                      <tbody class="list">

                    @foreach($data as $row)

                        <tr>
                        <input type="hidden" name="guestid[]" class="idguest" value="{{$user->id}}">
                            <input type="hidden" name="dataid[]" class="idkuesioner" value="{{$row->id}}" >
                        <td>{{$loop->iteration}}</td>
                          <td >
                           <p style="white-space:pre-wrap; word-wrap:break-word">{{$row->question}}</p>
                          </td>

                            <td>

                                <div class="row" style="text-align: center">
                                    <div class="col-md-6">
                                        <div class="col-md-12" style="padding-left: 5px" >

                                        <label for="">  <input type="radio" value="4"  name="dataradio{{$row->id}}" >Sangat Setuju</label>

                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="col-md-12" >
                                            <label for="">  <input type="radio" value="3"  name="dataradio{{$row->id}}" >Setuju</label>
                                        </div>

                                 </div>
                                </div>

                                <div class="row" style="text-align: center">
                                    <div class="col-md-6">
                                        <div class="col-md-12" style="padding-left: 5px">
                                            <label for="">  <input type="radio" value="2"  name="dataradio{{$row->id}}" >Tidak Setuju</label>
                                        </div>

                                    </div>
                                    <div class="col-md-6">
                                        <div class="col-md-12" >
                                            <label for="">  <input type="radio" value="1"  name="dataradio{{$row->id}}" >Sangat Tidak Setuju</label>
                                        </div>

                                 </div>
                                </div>
                            </td>
                        </tr>
                        @endforeach

                      </tbody>
                    </table>
                  </div>
              <div class="text-center">
                <button type="button" id="next" class="btn btn-primary my-4">Next</button>
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

@section('script')

<script>

    $(document).ready(function(){
        function ajax()
        {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        }


        $('#next').on('click',function(){

                var idarray = [];
                $('.idkuesioner').each(function(){
                idarray.push($(this).val());
                });
                var idguest = [];
                $('.idguest').each(function(){
                    idguest.push($(this).val());
                })
                var hasil = $('input[type=radio]:checked');
                var array=[];
                for (var index = 0; index < hasil.length; index++) {
                    var a = hasil[index].value;
                    var b = idarray[index];
                    var c = idguest[index];
                    var dataid = {};
                    var guestid = [];
                    var kuesionerid = {};
                    var data = {dataid:a,kuesionerid:b,guestid:c};
                        array.push(data);
                }
                    ajax();
                    $.ajax({
                        url:'/data/post',
                        method:'POST',
                        data:{array},
                        success:function(data){
                            console.log(data);
                        }
                    });
        })
    });
</script>

@endsection
