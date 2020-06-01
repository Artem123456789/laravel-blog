@extends('layouts.app')

@section('content')
    <form action="{{ route('posts.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="header"
                   class="form-control">
                Заголовок
            </label>
            <input type="text" class="form-control" name="header" id="header">
            <label for="body"
                   class="form-control">
                Тело поста
            </label>
            <textarea name="body" id="body" cols="30" rows="10" class="form-control"></textarea>
            <label for="new-tag" class="form-control">Название тега</label>
            <input type="text" name="new-tag" id="new-tag" class="form-control">
            <div class="btn btn-info" onclick="addTag()">Добавить тег</div>
            <textarea name="tags" class="form-control" id="tags"></textarea>
            <button class="btn btn-success">Добавить</button>
        </div>
    </form>
    <script>
        function addTag(){
            let newTag = ' '  + document.getElementById('new-tag').value;
            document.getElementById('tags').value += newTag;
        }
    </script>
@endsection
