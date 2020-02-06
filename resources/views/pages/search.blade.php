@extends('layouts.app')

@section('content')

    <div class="container m-auto">
        @if(count($posts)>0)
            @foreach($posts as $post)
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">{{$post->title}}</div>
                    </div>
                    <div class="card-body">
                        <a href="{{ route('posts.show',$post->id) }}">view real post</a>
                    </div>
                    
                </div>
                
            @endforeach
        @else 
            <h2>No posts found</h2>
        @endif
    </div>

@stop