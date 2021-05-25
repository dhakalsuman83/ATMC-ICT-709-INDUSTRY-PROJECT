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
  <button type="button" class="btn btn-default" aria-label="Left Align" data-toggle="modal" data-target="#addcourse">
	 <i class="fas fa-user-plus" style="color: #3b82c9"> New Course</i>
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
<div class="col-md-4"> </div>
<div class="">
  



<table id="example"  class="display" cellspacing="0">
	<caption>Recently Added Courses</caption>
  <thead>
    <tr>
      <th scope="col">Course Code</th>
       <th scope="col">Course Name</th>

       <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    

      @foreach ($course as $course)
<tr>
<td>{{ $course->ccode }}</td>
<td>{{ $course->cname }}</td>

<td> <a href="course/edit/{{ $course->id }}" class="btn btn-primary a-btn-slide-text"> <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
        <i class="fas fa-user-edit" title="Edit"> </i> </a>
       <a href="course/delete/{{ $course->id }}" class="btn btn-primary a-btn-slide-text"> <span class="glyphicon glyphicon-person" aria-hidden="true"></span>
        <i class="fas fa-trash-alt" title="Delete"> </i></a></td>
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
<div class="modal fade bd-example-modal-lg" id="addcourse" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">New Course</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div>
      <div class="modal-body">

      
	<form id="course" action='/course' method='Post'>
    @csrf
  <div class="form-row">
    <div class="form-group col-md-4">
      <label for="ccode">Course Code</label>
      <input type="text" class="form-control" id="ccode" name="ccode" placeholder="" required>
    </div>
    <div class="form-group col-md-4">
      <label for="cname">Course Name</label>
      <input type="text" class="form-control" id="cname" name="cname" placeholder="">
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
@endsection

