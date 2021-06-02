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
    <div class="col-md-8"> <span class="badge badge-default">Edit Room</span></div>
    <div class="col-md-2"> </div>
  </div>

<div class="row">
<div class="col-md-2"> </div>
<div class="col-md-9">
  @foreach ($room as $room)
  <form class="card p-1" id="user" action="/room/update/{{ $room->id }}" method= "POST" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
    
  <div class="form-row">
    <div class="form-group col-md-4">
      <label for="no">Room Number *</label>
      <input type="text" class="form-control" id="no" name="no" placeholder="" required 
      value="{{$room->no }}">
    </div>

    <div class="form-group col-md-4">
      <label for="block">Block *</label>
      <input type="text" class="form-control" id="block" name="block" placeholder="" required value="{{ $room->block}}">
    </div>

    <div class="form-group col-md-4">
      <label for="price">Price *</label>
      <input type="text" class="form-control" id="price" name="price" placeholder="" required
    value="{{ $room->price}}">
    </div>
    </div>
    
    <div class="form-group col-md-12">
      <label for="desc">Description *</label>
      <textarea type="text" rows = "5" cols = "100"  name="desc" class="form-control">{{ $room->description }}</textarea >       
    </div>

    <div class="form-group col-md-4">
      <label for="image">Image 1 *</label>
      <input type="file" class="form-control" id="image" name="image" required 
      value="{{ $room->image1}}">
    </div>
    
    <div class="form-group col-md-4">
      <label for="image2">Image 2</label>
      <input type="file" class="form-control" id="image2" name="image2" value="{{ $room->image2}}">
    </div>
   
  
    <div class="form-group col-md-4">
      <label for=""></label>
      <input type="submit" value="update" class="btn btn-primary btn-md">
   </div>

  
  </div>
  </div>
      
            
           
     
    </form>
</div>

</div>


@endforeach

@endsection


