<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\BlogPost;
use CAMPAIGN;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
        /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // public function storeSubPost(Request $request)
    // {
    //     $newPost = SubPost::create([
    //         'blog_post_id' => $request->id,
    //         'title' => $request->title,
    //         'body' => $request->body,
    //         'user_id' => 1
    //     ]);

    //     return redirect('blog/' . $newPost->id);
    // }


    // public function showSubPost($blogPost, $subPost)
    // {
    //     $subBlogPost = SubPost::findOrFail($subPost);
        
    //     return view('pages.show', [
    //         'post' => $subBlogPost,
    //         'subPosts' => null,
    //     ]);
    // }

    // public function updateSubPost(Request $request, SubPost $subPost)
    // {
    //     $subPost ->update([
    //         'title' => $request->title,
    //         'body' => $request->body,
    //     ]);

    //     return redirect('blog/post' . $subPost->id);
    // }

    // public function deleteSubPost($blogPost, $subPost)
    // {
    //     $subBlogPost = SubPost::findOrFail($subPost);
    //     $subBlogPost->delete();
    // }

    // public function editSubPost(BlogPost $blogPost, SubPost $subPost)
    // {
    //     return view('pages.edit', [
    //         'post' => $subPost,
    //         ]); 
    // }


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
