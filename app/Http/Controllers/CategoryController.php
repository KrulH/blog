<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

use App\Http\Requests;

class CategoryController extends Controller
{
    public function getCategoryIndex()
    {
        $categories = Category::orderBy('created_at','desc')->paginate(5);
        return view('admin.blog.categories', ['categories' => $categories]);
    }
}
