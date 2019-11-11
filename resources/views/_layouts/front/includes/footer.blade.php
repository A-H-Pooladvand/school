<footer class="padding-top">
    <div class="container">

        <p>
            <i class="fa fa-contao fa-fw"></i>
            {{ $_footer_setting->address }}
        </p>
        <p>
            <i class="fa fa-phone fa-fw"></i>
            {{ $_footer_setting->phone }}
        </p>
        <p class="heading_space">
            <i class="fa fa-envelope fa-fw"></i>
            {{ $_footer_setting->email }}
        </p>

        <div class="row">

            <div class="col-md-4 col-sm-4 footer_panel bottom25">
                <h3 class="heading bottom25">
                    <span>دسترسی سریع</span>
                    <span class="divider-left"></span>
                </h3>
                <ul class="links">
                    <li class="w-100"><a href="{{ route('home') }}"><i class="icon-chevron-small-right"></i>صفحه اصلی</a></li>
                    <li class="w-100"><a href="{{ route('service.index') }}"><i class="icon-chevron-small-right"></i>رشته ها</a></li>
                    <li class="w-100"><a href="{{ route('news.index') }}"><i class="icon-chevron-small-right"></i>اخبار</a></li>
                    <li class="w-100"><a href="{{ route('album.index') }}"><i class="icon-chevron-small-right"></i>الوم تصاویر</a></li>
                    <li class="w-100"><a href="{{ route('about.show') }}"><i class="icon-chevron-small-right"></i>درباره ما</a></li>
                    <li class="w-100"><a href="{{ route('contact.show') }}"><i class="icon-chevron-small-right"></i>تماس با ما</a></li>
                </ul>
            </div>

            <div class="col-md-4 col-sm-4 footer_panel bottom25">
                <h3 class="heading bottom25">
                    <span>دسترسی سریع</span>
                    <span class="divider-left"></span>
                </h3>
                <ul class="links">
                    <li class="w-100"><a href="{{ route('home') }}"><i class="icon-chevron-small-right"></i>صفحه اصلی</a></li>
                    <li class="w-100"><a href="{{ route('service.index') }}"><i class="icon-chevron-small-right"></i>رشته ها</a></li>
                    <li class="w-100"><a href="{{ route('news.index') }}"><i class="icon-chevron-small-right"></i>اخبار</a></li>
                    <li class="w-100"><a href="{{ route('album.index') }}"><i class="icon-chevron-small-right"></i>الوم تصاویر</a></li>
                    <li class="w-100"><a href="{{ route('about.show') }}"><i class="icon-chevron-small-right"></i>درباره ما</a></li>
                    <li class="w-100"><a href="{{ route('contact.show') }}"><i class="icon-chevron-small-right"></i>تماس با ما</a></li>
                </ul>
            </div>

            <div class="col-md-4 col-sm-4 footer_panel bottom25">
                <h3 class="heading bottom25">
                    <span>آخرین اخبار</span>
                    <span class="divider-left"></span>
                </h3>
                <ul class="links">
                    @foreach($_footer_latest_news as $news)
                        <li class="w-100"><a href="{{ route('news.show', $news->id) }}">
                                <i class="icon-chevron-small-right"></i>{{ $news->title }}</a>
                        </li>
                    @endforeach
                </ul>
            </div>

            <div class="col-md-4 col-sm-4 footer_panel bottom25">
                <h3 class="heading bottom25">
                    <span>آخرین اطلاعیه ها</span>
                    <span class="divider-left"></span>
                </h3>
                <ul class="links">
                    @foreach($_footer_latest_notifications as $item)
                        <li class="w-100"><a href="{{ route('notification.show', $item->id) }}">
                                <i class="icon-chevron-small-right"></i>{{ $item->title }}</a>
                        </li>
                    @endforeach
                </ul>
            </div>

        </div>
    </div>
</footer>
