<div class="row dash-widgets">
<div class="col-md-6 col-sm-6 col-xs-12">
  <div class="alert alert-success" role="alert">
      <h4>Membership</h4>
      <h6 style="font-size:18px;"><?php echo 'ID: #'.$membership->identifier;?></h6>
      <div class="col-md-6 col-sm-6 col-xs-12 no-padd"><h6><?php echo 'Issued Date: '.date('M j, Y', strtotime($membership->issue_date)); ?></h6></div>
      <div class="col-md-6 col-sm-6 col-xs-12 no-padd"><h6><?php echo 'Expiry Date: '.date('M j, Y', strtotime($membership->expiry_date)); ?></h6></div>
      <h6>Package(Beds): <?php echo $package->title;?></h6>
<div class="clearfix"></div>
    </div>
  <div class="alert alert-info" role="alert">
    <h4>Residence</h4>
    <h6><i class="fa fa-home"></i> <?php echo $residence->name;?></h6>
    <h6><i class="fa fa-map-marker"></i> <?php echo $residence->address; ?>   <?php echo $residence->postalcode; ?> , <?php echo $regions[$residence->region_id];?></h6>
    <h6><i class="fa fa-user"></i>  <?php echo $residence->contact_name;?>, <?php echo $residence->email;?>, <?php echo $residence->phone;?></h6>
    <div class="col-md-6 col-sm-6 col-xs-12 no-padd"><h6>Beds: <?php echo $residence->beds_count;?></h6></div>
    <div class="col-md-6 col-sm-6 col-xs-12 no-padd"><h6>Vacancy: <?php echo $residence->vacancy;?></h6></div>
    <div class="clearfix"></div>
  </div>
                  </div>
<div class="col-md-6 col-sm-6 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Enquires</h2>
                <div class="all-link"><a class="btn btn-primary btn-sm " href="<?php echo member_url('enquiries/overview');?>">View All</a></div>
                <div class="clearfix"></div>
            </div>

            <div class="x_content">
                <!-- start project list -->
                <table class="table table-striped projects">
                    <thead>
                        <tr>
                        <th width="20px">#</th>
                        <th>Name</th>
                        <th>Subject</th>
                        <th>Date</th>
                        <th style="">Action</th>
                        </tr>
                    </thead>
                    <tbody id="pending_table" >
                        <?php if(count($enquiries)==0){ ?>
                        <tr><td colspan="6">No recent enquiries to display...</td></tr>
                        <?php } else {
                        foreach($enquiries as $enquiry):$i=0; ?>
                        <tr>
                          <td class=" "><?php echo ++$i; ?></td>
                          <td class=" "><?php echo $enquiry['name'];?></td>
                          <td class=" "><?php echo $enquiry['subject'];?></td>
                          <td> <?php echo date('M j, Y H:i', strtotime($enquiry['created'])); ?></td>
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
