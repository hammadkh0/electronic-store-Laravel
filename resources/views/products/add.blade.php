@extends('layouts.app')
@section('content')

<div class="flex justify-center">
    <div class="lg:w-5/12 md:w-7/12 sm:w-8/12 bg-white p-6 rounded-lg">
        <form action="{{ route('form') }}" enctype="multipart/form-data" class="mb-4" method="post">
            @csrf
            
            <div class="mb-4">
                <label for="brand" class="sr-only">Brand</label>
                <input type="text" placeholder="Brand Name" id="brand" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('brand') border-red-500 @enderror " name="brand" value="{{ old('brand') }}">
                @error('brand')
                    <div class="text-red-500 mt-2 text-sm">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-4">
                <label for="name" class="sr-only">Name</label>
                <input type="text" placeholder='Product Name' id="name" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('name') border-red-500 @enderror " name="name" value="{{ old('name') }}">

                @error('name')
                    <div class="text-red-500 mt-2 text-sm">
                        {{$message}}
                    </div>
                @enderror
            </div>
            <div class="mb-4">
                <label for="quantity" class="sr-only">Quantity</label>
                <input type="number" placeholder='Quantity' id="quantity" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('quantity') border-red-500 @enderror " name="quantity" value="{{ old('quantity') }}">

                @error('quantity')
                    <div class="text-red-500 mt-2 text-sm">
                        {{$message}}
                    </div>
                @enderror
            </div>
            <div class="mb-4">
                <label for="price" class="sr-only">Price</label>
                <input type="number" placeholder='Price' id="price" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('price') border-red-500 @enderror " name="price" value="{{ old('price') }}">

                @error('price')
                    <div class="text-red-500 mt-2 text-sm">
                        {{$message}}
                    </div>
                @enderror
            </div>
            <div class="mb-4">
                <label for="description" class="sr-only">Description</label>
                <textarea name="description" id="description" cols="30" rows="4" 
                class="bg-gray-100 border-2 w-full p-4 rounded-lg 
                    @error('description') border-red-500 @enderror" 
                placeholder="Give a product Description!"></textarea>

                @error('description')
                    <div class="text-red-500 mt-2 text-sm">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-4">
                <label for="image" class="sr-only">Product Image</label>
                <input type="file" placeholder='Product Image' id="image" 
                class="file:mr-4 file:py-2 file:px-4
                file:rounded-full file:border-0
                file:text-sm file:font-semibold
                file:bg-violet-150 file:text-violet-700
                hover:file:bg-violet-300
                bg-gray-100 border-2 w-full p-4 rounded-lg @error('image') border-red-500 @enderror " name="image" value="{{ old('image') }}">

                @error('image')
                    <div class="text-red-500 mt-2 text-sm">
                        {{$message}}
                    </div>
                @enderror
            </div>

            <div>
                <button type="submit" class="bg-blue-500 text-white px-6 py-2 rounded font-medium">Create Product</button>
            </div>

        </form>
    </div>
</div>

@endsection