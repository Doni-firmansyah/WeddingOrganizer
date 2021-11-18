@extends('layouts.dashboard')

@section('title')
Dashboard Finance
@endsection

@section('button')
<a href="/dashboard/vendor-tabel/cetak" class="btn btn-primary">Cetak</a>
@endsection

@section('content')


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" /> --}}
    <style type="text/css">
        .box{
            width:800px;
            margin:0 auto;
        }
    </style>


    <div class="container">
        <div class="row">
            <div class="col-md-12 col-md-offset-1">
                <div class="panel panel-primary">
                    {{-- <div class="panel-heading">
                        <h3 class="panel-title">Laravel Donut HighChart</h3>
                    </div> --}}
                    <div class="panel-body" align="center">
                        <div id="pie_chart" style="width:750px; height:450px;">
                        </div>
                        <div class="col-8 mt-5">
                            <table class="table">
                                <thead>
                                  <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nama Vendor</th>
                                    <th scope="col">Terpesan</th>
                                    <th scope="col">Detail</th>
                                  </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $no=1;
                                    @endphp
                                    @foreach ( $transaksidetails as $transaksidetail )
                                    <tr>
                                        <th scope="row">{{ $no++ }}</th>
                                        <td>{{ $nama=$transaksidetail->nama_vendor }}</td>
                                        <td>{{ DB::table('transaksidetails')->where('nama_vendor',$nama)->count() }}</td>
                                        <td><a class="btn btn-primary btn-sm" href="/dashboard/vendor-tabel/{{ $transaksidetail->nama_vendor }}" role="button">Detail</a></td>
                                      </tr>
                                    @endforeach
                                </tbody>
                              </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="http://code.highcharts.com/highcharts.js"></script>
    <script src="http://code.highcharts.com/modules/exporting.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            var students =  <?php echo json_encode($transaksidetails); ?>;
            var options = {
                chart: {
                    renderTo: 'pie_chart',
                    plotBackgroundColor: null,
                    plotBorderWidth: null,
                    plotShadow: false
                },
                title: {
                    text: 'Data Vendor'
                },
                 tooltip: {
                    pointFormat: '{series.name}: <b>{point.percentage}%</b>',
                    percentageDecimals: 1
                },
                plotOptions: {
                    pie: {
                        allowPointSelect: true,
                        cursor: 'pointer',
                            dataLabels: {
                            enabled: true,
                            color: '#000000',
                            connectorColor: '#000000',
                            formatter: function() {
                                return '<b>'+ this.point.name +'</b>: '+ this.percentage +' %';
                            }
                        }
                    }
                },
                series: [{
                    type:'pie',
                    name:'Vendors'
                }]
            }
            myarray = [];
            $.each(students, function(index, val) {
                myarray[index] = [val.nama_vendor, val.count];
            });
            options.series[0].data = myarray;
            chart = new Highcharts.Chart(options);

        });
    </script>

@endsection
