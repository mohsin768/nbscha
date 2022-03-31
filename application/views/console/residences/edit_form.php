
        <?php echo validation_errors();
          $attributes = array('class' => 'form-vertical', 'id' => 'update-residence');
          echo form_open_multipart('',$attributes);
          ?>
          <input type="hidden" name="id" value="<?php echo $residence->id;?>" />

          <div class="form-group col-md-4">
              <label class="control-label col-md-12 no-padd" for="label">Name<span>*</span></label>
              <div class="col-md-12 no-padd">
                <?php echo form_error('name'); ?>
                <input type="text" class="form-control" name="name"  value="<?php echo $residence->name;?>"></div>
              <div class="clearfix"></div>
          </div>
          <div class="form-group col-md-4">
              <label class="control-label col-md-12 no-padd" for="label">Address<span>*</span></label>
              <div class="col-md-12 no-padd">
                <?php echo form_error('address'); ?>
                <input type="text" class="form-control" name="address"  value="<?php echo $residence->address;?>"></div>
              <div class="clearfix"></div>
          </div>

          <div class="form-group col-md-4">
              <label class="control-label col-md-12 no-padd" for="label">Postal Code<span>*</span></label>

              <div class="col-md-12 no-padd">
                <?php echo form_error('postalcode'); ?>
                <input type="text" class="form-control" name="postalcode"  value="<?php echo $residence->postalcode;?>"></div>
              <div class="clearfix"></div>
          </div>

          <div class="form-group col-md-4">
              <label class="control-label col-md-12 no-padd" for="label">Contact Name<span>*</span></label>

              <div class="col-md-12 no-padd">
                <?php echo form_error('contact_name'); ?>
                <input type="text" class="form-control" name="contact_name"  value="<?php echo $residence->contact_name;?>"></div>
          </div>
          <div class="form-group col-md-4">
              <label class="control-label col-md-12 no-padd" for="label">Email<span>*</span></label>

              <div class="col-md-12 no-padd">
                <?php echo form_error('email'); ?>
                <input type="text" class="form-control" name="email"  value="<?php echo $residence->email;?>"></div>
              <div class="clearfix"></div>
          </div>

          <div class="form-group col-md-4">
              <label class="control-label col-md-12 no-padd" for="label">Phone<span>*</span></label>

              <div class="col-md-12 no-padd">
                <?php echo form_error('phone'); ?>
                <input type="text" class="form-control" name="phone"  value="<?php echo $residence->phone;?>"></div>
              <div class="clearfix"></div>
          </div>

          <div class="form-group col-md-4">
              <label class="control-label col-md-12 no-padd" for="label">Language(s)<span>*</span></label>

                <div class="col-md-12 no-padd">
                    <?php echo form_error('language_id'); ?>
                    <select id="language_id" name="language_id" class="form-control">
                        <option value=""> -- Select -- </option>
                        <?php foreach($homeLanguages as $key => $value): ?>
                            <option <?php if($residence->language_id==$key) echo 'selected';?> value="<?php echo $key; ?>" ><?php echo $value; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
              <div class="clearfix"></div>
          </div>

          <div class="form-group col-md-4">
              <label class="control-label col-md-12 no-padd" for="label">Home Level<span>*</span></label>

                <div class="col-md-12 no-padd">
                    <?php echo form_error('level_id'); ?>
                    <select id="level_id" name="level_id" class="form-control">
                        <option value=""> -- Select -- </option>
                        <?php foreach($carelevels as $key => $value): ?>
                            <option <?php if($residence->level_id==$key) echo 'selected';?> value="<?php echo $key; ?>" ><?php echo $value; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
              <div class="clearfix"></div>
          </div>

          <div class="form-group col-md-4">
              <label class="control-label col-md-12 no-padd" for="label">Pharmacy<span>*</span></label>

              <div class="col-md-12 no-padd">
                <?php echo form_error('pharmacy_name'); ?>
                <input type="text" class="form-control" name="pharmacy_name"  value="<?php echo $residence->pharmacy_name;?>"></div>
              <div class="clearfix"></div>
          </div>

          <div class="form-group col-md-4">
              <label class="control-label col-md-12 no-padd" for="label">Facilities<span>*</span></label>

              <div class="col-md-12 no-padd">
                <?php echo form_error('facilities[]');
                $facilityArr = (explode(",",$residence->facilities));?>
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
                <?php echo form_error('package_id'); ?>
                <select id="region_id" name="region_id" class="form-control">
                    <option value=""> -- Select -- </option>
                    <?php foreach($regions as $key => $value): ?>
                        <option <?php if($residence->region_id==$key) echo 'selected';?> value="<?php echo $key; ?>" ><?php echo $value; ?></option>
                    <?php endforeach; ?>
                </select>
              </div>
                <div class="clearfix"></div>
          </div>

          <div class="form-group col-md-4">
              <label class="control-label col-md-12 no-padd" for="label">Fax</label>

              <div class="col-md-12 no-padd">
                <?php echo form_error('fax'); ?>
                <input type="text" class="form-control" name="fax"  value="<?php echo $residence->fax;?>"></div>
              <div class="clearfix"></div>
          </div>

          <div class="form-group col-md-12">
              <label class="control-label col-md-12 no-padd" for="label">Description of Home and Services to the Public</label>

              <div class="col-md-12 no-padd">
                <?php echo form_error('description'); ?>
                <textarea  class="form-control" name="description"  ><?php echo $residence->description;?></textarea></div>
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
                <input type="text" class="form-control" name="virtual_tour"  value="<?php echo $residence->virtual_tour;?>"></div>
              <div class="clearfix"></div>
          </div>

          <div class="form-group col-md-4">
              <label class="control-label col-md-12 no-padd" for="label">Facebook link</label>

              <div class="col-md-12 no-padd">
                <?php echo form_error('facebook'); ?>
                <input type="text" class="form-control" name="facebook"  value="<?php echo $residence->facebook;?>"></div>
              <div class="clearfix"></div>
          </div>

          <div class="form-group col-md-4">
              <label class="control-label col-md-12 no-padd" for="label">Instagram page link</label>

              <div class="col-md-12 no-padd">
                <?php echo form_error('instagram'); ?>
                <input type="text" class="form-control" name="instagram"  value="<?php echo $residence->instagram;?>"></div>
              <div class="clearfix"></div>
          </div>

          <div class="form-group col-md-4">
              <label class="control-label col-md-12 no-padd" for="label">Twitter page link</label>

              <div class="col-md-12 no-padd">
                <?php echo form_error('twitter'); ?>
                <input type="text" class="form-control" name="twitter"  value="<?php echo $residence->twitter;?>"></div>
              <div class="clearfix"></div>
          </div>

          <div class="form-group col-md-4">
              <label class="control-label col-md-12 no-padd" for="label">Youtube link</label>

              <div class="col-md-12 no-padd">
                <?php echo form_error('youtube'); ?>
                <input type="text" class="form-control" name="youtube"  value="<?php echo $residence->youtube;?>"></div>
              <div class="clearfix"></div>
          </div>

          <div class="form-group col-md-4">
              <label class="control-label col-md-12 no-padd" for="label">LinkdIn link</label>

              <div class="col-md-12 no-padd">
                <?php echo form_error('linkedin'); ?>
                <input type="text" class="form-control" name="linkedin"  value="<?php echo $residence->linkedin;?>"></div>
              <div class="clearfix"></div>
          </div>

          <div class="form-group col-md-4">
              <label class="control-label col-md-12 no-padd" for="label">Website link</label>

              <div class="col-md-12 no-padd">
                <?php echo form_error('website'); ?>
                <input type="text" class="form-control" name="website"  value="<?php echo $residence->website;?>"></div>
              <div class="clearfix"></div>
          </div>



          <div class="form-group col-md-12">
              <label class="control-label col-md-12 no-padd" style="padding:10px 0;" for="label">Features Provided</label>

              <?php $selectedFeatures = unserialize($residence->features);

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
                <img style="width: 100%; display: block;" src="<?php if($residence->mainimage!=''){  echo frontend_uploads_url('requests/images/'.$residence->mainimage); } else { echo common_assets_url('images/no-image.png'); } ?>" alt="image">
                <div class="mask">
                  <div class="tools tools-bottom">
                    <a rel="residence_gallery" href="<?php if($residence->mainimage!=''){  echo frontend_uploads_url('requests/images/'.$residence->mainimage); } else { echo common_assets_url('images/no-image.png'); } ?>"><i class="fa fa-search-plus" ></i></a>
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
                <img style="width: 100%; display: block;" src="<?php if($residence->image2!=''){  echo frontend_uploads_url('requests/images/'.$residence->image2); } else { echo common_assets_url('images/no-image.png'); } ?>" alt="image">
                <div class="mask">
                  <div class="tools tools-bottom">
                    <a rel="residence_gallery" href="<?php if($residence->image2!=''){  echo frontend_uploads_url('requests/images/'.$residence->image2); } else { echo common_assets_url('images/no-image.png'); } ?>"><i class="fa fa-search-plus" ></i></a>
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
                <img style="width: 100%; display: block;" src="<?php if($residence->image3!=''){  echo frontend_uploads_url('requests/images/'.$residence->image3); } else { echo common_assets_url('images/no-image.png'); } ?>" alt="image">
                <div class="mask">
                  <div class="tools tools-bottom">
                    <a rel="residence_gallery" href="<?php if($residence->image3!=''){  echo frontend_uploads_url('requests/images/'.$residence->image3); } else { echo common_assets_url('images/no-image.png'); } ?>"><i class="fa fa-search-plus" ></i></a>
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
                <img style="width: 100%; display: block;" src="<?php if($residence->image4!=''){  echo frontend_uploads_url('requests/images/'.$residence->image4); } else { echo common_assets_url('images/no-image.png'); } ?>" alt="image">
                <div class="mask">
                  <div class="tools tools-bottom">
                    <a rel="residence_gallery" href="<?php if($residence->image4!=''){  echo frontend_uploads_url('requests/images/'.$residence->image4); } else { echo common_assets_url('images/no-image.png'); } ?>"><i class="fa fa-search-plus" ></i></a>
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
                <img style="width: 100%; display: block;" src="<?php if($residence->image5!=''){  echo frontend_uploads_url('requests/images/'.$residence->image5); } else { echo common_assets_url('images/no-image.png'); } ?>" alt="image">
                <div class="mask">
                  <div class="tools tools-bottom">
                    <a rel="residence_gallery" href="<?php if($residence->image5!=''){  echo frontend_uploads_url('requests/images/'.$residence->image5); } else { echo common_assets_url('images/no-image.png'); } ?>"><i class="fa fa-search-plus" ></i></a>
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
                <img style="width: 100%; display: block;" src="<?php if($residence->image6!=''){  echo frontend_uploads_url('requests/images/'.$residence->image6); } else { echo common_assets_url('images/no-image.png'); } ?>" alt="image">
                <div class="mask">
                  <div class="tools tools-bottom">
                    <a rel="residence_gallery" href="<?php if($residence->image6!=''){  echo frontend_uploads_url('requests/images/'.$residence->image6); } else { echo common_assets_url('images/no-image.png'); } ?>"><i class="fa fa-search-plus" ></i></a>
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
