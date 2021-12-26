@extends('layouts.app')
@section('title','Sign up')
@section('content')
<!-- <div class="container content"> -->
  <div class="row">
    <div class="card card-register mx-auto mt-5 col-md-8">
      <div class="card-header">Register an Account</div>
      <div class="card-body">
        <!-- <form action="/save_user" method="POST" enctype="multipart/form-data"> -->
          
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
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <div class="form-label-group">
                  <label for="firstName">First name :</label>
                  <input type="text" id="firstName" class="form-control first_name" name="first_name" placeholder="Enter your first name" required="required" autofocus="autofocus">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-label-group">
                  <label for="lastName">Last name :</label>
                  <input type="text" id="lastName" class="form-control last_name" name="last_name" placeholder="Enter your family name" required="required">
                </div>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="form-label-group">
              <label for="inputEmail">Email :</label>
              <input type="email" id="inputEmail" class="form-control email_id" placeholder="Email address" name="email_id" required="required">
            </div>
          </div>
          <div class="form-group">
            <div class="form-label-group">
              <label for="inputDob">DOB :</label>
              <input type="date" id="inputDob" class="form-control dob" name="dob" placeholder="Date of Bitrth" required="required">
            </div>
          </div>
          <div class="form-group">
            <div class="form-label-group">
              <label for="subjects">Subjects :</label>
              <select id="subjects" class="custom-select subjects" name="subjects" multiple>
                  <!-- <option value="1">One</option>
                  <option value="2">Two</option>
                  <option value="3">Three</option> -->
              </select>
            </div>
          </div>
          <div class="form-group">
            <div class="form-label-group">
              <label for="departement">Grade :</label>
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
            </div>
          </div>
           <div class="form-group">
            <div class="form-label-group">
              <label for="inputQualification">Qualifications :</label>
              <textarea class="form-control qualification" name="qualification" id="inputQualification" rows="3"></textarea>
            </div>
          </div>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <div class="form-label-group">
                  <label for="inputPassword">Password :</label>
                  <input type="password" id="inputPassword" class="form-control password" name="password" placeholder="Password" required="required">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-label-group">
                  <label for="inputPassword">Repeat password :</label>
                  <input type="password" id="confirmPassword" class="form-control confirm_password" name="confirm_password" placeholder="Repeat password" required="required">
                </div>
              </div>
              <span style="font-style: italic; color: red;" class="pass_error"></span>
            </div>
          </div>

          <!-- <a class="btn btn-primary btn-block reg_user" href="">Register</a> -->
          <button type="submit" class="btn btn-primary btn-block reg_user">Register</button>
        <!-- </form>         -->
      </div>
    </div>
  </div>
<!-- </div> -->
@endsection

