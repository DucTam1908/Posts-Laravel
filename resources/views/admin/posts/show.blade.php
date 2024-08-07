@extends('admin.layouts.master')

@section('content')
<h1 class="text-center my-3">Detail Posts</h1>

    <div class="table-responsive mt-4 mt-xl-0">
        <b>Title:</b> {{$data->title}} <br>
        <b>Imgae:</b><br> <img src="{{asset($data->image)}}" alt="" width="300px"> <br>
        <b>Short_description:</b> {{$data->short_description}} <br>
        <b>Content:</b><br> {!! $data->content !!} <br>
        <b>Author:</b><br> {{$data->author->name}} <br>
        <b>Category:</b><br> {{$data->category->name}} <br>
        
    </div>

    <a class="btn btn-primary my-3" href="{{ route('admin.posts.list')}}"> List Posts</a>
@endsection

@section('script-libs')
    <!-- prismjs plugin -->
    <script src="assets/libs/prismjs/prism.js"></script>
@endsection
