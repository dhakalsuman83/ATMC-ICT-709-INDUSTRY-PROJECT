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
      </div>	
    </form>
  </div>
</div>