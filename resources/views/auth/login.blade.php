@extends('layouts.app')

@section('title')
    Log In
@endsection

@section('content')
    <div class="md:flex md:justify-center md:gap-7 md: items-center">
        <div class="md:w-6/12 p-5">
            <img src="{{asset('img/login.jpg')}}" alt="img login">
        </div>

        <div class="md:w-4/12 bg-white p-6 rounded-lg shadow-xl">
            <form method="POST" action="{{ route('login') }}" novalidate>
                @csrf

                <div class="mb-5">
                    <label for="email" class="mb-2 block uppercase text-gray-500 font-bold">
                        email
                    </label>
                    <input id="email" type="email" name="email" placeholder="Email" class="border p-3 w-full rounded-lg @error('name')
                    border-red-500
                @enderror" value="{{old('email')}}"/>
                    @error('email')
                        <p class="bg bg-red-500 text-white my-2 rounded-lg text-sm p-2  text-center uppercase">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-5">
                    <label for="password" class="mb-2 block uppercase text-gray-500 font-bold">
                        password
                    </label>
                    <input id="password" type="password" name="password" placeholder="Password" class="border p-3 w-full rounded-lg @error('name')
                    border-red-500
                @enderror"/>
                    @error('password')
                        <p class="bg bg-red-500 text-white my-2 rounded-lg text-sm p-2  text-center uppercase">{{ $message }}</p>
                    @enderror
                </div>

                <input type="submit" value="Log In" class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg"
                />
            </form>
        </div>
    </div>
@endsection