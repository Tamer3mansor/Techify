@extends('theme.master')
@section('title', 'home')
@section('home-active', 'active')
@section('content')
@php
    use Carbon\Carbon;

@endphp
<main class="site-main">
    <!--================Hero Banner start =================-->
    <section class="mb-30px" >
        <div class="container">
            <div class="hero-banner">
                <div class="hero-banner__content">
                    <h3>Techify</h3>
                    <h1>Amazing Places To Tech Blogs</h1>
                    <h4>{{date("Y-m-d")}}</h4>
                </div>
            </div>
        </div>
    </section>
    <!--================Hero Banner end =================-->

    <!--================ Blog slider start =================-->
    <section>
        <div class="container">
            <div class="owl-carousel owl-theme blog-slider">
                @foreach ($latestBlogs as $lb)
                    <div class="card blog__slide text-center">
                        <div class="blog__slide__img">
                            <img class="card-img rounded-0" src="{{asset("storage")}}/blogs/{{$lb->image_path}}" alt=""
                                height="150">
                        </div>
                        <div class="blog__slide__content">
                            <a class="blog__slide__label"
                                href="{{route('theme.category', ["name" => $lb->category->name])}}">{{$lb->category->name}}</a>
                            <h3><a
                                    href="{{Route('blogs.show', ['blog' => $lb])}}">{{substr($lb->description, 0, 20) . "...."}}</a>
                            </h3>
                            @php
$createdAt = $lb->created_at;
$now = Carbon::now();
$differenceInDays = $createdAt->diffInDays($now);
                            @endphp
                            <p>{{
$readableDifference = $createdAt->diffForHumans();

                            }}</p>
                        </div>
                    </div>
                @endforeach


            </div>
        </div>
    </section>
    <!--================ Blog slider end =================-->

    <!--================ Start Blog Post Area =================-->
    <section class="blog-post-area section-margin mt-4">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    @if (count($blogs) > 0)
                        @foreach ($blogs as $blog)
                            <div class="single-recent-blog-post">
                                <div class="thumb">
                                    <img class="img-fluid" src="{{asset("storage")}}/blogs/{{$blog->image_path}}" alt="">
                                    <ul class="thumb-info">
                                        <li><a href="#"><i class="ti-user"></i>{{$blog->user->name}}</a></li>
                                        <li><a href="#"><i class="ti-notepad"></i>{{$blog->created_at->format('d m y')}}</a>
                                        </li>
                                        <li><a href="#"><i class="ti-themify-favicon"></i>2 Comments</a></li>
                                    </ul>
                                </div>
                                <div class="details mt-20">
                                    <a href="blog-single.html">
                                        <h3>{{$blog->name}}.</h3>
                                    </a>
                                    <p>{{$blog->description}}</p>

                                    <a class="button" href='{{Route('blogs.show', ['blog' => $blog])}}'>Read More <i
                                            class="ti-arrow-right"></i></a>
                                </div>
                            </div>


                        @endforeach

                    @endif

                    <div class="row">
                        <div class="col-lg-12">
                            {{ $blogs->render("pagination::bootstrap-4")}}
                        </div>
                    </div>
                </div>

                <!-- Start Blog Post Siddebar -->
                @include('theme.partial.sidebar')
                <!-- End Blog Post Siddebar -->
            </div>
    </section>
    <!--================ End Blog Post Area =================-->
</main>


@endsection
