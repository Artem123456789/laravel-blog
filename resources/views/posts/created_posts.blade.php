@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="d-flex align-items-center mb-3">
            <h1>{{ $user->name }}</h1>
            <a href="{{ route('posts.create') }}" class="ml-auto btn btn-success">
                Создать пост
            </a>
        </div>
        @forelse($posts as $post)
            <table class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th width="100%">Заголовок</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td class="p-0">
                        <a href="{{ route('posts.show', $post) }}" class="p-2 d-block w-100">
                            {{ $post->header }}
                        </a>
                    </td>
                    <td class="p2">
                        <form class="ml-auto" action="{{ route('posts.destroy', $post) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <div class="btn-group btn-group-sm">
                                <a class="btn btn-info" href="{{ route('posts.edit', $post) }}">Редактировать</a>
                                <button class="btn btn-danger">Удалить</button>
                            </div>
                        </form>
                    </td>
                </tr>
                </tbody>
            </table>
        @empty
            <div>Постов еще нет</div>
        @endforelse
    </div>
@endsection
