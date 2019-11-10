<!-- Stored in resources/views/child.blade.php -->

@extends('layouts.appTheme')

@section('title', 'Trips')

@section('content')
    @include('layouts.nav2')
    @include('tripManager.index')
    @include('layouts.trips.timeline')
    @include('layouts.footer')
@endsection

{{-- @section('content')
    <p>This is my body content.</p>
@endsection --}}