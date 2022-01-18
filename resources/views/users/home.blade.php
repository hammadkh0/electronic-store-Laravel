@extends('layouts.app')

@section('content')

    <div id="carouselExampleCaptions" class="carousel slide relative" data-bs-ride="carousel">
        <div class="carousel-indicators absolute right-0 bottom-0 left-0 flex justify-center p-0 mb-4">
        <button
            type="button"
            data-bs-target="#carouselExampleCaptions"
            data-bs-slide-to="0"
            class="active"
            aria-current="true"
            aria-label="Slide 1"
        ></button>
        <button
            type="button"
            data-bs-target="#carouselExampleCaptions"
            data-bs-slide-to="1"
            aria-label="Slide 2"
        ></button>
        <button
            type="button"
            data-bs-target="#carouselExampleCaptions"
            data-bs-slide-to="2"
            aria-label="Slide 3"
        ></button>
        </div>
        <div class="carousel-inner relative w-full overflow-hidden">
        <div class="carousel-item active relative float-left w-full">
            <img
            src="storage/images/banners/z-flip.jpg"
            class="block w-full "
            alt="..."
            />
            <div class="carousel-caption hidden md:block absolute text-center">
            <h5 class="text-xl">Galaxy Z-Flip 3</h5>
            <p>A good thing just got better</p>
            </div>
        </div>
        <div class="carousel-item relative float-left w-full">
            <img
            src="storage/images/banners/z-flip.jpg"
            class="block w-full "
            alt="..."
            />
            <div class="carousel-caption hidden md:block absolute text-center">
            <h5 class="text-xl">Galaxy Z-Flip </h5>
            <p>A good thing just got better</p>
            </div>
        </div>
        <div class="carousel-item relative float-left w-full">
            <img
            src="storage/images/banners/banner_r62TkIc.jpg"
            class="block w-full "
            alt="..."
            />
            <div class="carousel-caption hidden md:block absolute text-center">
            <h5 class="text-xl ">Galaxy S21</h5>
            <p>Epic in every way</p>
            </div>
        </div>
        </div>
        <button
        class="carousel-control-prev absolute top-0 bottom-0 flex items-center justify-center p-0 text-center border-0 hover:outline-none hover:no-underline focus:outline-none focus:no-underline left-0"
        type="button"
        data-bs-target="#carouselExampleCaptions"
        data-bs-slide="prev"
        >
        <span class="carousel-control-prev-icon inline-block bg-no-repeat" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
        </button>
        <button
        class="carousel-control-next absolute top-0 bottom-0 flex items-center justify-center p-0 text-center border-0 hover:outline-none hover:no-underline focus:outline-none focus:no-underline right-0"
        type="button"
        data-bs-target="#carouselExampleCaptions"
        data-bs-slide="next"
        >
        <span class="carousel-control-next-icon inline-block bg-no-repeat" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
        </button>
    </div>

    <div class="mt-4">
        <div class=" bg-white p-6 rounded-lg" >
            
            <h1 id="products" class="mb-10 text-center text-5xl font-medium leading-tight mt-0 mb-5 text-black-600">Products</h1>

            <div class=" place-items-center space-y-0 lg:space-y-1 grid grid-cols-2 md:grid-cols-3 lg:gap-2 lg:grid-cols-4 ">
                @foreach($products as $product)
                    <div class="hover:shadow-lg transition delay-100 duration-300 ease-in-out hover:scale-105 px-12 rounded-lg" style="width: max-content">
                        <a href="{{route('product.show',$product)}}">
                            <img class="image" src="storage/{{$product->image}}"
                                alt="image">
                        </a>
                        <div class="text-center mt-4 mb-10">
                            <p class=" text-md mb-3">{{$product->name}}</p>
                            <p class="text-md text-orange-600 mb-3">Rs.{{$product->price}}</p>
                            
                            @if(Auth::guard('user')->user())
                                <a href="#" class=" bg-blue-500 hover:bg-sky-700 text-white px-4 py-2 rounded font-medium">Add to Cart</a>
                            @endif
                        </div>

                    </div>
                @endforeach
            </div>
        </div>
        
    </div>

@endsection