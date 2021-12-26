<!-- Student Profile -->
@extends('layouts.app')
@section('title','Home')
@section('content')  
<div class="student-profile py-4">
  <div class="container">
    <div class="row">
      <div class="col-lg-4">
        <div class="card shadow-sm">
          <div class="card-header bg-transparent text-center">
            <img class="profile_img" src="https://placeimg.com/640/480/arch/any" alt="">
            <h3><span id="full_name"></span></h3>
          </div>
          <div class="card-body">
            <p class="mb-0"><strong class="pr-1">User ID:</strong><span id="usr_id"></span></p>
          </div>
        </div>
      </div>
      <div class="col-lg-8">
        <div class="card shadow-sm">
          <div class="card-header bg-transparent border-0">
            <h3 class="mb-0"><i class="far fa-clone pr-1"></i>General Information</h3>
          </div>
          <div class="card-body pt-0">
            <table class="table table-bordered">
              <tr>
                <th width="30%">First Name</th>
                <td width="2%">:</td>
                <td><span id="f_name"></span></td>
              </tr>
              <tr>
                <th width="30%">Last Name </th>
                <td width="2%">:</td>
                <td><span id="l_name"></span></td>
              </tr>
              <tr>
                <th width="30%">Email</th>
                <td width="2%">:</td>
                <td><span id="email_id"></span></td>
              </tr>
              <tr>
                <th width="30%">Grade</th>
                <td width="2%">:</td>
                <td><span id="grade"></span></td>
              </tr>
              <tr id="dob_tr">
                <th width="30%">DOB</th>
                <td width="2%">:</td>
                <td><span id="dob"></span></td>
              </tr>
              <tr id="qal_tr">
                <th width="30%">Qualifications</th>
                <td width="2%">:</td>
                <td><span id="qualification"></span></td>
              </tr>
            </table>
            <strong class="pr-1" style="float: right;"><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">Edit</button></strong>
          </div>
        </div>
      </div>

      <div class="col-lg-12" style="padding-top:20px;">
        <div class="card shadow-sm">
          <div class="card-header bg-transparent border-0">
            <h3 class="mb-0"><i class="far fa-clone pr-1"></i>Subject Information</h3>
          </div>
          <div class="card-body pt-0">
            <table class="table table-bordered" id="subj_data">
              <thead>
                <tr>
                  <th scope="col" width="5%">#No</th>
                  <th scope="col" width="45%">Subject</th>
                  <th scope="col" width="50%">Action</th>
                </tr>
              </thead>

              </table>             
          </div>
        </div>
      </div>

      <div class="col-lg-12" style="padding-top:20px;">
        <div class="card shadow-sm">
          <div class="card-header bg-transparent border-0">
            <h3 class="mb-0"><i class="far fa-clone pr-1"></i>Other Available Subject Information</h3>
          </div>
          <div class="card-body pt-0">
            <table class="table table-bordered" id="more_subj_data">
              <thead>
                <tr>
                  <th scope="col" width="5%">#No</th>
                  <th scope="col" width="45%">Subject</th>
                  <th scope="col" width="50%">Action</th>
                </tr>
              </thead>

              </table>             
          </div>
        </div>
      </div>

    </div>
  </div>
</div>


<!-- Data Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document" style="max-width: 800px !important;">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Edit Personal Information</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
    <div class="card card-register mx-auto mt-5 col-md-12" style="margin-top: 0px !important; border: none;">
      <div class="card-body">
        <form>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <div class="form-label-group">
                  <label for="firstName">First name :</label>
                  <input type="text" id="first_name_edit" class="form-control first_name_edit" placeholder="Enter your first name" required="required" autofocus="autofocus">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-label-group">
                  <label for="last_name_edit">Last name :</label>
                  <input type="text" id="last_name_edit" class="form-control last_name_edit" placeholder="Enter your family name" required="required">
                </div>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="form-label-group">
              <label for="input_email_edit">Email :</label>
              <input type="email" id="input_email_edit" class="form-control input_email_edit" placeholder="Email address" required="required">
            </div>
          </div>
          <div class="form-group" id="dob_edit">
            <div class="form-label-group">
              <label for="input_dob_edit">DOB :</label>
              <input type="date" id="input_dob_edit" class="form-control input_dob_edit" placeholder="Date of Bitrth" required="required">
            </div>
          </div>
          <div class="form-group" id="std_subj">
            <div class="form-label-group">
              <label for="subjects_edit">Subjects :</label>
              <select id="subjects_edit" class="custom-select">
                  <!-- <option value="1">One</option>
                  <option value="2">Two</option>
                  <option value="3">Three</option> -->
              </select>
            </div>
          </div>
          <div class="form-group">
            <div class="form-label-group">
              <label for="departement_edit">Grade :</label>
              <select id="departement_edit" class="custom-select departement_edit">
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
           <div class="form-group" id="qal_edit">
            <div class="form-label-group">
              <label for="input_qualification_edit">Qualifications :</label>
              <textarea class="form-control" id="input_qualification_edit" rows="3"></textarea>
            </div>
          </div>         
        </form>
      </div>
    </div>
  </div>
      </div>
      <div class="modal-footer">        
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary update_user">Update and Save changes</button>
      </div>
    </div>
  </div>
</div>


<!-- Student inf0 -->
<div class="modal fade" id="studentInfo" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document" style="max-width: 800px !important;">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Student Infromation</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th scope="col" width="5%">#No</th>
                  <th scope="col" width="45%">Name</th>
                  <th scope="col" width="50%">Subjects</th>
                </tr>
              </thead>
              <div id=""></div> 
              </table>             
      </div>
    </div>
  </div>
</div>
@endsection
