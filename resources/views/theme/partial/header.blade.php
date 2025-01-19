@php
    $headerCategory = App\Models\category::get();
@endphp
<header class="header_area">
    <div class="main_menu">
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container box_1620">
                <!-- Brand and toggle get grouped for better mobile display -->
                <a class="navbar-brand logo_h" href="{{route('theme.index')}}">
                    <h1>Techify</h1>
                </a>
                <!-- <img src="{{asset("assets")}}/img/logo.png" alt=""> -->
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                    <ul class="nav navbar-nav menu_nav justify-content-center">
                        <li class="nav-item @yield('home-active')"><a class="nav-link"
                                href="{{route('theme.index')}}">Home</a></li>
                        <li class="nav-item @yield('category-active') submenu dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button"
                                aria-haspopup="true" aria-expanded="false">Categories</a>
                            <ul class="dropdown-menu">
                                @foreach ($headerCategory as $hc)
                                    @if (!empty($hc->name))
                                        <li class="nav-item"><a class="nav-link"
                                                href="{{route('theme.category', ["name" => $hc->name])}}">{{$hc->name}}</a>
                                        </li>
                                    @endif
                                @endforeach

                            </ul>
                        </li>
                        <li class="nav-item @yield('contact-active')"><a class="nav-link"
                                href="{{route('theme.contact')}}">Contact</a></li>
                    </ul>

                    <!-- Add new blog -->
                    @auth
                        <a href="{{Route('blogs.create')}}" class="btn btn-sm btn-primary mr-2">Add New</a>
                    @endauth
                    <!-- End - Add new blog -->
                    @guest
                        <ul class="nav navbar-nav navbar-right navbar-social">
                            <a href="{{Route('register')}}" class="btn btn-sm btn-warning">Register / Login</a>

                        </ul>
                    @endguest

                    @auth
                        <li class="nav-item submenu dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button"
                                aria-haspopup="true" aria-expanded="false"> {{ explode(" ", Auth::user()->name)[0] }}</a>
                            <ul class="dropdown-menu">
                                <li>
                                    <form action="{{route('blogs.myBlog')}}" method="post">
                                        @csrf
                                        <input type="submit" class="nav-link btn btn-link" value="My ">
                                    </form>
                                </li>
                                <li>
                                    <form action="{{route('logout')}}" method="post">
                                        @csrf
                                        <input type="submit" class="nav-link btn btn-link" value="Logout">
                                    </form>
                                </li>
                            </ul>

                        </li>
                    @endauth
                </div>
            </div>
        </nav>
    </div>
</header>
