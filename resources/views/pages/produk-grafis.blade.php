@extends('layouts.main')

@section('konten')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Produk Grafis</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Produk Grafis</li>
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
                    <h4 class="card-title">Produk Grafis</h4>
                    <p class="card-text"></p>

                    <div id="produk" style="width:100%; height:400px;"></div>

                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection

@section('script')
    <script>
        $(document).ready(function() {

            const a = {{ Js::from($produk_jenis) }}

            // Data retrieved from https://gs.statcounter.com/browser-market-share#monthly-202201-202201-bar

            // Create the chart
            Highcharts.chart('produk', {
                chart: {
                    type: 'column'
                },
                title: {
                    align: 'left',
                    text: 'Data Produk'
                },
                accessibility: {
                    announceNewData: {
                        enabled: true
                    }
                },
                xAxis: {
                    type: 'category'
                },
                yAxis: {
                    title: {
                        text: 'Total percent market share'
                    }

                },
                legend: {
                    enabled: false
                },
                tooltip: {
                    headerFormat: '<span style="font-size:11px">{series.name}</span><br>'
                },

                series: [{
                    name: 'Produk',
                    colorByPoint: true,
                    data: [{
                            name: 'SmartPhone',
                            y: 63.06,
                        },
                        {
                            name: 'Laptop',
                            y: 19.84,
                        },
                        {
                            name: 'Firefox',
                            y: 4.18,
                        },
                        {
                            name: 'Edge',
                            y: 4.12,
                        },
                        {
                            name: 'Opera',
                            y: 2.33,
                        },
                        {
                            name: 'Internet Explorer',
                            y: 0.45,
                        },
                        {
                            name: 'Other',
                            y: 1.582,
                        }
                    ]
                }]
            });

        });
    </script>
@endsection
