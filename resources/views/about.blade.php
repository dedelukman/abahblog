@extends('main_layouts.master')

@section('title', 'About')

@section('content')

<div id="colorlib-counter" class="colorlib-counters">
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <div class="about-desc">
                    <div class="about-img-1 animate-box" style="background-image: url({{$about->about_second_image}});"></div>
                    <div class="about-img-2 animate-box" style="background-image: url({{$about->about_first_image}});"></div>
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
                        <p><strong>{{ $about->about_first_text}}</strong></p>
                        <p>{{ $about->about_second_text}}</p>
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

<div class="colorlib-about">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h3>Knowledge online learning center</h3>
                <p>On her way she met a copy. The copy warned the Little Blind Text, that where it came from it would have been rewritten a thousand times and everything that was left from its origin would be the word "and" and the Little Blind Text should turn around and return to its own, safe country. But nothing the copy said could convince her and so it didn’t take long until a few insidious Copy Writers ambushed her, made her drunk with Longe and Parole and dragged her into their agency, where they abused her for their.</p>
            </div>
            <div class="col-md-6">
                <div class="fancy-collapse-panel">
                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                 <div class="panel panel-default">
                     <div class="panel-heading" role="tab" id="headingOne">
                         <h4 class="panel-title">
                             <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">Our Mission
                             </a>
                         </h4>
                     </div>
                     <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                         <div class="panel-body">
                            {{$about->about_our_mission}}
                         </div>
                     </div>
                 </div>
                 <div class="panel panel-default">
                     <div class="panel-heading" role="tab" id="headingTwo">
                         <h4 class="panel-title">
                             <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">Our Vision
                             </a>
                         </h4>
                     </div>
                     <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                         <div class="panel-body">
                            {{$about->about_our_vision}}
                         </div>
                     </div>
                 </div>
                 <div class="panel panel-default">
                     <div class="panel-heading" role="tab" id="headingThree">
                         <h4 class="panel-title">
                             <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">Services
                             </a>
                         </h4>
                     </div>
                     <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                         <div class="panel-body">
                            {{$about->about_services}}
                         </div>
                     </div>
                 </div>
              </div>
          </div>
            </div>
        </div>
    </div>
</div>

@endsection
