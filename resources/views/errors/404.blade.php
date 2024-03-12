@extends('front.layouts.app')

@section ( 'title', '404 Error')

@section('content')
    <div id="wrapper">
        <!--  content  -->
        <div class="content">
            <!--  section  -->
            <section class="parallax-section" data-scrollax-parent="true" id="sec1" style="height:calc(100vh - 180px)">
                <div class="bg par-elem "  data-bg="{{ asset('media/bck.png') }}" ></div>


                <div class="container">
                    <div class="error-wrap">
                        <h2>404</h2>
                        <p>We're sorry, but the Page you were looking for, couldn't be found.</p>
                        <div class="clearfix"></div>



                        <a href="{{ route('index') }}" class="btn  big-btn  color-bg flat-btn">Back to Home Page<i class="fa fa-angle-right"></i></a>
                    </div>
                </div>
            </section>
            <!--  section  end-->
            <!--  section  -->

            <!--  section end -->
            <div class="limit-box"></div>
        </div>
        <!--  content end  -->
    </div>
@endsection
