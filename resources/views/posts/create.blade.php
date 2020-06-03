@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card card-body">
            <form action="{{ route('posts.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="header">
                        Заголовок:
                    </label>
                    <input type="text" class="form-control" name="header" id="header">
                </div>
                <div class="form-group">
                    <label for="body">
                        Текст поста:
                    </label>
                    <textarea name="body" id="body" cols="30" rows="10" class="form-control"></textarea>
                </div>
                <div class="form-group">
                    <label for="new-tag" class="form-control">Название тега</label>
                    <input type="text" name="new-tag" id="new-tag" class="form-control">
                    <div class="tag-buttons">
                        <div class="btn btn-info" id="add-tag-btn" onclick="addTag()">Добавить тег</div>
                        <div class="btn btn-danger" onclick="removeTag()">Удалить тег</div>
                    </div>
                    <div id="tag-viewer"></div>
                    <textarea style="display: none;" name="tags" class="form-control" id="tags"></textarea>
                </div>
                <button class="btn btn-success">Добавить</button>
            </form>
        </div>
    </div>
    <script>
        let tagOnRemove;
        function addTag(){
            let newTagName = ' '  + document.getElementById('new-tag').value;
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
        function removeTag(){
            let tagsText = document.getElementById('tags').value;
            document.getElementById('tags').value = tagsText.replace(tagOnRemove.innerHTML, '');
            tagOnRemove.remove();
        }
    </script>
@endsection
<style>
    .tag{
        margin: 5px 0px 5px 0px;
        max-width: 10%;
        max-height: 10%;
        background-color: gray;
        border-radius: 5%;
        text-align: center;
        line-height: 20px;
    }
    .tag-buttons{
        padding: 10px 0px 10px 0px;
    }
</style>
