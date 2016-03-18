@if($action == 'edit')
    {!! Form::model($comment, ['route' => ['comment.update', $comment->id], 'method' => 'PUT']) !!}
@else
    {!! Form::open(['route' => 'comment.store', 'method' => 'POST']) !!}
    {!! Form::hidden('post_id', $post->id) !!}
@endif


    <div class="form-group">
        {!! Form::textarea('content', null, ['class' => 'form-control']) !!}
    </div>

    {!! Form::submit('Envoyer', ['class' => 'btn btn-block']) !!}
{!! Form::close() !!}