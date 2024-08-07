@extends('admin.layouts.master')

@section('styles-libs')
    <!-- quill css -->
    <link href="{{ asset('theme/admin/assets/libs/quill/quill.core.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('theme/admin/assets/libs/quill/quill.bubble.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('theme/admin/assets/libs/quill/quill.snow.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
    <h1 class="text-center my-3">Add New Post</h1>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('admin.posts.update',$data->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="category_id" class="form-label">Category</label>
            <select type="text" name="category_id" class="form-select" id="category_id" aria-describedby="category">
                @foreach ($categories as $id => $name)
                    <option value="{{ $id }} " @selected($data->category_id == $id)>{{ $name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="author_id" class="form-label">Authors</label>
            <select type="text" name="author_id" class="form-select" id="author_id" aria-describedby="author">
                @foreach ($authors as $id => $name)
                    <option value="{{ $id }}" @selected($data->author_id == $id)>{{ $name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Title</label>
            <input type="text" name="title" value="{{$data->title}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Image</label><br>
            <img class="mb-3" src="{{asset($data->image)}}" alt="" width="300px">
            <input type="file" name="image" class="form-control" id="image" aria-describedby="emailHelp">
        </div>

        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Short_description</label>
            <textarea class="form-control" name="short_description" id="exampleFormControlTextarea1" rows="3">{{$data->short_description}}</textarea>
        </div>

        <div class="col-12">
            <label for="content" class="form-label">Content</label>
            <textarea class="form-control" name="content" id="content" rows="30">{{$data->content}}</textarea>
        </div>

        <button type="submit" class="btn btn-info">Submit</button>

       <a class="btn btn-warning" href="{{route('admin.posts.list')}}">List Posts</a>
    </form>

@endsection


@section('script-libs')
    <script src="https:////cdn.ckeditor.com/4.8.0/full-all/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('content');
    </script>

    <!-- ckeditor -->
    <script src="{{ asset('theme/admin/assets/libs/@ckeditor/ckeditor5-build-classic/build/ckeditor.js') }}"></script>

    <!-- quill js -->
    <script src="{{ asset('theme/admin/assets/libs/quill/quill.min.js') }}"></script>

    <!-- init js -->
    <script src="{{ asset('theme/admin/assets/js/pages/form-editor.init.js') }}"></script>
@endsection
