<!-- ======= Our Clients Section ======= -->
<section id="clients" class="wow fadeInUp">
    <div class="container">

        <header class="section-header">
            <h3>Our Clients</h3>
        </header>

        <div class="owl-carousel clients-carousel">

            @foreach ($data['client'] as $client)
            <img src={{ asset('assets/images/'.$client->url) }} alt="" width="300" height="169">
            @endforeach
        </div>

    </div>
</section><!-- End Our Clients Section -->
