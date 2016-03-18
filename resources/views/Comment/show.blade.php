{{--@extends('layouts.app', ['pageTitle' => 'Liste des articles'])

@section('content')
    @if(Session::has('erreur'))
        <h1>{{Session::get('erreur')}}</h1>
    @endif--}}

    @foreach($comment as $message)

        @if($message->post_id == $post->id)

        <p>{{$message->content}}</p>

        <p>{{$message->user->name}}</p>

            <form action="{{route('comment.destroy', $message->id)}}" method="POST">
                {{csrf_field()}}
                <input type="hidden" name="_method" value="DELETE">
                <button>Supprimer le commentaire</button>
            </form>
        @endif
    @endforeach

