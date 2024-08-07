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
    <form action="{{ route('admin.posts.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="category_id" class="form-label">Category</label>
            <select type="text" name="category_id" class="form-select" id="category_id" aria-describedby="category">
                @foreach ($categories as $id => $name)
                    <option value="{{ $id }}">{{ $name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="author_id" class="form-label">Authors</label>
            <select type="text" name="author_id" class="form-select" id="author_id" aria-describedby="author">
                @foreach ($authors as $id => $name)
                    <option value="{{ $id }}">{{ $name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Title</label>
            <input type="text" name="title" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Image</label>
            <input type="file" name="image" class="form-control" id="image" aria-describedby="emailHelp">
        </div>

        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Short_description</label>
            <textarea class="form-control" name="short_description" id="exampleFormControlTextarea1" rows="3"></textarea>
        </div>

        <div class="col-12">
            <label for="content" class="form-label">Content</label>
            <textarea class="form-control" name="content" id="content" rows="30"></textarea>
        </div>
        {{-- <div class="card">
            <div class="card-header">
                <h4 class="card-title mb-0">Snow Editor</h4>
            </div><!-- end card header -->

            <div class="card-body">
                <p class="text-muted">Use <code>snow-editor</code> class to set snow editor.</p>
                <div class="snow-editor" style="height: 300px;">


                </div> <!-- end Snow-editor-->
            </div><!-- end card-body -->
        </div><!-- end card --> --}}

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
