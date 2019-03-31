<section class="padding parallax">
    <div class="container">

        <div class="row">
            <div class="col-md-12">
                <h2 class="heading heading_space wow fadeInDown">اطلاعیه ها<span class="divider-left"></span></h2>
            </div>
        </div>

        <div class="row">

            @foreach($notifications as $notification)
                <div class="col-sm-4">
                    <div class="image bottom20">
                        <img src="{{ image_url($notification->image, 36, 24, true) }}" alt="Courses" class="img-responsive border_radius">
                    </div>
                    <h3 class="bottom15"><a href="{{ route('notification.show', $notification->id) }}">{{ $notification->title }}</a></h3>
                    <p class="bottom15">{{ $notification->summary }}</p>
                    <a href="{{ route('notification.show', $notification->id) }}" class="btn_common blue border_radius">ادامه مطلب</a>
                </div>
            @endforeach

        </div>

    </div>
</section>
