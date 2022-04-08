
        <?php echo validation_errors();
          $attributes = array('class' => 'form-vertical', 'id' => 'update-requests');
          echo form_open_multipart('',$attributes);
          ?>
          <input type="hidden" name="id" value="<?php echo $request->id;?>" />

          <div class="form-group col-md-4">
              <label class="control-label col-md-12 no-padd" for="first_name">First Name<span>*</span></label>
              <div class="col-md-12 no-padd">
                <?php echo form_error('first_name'); ?>
                <input type="text" class="form-control" name="first_name"  value="<?php echo $request->first_name;?>"></div>
              <div class="clearfix"></div>
          </div>
          <div class="form-group col-md-4">
              <label class="control-label col-md-12 no-padd" for="last_name">Last Name<span>*</span></label>
              <div class="col-md-12 no-padd">
                <?php echo form_error('last_name'); ?>
                <input type="text" class="form-control" name="last_name"  value="<?php echo $request->last_name;?>"></div>
              <div class="clearfix"></div>
          </div>
          <div class="form-group col-md-4">
              <label class="control-label col-md-12 no-padd" for="email">Email Address<span>*</span></label>
              <div class="col-md-12 no-padd">
                <?php echo form_error('email'); ?>
                <input type="text" class="form-control" name="email"  value="<?php echo $request->email;?>"></div>
              <div class="clearfix"></div>
          </div>
          <div class="form-group col-md-4">
              <label class="control-label col-md-12 no-padd" for="phone">Phone<span>*</span></label>
              <div class="col-md-12 no-padd">
                <?php echo form_error('phone'); ?>
                <input type="text" class="form-control" name="phone"  value="<?php echo $request->phone;?>"></div>
              <div class="clearfix"></div>
          </div>
          <div class="form-group col-md-4">
              <label class="control-label col-md-12 no-padd" for="home_name">Home Name<span>*</span></label>
              <div class="col-md-12 no-padd">
                <?php echo form_error('home_name'); ?>
                <input type="text" class="form-control" name="home_name"  value="<?php echo $request->home_name;?>"></div>
              <div class="clearfix"></div>
          </div>
          <div class="form-group col-md-4">
              <label class="control-label col-md-12 no-padd" for="home_address">Home Address<span>*</span></label>
              <div class="col-md-12 no-padd">
                <?php echo form_error('home_address'); ?>
                <input type="text" class="form-control" name="home_address"  value="<?php echo $request->home_address;?>"></div>
              <div class="clearfix"></div>
          </div>

          <div class="form-group col-md-4">
              <label class="control-label col-md-12 no-padd" for="home_postalcode">Home Postal Code<span>*</span></label>

              <div class="col-md-12 no-padd">
                <?php echo form_error('home_postalcode'); ?>
                <input type="text" class="form-control" name="home_postalcode"  value="<?php echo $request->home_postalcode;?>"></div>
              <div class="clearfix"></div>
          </div>

          <div class="form-group col-md-4">
              <label class="control-label col-md-12 no-padd" for="home_contact_name">Home Contact Name<span>*</span></label>

              <div class="col-md-12 no-padd">
                <?php echo form_error('home_contact_name'); ?>
                <input type="text" class="form-control" name="home_contact_name"  value="<?php echo $request->home_contact_name;?>"></div>
          </div>
          <div class="form-group col-md-4">
              <label class="control-label col-md-12 no-padd" for="home_email">Home Email<span>*</span></label>

              <div class="col-md-12 no-padd">
                <?php echo form_error('home_email'); ?>
                <input type="text" class="form-control" name="home_email"  value="<?php echo $request->home_email;?>"></div>
              <div class="clearfix"></div>
          </div>

          <div class="form-group col-md-4">
              <label class="control-label col-md-12 no-padd" for="home_phone">Home Phone<span>*</span></label>

              <div class="col-md-12 no-padd">
                <?php echo form_error('home_phone'); ?>
                <input type="text" class="form-control" name="home_phone"  value="<?php echo $request->home_phone;?>"></div>
              <div class="clearfix"></div>
          </div>
          <div class="form-group col-md-4">
              <label class="control-label col-md-12 no-padd" for="home_fax">Home Fax</label>

              <div class="col-md-12 no-padd">
                <?php echo form_error('home_fax'); ?>
                <input type="text" class="form-control" name="home_fax"  value="<?php echo $request->home_fax;?>"></div>
              <div class="clearfix"></div>
          </div>

          <div class="form-group col-md-4">
              <label class="control-label col-md-12 no-padd" for="package_id">Package<span>*</span></label>

                <div class="col-md-12 no-padd">
                    <?php echo form_error('package_id'); ?>
                    <select id="package_id" name="package_id" class="form-control">
                        <option value=""> -- Select -- </option>
                        <?php foreach($packages as $key => $value): ?>
                            <option <?php if($request->package_id==$key) echo 'selected';?> value="<?php echo $key; ?>" ><?php echo $value; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
              <div class="clearfix"></div>
          </div>

          <div class="form-group col-md-4">
              <label class="control-label col-md-12 no-padd" for="label">Maximum Licensed Beds<span>*</span></label>

              <div class="col-md-12 no-padd">
                <?php echo form_error('max_beds_count'); ?>
                <input type="text" class="form-control" name="max_beds_count"  value="<?php echo $request->max_beds_count;?>"></div>
              <div class="clearfix"></div>
          </div>

          <div class="form-group col-md-4">
              <label class="control-label col-md-12 no-padd" for="home_language">Language(s)<span>*</span></label>

                <div class="col-md-12 no-padd">
                    <?php echo form_error('language_id'); ?>
                    <select id="home_language" name="home_language" class="form-control">
                        <option value=""> -- Select -- </option>
                        <?php foreach($homeLanguages as $key => $value): ?>
                            <option <?php if($request->home_language==$key) echo 'selected';?> value="<?php echo $key; ?>" ><?php echo $value; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
              <div class="clearfix"></div>
          </div>

          <div class="form-group col-md-4">
              <label class="control-label col-md-12 no-padd" for="home_level">Home Level<span>*</span></label>

                <div class="col-md-12 no-padd">
                    <?php echo form_error('home_level'); ?>
                    <select id="home_level" name="home_level" class="form-control">
                        <option value=""> -- Select -- </option>
                        <?php foreach($carelevels as $key => $value): ?>
                            <option <?php if($request->home_level==$key) echo 'selected';?> value="<?php echo $key; ?>" ><?php echo $value; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
              <div class="clearfix"></div>
          </div>

          <div class="form-group col-md-4">
              <label class="control-label col-md-12 no-padd" for="label">Facilities<span>*</span></label>

              <div class="col-md-12 no-padd">
                <?php echo form_error('facilities[]');
                $facilityArr = (explode(",",$request->facilities));?>
                <select id="facilities" name="facilities[]" class="form-control" multiple>
                    <?php foreach($facilities as $key => $value): ?>
                        <option <?php if(in_array($key,$facilityArr)) echo 'selected';?> value="<?php echo $key; ?>" ><?php echo $value; ?></option>
                    <?php endforeach; ?>
              </select>
            </div>
            <div class="clearfix"></div>
          </div>
          <div class="form-group col-md-4">
              <label class="control-label col-md-12 no-padd" for="label">Region<span>*</span></label>

              <div class="col-md-12 no-padd">
                <?php echo form_error('region_id'); ?>
                <select id="region_id" name="region_id" class="form-control">
                    <option value=""> -- Select -- </option>
                    <?php foreach($regions as $key => $value): ?>
                        <option <?php if($request->region_id==$key) echo 'selected';?> value="<?php echo $key; ?>" ><?php echo $value; ?></option>
                    <?php endforeach; ?>
                </select>
              </div>
                <div class="clearfix"></div>
          </div>
          <div class="form-group col-md-12">
              <label class="control-label col-md-12 no-padd" for="label">Pharmacy<span>*</span></label>

              <div class="col-md-12 no-padd">
                <?php echo form_error('pharmacy_name'); ?>
                <input type="text" class="form-control" name="pharmacy_name"  value="<?php echo $request->pharmacy_name;?>"></div>
              <div class="clearfix"></div>
          </div>

          <div class="form-group col-md-12">
              <label class="control-label col-md-12 no-padd" for="label">Description of Home and Services to the Public</label>

              <div class="col-md-12 no-padd">
                <?php echo form_error('description'); ?>
                <textarea  class="form-control" name="description"  ><?php echo $request->description;?></textarea></div>
              <div class="clearfix"></div>
          </div>

          <div class="form-group col-md-12">
              <label class="control-label col-md-12 no-padd" for="label">Notes/Comments for Admin</label>

              <div class="col-md-12 no-padd">
                <input type="text" class="form-control" name="comments"  value=" "></div>
              <div class="clearfix"></div>
          </div>

          <div class="form-group col-md-12">
              <label class="control-label col-md-12 no-padd" for="label">Virtual Tour</label>

              <div class="col-md-12 no-padd">
                <?php echo form_error('virtual_tour'); ?>
                <input type="text" class="form-control" name="virtual_tour"  value="<?php echo $request->virtual_tour;?>"></div>
              <div class="clearfix"></div>
          </div>

          <div class="form-group col-md-4">
              <label class="control-label col-md-12 no-padd" for="label">Facebook link</label>

              <div class="col-md-12 no-padd">
                <?php echo form_error('facebook'); ?>
                <input type="text" class="form-control" name="facebook"  value="<?php echo $request->facebook;?>"></div>
              <div class="clearfix"></div>
          </div>

          <div class="form-group col-md-4">
              <label class="control-label col-md-12 no-padd" for="label">Instagram page link</label>

              <div class="col-md-12 no-padd">
                <?php echo form_error('instagram'); ?>
                <input type="text" class="form-control" name="instagram"  value="<?php echo $request->instagram;?>"></div>
              <div class="clearfix"></div>
          </div>

          <div class="form-group col-md-4">
              <label class="control-label col-md-12 no-padd" for="label">Twitter page link</label>

              <div class="col-md-12 no-padd">
                <?php echo form_error('twitter'); ?>
                <input type="text" class="form-control" name="twitter"  value="<?php echo $request->twitter;?>"></div>
              <div class="clearfix"></div>
          </div>

          <div class="form-group col-md-4">
              <label class="control-label col-md-12 no-padd" for="label">Youtube link</label>

              <div class="col-md-12 no-padd">
                <?php echo form_error('youtube'); ?>
                <input type="text" class="form-control" name="youtube"  value="<?php echo $request->youtube;?>"></div>
              <div class="clearfix"></div>
          </div>

          <div class="form-group col-md-4">
              <label class="control-label col-md-12 no-padd" for="label">LinkdIn link</label>

              <div class="col-md-12 no-padd">
                <?php echo form_error('linkedin'); ?>
                <input type="text" class="form-control" name="linkedin"  value="<?php echo $request->linkedin;?>"></div>
              <div class="clearfix"></div>
          </div>

          <div class="form-group col-md-4">
              <label class="control-label col-md-12 no-padd" for="label">Website link</label>

              <div class="col-md-12 no-padd">
                <?php echo form_error('website'); ?>
                <input type="text" class="form-control" name="website"  value="<?php echo $request->website;?>"></div>
              <div class="clearfix"></div>
          </div>



          <div class="form-group col-md-12">
              <label class="control-label col-md-12 no-padd" style="padding:10px 0;" for="label">Features Provided</label>

              <?php $selectedFeatures = unserialize($request->features);

              foreach ($features as $key=>$feature):?>
              <div class="col-md-6 col-sm-12 col-xs-12" >
                <div class="checkbox" style="padding:5px 0;">
                    <input type="checkbox" class="" <?php if(isset($selectedFeatures[$key]) && $selectedFeatures[$key]=='1') echo 'checked="checked"';?> name="features[<?php echo $key; ?>]" id="feature-<?php echo $key; ?>" value="1"> <?php echo $feature; ?>
                </div>

              </div>
              <?php endforeach;?>
              <div class="clearfix"></div>
          </div>

          <div class="col-md-4">
            <div class="thumbnail">
              <div class="image view view-first">
                <img style="width: 100%; display: block;" src="<?php if($request->mainimage!=''){  echo frontend_uploads_url('requests/images/'.$request->mainimage); } else { echo common_assets_url('images/no-image.png'); } ?>" alt="image">
                <div class="mask">
                  <div class="tools tools-bottom">
                    <a rel="residence_gallery" href="<?php if($request->mainimage!=''){  echo frontend_uploads_url('requests/images/'.$request->mainimage); } else { echo common_assets_url('images/no-image.png'); } ?>"><i class="fa fa-search-plus" ></i></a>
                  </div>
                </div>
              </div>
              <div class="caption">
                <input type="file" name="mainimage">
              </div>
            </div>
          </div>


          <div class="col-md-4">
            <div class="thumbnail">
              <div class="image view view-first">
                <img style="width: 100%; display: block;" src="<?php if($request->image2!=''){  echo frontend_uploads_url('requests/images/'.$request->image2); } else { echo common_assets_url('images/no-image.png'); } ?>" alt="image">
                <div class="mask">
                  <div class="tools tools-bottom">
                    <a rel="residence_gallery" href="<?php if($request->image2!=''){  echo frontend_uploads_url('requests/images/'.$request->image2); } else { echo common_assets_url('images/no-image.png'); } ?>"><i class="fa fa-search-plus" ></i></a>
                  </div>
                </div>
              </div>
              <div class="caption">
                <input type="file" name="image2">
              </div>
            </div>
          </div>


          <div class="col-md-4">
            <div class="thumbnail">
              <div class="image view view-first">
                <img style="width: 100%; display: block;" src="<?php if($request->image3!=''){  echo frontend_uploads_url('requests/images/'.$request->image3); } else { echo common_assets_url('images/no-image.png'); } ?>" alt="image">
                <div class="mask">
                  <div class="tools tools-bottom">
                    <a rel="residence_gallery" href="<?php if($request->image3!=''){  echo frontend_uploads_url('requests/images/'.$request->image3); } else { echo common_assets_url('images/no-image.png'); } ?>"><i class="fa fa-search-plus" ></i></a>
                  </div>
                </div>
              </div>
              <div class="caption">
                <input type="file" name="image3">
              </div>
            </div>
          </div>


          <div class="col-md-4">
            <div class="thumbnail">
              <div class="image view view-first">
                <img style="width: 100%; display: block;" src="<?php if($request->image4!=''){  echo frontend_uploads_url('requests/images/'.$request->image4); } else { echo common_assets_url('images/no-image.png'); } ?>" alt="image">
                <div class="mask">
                  <div class="tools tools-bottom">
                    <a rel="residence_gallery" href="<?php if($request->image4!=''){  echo frontend_uploads_url('requests/images/'.$request->image4); } else { echo common_assets_url('images/no-image.png'); } ?>"><i class="fa fa-search-plus" ></i></a>
                  </div>
                </div>
              </div>
              <div class="caption">
                <input type="file" name="image4">
              </div>
            </div>
          </div>

          <div class="col-md-4">
            <div class="thumbnail">
              <div class="image view view-first">
                <img style="width: 100%; display: block;" src="<?php if($request->image5!=''){  echo frontend_uploads_url('requests/images/'.$request->image5); } else { echo common_assets_url('images/no-image.png'); } ?>" alt="image">
                <div class="mask">
                  <div class="tools tools-bottom">
                    <a rel="residence_gallery" href="<?php if($request->image5!=''){  echo frontend_uploads_url('requests/images/'.$request->image5); } else { echo common_assets_url('images/no-image.png'); } ?>"><i class="fa fa-search-plus" ></i></a>
                  </div>
                </div>
              </div>
              <div class="caption">
                <input type="file" name="image5">
              </div>
            </div>
          </div>

          <div class="col-md-4">
            <div class="thumbnail">
              <div class="image view view-first">
                <img style="width: 100%; display: block;" src="<?php if($request->image6!=''){  echo frontend_uploads_url('requests/images/'.$request->image6); } else { echo common_assets_url('images/no-image.png'); } ?>" alt="image">
                <div class="mask">
                  <div class="tools tools-bottom">
                    <a rel="residence_gallery" href="<?php if($request->image6!=''){  echo frontend_uploads_url('requests/images/'.$request->image6); } else { echo common_assets_url('images/no-image.png'); } ?>"><i class="fa fa-search-plus" ></i></a>
                  </div>
                </div>
              </div>
              <div class="caption">
                <input type="file" name="image6">
              </div>
            </div>
          </div>

          <?php echo form_close(); ?>

  <script type="text/javascript">
      $(document).ready(function() {
          $('#facilities').multiselect();
          $("a[rel=residence_gallery]").fancybox();
      });
  </script>
