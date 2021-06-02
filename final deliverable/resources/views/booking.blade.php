
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
<div class="col-md-1"> </div>
<div class="col-md-10">



<table id="example"  class="display" cellspacing="0">
	<caption>Recent Boooking</caption>
  <thead>
    <tr>
    <th scope="col">Booking Id</th>
      <th scope="col">full Name</th>
       <th scope="col">Student ID</th>
      <th scope="col">Start Date</th>
      <th scope="col">End Date</th>
      <th scope="col">Enroll ID</th>
      <th scope="col">Room Number</th>

       <th scope="col">Actions</th>
       <th scope="col"> </th>
    </tr>
  </thead>
  <tbody>
    

      @foreach ($book as $book)
<tr>
<td>{{ $book->id}}</td>
<td>{{ $book->fname}} {{ $book->mname}} {{ $book->lname}}</td>
<td>{{ $book->s_id }}</td>
<td>{{ $book->sdate }}</td>
<td>{{ $book->edate }}</td>
<td>{{ $book->eid }}</td>
<td>{{ $book->rno }}</td>


<td> 
  <button type="button" class="btn btn-primary a-btn-slide-text">
    <i class="fas fa-user-edit" title="Edit" data-toggle="modal" data-target="#addstudent"> </i>
	</button>
  </td>
  <td>
  <a href="booking/delete/{{ $book->id }}">
  <button type="button" class="btn btn-primary a-btn-slide-text">
    <i class="fas fa-trash-alt" title="Delete"> </i>
	</button>
  </a>

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



<div class="modal fade bd-example-modal-lg" id="addstudent" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Edit Booking</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
	<form id="user" action='/booking/update/{{ $book->id }}' method='Post'>
    @csrf
  <div class="form-row">
    <div class="form-group col-md-4">
      <label for="fname">Start Date</label>
      <input type="date" value="{{$book->sdate}}" class="form-control" id="sdate" name="sdate"  required>
    </div>
    <div class="form-group col-md-4">
      <label for="fname">End Date</label>
      <input type="date" value="{{$book->edate}}" class="form-control" id="edate" name="edate" required>
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
</div>
</div>

@endsection


