@extends('layouts.app')

@section('content')

<div class="container">
    <div style="border:2px solid lightblue;padding:20px">
    <div class="row justify-content-center">
    <div class="col-md-4">
            <img src="/storage/profile/{{$user->image}}" width="100%" style="border-radius: 20px;box-shadow: 2px 2px 2px orange">
    </div>

    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
            <div class="card-title">User Profile</div>
            </div>
            <div class="card-body">

                <table class="table table-bordered">
                    <tr>
                        <td>Name</td>
                    <td>{{$user->firstname}} {{$user->lastname}}</td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td>{{$user->email}}</td>
                    </tr>
                    <tr>
                        <td>Phone</td>
                        <td>{{$user->phone}}</td>
                    </tr>

                    <tr>
                        <td>Country</td>
                        <td>{{$user->country}}</td>
                    </tr>
                </table>
                @if(Auth::user()->id == $user->id)
                <button class="btn btn-sm btn-outline-success"><a href="{{ route('user.editprofile',$user->id) }}">Update Profile</a></button>
                @endif

                
                
            </div>
        </div>
        
    </div>
    </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-8" style="margin:auto">

            @if(count($posts)>0)
                @foreach($posts as $post)
                    <div class="card mt-2 p-3">
                        
                            <div class="card-header">
                                <img src="/storage/profile/{{$user->image}}" width="50px">
                                <p style="display:inline-block">{{Auth::user()->firstname}} {{Auth::user()->lastname}}</p>
                                <span class="float-right"><a href="{{route('posts.show',$post->id)}}"><i style="font-size: 25px" class="fa fa-eye"></i></a></span>
                            </div>
                            <div class="card-body">
                                <p>{{$post->title}}</p> <br>
                                    @if($post->image)
                                        <img style="border:2px solid lightblue" src="/storage/memes/{{$post->image}}" class="img-responsive" alt="image" width="100%">
                                    @endif

                                    @if($post->category)
                                        @php($cat = explode(',',$post->category))
                                        @foreach($cat as $c)
                                            @if($c)
                                                <li style="list-style-type: none"> # {{$c}}</li>
                                            @endif
                                        @endforeach
                                    @endif

                                    
                            </div>
                            <div class="card-footer">
                                @if(Auth::user()->id == $user->id)
                                <a href="{{route('posts.edit',$post->id)}}"><button class="btn btn-primary">Edit</button></a>
                                <form action="{{route('posts.destroy',$post->id) }}" method="POST" style="display: inline-block">
                                    @csrf
                                    {{ method_field('DELETE') }} 
                                <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                                @endif
                            </div>
                        
                    </div>
                @endforeach
            @else 
                <p>No posts yet</p>
            @endif

        </div>
    </div>
</div>
@endsection