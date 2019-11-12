<a href="#" class="scrollToTop">
    <i class="fa fa-angle-up"></i>
</a>

<div class="loader">
    <div class="bouncybox">
        <div class="bouncy"></div>
    </div>
</div>

<div class="topbar">
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <div class="pull-left">

                    <span class="info">
                        <a href="{{ $_header_font_setting->telegram }}"> سوالی دارید؟</a>
                    </span>

                    <span class="info">
                        <i class="icon-phone2" style="padding-right: .5rem"></i>
                        {{ $_header_font_setting->phone }}
                    </span>

                    <span class="info">
                        <i class="icon-mail" style="padding-right: .5rem"></i>
                        {{ $_header_font_setting->email }}
                    </span>

                </div>

                <ul class="social_top pull-right">
                    <li>
                        <a href="{{ $_header_font_setting->instagram }}">
                            <i class="fa fa-instagram"></i>
                        </a>
                    </li>
                    <li>
                        <a href="{{ $_header_font_setting->telegram }}">
                            <i class="fa fa-telegram" aria-hidden="true"></i>
                        </a>
                    </li>
                    <li>
                        <a href="{{ $_header_font_setting->twitter }}">
                            <i class="icon-twitter4"></i>
                        </a>
                    </li>
                    {{--<li>
                        <a href="{{ $_header_font_setting->linkedin }}">
                            <i class="icon-linkedin"></i>
                        </a>
                    </li>--}}
                </ul>

            </div>
        </div>
    </div>
</div>

<header>
    <nav class="navbar navbar-default navbar-fixed white no-background bootsnav" style="background: rgba(0,0,0,0.1)">
        <div class="container">

            <div class="navbar-header pull-right">

                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
                    <i class="fa fa-bars"></i>
                </button>

                <a class="navbar-brand" href="{{ route('home') }}">
                    <img src="{{ image_url('_root/logo-white.png', 14,16,true) }}" alt="logo" class="logo logo-display" style="width: 125px; position:absolute; top: 0; right: 15px">
                    <img src="{{ image_url('_root/logo.png', 4,4,true) }}" class="logo logo-scrolled" alt="" style="width: 100%">
                </a>

            </div>

            <div class="collapse navbar-collapse" id="navbar-menu" style="margin-right: 100px">
                <ul class="nav navbar-nav navbar-right" data-in="fadeInDown" data-out="fadeOut">
                    @foreach($_header_front_menu as $menu)
                        <li class="dropdown">
                            <a class="{{ empty($menu['children']) ? '' : 'dropdown-toggle' }}"

                               href="{{ !empty($menu['link'] ) ?  $menu['link'] : '#' }}">
                                {{ $menu['title'] }}
                            </a>

                            @if(!empty($menu['children']))
                                <ul class="dropdown-menu">
                                    @foreach($menu['children'] as $child)
                                        <li><a href="{{ $menu['link'] }}">{{ $menu['title'] }}</a></li>
                                    @endforeach
                                </ul>
                            @endif

                        </li>
                    @endforeach
                </ul>

                {{--<li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" >courses</a>
                    <ul class="dropdown-menu">
                        <li><a href="courses.html">Courses</a></li>
                        <li><a href="course_detail.html">Courses Detail</a></li>
                    </ul>
                </li>--}}

            </div>

        </div>
    </nav>
</header>
