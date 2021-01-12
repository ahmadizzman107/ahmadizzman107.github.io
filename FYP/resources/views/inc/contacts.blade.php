<div class="col-lg-3 col-md-6 footer-contact">
    <p>
        <strong>Tel:</strong> {{ $data['footer']->tel_no }} <br>
        <strong>Fax:</strong> {{ $data['footer']->fax_no }} <br>
        <strong></strong> {{ $data['footer']->email }} <br>
    </p>

    <div class="social-links">
        <a href={{ $data['footer']->twitter }} class="twitter"><i class="fa fa-twitter"></i></a>
        <a href={{ $data['footer']->facebook }} class="facebook"><i class="fa fa-facebook"></i></a>
        <a href={{ $data['footer']->instagram }} class="instagram"><i class="fa fa-instagram"></i></a>
        <a href={{ $data['footer']->linkedin }} class="linkedin"><i class="fa fa-linkedin"></i></a>
    </div>

</div>
