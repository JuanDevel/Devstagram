@extends('layouts.app')

@section('title')
    {{$post->title}}
@endsection

@section('content')
    <div class="container mx-auto flex">
        <div class="md:w-1/2">
            <img src="{{asset('uploads').'/'.$post->image}}" alt="image post {{$post->title}}">

            <div class="p-3">
                <p>0 Likes</p>
            </div>

            <div class="font-bold">
                {{$post->user->username}}
                <p class="text-sm text-gray-500">
                    {{$post->created_at-> diffForHumans()}}
                </p>
                <p class="mt-5">
                    {{$post->description}}
                </p>
            </div>
        </div>

        <div class="md:w-1/2 p-5">
           
                
            <div class="shadow bg-white p-5 mb-5">
                @auth
                <p class="text-xl font-bold text-center mb-4 uppercase">
                    add a new comment
                </p>

                <form action="">
                    @csrf

                    <div class="mb-5">
                        <label for="comment" class="mb-2 block uppercase text-gray-500 font-bold">
                            add a Comment
                        </label>
                        <textarea id="comment" name="comment" placeholder="Add a comment" class="border p-3 w-full rounded-lg 
                        @error('comment') border-red-500 
                        @enderror"></textarea>
    
                        @error('comment')
                            <p class="bg bg-red-500 text-white my-2 rounded-lg text-sm p-2  text-center uppercase">{{ $message }}</p>
                        @enderror

                        <input type="submit" value="comment" class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg"/>
                    </div>
                </form>
            </div>
            @endauth
        </div>
    </div>
@endsection