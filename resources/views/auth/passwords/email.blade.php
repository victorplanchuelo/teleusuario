@extends('layouts.master')
@section('head')
    @parent
    @include('layouts.head')
    <!-- Login CSS -->
    <link href="{{ asset('/css/login.css') }}" rel="stylesheet" media="screen">
@endsection
@section('header')
    @include('layouts.header')
@endsection
@section('main')
    @include('main.password_recover_main')
@endsection
@section('footer')
    @include('layouts.footer')
@endsection
@section('scripts')
    @include('layouts.scripts')
@endsection
@section('scripts_extra')
    @include('main.password_recover_scripts')
@endsection