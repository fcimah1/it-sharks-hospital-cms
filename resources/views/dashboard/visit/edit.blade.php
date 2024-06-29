@extends('dashboard.layout')
@section('content')
<div class="col-lg-12">
    <!-- Basic Card Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"><i class="ri-edit-box-line"></i>Edit Visit </h6>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('visit.update', $visit->id) }}">
                @csrf

                <div class="row mb-3">
                    <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Time') }}</label>

                    <div class="col-md-6">
                        <input id="name" type="datetime-local" class="form-control @error('name') is-invalid @enderror"
                        name="time" value="{{ $visit->time }}" required autocomplete="name" autofocus>

                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">

                        @error('time')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                </div>

                <div class="row mb-3">
                    <label for="role" class="col-md-4 col-form-label text-md-end">{{ __('Doctor') }}</label>

                    <div class="col-md-6">
                        <select name="doctor_id" id="" class="form-control">
                            <option disabled selected>pick doctor</option>

                            @foreach($doctors as $user)
                            <option {{$visit->doctor_id == $user->id ? 'selected' : ''}} value="{{$user->id}}">{{$user->name}}</option>
                            @endforeach
                        </select>
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="role" class="col-md-4 col-form-label text-md-end">{{ __('Nurse') }}</label>

                    <div class="col-md-6">
                        <select name="nurse_id" id="" class="form-control">
                            <option disabled selected>pick nurse</option>

                            @foreach($nurse as $user)
                            <option {{$visit->nurse_id == $user->id ? 'selected' : ''}} value="{{$user->id}}">{{$user->name}}</option>
                            @endforeach
                        </select>
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="role" class="col-md-4 col-form-label text-md-end">{{ __('patient') }}</label>

                    <div class="col-md-6">
                        <select name="patient_id" id="" class="form-control">
                            <option disabled selected>pick patient</option>

                            @foreach($patient as $user)
                            <option {{$visit->patient_id == $user->id ? 'selected' : ''}} value="{{$user->id}}">{{$user->name}}</option>
                            @endforeach
                        </select>
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Update') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

</div>

@endsection