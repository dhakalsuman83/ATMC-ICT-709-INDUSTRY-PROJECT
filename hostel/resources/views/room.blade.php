
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
	 <i class="fas fa-user-plus" style="color: #3b82c9"> New Room</i>
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
	<caption>Recently Added Rooms</caption>
  <thead>
    <tr>
      <th scope="col">Room Number</th>
       <th scope="col">Block</th>
      <th scope="col">description</th>
      <th scope="col">Price</th>
      <th scope="col">Image</th>
       <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    

      @foreach ($room as $room)
<tr>
<td>{{ $room->no }}</td>
<td>{{ $room->block }}</td>
<td>{{ $room->description }}</td>
<td>{{ $room->price }}</td>
<td><img src="{{ url('thumbnail/'.$room->image1) }}" alt="" title="" /></td>

<td> 
<a href="room/view/{{ $room->id }}" class="btn btn-primary a-btn-slide-text"> <span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>
        <i class="fas fa-eye" title="View"> </i> </a>
    <a href="room/edit/{{ $room->id }}" class="btn btn-primary a-btn-slide-text"> <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
        <i class="fas fa-user-edit" title="Edit"> </i> </a>
       <a href="room/delete/{{ $room->id }}" class="btn btn-primary a-btn-slide-text"> <span class="glyphicon glyphicon-person" aria-hidden="true"></span>
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
        <h5 class="modal-title" id="exampleModalCenterTitle">New Room</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div>
      <div class="modal-body">

      
	<form id="user" action='/room' enctype="multipart/form-data" method='Post'>
    @csrf
  <div class="form-row">
    <div class="form-group col-md-4">
      <label for="no">Room Number *</label>
      <input type="text" class="form-control" id="no" name="no" placeholder="" required>
    </div>
    <div class="form-group col-md-4">
      <label for="block">Block *</label>
      <input type="text" class="form-control" id="block" name="block" placeholder="" required>
    </div>
    <div class="form-group col-md-4">
      <label for="price">Price *</label>
      <input type="text" class="form-control" id="price" name="price" placeholder="" required>
    </div>
    </div>
    
    <div class="form-group col-md-12">
      <label for="desc">Description *</label>
      <textarea rows = "5" cols = "100" class="form-control" id="desc" name="desc" placeholder="" required>

         </textarea>
    </div>

    <div class="form-group col-md-4">
      <label for="image">Image 1 *</label>
      <input type="file" class="form-control" id="image" name="image" required>
    </div>
    
    <div class="form-group col-md-4">
      <label for="image2">Image 2</label>
      <input type="file" class="form-control" id="image2" name="image2" >
    </div>
    <input type="hidden" id="available" name="available" value="0" >

    <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        	<input type="reset"  class="btn btn-warning btn-md">
      			<input type="submit" value="Add" class="btn btn-primary btn-md">
      </div>	
  </div>
  </div>
  </div>	
    </form>
  </div>
</div>
@endsection


