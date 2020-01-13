@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12"> <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Hello, {{Auth::user()->firstname}}</div>
        
                        <div class="card-body">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif                               
                            

                            <form action=" {{route('posts.store')}} " method="POST" enctype="multipart/form-data">
                                @csrf
                                <fieldset id="fs">

                                    <div class="form-group">
                                        <textarea name="title" id="" class="form-control" rows="3" placeholder="Share something amazing"></textarea> 
                                        <span style="color:red" class="help-block">{{$errors->first('title')}}</span>
                                    </div>

       
                                    <div class="form-group">
                                        <input type="file" name="image"> 
                                        <span>{{$errors->first('image')}}</span>
                                    </div>

                                    <label>Add category <sup>max 3</sup></label> <br>
                                    <input type="text" class="form-control" style="width:50%;display:inline-block" name="category[]"> <button id="addCategoryBtn" type="button" onclick="addCategory()" class="btn btn-success btn-md" style="display: inline-block"> <i class="fa fa-plus"></i> </button> <br>
                                    
                                </fieldset> <br>
                                <input class="btn btn-outline-primary" type="submit" value="Post">
                            </form>

                        </div>
                    </div>
                
                
                        @if(count($posts)>0)

                        @foreach($posts as $post)

                        <div class="card mt-3">
                            <div class="card-header">
                                <div class="card-title">{{$post->user->firstname}}</div>
                            </div>
                            <a href="{{ route('posts.show',$post->id) }}">
                                <div class="card-body">
                                    <p>{{$post->title}}</p>
                                    @if($post->image)
                                        <img src="storage/memes/{{$post->image}}" width="100%" height="400px" alt="image">
                                    
                                    @endif
                                </div>
                            </a>
                            <div class="card-footer">
                                <small>{{$post->created_at->diffForHumans()}}</small>
                            </div>
                        </div>

                        @endforeach
                        <br>
                        {{ $posts->links() }}

                        @else
                            <p>No posts found</p>
                        @endif
                   

            </div>

            {{-- next row --}}

            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                            Following Users
                    </div>
                        <hr>
                        <div class="row">
                            
                                <div class="col-md-8">
                                    <form action="">
                                    <input type="text" name="" class="form-control m-2" style="border-width: 0 0 1px">
                                </div>
                                <div class="col-md-4">
                                    <input class="btn btn-outline-info" type="submit" value="Search" id="">
                                    </form>
                                </div>
                                                      
                        </div>
                    <div class="card-body">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">Cras justo odio</li>
                            <li class="list-group-item">Dapibus ac facilisis in</li>
                            <li class="list-group-item">Vestibulum at eros</li>
                          </ul>
                    </div>
                </div>
                {{-- Next card --}}
                <div class="card mt-3">
                    <div class="card-header">
                            Something else
                    </div>
                        <hr>
                        <div class="row">
                            
                                <div class="col-md-8">
                                    <form action="">
                                    <input type="text" name="" class="form-control m-2" style="border-width: 0 0 1px">
                                </div>
                                <div class="col-md-4">
                                    <input class="btn btn-outline-info" type="submit" value="Search" id="">
                                    </form>
                                </div>
                                                      
                        </div>
                    <div class="card-body">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">Cras justo odio</li>
                            <li class="list-group-item">Dapibus ac facilisis in</li>
                            <li class="list-group-item">Vestibulum at eros</li>
                          </ul>
                    </div>
                </div>

            </div>
        </div>
        </div>
    </div>
</div>
@endsection

<script type="text/javascript">

    let i = 1

    let addCategory = function(){    
        if( i <= 2 ){
            let newTextField = document.createElement('input')
            newTextField.setAttribute('type','text')
            newTextField.setAttribute('class','form-control')
            newTextField.setAttribute('name','category[]')
            newTextField.setAttribute('style','width:50%;margin-top:3px')


            let btn = document.getElementById('addCategoryBtn');
            i++

            frm = document.getElementById('fs').appendChild(newTextField)

        }else{
            document.getElementById('addCategoryBtn').disabled = true;
        }

    }
    

</script>

