@extends('layouts.app')

@section('title', $trip->name)

@section('content')
@include('layouts.nav2')
    @include('layouts.nav')
    @include('layouts.logo')
    @include('layouts.map')
    
    @include('layouts.tooltip')
    @include('layouts.carousel')

    <script>
    var path = document.location.pathname
    var domain = document.domain
        var markersInfos;
    $.getJSON(path +  "/markers", function( data ) {
    markersInfos = data
    });

    </script>
@endsection