<!-- ==========Newslater-Section========== -->
<footer class="footer-section">
    <div class="newslater-section padding-bottom">
        <div class="container">
            <div class="newslater-container bg_img"
                 data-background="{{asset('assets/images/newslater/newslater-bg01.jpg')}}">
                <div class="newslater-wrapper">
                    <h5 class="cate">{{trans('msgs.subscribe to Cinema Plus')}} </h5>
                    <h3 class="title">{{trans('msgs.to get exclusive benifits')}}</h3>
                    <form class="newslater-form" method="POST" action="{{route('subscription')}}">
                        @csrf
                        <input required type="email" name="subscribe_email" placeholder="{{trans('msgs.Enter Your Email')}}">
                        <button type="submit" class="btn btn-lg btn-danger">{{trans('msgs.subscribe')}}</button>
                    </form>
                    <p class="p-last">{{trans('msgs.We respect your privacy, so we never share your info')}}</p>
                </div>
            </div>
        </div>
    </div>
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
