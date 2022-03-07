<?php if(count($stypes)>0){ ?>
<section class="faq-area ptb-60 faq-form-wrap">
    <div class="container">
        <div class="row align-items-center">
            <h3 class="faq-form-title"><?php echo $title ?></h3>
            <div class="col-lg-12 col-md-12 fmts-form">
                <form id="sponsorshipForm">
                    <div class="row">
                        <div class="col-lg-12 col-md-12">
                            <div class="form-group">
                                <label for="name">Sponsorship Type*</label>
                                <div class="radios">
                                    <?php $i=0; foreach($stypes as $stype): $i++; ?>
                                    <div class="radio">
                                        <input id="stypes-<?php echo $stype['id']; ?>" class="stypes" type="checkbox" data-show-prize="<?php echo $stype['prize']; ?>" <?php if($i=='1'){ ?> data-error="Please choose advertising option" required <?php } ?> name="stype[]" value="<?php echo $stype['id']; ?>">
                                        <label for="stypes-<?php echo $stype['id']; ?>"><?php echo $stype['name']; ?></label>
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
                        <div id="prize_details_wrap" class="col-lg-12 col-md-12" style="display:none;">
                            <div class="form-group">
                                <label for="prize_details">Prize Details*</label>
                                <textarea name="prize_details" class="form-control" id="prize_details" cols="30" rows="3"></textarea>
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="form-group">
                                <label for="amount">Value($)*</label>
                                <input type="text" class="form-control" name="amount" id="amount" placeholder="0.00" required data-error="Please enter value">
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