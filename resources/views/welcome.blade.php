<!-- Stored in resources/views/child.blade.php -->

@extends('layouts.appTheme')

@section('title', 'heightcetera')

@section('content')
@include('layouts.logosmall')
    @include('layouts.nav2')
    @include('layouts.welcome.fullWidth')
    @include('layouts.icons')
    @include('layouts.gallery')
    @include('layouts.footer')
@endsection

{{-- @section('content')
    <p>This is my body content.</p>
@endsection --}}