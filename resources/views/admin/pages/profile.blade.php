@extends('admin.layouts.master')
@section('content')
<div style="border: 2px double green;padding:20px">
    <div class="row">

        <div class="col-md-4">
            @if($admin->image)
            <img src="images/{{$admin->image}}" alt="">
        @else
            <img src="{{ url('images/noimage.png') }}" alt="userimage">
        @endif
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                <div class="card-title">Admin Profile</div>
                </div>
                <div class="card-body">
    
                    <table class="table table-bordered">
                        <tr>
                            <td>Name</td>
                        <td>{{$admin->firstname}} {{$admin->lastname}}</td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>{{$admin->email}}</td>
                        </tr>
                        <tr>
                            <td>Phone</td>
                            <td>{{$admin->phone}}</td>
                        </tr>
    
                    </table>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection