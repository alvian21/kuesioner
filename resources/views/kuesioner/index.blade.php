@extends('master')
@section('content')
    <div class="row">
      <div class="col">
        <div class="card">
          <!-- Card header -->
          <div class="card-header border-0">
            <div class="row align-items-center">
                <div class="col-8">
                    <h3 class="mb-0">Kuesioner</h3>
                </div>
                <div class="col-4 text-right">
                    <a href="{{route('kuesioner.create')}}" class="btn btn-primary">Buat Kuesioner</a>
                </div>
              </div>
          </div>
          <!-- Light table -->
          <div class="table-responsive">
            <table class="table align-items-center table-flush">
              <thead class="thead-light">
                <tr>
                  <th scope="col" >No</th>
                  <th scope="col" >Kategori</th>
                  <th scope="col" >Pertanyaan</th>
                  <th scope="col">Aksi</th>
                </tr>
              </thead>
              <tbody class="list">

                @foreach($user->categories as $category)
                    @foreach($category->kuesioners as $row)
                <tr>
                  <th scope="row">
                      {{$loop->iteration}}
                  </th>
                  <td class="budget">
                  {{$category->name}}
                  </td>
                  <td>
                      <p style="white-space:pre-wrap; word-wrap:break-word"> {{$row->question}}</p>

                  </td>

                  <td class="text">
                    <div class="dropdown">
                      <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-ellipsis-v"></i>
                      </a>
                      <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                        <a class="dropdown-item" href="#">Edit</a>
                      <button class="dropdown-item hapus" data-id="{{$row->id}}">Hapus</button>
                      </div>
                    </div>
                  </td>
                </tr>
                    @endforeach
                @endforeach
              </tbody>
            </table>
          </div>
          <!-- Card footer -->
          <div class="card-footer py-4">
            <nav aria-label="...">
              <ul class="pagination justify-content-end mb-0">
                <li class="page-item disabled">
                  <a class="page-link" href="#" tabindex="-1">
                    <i class="fas fa-angle-left"></i>
                    <span class="sr-only">Previous</span>
                  </a>
                </li>
                <li class="page-item active">
                  <a class="page-link" href="#">1</a>
                </li>
                <li class="page-item">
                  <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
                </li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item">
                  <a class="page-link" href="#">
                    <i class="fas fa-angle-right"></i>
                    <span class="sr-only">Next</span>
                  </a>
                </li>
              </ul>
            </nav>
          </div>
        </div>
      </div>
    </div>
@endsection


@section('script')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
    $(document).ready(function(){
        $('.hapus').on('click', function(){
            var id = $(this).data('id');
            swal({
            title: "Apa kamu yakin?",
            text: "Setelah dihapus, Anda tidak akan dapat memulihkan data ini!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
            })
            .then((willDelete) => {
            if (willDelete) {
                ajax();
               $.ajax({
                    url:'/admin/kuesioner/'+id,
                    method:'DELETE',
                    data:{'id':id,'delete':1},
                    success:function(data)
                    {
                        window.setTimeout(function(){window.location.reload()}, 1000);
                    }
               });
            }
            });

        });


        function ajax()
        {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        }
    });

</script>
@endsection
