
@extends('mainAdmin')
@section('content')

<style>
	.fas:hover {
  transform: scale(1.2); /* (150% zoom - Note: if the zoom is too large, it will go outside of the viewport) */
}
</style>

<!------- body bart starts here !-->

<div class="container-fluid">
	<div class="row mainbody">
	<div class="col-md-9"> </div>
	<div class="col-md-3"> 
  <button type="button" class="btn btn-default" aria-label="Left Align" data-toggle="modal" data-target="#addstudent">
	 <i class="fas fa-user-plus" style="color: #3b82c9"> New Student</i>
	</button>
</div>
	</div>
</div>
@if (session('status'))
  <div class="alert alert-success alert-dismissible fade show" role="alert" style="width: 90%; margin-left: 5%; margin-top: 1%;">
  {{ session('status') }}
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
  <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif
<script>
  $(".alert").delay(3000).slideUp(200, function() {
    $(this).alert('close');
});
</script>
<!------- data table starts hera !-->
<div class="row">
<div class="col-md-2"> </div>
<div class="">
  



<table id="example"  class="display" cellspacing="0">
	<caption>Recently Added Students</caption>
  <thead>
    <tr>
      <th scope="col">Student Id</th>
       <th scope="col">First Name</th>
      <th scope="col">Middle Name</th>
      <th scope="col">Last Name</th>
      <th scope="col">Contact</th>

       <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    

      @foreach ($student as $student)
<tr>
<td>{{ $student->enrollId }}</td>
<td>{{ $student->fname }}</td>
<td>{{ $student->mname }}</td>
<td>{{ $student->lname }}</td>
<td>{{ $student->contact }}</td>

<td> 
<a href="student/view/{{ $student->sid }}" class="btn btn-primary a-btn-slide-text"> <span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>
        <i class="fas fa-eye" title="View"> </i> </a>
    <a href="student/edit/{{ $student->sid }}" class="btn btn-primary a-btn-slide-text"> <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
        <i class="fas fa-user-edit" title="Edit"> </i> </a>
       <a href="student/delete/{{ $student->sid }}" class="btn btn-primary a-btn-slide-text"> <span class="glyphicon glyphicon-person" aria-hidden="true"></span>
        <i class="fas fa-trash-alt" title="Delete"> </i></a>
        </td>
    </tr>
   
    @endforeach
    
  </tbody>
</table>
<script>
    $(document).ready( function () {
    $('#example').DataTable();
} );
</script>
</div>


<!-- modal !-->
<div class="modal fade bd-example-modal-lg" id="addstudent" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">New Student</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div>
      <div class="modal-body">

      
	<form id="user" action='/student' method='Post'>
    @csrf
  <div class="form-row">
    <div class="form-group col-md-4">
      <label for="fname">First Name</label>
      <input type="text" class="form-control" id="fname" name="fname" placeholder="" required>
    </div>
    <div class="form-group col-md-4">
      <label for="mname">Middle Name</label>
      <input type="text" class="form-control" id="mname" name="mname" placeholder="">
    </div>
    <div class="form-group col-md-4">
      <label for="lname">Last Name</label>
      <input type="text" class="form-control" id="lname" name="lname" placeholder="" required>
    </div>
    </div>
    <div class="form-group col-md-4">
      <label for="address">Address</label>
      <input type="text" class="form-control" id="address" name="address" placeholder="" required>
    </div>

  <div class="form-row">
    <div class="form-group col-md-4">
      <label for="table-striped">Student id</label>
      <input type="text" class="form-control" id="enrollID" name="enrollID" required>
    </div>
    <div class="form-group col-md-4">
      <label for="course">Course</label>
      <select class="form-control" id="s_course" , name="s_course" required>
      <option>1</option>
      <option>2</option>
      <option>3</option>
      <option>4</option>
      <option>5</option>
    </select>
    </div>
    <div class="form-group col-md-4">
      <label for="dob">DOB</label>
      <input type="date" class="form-control" id="dob" name="dob" required>
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-4">
      <label for="contact">Student Contact no</label>
      <input type="text" class="form-control" id="contact" name="contact" required>
    </div>
    
    <div class="form-group col-md-6">
      <label for="email">Email</label>
      <input type="email" class="form-control" id="email" name="email" required>
    </div>
    
  </div>
  <div class="form-row">
    <div class="form-group col-md-4">
      <label for="password">Password</label>
      <input type="password" class="form-control" id="password" name="password" required minlength="8">
    </div>
    <div class="form-group col-md-4">
      <label for="cpassword">Confirm Password</label>
      <input type="password" class="form-control" id="cpassword" name="password" required>
      <span id="message"> </span>
    </div>
  </div>
  <hr>
  <span> <b> Emergency Contact </b> </span>
  <hr>
  <div class="form-row">
  <div class="form-group col-md-4">
      <label for="ename">Full Name</label>
      <input type="text" class="form-control" id="ename" name="ename" required>
    </div>
    <div class="form-group col-md-4">
      <label for="econtact">Contact no</label>
      <input type="text" class="form-control" id="econtact" name="econtact" required>
    </div>
   </div>
   <input type="hidden" id="role" value="0" name="role">
  
  </div>
  </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        	<input type="reset"  class="btn btn-warning btn-md">
      			<input type="submit" value="Add" class="btn btn-primary btn-md">
            <script>
      $('#password, #cpassword').on('keyup', function () {
  if ($('#password').val() == $('#cpassword').val()) {
    $('#message').html('Passwords Match').css('color', 'green');
  } else 
    $('#message').html('Passwords Do Not Match').css('color', 'red');
});
</script>
      </div>	
    </form>
  </div>
</div>
@endsection


