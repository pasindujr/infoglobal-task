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

                            <div class="card-body login-card-body">
                                <p class="login-box-msg">{{ __('Details of '. $person->name) }}</p>

                                <form>

                                    <div class="input-group mb-3">
                                        <input data-toggle="tooltip" data-placement="top" title="Name" disabled
                                               type="text" name="name"
                                               class="form-control placeholder="{{ __('Name') }}" required
                                        autocomplete="name"
                                        value="{{ old('name', $person->name) }}">

                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="fas fa-user"></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="input-group mb-3">
                                        <input data-toggle="tooltip" data-placement="top" title="NIC Number" disabled
                                               type="number" name="id_number"
                                               class="form-control placeholder="{{ __('ID Number') }}" required
                                        autocomplete="id_number"
                                        value="{{ old('id_number', $person->id_number) }}">
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="fas fa-address-card"></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="input-group mb-3">
                                        <input data-toggle="tooltip" data-placement="top" title="Date Of Birth" disabled
                                               type="date" name="dob"
                                               class="form-control
                                               placeholder="{{ __('Date of birth') }}" required autocomplete="dob"
                                        value="{{ old('dob', $person->dob) }}">
                                    </div>

                                    <div class="input-group mb-3">
                                        <input data-toggle="tooltip" data-placement="top" title="Age" disabled
                                               type="number" name="age"
                                               class="form-control
                                               placeholder="{{ __('Age') }}" required autocomplete="age"
                                        value="{{ old('age', $person->age) }}">
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="fas fa-person-booth"></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="input-group mb-3">
                                        <input data-toggle="tooltip" data-placement="top" title="Mobile Number" disabled
                                               type="number" name="mobile"
                                               class="form-control
                                               placeholder="{{ __('Mobile Number') }}" required autocomplete="mobile"
                                        value="{{ old('mobile', $person->mobile) }}">
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="fas fa-mobile"></span>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="input-group mb-3">
                                        <input disabled type="text" name="address"
                                               class="form-control
                                               placeholder="{{ __('Address') }}" autocomplete="address"
                                        value="{{ old('address', $person->address) }}" autofocus>
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="fas fa-location-arrow"></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="input-group mb-3">
                                        <input disabled type="text" name="gender"
                                               class="form-control
                                               placeholder="{{ __('Gender') }}" autocomplete="gender"
                                        value="{{  $person->gender }}" autofocus>
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="fas fa-venus-mars"></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="input-group mb-3">
                                        <input disabled type="text" name="address"
                                               class="form-control
                                               placeholder="{{ __('Religion') }}" autocomplete="address"
                                        value="{{  $person->religion }}" autofocus>
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="fas fa-yin-yang"></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="input-group mb-3">
                                        <input disabled type="text" name="address"
                                               class="form-control placeholder="{{ __('Nationality') }}"
                                        autocomplete="address"
                                        value="{{  $person->nationality }}" autofocus>
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="fas fa-building"></span>
                                            </div>
                                        </div>
                                    </div>

                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
@endsection

