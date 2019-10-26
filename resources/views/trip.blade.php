@extends('layouts.app')

@section('title', '$Trip')

@section('content')
    @include('layouts.nav')
    @include('layouts.logo')
    @include('layouts.map')
    @include('layouts.tooltip')
    @include('layouts.carousel')
@endsection