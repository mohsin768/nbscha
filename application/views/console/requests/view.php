<div class="row">
  <div class="page-title">
        <div class="title">
            <h4 ><i class="fa fa-file-text"></i> Membership Request  <b style="color:#40C2A6;">#<?php echo  $request->identifier; ?></b> | <small><?php echo  date('M j, Y H:i:s',strtotime($request->created)); ?></small>
            <ul class="nav navbar-right panel_toolbox">
            <?php if($request->status =='pending'){ ?>
									<?php $approvalBodyText = 'Are you sure you want to APPROVE the request #'.$request->identifier.'?';?>
									<?php $rejectionBodyText = 'Are you sure you want to REJECT the request #'.$request->identifier.'?';?>
									<li><a class=" btn btn-success btn-xs confirmAction" data-body-text="<?php echo $approvalBodyText; ?>" data-button-text="Yes" href="<?php echo admin_url('requests/approve/'.$request->id); ?>" title="Approve"><i class="fa fa-check"></i> Approve</a></li>
									<li><a class=" btn btn-danger btn-xs confirmAction" data-body-text="<?php echo $rejectionBodyText; ?>" data-button-text="Yes" href="<?php echo admin_url('requests/reject/'.$request->id); ?>" title="Reject"><i class="fa fa-ban"></i> Reject</a></li>
								<?php } ?>  
            <li><a class="btn btn-default btn-xs" href="<?php echo admin_url('requests/overview'); ?>" ><i class="fa fa-arrow-left" aria-hidden="true"></i> &nbsp;BACK </a> </li>
            </ul></h4>
        </div>
    </div>

    <div class="col-md-6 col-sm-6 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>User Details</small></h2>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">

            <table class="table table-striped">
              <thead>
                <tr>
                  <th>First Name</th>
                  <th>Last Name</th>
                  <th>Phone</th>
                  <th>Email</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td><?php echo $request->first_name; ?></td>
                  <td><?php echo $request->last_name; ?></td>
                  <td><?php echo $request->phone; ?></td>
                  <td><?php echo $request->email; ?></td>
                </tr>
              </tbody>
            </table>

          </div>
        </div>
      </div>
      <div class="col-md-6 col-sm-6 col-xs-12">
          <div class="x_panel">
            <div class="x_title">
              <h2>Payment Details</small></h2>
              <div class="clearfix"></div>
            </div>
            <div class="x_content">

              <table class="table table-striped">
                <thead>
                  <tr>
                    <th>Payment Amount</th>
                    <th>Payment Mehtod</th>
                    <th>Transaction Id</th>
                    <th>Payment Status</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td><?php echo $request->amount; ?></td>
                    <td><?php echo $request->payment_method; ?></td>
                    <td><?php echo $request->transaction_id; ?></td>
                    <td><?php if($request->payment_status=='1') echo '<strong style="color:green" >Success</strong>'; else echo '<strong style="color:red" >Pending</strong>'; ?></td>
                  </tr>
                </tbody>
              </table>

            </div>
          </div>
        </div>

      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Special Care Home  Details</h2>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">

            <table class="table table-bordered">
              <tbody>
                <tr>
                <th scope="row" style="width:50%">Special Care Home Name</th>  <td><?php echo $request->home_name; ?></td>
                </tr>
                <tr>
                <th scope="row">Special Care Home Address</th>  <td><?php echo $request->home_address; ?></td>
                </tr>
                <tr>
                <th scope="row">Special Care Home Postal Code</th>  <td><?php echo $request->home_postalcode; ?></td>
                </tr>
                <tr>
                <th scope="row">Special Care Home Contact Person</th>  <td><?php echo $request->home_contact_name; ?></td>
                </tr>
                <tr>
                <th scope="row">Special Care Home Email</th>  <td><?php echo $request->home_email; ?></td>
                </tr>
                <tr>
                <th scope="row">Special Care Home Phone</th>  <td><?php echo $request->home_phone; ?></td>
                </tr>
                <tr>
                <th scope="row">Special Care Home Fax Number</th>  <td><?php echo $request->home_fax; ?></td>
                </tr>
                <tr>
                <th scope="row">Package (Beds)</th>  <td><?php echo $packages[$request->package_id];?> </td>
                </tr>
                <tr>
                <th scope="row">Level of Care</th>  <td><?php echo $carelevels[$request->home_level];?></td>
                </tr>
                <tr>
                <th scope="row">Pharmacy Name</th>  <td><?php echo $request->pharmacy_name; ?></td>
                </tr>
                <tr>
                <th scope="row">Facilities</th>  <td>
                  <?php $facilityArr = (explode(",",$request->facilities));
                   $i=0; foreach ($facilityArr as $key => $value):
                     if($i!=0) echo ', ';
                      echo $facilities[$value];
                      $i++;
                  endforeach;  ?></td>
                </tr>
                <tr>
                <th scope="row">Region</th>  <td><?php echo $regions[$request->region_id];?></td>
                </tr>
                <tr>
                <th scope="row">Description of Home and Services to the Public</th>  <td><?php echo $request->description; ?></td>
                </tr>
                <tr>
                <th scope="row">Notes/Comments for Admin</th>  <td><?php echo $request->comments; ?></td>
                </tr>
                <tr>
                <th scope="row">Main Image</th>  <td><?php if($request->mainimage!=''){?> <img src="<?php echo frontend_uploads_url('requests/images/'.$request->mainimage); ?>" style="width:400px;" ><?php } ?></td>
                </tr>
                <tr>
                <th scope="row">Other Images</th>  <td>
                        <?php if($request->image2!=''){?> <img src="<?php echo frontend_uploads_url('requests/images/'.$request->image2); ?>" style="max-width:200px;margin:10px; display:inline;" ><?php } ?>
                        <?php if($request->image3!=''){?> <img src="<?php echo frontend_uploads_url('requests/images/'.$request->image3); ?>" style="max-width:200px;margin:10px; display:inline;" ><?php } ?>
                        <?php if($request->image4!=''){?> <img src="<?php echo frontend_uploads_url('requests/images/'.$request->image4); ?>" style="max-width:200px;margin:10px; display:inline;" ><?php } ?>
                        <?php if($request->image5!=''){?> <img src="<?php echo frontend_uploads_url('requests/images/'.$request->image5); ?>" style="max-width:200px;margin:10px; display:inline;" ><?php } ?>
                        <?php if($request->image6!=''){?> <img src="<?php echo frontend_uploads_url('requests/images/'.$request->image6); ?>" style="max-width:200px;margin:10px; display:inline;" ><?php } ?>
                      </td>
                </tr>
                <tr>
                <th scope="row">Social Media Links</th>  <td>
                  <?php if($request->facebook!=''){?>  <div class="fa-hover col-md-3 col-sm-4 col-xs-12"><a  href="<?php echo $request->facebook; ?>" target="_blank"><i style="font-size:22px;" class="fa fa-facebook-square"></i> <?php echo $request->facebook; ?></a></div><?php } ?>
                  <?php if($request->twitter!=''){?>  <div class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="<?php echo $request->twitter; ?>" target="_blank"><i style="font-size:22px;" class="fa fa-twitter-square"></i> <?php echo $request->twitter; ?>"</a></div><?php } ?>
                  <?php if($request->youtube!=''){?>  <div class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="<?php echo $request->youtube; ?>" target="_blank"><i style="font-size:22px;" class="fa fa-youtube"></i> <?php echo $request->youtube; ?></a>  </div><?php } ?>
                  <?php if($request->instagram!=''){?>  <div class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="<?php echo $request->instagram; ?>" target="_blank"><i style="font-size:22px;" class="fa fa-instagram"></i> <?php echo $request->instagram; ?></a>  </div><?php } ?>
                  <?php if($request->linkedin!=''){?>  <div class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="<?php echo $request->linkedin; ?>" target="_blank"><i style="font-size:22px;" class="fa fa-linkedin-square"></i> <?php echo $request->linkedin; ?></a>  </div><?php } ?>
                      <?php if($request->website!=''){?>  <div class="fa-hover col-md-12 col-sm-12 col-xs-12">WEBSITE: <a href="<?php echo $request->website; ?>" target="_blank"> <?php echo $request->website; ?></a>  </div><?php } ?>
                </td>
                </tr>
                <tr><th scope="row" colspan="2">Features Provided</th><tr/>
                <tr><td colspan="2">
                  <div class="x_content bs-example-popovers">

                    <?php $selectedFeatures = unserialize($request->features);

                    foreach ($features as $key=>$feature):?>
                      <div class="col-md-6">
                        <div class="alert <?php if(isset($selectedFeatures[$key]) && $selectedFeatures[$key]=='1') echo 'alert-success'; else echo 'alert-danger';?>" role="alert" style="padding: 0.4rem 1.25rem;">
                          <strong><?php echo $feature;?></strong>
                          <?php if(isset($selectedFeatures[$key]) && $selectedFeatures[$key]=='1') echo '<i style="font-size:22px;float:right" class="fa fa-check-circle"></i>'; else echo '<i style="font-size:22px;float:right" class="fa fa-times-circle"></i>';?>
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

</div>
