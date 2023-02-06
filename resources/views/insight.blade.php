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
                            <h5 class="card-title">{{ __('By Age') }}</h5>
                            <div id="ageChart"></div>
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
        var optionsForAgeChart = {
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

        var ageChart = new ApexCharts(document.querySelector("#ageChart"), optionsForAgeChart);

        ageChart.render();
    </script>
@endsection
