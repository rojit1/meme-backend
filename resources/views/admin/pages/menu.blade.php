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
                <a href="{{route('menu.destroy',$menu->id)}}"><button class="btn btn-outline-danger">Delete</button></a>
            </td>
            </tr>
        @endforeach

    </table>




    <div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Create Menu Item</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              ...
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <a href="{{route('menu.create')}}"><button type="button" class="btn btn-outline-primary">Create</button></a>
            </div>
          </div>
        </div>
      </div>

   

@endsection