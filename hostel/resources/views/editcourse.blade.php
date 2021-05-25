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
    <div class="col-md-8"> <span class="badge badge-default">Edit Course</span></div>
    <div class="col-md-2"> </div>
  </div>

<div class="row">
<div class="col-md-2"> </div>
<div class="col-md-9">
  @foreach ($course as $course)
  <form class="card p-1" id="user" action="/course/update/{{ $course->id }} " method="post">
    @csrf
    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
    
  <div class="form-row">
    <div class="form-group col-md-4">
      <label for="fname">Course Code</label>
      <input type="text" class="form-control" id="ccode" name="ccode" placeholder="" required value="{{ $course->ccode }}">
    </div>
    <div class="form-group col-md-4">
      <label for="mname">Course Name</label>
      <input type="text" class="form-control" id="cname" name="cname" placeholder="" value="{{ $course->cname }}">
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


