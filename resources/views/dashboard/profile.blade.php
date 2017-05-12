@extends('layouts.master')
@section('head')
	@parent
	@include('layouts.head')
	@include('layouts.dashboard_head')
	@include('main.profile_head')
@endsection
@section('header')
	@include('main.main_header')
@endsection
@section('main')
	@include('main.main_sidebar')
	@include('main.profile_main')
@endsection
@section('footer')
	@include('main.main_footer')
@endsection
@section('scripts')
	@include('layouts.scripts')
@endsection
@section('scripts_extra')
	@include('main.profile_scripts')
@endsection