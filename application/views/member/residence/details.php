<div id="residenceDetailsModal" class="modal fade"  role="dialog" aria-labelledby="transferLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="statusLabel">Residence Details - <?php echo $residence->name;?>  &nbsp;&nbsp;<small><em><i class="fa fa-map-marker user-profile-icon"></i> <?php echo $residence->address; ?>   <?php echo $residence->postalcode; ?></em></small></h4>
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
      </div>
      <div class="modal-body">

        <div class="col-md-12 col-sm-12 col-xs-12">

            <div class="x_content">
              <div class="row">
                      <div class="col-md-4">
                        <div class="thumbnail">
                          <div class="image view view-first">
                            <img style="width: 100%; display: block;" src="http://nbscha.com/public/frontend/images/care_logo.png" alt="image">
                            <div class="mask">
                              <div class="tools tools-bottom">
                                <a href="#"><i class="fa fa-search-plus" style="font-size:48px;"></i></a>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="col-md-4">
                        <div class="thumbnail">
                          <div class="image view view-first">
                            <img style="width: 100%; display: block;" src="http://nbscha.com/public/frontend/images/care_logo.png" alt="image">
                            <div class="mask">
                              <div class="tools tools-bottom">
                                <a href="#"><i class="fa fa-search-plus" style="font-size:48px;"></i></a>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="thumbnail">
                          <div class="image view view-first">
                            <img style="width: 100%; display: block;" src="http://nbscha.com/public/frontend/images/care_logo.png" alt="image">
                            <div class="mask">
                              <div class="tools tools-bottom">
                                <a href="#"><i class="fa fa-search-plus" style="font-size:48px;"></i></a>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="thumbnail">
                          <div class="image view view-first">
                            <img style="width: 100%; display: block;" src="http://nbscha.com/public/frontend/images/care_logo.png" alt="image">
                            <div class="mask">
                              <div class="tools tools-bottom">
                                <a href="#"><i class="fa fa-search-plus" style="font-size:48px;"></i></a>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="thumbnail">
                          <div class="image view view-first">
                            <img style="width: 100%; display: block;" src="http://nbscha.com/public/frontend/images/care_logo.png" alt="image">
                            <div class="mask">
                              <div class="tools tools-bottom">
                                <a href="#"><i class="fa fa-search-plus" style="font-size:48px;"></i></a>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="thumbnail">
                          <div class="image view view-first">
                            <img style="width: 100%; display: block;" src="http://nbscha.com/public/frontend/images/care_logo.png" alt="image">
                            <div class="mask">
                              <div class="tools tools-bottom">
                                <a href="#"><i class="fa fa-search-plus" style="font-size:48px;"></i></a>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>

              <table class="table table-bordered">
                <tbody>
                  <tr>
                  <th scope="row" style="width:50%">Special Care Home Name</th>  <td><?php echo $residence->name; ?></td>
                  </tr>
                  <tr>
                  <th scope="row">Special Care Home Address</th>  <td><?php echo $residence->address; ?></td>
                  </tr>
                  <tr>
                  <th scope="row">Special Care Home Postal Code</th>  <td><?php echo $residence->postalcode; ?></td>
                  </tr>
                  <tr>
                  <th scope="row">Special Care Home Contact Person</th>  <td><?php echo $residence->contact_name; ?></td>
                  </tr>
                  <tr>
                  <th scope="row">Special Care Home Email</th>  <td><?php echo $residence->email; ?></td>
                  </tr>
                  <tr>
                  <th scope="row">Special Care Home Phone</th>  <td><?php echo $residence->phone; ?></td>
                  </tr>
                  <tr>
                  <th scope="row">Special Care Home Fax Number</th>  <td><?php echo $residence->fax; ?></td>
                  </tr>
                  <tr>
                  <th scope="row">Package (Beds)</th>  <td><?php echo $packages[$residence->package_id];?> </td>
                  </tr>
                  <tr>
                  <th scope="row">Level of Care</th>  <td><?php echo $carelevels[$residence->level_id];?></td>
                  </tr>
                  <tr>
                  <th scope="row">Pharmacy Name</th>  <td><?php echo $residence->pharmacy_name; ?></td>
                  </tr>
                  <tr>
                  <th scope="row">Facilities</th>  <td>
                    <?php $facilityArr = (explode(",",$residence->facilities));
                     $i=0; foreach ($facilityArr as $key => $value):
                       if($i!=0) echo ', ';
                        echo $facilities[$value];
                        $i++;
                    endforeach;  ?></td>
                  </tr>
                  <tr>
                  <th scope="row">Region</th>  <td><?php echo $regions[$residence->region_id];?></td>
                  </tr>
                  <tr>
                  <th scope="row">Description of Home and Services to the Public</th>  <td><?php echo $residence->description; ?></td>
                  </tr>


                  <tr>
                  <th scope="row">Other Images</th>  <td>
                          <?php if($residence->image2!=''){?> <img src="<?php echo frontend_uploads_url('requests/images/'.$residence->image2); ?>" style="max-width:200px;margin:10px; display:inline;" ><?php } ?>
                          <?php if($residence->image3!=''){?> <img src="<?php echo frontend_uploads_url('requests/images/'.$residence->image3); ?>" style="max-width:200px;margin:10px; display:inline;" ><?php } ?>
                          <?php if($residence->image4!=''){?> <img src="<?php echo frontend_uploads_url('requests/images/'.$residence->image4); ?>" style="max-width:200px;margin:10px; display:inline;" ><?php } ?>
                          <?php if($residence->image5!=''){?> <img src="<?php echo frontend_uploads_url('requests/images/'.$residence->image5); ?>" style="max-width:200px;margin:10px; display:inline;" ><?php } ?>
                          <?php if($residence->image6!=''){?> <img src="<?php echo frontend_uploads_url('requests/images/'.$residence->image6); ?>" style="max-width:200px;margin:10px; display:inline;" ><?php } ?>
                        </td>
                  </tr>
                  <tr>
                  <th scope="row">Social Media Links</th>  <td>
                    <?php if($residence->facebook!=''){?>  <div class="fa-hover col-md-3 col-sm-4 col-xs-12"><a  href="<?php echo $residence->facebook; ?>" target="_blank"><i style="font-size:22px;" class="fa fa-facebook-square"></i> <?php echo $residence->facebook; ?></a></div><?php } ?>
                    <?php if($residence->twitter!=''){?>  <div class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="<?php echo $residence->twitter; ?>" target="_blank"><i style="font-size:22px;" class="fa fa-twitter-square"></i> <?php echo $residence->twitter; ?>"</a></div><?php } ?>
                    <?php if($residence->youtube!=''){?>  <div class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="<?php echo $residence->youtube; ?>" target="_blank"><i style="font-size:22px;" class="fa fa-youtube"></i> <?php echo $residence->youtube; ?></a>  </div><?php } ?>
                    <?php if($residence->instagram!=''){?>  <div class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="<?php echo $residence->instagram; ?>" target="_blank"><i style="font-size:22px;" class="fa fa-instagram"></i> <?php echo $residence->instagram; ?></a>  </div><?php } ?>
                    <?php if($residence->linkedin!=''){?>  <div class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="<?php echo $residence->linkedin; ?>" target="_blank"><i style="font-size:22px;" class="fa fa-linkedin-square"></i> <?php echo $residence->linkedin; ?></a>  </div><?php } ?>
                        <?php if($residence->website!=''){?>  <div class="fa-hover col-md-12 col-sm-12 col-xs-12">WEBSITE: <a href="<?php echo $residence->website; ?>" target="_blank"> <?php echo $residence->website; ?></a>  </div><?php } ?>
                  </td>
                  </tr>
                  <tr> <th colspan="2" scope="row">Features Provided</th></tr>
                  <tr> <td colspan="2">
                    <div class="x_content bs-example-popovers">

                      <?php $selectedFeatures = unserialize($residence->features);

                      foreach ($features as $key=>$feature):?>
                      <div class="col-md-6 col-sm-12 col-xs-12" style="padding: 0 4px">
                        <div class=" alert <?php if(isset($selectedFeatures[$key]) && $selectedFeatures[$key]=='1') echo 'alert-success'; else echo 'alert-danger';?>" role="alert" style="padding: 0.4rem 25px 0.4rem 1.25rem;min-height:53px;">
                          <strong><?php echo $feature;?></strong>
                          <?php if(isset($selectedFeatures[$key]) && $selectedFeatures[$key]=='1') echo '<i style="font-size:22px;position:absolute;right:5px;top:50%;margin-top:-13px;" class="fa fa-check-circle"></i>'; else echo '<i style="font-size:22px;position:absolute;right:5px;top:50%;margin-top:-13px;" class="fa fa-times-circle"></i>';?>
                        </div>
                      </div>
                      <?php endforeach;?>


                  </div>

                  </td>
                  </tr>
                </tbody>
              </table>

            </div>

        </div>
       </div>

      <div class="modal-footer">
      <button type="button" class="btn btn-default autoclose" data-dismiss="modal">Close</button>
     </div>
    </div>
  </div>
</div>
