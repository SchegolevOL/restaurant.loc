<div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="{{$time}}s">
    <div class="team-item text-center rounded overflow-hidden">
        <div class="rounded-circle overflow-hidden m-4 w-75">
            <img class="img-fluid" src="{{asset($chief->getImage())}}" alt="" width="250" height="250">
        </div>
        <h5 class="mb-0">{{$chief->first_name}} {{$chief->last_name}}</h5>
        <small>Designation</small>
        <div class="d-flex justify-content-center mt-3">
            <a class="btn btn-square btn-primary mx-1" href=""><i class="fab fa-facebook-f"></i></a>
            <a class="btn btn-square btn-primary mx-1" href=""><i class="fab fa-twitter"></i></a>
            <a class="btn btn-square btn-primary mx-1" href=""><i class="fab fa-instagram"></i></a>
        </div>
    </div>
</div>
