<!-- Footer -->
<footer id="footer" class="footer bg-black-222" data-bg-img="images/footer-bg.png">
<div class="container pt-70 pb-40">
    <div class="row">
    <div class="col-sm-6 col-md-3">
        <div class="widget dark">
        <img class="mt-10 mb-15" alt="" src="<?php echo frontend_assets_url('images/logo_footer.png'); ?>">
        <p class="font-16 mb-10">The New Brunswick Special Care Home Association Inc. aims to assist members in providing quality, cost effective services for seniors, mental health residents, and adults with disabilities in cooperation with the Department of Social Development.</p>
        <ul class="styled-icons icon-dark mt-20">
            <!-- <li class="wow fadeInLeft" data-wow-duration="1.5s" data-wow-delay=".1s" data-wow-offset="10"><a href="#" data-bg-color="#3B5998"><i class="fa fa-facebook"></i></a></li>
            <li class="wow fadeInLeft" data-wow-duration="1.5s" data-wow-delay=".2s" data-wow-offset="10"><a href="#" data-bg-color="#02B0E8"><i class="fa fa-twitter"></i></a></li>
            <li class="wow fadeInLeft" data-wow-duration="1.5s" data-wow-delay=".3s" data-wow-offset="10"><a href="#" data-bg-color="#05A7E3"><i class="fa fa-skype"></i></a></li>
            <li class="wow fadeInLeft" data-wow-duration="1.5s" data-wow-delay=".4s" data-wow-offset="10"><a href="#" data-bg-color="#A11312"><i class="fa fa-google-plus"></i></a></li>
            <li class="wow fadeInLeft" data-wow-duration="1.5s" data-wow-delay=".5s" data-wow-offset="10"><a href="#" data-bg-color="#C22E2A"><i class="fa fa-youtube"></i></a></li> -->
        </ul>
        </div>
    </div>
    <div class="col-sm-6 col-md-3">
        <div class="widget dark">
        <h5 class="widget-title line-bottom">Latest News</h5>
        <div class="latest-posts">
                                        <article class="post media-post clearfix pb-0 mb-10">
            <!-- <a href="https://nbscha.ca/event-detail?id=21" class="post-thumb"><img alt="" src="https://nbscha.ca/public/" style="width: 80px; height: 55px;"></a> -->
            <div class="post-right">
                <h5 class="post-title mt-0 mb-5"><a href="news-details.html">NBSCHA Affordable. Quality. No...</a></h5>
                <p class="post-date mb-0 font-12">31&nbsp;March</p>
            </div>
            </article>
                        </div>
        </div>
    </div>
    <div class="col-sm-6 col-md-3">
        <div class="widget dark">
        <h5 class="widget-title line-bottom">Resources</h5>
        <ul class="list-border">
                                        <li><a href="https://www.gnb.ca/socialdevelopment" target="_blank">Department of Social Development</a></li>
                            <li><a href="https://www.gnb.ca/" target="_blank">Government of New Brunswick</a></li>
                            <li><a href="https://www.worksafenb.ca/" target="_blank">Workplace Health and Safety</a></li>
                            <li><a href="http://laws.gnb.ca/en/showfulldoc/cs/P-5.05//20210114" target="_blank">Pay Equity Act</a></li>
                        </ul>
        </div>
    </div>
    <div class="col-sm-6 col-md-3">
        <div class="widget dark">
        <h5 class="widget-title line-bottom">Quick Contact</h5>
        <ul class="list-border">
            <li><a href="#">(506) 639-4478</a></li>
            <li><a href="#">info@nbscha.com</a></li>
            <li><a href="#" class="lineheight-20">527 Dundonald Street, Suite 176 Fredericton, New Brunswick E3B 1X5</a></li>
        </ul>
        <p class="font-16 text-white mb-5 mt-15">Want To Hear From Us?</p>
        <form id="footer-mailchimp-subscription-form" class="newsletter-form mt-10">
            <input type="hidden" name="_token" value="E6wKJ3XoRj1fUT597IzVbKWI2aM0IySP2Q2xgERn">              <label class="display-block" for="mce-EMAIL"></label>
            <div class="input-group">
            <input type="email" value="" name="email" placeholder="Your Email"  class="form-control" data-height="37px" id="mce-EMAIL">
            <span class="input-group-btn">
                <button type="submit" class="btn btn-colored btn-theme-colored m-0"><i class="fa fa-paper-plane-o text-white"></i></button>
            </span>
            </div>
        </form>

        <!-- Mailchimp Subscription Form Validation-->
        <script type="text/javascript">
            $('#footer-mailchimp-subscription-form').submit(function(e){
            e.preventDefault();
            $.ajax({
                type : 'POST',
                url: 'https://nbscha.ca/send-subscriber-email',
                data: $('#footer-mailchimp-subscription-form').serialize(),
                success : mailChimpCallBack
            });
            });

            function mailChimpCallBack(resp) {
                // Hide any previous response text
                var $mailchimpform = $('#footer-mailchimp-subscription-form'),
                    $response = '';
                $mailchimpform.children(".alert").remove();
                if (resp.result === 'success') {
                    $response = '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' + resp.message + '</div>';
                } else if (resp.result === 'error') {
                    $response = '<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' + resp.message + '</div>';
                }
                $mailchimpform.prepend($response);
            }
        </script>
        </div>
    </div>
    </div>
</div>
<div class="footer-bottom bg-black-333">
    <div class="container pt-20 pb-20">
    <div class="row">
        <div class="col-md-6">
        <p class="font-11 text-black-777 m-0">Copyright &copy;2022 NBSCHA. All Rights Reserved</p>
        </div>
        <div class="col-md-6 text-right">
        <div class="widget no-border m-0">
            <ul class="list-inline sm-text-center mt-5 font-12">
            <!-- <li>
                <a href="faq">FAQ</a>
            </li>
            <li>|</li>
            <li>
                <a href="site-map">Site Map</a>
            </li>
            <li>|</li>
            <li>
                <a href="contact">Contact</a>
            </li> -->
            </ul>
        </div>
        </div>
    </div>
    </div>
</div>
</footer>