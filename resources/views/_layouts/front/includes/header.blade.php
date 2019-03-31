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
                        <a href="#"> سوالی دارید؟</a>
                    </span>

                    <span class="info">
                        <i class="icon-phone2" style="padding-right: .5rem"></i>
                        021-44249559
                    </span>

                    <span class="info">
                        <i class="icon-mail" style="padding-right: .5rem"></i>
                        info@maedehsch.ir
                    </span>

                </div>

                <ul class="social_top pull-right">

                    <li>
                        <a href="#">
                            <i class="fa fa-facebook"></i>
                        </a>
                    </li>

                    <li>
                        <a href="#">
                            <i class="icon-twitter4"></i>
                        </a>
                    </li>

                    <li>
                        <a href="#">
                            <i class="icon-google"></i>
                        </a>
                    </li>

                </ul>

            </div>
        </div>
    </div>
</div>

<header>
    <nav class="navbar navbar-default navbar-fixed white no-background bootsnav">
        <div class="container">

            <div class="navbar-header pull-left">

                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
                    <i class="fa fa-bars"></i>
                </button>

                <a class="navbar-brand" href="{{ route('home') }}">
                    <img src="{{ asset('_site/images/logo-white.png') }}" alt="logo" class="logo logo-display">
                    <img src="{{ asset('_site/images/logo.png') }}" class="logo logo-scrolled" alt="">
                </a>

            </div>

            <div class="collapse navbar-collapse" id="navbar-menu">
                <ul class="nav navbar-nav navbar-right" data-in="fadeInDown" data-out="fadeOut">
                    @foreach($_header_front_menu as $menu)
                        <li>
                            <a href="{{ $menu['link'] }}">{{ $menu['title'] }}</a>
                        </li>
                    @endforeach
                </ul>
            </div>

        </div>
    </nav>
</header>
