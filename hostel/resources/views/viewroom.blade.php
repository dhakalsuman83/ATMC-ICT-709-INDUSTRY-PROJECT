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
    <div class="col-md-8"> <span class="badge badge-default">Room Details</span></div>
    <div class="col-md-2"> </div>
  </div>

<div class="row">
<div class="col-md-2"> </div>
<div class="col-md-9">
  @foreach ($room as $room)
  <form class="card p-1" id="user" action="#" method="post">
    @csrf
    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
    
  <div class="form-row">
    <div class="form-group col-md-4">
      <label for="fname">Room Number</label>
      <input type="text" class="form-control" id="no" name="no" placeholder="" required value="{{ $room->no }}" readonly>
    </div>
    <div class="form-group col-md-4">
      <label for="mname">Block</label>
      <input type="text" class="form-control" id="block" name="block" placeholder="" value="{{ $room->block }}" readonly>
    </div>
    <div class="form-group col-md-12">
      <label for="desc">Description</label>
      <textarea type="text" rows = "5" cols = "100" readonly name="desc" class="form-control">{{ $room->description }}</textarea >       
</div>
  </div>
  <div class="form-group col-md-4">
      <label for="lname">Price</label>
      <input type="text" class="form-control" id="price" name="price" placeholder="" required value="{{ $room->price }}" readonly>
    </div>

  <div class="form-row">
    <div class="form-group col-md-12">
      <label for="table-striped">Room Image </label>
         <img src="{{ url('images/'.$room->image1) }}" style="height:20em ;width:30em;" >
    </div>
    <div class="form-group col-md-12">
      <label for="dob">Room Image </label>
      <img src="{{ url('images/'.$room->image2) }}" alt="" title="" style="height:20em ;width:30em;" />
    </div>
  </div>
 
    <div class="form-group col-md-4" style="margin-top:5%;">
      <label for=""></label>
      <a href="{{ url()->previous() }}" class="btn btn-primary btn-md" style ="width:20em;">Back</a>
   </div>
</div>
  </div>
  </div>
      
            
           
     
    </form>
</div>

</div>
</div>

@endforeach

@endsection


