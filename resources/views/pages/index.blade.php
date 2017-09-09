@extends('layouts.index')
@section ('meta')
    <title>{{$meta->title}}</title>
    <meta name="description" content="{{$meta->description}}">
    <meta name="keywords" content="{{$meta->keywords}}">
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
