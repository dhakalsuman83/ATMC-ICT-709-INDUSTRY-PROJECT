
<?php include('include/inc_header.php'); ?>
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script src="https://kit.fontawesome.com/4f54f6bf07.js" crossorigin="anonymous"></script>

<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script src="https://kit.fontawesome.com/4f54f6bf07.js" crossorigin="anonymous"></script>


<link rel="stylesheet" href="{{ URL::asset('DataTables/datatables.min.css') }}"/>
<script type="text/javascript" src="{{ URL::asset('DataTables/datatables.min.js') }}"></script>

<style type="text/css">
  a.btn:hover {
     -webkit-transform: scale(1.1);
     -moz-transform: scale(1.1);
     -o-transform: scale(1.1);
 }
 a.btn {
     -webkit-transform: scale(0.8);
     -moz-transform: scale(0.8);
     -o-transform: scale(0.8);
     -webkit-transition-duration: 0.5s;
     -moz-transition-duration: 0.5s;
     -o-transition-duration: 0.5s;
 }
</style>
<style type="text/css">
.mainbody
	{
		margin-top: 5%
	}
	.space
	{

	}

</style>

<div class="container-fluid" style="margin-top: 1%">

<ul class="nav nav-pills bg-light justify-content-center">
  <li class="nav-item">
    <a class="nav-link" href="{{URL::to('/admin_dashboard')}}">Home</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="{{URL::to('/student')}}">Student</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="{{URL::to('/course')}}">Courses</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="{{URL::to('/room')}}">Room</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="{{URL::to('/booking')}}">Booking</a>
  </li>

  <li class="nav-item ml-auto">
    <a class="nav-link" href="{{URL::to('/logout')}}">Logout</a>
  </li>

</ul>

</div>

@yield('content')