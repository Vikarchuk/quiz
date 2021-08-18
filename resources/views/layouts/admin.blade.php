@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    @yield('header')
@stop

@section('content')
    @yield('main_content')
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')

@stop