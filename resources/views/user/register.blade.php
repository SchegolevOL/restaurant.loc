@extends('front.layouts.layout')
@section('nav-bar-content')
    <div class="container-xxl py-5 bg-dark hero-header mb-5">
        <div class="container text-center my-5 pt-5 pb-4">
            <h1 class="display-3 text-white mb-3 animated slideInDown">Register</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center text-uppercase">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Login</a></li>
                    <li class="breadcrumb-item text-white active" aria-current="page">Register</li>
                </ol>
            </nav>
        </div>
    </div>
@endsection
@section('content')

    <!-- Contact Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h5 class="section-title ff-secondary text-center text-primary fw-normal">Register</h5>
                <h1 class="mb-5">Please register</h1>
            </div>
            <div class="row g-4">
                <div class="col-12">
                    <div class="row gy-4">
                        <div class="col-md-4">
                            <h5 class="section-title ff-secondary fw-normal text-start text-primary">Booking</h5>
                            <p><i class="fa fa-envelope-open text-primary me-2"></i>book@example.com</p>
                        </div>
                        <div class="col-md-4">
                            <h5 class="section-title ff-secondary fw-normal text-start text-primary">General</h5>
                            <p><i class="fa fa-envelope-open text-primary me-2"></i>info@example.com</p>
                        </div>
                        <div class="col-md-4">
                            <h5 class="section-title ff-secondary fw-normal text-start text-primary">Technical</h5>
                            <p><i class="fa fa-envelope-open text-primary me-2"></i>tech@example.com</p>
                        </div>
                    </div>
                    @include('components.messages')
                </div>

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
                                        <input name="password" type="password" class="form-control" id="subject" placeholder="Subject">
                                        <label for="subject">Password</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating">
                                        <input name="password_confirmation" type="password" class="form-control" id="subject" placeholder="Subject">
                                        <label for="subject">Password confirmation</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating">
                                        <input name="image" type="file" class="form-control" id="subject" placeholder="Subject">
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
    <!-- Contact End -->
@endsection
