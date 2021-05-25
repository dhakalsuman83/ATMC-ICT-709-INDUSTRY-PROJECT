@extends('mainAdmin')

@section('content')

<style>
  .fas:hover {
  transform: scale(1.2); /* (150% zoom - Note: if the zoom is too large, it will go outside of the viewport) */

}
.badge{
  margin-top: 5%;
  margin-bottom: 5%;
  font-size: 16px;

}
</style>
<!------- body bart starts here !-->
<div class="container-fluid">
  <div class="row">
    <div class="col-md-2"> </div>
    <div class="col-md-8"> <span class="badge badge-default">Edit Details</span></div>
    <div class="col-md-2"> </div>
  </div>

<div class="row">
<div class="col-md-2"> </div>
<div class="col-md-9">
  @foreach ($student as $student)
  <form class="card p-1" id="user" action="/student/update/{{ $student->sid }}" method="post">
    @csrf
    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
    
  <div class="form-row">
    <div class="form-group col-md-4">
      <label for="fname">First Name</label>
      <input type="text" class="form-control" id="fname" name="fname" placeholder="" required value="{{ $student->fname }}">
    </div>
    <div class="form-group col-md-4">
      <label for="mname">Middle Name</label>
      <input type="text" class="form-control" id="mname" name="mname" placeholder="" value="{{ $student->mname }}">
    </div>
    <div class="form-group col-md-4">
      <label for="lname">Last Name</label>
      <input type="text" class="form-control" id="lname" name="lname" placeholder="" required value="{{ $student->lname }}">
    </div>
  </div>

  <div class="form-row">
    <div class="form-group col-md-4">
      <label for="table-striped">Student id</label>
      <input type="text" class="form-control" id="enrollID" name="enrollID" required value="{{ $student->enrollId}}">
    </div>
    <div class="form-group col-md-4">
      <label for="course">Course</label>
      <select class="form-control" id="s_course" , name="s_course" required value="{{ $student->s_course }}">
      <option>1</option>
      <option>2</option>
      <option>3</option>
      <option>4</option>
      <option>5</option>
    </select>
    </div>
    <div class="form-group col-md-4">
      <label for="dob">DOB</label>
      <input type="date" class="form-control" id="dob" name="dob" required value="{{ $student->dob }}">
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-4">
      <label for="contact">Student Contact no</label>
      <input type="text" class="form-control" id="contact" name="contact" required value="{{ $student->contact }}">
    </div>
    
    <div class="form-group col-md-6">
      <label for="email">Email</label>
      <input type="email" class="form-control" id="email" name="email" required value="{{ $student->email }}">
    </div>
    
  </div>
  
  <hr>
  <span> <b> Emergency Contact </b> </span>
  <hr>
  <div class="form-row">
  <div class="form-group col-md-4">
      <label for="ename">Full Name</label>
      <input type="text" class="form-control" id="ename" name="ename" required value="{{ $student->ename }}">
    </div>
    <div class="form-group col-md-4">
      <label for="econtact">Contact no</label>
      <input type="text" class="form-control" id="econtact" name="econtact" required value="{{ $student->econtact }}">

    </div>
    <div class="form-group col-md-4">
      <label for=""></label>
      <input type="submit" value="Update" class="btn btn-primary btn-md">
   </div>

  
  </div>
  </div>
      
            
           
     
    </form>
</div>

</div>
</div>

@endforeach

@endsection


