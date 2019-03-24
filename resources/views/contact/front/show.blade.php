@extends('_layouts.front.index')


@section('content')
    <main>

        <div class="main">
            <section class="module">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-6">
                            <h4 class="font-alt">Get in touch</h4><br/>
                            <form id="" role="form" method="post" action="{{ route('contact.store') }}">
                                {{ csrf_field() }}

                                @if(Session::has('message'))
                                    <div class="form-group">
                                        <div class="alert alert-info">
                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                            {{ Session::get('message') }}
                                        </div>
                                    </div>
                                @endif

                                <div class="form-group">
                                    <label class="sr-only" for="name">Name</label>
                                    <input class="form-control" type="text" id="name" name="name" placeholder="Your Name*" required="required" data-validation-required-message="Please enter your name."/>
                                    <p class="help-block text-danger"></p>
                                </div>

                                <div class="form-group">
                                    <label class="sr-only" for="email">Email</label>
                                    <input class="form-control" type="email" id="email" name="email" placeholder="Your Email*" required="required" data-validation-required-message="Please enter your email address."/>
                                    <p class="help-block text-danger"></p>
                                </div>

                                <div class="form-group">
                                    <label class="sr-only" for="phone">Phone</label>
                                    <input class="form-control" type="tel" id="phone" name="phone" placeholder="Your Phone*" required="required" data-validation-required-message="Please enter your phone info."/>
                                    <p class="help-block text-danger"></p>
                                </div>

                                <div class="form-group">
                                    <label class="sr-only" for="subject">subject</label>
                                    <input class="form-control" type="text" id="subject" name="subject" placeholder="Subject*" required="required" data-validation-required-message="Please enter the subject."/>
                                    <p class="help-block text-danger"></p>
                                </div>

                                <div class="form-group">
                                    <textarea class="form-control" rows="7" id="message" name="content" placeholder="Your Message*" required="required" data-validation-required-message="Please enter your message."></textarea>
                                    <p class="help-block text-danger"></p>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-sm-6"><input class="form-control" type="text" id="captcha" name="captcha" placeholder="captcha code*" required="required" data-validation-required-message="Please enter the captcha."/></div>
                                        <div class="col-sm-6">{!! captcha_img() !!}</div>
                                    </div>

                                    <p class="help-block text-danger"></p>
                                </div>

                                <div class="text-center">
                                    <button class="btn btn-block btn-round btn-d" id="" type="submit">Submit</button>
                                </div>

                            </form>
                            <div class="ajax-response font-alt" id="contactFormResponse"></div>
                        </div>
                        <div class="col-sm-6">
                            <h4 class="font-alt">{{ $contact->title }}</h4><br/>
                            <p>{!! $contact->content !!}</p>
                            {{--<hr/>--}}
                            {{-- <h4 class="font-alt">Business Hours</h4><br/>
                             <ul class="list-unstyled">
                                 <li>Mo - Fr: 8am to 6pm</li>
                                 <li>Sa, Su: 10am to 2pm</li>
                             </ul>--}}
                        </div>
                    </div>
                </div>
            </section>

            <div id="map" style="width:100%;height:400px;"></div>
            @push('scripts')
                <script>
                    var map;

                    function initMap() {
                        map = new google.maps.Map(document.getElementById('map'), {
                            center: {lat: -34.397, lng: 150.644},
                            zoom: 8
                        });
                    }
                </script>
                <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCr9Wm6vBLewdTB7FqTpg5TfzK6Dhh0XL4&callback=initMap" async defer></script>
            @endpush
        </div>
        <div class="scroll-up"><a href="#totop"><i class="fa fa-angle-double-up"></i></a></div>
    </main>

@stop