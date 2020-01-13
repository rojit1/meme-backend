@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-md-8 m-auto">
            <div class="card">
                <div class="card-header">
                    <p>Edit Post</p>
                </div>
                <form action="{{route('posts.update',$post->id)}}" method="POST" enctype="multipart/form-data">
                   @csrf   
                   {{ method_field('PUT') }} 
                    <div class="card-body">
                        <fieldset id="fs">
                        <div class="form-group">
                            <textarea name="title" class="form-control" rows="3">{{$post->title}}</textarea>
                            <span style="color:red">{{$errors->first('title')}}</span>

                        </div>
                        
                        <div class="form-group">
                            
                            <img style="border:2px solid lightgrey" src="/storage/memes/{{$post->image}}" width="100%" height="400px"> 
                            
                            <br><br>
                            <input type="file" name="image">
                            <span>{{$errors->first('image')}}</span>
                        </div>
                        
                            @php($cat = explode(',',$post->category))
                            @foreach($cat as $c)
                                @if($c)
                                    <input type="text" name="category[]" class="form-control m-1" style="width:50%" value="{{$c}}"> 
                                @endif
                            @endforeach
                        </fieldset>
                            
                            @if(count($cat)>=6)
                            @else
                                <button onclick="addCategory()" type="button" class="btn btn-success"><span class="fa fa-plus"></span></button>
                            @endif
                        
                    </div>
                    <div class="card-footer">
                        <input type="submit" value="Update" class="btn btn-primary">
                    </div>
                </form>
                
            </div>
        </div>
    </div>

@stop

<script type="text/javascript">
    let i = 0;
    function addCategory(){
        
        if(i < 3){
        fld = document.createElement('input');
        fld.setAttribute('type','text')
        fld.setAttribute('class','form-control m-1')
        fld.setAttribute('name','category[]')
        fld.setAttribute('style','width:50%')
        document.getElementById('fs').appendChild(fld);
        }
        ++i;
    }

</script>

