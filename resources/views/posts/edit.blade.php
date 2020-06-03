@extends('layouts.app')

@section('content')
    <form action="{{ route('posts.update', $post) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="header"
                   class="form-control">
                Заголовок
            </label>
            <input type="text" class="form-control" name="header" id="header" value="{{ $post->header }}">
            <label for="body"
                   class="form-control">
                Тело поста
            </label>
            <textarea name="body" id="body" cols="30" rows="10" class="form-control">{{ $post->body }}</textarea>
            <label for="new-tag" class="form-control">Название тега</label>
            <input type="text" name="new-tag" id="new-tag" class="form-control">
            <div class="btn btn-info" id="add-tag-btn" onclick="addTagFromButton()">Добавить тег</div>
            <div class="btn btn-danger" onclick="removeTag()">Удалить тег</div>
            <div id="tag-viewer"></div>
            <textarea style="display: none;" name="tags" class="form-control" id="tags">{{ $post->tags }}</textarea>
            <button class="btn btn-success">Сохранить</button>
        </div>
    </form>
    <script>
        let tagOnRemove;
        function addTag(newTagName){
            document.getElementById('tags').value += newTagName;
            document.getElementById('tag-viewer').innerHTML += `<div class="tag" id="${newTagName}">${newTagName}</div>`;
            let tags = document.getElementsByClassName('tag');
            for(let i = 0; i< tags.length; i++){
                tags[i].addEventListener('click', function(e){
                    e = e || window.event;
                    if(tagOnRemove != undefined) tagOnRemove.style.background = 'gray';
                    tagOnRemove = e.target || e.srcElement;
                    tagOnRemove.style.background = 'red';
                });
            }
        }
        function addTagFromButton(){
            let tagName = ' '  + document.getElementById('new-tag').value;
            addTag(tagName);
        }
        function removeTag(){
            let tagsText = document.getElementById('tags').value;
            document.getElementById('tags').value = tagsText.replace(tagOnRemove.innerHTML, '');
            tagOnRemove.remove();
        }
        function addTagsFromDataBase(){
            let tags = document.getElementById('tags').value.split(' ');
            for(let i = 0; i < tags.length; i++){
                addTag(tags[i]);
            }
        }
        addTagsFromDataBase();
    </script>
@endsection
<style>
    .tag{
        max-width: 30%;
        background-color: gray;
        border-radius: 30%;
    }
</style>
