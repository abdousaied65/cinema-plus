<!-- ==========Newslater-Section========== -->
<footer class="footer-section" style="background: #276678 !important;
    bottom: 0;
    width: 100%; padding-top: 30px">
    <div class="container">
        <div class="footer-top">
            <div class="logo">
                <a href="{{route('index')}}">
                    <img src="{{asset('images/logo.png')}}" style="width: 40%;" alt="footer">
                </a>
            </div>
            <ul class="social-icons">
                <li>
                    <a target="_blank" href="https://wa.me/+966533593240">
                        <i class="fab fa-whatsapp"></i>
                    </a>
                </li>
                <li>
                    <a target="_blank" href="https://twitter.com/getcinemaplus" class="active">
                        <i class="fab fa-twitter"></i>
                    </a>
                </li>
                <li>
                    <a target="_blank" href="https://www.linkedin.com/company/cinemaplus">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                </li>
            </ul>
        </div>
        <div class="footer-bottom">
            <div class="footer-bottom-area">
                <div class="left"
                     @if(App::getLocale() == "ar")
                     dir="rtl"
                     @else
                     dir="ltr"
                    @endif
                >
                    <p>{{trans('msgs.Copyright © 2021.All Rights Reserved By')}} <a
                            href="{{route('index')}}">{{trans('msgs.Cinema Plus')}} </a></p>
                </div>
                <ul class="links"
                    @if(App::getLocale() == "ar")
                    dir="rtl"
                    @else
                    dir="ltr"
                    @endif>
                    <li>
                        <a href="{{route('about')}}">{{trans('msgs.About')}}</a>
                    </li>
                    <li>
                        <a href="{{route('contact')}}">{{trans('msgs.Contact Us')}}</a>
                    </li>
                    <li>
                        <a href="{{route('conditions')}}">{{trans('msgs.Terms And Conditions')}}</a>
                    </li>
                    <li>
                        <a href="{{route('policy')}}">{{trans('msgs.Privacy Policy')}}</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</footer>
<!-- ==========Newslater-Section========== -->
