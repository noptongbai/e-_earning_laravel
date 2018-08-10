<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="robot" content="noindex, nofollow" />

    <title>Test</title>

    <!-- Bootstrap Core CSS -->
    @include('admin.layoutslogin.inc-stylesheet')
    @yield('stylesheet')
</head>

<body>
    
    
                @yield('content')
               
    @include('admin.layoutslogin.inc-scripts')
    @yield('scripts')
</body>

</html>
