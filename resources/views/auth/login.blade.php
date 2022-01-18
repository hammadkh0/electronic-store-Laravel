@extends('layouts.app')

@section('content')
<h1 class="text-center text-3xl font-bold leading-tight mt-0 mb-5 text-black-600">Login</h1>
<div class="flex justify-center border-blue-500">
    <div class=" login lg:w-5/12 md:w-7/12 sm:w-8/12  bg-white p-6 rounded-lg">
        @if(session('status'))
            <div class="bg-red-500 p-4 rounded-lg mb-6 text-white text-center">
                {{session('status')}}
            </div>
        @endif
        
        @isset($url)
        <form action='{{ url("login/$url") }}' method='post'>
        @else
        <form action="{{ route('login') }}" method='post'>
        @endisset
            @csrf
            
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
                <div class="flex items-center">
                    <input type="checkbox" name="remember" class="mr-2" id="remember">
                    <label for="remember">Remeber me</label>
                </div>
            </div>

            <div>
                <button type="submit" class="bg-blue-500 text-white px-4 py-3 rounded font-medium w-full">Login</button>
            </div>
        </form>
    </div>
</div>

@endsection