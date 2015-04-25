
<!doctype html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <title>ImmeubleDor</title>

    {!! HTML::script('assets/js/jquery.js') !!}


    {!! HTML::style('css/bootstrap.css') !!}
    {!! HTML::style('css/bootstrap-theme.css') !!}
    {!! HTML::script('js/bootstrap.js') !!}



    {!! HTML::script('css/alertify.js') !!}
    {!! HTML::style('css/alertify.css') !!}
    {!! HTML::style('css/themes/default.css') !!}

    {!! HTML::script('js/jquery-ui.js') !!}
    {!! HTML::style('css/jquery-ui.css') !!}
    {!! HTML::style('css/jquery-ui.theme.css') !!}
    {!! HTML::style('css/jquery-ui.structure.css') !!}




<style>

    div.c-wrapper{
        width: 80%; /* for example */
        margin: auto;
    }

    .carousel-inner > .item > img,
    .carousel-inner > .item > a > img{
        width: 100%; /* use this, or not */
        margin: auto;
    }
</style>



</head>
<body>








<script>
    alertify.set('notifier','position', 'top-right');
    @if(isset($notification_success))
        alertify.success('{!!$notification_success!!} ');
    @endif
    @if(isset($notification_error))
        alertify.error('{!! $notification_error!!}');
    @endif

</script>

<!-- Header -->
<div id="top-nav" class="navbar navbar-inverse navbar-static-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <ul class="nav navbar-nav navbar-left">
            <li><a href="/catalogue"> Catalogue</a></li>
            <li><a href="/plan"> Plan</a></li>
                </ul>

        </div>
        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">


                <li class="dropdown">
                    <a class="dropdown-toggle" role="button" data-toggle="dropdown" href="#"><i class="glyphicon glyphicon-user"></i> {{Auth::user()->name}} </a>
                </li>
                <li><a href="/auth/logout"><i class="glyphicon glyphicon-lock"></i> Logout</a></li>
            </ul>
        </div>
    </div><!-- /container -->
</div>
<!-- /Header -->

<!-- Main -->
<div class="container-fluid">




@yield('content')

</div>
</body>
</html>
