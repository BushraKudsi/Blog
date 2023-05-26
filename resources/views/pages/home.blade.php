@extends('layouts.master')

@section('content')

    <div class="my-container container">
        <div class="row content-container">
            <div class="col-12">
                <h1 class="header">{{ config('app.name') }}</h1>
                <p class="paragraph">This awesome blog has many articles, click the button below to see them</p>
                <br>
                <a href="/blog" class="btn btn-outline-primary show-btn">Show blog</a>            
            </div>

        </div>
    
    </div>

 
@endsection