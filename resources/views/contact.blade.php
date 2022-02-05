@extends('main_layouts.master')

@section('title', 'Contact')

@section('content')

<div class="colorlib-contact">
    <div class="container">
        <div class="row row-pb-md">
            <div class="col-md-12 animate-box">
                <h2>Contact Information</h2>
                <div class="row">
                    <div class="col-md-12">
                        <div class="contact-info-wrap-flex">
                            <div class="con-info">
                                <p><span><i class="icon-location-2"></i></span> 198 West 21th Street, <br> Suite 721 New York NY 10016</p>
                            </div>
                            <div class="con-info">
                                <p><span><i class="icon-phone3"></i></span> <a href="tel://1234567920">+ 1235 2355 98</a></p>
                            </div>
                            <div class="con-info">
                                <p><span><i class="icon-paperplane"></i></span> <a href="mailto:info@yoursite.com">info@yoursite.com</a></p>
                            </div>
                            <div class="con-info">
                                <p><span><i class="icon-globe"></i></span> <a href="#">yourwebsite.com</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <h2>Message Us</h2>
            </div>
            <div class="col-md-6">
                <form method="POST" action="{{route('contact.store')}}">
                    @csrf
                    <div class="row form-group">
                        <div class="col-md-6">
                            <!-- <label for="fname">First Name</label> -->
                            <x-blog.form.input name="first_name" placeholder="Your Firstname" value="{{ old('first_name')}}"/>
                            <small class="error text-danger first_name"></small>
                        </div>
                        <div class="col-md-6">
                            <!-- <label for="lname">Last Name</label> -->
                            <x-blog.form.input name="last_name" placeholder="Your Lastname" value="{{ old('last_name')}}"/>
                            <small class="error text-danger last_name"></small>
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-md-12">
                            <!-- <label for="email">Email</label> -->
                            <x-blog.form.input name="email" placeholder="Your Email" value="{{ old('email')}}" type="email"/>
                            <small class="error text-danger email"></small>
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-md-12">
                            <!-- <label for="subject">Subject</label> -->
                            <x-blog.form.input name="subject" placeholder="Subject" value="{{ old('subject')}}"/>
                            <small class="error text-danger subject"></small>
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-md-12">
                            <!-- <label for="message">Message</label> -->
                            <x-blog.form.textarea name="message" placeholder="Say something about us" value="{{ old('message')}}"/>
                            <small class="error text-danger message"></small>
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Send Message" class="btn btn-primary">
                    </div>
                </form>
            </div>
            <div class="col-md-6">
                <div id="map" class="colorlib-map"></div>
            </div>

        </div>
         <x-blog.message :status="'success'"/>
    </div>
</div>

@endsection

@section('custom_js')

<!-- Google Map -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCefOgb1ZWqYtj7raVSmN4PL2WkTrc-KyA&sensor=false"></script>
<script src="{{asset('blog_template/js/google_map.js')}}"></script>

@endsection
