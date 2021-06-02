
<html>
    <head>


    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

        <!-- Styles -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script src="https://kit.fontawesome.com/4f54f6bf07.js" crossorigin="anonymous"></script>


        <style>

            
            :root {
  --jumbotron-padding-y: 3rem;
}

.jumbotron {
  padding-top: var(--jumbotron-padding-y);
  padding-bottom: var(--jumbotron-padding-y);
  margin-bottom: 0;
  background-color: #fff;
}
@media (min-width: 768px) {
  .jumbotron {
    padding-top: calc(var(--jumbotron-padding-y) * 2);
    padding-bottom: calc(var(--jumbotron-padding-y) * 2);
  }
}

.jumbotron p:last-child {
  margin-bottom: 0;
}

.jumbotron-heading {
  font-weight: 300;
}

.jumbotron .container {
  max-width: 40rem;
}

footer {
  padding-top: 3rem;
  padding-bottom: 3rem;
}

footer p {
  margin-bottom: .25rem;
}

.box-shadow { box-shadow: 0 .25rem .75rem rgba(0, 0, 0, .05); }
            </style>
        <body>
<header>
      <div class="navbar navbar-dark bg-dark box-shadow">
        <div class="container d-flex justify-content-between">
          <a href="{{URL::to('/studenthome')}}" class="navbar-brand d-flex align-items-center">
            <i class="fas fa-bed" style="height:20px;width:20px ;"> 
            <strong>Home</strong>
            </i>
          </a>
         

<ul class=" navbar navbar-dark bg-dark box-shadow nav nav-pills bg-dark justify-content-between" style="margin-right:40%;">
  <li class="nav-item">
    <a class="nav-link navbar-brand d-flex" href="/mybooking/{{Session::get('id')}}">
    <i class="fas fa-book">
    My Booking
    </i>
    </a>
  </li>
  </ul>

  <ul class="navbar navbar-dark bg-dark box-shadow nav nav-pills bg-dark justify-content-between">
  <li class="nav-item">
    <a class="nav-link navbar-brand d-flex align-items-center" href="student/view/{{Session::get('id')}}">
    <i class="fas fa-user">
    {{ Session::get('fname') }}
    </i>
    </a>
  </li>
  <li class="nav-item ml-auto">
    <a class="nav-link navbar-brand d-flex align-items-center" href="{{URL::to('/logout')}}">
    <i class="fas fa-sign-out-alt">
    Logout
    </i>
    </a>
  </li>
</ul>


</div>

        </div>
      </div>
    </header>
    @yield('studentcontent')