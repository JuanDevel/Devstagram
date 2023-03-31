@extends('layouts.app')

@section('title')
    {{$post->title}}
@endsection

@section('content')
    <div class="container mx-auto md:flex">
        <div class="md:w-1/2">
            <img src="{{asset('uploads').'/'.$post->image}}" alt="image post {{$post->title}}">

            <div class="p-3 flex items-center gap-4">

                @auth

                    <livewire:like-post :post="$post" />

                @endauth
                
                
            </div>

            <div class="font-bold">
                <a href="{{route('posts.index', $post->user)}}">{{$post->user->username}}</a>
                <p class="text-sm text-gray-500">
                    {{$post->created_at-> diffForHumans()}}
                </p>
                <p class="mt-5">
                    {{$post->description}}
                </p>
            </div>

            @auth
                @if($post->user_id === auth()->user()->id )
                    <form method="POST" action="{{ route('posts.destroy', $post) }}">
                        @method('DELETE')
                        @csrf
                        <input 
                            type="submit"
                            value="Delete Post"
                            class="bg-red-500 hover:bg-red-600 p-2 rounded text-white font-bold mt-4 cursor-pointer"
                        />
                    </form>
                @endif
            @endauth
        </div>

        <div class="md:w-1/2 p-5">
           
                
            <div class="shadow bg-white p-5 mb-5">
                @auth
                <p class="text-xl font-bold text-center mb-4 uppercase">
                    add a new comment
                </p>
                @if (session('message'))
                    
                    <div class="bg-green-500 p-2 rounded-lg mb-6 text-white text-center uppercase font-bold">
                        {{session('message')}}
                    </div>
                    
                @endif
                <form action="{{route('comment.store',['post'=>$post, 'user'=>$user])}}" method="POST">
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
                @endauth

                <div class="bg-white shadow mb-5 max-h-96 overflow-y-scroll mt-10">
                    @if ($post->comments->count())
                        @foreach ($post->comments as $comment )
                            <div class="p-5 border-gray-300 border-b">
                                <a class="font-bold" href="{{route('posts.index', $comment->user)}}">{{$comment->user->username}}</a>
                                <p>{{$comment->comment}}</p>
                                <p class="text-xs text-gray-400">{{$comment->created_at->diffForHumans()}}</p>
                            </div>
                        @endforeach
                    @else
                        <p class="p-10 text-center uppercase">there are no comments</p>
                    @endif
                </div>
            </div>           
        </div>
    </div>
@endsection