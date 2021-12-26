@extends('layouts.app')
@section('title','Sign in')
@section('content')
<div class="row">
  <div class="card card-login mx-auto mt-5 col-md-8 col-lg-6">
    <div class="card-header">Login</div>
    <div class="card-body">
      <form>
        <div class="form-group">
          <div class="form-label-group">
            <label for="inputEmail">Email :</label>
            <input type="email" id="inputEmail" class="form-control" placeholder="Email address" required="required" autofocus="autofocus">
          </div>
        </div>
        <div class="form-group">
          <div class="form-label-group">
            <label for="inputEmail">Password :</label>
            <input type="password" id="inputPassword" class="form-control" placeholder="Password" required="required">
          </div>
        </div>
        <div class="form-group">
          <div class="checkbox">
            <label>
                <input type="checkbox" value="remember-me">
                Remember Password
              </label>
          </div>
        </div>
        <a class="btn btn-primary btn-block" href="index.html">Login</a>
      </form>
      <div class="text-center">
        <a class="d-block medium" href="forgot-password.html">Forgot Password?</a>
      </div>
    </div>
  </div>
</div>
@endsection