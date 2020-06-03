@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="blog-post">
            <h1 class="blog-post-title">{{ $post->header }}</h1>
            <p class="blog-post-body">{{ $post->body }}</p>
            <b class="tags">Теги: </b> {{ $post->tags }}
            <p>
                <b>Автор: </b>{{ $post->user->name }}
            </p>
        </div>
        <p class="comments-label">Комментарии: </p>
        <div class="comments">
            @forelse($post->comments as $comment)
                <div class="comment">
                    <b>{{ $comment->user->name }}</b>
                    <pre>{{ $comment->body }}</pre>
                </div>
            @empty
                <p>Комментариев пока нет</p>
            @endforelse
        </div>
        @if(Auth::check())
            <div class="card card-body">
                <form action="{{ route('addComment', $post) }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="body">Текст комментария:</label>
                        <input type="text" class="form-control" name="body">
                    </div>
                    <button class="btn btn-success">Добавить</button>
                </form>
            </div>
        @endif
    </div>
@endsection
<style>
    .blog-post-body{
        font-size: 20px;
    }

    .comments-label{
        fons-size: 16px;
    }
</style>
