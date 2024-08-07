@extends('admin.layouts.master')

@section('content')
    <h1 class="text-center my-3">Add New Category</h1>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('admin.categories.store') }}" method="post">
        @csrf

        <div class="col-md-6 m-auto">
            <div class="mb-3">
                <label for="firstNameinput" class="form-label"> Name Category : </label>
                <input type="text" name="name" class="form-control" placeholder="Enter name category"
                    id="firstNameinput">
            </div>
            <button class="btn btn-primary" type="submit">Create</button>
            <a class="btn btn-warning" href="{{ route('admin.categories.list') }}">List Category</a>
        </div>

    </form>
@endsection


@section('script-libs')
    <!-- prismjs plugin -->
    <script src="assets/libs/prismjs/prism.js"></script>
@endsection
