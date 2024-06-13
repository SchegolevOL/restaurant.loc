@extends('admin.layouts.layout')
@section('content')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <div class="container">
        @include('components.messages')
        <form action="{{route('chiefs.store')}}" method="post" enctype="multipart/form-data" id="form1" runat="server">
            @csrf

            <div class="card-body">

                <div class="container text-center">
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label>First name</label>
                                <input name="first_name" type="text" class="form-control"
                                       placeholder="Enter first name"
                                value="{{old('first_name')}}">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label>Last name</label>
                                <input name="last_name" type="text" class="form-control" placeholder="Enter last name" value="{{old('last_name')}}">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="">Patronymic</label>
                                <input name="patronymic" type="text" class="form-control"
                                       placeholder="Enter patronymic" value="{{old('patronymic')}}">
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
                                       data-inputmask-inputformat="yyyy-mm-dd" data-mask="" inputmode="numeric" value="{{old('date_of_birth')}}">
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
                                           data-mask="" inputmode="text" value="{{old('phone')}}">
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
                                    <input name="address" type="text" class="form-control" placeholder="Enter address" value="{{old('address')}}">
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
                                    <input name="instagram" type="text" class="form-control" placeholder="Enter instagram" value="{{old('instagram')}}">
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
                                    <input name="facebook" type="text" class="form-control" placeholder="Enter facebook" value="{{old('facebook')}}">
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
                                    <input name="twitter" type="text" class="form-control" placeholder="Enter twitter" value="{{old('twitter')}}">
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
                                       placeholder="Enter email" value="{{old('email')}}">
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="exampleInputFile">Photo</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input name="image" type="file" class="custom-file-input" id="imgInp" value="{{old('photo')}}">
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
                                <select name="designation_id" class="form-control" value="{{old('designation_id')}}">
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
                            <img id="blah" src="/public/Front/img/add_photo-1024.webp" alt="your image"  class="img-thumbnail">
                        </div>
                        <div class="col">

                        </div>
                    </div>
                </div>


                <div class="form-group">
                    <label>Description</label>
                    <textarea name="description" class="form-control" rows="5"
                              placeholder="Enter Description" value="{{old('description')}}"></textarea>
                </div>



            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Create</button>
            </div>
        </form>

    </div>
<script>
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('#blah').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#imgInp").change(function() {
        readURL(this);
    });
</script>
@endsection
