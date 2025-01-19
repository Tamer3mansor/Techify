@extends('theme.master')
@section('title', 'My Blogs')
@section('content')

<!--================ Hero sm banner end =================-->
@include('theme.partial.hero', ['title' => 'My Blogs'])

<!-- ================ Create Blog section start ================= -->
<section class="section-margin--small section-margin">
    @if(session('blog_created'))
        <div><span>{{session('blog_created')}}</span></div>
    @endif

    @if(session('blog_Delete'))
        <div><span>{{session('blog_Delete')}}</span></div>
    @endif
    <div class="container">
        <div class="row">
            <div class="col-12">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Title</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (isset($blogs) && count($blogs) > 0)
                            @foreach ($blogs as $blog)
                                <tr>
                                    <td><a href='{{Route('blogs.show', ['blog' => $blog])}}' target="blank">{{$blog->name}}</a>
                                    </td>
                                    <td><a class="btn btn-warning" href="{{Route('blogs.edit', ['blog'=> $blog])}}"
                                            target="blank">Edit </a>
                                    </td>
                                    <td>
                                        <form action="{{Route('blogs.destroy',['blog'=> $blog])}}" method="post">
                                           @csrf
                                           @method('DELETE')
                                           <button type="submit" class="btn btn-danger" value="submit">Delete</button>
                                        </form>

                                    </td>

                                </tr>

                            @endforeach
                        @endif


                    </tbody>
                </table>
            </div>
            <div class="row">
                {{$blogs->render('pagination::bootstrap-4')}}
            </div>
        </div>
    </div>
</section>
<!-- ================ Create Blog section end ================= -->
@endsection
