@extends('admin.layouts.layout')
@section('content')
    <div class="card-body table-responsive p-0">
        <table class="table table-head-fixed text-nowrap">
            <thead>
            <tr>
                <th>#</th>
                <th>Title</th>
                <th>Price</th>
                <th>Button</th>
            </tr>
            </thead>
            <tbody>
            @php $i=1; @endphp
            @foreach($menus as $menu)
                <tr>
                    <td>{{$i++}}</td>
                    <td>{{$menu->title}}</td>
                    <td>{{$menu->price}}</td>

                    <td class="project-actions text-right">
                        <a class="btn btn-primary btn-sm float-left"  href="{{route('menus.show',['menu'=>$menu->slug])}}">
                            <i class="fas fa-folder">
                            </i>
                            View
                        </a>
                        <a class="btn btn-info btn-sm float-left" href="{{route('menus.edit',['menu'=>$menu->slug])}}">
                            <i class="fas fa-pencil-alt">
                            </i>
                            Edit
                        </a>
                        <form
                            action="{{ route('menus.destroy', ['menu' => $menu->slug]) }}"
                            method="post" class="float-left">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm"
                                    onclick="return confirm('Confirm the deletion')">
                                <i
                                    class="fas fa-trash-alt"></i>Delete
                            </button>
                        </form>

                    </td>
                </tr>
            @endforeach

            </tbody>
        </table>
        <div class="col-md-12">{{$menus->links()}}</div>
    </div>

@endsection
