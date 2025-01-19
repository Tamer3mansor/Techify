@php
    $headerCategory = App\Models\category::get();
    $recentBlogs = App\Models\Blog::latest()->take(3)->get();
@endphp
<div class="col-lg-4 sidebar-widgets">
    <div class="widget-wrap">
        <div class="single-sidebar-widget newsletter-widget">
            <h4 class="single-sidebar-widget__title">Newsletter</h4>
            <div class="form-group mt-30">
                @if (session('staus'))
                    <div class="alert alert-success">
                        {{session('staus')}}
                    </div>

                @endif
                <form action="{{route('sub.store')}}" method="post">
                    @csrf

                    <div class="col-autos">

                        <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="Enter email"
                            onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter email'" name="subscriber"
                            value="{{old('subscriber')}}">
                        @error('subscriber')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        <button class="bbtns d-block mt-20 w-100" type="submit">Subcribe</button>
                    </div>

                </form>
            </div>
        </div>

        <div class="single-sidebar-widget post-category-widget">
            <h4 class="single-sidebar-widget__title">Catgory</h4>
            <ul class="cat-list mt-20">
                @foreach ($headerCategory as $hc)
                    <li>
                        <a href="{{route('theme.category', $hc->name)}}" class="d-flex justify-content-between">
                            <p>{{$hc->name}}</p>
                            <p>({{count($hc->blogs)}})</p>
                        </a>
                    </li>
                @endforeach

            </ul>
        </div>

        <div class="single-sidebar-widget popular-post-widget">
            <h4 class="single-sidebar-widget__title">Recent Post</h4>
            <div class="popular-post-list">
                @foreach ($recentBlogs as $blog)
                    <div class="single-post-list">
                        <div class="thumb">
                            <img class="card-img rounded-0" src="{{asset("storage")}}/blogs/{{$blog->image_path}}" alt="">
                            <ul class="thumb-info">
                                <li><a href="#">{{$blog->user->name}}</a></li>
                                <li><a href="#">{{$blog->created_at}}</a></li>
                            </ul>
                        </div>
                        <div class="details mt-20">
                            <a href="{{Route('blogs.show', ['blog' => $blog])}}">
                                <h6> {{$blog->name}} </h6>
                            </a>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
</div>
