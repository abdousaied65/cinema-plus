@extends('site.layouts.app-main')
<style>
    .speaker-banner-content .breadcrumb li a::after {
        display: none !important;
    }

    .speaker-banner-content h6 {
        line-height: 2.5;
        font-size: 16px;
        font-weight: normal;
    }
</style>
@section('content')
    <!-- ==========Banner-Section========== -->
    <section class="main-page-header">
        <div class="container">
            <div class="speaker-banner-content">
                <h2 class="title">{{trans('msgs.About')}}</h2>
                <ul class="breadcrumb">
                    <li>
                        <a href="{{route('index')}}">
                        </a>
                    </li>
                </ul>
                <h6 class="p-5">
                    @if(App::getLocale() == "ar")
                        تقديم أحدث العروض المتقدمة ذات الجودة عالية من خالل االبتكار واإلبداع. ومحتوى تسعى
                        لتجربة استثنائية للجمهور. وشاشات عمالقة وعالية ثالثي األبعاد محوسب غامر ، ونظام صوت
                        الجودة باإلضافة إلى ذلك ، فإننا نتوقع مجال التحويل والصور المتحركة. كما أن الهدف األكثر
                        أهمية هو تحقيق تجربة استثنائية في مجاالت األفالم ، ووضع استثماراتنا في أفضل قدرات
                        ممتازة. متخصصون ومدربون فنيين بجودة عالية
                    @else
                        CINEMA PLUS strives to provide the latest, advanced, high-quality offerings
                        through innovation and creativity. Immersive 3D computerized content and Dolby audio system for
                        an exceptional audience experience. And giant, high-quality
                        screens, in addition, we anticipate the field of switching and animation.
                    @endif
                </h6>
            </div>
        </div>
    </section>
    <!-- ==========Banner-Section========== -->

    <!-- ==========Speaker-Single========== -->
    <section class="about-section">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-lg-6 mb-5">
                    <div class="event-about-content">
                        <div class="section-header-3 m-0 @if(App::getLocale()=="ar") text-right @else text-left @endif">
                            <span class="cate">{{trans('msgs.we are CINEMA PLUS')}}</span>
                            <h2 class="title">{{trans('msgs.Get to know us')}}</h2>
                            <p>
                                @if(App::getLocale()=="ar")
                                    تسعى سينما بلس تقديم الترفيه السينمائي ذات الجودة عالية ، ومحتوى ثلاثي الأبعاد
                                    المثير، لخلق تجربة استثنائية للجمهور. وذلك بشاشات عملاقة وعالية الجودة بالإضافة إلى
                                    ذلك ، فإننا نسعى الى تلبية التوقعات والمعاييرالعالية التى تنقلك الى عالم الابتكار
                                    والإبداع. و تتمثل أهدفنا الأكثر أهمية في توفير تجربة غير عادية في مجالات تجربة
                                    الأفلام ، ونطمح إلى تحقيق هذه الاهداف لكل عميل من عملائنا في كل مرة يزورون فيها
                                    سينما بلس.
                                @else
                                    Cinema Plus strives to provide high-quality cinematic entertainment and exciting 3D
                                    content to create an exceptional experience for the audience. With giant and
                                    high-quality screens, in addition, we strive to meet high expectations and standards
                                    that transport you to the world of innovation and creativity. Our most important
                                    goal is to provide an extraordinary experience in the areas of movie experience, and
                                    we aspire to achieve these goals for each of our customers every time they visit
                                    Cinema Plus.
                                @endif
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="about-thumb">
                        <img style="width: 100%;" src="{{asset('images/about.jpg')}}" alt="about">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ==========Speaker-Single========== -->

    <!-- ==========Philosophy-Section========== -->
    <div class="philosophy-section bg-one bg_img bg_quater_img"
         data-background="./assets/images/about/about-bg.jpg">
        <div class="container">
            <div class="row">
                <div class="col-12 p-3 bg-two">
                    <div class="philosophy-content">
                        <div class="section-header-3  @if(App::getLocale() == "ar") text-right @else text-left @endif">
                            <h5 class="title">{{trans('msgs.Our Vision')}}</h5>
                            <p>
                                @if(App::getLocale()=="ar")
                                    تتمثل رؤيتنا في سينما بلس في أننا نسعى لارضاء العملاء من خلال تقديم أفضل خدمات
                                    ترفيهية ممكنة وأحدث التقنيات في مجال الصناعات المسرحية. بالاضافة إلى توفير وسائل
                                    الراحة لجعل المشاهد يستمتع ويشعر بتجربة فريدة من نوعها من خلال توفير منصات عرض
                                    ضخمة ومتطورة تجعل المشاهدين يدخلون إلى عالم آخر من المتعة. في سينما بلس ، نتطلع
                                    إلى تقديم قائمة من القائمة المتميزة ، بما في ذلك الاطباق الشهية والمشروبات والحلويات
                                    الرائعة المعدة في مطبخنا ، والتي من شأنها أن تساعد في تحسين تجربة المشاهد
                                @else
                                    Our vision in CINEMA PLUS is that we seek to satisfy customers by providing the
                                    best possible entertainment services and the latest technology in theater industries
                                    field. In addition, providing amenities to make the viewer enjoy and feel a unique
                                    experience by providing huge and advanced display platforms that make viewers
                                    enter another world of enjoyment. In CINEMA PLUS, we look forward to presenting
                                    a list of the premium menu, including delicious dishes, drinks and wonderful
                                    desserts prepared in our kitchen, which would help improving the viewer experience.
                                @endif
                            </p>
                        </div>
                        <div class="section-header-3  @if(App::getLocale() == "ar") text-right @else text-left @endif">
                            <h5 class="title">{{trans('msgs.Our Mission')}}</h5>
                            <p>
                                @if(App::getLocale()=="ar")
                                    تسعى سينما بلس جاهدة لتوفير مجموعة واسعة من الافلام المستقلة والاجنبية والكلاسيكية
                                    من خلال توفير أفضل في الصناعات المسرحية. مما يؤثر على صناعة الافلام وثقافتنا. تسعى
                                    سينما بلس إلى استكشاف الفيلم كشكل فني ومصدر للترفيه وأداة تعليمية
                                @else
                                    CINEMA PLUS strives to provide a wide range of independent, foreign, and classic
                                    films by providing the best in the theatrical industries. Which affects filmmaking
                                    and our culture. CINEMA PLUS endeavors to explore film as an art form,
                                    entertainment, and educational tool.
                                @endif
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ==========Philosophy-Section========== -->


@endsection
