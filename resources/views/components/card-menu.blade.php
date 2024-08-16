
<div class="col-lg-6">
    <div class="d-flex align-items-center">
        <img class="flex-shrink-0 img-fluid rounded" src="{{asset($menu->getImage())}}" alt="" style="width: 80px;" width="50" height="50">
        <div class="w-100 d-flex flex-column text-start ps-4">
            <h5 class="d-flex justify-content-between border-bottom pb-2">
                <span>{{$menu->title}}</span>
                <span class="text-primary">${{$menu->price}}</span>
            </h5>
            <small class="fst-italic">{{$menu->description}}</small>
        </div>
    </div>
</div>
