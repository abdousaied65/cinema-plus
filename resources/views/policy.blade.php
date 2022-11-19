@extends('site.layouts.app-main')
@section('content')
    <!-- ==========Banner-Section========== -->
    <section class="main-page-header">
        <div class="container">
            <div class="speaker-banner-content">
                <h2 class="title">{{trans('msgs.Privacy Policy')}}</h2>
                <ul class="breadcrumb">
                    <li>
                        <a href="{{route('index')}}">
                            {{trans('msgs.Home')}}
                        </a>
                    </li>
                    <li>
                        {{trans('msgs.Privacy Policy')}}
                    </li>
                </ul>
            </div>
        </div>
    </section>
    <!-- ==========Banner-Section========== -->

    <!-- ==========Speaker-Single========== -->
    <section class="about-section padding-top padding-bottom">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-lg-6 mb-5">
                    <div class="event-about-content">
                        <div class="section-header-3 left-style m-0">
                            <h2 class="title">Privacy Policy</h2>
                            <h6 class="text-center m-3">Information collection</h6>
                            <ol>
                                <li>We will gather individual information that you submit or which we gather through
                                    your utilization of the site.
                                </li>
                                <li>We may gather extra data about you from outsiders, our members, or auxiliaries</li>
                                <li>We may join the data and information we get from different sources with data we
                                    gather straightforwardly.
                                </li>
                                <li>If you connect your CINEMA PLUS website with at least one of your web-based media
                                    profiles, at that point we may gather individual data that is remembered for your
                                    online media profile or record.
                                </li>
                            </ol>
                            <h6 class="text-center m-3">Information disclosure</h6>
                            <ol>
                                <li>CINEMA PLUS may unveil your own data to CINEMA PLUS's associates and other outsiders
                                    for their immediate advertising purposes.
                                </li>
                                <li>In expansion, we may unveil your own data to outsider specialist organizations to
                                    furnish you with the administrations on the CINEMA PLUS site.
                                </li>
                                <li>If we do make such an exchange, we will find a way to ensure your own information be
                                    protected and secure.
                                </li>
                                <li> CINEMA PLUS and its partners or auxiliaries may keep you informed by electronic
                                    methods about occasions, items, and administrations that we accept might bear some
                                    significance with you as a client of the CINEMA PLUS site.
                                </li>
                                <li>We may move your own information to nations, which do not give a similar degree of
                                    information security.
                                </li>
                            </ol>
                            <h6 class="text-center m-3">Information security and management</h6>
                            <ol>
                                <li>Once we get your personal information, we find a way to guarantee that all data we
                                    gather, utilize, or unveil is precise, and updated in a protected environment, and
                                    got to exclusively by approved people.
                                </li>
                                <li>Any individual data information that we gather about clients will be kept in a
                                    database, which is open, exclusively by those approved to perform routine everyday
                                    errands, for example, renewing membership and refreshing locations.
                                </li>
                            </ol>
                            <h6 class="text-center m-3">Cookies</h6>
                            <ol>
                                <li>Cookies are pieces of data that a site can move to a person's PC hard drive for
                                    record-keeping.
                                </li>
                                <li> The utilization of cookies is an industry-standard, and numerous sites use them.
                                    Cookies are helpful for encouraging a client's admittance to and utilization of a
                                    site.
                                </li>
                                <li> Likewise, you can delete cookies from your hard drive anytime.</li>
                                <li>They permit us to follow utilization designs and order information that can assist
                                    us with improving our administrations to you. Cookie information is utilized in
                                    accumulated structure - we do not utilize it to distinguish you as a person.
                                </li>
                                <li>However, if you do not wish any information to be collected through the use of
                                    cookies, you can change the functions in most web browsers to deny the cookie
                                    feature.
                                </li>
                            </ol>

                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="about-thumb">
                        <img style="width: 100%;" src="{{asset('images/policy.jpg')}}" alt="policy">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ==========Speaker-Single========== -->
@endsection
