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
                            <div class="card-body login-card-body">
                                <p class="login-box-msg">{{ __('Update') }}</p>

                                <form method="POST" action="{{ route('person.update', $person->id) }}"
                                      enctype="multipart/form-data">

                                    @method('PATCH')
                                    @csrf

                                    <div class="input-group mb-3">
                                        <input data-toggle="tooltip" data-placement="top" title="Name" type="text"
                                               name="name" id="name"
                                               class="form-control @error('name') is-invalid @enderror"
                                               placeholder="{{ __('Name') }}" required autocomplete="name"
                                               value="{{ old('name', $person->name) }}">

                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="fas fa-user"></span>
                                            </div>
                                        </div>
                                        @error('name')
                                        <span class="error invalid-feedback">
                    {{ $message }}
                </span>
                                        @enderror
                                    </div>

                                    <div class="input-group mb-3">
                                        <input data-toggle="tooltip" data-placement="top" title="NIC Number"
                                               type="number" name="id_number"
                                               class="form-control @error('id_number') is-invalid @enderror"
                                               placeholder="{{ __('ID Number') }}" required autocomplete="id_number"
                                               value="{{ old('id_number', $person->id_number) }}">
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="fas fa-address-card"></span>
                                            </div>
                                        </div>
                                        @error('id_number')
                                        <span class="error invalid-feedback">
                    {{ $message }}
                </span>
                                        @enderror
                                    </div>

                                    <div class="input-group mb-3">
                                        <input data-toggle="tooltip" data-placement="top" title="Birthday" type="date"
                                               name="dob"
                                               class="form-control @error('dob') is-invalid @enderror"
                                               placeholder="{{ __('Date of birth') }}" required autocomplete="dob"
                                               value="{{ old('dob', $person->dob) }}">
                                        @error('dob')
                                        <span class="error invalid-feedback">
                    {{ $message }}
                </span>
                                        @enderror
                                    </div>

                                    <div class="input-group mb-3">
                                        <input data-toggle="tooltip" data-placement="top" title="Age" type="number"
                                               name="age"
                                               class="form-control @error('age') is-invalid @enderror"
                                               placeholder="{{ __('Age') }}" required autocomplete="age"
                                               value="{{ old('age', $person->age) }}">
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="fas fa-person-booth"></span>
                                            </div>
                                        </div>
                                        @error('age')
                                        <span class="error invalid-feedback">
                    {{ $message }}
                </span>
                                        @enderror
                                    </div>

                                    <div class="input-group mb-3">
                                        <input data-toggle="tooltip" data-placement="top" title="Mobile Number"
                                               type="number" name="mobile"
                                               class="form-control @error('mobile') is-invalid @enderror"
                                               placeholder="{{ __('Mobile Number') }}" required autocomplete="mobile"
                                               value="{{ old('mobile', $person->mobile) }}">
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="fas fa-mobile"></span>
                                            </div>
                                        </div>
                                        @error('mobile')
                                        <span class="error invalid-feedback">
                    {{ $message }}
                </span>
                                        @enderror
                                    </div>

                                    <div class="input-group mb-3">
                                        <select data-toggle="tooltip" data-placement="top" title="Gender" type="text"
                                                name="gender"
                                                class="form-control @error('gender') is-invalid @enderror"
                                                autocomplete="religion">
                                            <option value={{ null }}>Select Gender</option>
                                            <option @if($person->gender == 'male') selected @endif value="male">Male
                                            </option>
                                            <option @if($person->gender == 'female') selected @endif value="female">
                                                Female
                                            </option>
                                            <option @if($person->gender == 'other') selected @endif value="other">
                                                Other
                                            </option>
                                        </select>
                                        @error('gender')
                                        <span class="error invalid-feedback">
                    {{ $message }}
                </span>
                                        @enderror
                                    </div>

                                    <div class="input-group mb-3">
                                        <input data-toggle="tooltip" data-placement="top" title="Address" type="text"
                                               name="address"
                                               class="form-control @error('address') is-invalid @enderror"
                                               placeholder="{{ __('Address') }}" autocomplete="address"
                                               value="{{ old('address', $person->address) }}" autofocus>
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="fas fa-location-arrow"></span>
                                            </div>
                                        </div>
                                        @error('address')
                                        <span class="error invalid-feedback">
                    {{ $message }}
                </span>
                                        @enderror
                                    </div>

                                    <div class="input-group mb-3">
                                        <select data-toggle="tooltip" data-placement="top" title="Religion" type="text"
                                                name="religion"
                                                class="form-control @error('religion') is-invalid @enderror"
                                                autocomplete="religion">
                                            <option value={{ null }}>Select your religion</option>
                                            <option @if($person->religion == 'buddhist') selected
                                                    @endif value="buddhist">Buddhist
                                            </option>
                                            <option @if($person->religion == 'christian') selected
                                                    @endif value="christian">Christian
                                            </option>
                                            <option @if($person->religion == 'muslim') selected @endif value="muslim">
                                                Muslim
                                            </option>
                                            <option @if($person->religion == 'hindu') selected @endif value="hindu">
                                                Hindu
                                            </option>
                                            <option @if($person->religion == 'other') selected @endif value="other">
                                                Other
                                            </option>
                                        </select>
                                        @error('religion')
                                        <span class="error invalid-feedback">
                    {{ $message }}
                </span>
                                        @enderror
                                    </div>

                                    <div class="input-group mb-3">
                                        <select data-toggle="tooltip" data-placement="top" title="Nationality"
                                                type="text" name="nationality"
                                                class="form-control @error('nationality') is-invalid @enderror"
                                                autocomplete="nationality">
                                            <option value={{ null }}>Select your nationality</option>
                                            <option @if($person->nationality == 'sinhala') selected
                                                    @endif value="sinhala">Sinhala
                                            </option>
                                            <option @if($person->nationality == 'tamil') selected @endif value="tamil">
                                                Tamil
                                            </option>
                                            <option @if($person->nationality == 'islam') selected @endif value="islam">
                                                Islam
                                            </option>
                                            <option @if($person->nationality == 'other') selected @endif value="other">
                                                Other
                                            </option>
                                        </select>
                                        @error('nationality')
                                        <span class="error invalid-feedback">
                    {{ $message }}
                </span>
                                        @enderror
                                    </div>


                                    <div class="row">
                                        <div class="col-4">
                                            <button type="submit"
                                                    class="btn btn-primary btn-block">{{ __('Update') }}</button>
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

@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
@endsection

@section('scripts')
    @if ($message = Session::get('person-updated'))
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

            toastr.success('{{ $message }}')
        </script>
    @endif
@endsection

