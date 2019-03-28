@extends('_layouts.front.index')

@section('content')

    @include('main.front._includes.slider')
    @include('main.front._includes.about')
    @include('main.front._includes.courses')
    @include('main.front._includes.facts')
    @include('main.front._includes.customers-review')
    @include('main.front._includes.pricing')
    @include('main.front._includes.paralax')
    @include('main.front._includes.news')

@stop
