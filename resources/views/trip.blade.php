@extends('layouts.app')

@section('title', $trip->name)

@section('content')
@include('layouts.nav2')
    
    @include('layouts.logo')
    {{--@include('layouts.trip.fullWidth') --}}
    @include('layouts.trip.map')
    
    @include('layouts.trip.tooltip')
    @include('layouts.trip.carousel')
@endsection