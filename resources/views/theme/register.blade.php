@extends('theme.master');
@section('title', 'Register')
@section('content')

<!--================ Hero sm banner end =================-->
@include('theme.partial.hero', ['title' => 'Register Page '])


<!-- ================ contact section start ================= -->
<section class="section-margin--small section-margin">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <form method="Post" action="{{ route('register') }}" class="form-contact contact_form"
                    method="post" id="contactForm" novalidate="novalidate">
                    @csrf
                    @method('post')
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <input class="form-control border" name="name" id="name" type="text" name="name"
                                    :value="old('name')" required autofocus autocomplete="name"
                                    placeholder="Enter Your Name" />
                                <x-input-error :messages="$errors->get('name')" class="mt-2" />
                            </div>
                            <div class="form-group">
                                <input class="form-control border" name="email" id="email"
                                    placeholder="Enter email address" type="email" name="email" :value="old('email')"
                                    required autocomplete="username" />
                                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <input class="form-control border" type="password" name="password" required
                                    autocomplete="new-password" placeholder="Enter your password">
                                <x-input-error :messages="$errors->get('password')" class="mt-2" />

                            </div>
                            <div class="form-group">
                                <input class="form-control border" name="password_confirmation" type="password"
                                    placeholder="Enter your password confirmation">
                                                <x-input-error :messages="$errors->get('password')" class="mt-2" />

                            </div>
                        </div>
                    </div>
                    <div class="form-group text-center text-md-right mt-3">
                        <button type="submit" class="button button--active button-contactForm">Register</button>
                        <a href="{{Route('login')}}"> Already Have An Account ? LogIN</a>

                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<!-- ================ contact section end ================= -->

@endsection
