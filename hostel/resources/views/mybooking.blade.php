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
    <div class="col-md-8"> <span class="badge badge-default">Your Booking Details</span></div>
    <div class="col-md-2"> </div>
  </div>

<div class="row">
<div class="col-md-2"> </div>

<div class="col-md-9">
  @foreach ($book as $book)
  @if($book!="")
  <form class="card p-1" id="user" action="#" method="post">
    @csrf
    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
    
  <div class="form-row">
    <div class="form-group col-md-4">
      <label for="fname">Booking ID</label>
      <input type="text" class="form-control" id="id" name="id" placeholder="" required value="{{ $book->id }}" readonly>
    </div>
    <div class="form-group col-md-4">
      <label for="mname">Start Date</label>
      <input type="text" class="form-control" id="sdate" name="sdate" placeholder="" value="{{ $book->sdate }}" readonly>
    </div>
    <div class="form-group col-md-4">
      <label for="mname">End Date</label>
      <input type="text" class="form-control" id="edate" name="edate" placeholder="" value="{{ $book->edate }}" readonly>
    </div>
    
   
  </div>
  

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

    
@else
<h1>You Have No Bookings At The Moment</h1>
@endif
</div>
@endforeach


@endsection


