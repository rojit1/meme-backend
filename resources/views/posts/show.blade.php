@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-md-6 m-auto">

            <div class="card">
                <div class="card-header">
                    <div class="card-title"><a style="text-decoration: none" href="{{ route('user.profile',$post->user->id) }}">{{$post->user->firstname}} {{$post->user->lastname}}</a></div>
                </div>
                <div class="card-body">
                    <p>{{$post->title}}</p>
                    @if($post->image)
                    <img style="border:2px solid lightgrey" src="/storage/memes/{{$post->image}}" class="img-responsive" width="100%">
                    @endif
                    <small mt-2>{{$post->created_at->diffForHumans()}}</small>
                </div>
                <div class="card-footer">
                    <div class="likes">
                        <p style="display: inline-block">22 likes</p> &nbsp; <p style="display: inline-block"> {{count($post->comments)}} Comments</p>
                    </div>
                  <form action="{{route('comments.add',$post->id)}}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-8">
                            <input type="text" name="body" class="form-control" placeholder="Add a comment">
                        </div>
                        <div class="col-md-4">
                            <input type="submit" value="Comment" class="btn btn-primary">
                        </div>
                    </div>
                    </form>

                    <hr>

                    <ul class="list-group">

                    @if(count($comment)>0)
                        @foreach($comment as $cmnt)
                            @if(Auth::user()->id == $cmnt->user->id)
                            
                            <li class="list-group-item active mt-1 ml-5" style="border-radius:20px">
                                <p>You</p>
                                {{$cmnt->body}} 
                                <small class="float-right">{{$cmnt->created_at->diffForHumans()}}</small> 
                            </li>
                            
                            @else
                            <li class="list-group-item mt-1 p-1 mr-5">
                                <p> <img src="" alt=""> {{$cmnt->user->firstname}} {{$cmnt->user->lastname}} </p>
                                {{$cmnt->body}} 
                                <small class="float-right">{{$cmnt->created_at->diffForHumans()}}</small> 
                            </li>
                            @endif
                        @endforeach
                    @else
                        <p>No comments</p>
                    @endif

                    </ul>

                </div>
            </div>

        </div>
    </div>

@stop