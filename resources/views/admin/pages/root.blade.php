@extends('admin.layouts.master')

@section('content')

        <h1 class="font-weight-light text-center text-lg-left mt-4 mb-0">Choose Wallpaper</h1>

        <hr class="mt-2 mb-5">
      
        <div class="row text-center text-lg-left">
            
            @foreach($wp as $w)
            <div class="col-lg-3 col-md-4 col-6">
                <a href="#" class="d-block mb-4 h-100">
                    <img class="img-fluid img-thumbnail" src="/images/{{$w->image}}" alt="">
                    
                </a>
                @if($w->active==1)
                <a href=""><button class="btn btn-success">Activated</button></a>
                @else 
                    <a href="{{ route('root.show',$w->id) }}"><button class="btn btn-outline-secondary">Activate</button></a>
                @endif
            </div>
          @endforeach
           
        </div>


@stop