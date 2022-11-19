@extends('site.layouts.app-main')
@section('content')
    <!-- ==========Banner-Section========== -->
    <section class="main-page-header">
        <div class="container">
            <div class="speaker-banner-content">
                <h2 class="title">{{trans('msgs.Contact Us')}}</h2>
                <ul class="breadcrumb">
                    <li>
                        <a href="{{route('index')}}">
                            {{trans('msgs.Home')}}
                        </a>
                    </li>
                    <li>
                        {{trans('msgs.Contact Us')}}
                    </li>
                </ul>
            </div>
        </div>
    </section>
    <!-- ==========Banner-Section========== -->

    <!-- ==========Contact-Section========== -->
    <section class="contact-section padding-top mb-5">
        <div class="contact-container">
            <div class="bg-thumb"></div>
            <div class="container">
                <div class="row justify-content-between">
                    <div class="col-12">
                        <div class="section-header-3 text-center">
                            @if(App::getLocale() == "ar")
                                <p>
                                    تفضل في إخبارنا عن تجربتك و في حال لديك اي سؤال او استفسارات أرسل لنا وسوف نرد
                                    عليك في أقرب وقت ممكن نحن في خدمتك
                                </p>
                            @else
                                <p>
                                    Please tell us about your experience and in case you have any questions or
                                    inquiries, send us and we will respond
                                    You as soon as possible we are at your service
                                </p>
                            @endif

                        </div>
                        <form class="contact-form col-8 justify-content-center text-center" style="margin: 10px auto;" id="contact_form_submit" method="POST"
                              action="{{route('form.contact')}}">
                            @csrf
                            <div class="form-group">
                                <label for="name">{{trans('msgs.Name')}} <span>*</span></label>
                                <input type="text" placeholder="{{trans('msgs.Enter Your Name')}}" name="name" id="name"
                                       required>
                            </div>
                            <div class="form-group">
                                <label for="email">{{trans('msgs.Email')}} <span>*</span></label>
                                <input type="text" placeholder="{{trans('msgs.Enter Your Email')}}" name="email"
                                       id="email" required>
                            </div>
                            <div class="form-group">
                                <label for="phone">{{trans('msgs.Phone')}} <span>*</span></label>
                                <input type="text" placeholder="{{trans('msgs.Enter Your Phone')}}" name="phone"
                                       id="phone" required>
                            </div>
                            <div class="form-group">
                                <label for="subject">{{trans('msgs.Subject')}} <span>*</span></label>
                                <input type="text" placeholder="{{trans('msgs.Enter Your Subject')}}" name="subject"
                                       id="subject" required>
                            </div>
                            <div class="form-group">
                                <label for="message">{{trans('msgs.Message')}} <span>*</span></label>
                                <textarea name="message" id="message" placeholder="{{trans('msgs.Enter Your Message')}}"
                                          required></textarea>
                            </div>
                            <button class="btn btn-lg btn-success"
                                    style="background: #1687a7; border-color: #1687a7; color: #fff;"
                                    type="submit">{{trans('msgs.Send Message')}}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ==========Contact-Section========== -->

@endsection
