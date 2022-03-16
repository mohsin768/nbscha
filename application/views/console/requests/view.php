<div class="row">
  <div class="page-title">
        <div class="title">
            <h4 ><i class="fa fa-file-text"></i> Membership Request  <b style="color:#40C2A6;">#<?php echo  $request->identifier; ?></b> | <small><?php echo  date('M j, Y H:i:s',strtotime($request->created)); ?></small>
            <ul class="nav navbar-right panel_toolbox">
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
                    <td><?php echo $request->payment_amount; ?></td>
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
                <th scope="row">Facilities</th>  <td><?php echo $request->facilities; ?></td>
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
                <th scope="row">Main Image</th>  <td></td>
                </tr>
                <tr>
                <th scope="row">Other Images</th>  <td></td>
                </tr>
                <tr>
                <th scope="row">Social Media Links</th>  <td>
                  <div class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="#/facebook-square"><i class="fa fa-facebook-square"></i> facebook.com</a></div>
                  <div class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="#/twitter-square"><i class="fa fa-twitter-square"></i> twitter.com</a></div>
                  <div class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="#/youtube"><i class="fa fa-youtube"></i> youtube</a>  </div>
                </td>
                </tr>
                <tr>
                <th scope="row">Features Provided</th>
                <td>
                  <div class="x_content bs-example-popovers">

                  <div class="alert alert-success" role="alert" style="padding: 0.4rem 1.25rem;">
                    <strong>Can a resident bring their pet to live with them?</strong>
                  </div>

                  <div class="alert alert-danger" role="alert" style="padding: 0.4rem 1.25rem;opacity:0.5">
                    Do you look after managing their comfort and clothing money?
                  </div>
                  <div class="alert alert-success" role="alert" style="padding: 0.4rem 1.25rem;">
                    <strong>Can a resident bring their pet to live with them?</strong>
                  </div>

                  <div class="alert alert-danger" role="alert" style="padding: 0.4rem 1.25rem;">
                    Do you look after managing their comfort and clothing money?
                  </div>
                  <div class="alert alert-success" role="alert" style="padding: 0.4rem 1.25rem;">
                    <strong>Can a resident bring their pet to live with them?</strong>
                  </div>
                  <div class="alert alert-success" role="alert" style="padding: 0.4rem 1.25rem;">
                    <strong>Can a resident bring their pet to live with them?</strong>
                  </div>
                  <div class="alert alert-success" role="alert" style="padding: 0.4rem 1.25rem;">
                    <strong>Can a resident bring their pet to live with them?</strong>
                  </div>
                  <div class="alert alert-danger" role="alert" style="padding: 0.4rem 1.25rem;">
                    Do you look after managing their comfort and clothing money?
                  </div>
                  <div class="alert alert-success" role="alert" style="padding: 0.4rem 1.25rem;">
                    <strong>Can a resident bring their pet to live with them?</strong>
                  </div>
                  <div class="alert alert-success" role="alert" style="padding: 0.4rem 1.25rem;">
                    <strong>Can a resident bring their pet to live with them?</strong>
                  </div>
                  <div class="alert alert-danger" role="alert" style="padding: 0.4rem 1.25rem;">
                    Do you look after managing their comfort and clothing money?
                  </div>
                  <div class="alert alert-danger" role="alert" style="padding: 0.4rem 1.25rem;">
                    Do you look after managing their comfort and clothing money?
                  </div>
                  <div class="alert alert-danger" role="alert" style="padding: 0.4rem 1.25rem;">
                    Do you look after managing their comfort and clothing money?
                  </div>

                </div>

                </td>
                </tr>
              </tbody>
            </table>

          </div>
        </div>
      </div>

</div>
