@extends('admin.layouts.master')

@section('content')
    <div class="create mb-2">
    <button data-backdrop="static" data-keyboard="false"
     data-toggle="modal" data-target="#createModal" class="btn btn-outline-success">Create Menu</button>
    </div>
    <table class="table table-hover table-bordered table-striped">
        <tr style="border:2px solid blue;">
            <td>#</td>
            <td>Fieldname</td>
            <td>url</td>
            <td>icon</td>
            <td>Action</td>

        </tr>
        @php($i = 0)
        @foreach ($menus as $menu)
            <tr>
            <td>{{++$i}}</td>
            <td>{{$menu->fieldname}}</td>
            <td>{{$menu->url}}</td>
            <td>{{$menu->icon}}</td>
            <td>
                <a href="{{route('menu.edit',$menu->id)}}"><button class="btn btn-outline-success">Edit</button></a>
                  
                <form action="{{route('menu.destroy',$menu->id)}}" method="POST" style="display:inline-block">
                  @csrf
                  {{method_field('DELETE')}}
                    <button onclick="return confirm('Are you sure to delete?')" style="display:inline-block" type="submit" class="btn btn-outline-danger">Delete</button>
                </form>
            </td>
            </tr>
        @endforeach

    </table>



{{-- Create form modal --}}

    <div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <form method="POST" action="{{route('menu.store')}}">
              @csrf
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Create Menu Item</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              
              <div class="form-group">
                <label for="field">Fieldname</label>
                <input type="text" name="fieldname" id="field" class="form-control">
              </div>

              <div class="form-group">
                <label for="url">url</label>
                <input type="text" name="url" id="url" class="form-control">
              </div>

              <div class="form-group">
                <label for="ic">icon</label>
                <input type="text" name="icon" id="ic" class="form-control">
              </div>

            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <input type="submit" class="btn btn-outline-primary" value="Create">
            </div>
          </form>
          </div>
        </div>
      </div>

   

@endsection