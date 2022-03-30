<div class="row">
  <div class="page-title">
        <div class="title">
            <h4 ><i class="fa fa-file-text"></i> Membership Renewal Request  <b style="color:#40C2A6;">#<?php echo  $request->id; ?></b> | <small><?php echo  date('M j, Y H:i:s',strtotime($request->created_date)); ?></small>
            <ul class="nav navbar-right panel_toolbox">
            <li><a class="btn btn-default btn-xs" href="<?php echo admin_url('renewals/overview'); ?>" ><i class="fa fa-arrow-left" aria-hidden="true"></i> &nbsp;BACK </a> </li>
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
                  <td><?php echo $member->first_name; ?></td>
                  <td><?php echo $member->last_name; ?></td>
                  <td><?php echo $member->phone; ?></td>
                  <td><?php echo $member->email; ?></td>
                </tr>
              </tbody>
            </table>

          </div>
        </div>
      </div>
      <div class="col-md-6 col-sm-6 col-xs-12">
          <div class="x_panel">
            <div class="x_title">
              <h2>Package Details</small></h2>
              <div class="clearfix"></div>
            </div>
            <div class="x_content">

              <table class="table table-striped">
                <thead>
                  <tr>
                    <th>Current Pacakge</th>
                    <th>Current Issue Date</th>
                    <th>Current Expiry Date</th>
                    <th>New Package</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td><?php echo $packages[$request->previous_package_id];?></td>
                    <td><?php echo date('M j, Y', strtotime($request->previous_issue_date)); ?></td>
                    <td><?php echo date('M j, Y', strtotime($request->previous_expiry_date)); ?></td>
                    <td><?php echo $packages[$request->previous_package_id];?></td>
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
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th>Payment Info</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td><?php echo $request->payment_info; ?></td>
                  </tr>
                </tbody>
              </table>
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th>Comments</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td><?php echo $request->payment_comments; ?></td>
                  </tr>
                </tbody>
              </table>


            </div>
          </div>
        </div>

</div>
