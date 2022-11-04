<!-- Footer -->
<footer id="footer" class="footer bg-black-222" data-bg-img="<?php echo frontend_assets_url('images/footer-bg.png'); ?>">
<div class="container pt-70 pb-40">
    <div class="row">
    <div class="col-sm-6 col-md-3">
        <div class="widget dark">
        <img class="mt-10 mb-15" alt="" src="<?php echo frontend_assets_url('images/logo_footer.png'); ?>">
        <p class="font-16 mb-10"><?php echo $this->settings['FOOTER_MISSION']; ?></p>
        </div>
    </div>
    <div class="col-sm-6 col-md-3">
        <div class="widget dark">
        <h5 class="widget-title line-bottom"><?php echo translate('LATEST_NEWS','Latest News');?></h5>
        <div class="latest-posts">
            <?php if(is_array($news) && count($news)>0){ ?>
            <?php $i=0; foreach($news as $newsitem): $i++; ?>
            <article class="post media-post clearfix pb-0 mb-10">
            <div class="post-right">
                <h5 class="post-title mt-0 mb-5"><a href="<?php echo news_url($newsitem['slug']); ?>"><?php echo $newsitem['title']; ?></a></h5>
                <p class="post-date mb-0 font-12"><?php echo date('d F Y',strtotime($newsitem['publish_date'])); ?></p>
            </div>
            </article>
            <?php endforeach; } ?>
        </div>
        </div>
    </div>
    <div class="col-sm-6 col-md-3">
        <div class="widget dark">
        <h5 class="widget-title line-bottom"><?php echo translate('RESOURCES','Resources');?></h5>
        <ul class="list-border">
            <?php if(is_array($links) && count($links)>0){ ?>
            <?php $i=0; foreach($links as $link): $i++; ?>
                <li><a href="<?php echo $link['link_url']; ?>" target="_blank"><?php echo $link['name']; ?></a></li>
            <?php endforeach; } ?>
        </ul>
        </div>
    </div>
    <div class="col-sm-6 col-md-3">
        <div class="widget dark">
        <h5 class="widget-title line-bottom"><?php echo translate('QUICK_CONTACT','Quick Contact');?></h5>
        <ul class="list-border">
            <li><a href="tel:+<?php echo preg_replace("/[^0-9]/", "", $this->settings['CONTACT_PHONE']); ?>"><?php echo $this->settings['CONTACT_PHONE']; ?></a></li>
            <li><a href="mailto:<?php echo $this->settings['CONTACT_EMAIL']; ?>"><?php echo $this->settings['CONTACT_EMAIL']; ?></a></li>
            <li><a href="#" class="lineheight-20"><?php echo $this->settings['CONTACT_ADDRESS']; ?></a></li>
        </ul>
        <p class="font-16 text-white mb-5 mt-15"><?php echo translate('WANT_TO_HEAR','Want To Hear From Us?');?></p>
        <form id="footer-mailchimp-subscription-form" class="newsletter-form mt-10">
            <input type="hidden" name="_token" value="E6wKJ3XoRj1fUT597IzVbKWI2aM0IySP2Q2xgERn">              <label class="display-block" for="mce-EMAIL"></label>
            <div class="input-group">
            <input type="email" value="" name="email" placeholder="<?php echo translate('YOUR_EMAIL','Your Email');?>"  class="form-control" data-height="37px" id="mce-EMAIL">
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
        <div class="col-md-10">
        <p class="font-11 text-black-777 m-0"><?php echo translate('COPYRIGHT','Copyright');?> &copy;<?php echo date('Y'); ?> <?php echo $this->settings['SITE_NAME']; ?>. <?php echo translate('RIGHTS_RESERVED','All Rights Reserved');?></p>
        </div>
        <div class="col-md-2 text-right">
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
