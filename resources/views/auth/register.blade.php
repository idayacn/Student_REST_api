@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <!-- <form method="POST" action="{{ route('register') }}"> -->
                        @csrf

                        <div class="form-group">
                            <div class="form-row">
                              <div class="col-md-3">
                                <div>
                                  <label>You are :</label>
                                </div>
                              </div>
                              <div class="col-md-6">
                                <div class="form-check-inline">
                                  <label class="form-check-label" for="radio1">
                                      <input type="radio" class="form-check-input" id="radio1" name="user_type" value="student" checked>Student
                                  </label>
                                </div>
                                <div class="form-check-inline">
                                  <label class="form-check-label" for="radio2">
                                      <input type="radio" class="form-check-input" id="radio2" name="user_type" value="teacher">Teacher
                                  </label>
                                </div>
                              </div>
                            </div>
                          </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('First Name') }}</label>

                            <div class="col-md-6">
                                <input id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror first_name" name="first_name" value="{{ old('firstname') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                             <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Last Name') }}</label>

                            <div class="col-md-6">
                                <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror last_name" name="last_name" value="{{ old('last_name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="dob" class="col-md-4 col-form-label text-md-right">{{ __('DOB') }}</label>

                            <div class="col-md-4">
                                <input id="dob" type="date" class="form-control @error('dob') is-invalid @enderror dob" name="dob" value="{{ old('dob') }}" required autocomplete="dob">

                                @error('dob')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div> 

                        <div class="form-group row">
                            <label for="subjects" class="col-md-4 col-form-label text-md-right">{{ __('Subjects') }}</label>

                            <div class="col-md-6">
                              <select id="subjects" class="custom-select subjects" name="subjects" multiple>
                              </select>

                                @error('dob')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div> 

                        <div class="form-group row">
                            <label for="grade" class="col-md-4 col-form-label text-md-right">{{ __('Grade') }}</label>

                            <div class="col-md-6">
                                <select id="departement" class="custom-select grade" name="grade">
                                      <option value="1">1</option>
                                      <option value="2">2</option>
                                      <option value="3">3</option>
                                      <option value="4">4</option>
                                      <option value="5">5</option>
                                      <option value="6">6</option>
                                      <option value="7">7</option>
                                      <option value="8">8</option>
                                      <option value="9">9</option>
                                      <option value="10">10</option>
                                </select>

                                @error('dob')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div> 
                        <div class="form-group row">
                            <label for="grade" class="col-md-4 col-form-label text-md-right">{{ __('Qualifications') }}</label>

                            <div class="col-md-6">
                               <textarea class="form-control qualification" name="qualification" id="inputQualification" rows="3"></textarea>

                                @error('dob')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>             
                        <div class="form-group row">
                            <label for="email_id" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email_id" type="email" class="form-control @error('email_id') is-invalid @enderror email_id" name="email_id" value="{{ old('email_id') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="inputPassword" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="inputPassword" type="password" class="form-control @error('password') is-invalid @enderror password" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="confirmPassword" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="confirmPassword" type="password" class="form-control confirm_password" name="confirm_password" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary reg_user">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    <!-- </form> -->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
