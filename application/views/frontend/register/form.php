<section class="section">
<div class="container pb-70">
    <div class="row m-0">
        <div class="pl-md-5 mainRow">
            <div role="main" class="main">
                <div class="overflow-hidden">
                    <!-- <span class="d-block top-sub-title text-color-primary appear-animation" data-appear-animation="maskUp" data-appear-animation-delay="600"><b>Launching June 30th 2019</b></span> -->
                </div>
                <br>
                <div class="overflow-hidden mb-2" style="text-align: center;">
                    <h1 class="font-weight-bold text-6 mb-0 appear-animation animated maskUp appear-animation-visible" data-appear-animation="maskUp" data-appear-animation-delay="800" style="animation-delay: 800ms;">Post Your Special Care Home with NBSCHA <span style="color:#CD291D;font-family: PermanentMarker;"><b style="font-weight: 800;">Today!</b></span></h1>
                </div>
                <div class="overflow-hidden mb-1" style="text-align: center;">
                    <p class="text-2 mb-0 appear-animation animated maskUp appear-animation-visible" data-appear-animation="maskUp" data-appear-animation-delay="1000" style="animation-delay: 1000ms; font-size: 17px!important; color: #000;"> Would you like to be added to the New Brunswick Special Care Home Directory?</p><br>
                    <p style="margin-bottom: 0px; font-size: 17px; color: #000;">
                        *<b>Please fill out the fields below, especially all fields that have a (*) as these are mandatory fields and you will not be fully registered without these mandatory items.</b></p>
                    <p style="font-size: 17px; color: #000;">Once you have clicked the <b style="font-weight: 800; color: red">“SUBMIT”</b> button we will send you a confirmation email as soon as payment has been received and your facility was officially added to our website.
                    </p>
                </div>

                <div class="card bg-primary border-0 rounded mb-5 appear-animation animated fadeInUpShorter appear-animation-visible" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="1200" style="animation-delay: 1200ms;padding-bottom:30px;">
                    <div class="card-body p-30">
                        <div class="icon-box icon-box-style-1 align-items-center mb-0">
                            <div class="icon-box-info">
                                <div class="icon-box-info-title">
                                    <span class="icon-box-sub-title text-color-light">FILL IN FORM BELOW</span>
                                    <h4 class="text-color-light font-weight-bold line-height-1 mb-0" style="font-size: 16px;">BE PART OF OUR ONLINE COMMUNITY!</h4>

                                </div>
                            </div>
                        </div>
                        <p class="text-color-light opacity-6 mb-3"></p>
                            <?php
                            $attributes = array('class' => '', 'id' => 'nbchform');
                            echo form_open_multipart(admin_url_string('register'),$attributes);
                            ?>												
                            <div class="form-row">
                                <div class="form-group col-lg-4 ">
                                    <input type="text" class="form-control rounded-0 border-0 line-height-1" placeholder="First Name*" name="first_name" id="first_name" aria-label="First Name" required="">
                                    <div class="error"><?php echo form_error('first_name'); ?></div>
                                </div>
                                <div class="form-group col-lg-4 ">
                                    <input type="text" class="form-control rounded-0 border-0 line-height-1" placeholder="Last Name*" name="last_name" id="last_name" aria-label="Last Name" required="">
                                    <div class="error"><?php echo form_error('last_name'); ?></div>
                                </div>
                                <div class="form-group col-lg-4 ">
                                    <input type="email" class="form-control rounded-0 border-0 line-height-1" placeholder="Email*" name="email" id="email" required="">
                                    <div class="error"><?php echo form_error('last_name'); ?></div>
                                </div>
                                <div class="form-group col-lg-4 ">
                                    <input type="text" class="form-control rounded-0 border-0 line-height-1" placeholder="Phone Number*" name="phone" id="phone" aria-label="Phone Number" required="">
                                    <div class="error"><?php echo form_error('phone'); ?></div>
                                </div>

                                <div class="form-group col-lg-4 ">
                                    <input type="password" class="form-control rounded-0 border-0 line-height-1" placeholder="Password*" name="password" id="password" aria-label="Password" required="">
                                    <div class="error"><?php echo form_error('password'); ?></div>
                                </div>
                                <div class="form-group col-lg-4 ">
                                    <input type="password" class="form-control rounded-0 border-0 line-height-1" placeholder="Confirm Password" name="confirm_password" id="confirm_password" aria-label="Confirm Password" required="">
                                    <div class="error"><?php echo form_error('confirm_password'); ?></div>
                                </div>
                                <div id="sc_427" class="row ap-cls">
                                    <div class="form-group col-lg-12">
                                        <div class="icon-box-info">
                                            <div class="icon-box-info-title">
                                                <span class="icon-box-sub-title text-color-light">FILL IN FORM BELOW</span>
                                                <h4 class="text-color-light font-weight-bold line-height-1 mb-0" style="font-size: 16px;">Add Special Care Home Details!</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="spchclass form-group col-lg-4 ">
                                        <input type="text" class="form-control rounded-0 border-0 line-height-1" placeholder="Special Care Home Name*" name="spch[sp_427][spch_name]" id="spch[sp_427][spch_name]_spid_427" required="" onchange="">
                                    </div>
                                    <div class="spchclass form-group col-lg-4 ">
                                        <input type="text" class="form-control rounded-0 border-0 line-height-1" placeholder="Special Care Home Address*" name="spch[sp_427][spch_address]" id="spch[sp_427][spch_address]_spid_427" required="" onchange="">
                                    </div>
                                    <div class="spchclass form-group col-lg-4 ">
                                        <input type="text" class="form-control rounded-0 border-0 line-height-1" placeholder="Special Care Home Postal Code*" name="spch[sp_427][spch_postal_code]" id="spch[sp_427][spch_postal_code]_spid_427" required="" onchange="">
                                    </div>
                                    <div class="spchclass form-group col-lg-4 ">
                                        <input type="text" class="form-control rounded-0 border-0 line-height-1" placeholder="Special Care Home Contact Person*" name="spch[sp_427][spch_contact_name]" id="spch[sp_427][spch_contact_name]_spid_427" required="" onchange="">
                                    </div>
                                    <div class="spchclass form-group col-lg-4 ">
                                        <input type="email" class="form-control rounded-0 border-0 line-height-1" placeholder="Special Care Home Email*" name="spch[sp_427][spch_email]" id="spch[sp_427][spch_email]_spid_427" required="" onchange="">
                                    </div>
                                    <div class="spchclass form-group col-lg-4 ">
                                        <input type="text" class="form-control rounded-0 border-0 line-height-1" placeholder="Special Care Home Phone*" name="spch[sp_427][spch_phone]" id="spch[sp_427][spch_phone]_spid_427" required="" onchange="">
                                    </div>
                                    <div class="spchclass form-group col-lg-4 ">
                                        <input type="text" class="form-control rounded-0 border-0 line-height-1" placeholder="Special Care Home Fax Number" name="spch[sp_427][spch_fax]" id="spch[sp_427][spch_fax]_spid_427" onchange="">
                                    </div>
                                <div class="spchclass form-group col-lg-4 ">
                                    <select class="form-control rounded-0 border-0 line-height-1" name="spch[sp_427][spch_num_bed]" id="spch[sp_427][spch_num_bed]_spid_427" required="">
                                      <option value="">--Select Number of Beds*--</option>
                                      <?php foreach($packages as $package): ?>
                                      <option value="<?php echo $package['pid']; ?>"><?php echo $package['title']; ?></option>
                                      <?php endforeach; ?>
                                    </select>
                                  </div>
                                  <div class="spchclass form-group col-lg-4 ">
                                    <select class="form-control rounded-0 border-0 line-height-1" name="spch[sp_427][spch_level_care]" id="spch[sp_427][spch_level_care]_spid_427" required="">
                                      <option value="">--Select Level of Care*--</option>
                                      <?php foreach($levels as $level): ?>
                                      <option value="<?php echo $level['cid']; ?>"><?php echo $level['carelevel_title']; ?></option>
                                      <?php endforeach; ?>
                                    </select>
                                  </div>
                                  <div class="spchclass form-group col-lg-4 ">
                                    <input type="text" class="form-control rounded-0 border-0 line-height-1" placeholder="Special Care Home Pharmacy Name*" name="spch[sp_427][spch_pharmacy_name]" id="spch[sp_427][spch_pharmacy_name]_spid_427" required="" onchange="">
                                  </div>

                                <!-- <div class="spchclass form-group col-lg-4 "><select class="form-control rounded-0 border-0 line-height-1" name="spch[sp_427][facility]" id="spch[sp_427][facility]_spid_427" required=""><option value="">--Select Facility*--</option><option value="Mental Health">Mental Health</option><option value="Intellectual and Developmental Disabilities">Intellectual and Developmental Disabilities</option><option value="Seniors">Seniors</option><option value="Blended Facility">Blended Facility</option></select></div> -->

                                <div class="spchclass form-group col-lg-4 rounded-0 border-0 line-height-1">
                                        <div class="selectBox">
                                            <select class="form-control" id="facility-select" name="facility-select[]" multiple>
                                                <?php foreach($facilities as $facility): ?>
                                                <option value="<?php echo $facility['fid']; ?>"><?php echo $facility['facility_title']; ?></option>
                                                <?php endforeach; ?>
                                            </select>

                                        </div>

                                </div>

                                <div class="spchclass form-group col-lg-4 ">
                                  <select class="form-control rounded-0 border-0 line-height-1" name="spch[sp_427][region]" id="spch[sp_427][region]_spid_427" required="">
                                    <option value="">--Select Region*--</option>
                                    <?php foreach($regions as $region): ?>
                                      <option value="<?php echo $region['rid']; ?>"><?php echo $region['region_name']; ?></option>
                                      <?php endforeach; ?>
                                  </select>
                                </div>


                                <div class="spchclass form-group col-lg-12 "><textarea class="form-control rounded-0 border-0 line-height-1" placeholder="Description of Home and Services to the Public" name="spch[sp_427][public_description]" id="spch[sp_4273][public_description]_spid_4273" style="height: 150px!important;" required=""></textarea></div>

                                <div class="spchclass form-group col-lg-12 "><textarea class="form-control rounded-0 border-0 line-height-1" placeholder="Notes/Comments for Admin" name="spch[sp_427][spch_notes]" id="spch[sp_427][spch_notes]_spid_427" required=""></textarea></div>


                                <div class="spchclass form-group col-lg-4 ">
                                  <label class="label-control">Upload Main Image</label>*<input type="file" class="form-control rounded-0 border-0 line-height-1" placeholder="Special Care Home Notes" name="spch[sp_427][photo_url]" id="spch[sp_427][photo_url]_spid_427" required="" onchange="addRemoeOpt(this)"></div>
                                  <div class="spchclass form-group col-lg-4 "><label class="label-control">Upload 2nd Image</label><input type="file" class="form-control rounded-0 border-0 line-height-1" placeholder="Special Care Home Notes" name="spch[sp_427][photo_url_two]" id="spch[sp_427][photo_url_two]_spid_427" onchange="addRemoeOpt(this)"></div>
                                  <div class="spchclass form-group col-lg-4 "><label class="label-control">Upload 3rd Image</label><input type="file" class="form-control rounded-0 border-0 line-height-1" placeholder="Notes" name="spch[sp_427][photo_url_three]" id="spch[sp_427][photo_url_three]_spid_427" onchange="addRemoeOpt(this)"></div>
                                  <div class="spchclass form-group col-lg-4 "><label class="label-control">Upload 4th Image</label><input type="file" class="form-control rounded-0 border-0 line-height-1" placeholder="Notes" name="spch[sp_427][photo_url_four]" id="spch[sp_427][photo_url_four]_spid_427" onchange="addRemoeOpt(this)"></div>
                                  <div class="spchclass form-group col-lg-4 "><label class="label-control">Upload 5th Image</label><input type="file" class="form-control rounded-0 border-0 line-height-1" placeholder="Notes" name="spch[sp_427][photo_url_five]" id="spch[sp_427][photo_url_five]_spid_427" onchange="addRemoeOpt(this)"></div>
                                  <div class="spchclass form-group col-lg-4 "><label class="label-control">Upload 6th Image</label><input type="file" class="form-control rounded-0 border-0 line-height-1" placeholder="Notes" name="spch[sp_427][photo_url_six]" id="spch[sp_427][photo_url_six]_spid_427" onchange="addRemoeOpt(this)"></div>
                                  <div class="spchclass form-group col-lg-4 "><input type="text" class="form-control rounded-0 border-0 line-height-1" placeholder="Facebook link" name="spch[sp_427][fb_url]" id="spch[sp_427][fb_url]_spid_427" onchange=""></div>
                                  <div class="spchclass form-group col-lg-4 "><input type="text" class="form-control rounded-0 border-0 line-height-1" placeholder="Instagram link" name="spch[sp_427][inst_url]" id="spch[sp_427][inst_url]_spid_427" onchange=""></div>
                                  <div class="spchclass form-group col-lg-4 "><input type="text" class="form-control rounded-0 border-0 line-height-1" placeholder="Twitter link" name="spch[sp_427][twi_url]" id="spch[sp_427][twi_url]_spid_427" onchange=""></div>
                                  <div class="spchclass form-group col-lg-4 "><input type="text" class="form-control rounded-0 border-0 line-height-1" placeholder="YouTube link" name="spch[sp_427][youtube_url]" id="spch[sp_427][youtube_url]_spid_427" onchange=""></div>
                                  <div class="spchclass form-group col-lg-4 "><input type="text" class="form-control rounded-0 border-0 line-height-1" placeholder="LinkedIn link" name="spch[sp_427][linkdin_url]" id="spch[sp_427][linkdin_url]_spid_427" onchange=""></div>
                                  <div class="spchclass form-group col-lg-4 "><input type="text" class="form-control rounded-0 border-0 line-height-1" placeholder="Website link" name="spch[sp_427][website_url]" id="spch[sp_427][website_url]_spid_427" onchange=""></div>
                                  <div class="form-group col-lg-12 t-wh"><h4>Please check the boxes if you answer <b><u>YES</u></b> to any of the following questions:</h4></div>
                                    <?php foreach($features as $feature): ?>
                                        <div class=" che-cls form-group col-lg-6 ">
                                            <input type="checkbox" class="mr-3 rounded-0 border-0 line-height-1" name="features[<?php echo $feature['fid']; ?>]" id="feature-<?php echo $feature['fid']; ?>" value="1">
                                            <?php echo $feature['feature_title']; ?>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                                <div class="form-group col-lg-12">
                                  <h4>Yearly Membership Fees: <span id="invoice-amount" class="invoice-amount">$200.00</span></h4>
                                </div>
                                <div class="form-group col-lg-12 payment-option">

                                    <h4>Please chose your Preferred payment option:</h4>
                                   <input type="radio" id="etransfer" name="preferred-payment" value="HTML">
                                  <label for="etransfer">E-Transfer</label><br>
                                  <input type="radio" id="check" name="preferred-payment" value="CSS">
                                  <label for="check">Check</label><br>
                                  <input type="radio" id="cash" name="preferred-payment" value="JavaScript">
                                  <label for="cash">Cash</label>
                                  <input  style="display:none;" type="text" class="form-control rounded-0 border-0 line-height-1" placeholder="Payment Info" name="payment_info" id="payment_info" aria-label="Payment Info">

                                </div>
                            <div class="form-group col-lg-12 text-center">
                                <input type="submit" value="Finished/Submit" class="btnsubmit btn btn-quaternary btn-v-3 font-weight-semibold justify-content-center w-100 h-100 rounded-0" onclick="validate_form()">
                            </div>
                            </div>
                        </form>
                    </div>
                </div>





            </div>

        </div>
    </div>
</div>
</section>
