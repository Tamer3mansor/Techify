@extends('theme.master');
@section('title', 'LogIn ')
@section('content')

<!--================ Hero sm banner end =================-->
@include('theme.partial.hero', ['title' => 'Log In Page '])


<!-- ================ contact section start ================= -->
<section class="section-margin--small section-margin">
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <div class="container">
        <div class="row">
            <div class="col-6 mx-auto">
                <form action="{{route('login')}}" class="form-contact contact_form" action="contact_process.php"
                    method="post" id="contactForm" novalidate="novalidate">
                    @csrf
                    @method('POST')
                    <div class="form-group">
                        <input class="form-control border" placeholder="Enter email address" id="email" type="email"
                            name="email" :value="old('email')" required autofocus autocomplete="username" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>
                    <div class="form-group">
                        <input class="form-control border" placeholder="Enter your password" type="password"
                            name="password" required autocomplete="current-password" />

                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>
                    <div class="block mt-4">
                        <label for="remember_me" class="inline-flex items-center">
                            <input id="remember_me" type="checkbox"
                                class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800"
                                name="remember">
                            <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
                        </label>
                    </div>
                    <div class="form-group text-center text-md-right mt-3">
                        <button type="submit" class="button button--active button-contactForm">Login</button>
                        <a href="{{Route('register')}}"> Do Not Have An Account ? Register</a>
                    </div>
                    <div class="flex items-center justify-end mt-4">
                        @if (Route::has('password.request'))
                            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                                href="{{ route('password.request') }}">
                                {{ __('Forgot your password?') }}
                            </a>
                        @endif

                      
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<!-- ================ contact section end ================= -->

@endsection
