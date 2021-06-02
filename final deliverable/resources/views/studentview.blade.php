<?php include('include/inc_header.php'); ?>
<html>
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
    <link rel="stylesheet" href="style.css">
    <script type="text/javascript" src="script.js"></script>
<style>
  .fas:hover {
  transform: scale(1.2); /* (150% zoom - Note: if the zoom is too large, it will go outside of the viewport) */

}
.badge{
  margin-top: 5%;
  margin-bottom: 5%;
  font-size: 16px;

}
 .fa{
   margin-top:-12%;
   margin-left:90%;
 }

</style>
</head>
<body>
<!------- body bart starts here !-->
<div class="container-fluid">
  <div class="row">
    <div class="col-md-2"> </div>
    <div class="col-md-8"> <span class="badge badge-default">Student Details</span></div>
    <div class="col-md-2"> </div>
  </div>

<div class="row">
<div class="col-md-2"> </div>
<div class="col-md-9">
  @foreach ($student as $student)
  <form class="card p-1" id="user" action="/update/{{ $student->sid }}" method="post">
    @csrf
    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
    
  <div class="form-row">
    <div class="form-group col-md-4">
      <label for="fname">First Name</label>
      <input type="text" class="form-control" id="fname" name="fname" placeholder="" required value="{{ $student->fname }}" readonly>
    </div>
    <div class="form-group col-md-4">
      <label for="mname">Middle Name</label>
      <input type="text" class="form-control" id="mname" name="mname" placeholder="" value="{{ $student->mname }}" readonly>
    </div>
    <div class="form-group col-md-4">
      <label for="lname">Last Name</label>
      <input type="text" class="form-control" id="lname" name="lname" placeholder="" required value="{{ $student->lname }}" readonly>
    </div>
  </div>
  <div class="form-group col-md-4">
      <label for="lname">Address</label>
      <input type="text" class="form-control" id="address" name="address" placeholder="" required value="{{ $student->lname }}" readonly>
    </div>

  <div class="form-row">
    <div class="form-group col-md-4">
      <label for="table-striped">Student id</label>
      <input type="text" class="form-control" id="enrollID" name="enrollID" required value="{{ $student->enrollId}}"readonly>
    </div>
    <div class="form-group col-md-4">
      <label for="course">Course</label>
      <select class="form-control" id="s_course" , name="s_course" required value="{{ $student->s_course }}" readonly>
      <option>1</option>
      <option>2</option>
      <option>3</option>
      <option>4</option>
      <option>5</option>
    </select>
    </div>
    <div class="form-group col-md-4">
      <label for="dob">DOB</label>
      <input type="date" class="form-control" id="dob" name="dob" required value="{{ $student->dob }}" readonly>
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-4">
      <label for="contact">Student Contact no</label>
      <input type="text" class="form-control" id="contact" name="contact" required value="{{ $student->contact }}" readonly>
    </div>
    
    <div class="form-group col-md-6">
      <label for="email">Email</label>
      <input type="email" class="form-control" id="email" name="email" required value="{{ $student->email }}" readonly>
    </div>
    
  </div>
  
  <hr>
  <span> <b> Emergency Contact </b> </span>
  <hr>
  <div class="form-row">
  <div class="form-group col-md-4">
      <label for="ename">Full Name</label>
      <input type="text" class="form-control" id="ename" name="ename" required value="{{ $student->ename }}" readonly>
    </div>
    <div class="form-group col-md-4">
      <label for="econtact">Contact no</label>
      <input type="text" class="form-control" id="econtact" name="econtact" required value="{{ $student->econtact }}" readonly>
</div>
<div class="form-row">
    <div class="form-group col-md-4" style="margin-top:5%;">
      <label for=""></label>
      <a href="{{ url()->previous() }}" class="btn btn-primary btn-md" style ="width:20em;">Back</a>
   </div>
   <div class="col-md-2"> </div>
   <div class="form-group col-md-4" style="margin-top:5%;">
      <label for=""></label>
      <a href="/changepassword" class="btn btn-primary btn-md" style ="width:20em;"
      data-toggle="modal" data-target="#addstudent">Change Password</a>
   </div>
</div>
  </div>
  </div>
      
    </form>
</div>
<div class="modal fade bd-example-modal-lg" id="addstudent" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">change Password</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
	<form id="user" action='/change/{{ $student->sid }}' method='Post'>
    @csrf
  <div class="form-row">
    <div class="form-group col-md-4">
      <label for="fname">New Password</label>
      <input type="password"  class="form-control" id="password-field" name="password" minlength="8"  required>
      <i class="fa fa-eye" aria-hidden="true" onClick="viewPassword()" id="pass-status"></i>
      
    </div>
    <div class="form-group col-md-4">
      <label for="fname">Confirm Password</label>
      <input type="password" class="form-control" id="cpassword-field" name="password" required>
      <i class="fa fa-eye" aria-hidden="true" onClick="viewcPassword()" id="pass-status"></i>
      <span id="message"> </span>
    </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        	<input type="reset"  class="btn btn-warning btn-md">
      			<input type="submit" value="Update" class="btn btn-primary btn-md">
            </div>	
    </form>
  </div>
</div>
</div>
@endforeach
<script>
      $('#password-field, #cpassword-field').on('keyup', function () {
  if ($('#password-field').val() == $('#cpassword-field').val()) {
    $('#message').html('Passwords Match').css('color', 'green');
  } else 
    $('#message').html('Passwords Do Not Match').css('color', 'red');
});
</script>

 <script type="text/javascript">
function viewPassword()
{
  var passwordInput = document.getElementById('password-field');
  var passStatus = document.getElementById('pass-status');
 
  if (passwordInput.type == 'password'){
    passwordInput.type='text';
    passStatus.className='fa fa-eye-slash';
    
  }
  else{
    passwordInput.type='password';
    passStatus.className='fa fa-eye';
  }
}
</script>
<script type="text/javascript">
function viewcPassword()
{
  var passwordInput = document.getElementById('cpassword-field');
  var passStatus = document.getElementById('pass-status');
 
  if (passwordInput.type == 'password'){
    passwordInput.type='text';
    passStatus.className='fa fa-eye-slash';
    
  }
  else{
    passwordInput.type='password';
    passStatus.className='fa fa-eye';
  }
}
</script>

</body>
</html>


