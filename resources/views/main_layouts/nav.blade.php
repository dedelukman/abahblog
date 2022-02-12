<nav class="colorlib-nav" role="navigation">
    <div class="top-menu">
        <div class="container">
            <div class="row">
                <div class="col-md-2">
                    <div id="colorlib-logo"><a href="{{route('home')}}">Blog</a></div>
                </div>
                <div class="col-md-10 text-right menu-1">
                    <ul>
                        <li><a href="{{route('home')}}">Home</a></li>
                        <li class="has-dropdown">
                            <a href="{{ route('category')}}">Categories</a>
                            <ul class="dropdown">
                                @foreach ($navbar_categories as $category)
                                     <li><a href="{{ route('category.show', $category)}}">{{ $category->name}}</a></li>
                                @endforeach
                            </ul>
                        </li>
                        <li><a href="{{route('about')}}">About</a></li>
                        <li><a href="{{route('contact')}}">Contact</a></li>
                        @guest
                        <li class="btn-cta"><a href="{{route('login')}}"><span>Sign in</span></a></li>
                        @endguest

                        @auth
                        <li class="has-dropdown">
                            <a href="#">{{ Auth::user()->name }} <span class="caret"></span></a>
                            <ul class="dropdown">
                                <li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Sign Out</a></li>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                                </form>
                                @if (  Auth::user()->role_id === 1)
                                    <li><a href="{{ route('admin.index')}}">Dashboard</a></li>
                                @endif

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
