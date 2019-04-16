@if(isset($data) && count($data))
    <h2 class="text-uppercase text-bold">اطلاعیه ها</h2>
    <hr>
    <div class="row heading_space">
        @foreach($data as $service)
            <div class="col-sm-4 icon_box wow fadeInUp" data-wow-delay="300ms">
                <a href="{{ route('notification.show', $service->id) }}">
                    <img class="img-rounded" src="{{ image_url($service->image, 36,25, true) }}" alt="{{ $service->title }}">
                </a>
                <a href="{{ route('notification.show', $service->id) }}">
                    <h4 class="text-capitalize bottom20 margin10">{{ $service->title }}</h4>
                </a>
                <p class="no_bottom">{{ str_limit($service->summary, 90) }}</p>
            </div>
        @endforeach
    </div>
@endif

