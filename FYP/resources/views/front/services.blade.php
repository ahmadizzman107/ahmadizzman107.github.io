<!-- ======= Services Section ======= -->
<section id="services">
    <div class="container">

        <header class="section-header wow fadeInUp">
            <h3>{{ $data['service']->title_services }}</h3>
        </header>

        <div class="row">
            {{-- Tile 1 --}}
            <div class="col-lg-4 col-md-6 box wow bounceInUp" data-wow-duration="1.4s">
                <div class="icon"><i class="ion-ios-analytics-outline"></i></div>
                <h4 class="title"><a href="">{{ $data['service']->title_tile_1 }}</a></h4>
                <p class="description">{{ $data['service']->desc_tile_1 }}</p>
            </div>
            {{-- Tile 2 --}}
            <div class="col-lg-4 col-md-6 box wow bounceInUp" data-wow-duration="1.4s">
                <div class="icon"><i class="ion-ios-bookmarks-outline"></i></div>
                <h4 class="title"><a href="">{{ $data['service']->title_tile_2 }}</a></h4>
                <p class="description">{{ $data['service']->desc_tile_2 }}</p>
            </div>
            {{-- Tile 3 --}}
            <div class="col-lg-4 col-md-6 box wow bounceInUp" data-wow-duration="1.4s">
                <div class="icon"><i class="ion-ios-paper-outline"></i></div>
                <h4 class="title"><a href="">{{ $data['service']->title_tile_3 }}</a></h4>
                <p class="description">{{ $data['service']->desc_tile_3 }}</p>
            </div>
            {{-- Tile 4 --}}
            <div class="col-lg-4 col-md-6 box wow bounceInUp" data-wow-delay="0.1s" data-wow-duration="1.4s">
                <div class="icon"><i class="ion-ios-speedometer-outline"></i></div>
                <h4 class="title"><a href="">{{ $data['service']->title_tile_4 }}</a></h4>
                <p class="description">{{ $data['service']->desc_tile_4 }}
                </p>
            </div>
            {{-- Tile 5 --}}
            <div class="col-lg-4 col-md-6 box wow bounceInUp" data-wow-delay="0.1s" data-wow-duration="1.4s">
                <div class="icon"><i class="ion-ios-barcode-outline"></i></div>
                <h4 class="title"><a href="">{{ $data['service']->title_tile_5 }}</a></h4>
                <p class="description">{{ $data['service']->desc_tile_5 }}</p>
            </div>
            {{-- Tile 6 --}}
            <div class="col-lg-4 col-md-6 box wow bounceInUp" data-wow-delay="0.1s" data-wow-duration="1.4s">
                <div class="icon"><i class="ion-ios-people-outline"></i></div>
                <h4 class="title"><a href="">{{ $data['service']->title_tile_6 }}</a></h4>
                <p class="description">{{ $data['service']->desc_tile_6 }}</p>
            </div>

        </div>

    </div>
</section><!-- End Services Section -->
