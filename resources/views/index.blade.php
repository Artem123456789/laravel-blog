@extends('layouts.app');

@section('content')
    @if(Auth::check())
    @endif
    <div class="container">
        <a href="/posts" class="d-flex">Мои посты</a>
        @forelse($posts as $post)
            <div>
                <h1>
                    <a href="{{ route('posts.show', $post) }}">{{ $post->header }}</a>
                </h1>
                <b class="tags">Теги: {{ $post->tags }}</b>
            </div>
        @empty
            <div>
                Постов пока нет еще нет
            </div>
        @endforelse
    </div>
@endsection
