@extends('admin.layouts.layout')
@section('content')
    <div class="card card-solid">
        <div class="card-body">
            <div class="row">
                <div class="col-12 col-sm-6">
                    <h3 class="d-inline-block d-sm-none">LOWA Men’s Renegade GTX Mid Hiking Boots Review</h3>
                    <div class="col-12 text-center">
                        <img src="{{asset($menu->getImage())}}" class="w-50" alt="butterfly">
                    </div>

                </div>
                <div class="col-12 col-sm-6">
                    <h3 class="my-3">{{$menu->title}}</h3>
                    <p>{{$menu->description}}</p>
                    <h3>Menu Type</h3>
                    @foreach($menu->types as $type)


                            {{$type->title}}


                    @endforeach
                </div>
            </div>

        </div>

    </div>
@endsection

