<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
	<meta name="robot" content="noindex, nofollow" />

    <title>Learning Web Application</title>

    <!-- Bootstrap Core CSS -->
    @include('admin.layouts.inc-stylesheet')
	@yield('stylesheet')
</head>

<body>

    
          
        
    
            <div class="container-fluid">
                @yield('content')
                <!-- /.row -->
            </div>
          
       
	@include('admin.layouts.inc-scripts')
    @yield('scripts')
</body>

</html>
