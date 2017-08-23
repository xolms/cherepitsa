@extends('layouts.index')
@section('meta')
    <title>О компании</title>
    <meta type="description" content="{{$about->description}}">
@endsection

@section('content')
    <div class="head-title">
        <div class="container">
            <div class="row">
                <h2 class="page-title">{{$about->title}}</h2>
            </div><!-- end row -->
        </div><!-- end container -->
    </div><!-- end head-title -->

    <div id="main">
        <div class="container">
            <div class="row">

                <div class="content-area col-md-12" id="primary">
                    <div class="site-content" id="content">

                        <div class="post format-standard hentry">


                            <div class="entry-content">
                                <img src="{{$about->img}}" alt="{{$about->title}}" style="width: 100%;height: auto;padding-bottom: 25px;">
                                {!! $about->text !!}
                            </div>

                        </div><!-- end hentry -->




                    </div><!-- end site-content -->
                </div><!-- end content-area -->


            </div><!-- end row -->
        </div>
    </div><!-- end main -->

@endsection
