<nav class="colorlib-nav" role="navigation">
    <div class="top-menu">
        <div class="container">
            <div class="row">
                <div class="col-md-2">
                    <div id="colorlib-logo"><a href="index.html">Blog</a></div>
                </div>
                <div class="col-md-10 text-right menu-1">
                    <ul>
                        <li><a href="{{route('home')}}">Home</a></li>
                        <li class="has-dropdown">
                            <a href="courses.html">Categories</a>
                            <ul class="dropdown">
                                <li><a href="{{route('post')}}">Programming</a></li>
                                <li><a href="#">Games</a></li>
                                <li><a href="#">Soft Skills</a></li>
                            </ul>
                        </li>
                        <li><a href="{{route('about')}}">About</a></li>
                        <li><a href="{{route('contact')}}">Contact</a></li>
                        @guest
                        <li class="btn-cta"><a href="{{route('login')}}"><span>Sign in</span></a></li>
                        <li class="btn-cta"><a href="{{route('register')}}"><span>Register</span></a></li>
                        @endguest

                        @auth
                        <li class="has-dropdown">
                            <a href="#">{{ Auth::user()->name }} <span class="caret"></span></a>
                            <ul class="dropdown">
                                <li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Sign Out</a></li>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                                </form>
                            </ul>
                        </li>
                        @endauth

                    </ul>
                </div>
            </div>
        </div>
    </div>
</nav>

<aside id="colorlib-hero">
    <div class="flexslider">
        <ul class="slides">

          </ul>
      </div>
</aside>
