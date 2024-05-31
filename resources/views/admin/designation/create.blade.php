@extends('admin.layouts.layout')
@section('content')
    <div class="container">
        @include('components.messages')
        <form action="{{route('designations.store')}}" method="post">
            @csrf

            <div class="card-body">

                <div class="form-group">
                    <label>Designation</label>
                    <input name="title" type="text" class="form-control" placeholder="Enter designation">
                </div>


            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Create</button>
            </div>
            </div>
        </form>

    </div>

@endsection

