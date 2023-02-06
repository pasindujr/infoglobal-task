@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ __('Insight') }}</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">{{ __('By Age') }}</h5>
                            <div id="ageChart"></div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->

        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">{{ __('By Birth Month') }}</h5>
                            <div id="monthChart"></div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->

        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">{{ __('By Religion') }}</h5>
                            <div id="religionChart"></div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script>
        let optionsForAgeChart = {
            chart: {
                type: 'bar'
            },
            yaxis: {
                title: {
                    text: 'Count'
                }
            },
            series: [{
                name: 'sales',
                data: {{ json_encode($agesArray) }}
            }],
            xaxis: {
                categories: ['Less than 18', '19-30', '31-40', '41-50', '51-60', '61-70', '71-80', '81-90', '90+'],
                title: {
                    text: 'Age Ranges'
                }
            }
        }

        let optionsForMonthsChart = {
            chart: {
                type: 'bar'
            },
            yaxis: {
                title: {
                    text: 'Count'
                }
            },
            series: [{
                name: 'sales',
                data: {{ json_encode($monthsCountArray) }}
            }],
            xaxis: {
                categories: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
                title: {
                    text: 'Months'
                }
            },
        }

        let optionsForReligionChart = {
            series: {{ json_encode($religionCountArray) }},
            chart: {
                width: 700,
                type: 'pie',
            },
            labels: ['Buddhist', 'Christian', 'Muslim', 'Hindu', 'Other'],
            responsive: [{
                breakpoint: 480,
                options: {
                    chart: {
                        width: 200
                    },
                    legend: {
                        position: 'bottom'
                    }
                }
            }]
        };

        let ageChart = new ApexCharts(document.querySelector("#ageChart"), optionsForAgeChart);
        let monthChart = new ApexCharts(document.querySelector("#monthChart"), optionsForMonthsChart);
        let religionChart = new ApexCharts(document.querySelector("#religionChart"), optionsForReligionChart);

        ageChart.render();
        monthChart.render();
        religionChart.render();
    </script>
@endsection
