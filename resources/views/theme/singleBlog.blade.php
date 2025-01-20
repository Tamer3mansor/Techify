@extends('theme.master');
@section('title', 'singleBlog')
@section('content')

<!--================ Hero sm banner end =================-->
@include('theme.partial.hero', ['title' => $blog->name])
<!--================ Hero sm Banner end ================= -->

<!--================ Start Blog Post Area =================-->
<section class="blog-post-area section-margin">
    @if (session('comment'))
        {{session('comment')}}
    @endif
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="main_blog_details">
                    <img class="w 100" src="{{asset("storage")}}/blogs/{{$blog->image_path}}" alt="">
                    <a href="#">
                        <h4>{{$blog->name}}</h4>
                    </a>
                    <div class="user_details">
                        <div class="float-right mt-sm-0 mt-3">
                            <div class="media">
                                <div class="media-body">
                                    <h5>{{$blog->user->name}}</h5>
                                    <p>{{$blog->created_at->format('d m y')}}</p>
                                </div>
                                <div class="d-flex">
                                    <img width="42" height="42" src="{{asset("assets")}}/img/avatar.png" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="three-row-blog">
                        <p>{{substr($blog->description, 0, 100)}}...</p> <!-- First part -->
                        <p>{{substr($blog->description, 100, 100)}}...</p> <!-- Second part -->
                        <p>{{substr($blog->description, 200, 100)}}...</p> <!-- Third part -->
                    </div>

                </div>

                <div class="comments-area">
                    @php
                        $comments = $blog->comment()->where('blog_id', $blog->id)->get();
                    @endphp
                    <h4>{{count($comments)}} Comments</h4>
                    @foreach ($comments as $comment)
                        <div class="comment-list">
                            <div class="single-comment justify-content-between d-flex">
                                <div class="user justify-content-between d-flex">
                                    <div class="thumb">
                                        <img src="{{asset("assets")}}/img/avatar.png" width="50px">
                                    </div>
                                    <div class="desc">
                                        <h5><a href="#">{{$comment->name}}</a></h5>
                                        <p class="date">{{$comment->created_at->format('y m d')}} </p>
                                        <p class="comment">
                                            {{$comment->message}}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                    <!-- <div class="comment-list">
                        <div class="single-comment justify-content-between d-flex">
                            <div class="user justify-content-between d-flex">
                                <div class="thumb">
                                    <img src="{{asset("assets")}}/img/avatar.png" width="50px">
                                </div>
                                <div class="desc">
                                    <h5><a href="#">Maria Luna</a></h5>
                                    <p class="date">December 4, 2017 at 3:12 pm </p>
                                    <p class="comment">
                                        Never say goodbye till the end comes!
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="comment-list">
                        <div class="single-comment justify-content-between d-flex">
                            <div class="user justify-content-between d-flex">
                                <div class="thumb">
                                    <img src="{{asset("assets")}}/img/avatar.png" width="50px">
                                </div>
                                <div class="desc">
                                    <h5><a href="#">Ina Hayes</a></h5>
                                    <p class="date">December 4, 2017 at 3:12 pm </p>
                                    <p class="comment">
                                        Never say goodbye till the end comes!
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div> -->
                </div>
                @guest
                    <div class="comment-form">
                        <h4>Leave a Reply</h4>
                        <form method="Post" action="{{Route('comment.store')}}">
                            @csrf
                            <div class="form-group form-inline">
                                <div class="form-group col-lg-6 col-md-6 name">
                                    <input type="text" class="form-control" name="name" placeholder="Enter Name"
                                        onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Name'"
                                        value="{{old('name')}}">
                                </div>
                                <x-input-error :messages="$errors->get('name')" class="mt-2" />
                                <input type="hidden" value="{{$blog->id}}" name="blog_id">
                                <div class="form-group col-lg-6 col-md-6 email">
                                    <input type="email" class="form-control" name="email" placeholder="Enter email address"
                                        onfocus="this.placeholder = ''"
                                        onblur="this.placeholder = 'Enter email address'value=" {{old('email')}}">
                                </div>
                                <x-input-error :messages="$errors->get('email')" class="mt-2" />

                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="subject" placeholder="Subject"
                                    onfocus="this.placeholder = ''" onblur="this.placeholder = 'Subject'value="
                                    {{old('subject')}}">
                            </div>
                            <x-input-error :messages="$errors->get('subject')" class="mt-2" />

                            <div class="form-group">
                                <textarea class="form-control mb-10" rows="5" name="message" placeholder="Messege"
                                    onfocus="this.placeholder = ''" onblur="this.placeholder = 'Messege'" required=""
                                    value="{{old('message')}}"></textarea>
                            </div>
                            <x-input-error :messages="$errors->get('message')" class="mt-2" />
                            <button type='submit'>Post Comment</button>
                            <!-- <a href="{{Route('comment.store')}}" class="button submit_btn"></a> -->
                        </form>
                    </div>
                @endguest
                @auth
                    <div class="comment-form">
                        <h4>Leave a Reply</h4>
                        <form method="Post" action="{{Route('comment.store')}}">
                            @csrf
                            <div class="form-group form-inline">
                                <div class="form-group col-lg-6 col-md-6 name">
                                    <!-- <input type="text" class="form-control" name="name" placeholder="Enter Name"
                                        onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Name'"
                                        value="{{old('name')}}"> -->
                                    <input type="hidden" name="name" value="{{Auth::user()->name}}">
                                </div>
                                <!-- <x-input-error :messages="$errors->get('name')" class="mt-2" /> -->
                                <input type="hidden" value="{{$blog->id}}" name="blog_id">
                                <div class="form-group col-lg-6 col-md-6 email">

                                <input type="hidden" name="email" value="{{Auth::user()->email}}">

                                </div>
                                <x-input-error :messages="$errors->get('email')" class="mt-2" />

                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="subject" placeholder="Subject"
                                    onfocus="this.placeholder = ''" onblur="this.placeholder = 'Subject'value="
                                    {{old('subject')}}">
                            </div>
                            <x-input-error :messages="$errors->get('subject')" class="mt-2" />

                            <div class="form-group">
                                <textarea class="form-control mb-10" rows="5" name="message" placeholder="Messege"
                                    onfocus="this.placeholder = ''" onblur="this.placeholder = 'Messege'" required=""
                                    value="{{old('message')}}"></textarea>
                            </div>
                            <x-input-error :messages="$errors->get('message')" class="mt-2" />
                            <button type='submit'>Post Comment</button>
                            <!-- <a href="{{Route('comment.store')}}" class="button submit_btn"></a> -->
                        </form>
                    </div>
                @endauth

            </div>

            <!-- Start Blog Post Siddebar -->
            @include('theme.partial.sidebar')
            <!-- End Blog Post Siddebar -->
        </div>
</section>
<!--================ End Blog Post Area =================-->

@endsection
