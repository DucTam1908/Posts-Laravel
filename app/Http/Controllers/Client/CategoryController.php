<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    function showCate($id){

        //Lấy danh mục theo id

        $category = DB::table('categories')
        ->where('id', $id)
        ->first();

        $posts = DB::table('posts')
        -> join('categories', 'categories.id', '=', 'posts.category_id')
        -> join('authors', 'authors.id', '=', 'posts.author_id')
        ->where('categories.id', $id)
        ->select('posts.*', 'categories.name as cate', 'authors.name' )
        ->get();

        // dd($posts);
        return view('client.category', compact('category', 'posts'));
    }

    
}
