<section id="events" class="padding-bottom">
    <div class="container">

        <h2 class="heading heading_space wow fadeInDown">
            <span>سرویس ها</span>
            <span class="divider-left"></span>
        </h2>

        <div class="row">

            @foreach($services as $service)
                <div class="col-sm-6 col-md-4">
                    <div class="events  wow fadeIn" data-wow-delay="300ms">

                        <div class="image">
                            <img src="{{ image_url($service->image, 36, 25, true) }}" alt="eventss" class="border_radius">
                        </div>

                        <h4 class="top30">
                            <a href="event_detail.html">
                                {{ $service->title }}
                            </a>
                        </h4>

                        <p class="bottom20 margin10">{{ $service->summary }}</p>

                        <div class="clearfix">

                            <ul class="comment pull-right">
                                <li>
                                    <a href="#" class="facebook">
                                        <i class="icon-icons20"></i>
                                        {{ jdate($service->created_at)->format('Y-m-d') }}
                                    </a>
                                </li>
                            </ul>

                            <ul class="comment pull-left">
                                <li>
                                    <a href="#" class="facebook">
                                        {{ jdate($service->created_at)->ago() }}
                                    </a>
                                </li>
                            </ul>

                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
