@extends('layouts.app')

@section('content')

<div class="container">
    <div style="border:2px solid black;padding:20px">
    <div class="row justify-content-center">
    <div class="col-md-4">
        @if($user->image)
            <img src="images/{{$user->image}}" alt="">
        @else
            <img src="{{ url('images/noimage.png') }}" alt="userimage">
        @endif
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
                
            </div>
        </div>
        
    </div>
    </div>
    </div>
</div>
@endsection