@extends('layouts.master')

@section('content')

<div class="container index-container">
    <div class="row">
        <div class="col-12 pt-2">
            <a href="#" class="back-btn btn btn-outline-primary btn-sm" >Go back</a>
             <div class="row">
                <h2 class="display-category2">    
                        {{ ucfirst($categoryName) }}
                </h2>
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
                <ul>
                    @forelse ($posts as $post)         
                    <li class="post-link">
                        <a class="blog-title" href="./post{{ $post->id }}">{{ ucfirst($post->title) }}</a>
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