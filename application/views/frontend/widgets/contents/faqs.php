<?php if(count($faqs)>0){ ?>
<section class="position-inherit">
	    <div class="container">
	      <div class="row">
	        <div class="col-md-3 scrolltofixed-container">
	          <div class="list-group scrolltofixed-sidebar z-index-0" style="z-index: 1000;">
                <?php $i=0; foreach($faqs as $faq): $i++; ?>
	            <a href="#section-<?php echo $i; ?>" class="list-group-item smooth-scroll-to-target"><?php echo $faq['question']; ?></a>
	            <?php endforeach; ?>
	          </div>
              <div>
              </div>

	          <script>
	            /* scrollto fixed script */
	            $(document).ready(function(e) {
	              if($(window).width() >= 768){
	                $('.scrolltofixed-sidebar').scrollToFixed({
	                    marginTop: $('.header .header-nav').outerHeight(true) + 100,
	                    limit: function() {
	                        var limit = $('.footer').offset().top - $(this).outerHeight(true) - 10;
	                        return limit;
	                    }
	                });
	              }
	            });
	          </script>
	        </div>
	        <div class="col-md-9">
                <?php $i=0; foreach($faqs as $faq): $i++; ?>
		        <div id="section-<?php echo $i; ?>" class="mb-50">
                <h3><?php echo $faq['question']; ?></h3>
		        <hr>
                <?php echo $faq['answer']; ?>
                </div>
                <?php endforeach; ?>
	        </div>
	        
	        
	      </div>
	    </div>
	  </section>
<?php } ?>