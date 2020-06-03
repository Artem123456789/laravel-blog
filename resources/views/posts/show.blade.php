@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>{{ $post->header }}</h2>
        <p>{{ $post->body }}</p>
        <p>Теги: {{ $post->tags }}</p>
        <p>Автор: {{ $post->user->name }}</p>
        <p>Комментарии: </p>
        <div class="comments">
            @forelse($post->comments as $comment)
                <div class="comment">
                    <p class="author-name">{{ $comment->user->name }}</p>
                    <p class="comment-text">{{ $comment->body }}</p>
                </div>
            @empty
                <p>Комментариев пока нет</p>
            @endforelse
        </div>
        @if(Auth::check())
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('addComment', $post) }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="body" class="form-control">Текст комментария:</label>
                            <input type="text" class="form-control" name="body">
                            <button class="btn btn-success">Добавить</button>
                        </div>
                    </form>
                </div>
            </div>
        @endif
    </div>
@endsection
