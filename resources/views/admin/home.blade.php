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
            class="block w-full"
            alt="..."
            />
            <div class="carousel-caption hidden md:block absolute text-center">
            <h5 class="text-xl">Galaxy Z-Flip 3</h5>
            <p>A good thing just got better</p>
            </div>
        </div>
        <div class="carousel-item relative float-left w-full">
            <img
            src="storage/images/banners/banner_r62TkIc.jpg"
            class="block w-full"
            alt="..."
            />
            <div class="carousel-caption hidden md:block absolute text-center">
            <h5 class="text-xl text-black-500">Galaxy S21</h5>
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

    <div class="">
        <div class=" bg-white p-6 rounded-lg" >
            
            <h1 class="mb-10 text-center text-5xl font-medium leading-tight mt-0 mb-5 text-black-600">Products</h1>

            <div class=" place-items-center space-y-0 lg:space-y-1 grid grid-cols-2 md:grid-cols-3 lg:gap-2 lg:grid-cols-4 ">
            
                @if(Auth::guard('admin')->user())
                    <form action="{{route('form')}}">
                        @csrf
                        <button type="submit" class="bg-gray-200 hover:bg-violet-700 text-violet-500 font-semibold hover:text-white py-5 px-7  rounded-full">
                            
                            <i class="fas fa-plus fa-3x"></i>
                        </button>
                        <p class="text-center mt-2 font-sans bold text-lg">Add products</p> 
                    </form>  
                @endif

                @foreach($products as $product)
                    <div id="product-div" class="transition delay-100 duration-300 ease-in-out hover:scale-105 px-12 rounded-lg hover:shadow-lg" id="item-{{$product->id}}" style="width: max-content">
                        <a href="{{route('product.show',$product)}}">
                            <img class="image" src="storage/{{$product->image}}"
                                alt="image">
                        </a>
                        <div class="text-center mt-4 mb-10">
                            <p class=" text-md mb-3">{{$product->name}}</p>
                            <p class="text-md text-orange-600 mb-3">Rs.{{$product->price}}</p>
                            
                            @if(Auth::guard('admin')->user())
                                <div class="flex justify-around">
                                    <form data-route="{{route('product.destroy',$product)}}" class="del-form" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button   type="submit" class="btn bg-red-500 hover:bg-red-700 text-white px-4 py-2 rounded font-medium">Delete</button>
                                    </form>
                                    <a href="{{route('product.edit',$product)}}" class="link bg-blue-500 hover:bg-sky-700 text-white px-4 py-2 rounded font-medium">Update</a>
                                </div>
                            @endif
                                
                        </div>
                    </div>
                @endforeach
                   
            </div>
        </div>
        
    </div>
    {{-- <script>
        $(document).ready(function(){
            $('.del-form').on('submit',function(e){
                e.preventDefault();
                $.ajax({
                    type:'DELETE',
                    headers:{
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url:$(this).data('route'),
                    data:{
                        '_method':'delete'
                    },
                    success: function(response){
                        alert(response.id, response.name)
                        // $('.item-'+response.id).remove();
                    }
                });
            });

            setTimeout(function(){
            if ($('#message').length > 0) {
                $('#message').remove();
            }
            }, 3000)
        });
    </script> --}}
@endsection