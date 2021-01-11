<!-- ======= About Us Section ======= -->
<section id="about">
    <div class="container">

        <header class="section-header">
            <h3>{{ $about->title_about }}</h3>
            <p>{{ $about->desc_about }}</p>
        </header>

        <div class="row about-cols">

            <div class="col-md-4 wow fadeInUp">
                <div class="about-col">
                    <div class="img">
                        <img src="/assets/img/our-mission.png" alt="" class="img-fluid">
                        <div class="icon"><i class="ion-ios-speedometer-outline"></i></div>
                    </div>
                    <h2 class="title"><a href="#">{{ $about->title_mission }}</a></h2>
                    <p>
                        {{ $about->desc_mission }}
                    </p>
                </div>
            </div>

            <div class="col-md-4 wow fadeInUp" data-wow-delay="0.1s">
                <div class="about-col">
                    <div class="img">
                        <img src="/assets/img/our-people.png" alt="" class="img-fluid">
                        <div class="icon"><i class="ion-ios-list-outline"></i></div>
                    </div>
                    <h2 class="title"><a href="#"></a>{{ $about->title_people }}</h2>
                    <p>
                        {{ $about->desc_people }}
                    </p>
                </div>
            </div>

            <div class="col-md-4 wow fadeInUp" data-wow-delay="0.2s">
                <div class="about-col">
                    <div class="img">
                        <img src="/assets/img/our-vision.png" alt="" class="img-fluid">
                        <div class="icon"><i class="ion-ios-eye-outline"></i></div>
                    </div>
                    <h2 class="title"><a href="#">{{ $about->title_vision }}</a></h2>
                    <p>
                        {{ $about->desc_vision }}
                    </p>
                </div>
            </div>

            <!-- </div> -->

        </div>
    </div>
</section><!-- End About Us Section -->
