@extends('site.layouts.app-main')
<style>
    ul.lists li {
        list-style: circle !important;
    }
</style>
@section('content')
    <!-- ==========Banner-Section========== -->
    <section class="main-page-header">
        <div class="container">
            <div class="speaker-banner-content">
                <h2 class="title">{{trans('msgs.Terms And Conditions')}}</h2>
                <ul class="breadcrumb">
                    <li>
                        <a href="{{route('index')}}">
                            {{trans('msgs.Home')}}
                        </a>
                    </li>
                    <li>
                        {{trans('msgs.Terms And Conditions')}}
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
                            <span class="cate text-center">Terms & Conditions</span>
                            <ul class="lists">
                                <li class="text-center">
                                    <h4>Your consent to these Terms:</h4>

                                </li>
                                <p class="m-3">Please read these Terms carefully. By purchasing a ticket on the Website,
                                    you
                                    accept these Terms. If you are reading an electronic copy of these Terms, feel
                                    free to print or save a copy for your records. To obtain more information about
                                    these Terms, please contact Guest Services via the "Contact Us" page of the
                                    Website.
                                </p>
                                <li class="text-center">
                                    <h4>Amendments to these Terms:</h4>
                                </li>
                                <p class="m-3">reserves the right to add to or amend these Terms from time to time
                                    without prior
                                    notice. Amendments will take effect when posted on the Website. You are solely
                                    responsible for checking the Website "Privacy & Legal" section regularly for any
                                    changes to these Terms. We are under no obligation whatsoever to notify you of
                                    any such amendments. If you purchase a ticket via the Website after any
                                    amendment to these Terms, you agree to be bound by the updated version of these
                                    Terms.
                                </p>
                            </ul>

                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="about-thumb">
                        <img style="width: 100%;" src="{{asset('images/conditions.jpg')}}" alt="conditions">
                    </div>
                </div>
            </div>
            <hr class="mb-5 w-50" style="margin: auto;">
            <div class="row">
                <div class="col-12 justify-content-center">
                    <h4 class="text-center">General Terms and Conditions</h4> <br>
                    <h6 class="m-3"> - Ticket Purchase</h6>
                    <h6 class="m-3"> - Sale of tickets :</h6>
                    <ul class="lists">
                        <li>
                            The Website FAQs page contains details of how to place your order for a ticket, including
                            how to correct input errors during the booking process. We advise you to read these FAQs
                            before you proceed to place an order.
                        </li>
                        <li>
                            The sale of tickets on the Website is subject to availability. Your order is an offer to
                            purchase from Cinemas in KSA, and it retains the discretion to refuse your order. If your
                            order is successful, we will display a confirmation page on your screen at the end of the
                            booking process, and at this point, there will be a contract between you and Cinemas in KSA.
                            We will also send you an email confirmation of your completed order, for your information.
                            We recommend that you print out or save a copy of the confirmation page and/or confirmation
                            e-mail for your records.
                        </li>
                    </ul>
                    <h6 class="m-3">Ticket price Online Booking Fee:</h6>
                    <ul class="list">
                        <li>The price of a ticket shall be as displayed on the Website during the booking process.</li>
                        <li>Payment can be made by any method specified in the booking process.</li>
                    </ul>
                    <h6 class="m-3">Returns Policy</h6>
                    <ul class="lists">
                        <li>An account holder can request a credit refund on tickets purchases up to 120 minutes prior
                            to the scheduled start time. The full amount (plus any associated booking fee) will be
                            credited into your wallet and can be used again on any online purchase.
                        </li>
                        <li>Cancellations or changes made to bookings less than 120 minutes prior to the scheduled start
                            time are not eligible for refunds.
                        </li>
                        <li>If you would like to exchange your online booking for a different session, please request a
                            credit refund and purchase a new ticket.
                        </li>
                    </ul>
                    <h6 class="m-3">Registering</h6>
                    <ul class="lists">
                        <li>When you register we'll ask for some details about yourself. From time to time we might ask
                            for additional information for competitions and so on. Your privacy is very important to us
                            and we will not pass on any information about you with any third party unless you have given
                            us your written permission to do so.
                        </li>
                    </ul>
                    <h6 class="m-3">Intellectual Property</h6>
                    <ul class="lists">
                        <li>We own all the material on this website. This includes all text, designs, logos, graphics,
                            computer programs, audio, video, and code (including HTML) in any form. Unless stated
                            otherwise in these terms and conditions of use, none of the material on this web site may be
                            reproduced, downloaded, distributed, copied, republished, displayed, or transmitted in any
                            form whatsoever without our written permission. We grant you permission to view this web
                            site with a web browser if you do not:
                        </li>
                        <li> Modify the material on this website.
                        </li>
                        <li> Resell the material on this website.
                        </li>
                        <li> Create derivative works from the material on this website</li>
                        <p>We may in our absolute discretion publish on this website material or information that you
                            submit to us for:
                        </p>
                        <li>Participation in competitions.
                        </li>
                        <li>A personal film reviews.
                        </li>
                        <p>By submitting information or material to us you grant to us an irrevocable, perpetual,
                            royalty-free, non-exclusive, worldwide license to:
                        </p>
                        <li>Use, reproduce, modify, sublicense, redistribute, adapt, transmit, publish, broadcast, and
                            display that information
                        </li>
                        <li> material and create derivative works from it.
                        </li>
                        <li>Sublicense any of the forgoing rights to third parties.
                        </li>
                        <p>While using this website, you must not:
                        </p>
                        <li> Disrupt the operation or security of this website or any accounts, servers, or networks
                            connected or accessible through this website.
                        </li>
                        <li>Use this website in a way that may harass, annoy, or disrupt any third person, including a
                            third person who may receive messages as a result of your use of this website.
                        </li>
                        <li>Submit any unlawful, threatening, abusive, defamatory, obscene, vulgar, pornographic,
                            profane or indecent information or material of any kind, including without limitation any
                            material constituting or encouraging conduct that would constitute a criminal offence, give
                            rise to civil liability or otherwise violate any applicable law; submit any material of any
                            kind which violates or infringes the rights of any other person, including material which is
                            an invasion of any privacy rights, which is protected by copyright, trade mark or any other
                            proprietary right without first obtaining the permission of the owner or relevant right
                            holder.
                        </li>
                        <li>Submit any material of any kind which contains a virus or other harmful component.
                        </li>
                        <li>Modify or delete any content on this website or add any content to this website.
                        </li>
                        <li>Attempt to gain unauthorized access to any part of this website.
                        </li>
                        <li> We reserve the right to cooperate fully with any law enforcement authority in any
                            jurisdiction in respect of any lawful direction or request to disclose the identity or other
                            information in respect of anyone posting any materials which violate any applicable or
                            relevant law.
                        </li>
                    </ul>
                    <h6 class="m-3">Security and Accuracy of Information </h6>
                    <p>This website may vary from time to time.</p>
                    <h6 class="m-3">Third party sites </h6>
                    <p>You may be able to access third party sites from this website. We do not make any representations
                        or claims in relation to the content, quality, or reliability of these sites, and our inclusion
                        of a link to them does not imply that we have any relationship or affiliation with them.</p>
                    <h6 class="m-3">Password</h6>
                    <p>If you register with this website, you may be provided with a password. If you are provided with
                        a password, you must keep it secret and secure.</p>
                    <h6 class="m-3">General</h6>
                    <p>Common law duty of care. We do not assume any common law duty of care towards you in providing
                        the information on this website.</p>

                    <h6 class="m-3">Disputes</h6>
                    <p>Any dispute between you and us will be determined under the laws of the Kingdom of Saudi Arabia
                        by the courts of the Kingdom of Saudi Arabia.</p>

                </div>

            </div>
        </div>
        <h5 class="text-center mt-5">Cinema Plus © 2021. All rights reserved.</h5>
    </section>
    <!-- ==========Speaker-Single========== -->
@endsection
