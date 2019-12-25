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
                            

                            <form action="">
                                <textarea name="" id="" class="form-control" rows="3" placeholder="Share something intresting"></textarea>
                                <br>
                                <input type="file" name="" id="" class="form-control-file"> <br>
                                <input class="btn btn-outline-primary" type="submit" value="Post" id="">
                            </form>

                        </div>
                    </div>
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
                                    <input type="text" name="" class="form-control" style="border-width: 0 0 1px">
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
                                    <input type="text" name="" class="form-control" style="border-width: 0 0 1px">
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
