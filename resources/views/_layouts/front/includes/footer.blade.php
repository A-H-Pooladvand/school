<footer class="padding-top">

    <div class="container">

        <div class="row">

            <div class="col-sm-6">
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
                    <a href="mailto: {{ $_footer_setting->email }}">{{ $_footer_setting->email }}</a>
                </p>
            </div>

            <div class="col-sm-6">

                <div class="row">
                    <div class="col-md-4">
                        <a href="{{ $_footer_setting->instagram }}" target="_blank">
                            <i class="fa fa-instagram fa-3x"></i>
                            <div>اینستاگرام</div>
                        </a>
                    </div>

                    <div class="col-md-4">
                        <a href="{{ $_footer_setting->telegram }}" target="_blank">
                            <i class="fa fa-telegram fa-3x"></i>
                            <div>تلگرام</div>
                        </a>
                    </div>

                    <div class="col-md-4">
                        <a href="{{ $_footer_setting->twitter }}" target="_blank">
                            <i class="fa fa-twitter fa-3x"></i>
                            <div>توییتر</div>
                        </a>
                    </div>
                </div>

            </div>
        </div>

        <div class="row">
            <div class="col-md-3 col-sm-4 footer_panel bottom25">
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

            <div class="col-md-3 col-sm-4 footer_panel bottom25">
                <h3 class="heading bottom25">
                    <span>سایت های مرتبط</span>
                    <span class="divider-left"></span>
                </h3>
                <ul class="links">
                    @foreach($_footer_links as $link)
                        <li class="w-100">
                            <a href="{{ $link->link }}">{{ $link->title }}</a>
                        </li>
                    @endforeach
                </ul>
            </div>

            <div class="col-md-3 col-sm-4 footer_panel bottom25">
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

            <div class="col-md-3 col-sm-4 footer_panel bottom25">
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