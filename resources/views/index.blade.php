@extends('layouts.app');

@section('content')
    @if(Auth::check())
        <a href="/posts">Мои посты</a>
    @endif
    @forelse($posts as $post)
        <div>
            <h1>
                {{ $post->header }}
            </h1>
            <p>{{ $post->tags }}</p>
        </div>
    @empty
        <div>
            Постов пока нет еще нет
        </div>
    @endforelse
@endsection
