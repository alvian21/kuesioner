@extends('master')

@section('content')
<div class="row">
    <div class="col-xl-12">
      <div class="card bg-default">
        <div class="card-header bg-transparent">
          <div class="row align-items-center">
            <div class="col">
              {{-- <h6 class="text-light text-uppercase ls-1 mb-1">Overview</h6> --}}
              <h5 class="h3 text-white mb-0">Grafik Hasil Perhitungan</h5>
            </div>

          </div>
        </div>
        <div class="card-body">
          <!-- Chart -->
          <div class="chart">
              <div class="chartjs-size-monitor">
                  <div class="chartjs-size-monitor-expand">
                      <div class="">
                          </div>
                        </div>
                        <div class="chartjs-size-monitor-shrink">
                            <div class="">
                                </div>
                            </div>
                        </div>
            <!-- Chart wrapper -->
            <canvas id="myChart" width="400" height="400"></canvas>
          </div>
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

            var ctx = document.getElementById('myChart').getContext('2d');
                config = {
                    type: 'line',
                    data: {
                        labels: pertanyaan,
                        datasets: [{
                            label: 'Perhitungan',
                            data: array,
                            backgroundColor:
                                'rgba(255, 99, 132, 0.5)',
                            borderColor:
                                'rgba(255, 99, 132, 1)',
                            borderWidth: 1
                        }]
                    },
                    options: {
				responsive: true,

				tooltips: {
					mode: 'index',
					intersect: false,
				},
				hover: {
					mode: 'nearest',
					intersect: true
				},
				scales: {
					xAxes: [{
						display: true,
						scaleLabel: {
							display: true,

						}
					}],
					yAxes: [{
						display: true,
						scaleLabel: {
							display: true,
                            labelString: 'Value'
						}
					}]
				}
			}
                };

                myChart = new Chart(ctx, config);
                window.myPie = myChart;
        });
    },
    error: function(rtnData) {
            alert('error' + rtnData);
            console.log(rtnData + " asdnjanj");
    }
});





// var MONTHS = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
// 		var config = {
// 			type: 'line',
// 			data: {
// 				labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
// 				datasets: [{
// 					label: 'My First dataset',
// 					backgroundColor: window.chartColors.red,
// 					borderColor: window.chartColors.red,
// 					data: [
// 						randomScalingFactor(),
// 						randomScalingFactor(),
// 						randomScalingFactor(),
// 						randomScalingFactor(),
// 						randomScalingFactor(),
// 						randomScalingFactor(),
// 						randomScalingFactor()
// 					],
// 					fill: false,
// 				}, {
// 					label: 'My Second dataset',
// 					fill: false,
// 					backgroundColor: window.chartColors.blue,
// 					borderColor: window.chartColors.blue,
// 					data: [
// 						randomScalingFactor(),
// 						randomScalingFactor(),
// 						randomScalingFactor(),
// 						randomScalingFactor(),
// 						randomScalingFactor(),
// 						randomScalingFactor(),
// 						randomScalingFactor()
// 					],
// 				}]
// 			},
// 			options: {
// 				responsive: true,
// 				title: {
// 					display: true,
// 					text: 'Chart.js Line Chart'
// 				},
// 				tooltips: {
// 					mode: 'index',
// 					intersect: false,
// 				},
// 				hover: {
// 					mode: 'nearest',
// 					intersect: true
// 				},
// 				scales: {
// 					xAxes: [{
// 						display: true,
// 						scaleLabel: {
// 							display: true,
// 							labelString: 'Month'
// 						}
// 					}],
// 					yAxes: [{
// 						display: true,
// 						scaleLabel: {
// 							display: true,
// 							labelString: 'Value'
// 						}
// 					}]
// 				}
// 			}
// 		};

// 		window.onload = function() {
// 			var ctx = document.getElementById('canvas').getContext('2d');
// 			window.myLine = new Chart(ctx, config);
// 		};

// 		document.getElementById('randomizeData').addEventListener('click', function() {
// 			config.data.datasets.forEach(function(dataset) {
// 				dataset.data = dataset.data.map(function() {
// 					return randomScalingFactor();
// 				});

// 			});

// 			window.myLine.update();
// 		});

// 		var colorNames = Object.keys(window.chartColors);
// 		document.getElementById('addDataset').addEventListener('click', function() {
// 			var colorName = colorNames[config.data.datasets.length % colorNames.length];
// 			var newColor = window.chartColors[colorName];
// 			var newDataset = {
// 				label: 'Dataset ' + config.data.datasets.length,
// 				backgroundColor: newColor,
// 				borderColor: newColor,
// 				data: [],
// 				fill: false
// 			};

// 			for (var index = 0; index < config.data.labels.length; ++index) {
// 				newDataset.data.push(randomScalingFactor());
// 			}

// 			config.data.datasets.push(newDataset);
// 			window.myLine.update();
// 		});

// 		document.getElementById('addData').addEventListener('click', function() {
// 			if (config.data.datasets.length > 0) {
// 				var month = MONTHS[config.data.labels.length % MONTHS.length];
// 				config.data.labels.push(month);

// 				config.data.datasets.forEach(function(dataset) {
// 					dataset.data.push(randomScalingFactor());
// 				});

// 				window.myLine.update();
// 			}
// 		});

// 		document.getElementById('removeDataset').addEventListener('click', function() {
// 			config.data.datasets.splice(0, 1);
// 			window.myLine.update();
// 		});

// 		document.getElementById('removeData').addEventListener('click', function() {
// 			config.data.labels.splice(-1, 1); // remove the label first

// 			config.data.datasets.forEach(function(dataset) {
// 				dataset.data.pop();
// 			});

// 			window.myLine.update();
// });

</script>
@endsection
