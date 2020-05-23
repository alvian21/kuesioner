@extends('master')

@section('content')
<div class="row">
    <div class="col-xl-12">
      <div class="card bg-default">

        <div class="card-body">

          <div id="container" style="width:100%; height:400px;">
        </div>
      </div>
    </div>

</div>
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
@section('script')
<script src="https://code.highcharts.com/highcharts.js"></script>
<script>

var config;
var myChart;
$.ajax({
    url:'/admin/fetch',
    type:'GET',
    dataType:'json',
    success:function(rtnData){
        $.each(rtnData, function(dataType,data){
            var array = [];
            var int = 0;
            var pertanyaan = [];
            rtnData['count'].forEach(element => {
                  var result = element['result'];
                  int = int+1;
                  var a = 'Pertanyaan '+int;
                  pertanyaan.push(a);
                  array.push(result);
            });

            Highcharts.chart('container', {
                    chart: {
                        type: 'line',
                        backgroundColor: '#fcba03'
                    },
                    title: {
                        text: 'Grafik Hasil Perhitungan'
                    },

                    xAxis: {
                        categories: pertanyaan
                    },
                    yAxis: {
                        title: {
                            text: 'Hasil'
                        }
                    },
                    plotOptions: {
                        line: {
                            dataLabels: {
                                enabled: true
                            },
                            enableMouseTracking: false
                        }
                    },
                    series: [{
                        name: 'Pertanyaan',
                        data: array
                    }]
                });
        });
    }
});


</script>
@endsection
