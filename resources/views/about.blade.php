@extends('main_layouts.master')

@section('title', 'About')

@section('content')

<div id="colorlib-counter" class="colorlib-counters">
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <div class="about-desc">
                    <div class="about-img-1 animate-box" style="background-image: url(storage/images/about-img-2.jpg);"></div>
                    <div class="about-img-2 animate-box" style="background-image: url(storage/images/about-img-1.jpg);"></div>
                </div>
            </div>
            <div class="col-md-5">
                <div class="row">
                    <div class="col-md-12 colorlib-heading animate-box">
                        <h1 class="heading-big">Who are we</h1>
                        <h2>Who are we</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 animate-box">
                        <p><strong>Even the all-powerful Pointing has no control about the blind texts</strong></p>
                        <p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One day however a small line of blind text by the name of Lorem Ipsum decided to leave for the far World of Grammar.</p>
                    </div>
                    <div class="col-md-6 col-xs-6 animate-box">
                        <div class="counter-entry">
                            <div class="desc">
                                <span class="colorlib-counter js-counter" data-from="0" data-to="1539" data-speed="5000" data-refresh-interval="50"></span>
                                <span class="colorlib-counter-label">Courses</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xs-6 animate-box">
                        <div class="counter-entry">
                            <div class="desc">
                                <span class="colorlib-counter js-counter" data-from="0" data-to="3653" data-speed="5000" data-refresh-interval="50"></span>
                                <span class="colorlib-counter-label">Students</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xs-6 animate-box">
                        <div class="counter-entry">
                            <div class="desc">
                                <span class="colorlib-counter js-counter" data-from="0" data-to="2300" data-speed="5000" data-refresh-interval="50"></span>
                                <span class="colorlib-counter-label">Teachers online</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xs-6 animate-box">
                        <div class="counter-entry">
                            <div class="desc">
                                <span class="colorlib-counter js-counter" data-from="0" data-to="200" data-speed="5000" data-refresh-interval="50"></span>
                                <span class="colorlib-counter-label">Countries</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
