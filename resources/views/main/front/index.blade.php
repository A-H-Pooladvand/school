@extends('_layouts.front.index')

@section('content')

    @include('main.front._includes.slider')
    @include('main.front._includes.services')
    @include('main.front._includes.notifications')
    @include('main.front._includes.paralax')
    @include('main.front._includes.news')

@stop
