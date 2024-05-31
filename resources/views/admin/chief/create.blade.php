@extends('admin.layouts.layout')
@section('content')
    <div class="container">
        @include('components.messages')
        <form action="{{route('chiefs.store')}}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="card-body">

                <div class="container text-center">
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label>First name</label>
                                <input name="first_name" type="text" class="form-control"
                                       placeholder="Enter first name">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label>Last name</label>
                                <input name="last_name" type="text" class="form-control" placeholder="Enter last name">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="">Patronymic</label>
                                <input name="patronymic" type="text" class="form-control"
                                       placeholder="Enter patronymic">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container text-center">
                    <div class="row">
                        <div class="col">
                            <label>Date of birth</label>
                            <div class="input-group">

                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                </div>
                                <input name="date_of_birth" type="text" class="form-control"
                                       data-inputmask-alias="datetime"
                                       data-inputmask-inputformat="yyyy-mm-dd" data-mask="" inputmode="numeric">
                            </div>
                        </div>
                        <div class="col">
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
                        </div>
                        <div class="col">

                            <div class="form-group">
                                <label>Address</label>

                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-lg fa-building"></i></span>
                                    </div>
                                    <input name="address" type="text" class="form-control" placeholder="Enter address">
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="container text-center">
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label>Instagram</label>

                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i
                                                class="fab fa-instagram-square fa-1x"></i></span>
                                    </div>
                                    <input name="instagram" type="text" class="form-control" placeholder="Enter instagram">
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label>Facebook</label>

                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i
                                                class="fab fa-facebook-square fa-1x"></i></span>
                                    </div>
                                    <input name="facebook" type="text" class="form-control" placeholder="Enter facebook">
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label>Twitter</label>

                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i
                                                class="fab fa-twitter-square fa-1x"></i></span>
                                    </div>
                                    <input name="twitter" type="text" class="form-control" placeholder="Enter twitter">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container text-center">
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email address</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i
                                        class="fab far fa-envelope fa-1x"></i></span>
                                <input name="email" type="email" class="form-control" id="exampleInputEmail1"
                                       placeholder="Enter email">
                                </div>
                            </div>
                        </div>
                        <div class="col">
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
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label>Designation</label>
                                <select name="designation" class="form-control">
                                    @foreach($designations as $designation)
                                        <option value="{{$designation->id}}">{{$designation->title}}</option>
                                    @endforeach

                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container text-center">
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label>Salary</label>

                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">$</span>
                                    </div>
                                    <input name="salary" type="number" class="form-control" placeholder="Enter salary">
                                </div>

                            </div>
                        </div>
                        <div class="col">

                        </div>
                        <div class="col">

                        </div>
                    </div>
                </div>


                <div class="form-group">
                    <label>Description</label>
                    <textarea name="description" class="form-control" rows="5"
                              placeholder="Enter Description"></textarea>
                </div>



            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Create</button>
            </div>
        </form>

    </div>

@endsection
