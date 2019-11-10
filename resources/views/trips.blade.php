<!-- Stored in resources/views/child.blade.php -->

@extends('layouts.appTheme')

@section('title', 'Trips')

@section('content')
    @include('layouts.logosmall')
    @include('layouts.nav2')
    @include('layouts.trips.fullWidth')
    @include('layouts.trips.timeline')
    @include('layouts.footer')
@endsection

{{-- @section('content')
    <p>This is my body content.</p>
@endsection --}}