@extends('layouts.second')
@section('meta')
    <title>Нет доступа</title>
@endsection
@section('styles')
    <style id="contractor-theme-style-inline-css" type="text/css">
        body .site-content{
            background-image: url('/img/errors/403.jpg');
            background-repeat: no-repeat;
            background-position: center center;
            -webkit-background-size: cover;
            background-size: cover;}
    </style>
@endsection
@section('content')
    <div class="site-content_wrap container">

        <div class="row">

            <div id="primary" class="col-xs-12 col-md-12">

                <main id="main" class="site-main" role="main">

                    <section class="error-404 not-found">
                        <header class="page-header">
                            <h1 class="page-title screen-reader-text">404</h1>
                        </header><!-- .page-header -->

                        <div class="page-content">
                            <div class="invert">

                                <h2>У вас нет доступа к этой странице</h2>
                                <p>У вас не доступа к этой странице, обратитесь в поддержку или перейдите на другую, интересующую вас страницу</p>

                            </div>
                            <p><a class="btn btn-secondary" href="/">На главную</a></p>

                        </div><!-- .page-content -->
                    </section><!-- .error-404 -->

                </main><!-- #main -->

            </div><!-- #primary -->

        </div><!-- .row -->

    </div>
@endsection