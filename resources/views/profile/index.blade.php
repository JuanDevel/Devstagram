@extends('layouts.app')

@section('title')
    Edit Profile: {{auth()->user()->name}}
@endsection

@section('content')
    <div class="md:flex md:justify-center">
        <div class="md:w-1/2 bg-white shadow p-6">
            <form class="mt-10 md:mt-0" action="{{route('profile.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-5">
                    <label for="username" class="mb-2 block uppercase text-gray-500 font-bold">
                        Username
                    </label>
                    <input id="username" type="text" name="username" placeholder="New userame" class="border p-3 w-full rounded-lg @error('username')
                        border-red-500
                    @enderror" value="{{auth()->user()->username}}"/>
                    @error('username')
                        <p class="bg bg-red-500 text-white my-2 rounded-lg text-sm p-2  text-center uppercase">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-5">
                    <label for="email" class="mb-2 block uppercase text-gray-500 font-bold">
                        email
                    </label>
                    <input id="email" type="email" name="email" placeholder="New email" class="border p-3 w-full rounded-lg @error('email')
                    border-red-500
                    @enderror" value="{{auth()->user()->email}}"/>
                    @error('email')
                        <p class="bg bg-red-500 text-white my-2 rounded-lg text-sm p-2  text-center uppercase">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-5">
                    <label for="image" class="mb-2 block uppercase text-gray-500 font-bold">
                        Image Profile
                    </label>
                    <input id="name" type="file" accept=".jpg, .jpeg, .png" name="image" class="border p-3 w-full rounded-lg @error('image')
                        border-red-500
                    @enderror"/>
                    @error('image')
                        <p class="bg bg-red-500 text-white my-2 rounded-lg text-sm p-2  text-center uppercase">{{ $message }}</p>
                    @enderror
                </div>

                <input type="submit" value="save changes" class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg"
                />
            </form>
        </div>
    </div>
@endsection