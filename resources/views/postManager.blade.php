<!-- Stored in resources/views/child.blade.php -->

@extends('layouts.appTheme')

@section('title', 'Trips')

@section('content')
@include('layouts.nav2')
@include('postManager.index')
@include('layouts.footer')
@endsection