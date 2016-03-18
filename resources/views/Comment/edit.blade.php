@extends('layouts.app', ['pageTitle' => 'Edition du commentaire n°'.$comment->id])

@section('content')
    @include('partials.comment.form', ['action' => 'edit'])
    @include('partials.comment.errors')
@endsection