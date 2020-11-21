<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<nav class="navbar ">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="{{route('home_page')}}">Bulletin</a>
    </div>
    <ul class="nav navbar-nav">
      <li ><a href="{{route('home_page')}}">Home</a></li>
      <li ><a href="{{ route('admin_page')}}">Admin Control</a></li>
      <li ><a href="{{route('user_profilepage')}}">User Profile</a></li>
      <li><a href="{{route('contact_page')}}">Contact</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      
      <li><a href="{{route('logout')}}"><span class="glyphicon glyphicon-log-in"></span> logout</a></li>
    </ul>
  </div>
</nav>
  

@yield('content')
</body>
</html>
