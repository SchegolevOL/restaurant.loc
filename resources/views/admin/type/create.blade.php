@extends('layouts.layout')
@section('content')
    <div class="container">
        @include('components.messages')
        <form action="{{route('types.store')}}" method="post">
            @csrf

            <div class="card-body">

                <div class="form-group">
                    <label>Type</label>
                    <input name="title" type="text" class="form-control" placeholder="Enter type">
                </div>


                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Create</button>
                </div>
            </div>
        </form>

    </div>

@endsection
