@extends('admin.layouts.layout')
@section('content')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <div class="container">
        @include('components.messages')
        <form action="{{route('menus.update', ['menu' => $menu->slug])}}" method="post" enctype="multipart/form-data" id="form1" runat="server">
            @csrf
            @method('put')
            <div class="card-body">

                <div class="form-group">
                    <label>Title</label>
                    <input name="title" type="text" class="form-control" placeholder="Enter title" value="{{$menu->title}}">
                </div>

                <div class="form-group">
                    <label>Description</label>
                    <textarea name="description" class="form-control" rows="5"
                              placeholder="Enter Description">{{$menu->description}}</textarea>
                </div>

                <div class="form-group">
                    <label>Price </label>
                    <input name="price" type="text" class="form-control" placeholder="Enter price" value="{{$menu->price}}">
                </div>


                <!-- Select multiple-->
                <div class="form-group">
                    <label>Select Multiple</label>
                    <select name="types[]" multiple="" class="form-control">
                        @foreach($types as $type)
                            <option @if(in_array($type->id, $types_menu)) selected @endif value="{{$type->id}}" data-select2-id="{{$type->id}}">{{$type->title}}</option>

                        @endforeach
                    </select>
                </div>
                <div class="container text-center">
                    <div class="row">
                        <div class="col">
                            <div class="form-group">

                                <label for="exampleInputFile">Photo</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input name="old_image" type="hidden" value="{{$menu->image}}">
                                        <input name="image" type="file" class="custom-file-input" id="imgInp">
                                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                    </div>
                                    <div class="input-group-append">
                                        <span class="input-group-text">Upload</span>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="col">
                            <img id="blah" src="{{$menu->getImage()}}" alt="your image"  class="img-thumbnail w-25">
                        </div>

                    </div>
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
