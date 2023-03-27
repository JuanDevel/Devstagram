@extends('layouts.app')

@section('title')
    Create new post
@endsection

@push('styles')
    <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
@endpush

@section('content')
    <div class="md:flex md:items-center">
        <div class="md:w-1/2 px-10">
            <form action="{{ route('images.store')}}" method="POST" enctype="multipart/form-data" id="dropzone" class="dropzone border-dashed border-2 w-full h-96 rounded flex flex-col justify-center items-center">
                @csrf
            </form>
        </div>

        <div class="md:w-1/2 p-10 bg-white rounded-lg shadow-xl mt-10 md:mt-0">
            <form action="{{ route('register')}}" method="POST" novalidate>
                @csrf
                <div class="mb-5">
                    <label for="title" class="mb-2 block uppercase text-gray-500 font-bold">
                        post title
                    </label>
                    <input id="title" type="text" name="title" placeholder="Title" class="border p-3 w-full rounded-lg @error('title')
                        border-red-500
                    @enderror" value="{{old('title')}}"/>
                    @error('title')
                        <p class="bg bg-red-500 text-white my-2 rounded-lg text-sm p-2  text-center uppercase">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-5">
                    <label for="description" class="mb-2 block uppercase text-gray-500 font-bold">
                        description
                    </label>
                    <textarea id="description" name="description" placeholder="Description" class="border p-3 w-full rounded-lg 
                    @error('description')
                        border-red-500
                    @enderror">{{old('Description')}}</textarea>

                    @error('description')
                        <p class="bg bg-red-500 text-white my-2 rounded-lg text-sm p-2  text-center uppercase">{{ $message }}</p>
                    @enderror
                </div>
                <input type="submit" value="Post" class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg"
                />
            </form>    
        </div>
    </div>
@endsection