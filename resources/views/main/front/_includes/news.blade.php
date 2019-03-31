<section id="news" class="padding">
    <div class="container">

        <h2 class="heading heading_space">آخرین اخبار <span class="divider-left"></span></h2>

        <div class="row">

            @foreach($news as $item)
                <div class="col-md-4 col-sm-6 content_wrap heading_space wow fadeIn" data-wow-delay="300ms">

                    <div class="image">
                        <img src="{{ image_url($item->image, 36, 24, true) }}" alt="Edua" class="img-responsive border_radius">
                    </div>

                    <div class="news_box border_radius">

                        <h4>
                            <a href="{{ route('news.show', $item->id) }}">{{ $item->title }}</a>
                        </h4>

                        <ul class="commment">
                            <li><a href="#"><i class="icon-icons20"></i>{{ jdate($item->created_at)->format('Y-m-d') }}</a></li>
                        </ul>
                        <p>{{ $item->summary }}</p>
                        <a href="{{ route('news.show', $item->id) }}" class="readmore">ادامه مطلب</a>
                    </div>

                </div>
            @endforeach

        </div>

    </div>
</section>
