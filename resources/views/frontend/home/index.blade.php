@extends('frontend.layouts.app')

@section('title', 'Home')

@section('content')
    @include('frontend.home.slider')
    @include('frontend.home.schedule')
    @include('frontend.home.features')
    @include('frontend.home.fun-facts')
    @include('frontend.home.why-choose')
    @include('frontend.home.blog-area')
    @include('frontend.home.portfolio')
    @include('frontend.home.appointment')
@endsection
