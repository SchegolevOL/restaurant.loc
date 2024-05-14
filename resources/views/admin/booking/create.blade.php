@extends('layouts.layout')
@section('content')
    <div class="container">
        @include('components.messages')
        <form action="{{route('bookings.store')}}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="card-body">

                <div class="form-group">
                    <label>Name</label>
                    <input name="name" type="text" class="form-control" placeholder="Enter name">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input name="email" type="email" class="form-control" id="exampleInputEmail1"
                           placeholder="Enter email">
                </div>
                <div class="form-group">
                    <label>Special request</label>
                    <textarea name="special_request" class="form-control" rows="5"
                              placeholder="Enter Special request"></textarea>
                </div>

                <div class="form-group">
                    <label>Number of persons</label>
                    <input name="number_of_persons" type="text" class="form-control"
                           placeholder="Enter number of persons">
                </div>

                <div class="form-group">
                    <label>Date and time:</label>
                    <div class="input-group date" id="reservationdatetime" data-target-input="nearest">
                        <input name="date_time" type="text" class="form-control datetimepicker-input" data-target="#reservationdatetime">
                        <div class="input-group-append" data-target="#reservationdatetime" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Create</button>
            </div>
        </form>




    </div>

@endsection

