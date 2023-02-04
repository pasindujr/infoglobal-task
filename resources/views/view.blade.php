@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.2/css/jquery.dataTables.min.css">

@endsection

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ __('Dashboard') }}</h1>
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
                            <p class="card-text">
                                {{ __('You are logged in!') }}
                            </p>
                            <table class="table" id="peopleTable">
                                <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>NIC Number</th>
                                    <th>Mobile Number</th>
                                    <th>DOB</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($people as $person)
                                    <tr>
                                        <td>{{ $person->name }}</td>
                                        <td>{{ $person->id_number }}</td>
                                        <td>{{ $person->mobile }}</td>
                                        <td>{{ $person->dob }}</td>
                                        <td>
                                            <a href="{{ route('person.edit', $person->id) }}"
                                               class="btn btn-primary btn-block" role="button">{{ __('Edit') }}</a>
                                            <button type="submit"
                                                    class="btn btn-danger btn-block">{{ __('Delete') }}</button>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>

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
    <script type="text/javascript" src="//cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>

    <script>$(document).ready(function () {
            $.noConflict();
            var table = $('#peopleTable').DataTable();
        });
    </script>
@endsection

