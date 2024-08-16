@extends('front.layouts.layout')
@section('nav-bar-content')
    <div class="container-xxl py-5 bg-dark hero-header mb-5">
        <div class="container text-center my-5 pt-5 pb-4">
            <h1 class="display-3 text-white mb-3 animated slideInDown">About Us</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center text-uppercase">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Pages</a></li>
                    <li class="breadcrumb-item text-white active" aria-current="page">About</li>
                </ol>
            </nav>
        </div>
    </div>
@endsection
@section('content')

    <div class="container text-center">
        <div class="row">
            <div class="col">
                <div class="col-12">
                    <div class="wow fadeInUp" data-wow-delay="0.2s">
                        <div class="card card-primary card-outline">
                            <div class="card-body box-profile">
                                <div class="text-center">
                                    <img class="profile-user-img img-fluid img-circle"
                                         src="{{auth()->user()->getImage()}}" alt="User profile picture" width="150"
                                         height="150">
                                </div>

                                <h3 class="profile-username text-center">{{auth()->user()->name}}</h3>

                                <p class="text-muted text-center">User data</p>

                                <ul class="list-group list-group-unbordered mb-3">
                                    <li class="list-group-item">
                                        <b>Email: </b> <a class="float-right">{{auth()->user()->email}}</a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>The date the profile was created: </b> <a
                                            class="float-right">{{auth()->user()->created_at}}</a>
                                    </li>
                                    <li class="list-group-item">
                                        @if(auth()->user()->email_verified_at!= null)
                                            <b>Confirmation of the email address: </b> <a
                                                class="float-right">confirmed</a>
                                        @else
                                            <b>Confirmation of the email address: </b> <a class="float-right">not
                                                confirmed</a>
                                        @endif
                                    </li>
                                </ul>

                                <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a>
                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="col-12">
                    <div class="wow fadeInUp" data-wow-delay="0.2s">
                        <form action="{{route('register.store')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row g-3">

                                <div class="col-12">
                                    <div class="form-floating">
                                        <input name="name" type="text" class="form-control" id="subject"
                                               placeholder="Subject">
                                        <label for="subject">Name</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating">
                                        <input name="email" type="email" class="form-control" id="subject"
                                               placeholder="Subject">
                                        <label for="subject">Email</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating">
                                        <input name="password" type="password" class="form-control" id="subject"
                                               placeholder="Subject">
                                        <label for="subject">Password</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating">
                                        <input name="password_confirmation" type="password" class="form-control"
                                               id="subject" placeholder="Subject">
                                        <label for="subject">Password confirmation</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating">
                                        <input name="image" type="file" class="form-control" id="subject"
                                               placeholder="Subject">
                                        <label for="subject">Image</label>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <button class="btn btn-primary w-100 py-3" type="submit">Register</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection
