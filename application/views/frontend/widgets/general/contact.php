<section class="contact-area ptb-120">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-6">
                <div class="contact-box">
                    <div class="icon">
                        <i class="icofont-phone"></i>
                    </div>

                    <div class="content">
                        <h4>Phone / Fax</h4>
                        <?php echo $contact_phone; ?>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="contact-box">
                    <div class="icon">
                        <i class="icofont-email"></i>
                    </div>

                    <div class="content">
                        <h4>E-mail</h4>
                        <?php echo $contact_email; ?>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 offset-lg-0 offset-md-3">
                <div class="contact-box">
                    <div class="icon">
                        <i class="icofont-world"></i>
                    </div>

                    <div class="content">
                        <h4>Location</h4>
                        <?php echo $contact_location; ?>
                    </div>
                </div>
            </div>
        </div>

        <div class="row h-100 align-items-center contact-form">
            <div class="col-lg-4 col-md-12">
                <div class="leave-your-message">
                    <h3>Leave Your Message</h3>
                    <?php echo $contact_message; ?>

                    <div class="stay-connected">
                        <h3>Stay Connected</h3>
                        <ul>
                            <?php if($facebook!=''){ ?>
                            <li>
                                <a href="<?php echo $facebook; ?>" target="_blank">
                                    <i class="icofont-facebook"></i>

                                    <span>Facebook</span>
                                </a>
                            </li>
                            <?php } ?>
                            <?php if($twitter!=''){ ?>          
                            <li>
                                <a href="<?php echo $twitter; ?>" target="_blank">
                                    <i class="icofont-twitter"></i>

                                    <span>Twitter</span>
                                </a>
                            </li>
                            <?php } ?>
                            <?php if($instagram!=''){ ?>
                            <li>
                                <a href="<?php echo $instagram; ?>" target="_blank">
                                    <i class="icofont-instagram"></i>

                                    <span>Instagram</span>
                                </a>
                            </li>
                            <?php } ?>
                            <?php if($linkedin!=''){ ?>
                            <li>
                                <a href="<?php echo $linkedin; ?>" target="_blank">
                                    <i class="icofont-linkedin"></i>

                                    <span>Linkedin</span>
                                </a>
                            </li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-lg-8 col-md-12">
                <form id="contactForm">
                    <input type="hidden" name="type" id="type" value="Contact">
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
                                <label for="number">Phone Number</label>
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