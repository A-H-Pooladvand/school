<section id="about">
    <div class="container">

        <h2 class="heading heading_space wow fadeInDown">
            <span>رشته ها</span>
            <span class="divider-left"></span>
        </h2>

        <div class="container">
            <div class="row">
                <div class="clearfix">
                    @foreach($services as $service)
                        <div class="col-sm-4 icon_box text-center wow fadeInUp" data-wow-delay="300ms">
                            <a href="{{ route('service.show', $service->id) }}">
                                <img src="{{ image_url($service->image, 12,12, true) }}" alt="{{ $service->title }}">
                            </a>
                            <a href="{{ route('service.show', $service->id) }}">
                                <h4 class="text-capitalize bottom20 margin10">{{ $service->title }}</h4>
                            </a>
                            <p class="no_bottom">{{ str_limit($service->summary, 90) }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
