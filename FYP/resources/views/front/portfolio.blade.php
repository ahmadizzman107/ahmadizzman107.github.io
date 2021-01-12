
<!-- ======= Portfolio Section ======= -->
<section id="portfolio" class="section-bg">
    <div class="container">

        <header class="section-header">
            <h3 class="section-title">Our Events</h3>
        </header><br>

        <div class="col-md-12 col-sm-12">
            @foreach ($data['post'] as $post)

            <div class="portfolio-item filter-app wow fadeInUp">
                <div class="portfolio-wrap">

                    <div class="portfolio-info">
                        <h4 style="margin-top: 30px;" ><a href="#" style="float: left; color: #BA55D3;">{{ $post->title }}</a></h4>
                        <ul style="margin-top: 50px;" >
                            <li style="float: left;">
                                <i class="fa fa-calendar"></i>
                                <span>{{ \Carbon\Carbon::parse($post->date)->format('j F, Y') }}</span>
                            </li>
                            <li style="float: left;">
                                <i class="fa fa-clock-o" ></i>
                                <span>{{ \Carbon\Carbon::parse($post->time_start)->format('h:i A') }} to {{ \Carbon\Carbon::parse($post->time_end)->format('h:i A') }}</span>
                            </li>
                            <li style="float: left;">
                                <i class="fa fa-map-marker"></i>
                                <span>{{ $post->location }}</span>
                            </li>
                            <li style="float: right;">
                                <a href="" class="detail-button">Event Detail</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            @endforeach

        </div>

    </div>


<script>
var coll = document.getElementsByClassName("collapsible");
var i;

for (i = 0; i < coll.length; i++) {
  coll[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var content = this.nextElementSibling;
    if (content.style.display === "block") {
      content.style.display = "none";
    } else {
      content.style.display = "block";
    }
  });
}
</script>
</section><!-- End Portfolio Section -->

