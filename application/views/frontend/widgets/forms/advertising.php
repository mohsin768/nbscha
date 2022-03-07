<?php if(count($aoptions)>0){ ?>
<section class="faq-area ptb-60 faq-form-wrap">
    <div class="container">
        <div class="row align-items-center">
            <h3 class="faq-form-title"><?php echo $title ?></h3>
            <div class="col-lg-12 col-md-12 fmts-form">
                <form id="advertisingForm">
                    <div class="row">
                        <div class="col-lg-12 col-md-12">
                            <div class="form-group">
                                <label for="name">Advertising Options (select one)*</label>
                                <div class="radios">
                                    <?php foreach($aoptions as $aoption): ?>
                                    <div class="radio">
                                        <input id="aoptions-<?php echo $aoption['id']; ?>" class="radio" type="radio"  data-error="Please choose advertising option" required name="aoption" value="<?php echo $aoption['id']; ?>">
                                        <label for="aoptions-<?php echo $aoption['id']; ?>"><?php echo $aoption['name']; ?> ($<?php echo $aoption['price']; ?>)</label>
                                    </div>
                                    <?php endforeach; ?>
                                </div>
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12">
                            <div class="form-group">
                                <label for="company_name">Company Name*</label>
                                <input type="text" class="form-control" name="company_name" id="company_name" required data-error="Please enter your company name">
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="form-group">
                                <label for="first_name">First Name*</label>
                                <input type="text" class="form-control" name="first_name" id="first_name" required data-error="Please enter your first name">
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="form-group">
                                <label for="last_name">Last Name*</label>
                                <input type="text" class="form-control" name="last_name" id="last_name" required data-error="Please enter your last name">
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
                                <label for="subject">Phone*</label>
                                <input type="text" class="form-control" name="phone" id="phone" required data-error="Please enter your phone">
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="form-group">
                                <label for="website">Website</label>
                                <input type="text" class="form-control" name="website" id="website">
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>

                        <div class="col-lg-12 col-md-12">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <div id="msgSubmit" class="h3 text-center hidden"></div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<?php } ?>