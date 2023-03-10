@extends('layouts.app')

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
                                            @can('manage-person')
                                                <a href="{{ route('person.edit', $person->id) }}"
                                                   class="btn btn-primary btn-block" role="button">{{ __('Edit') }}</a>
                                                <a onclick="return confirm('Are you sure?')"
                                                   href="{{ route('person.delete', $person->id) }}"
                                                   class="btn btn-danger btn-block">{{ __('Delete') }}</a>
                                            @endcan
                                            <a href="{{ route('person.show', $person->id) }}"
                                               class="btn btn-info btn-block">{{ __('View') }}</a>
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

@section('styles')
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.2/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
@endsection

@section('scripts')
    <script type="text/javascript" src="//cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>

    <script>
        $(document).ready(function () {
            $.noConflict();
            var table = $('#peopleTable').DataTable();
        });
    </script>

    @if ($message = Session::get('person-deleted'))
        <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
        <script>
            toastr.options = {
                "closeButton": true,
                "showDuration": "300",
                "hideDuration": "1000",
                "timeOut": "5000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut",
                "progressBar": true,
            }

            toastr.info('{{ $message }}')
        </script>
    @endif
@endsection

