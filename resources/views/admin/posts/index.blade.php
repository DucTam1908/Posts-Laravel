@extends('admin.layouts.master')

@section('content')
<style>
    td{
        max-width:200px;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
  
    }
</style>
<h1 class="text-center my-3">List Posts</h1>
<a class="btn btn-primary my-3" href="{{ route('admin.posts.create')}}"> Add</a>
    <div class="table-responsive mt-4 mt-xl-0">
        <table class="table table-success table-striped table-nowrap align-middle mb-0 w-100">
            <thead>
                <tr>
                    <th scope="col">TT</th>
                    <th scope="col">Title</th>
                    <th scope="col">Image</th>
                    <th scope="col">Short_description</th>
                    <th scope="col">Author</th>
                    <th scope="col">Category</th>
                    <th scope="col">Action</th>
                    <th scope="col">Detail</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $key => $item)
                    <tr>
                        <td class="fw-medium">{{ $key + 1 }}</td>
                        <td>{{ $item->title }}</td>
                        <td><img src="{{asset($item->image)}}" alt="" width="100px"></td>
                        <td >{{ $item->short_description }}</td>
                        <td>{{ $item->author->name }}</td>
                        <td>{{ $item->category->name }}</td>
                        <td>
                            <div class="hstack gap-3 flex-wrap">
                                <a href="{{ route('admin.posts.edit', $item->id) }} javascript:void(0); " class="link-success fs-15"><i class="ri-edit-2-line"></i></a>
                                <form action="{{ route('admin.posts.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Bạn có chắc chắn muốn xóa không?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-link link-danger fs-15">
                                        <i class="ri-delete-bin-line"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                        <td>
                            <a class="btn btn-warning" href="{{route('admin.posts.show', $item->id)}}">Detail</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection


@section('script-libs')
    <!-- prismjs plugin -->
    <script src="assets/libs/prismjs/prism.js"></script>
@endsection
