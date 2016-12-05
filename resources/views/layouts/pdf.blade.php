<!DOCTYPE html>
<html lang="en">
<head>
    <?php
    $appName = (app()->environment() == 'local' ? getenv('APP_NAME') : config('app.name'));
    $title = '
        <title> ' . $appName . ' </title>
        <meta property="og:title" content="Create Online Kendo Tournament in instants" />
        <meta name="twitter:title" content="Kendozone - Create Online Kendo Tournaments in instants" />
        ';

    $description = '
        <meta name="description" content="Kenzone is a responsive kendo tournaments system. Register the competitors, generate documentation, and begin to score live with your tablet"/>
        <meta property="og:description" content="Get Ready and strike Men" />
        <meta name="twitter:card" content="summary" />
        <meta name="twitter:description" content="Kenzone is a responsive kendo tournaments system. Register the competitors, generate documentation, and begin to score live with your tablet" />
    ';
    $image = '
        <meta property="og:image" content="https://kendozone.com/wp-content/uploads/2016/04/home.jpg" />
        <meta property="og:image:secure_url" content="https://kendozone.com/wp-content/uploads/2016/04/home.jpg" />
        <meta name="twitter:image" content="https://kendozone.com/wp-content/uploads/2016/04/home.jpg" />
    ';
    ?>

    @yield('image')
    <meta property="og:locale" content="{{ App::getLocale() }}"/>
    <meta property="og:type" content="website"/>
    @yield('title', $title)
    @yield('description', $description)
    @yield('image', $image)

    <meta property="og:url" content="{{ Request::url() }}"/>
    <meta property="og:site_name" content="{{ $appName }}"/>


    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ app()->environment()=='local' ? getenv('APP_NAME') : config('app.name') }} </title>
    <!-- Global stylesheets -->
    {!! Html::style('css/app.css')!!}
    @yield('scripts')
    @yield('styles')
</head>
{{--sidebar-xs should be out--}}
<body>
<!-- Page container -->
<div class="page-container">

    <!-- Page content -->
    <div class="page-content">

        <!-- Main content -->
        <div class="content-wrapper">


            <!-- Content area -->

            <div class="content">
                @yield('content')
            </div>

            <!-- /content area -->

        </div>
        <!-- /main content -->

    </div>
    <!-- /page content -->

</div>
<!-- /page container -->

</body>
</html>