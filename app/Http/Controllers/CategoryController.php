<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\BlogPost;
use CAMPAIGN;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function create()
    {
        return view('pages.createCat');
    }

    public function store(Request $request)
    {

        $newCat = Category::create([
            'name' => $request->title,
            'description' => $request->body,
        ]);

        return redirect('cat/' . $newCat->id);
    }

    public function filter(Category $category)
    {
        $categoryName = $category->name;
        $categoryID = $category->id;
        $posts = BlogPost::all();
        $filteredPosts = BlogPost::where('category_id', 'LIKE', '%' . $categoryID . '%')->get();
        // dd($categoryID);

        if($categoryID ==1){
            return view('pages.filter', [
                'posts' => $posts,
                'categoryName' => $categoryName,
            ]);
        }else{     
            return view('pages.filter', [
                'posts' => $filteredPosts,
                'categoryName' => $categoryName,
            ]);
        }


        
    }
}
