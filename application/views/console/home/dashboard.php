<div class="row top_tiles">
  <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12 ">
    <div class="tile-stats alert-success">
      <div class="icon"><i class="fa fa-caret-square-o-right"></i></div>
      <div class="count"><?php echo $pending_requests_count;?></div>
      <h3 style="color:#fff">Requests</h3>
      <p> Pending Membership Requests</p>
    </div>
  </div>
  <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
    <div class="tile-stats alert-info">
      <div class="icon"><i class="fa fa-home"></i></div>
      <div class="count"><?php echo $active_residences_count;?></div>
      <h3 style="color:#fff">Residences</h3>
      <p> Total Active Residences</p>
    </div>
  </div>
  <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
    <div class="tile-stats alert-warning">
      <div class="icon"><i class="fa fa-users"></i></div>
      <div class="count"><?php echo $members_count;?></div>
      <h3 style="color:#fff">Members</h3>
      <p> Total Members</p>
    </div>
  </div>
  <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
    <div class="tile-stats alert-danger">
      <div class="icon"><i class="fa fa-comments-o"></i></div>
      <div class="count"><?php echo $enquiries_count;?></div>
      <h3 style="color:#fff">Enquiries</h3>
      <p>All type of enquiries</p>
    </div>
  </div>
</div>


<div class="row dash-widgets">
<div class="col-md-6 col-sm-6 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Pending Membership Requests</h2>
                <div class="all-link"><a class="btn btn-primary btn-sm " href="<?php echo admin_url('requests/overview');?>">View All</a></div>
                <div class="clearfix"></div>
            </div>

            <div class="x_content">
                <!-- start project list -->
                <table class="table table-striped projects">
                    <thead>
                        <tr>
                        <th>Name</th>
                        <th>Residence</th>
                        <th>Date</th>
                        <th style="">Action</th>
                        </tr>
                    </thead>
                    <tbody id="pending_table" >
                        <?php if(count($pending_requests)==0){ ?>
                        <tr><td colspan="4">No pending requests to display...</td></tr>
                        <?php } else {
                        foreach($pending_requests as $request):$i=0; ?>
                        <tr>
                        <td class=" "><?php echo $request['first_name'].' '.$request['last_name'];?></td>
                        <td class=" "><?php echo strlen($request['home_name']) > 30 ? substr(strip_tags($request['home_name']),0,30)."..." : strip_tags($request['home_name']);?></td>
                        <td class=" "><?php echo date('d-m-Y H:i a',strtotime($request['created'])); ?></td>
                        <td><a class="btn btn-info btn-xs" href="<?php echo admin_url('requests/view/'.$request['id']); ?>" >View</a></td>
                        </tr>
                        <?php endforeach; } ?>
                    </tbody>
                </table>
                <!-- end project list -->
            </div>
        </div>
        <div class="clearfix"></div>
    </div>

    <div class="col-md-6 col-sm-6 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Latest Enquires</h2>
                <div class="all-link"><a class="btn btn-primary btn-sm " href="<?php echo admin_url('enquiries/overview'); ?>">View All</a></div>
                <div class="clearfix"></div>
            </div>

            <div class="x_content">
                <!-- start project list -->
                <table class="table table-striped projects">
                    <thead>
                        <tr>
                            <th style="">Type</th>
                            <th style="">Name</th>
                            <th style="">Date</th>
                            <th style="">Action</th>
                        </tr>
                    </thead>

                    <tbody id="pending_table" >
                      <?php $types = array('residence' => 'Residence','board_member' => 'Board Member','contact' => 'Contact Us');?>
                        <?php if(count($enquiries)==0){ ?>
                        <tr><td colspan="4">No Enquiries to display...</td></tr>
                        <?php } else {
                        foreach($enquiries as $enquiry):$i=0; ?>
                        <tr>
                            <td><?php echo $types[$enquiry['type']]; ?></td>
                            <td><?php echo $enquiry['name']; ?></td>
                            <td class=" "><?php echo date('d-m-Y H:i a',strtotime($enquiry['created'])); ?></td>
                            <td><a class="btn btn-info btn-xs enquiry-view" href="javascript:void(0)" data-id="<?php echo $enquiry['id']; ?>">View</a></td>
                        </tr>
                        <?php endforeach; } ?>
                    </tbody>
                </table>
                <!-- end project list -->
            </div>
        </div>
        <div class="clearfix"></div>
    </div>

    
</div>
