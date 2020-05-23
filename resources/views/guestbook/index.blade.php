@extends('master')
@section('content')
<div class="row">
    <div class="col">
      <div class="card">
        <!-- Card header -->
        <div class="card-header border-0">
          <div class="row align-items-center">
              <div class="col-8">
                  <h3 class="mb-0">Daftar buku tamu yang telah mengisi kuesioner</h3>
              </div>
            </div>
        </div>
        <!-- Light table -->
        <div class="table-responsive">
          <table class="table align-items-center table-flush">
            <thead class="thead-light">
              <tr>
                <th scope="col" >No</th>
                <th scope="col" >Nama </th>
                <th scope="col" >Umur </th>
                <th scope="col" >Jenis Kelamin </th>
                <th scope="col">Pekerjaan </th>
                <th scope="col" >No Telephone </th>
              </tr>
            </thead>
            <tbody class="list">
                @foreach($res as $row)
              <tr>
              <td>{{$loop->iteration}}</td>
              <td>{{$row['name']}}</td>
              <td>{{$row['age']}}</td>
              <td>{{$row['gender']}}</td>
              <td>{{$row['job']}}</td>
              <td>{{$row['telephone']}}</td>
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
@endsection
