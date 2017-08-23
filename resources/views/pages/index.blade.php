@extends('layouts.index')
@section ('meta')
    <title>123</title>
    <meta type="keywords" content="123">
@endsection

    
@section('content')

    @include('index.slider', ['slider' => $slider])
    @include('index.uslugi', ['usluga' => $usluga])
    @include('index.products', ['category' => $category])
    @include('index.about', ['about' => $about])
    @include('index.rev', ['rev' => $rev])
    @include('modules.contacts')


    <!-- .entry-header -->

@endsection
