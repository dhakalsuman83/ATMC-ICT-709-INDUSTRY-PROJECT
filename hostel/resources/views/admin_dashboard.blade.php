<?php include('include/inc_header.php'); ?>
<style type="text/css">
	html, body {
    height: 100%;
     overflow: hidden;
}

	.icon
	{
margin-top:25%;
margin-left:10%;
height: 20%;
width: 50%;
display: block;
	}
	figcaption
	{
		margin-left:25%;
		margin-top: 12%;
	}
	.icon:hover {
  transform: scale(1.5); /* (150% zoom - Note: if the zoom is too large, it will go outside of the viewport) */
}
	.fas:hover {
  transform: scale(1.2); /* (150% zoom - Note: if the zoom is too large, it will go outside of the viewport) */
}
	
</style>
<nav class="navbar navbar-expand-md navbar-light bg-light">
    <div class="mx-auto order-0">
        <a class="navbar-brand mx-auto" href="#">Welcome </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target=".dual-collapse2">
            <span class="navbar-toggler-icon"></span>
        </button>
    </div>

    


    <div class="navbar-collapse collapse w-100 order-3 dual-collapse2">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
           
                <a class="nav-link" href="student/view/{{Session::get('id')}}" > {{ Session::get('fname') }}</a>
              
           
            </li>
            
            <li class="nav-item">
                <a class="nav-link" href="{{URL::to('/logout')}}">Logout</a>
            </li>
        </ul>
    </div>
    
</nav>

<div class="container-fluid" style="max-height: 50% !important">
	<div class="container">
  <div class="row">
    <div class="col-sm-3">
    	<a href="/student"><img class="img-fluid icon" src="image/student.png" >
     <figcaption class="figure-caption text-left"> <b> Students </b></figcaption>
  		</a>
     </div>
    <div class="col-sm-3">
    	<a href="{{URL::to('/course')}}">
      <img class="img-fluid icon" src="image/course.png">
       <figcaption class="figure-caption text-left"> <b> Courses </b> </figcaption>
</a>
    </div>

    <div class="col-sm-3">
    	<a href="{{URL::to('/room')}}">
      <img class="img-fluid icon" src="image/room.png">
       <figcaption class="figure-caption text-left"><b> Rooms </b></figcaption>
      </a>
    </div>
    <div class="col-sm-3">
    	<a href="{{URL::to('/booking')}}">
      <img class="img-fluid icon" src="image/booking.png">
       <figcaption class="figure-caption text-left"><b> Bookings </b></figcaption>
     </a>
 
    </div>
</div>
</div>

</div>

  





