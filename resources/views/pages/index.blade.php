@extends('layouts.master')

@section('content')

<div class="container index-container">
    <div class="row">
        <div class="col-12 pt-2">
             <div class="row">
                <div class="col-12">
                    <h1 class="display-one">Welcome to this blog!</h1>
                    <p>Enjoy reading our posts. Click on a post to read!</p>
                </div>

                <div class="col-12 categories-tab">
                    @forelse ($categories as $category)         
                        <div class="category">
                                <a class="category-title" href="./blog/cat{{ $category->id }}">{{ ucfirst($category->name) }}</a>
                        </div>
                        @empty  
                        <p class="text-warning">No blog Posts available</p>
                    @endforelse
                </div>

                <div class="col-12 search-create-tab">
                    <div class="col-6 add-post">
                        <a href="/blog/create" class="btn btn-primary btn-sm">Create New Post</a>
                    </div>
                    <div class="col-6 search-bar">
                        <input class="search-text" type="text" placeholder="Search">
                        <button class="search-btn" type="submit">Search</button>
                      </div>                            
                </div>
            </div>        
        
            <div class="post-list">
                <ul class="post-ul">
                    @forelse ($posts as $post)         
                    <li class="post-link">
                        <a class="blog-title" href="./blog/post{{ $post->id }}">{{ ucfirst($post->title) }}</a>
                        <span class="close-icon">x</span></a>
                    </li>
                    {{-- format each first letter as capital --}}
                    @empty  
                    {{-- @forelse handles empty arrys --}}
                    <p class="text-warning">No blog Posts available</p>
                    @endforelse
                </ul>
            </div>

        </div>
    </div>
</div>

@endsection