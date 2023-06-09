@extends('layouts.master')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-12 pt-2">
            <a href="/blog" class="back-btn btn btn-outline-primary btn-sm">Go back</a>
            <div class="">
                <h1 class="display-4">Edit Post</h1>
                <p>Edit and submit this form to update a post</p>

                <hr>

                <form action="" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="control-group col-12">
                            <label for="category">Post Category</label>
                            {{-- <input type="text" id="category" class="form-control" name="category"
                                   placeholder="Enter Post Category" value="{{ ucfirst($categoryName) }}" required> --}}
                                   <select id="categories" name="categories">
                                    @foreach ($allCategories as $category)
                                        <option value="{{ $category->id }}" {{ $selectedCategory->id == $category->id ? 'selected' : '' }} >{{ $category->name }}</option>

                                    @endforeach

                                   </select>
                        </div>
                        <div class="control-group col-12">
                            <label for="title">Post Title</label>
                            <input type="text" id="title" class="form-control" name="title"
                                   placeholder="Enter Post Title" value="{{ $post->title }}" required>
                        </div>
                        <div class="control-group col-12 mt-2">
                            <label for="body">Post Body</label>
                            <textarea id="body" class="form-control" name="body" placeholder="Enter Post Body"
                                      rows="5" required>{{ $post->body }}</textarea>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="control-group col-12 text-center">
                            <button id="btn-submit" class="btn btn-primary">
                                Update Post
                            </button>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>


@endsection