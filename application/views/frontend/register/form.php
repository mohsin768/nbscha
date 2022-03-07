
    
<div class="blog-details before-after bg-white register-form">
    <div class="container">
        <div class="entry-post">
            <div class="entry-thumbnail">
            <img class="img-responsive" src="<?php echo frontend_assets_url('images/register-bg.png'); ?>" alt="Rock of Ages">
            </div>
        </div>
        <div class="register-summary">
            Please note: Registration booking form and the fees must paid prior to beginning music sessions at ROA.
        </div>
        <div class="container">
            <?php if($this->session->flashdata('message')){ ?>
            <div class="col-md-12 reponse_msg mt-3 no-padding">
                <div class="alert <?php echo $this->session->flashdata('message')['status']; ?>" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <?php echo $this->session->flashdata('message')['message']; ?>
                </div>
            </div>
            <?php } ?>
            <?php 
            $attributes = array('class' => 'contact_form form-transparent', 'id' => 'register-form');
            echo form_open(site_url('register'),$attributes);
            ?>
            <div class="row" id="app-nd">
                <div class="field col-sm-6 form-group">
                <p>Choose an instrument <span class="colored">*</span></p>
                <select class="form-control required" required="required" name="instrument">
                <option value="">---Choose Instrument---</option>
                <?php foreach($instruments as $instrument): ?>
                    <option value="<?php echo $instrument['title']; ?>" <?php echo set_select('instrument', $instrument['title'], false); ?>><?php echo $instrument['title']; ?></option>
                <?php endforeach; ?>
                </select>
                <?php echo form_error('instrument'); ?>
                </div>

                <div class="field col-sm-6 form-group">
                <p>Name<span class="colored">*</span></p>
                <input name="name" value="<?php echo set_value('instrument'); ?>" type="text" class="form-control required" placeholder="" required="required">
                <?php echo form_error('name'); ?>
                </div>

                <div class="field col-sm-12 form-group">
                <p>Address<span class="colored">*</span></p>
                <input name="address" value="<?php echo set_value('address'); ?>" type="text" class="form-control required"  placeholder="" required="required">
                <?php echo form_error('address'); ?>
                </div>

                <div class="field col-sm-6 form-group">
                <p>Date of birth<span class="colored">*</span></p>
                <input name="dob" value="<?php echo set_value('dob'); ?>" type="date" class="form-control required"  placeholder="" required="required" autocomplete="off">
                <?php echo form_error('dob'); ?>
                </div>

                <div class="field col-sm-6 form-group">
                <p>Email<span class="colored">*</span></p>
                <input name="email" value="<?php echo set_value('email'); ?>" type="email" class="form-control required" placeholder="" required="required">
                <?php echo form_error('email'); ?>
                </div>

                <div class="field col-sm-6 homecls form-group">
                <p>Home Phone</p>
                <input name="home_phone" value="<?php echo set_value('home_phone'); ?>" type="text" class="form-control"  placeholder="">
                <?php echo form_error('home_phone'); ?>
                </div>

                <div class="field col-sm-6 form-group">
                <p>Cell Phone<span class="colored">*</span></p>
                <input name="mobile" value="<?php echo set_value('mobile'); ?>" type="text" class="form-control required"  placeholder="" required="required">
                <?php echo form_error('mobile'); ?>
                </div>

                <div class="field col-sm-12 form-group">
                <p>How did you find out about us?<span class="colored">*</span></p>
                <input name="find_us" value="<?php echo set_value('find_us'); ?>" type="text" class="form-control required" placeholder="" required="required">
                <?php echo form_error('find_us'); ?>
                </div>

                <div class="field col-sm-12 radioButtons form-group">
                <p>Tell us what level of experience you have in your chosen music-making option<span class="colored">*</span></p>
                <label class="radio-inline"><input type="radio" value="None" name="experience" <?php echo set_radio('experience','None',TRUE); ?>>None</label>
                <label class="radio-inline"><input type="radio" value="Average" name="experience" <?php echo set_radio('experience','Average',FALSE); ?>>Average</label>
                <label class="radio-inline"><input type="radio" value="Good" name="experience" <?php echo set_radio('experience','Good',FALSE); ?>>Good</label>
                <?php echo form_error('experience'); ?>
                </div>

                <div class="field col-sm-12">
                <p>Please summarise your experience</p>
                <textarea name="experience_summary" cols="15" rows="5" class="form-control" placeholder=""><?php echo set_value('experience_summary'); ?></textarea>
                <?php echo form_error('experience_summary'); ?>
                </div>
                <div class="field col-sm-12 form-group">
                <p><b>**The following MUST be completed if student is under 18</b></p>
                </div>
                <div class="field col-sm-6 form-group">
                <p>Emergency Contact Name<span class="colored">*</span></p>
                <input name="emergency_contact_name" value="<?php echo set_value('emergency_contact_name'); ?>" type="text" class="form-control" placeholder="">
                <?php echo form_error('emergency_contact_name'); ?>
                </div>

                <div class="field col-sm-6 form-group">
                <p>Emergency Contact Phone<span class="colored">*</span></p>
                <input name="emergency_contact_phone" value="<?php echo set_value('emergency_contact_phone'); ?>" type="text" class="form-control" placeholder="">
                <?php echo form_error('emergency_contact_phone'); ?>
                </div>
                <div class="field col-sm-12 form-group">
                <p><b>This section is optional for students over 18, but recommended</b></p>
                </div>
                <div class="field col-sm-12 form-group">
                <p>Details of any medical conditions we should be aware of</p>
                <textarea name="medical_condition" cols="15" rows="5" class="form-control" placeholder=""><?php echo set_value('medical_condition'); ?></textarea>
                <?php echo form_error('medical_condition'); ?>
                </div>

                <div class="field col-sm-12 form-group">
                <p><b>What you need to bring to your sessions:&nbsp;(please note that we supply all instruments while attending lessons,  however, the students are required to bring their own headphones,pics, and drumsticks.
                Water is recommended for vocalists.
                </b></p>
                <p><b>Terms of agreement: </b> (by signing this form you agree to be bound by all of the following):  </p>
                <p><b>Payments: </b> On joining Rock Of Ages, you agree that payments are to be made prior to any instruction. Ongoing payments are due the first of every month without exception.  </p>
                <p><b>Make-up classes:  </b> We regret we are unable to make–up same day missed lessons, however, if given 1 weeks’ advance notice, we will happily reschedule the student for a make-up class the same week. </p>
                <p><b>Tutors: </b>In the event of tutor illness/holidays you may sometimes be taught in larger groups than normal. We reserve the right to rotate and substitute tutors at our discretion. </p>
                <p><b>Staff training: </b>On occasions we may record lessons for staff training using audio/video methods.</p>
                <p><b>Disclaimer for promotional Purposes:</b> I understand that the picture and/or video taken at Rock of Ages Music School may be used for promotional purposes.</p>
                </div>
                <div class="field col-sm-12 radioButtons form-group">
                    <p>Are you 18+?</p>
                    <label class="radio-inline"><input type="radio" value="Yes" name="age_confirmation" <?php echo set_radio('age_confirmation','Yes',TRUE); ?>>Yes</label>
                    <label class="radio-inline"><input type="radio" value="No" name="age_confirmation" <?php echo set_radio('age_confirmation','No',FALSE); ?>>No</label>
                    <?php echo form_error('age_confirmation'); ?>
                </div>
                <div class="field col-sm-6 form-group">
                    <p>Student Name<span class="colored">*</span></p>
                    <input name="student_name" type="text" value="<?php echo set_value('student_name'); ?>" class="form-control" placeholder="" required="required">
                    <?php echo form_error('student_name'); ?>
                </div>
                <div class="field col-sm-6 form-group">
                    <p>Date<span class="colored">*</span></p>
                    <input name="agreement_date" value="<?php echo date('d-m-Y'); ?>" type="text" class="form-control" placeholder="" required="required" autocomplete="off" readonly="">
                    <?php echo form_error('agreement_date'); ?>
                </div>
                <div class="field col-sm-12">
                            <p id="signee">Signature of Student<span class="colored">*</span></p>
                            <div class=sigPad>
                                <canvas class=pad width=198 height=55></canvas>
                                <input type=hidden name=output class=output>
                                <br />
                            </div>
                        </div>
                <div class="field col-sm-6 form-group">
                    <label class="checkbox-inline"><input type="checkbox" value="1" name="agreement">I Agree</label>
                    <?php echo form_error('agreement'); ?>
                </div>
            </div>
            <div class="button-container">
                <button type="button" class="clear_btn" id="clear_signature">Clear Signature  </button>

                <button type="submit" id="register-btn" class="button">Submit Application  <i class="fa fa-envelope"></i></button>
            </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>
  
       