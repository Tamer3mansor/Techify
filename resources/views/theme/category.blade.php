@extends('theme.master');
@section('title', 'category')
@section('category-active', 'active')
@section('content')

<!--================ Hero sm Banner start =================-->
@include('theme.partial.hero', ['title' => $name])
<!--================ Hero sm Banner end =================-->


<!--================ Start Blog Post Area =================-->
<section class="blog-post-area section-margin">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="row">
                    @foreach ($blogs as $blog)
                        <div class="col-md-6">
                            <div class="single-recent-blog-post card-view">
                                <div class="thumb">
                                    <img class="card-img rounded-0" height="250"
                                        src="{{asset("storage")}}/blogs/{{$blog->image_path}}" alt="">
                                    <ul class="thumb-info">
                                        <li><a href="#"><i class="ti-user"></i>{{$blog->name}}</a></li>
                                        <!-- <li><a href="#"><i class="ti-themify-favicon"></i>2 Comments</a></li> -->
                                    </ul>
                                </div>
                                <div class="details mt-20">
                                    <a href="blog-single.html">
                                        <h3>{{$blog->title}}</h3>
                                    </a>
                                    <p>{{substr($blog->description,0,150)}}</p>
                                    <a class="button" href='{{Route('blogs.show', ['blog' => $blog])}}'>Read More <i
                                            class="ti-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>




                <div class="row">
                    {{$blogs->render('pagination::bootstrap-4')}}
                </div>
            </div>

            <!-- Start Blog Post Siddebar -->
            @include('theme.partial.sidebar');
            <!-- End Blog Post Siddebar -->
        </div>
</section>
<!--================ End Blog Post Area =================-->


@endsection
