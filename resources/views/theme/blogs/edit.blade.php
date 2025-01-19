@extends('theme.master')
@section('title', "Edit Blog")
@section('content')

<!--================ Hero sm banner end =================-->
@include('theme.partial.hero', ['title' => "Edit $blog->name Blog"])

<!-- ================ Create Blog section start ================= -->
<section class="section-margin--small section-margin">
    @if(session('blog_updated'))
        <div><span>{{session('blog_updated')}}</span></div>
    @endif
    <div class="container">
        <div class="row">
            <div class="col-12">
                <form method="POST" action="{{Route('blogs.update', ['blog' => $blog])}}" class="form-contact contact_form"
                    id="blogForm" novalidate="novalidate" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <input class="form-control border" name="name" id="title" type="text"
                                    value="{{$blog->name}}" required autofocus autocomplete="name"
                                    placeholder="Enter Blog name/title" />
                                <x-input-error :messages="$errors->get('name')" class="mt-2" />
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-group">
                                <!-- Show the current image -->
                                <label for="current_image">Current Image:</label>
                                <div>
                                    <img src="{{ asset('storage/blogs/' . $blog->image_path) }}" alt="{{ $blog->name }}"
                                        style="max-width: 200px; height: auto; margin-bottom: 10px;">
                                </div>

                                <!-- File upload for new image -->
                                <label for="image_path">Upload a New Image:</label>
                                <input class="form-control border" name="image_path" id="image_path" type="file"
                                    autocomplete="image_path" placeholder="Upload your Blog image" />
                                <x-input-error :messages="$errors->get('image_path')" class="mt-2" />
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <select class="form-control border" name="category_id"
                                    placeholder="which category belong to">
                                    <option value="">Select Category</option>
                                    @if(count($categories) > 0)
                                        @foreach ($categories as $cat)
                                            <option value="{{$cat->id}}" @if($cat->id == $blog->category_id) selected @endif>
                                                {{$cat->name}}</option>
                                        @endforeach
                                    @endif
                                </select>
                                <x-input-error :messages="$errors->get('category_id')" class="mt-2" />
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <textarea class="w-100" rows="11" name="description">{{$blog->description}}</textarea>
                                <x-input-error :messages="$errors->get('description')" class="mt-2" />
                            </div>
                        </div>
                    </div>
                    <div class="form-group text-center text-md-right mt-3">
                        <button type="submit" class="button button--active button-contactForm">Update The Blog</button>
                        <!-- <a href="{{ route('blogs.create') }}"> View All Blogs</a> -->
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<!-- ================ Create Blog section end ================= -->

@endsection
