@extends('admin.layouts.layout')
@section('content')
    <div class="card-body table-responsive p-0">
        <table class="table table-head-fixed text-nowrap">
            <thead>
            <tr>
                <th>#</th>
                <th>Title</th>
                <th>Image</th>
                <th>Patronymic</th>
                <th>Button</th>
            </tr>
            </thead>
            <tbody>
            @foreach($menus as $menu)
                <tr>
                    <td>183</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>
                    <td class="project-actions text-right">
                        <a class="btn btn-primary btn-sm" href="{{route('chiefs.show',['menu'=>$menu->slug])}}">
                            <i class="fas fa-folder">
                            </i>
                            View
                        </a>
                        <a class="btn btn-info btn-sm" href="{{route('chiefs.edit',['menu'=>$menu->slug])}}">
                            <i class="fas fa-pencil-alt">
                            </i>
                            Edit
                        </a>
                        <a class="btn btn-danger btn-sm" href="#">
                            <i class="fas fa-trash">
                            </i>
                            Delete
                        </a>

                    </td>
                </tr>
            @endforeach

            </tbody>
        </table>
        <div class="col-md-12">{{$menus->links()}}</div>
    </div>

@endsection
