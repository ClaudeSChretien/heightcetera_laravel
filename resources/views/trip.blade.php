@extends('layouts.app')

@section('title', $trip->name)

@section('content')
@include('layouts.nav2')
    
    @include('layouts.logo')
    @include('layouts.trip.fullWidth')
    @include('layouts.map')
    
    @include('layouts.tooltip')
    @include('layouts.carousel')
@endsection