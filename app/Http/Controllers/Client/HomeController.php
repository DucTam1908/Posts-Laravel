<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    function index()
    {
        $data = DB::table('posts')
            ->join('categories', 'categories.id', '=', 'posts.category_id')
            ->join('authors', 'authors.id', '=', 'posts.author_id')
            ->select('posts.*', 'categories.name as cate', 'authors.name')
            ->get();

        return view('client.home', compact('data'));
    }

    function detail($id)
    {
        $detail = DB::table('posts')
            ->join('categories', 'categories.id', '=', 'posts.category_id')
            ->join('authors', 'authors.id', '=', 'posts.author_id')
            ->where('posts.id', $id)
            ->select('posts.*', 'categories.name as cate', 'authors.name')
            ->first();

        return view('client.detail', compact('detail'));
    }

    public function search(Request $request)
    {
        $keyword = $request->all();
        $data = DB::table('posts')
            ->join('categories', 'categories.id', '=', 'posts.category_id')
            ->join('authors', 'authors.id', '=', 'posts.author_id')->where('title', 'LIKE', '%' . $keyword['search'] . '%')
            ->orWhere('content', 'LIKE', '%' . $keyword['search'] . '%')
            ->select('posts.*', 'categories.name as cate', 'authors.name')
            ->get();

        return view("client.search", compact("data"));
    }

    public function account(){
        

        $data = DB::table('users')->get();
        return view('client.account', compact('data'));
    }
}
