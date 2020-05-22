@extends('master')

@section('content')
<div class="row">
    <div class="col">
      <div class="card bg-default shadow">
        <div class="card-header bg-transparent border-0">
          <h3 class="text-white mb-0">Hasil Perhitungan</h3>
        </div>
        <div class="table-responsive">
          <table class="table align-items-center table-dark table-flush">
            <thead class="thead-dark">
              <tr>
                <th scope="col" class="sort" >No</th>
                <th scope="col" class="sort" >Pertanyaan</th>
                <th scope="col" class="sort" >Perhitungan</th>

              </tr>
            </thead>
            <tbody class="list">
                @foreach($kuesioner as $key=> $row)
              <tr>
                <th scope="row">
                    {{$loop->iteration}}
                </th>
                <td>
                    <p style="white-space:pre-wrap; word-wrap:break-word"> {{$row->question}}</p>
                </td>
                <td>
                    @if($row->id == $count[$key]->kuesioner_id)
                    {{$count[$key]->result}}
                    @else

                    @endif
                </td>

                @endforeach
              </tr>

            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
@endsection
