@extends('admin.layouts.master')

@section('content')
    
    <table class="table table-hover table-bordered table-striped">
        <tr style="border:2px solid blue;background-color:darkolivegreen;color:white">
            <td>#</td>
            <td>Firstname</td>
            <td>Lastname</td>
            <td>Email</td>
            <td>Phone</td>
            <td>Image</td>
            <td>Action</td>

        </tr>
        @php($i = 0)
        @foreach ($users as $user)
            <tr>
            <td>{{++$i}}</td>
            <td>{{$user->firstname}}</td>
            <td>{{$user->lastname}}</td>
            <td>{{$user->email}}</td>
            <td>{{$user->phone?? 'Null'}}</td>
            <td>{{$user->image?? 'No Image'}}</td>

            <td>
                <a href=""><button class="btn btn-outline-success">Edit</button></a>
                <a href=""><button class="btn btn-outline-danger">Delete</button></a>
            </td>
            </tr>
        @endforeach
        
    </table>
    {{ $users->links() }}

   

@endsection