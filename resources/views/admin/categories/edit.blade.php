@extends('admin.layouts.master')

@section('content')
    <h1 class="text-center my-3">Update Category</h1>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('admin.categories.update', $category) }}" method="post">
        @csrf
        @method('PUT')
        <div class="col-md-6 m-auto">
            <div class="mb-3">
                <label for="firstNameinput" class="form-label"> Name Category : </label>
                <input type="text" name="name" value="{{$category->name}}" class="form-control" placeholder="Enter name category"
                    id="firstNameinput">
            </div>
            <button class="btn btn-primary" type="submit">Update</button>
            <a class="btn btn-warning" href="{{ route('admin.categories.list') }}">List Category</a>
        </div>

    </form>
@endsection


@section('script-libs')
    <!-- prismjs plugin -->
    <script src="assets/libs/prismjs/prism.js"></script>
@endsection
