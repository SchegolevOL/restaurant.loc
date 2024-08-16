@extends('admin.layouts.layout')
@section('content')
    <div class="card-body table-responsive p-0">
        <table class="table table-head-fixed text-nowrap">
            <thead>
            <tr>
                <th>#</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Patronymic</th>
                <th>Button</th>
            </tr>
            </thead>
            <tbody>
            @php $i =1; @endphp
            @foreach($chiefs as $chief)
                <tr>
                    <td>{{$i++}}</td>
                    <td>{{$chief->first_name}}</td>
                    <td>{{$chief->last_name}}</td>
                    <td>{{$chief->patronymic}}</td>

                    <td class="project-actions text-right">
                        <a class="btn btn-primary btn-sm float-left" href="{{route('chiefs.show',['chief'=>$chief->slug])}}">
                            <i class="fas fa-folder">
                            </i>
                            View
                        </a>
                        <a class="btn btn-info btn-sm float-left" href="{{route('chiefs.edit',['chief'=>$chief->slug])}}">
                            <i class="fas fa-pencil-alt">
                            </i>
                            Edit
                        </a>
                        <form
                            action="{{ route('chiefs.destroy', ['chief' => $chief->slug]) }}"
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
        <div class="col-md-12">{{$chiefs->links()}}</div>
    </div>

@endsection
