@extends('layouts.layout')
@section('content')
    <div class="container">
        @include('components.messages')
        <form action="{{route('menus.store')}}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="card-body">

                <div class="form-group">
                    <label>Title</label>
                    <input name="title" type="text" class="form-control" placeholder="Enter title">
                </div>

                <div class="form-group">
                    <label>Description</label>
                    <textarea name="description" class="form-control" rows="5"
                              placeholder="Enter Description"></textarea>
                </div>

                <div class="form-group">
                    <label>Price </label>
                    <input name="price" type="text" class="form-control" placeholder="Enter price">
                </div>

                <div class="col-sm-6">
                    <!-- Select multiple-->
                    <div class="form-group">
                        <label>Select Multiple</label>
                        <select name="types[]" multiple="" class="form-control">
                            @foreach($types as $type)
                                <option value="{{$type->id}}" data-select2-id="{{$type->id}}">{{$type->title}}</option>

                            @endforeach
                        </select>
                    </div>
                </div>




                <div class="form-group">
                    <label for="exampleInputFile">Photo</label>
                    <div class="input-group">
                        <div class="custom-file">
                            <input name="image" type="file" class="custom-file-input" id="exampleInputFile">
                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                        </div>
                        <div class="input-group-append">
                            <span class="input-group-text">Upload</span>
                        </div>
                    </div>

                </div>

            </div>
            <!-- /.card-body -->
    </div>
    <div class="card-footer">
        <button type="submit" class="btn btn-primary">Create</button>
    </div>
    </form>

    </div>

@endsection
