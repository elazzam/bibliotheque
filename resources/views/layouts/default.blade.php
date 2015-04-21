
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
    //alertify.alert('Ready!');
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
            <a class="navbar-brand" href="/">Home</a>
        </div>
        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">

                <li class="dropdown">
                    <a class="dropdown-toggle" role="button" data-toggle="dropdown" href="#"><i class="glyphicon glyphicon-user"></i> Admin <span class="caret"></span></a>
                    <ul id="g-account-menu" class="dropdown-menu" role="menu">
                        <li><a href="#">My Profile</a></li>
                    </ul>
                </li>
                <li><a href="#"><i class="glyphicon glyphicon-lock"></i> Logout</a></li>
            </ul>
        </div>
    </div><!-- /container -->
</div>
<!-- /Header -->

<!-- Main -->
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-3">
            <!-- Left column -->


            <!-- ul class="list-unstyled">
                <li class="nav-header"> <a href="#" data-toggle="collapse" data-target="#menu2">
                        <h5>Reports <i class="glyphicon glyphicon-chevron-right"></i></h5>
                    </a>

                    <ul class="list-unstyled collapse" id="menu2">
                        <li><a href="#">Information &amp; Stats</a>
                        </li>
                        <li><a href="#">Views</a>
                        </li>
                        <li><a href="#">Requests</a>
                        </li>
                        <li><a href="#">Timetable</a>
                        </li>
                        <li><a href="#">Alerts</a>
                        </li>
                    </ul>
                </li>
                <li class="nav-header">
                    <a href="#" data-toggle="collapse" data-target="#menu3">
                        <h5>Social Media <i class="glyphicon glyphicon-chevron-right"></i></h5>
                    </a>

                    <ul class="list-unstyled collapse" id="menu3">
                        <li><a href="#"><i class="glyphicon glyphicon-circle"></i> Facebook</a></li>
                        <li><a href="#"><i class="glyphicon glyphicon-circle"></i> Twitter</a></li>
                    </ul>
                </li>
            </ul -->




            <hr>

            <ul class="nav nav-pills nav-stacked">
                <li class="nav-header"></li>
                <li><a href="/terrain/"><i class="glyphicon glyphicon-list"></i> Terrains</a></li>
                <li><a href="#"><i class="glyphicon glyphicon-briefcase"></i> Toolbox</a></li>
                <li><a href="#"><i class="glyphicon glyphicon-link"></i> Widgets</a></li>
                <li><a href="#"><i class="glyphicon glyphicon-list-alt"></i> Reports</a></li>
                <li><a href="#"><i class="glyphicon glyphicon-book"></i> Pages</a></li>
                <li><a href="#"><i class="glyphicon glyphicon-star"></i> Social Media</a></li>
            </ul>

            <hr>
            <ul class="nav nav-stacked">
                <li class="active"><a href="http://bootply.com" title="The Bootstrap Playground" target="ext">Playground</a></li>
                <li><a href="/tagged/bootstrap-3">Bootstrap 3</a></li>
                <li><a href="/61518" title="Bootstrap 3 Panel">Panels</a></li>
                <li><a href="/61521" title="Bootstrap 3 Icons">Glyphicons</a></li>
                <li><a href="/62603">Layout</a></li>
            </ul>

            <hr>

            <a href="#"><strong>Want More Templates?</strong></a>

            <hr>

            <ul class="nav nav-stacked">
                <li class="active"><a rel="nofollow" href="http://goo.gl/pQoXEh" target="ext">Premium Themes</a></li>
                <li><a rel="nofollow" href="http://gridgum.com/themes/category/bootstrap-themes/?affiliates=45">GridGum</a></li>
                <li><a rel="nofollow" href="http://bootstrapzero.com">BootstrapZero</a></li>
            </ul>


        </div><!-- /col-3 -->
        <div class="col-sm-9">

@yield('content')
            </div>

</body>
</html>
