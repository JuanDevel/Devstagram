@extends('layouts.app')

@section('title')
    Homepage
@endsection

@section('content')   
    <x-listar-post :posts="$posts" />
@endsection