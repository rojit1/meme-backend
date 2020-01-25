@extends('layouts.app')
@section('content')

    <div class="row">
        <div class="col-md-6 m-auto">
            <form action="{{ route('user.updateProfile',$user->id) }}" method="POST">
                @csrf
                {{ method_field('PUT') }}
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Edit Profile</div>
                </div>
                <div class="card-body">

                    <div class="form-group">
                        <label>Phone</label>
                        <input type="text" name="phone" value="{{$user->phone}}" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>Country</label>
                        <input type="text" name="country" value="{{$user->country}}" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>Picture</label> <br>
                        <input type="file" name="image">
                    </div>

                </div>
                <div class="card-footer">
                    <input type="submit" value="Submit" class="btn btn-outline-success">
                </div>
            </div>
            </form>
        </div>
    </div>

@endsection 