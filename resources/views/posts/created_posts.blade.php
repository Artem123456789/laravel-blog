@extends('layouts.app')

@section('content')
    <h1>{{ $user->name }}</h1>
    <a href="{{ route('posts.create') }}" class="ml-auto btn btn-success">
        Создать пост
    </a>
    @forelse($posts as $post)
        <table class="table table-bordered table-striped">
            <thead>
            <tr>
                <th>#</th>
                <th width="100%">Заголовок</th>
            </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="p2 text-center">{{ $post->id }}</td>
                    <td class="p-0">
                        <a href="{{ route('posts.show', $post) }}" class="p-2 d-block w-100">
                            {{ $todo->title }}
                        </a>
                    </td>
                    <td class="p2">
                        <form class="ml-auto" action="{{ route('posts.destroy', $post) }}" method="POST">
                            <button class="btn btn-danger">Удалить</button>
                        </form>
                    </td>
                </tr>
            </tbody>
        </table>
    @empty
        <div>Постов еще нет</div>
    @endforelse
@endsection
