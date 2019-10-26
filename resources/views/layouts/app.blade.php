<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>@yield('title')</title>

        <!-- CSS -->
    <link rel="stylesheet" href="/node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link href="/node_modules/aos/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/slick/slick.css"/>
    <link rel="stylesheet" type="text/css" href="/slick/slick-theme.css"/>

    <script src="https://kit.fontawesome.com/f4b209aa7c.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">



    <!-- Custom styles  -->
    <link href="/css/style.css" rel="stylesheet">
    </head>
    <body>
        @yield('content')
    </body>
    <script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js"></script>

    <!-- Bootstrap core JavaScript -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="/node_modules/bootstrap/dist/js/bootstrap.bundle.js"></script>
    <script src="/node_modules/macy/dist/macy.js"></script>
    <script src="/node_modules/aos/dist/aos.js"></script>

    <script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
    

    <script src="https://cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.9.2/min/tiny-slider.js"></script>
    <script src="/js/markersinfo.js"></script>
    <script src="/js/script.js"></script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAD6D3hWMETbxfK6zB5E20y_E-4w0GI2S0&callback=initMap"></script>
    <script type="text/javascript" src="/slick/slick.min.js"></script>
  
    <script type="text/javascript">
      $(document).ready(function(){
          $('.slider').slick({
              slidesToShow: 7,
              slidesToScroll: 1,
              dots: false,
              centerMode: true,
                infinite: false,
              focusOnSelect: true,
              variableWidth:true
          })
      });
    </script>
</html>