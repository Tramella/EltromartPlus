@extends('layouts.app')

@section('content')
    <div class="flex justify-center mt-10">
        <form method="POST" action="{{ route('register.store') }}" class="form-signin max-w-[986px]"
            enctype="multipart/form-data">
            @csrf
            <div class="form-signin">
                <h2 class="font-bold title-form">Sign Up For Your Account</h2>
                <p class="title-form-sub">Please register below to create an account</p>
            </div>
            <!-- Name -->
            <div class="mt-8">
                <div class="Label"><label for="firstname">First Name</label><span class="force"> *</span></div>
                <input id="firstname" class="px-5 block mt-2 input-form" type="text" name="firstname"
                    :value="old('firstname')" required autocomplete="firstname" />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <!-- Email Address -->
            <div class="mt-3">
                <div class="Label"><label for="lastname">Last Name</label><span class="force"> *</span></div>
                <input id="lastname" class="px-5 block mt-2 input-form" type="text" name="lastname"
                    :value="old('lastname')" required autocomplete="lastname" />
                <x-input-error :messages="$errors->get('lastname')" class="mt-2" />
            </div>

            <div class="mt-3">
                <div class="Label"><label for="email">Your Email Address</label><span class="force"> *</span></div>
                <input id="email" class="px-5 block mt-2 input-form" type="text" name="email"
                    :value="old('email')" required autocomplete="email" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>


            <!-- Password -->
            <div class="mt-3">
                <div class="Label"><label for="password">Your Password</label><span class="force"> *</span></div>
                <input id="password" class="px-5 block mt-2 input-form" type="password" name="password"
                    :value="old('password')" required autocomplete="password" />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-3">
                <div class="Label"><label for="password_confirmation" :value="__('Confirm Password')">Your
                        Confirm Password</label><span class="force"> *</span></div>

                <input id="password_confirmation" class="px-5 block mt-2 input-form" type="password"
                    name="password_confirmation" required autocomplete="new-password" />

                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>

            <div class="flex flex-col items-center justify-center mt-4 mb-10">
                <button type="submit" class="btn-create">Save</button>
                <a class="mt-2 underline text-xs text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                    href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>
            </div>
        </form>
    </div>
@endsection
