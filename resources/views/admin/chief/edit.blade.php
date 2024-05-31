@extends('admin.layouts.layout')
@section('content')
    <div class="container">
        @include('components.messages')
        <form action="{{route('chiefs.update')}}" method="post" enctype="multipart/form-data">
            @csrf
@method('put')
            <div class="card-body">

                <div class="form-group">
                    <label>First name</label>
                    <input name="first_name" type="text" class="form-control" placeholder="Enter first name" value="{{$chief->first_name}}">
                </div>
                <div class="form-group">
                    <label>Last name</label>
                    <input name="last_name" type="text" class="form-control" placeholder="Enter last name">
                </div>
                <div class="form-group">
                    <label for="">Patronymic</label>
                    <input name="patronymic" type="text" class="form-control" placeholder="Enter patronymic">
                </div>

                <label>Date of birth</label>
                <div class="input-group">

                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                    </div>
                    <input name="date_of_birth" type="text" class="form-control" data-inputmask-alias="datetime"
                           data-inputmask-inputformat="yyyy-mm-dd" data-mask="" inputmode="numeric">
                </div>


                <div class="form-group">
                    <label>Phone number</label>

                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-phone"></i></span>
                        </div>
                        <input name="phone" type="text" class="form-control"
                               data-inputmask="'mask': ['999-999-9999 [x99999]', '+099 99 99 9999[9]-9999']"
                               data-mask="" inputmode="text">
                    </div>
                    <!-- /.input group -->
                </div>
                <div class="form-group">
                    <label>Instagram </label>
                    <input name="instagram" type="text" class="form-control" placeholder="Enter instagram ">
                </div>
                <div class="form-group">
                    <label>Facebook</label>
                    <input name="facebook" type="text" class="form-control" placeholder="Enter facebook">
                </div>
                <div class="form-group">
                    <label>Twitter</label>
                    <input name="twitter" type="text" class="form-control" placeholder="Enter twitter ">
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input name="email" type="email" class="form-control" id="exampleInputEmail1"
                           placeholder="Enter email">
                </div>
                <div class="form-group">
                    <label for="exampleInputFile">Photo</label>
                    <div class="input-group">
                        <div class="custom-file">
                            <input name="photo" type="file" class="custom-file-input" id="exampleInputFile">
                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                        </div>
                        <div class="input-group-append">
                            <span class="input-group-text">Upload</span>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label>Designation</label>
                    <select name="designation" class="form-control">
                        @foreach($designations as $designation)
                            <option value="{{$designation->id}}">{{$designation->title}}</option>
                        @endforeach

                    </select>
                </div>
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Create</button>
            </div>
        </form>

    </div>

@endsection
