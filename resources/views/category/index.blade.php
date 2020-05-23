@extends('master')
@section('content')
    <div class="row">
      <div class="col">
        <div class="card">
          <!-- Card header -->
          <div class="card-header border-0">
            <div class="row align-items-center">
                <div class="col-8">
                    <h3 class="mb-0">Kategori</h3>
                </div>
                <div class="col-4 text-right">
                    <a href="{{route('category.create')}}" class="btn btn-primary">Buat Kategori</a>
                </div>
              </div>
          </div>
          <!-- Light table -->
          <div class="table-responsive">
            <table class="table align-items-center table-flush">
              <thead class="thead-light">
                <tr>
                  <th scope="col" >No</th>
                  <th scope="col" >Nama Kategori</th>

                  <th scope="col">Aksi</th>
                </tr>
              </thead>
              <tbody class="list">
                  @foreach($category as $row)
                <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$row->name}}</td>
                  <td class="text">
                    <div class="dropdown">
                      <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-ellipsis-v"></i>
                      </a>
                      <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">

                        <button class="dropdown-item edit" data-id="{{$row->id}}">Edit</button>
                      <button class="dropdown-item hapus" data-id="{{$row->id}}">Hapus</button>

                      </div>
                    </div>
                  </td>
                </tr>
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


  <!-- Modal -->
  <div class="modal fade" id="kategorimodal" tabindex="-1" role="dialog" aria-labelledby="kategorimodalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="kategorimodalLabel">Edit Kategori</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form>
                <input type="hidden" name="idkategori" id="idkategori">
                <div class="form-group">
                  <label for="kategori">Kategori</label>
                  <input type="text" class="form-control" id="kategori" >

                </div>

              </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary" id="updatekategori">Simpan</button>
        </div>
      </div>
    </div>
  </div>
@endsection
@section('script')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
$(document).ready(function(){
    $('.hapus').on('click',function(){
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
                        url:'/admin/category/'+id,
                        method:'DELETE',
                        data:{'delete':1,'id':id},
                        success:function(data){
                        if(data['result']==0){
                            swal({
                                title: "Gagal",
                                text: data['notif'],
                                icon: "error",
                                button: "Ok",
                                });
                        }else if(data['result']==1){
                            swal({
                                title: "Success",
                                text: data['notif'],
                                icon: "success",
                                button: "Ok",
                                });
                                window.setTimeout(function(){window.location.reload()}, 1000);
                        }


                        }
                    });
            }
            });

    });

    $('.edit').on('click', function(){
        $('#kategorimodal').modal('show');
        var id = $(this).data('id');
        ajax();
        $.ajax({
            url:'/admin/category/'+id+'/edit',
            method:'GET',
            success:function(data){
               $('#kategori').val(data['name']);
               $('#idkategori').val(data['id']);
            }
        });
    });

    $('#updatekategori').on('click',function(){
        var category = $('#kategori').val();
        var id = $('#idkategori').val();
        ajax();
        $.ajax({
            url:'/admin/category/update',
            method:'PUT',
            data:{'id':id,'category':category},
            success:function(data){
                $('#kategorimodal').modal('hide');
                if(data['result']=='1'){
                    swal({
                                title: "Success",
                                text: "Kategori Berhasil di update",
                                icon: "success",
                                button: "Ok",
                                });
                                window.setTimeout(function(){window.location.reload()}, 2000);
                }
            }
        });
    })

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
