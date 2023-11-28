@extends('layouts.main')

@section('konten')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Transaksi</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Transaksi</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">

            <div class="card text-start">
                <div class="card-body">
                    <h4 class="card-title">Transaksi</h4>
                    <p class="card-text"></p>

                    <div id="container" style="width:100%; height:400px;"></div>

                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection

@section('script')
    <script>
        $(document).ready(function() {

            js = {{ Js::from($transaksi) }}

            myArray = [];
            
            // Tambah data ke dalam chart
            $.each(js, function(i, v) {
                
                data = {};
                data['name'] = v.user.name
                data['y'] = v.user_count
                myArray.push(data)

            });

            var chart = Highcharts.chart('container', {
                chart: {
                    type: 'pie'
                },
                title: {
                    text: 'Data Transaksi Tiap User'
                },
                plotOptions: {
                    series: {
                        allowPointSelect: true,
                        cursor: 'pointer',
                        dataLabels: [{
                            enabled: true,
                            distance: 20
                        }, {
                            enabled: true,
                            distance: -40,
                            style: {
                                fontSize: '1.2em',
                                textOutline: 'none',
                                opacity: 0.7
                            },
                            filter: {
                                operator: '>',
                                property: 'percentage',
                                value: 10
                            }
                        }]
                    }
                },
                series: [{
                    name: 'Percentage',
                    colorByPoint: true,
                    data: myArray
                }]
            });


        });
    </script>
@endsection
