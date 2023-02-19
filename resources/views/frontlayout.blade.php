<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="{{asset('lib')}}/bs4/bootstrap.min.css" />
    <!-- Jquery -->
    <script type="text/javascript" src="{{asset('lib')}}/jquery-3.5.1.min.js"></script>
    <!-- BS4 Js -->
    <script type="text/javascript" src="{{asset('lib')}}/bs4/bootstrap.bundle.min.js"></script>
	 <!-- Bootstrap core CSS-->
	 <link href="{{asset('vendor')}}/bootstrap/css/bootstrap.min.css" rel="stylesheet">

	 <!-- Custom fonts -->
	 <link href="{{asset('vendor')}}/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
 
	 <!-- Page level plugin CSS-->
	 <link href="{{asset('vendor')}}/datatables/dataTables.bootstrap4.css" rel="stylesheet">
 
	 <!-- Custom styles for this template-->
	 <link href="{{asset('css')}}/sb-admin.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    	<div class="container">
		  <a class="navbar-brand" href="{{url('/')}}">Blog App</a>
		  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
		    <span class="navbar-toggler-icon"></span>
		  </button>
		  <div class="collapse navbar-collapse" id="navbarNav">
		    <ul class="navbar-nav ml-auto">
		      <li class="nav-item active">
		        <a class="nav-link" href="{{url('/')}}">Home</a>
		      </li>
		      <li class="nav-item dropdown">
		        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					<i class="fas fa-fw fa-list"></i>
					<span>Category</span>
				  </a>
				  <div class="dropdown-menu" aria-labelledby="pagesDropdown">
					<a class="dropdown-item" href="{{url('category')}}">View All</a>
					@auth
					<a class="dropdown-item" href="{{url('category/create')}}">Add New</a>
					@endauth
				  </div>
		      </li>
		
		      @guest
		      <li class="nav-item">
		        <a class="nav-link" href="{{url('login')}}">Login</a>
		      </li>
		      <li class="nav-item">
		        <a class="nav-link" href="{{url('register')}}">Register</a>
		      </li>
		      @else
			  <li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				  <i class="fas fa-fw fa-address-card"></i>
				  <span>Post</span>
				</a>
				<div class="dropdown-menu" aria-labelledby="pagesDropdown">
				  <a class="dropdown-item" href="{{url('post')}}">View All</a>
				  <a class="dropdown-item" href="{{url('post/create')}}">Add New</a>
				</div>
			  </li>
		      <li class="nav-item">
		        <a class="nav-link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" href="{{url('logout')}}">Logout</a>
		      </li>
		      <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            	</form>
		      @endguest
		    </ul>
		  </div>
		</div>
	</nav>
	
	<main class="container mt-4">
		@yield('content')
	</main>
</body>
</html>