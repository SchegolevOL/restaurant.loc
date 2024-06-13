@extends('admin.layouts.layout')
@section('content')
    <div class="card card-solid">
        <div class="card-body">
            <div class="row">
                <div class="col-12 col-sm-6">
                    <h3 class="d-inline-block d-sm-none">LOWA Men’s Renegade GTX Mid Hiking Boots Review</h3>
                    <div class="col-12 text-center">
                        <img src="{{asset($chief->getImage())}}" class="w-50" alt="butterfly">
                    </div>

                </div>
                <div class="col-12 col-sm-6">
                    <h3 class="my-3">{{$chief->first_name}} {{$chief->last_name}} {{$chief->patronymic}}</h3>
                    <p>{{$designation->title}}</p>

                    <hr>
                    <ul class="ml-4 mb-0 fa-ul text-muted">
                        <li class=""><span class="fa-li"><i class="fas fa-lg fa-building"></i></span> Address: {{$chief->address}}</li>
                        <li class=""><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span> Phone #: +7-{{$chief->phone}} </li>
                        <li class=""><span class="fa-li"><i class="far fa-envelope"></i></span> Email #: {{$chief->email}}</li>
                        <li class=""><span class="fa-li"><i class="fas fa-calendar-day"></i></span> Date of birth #: {{$chief->date_of_birth}}</li>
                    </ul>



                    <div class="bg-gray py-2 px-3 mt-4">
                        <h2 class="mb-0">
                            Salary
                        </h2>
                        <h4 class="mt-0">
                            <small>Ex Tax: {{$chief->salary}} $</small>
                        </h4>
                    </div>



                    <div class="mt-4 product-share">
                        <a href="#" class="text-gray">
                            <i class="fab fa-facebook-square fa-2x"></i>
                        </a>
                        <a href="#" class="text-gray">
                            <i class="fab fa-twitter-square fa-2x"></i>
                        </a>
                        <a href="#" class="text-gray">
                            <i class="fab fa-instagram-square fa-2x"></i>
                        </a>

                    </div>

                </div>
            </div>
            <div class="row mt-4">
                <nav class="w-100">
                    <div class="nav nav-tabs" id="product-tab" role="tablist">
                        <a class="nav-item nav-link active" id="product-desc-tab" data-toggle="tab" href="#product-desc" role="tab" aria-controls="product-desc" aria-selected="true">Description</a>
                        <a class="nav-item nav-link" id="product-comments-tab" data-toggle="tab" href="#product-comments" role="tab" aria-controls="product-comments" aria-selected="false">Comments</a>
                        <a class="nav-item nav-link" id="product-rating-tab" data-toggle="tab" href="#product-rating" role="tab" aria-controls="product-rating" aria-selected="false">Rating</a>
                    </div>
                </nav>
                <div class="tab-content p-3" id="nav-tabContent">
                    <div class="tab-pane fade active show" id="product-desc" role="tabpanel" aria-labelledby="product-desc-tab">{{$chief->description}}</div>
                    <div class="tab-pane fade" id="product-comments" role="tabpanel" aria-labelledby="product-comments-tab"> Comments </div>
                    <div class="tab-pane fade" id="product-rating" role="tabpanel" aria-labelledby="product-rating-tab">Rating</div>
                </div>
            </div>
        </div>
        <!-- /.card-body -->
    </div>
@endsection
