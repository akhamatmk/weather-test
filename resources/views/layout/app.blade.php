<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="https://v4-alpha.getbootstrap.com/favicon.ico">
    <title>My Weater</title>
    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/starter-template/">
    <link href="https://v4-alpha.getbootstrap.com/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://v4-alpha.getbootstrap.com/examples/starter-template/starter-template.css" rel="stylesheet">
</head>

<body style="background: url('{{ asset("image/Images-Light-Blue-HD-Backgrounds.jpg")  }}');">

    <nav class="navbar navbar-toggleable-md navbar-inverse bg-inverse fixed-top">
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand" href="#">My Weather</a>

        <div class="collapse navbar-collapse" id="navbarsExampleDefault">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="{{ URL('/') }}">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                </li>                
            </ul>
            <form method="GET" action="{{ URL('search') }}" class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="text" name="place" placeholder="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
      </div>
    </nav>

   @yield('content')
   <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js"></script>
   <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js"></script>
   <script src="https://v4-alpha.getbootstrap.com/dist/js/bootstrap.min.js"></script>
   <script src="https://v4-alpha.getbootstrap.com/assets/js/ie10-viewport-bug-workaround.js"></script>
   @yield('footer-script')
</body>

</html>