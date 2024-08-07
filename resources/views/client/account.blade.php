@extends('client.layouts.master')

@section('banner')
    @auth
        <h2 class="text-center my-3 ">Xin chào : {{ Auth::user()->name }} </h2>
    @endauth
@endsection


@section('content')
    <div class="col-md-8 grid-sidebar" id="content">

        <a href="{{ route('login')}}"> Đăng nhập ngay</a>
        @auth
            <h2 class="text-center my-3 ">User: {{ Auth::user()->name }} </h2>
        @endauth
        <form action="{{ route('logout') }}" method="post">
            @csrf
            <button class="btn btn-danger">Logout</button>
        </form>

    </div>
@endsection
