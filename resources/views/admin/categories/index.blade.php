@extends('admin.layouts.master')

@section('content')
<h1 class="text-center my-3">List Categories</h1>
<a class="btn btn-primary my-3" href="{{ route('admin.categories.create')}}"> Add</a>
    <div class="table-responsive mt-4 mt-xl-0">
        <table class="table table-success table-striped table-nowrap align-middle mb-0">
            <thead>
                <tr>
                    <th scope="col">TT</th>
                    <th scope="col">Name categories</th>
                    <th scope="col">Create_at</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $key => $item)
                    <tr>
                        <td class="fw-medium">{{ $key + 1 }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->created_at }}</td>
                        <td>
                            <div class="hstack gap-3 flex-wrap">
                                <a href="{{ route('admin.categories.edit', $item->id) }} javascript:void(0); " class="link-success fs-15"><i class="ri-edit-2-line"></i></a>
                                <form action="{{ route('admin.categories.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Bạn có chắc chắn muốn xóa không?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-link link-danger fs-15">
                                        <i class="ri-delete-bin-line"></i>
                                    </button>
                                </form>
                            </div>
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
