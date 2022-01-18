@extends('layouts.app')

@section('content')
    <div>
        <h1 class="text-center text-3xl font-bold leading-tight mt-0 mb-5 text-black-600">Register</h1>
    </div>
    <div class="flex justify-center">
        <div class="register lg:w-5/12 md:w-7/12 sm:w-8/12  bg-white p-6 rounded-lg">
            @isset($url)
            <form action='{{url("register/$url")}}' method='post'>
            @else
            <form action="{{ route('register') }}" method='post'>
            @endisset
                @csrf
                <div class="mb-4">
                    <label for="name" class="sr-only">Name</label>
                    <input type="text" placeholder='Your Name' id="name" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('name') border-red-500 @enderror " name="name" value="{{ old('name') }}">

                    @error('name')
                        <div class="text-red-500 mt-2 text-sm">
                            {{$message}}
                        </div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="username" class="sr-only">Username</label>
                    <input type="text" placeholder="Username" id="username" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('username') border-red-500 @enderror " name="username" value="{{ old('username') }}">
                    @error('username')
                        <div class="text-red-500 mt-2 text-sm">
                            {{$message}}
                        </div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="email" class="sr-only">Email</label>
                    <input type="email" placeholder="Email" id="email" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('email') border-red-500 @enderror " name="email" value="{{ old('email') }}">
                    @error('email')
                        <div class="text-red-500 mt-2 text-sm">
                            {{$message}}
                        </div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="password" class="sr-only">Password</label>
                    <input type="password" placeholder="Password" id="password" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('password') border-red-500 @enderror " name="password" value="">
                    @error('password')
                        <div class="text-red-500 mt-2 text-sm">
                            {{$message}}
                        </div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="password_confirmation" class="sr-only">Confirm Password</label>
                    <input type="password" placeholder="Confirm your Password" id="password_confirmation" class="bg-gray-100 border-2 w-full p-4 rounded-lg" name="password_confirmation" value="">
                    @error('password_confirmation')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div>
                    <button type="submit" class="bg-blue-500 text-white px-4 py-3 rounded font-medium w-full">Register</button>
                </div>
            </form>
        </div>
    </div>

@endsection