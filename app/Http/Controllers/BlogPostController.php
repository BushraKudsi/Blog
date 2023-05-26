<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use App\Models\Category;
use Illuminate\Http\Request;

class BlogPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = BlogPost::all();
        $categories = Category::all();

        return view('pages.index',[
            'posts' => $posts,
            'categories' => $categories,
        ]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $allCategories = Category::all()->sortBy('name');
        return view('pages.create',['allCategories'=>$allCategories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $category = Category::where('id', $request->categories)->first(); 

        if ($category) {
            $newPost = BlogPost::create([
                'title' => $request->title,
                'body' => $request->body,
                'category_id' => $category->id,
            ]);
        } else {
            $newPost = BlogPost::create([
                'title' => $request->title,
                'body' => $request->body,
                'category_id' => 1,
            ]);
        }
        return redirect('post/' . $newPost->id);
    }
    

        /**
     * Display the specified resource.
     *
     * @param  \App\Models\BlogPost  $blogPost
     * @return \Illuminate\Http\Response
     */
    public function show(BlogPost $blogPost)
    {
        // $subPosts = SubPost::where('blog_post_id', $blogPost->id)->get();
        $category = Category::findOrFail($blogPost->category_id);
        $categoryName = $category->name;
        $categoryID = $blogPost->category_id;
        return view('pages.show', [
            'post' => $blogPost,
            'categoryID' => $categoryID,
            'categoryName' => $categoryName,
        ]);
    }






    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BlogPost  $blogPost
     * @return \Illuminate\Http\Response
     */
    public function edit(BlogPost $blogPost)
    {
        $selectedCategory = Category::findOrFail($blogPost->category_id);
        $allCategories = Category::all()->sortBy('name');
        return view('pages.edit', [
            'post' => $blogPost,
            'selectedCategory' => $selectedCategory,
            'allCategories' => $allCategories
            ]); 
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BlogPost  $blogPost
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BlogPost $blogPost)
    {   
        $category = Category::where('id', $request->categories)->first(); 
        if ($category) {
            $blogPost ->update([
                'title' => $request->title,
                'body' => $request->body,
                'category_id' => $category->id,
            ]);
        } else {
            $blogPost ->update([
                'title' => $request->title,
                'body' => $request->body,
                'category_id' => 1,
            ]);
        }
        return redirect('post/' . $blogPost->id);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BlogPost  $blogPost
     * @return \Illuminate\Http\Response
     */
    public function destroy(BlogPost $blogPost)
    {
        $blogPost->delete();
        return redirect('/blog');
    }

    public function deletePostFromHome(BlogPost $blogPost)
    {
        $blogPost->delete();
    }


    public function search($title)
    {
        $BlogPosts = BlogPost::where('title', 'LIKE', '%' . $title . '%')->get();
        // $blogPostIds = $BlogPosts->pluck('blog_post_id')->toArray();
        // $posts = BlogPost::whereIn('id', $blogPostIds)->get();

        return response()->json([
            'posts' => $BlogPosts,
        ]);
    }



    
 


}
