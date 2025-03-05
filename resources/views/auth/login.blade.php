@extends('layouts.app')

@section('content')
    <div class=" flex justify-center mt-10">
        <form method="POST" action="{{ route('login.store') }}" class="form-signin max-w-[986px] "
            enctype="multipart/form-data">
            @csrf
            <div class="form-signin">
                <h2 class="font-bold title-form mb-3">Sign In Your Account</h2>
            </div>

            <div class="mt-3">
                <div class="Label"><label>Email Address</label><span class="force"> *</span></div>
                <input id="email" class="px-5 block mt-2 input-form" type="text" name="email"
                    :value="old('email')" required autocomplete="email" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>


            <!-- Password -->
            <div class="mt-3">
                <div class="Label"><label>Password</label><span class="force"> *</span></div>
                <input type="password" id="password" class="px-5 block mt-2 input-form" type="text" name="password"
                    :value="old('password')" required autocomplete="password" />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>



            <div class="flex flex-col items-center justify-center mt-4 mb-10">
                <button type="submit" class="btn-create">Login</button>
                <a class="mt-3 underline text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                    href="{{ route('login') }}">
                    {{ __('Forgot your password?') }}
                </a>

                <a class="mt-6 btn-create-new text-center" href="{{ route('register') }}">
                    {{ __('Create Account') }}
                </a>
            </div>
        </form>
    </div>
@endsection
