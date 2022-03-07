<section class="faq-area ptb-60 faq-form-wrap">
    <div class="container">
        <div class="row align-items-center">
            <h3 class="faq-form-title"><?php echo $title ?></h3>
            <div class="col-lg-12 col-md-12">
                <form id="contactForm">
                    <input type="hidden" name="type" id="type" value="Ask Your Question">
                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            <div class="form-group">
                                <label for="name">Name*</label>
                                <input type="text" class="form-control" name="name" id="name" required data-error="Please enter your name">
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6">
                            <div class="form-group">
                                <label for="email">Email*</label>
                                <input type="email" class="form-control" name="email" id="email" required data-error="Please enter your email">
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6">
                            <div class="form-group">
                                <label for="subject">Subject*</label>
                                <input type="text" class="form-control" name="subject" id="subject" required data-error="Please enter your subject">
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6">
                            <div class="form-group">
                                <label for="phone">Phone Number</label>
                                <input type="text" class="form-control" name="phone" id="phone" data-error="Please enter your number">
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>

                        <div class="col-lg-12 col-md-12">
                            <div class="form-group">
                                <label for="message">Message*</label>
                                <textarea name="message" class="form-control" id="message" cols="30" rows="4" required data-error="Write your message"></textarea>
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>

                        <div class="col-lg-12 col-md-12">
                            <button type="submit" class="btn btn-primary">Send Message</button>
                            <div id="msgSubmit" class="h3 text-center hidden"></div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>