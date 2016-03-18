@extends('layouts.app', ['pageTitle' => 'Article n°'.$post->id])

@section('content')
    <h2>{{$post->title}} <br> Auteur: {{ $post->user->name }} </h2>
    <p>{{$post->content}}</p>

    @include('comment.create')
    @include('comment.show')

@endsection