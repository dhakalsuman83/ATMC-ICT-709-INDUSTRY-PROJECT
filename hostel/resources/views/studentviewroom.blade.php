@extends('mainStudent')

@section('studentcontent')
<script src="code.jquery.com/jquery-2.1.3.min.js"></script>

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
    <div class="form-group col-md-4">
      <label for="lname">Price</label>
      <input type="text" class="form-control" id="price" name="price" placeholder="" required value="{{ $room->price }}" readonly>
    </div>
    <div class="form-group col-md-12">
      <label for="desc">Description</label>
      <textarea type="text" rows = "5" cols = "100" readonly name="desc" class="form-control">{{ $room->description }}</textarea >       
</div>
  </div>
  

  <div class="form-row">
    <div class="form-group col-md-12">
      <label for="table-striped">Room Image </label>
         <img src="{{ url('images/'.$room->image1) }}" style="height:20em ;width:30em;" >
    </div>
    @if($room->image2!="")
    <div class="form-group col-md-12">
      <label for="dob">Room Image </label>
      <img src="{{ url('images/'.$room->image2) }}" alt="" title="" style="height:20em ;width:30em;" />
    </div>
    @endif
    
  </div>
 <div class="form-row">
    <div class="form-group col-md-2" style="margin-top:5%;">
      <label for=""></label>
    <div class="btn btn-primary btn-md" style ="width:10em;" data-toggle="modal" data-target="#book">Book Now </div>
</div>
   <div class="col-md-1"> </div>
   <div class="form-group col-md-2" style="margin-top:5%;">
      <label for=""></label>
      <a href="{{ url()->previous() }}" class="btn btn-primary btn-md" style ="width:10em;">Back</a>
   </div>
   </div>
</div>
  </div>
  </div>
      
            
           
     
    </form>
</div>
<div class="modal fade bd-example-modal-lg" id="book" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Booking Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div>
      <div class="modal-body">

      
	<form id="user" action='bookroom/{{$room->id}}' method='Post'>
    @csrf
  <div class="form-row">
    <div class="form-group col-md-4">
      <label for="sdate">Start Date</label>
      <input type="date" class="form-control" id="sdate" name="sdate" placeholder="" required>
    </div>
    <div class="form-group col-md-4">
      <label for="edate">End Date</label>
      <input type="date" class="form-control" id="edate" name="edate" placeholder="">
    </div>
    <div class="form-group col-md-4">
      <label for="price">Price</label>
      <input type="text" class="form-control" id="p" name="p" placeholder="" value="{{$room->price}}" readonly>
    </div>
    <input type="hidden" name="sid" id="sid" value="{{ Session::get('id') }}">
    <input type="hidden" name="fname" id="fname" value="{{ Session::get('fname') }}">
    <input type="hidden" name="mname" id="mname" value="{{ Session::get('mname') }}">
    <input type="hidden" name="lname" id="lname" value="{{ Session::get('lname') }}">
    <input type="hidden" name="eid" id="eid" value="{{ Session::get('eid') }}">
    <input type="hidden" name="rno" id="rno" value="{{$room->no}}">
    <input type="hidden" name="bstatus" id="bstatus" value="0">
    </div>
    
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
<script type='text/javascript'>
function calculate() {
    var dd=Date.parse(document.getElementById('edate').value);
    var da=Date.parse(document.getElementById('sdate').value);
var total=document.getElementById('tprice');
var hotel=document.getElementById('p');

//no hotel room selected or not depart date set or not arrival date set
//or departing before arrival (nonsense) - set total to ZERO and exit the function

if ( !(dd.value*1) || !(da.value*1) || da.value>dd.value ) {
    total.value='0';//you can set it to 'not allowed' also if you wish (instead of '0')
    return;
}

var days = Math.round( ( 
        dd.value - 
        da.value 
    ) / 86400 ); //timestamp is in seconds
var cost = days * prices[ hotel.value ];
if (isNaN(cost))
    cost = 0; //or set to "invalid input" - but this line should not be needed at this point
tprice = cost;
}
</script>

@endforeach


@endsection


