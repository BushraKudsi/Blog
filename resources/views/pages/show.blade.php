@extends('layouts.master')

@section('content')

<div class="container index-container">
    <div class="row">
        <div class="col-12 pt-2">
            <a href="#" class="back-btn btn btn-outline-primary btn-sm" >Go back</a>
            <h2 class="display-category">    
                <a class="display-category" href="/cat/{{ $categoryID }}">
                    {{ ucfirst($categoryName) }}
                </a>
            </h2>
            <h1 class="display-one">{{ ucfirst($post->title) }}</h1>
            <p>{!! $post->body !!}</p>
            <hr>
        </div>
        <div class="col-12 edit-post">
            <a href="javascript:void(0)" class="edit-btn btn btn-primary btn-sm">Edit Post</a>
        </div>
        <br>
        <form id="delete-frm" class="col-12 delete-form" action="" method="POST">
            @method('DELETE')   
            @csrf
            <button class="delete-btn btn btn-danger">Delete Post</button>
        </form>
    </div>
</div>

@endsection