@extends('layouts.app')

@section('content')
    
    <div class="" style="background: #edf2f7;">
    <div class="grid grid-cols-12 bg-white ">

        <div class="col-span-12 w-full px-3 py-6 justify-center flex space-x-4 border-b border-solid md:space-x-0 md:space-y-4 md:flex-col md:col-span-2 md:justify-start ">

            <a href="#" class="text-sm p-2 bg-indigo-900 text-white text-center rounded font-bold">Basic Information</a>

            <a href="#" class="text-sm p-2 bg-indigo-200 text-center rounded font-semibold hover:bg-indigo-700 hover:text-gray-200">Another Information</a>

            <a href="#" class="text-sm p-2 bg-indigo-200 text-center rounded font-semibold hover:bg-indigo-700 hover:text-gray-200">Another Something</a>

        </div>

        <div class="col-span-12 md:border-solid md:border-l md:border-black md:border-opacity-25 h-full pb-12 md:col-span-10">
        <div class="px-4 pt-4">
            <div>
                <h3 class="text-2xl font-semibold">Basic Information</h3>
                <hr>
            </div>
            <form action="{{ route('user.update',$user) }}" method="post" class="flex flex-col space-y-8">
                @csrf
                @method('PATCH')
                

                <div class="form-item">
                    <label class="text-xl mb-2">Name</label>
                    <input type="text" id="name" name="name" value="{{ old('name') ?? $user->name}}" class="w-full appearance-none text-black text-opacity-60 rounded shadow py-1 px-2  mr-2 focus:outline-none focus:shadow-outline focus:border-blue-200" >
                </div>

                <div class="flex flex-col space-y-4 md:space-y-0 md:flex-row md:space-x-4">

                    <div class="form-item w-full">
                    <label class="text-xl ">Username</label>
                    <input type="text" id="username" name="username" value="{{ old('username') ?? $user->username}}" class="w-full appearance-none text-black text-opacity-60 rounded shadow py-1 px-2 mr-2 focus:outline-none focus:shadow-outline focus:border-blue-200 " >
                    </div>

                    <div class="form-item w-full">
                    <label class="text-xl ">Email</label>
                    <input type="email" id="email" name="email" value="{{ old('email') ?? $user->email}}" class="w-full appearance-none text-black text-opacity-60 rounded shadow py-1 px-2 mr-2 focus:outline-none focus:shadow-outline focus:border-blue-200 " >
                    </div>
                </div>

                <div class="flex flex-col space-y-4 md:space-y-0 md:flex-row md:space-x-4">

                    <div class="form-item w-full">
                    <label class="text-xl ">Password</label>
                    <input type="password" id="password" name="password" value="{{ old('password') ?? $user->password}}" class="w-full appearance-none text-black text-opacity-60 rounded shadow py-1 px-2 mr-2 focus:outline-none focus:shadow-outline focus:border-blue-200 " >
                    </div>
                </div>
                <button type="submit" class="w-20 bg-blue-500 hover:bg-sky-700 text-white px-4 py-2 rounded font-medium">Update</button>
            </form>

                <div>
                    <h3 class="mt-4 text-2xl font-semibold ">More About Me</h3>
                    <hr>
                </div>

                <div class="form-item w-full">
                    <label class="text-xl ">Biography</label>
                    <textarea cols="30" rows="10" class="w-full appearance-none text-black text-opacity-60 rounded shadow py-1 px-2 mr-2 focus:outline-none focus:shadow-outline focus:border-blue-200 " disabled>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorem natus nobis odio. Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusantium, eveniet fugiat? Explicabo assumenda dignissimos quisquam perspiciatis corporis sint commodi cumque rem tempora!</textarea>
                </div>

        </div>
        </div>

    </div>
    </div>
    </div>

    <script>
        setTimeout(function(){
        if ($('#message').length > 0) {
            $('#message').remove();
        }
        }, 3000)
    </script>
@endsection
