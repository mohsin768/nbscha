<div class="row top_tiles">
  <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12 ">
    <div class="tile-stats alert-success">
      <div class="icon"><i class="fa fa-caret-square-o-right"></i></div>
      <div class="count"><?php echo $enquiries_count;?></div>
      <h3 style="color:#fff">Enquiries</h3>
    </div>
  </div>
  <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
    <div class="tile-stats alert-info">
      <div class="icon"><i class="fa fa-comments-o"></i></div>
      <div class="count"><?php echo $news_count;?></div>
      <h3 style="color:#fff">News</h3>
    </div>
  </div>
  <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
    <div class="tile-stats alert-warning">
      <div class="icon"><i class="fa fa-sort-amount-desc"></i></div>
      <div class="count"><?php echo $forms_count;?></div>
      <h3 style="color:#fff">Forms</h3>
    </div>
  </div>
  <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
    <div class="tile-stats alert-danger">
      <div class="icon"><i class="fa fa-link"></i></div>
      <div class="count"><?php echo $links_count;?></div>
      <h3 style="color:#fff">Resource Links</h3>
    </div>
  </div>
</div>


<div class="row dash-widgets">
  <div class="col-md-6 col-sm-6 col-xs-12">
    <div class="alert" role="alert" style="color:#000;background:#d3dee9">
        <div class="x_title">
            <h4 style="margin-bottom:0">Membership</h4>
            <div class="clearfix"></div>
        </div>
        <div class="col-md-12">
          <div class="col-md-6 col-sm-6 col-xs-12 no-padd"><h6 ><?php echo 'ID: #'.$membership->identifier;?></h6></div>
          <div class="col-md-6 col-sm-6 col-xs-12 no-padd"><h6>Package(Beds): <?php echo $package->title;?></h6></div>
          <div class="col-md-6 col-sm-6 col-xs-12 no-padd"><h6><?php echo 'Issued Date: '.date('M j, Y', strtotime($membership->issue_date)); ?></h6></div>
          <div class="col-md-6 col-sm-6 col-xs-12 no-padd"><h6><?php echo 'Expiry Date: '.date('M j, Y', strtotime($membership->expiry_date)); ?></h6></div>
        </div>
        <div class="clearfix"></div>
      </div>
  </div>
  <div class="col-md-6 col-sm-6 col-xs-12">
  <div class="alert" role="alert" style="color:#000;background:#d3dee9">
    <div class="x_title">
        <h4 style="margin-bottom:0">Residence</h4>
        <div class="clearfix"></div>
    </div>
    <div class="col-md-12">
      <div class="col-md-6 col-sm-6 col-xs-12 no-padd"><h6><i class="fa fa-home"></i> <?php echo $residence->name;?></h6></div>
      <div class="col-md-6 col-sm-6 col-xs-12 no-padd"><h6><i class="fa fa-map-marker"></i> <?php echo $regions[$residence->region_id];?></h6></div>
      <div class="col-md-6 col-sm-6 col-xs-12 no-padd"><h6>Max licensed beds: <?php echo $residence->max_beds_count;?></h6></div>
      <div class="col-md-6 col-sm-6 col-xs-12 no-padd"><h6>Vacancy: <?php echo $residence->vacancy;?></h6></div>
    </div>
    <div class="clearfix"></div>
  </div>
</div>
<div class="col-md-6 col-sm-6 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Latest Enquires</h2>
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
                        <th class="fix-60">Action</th>
                        </tr>
                    </thead>
                    <tbody id="pending_table" >
                        <?php if(count($enquiries)==0){ ?>
                        <tr><td colspan="6">No recent enquiries to display...</td></tr>
                        <?php } else {
                        $i=0; foreach($enquiries as $enquiry): ?>
                        <tr>
                          <td class=" "><?php echo ++$i; ?></td>
                          <td class=" "><?php echo $enquiry['name'];?></td>
                          <td class=" "><?php echo $enquiry['subject'];?></td>
                          <td> <?php echo date('M j, Y H:i', strtotime($enquiry['created'])); ?></td>
                        <td class="fix-60" ><a class="btn btn-info btn-xs enquiry-view" href="javascript:void(0)" data-id="<?php echo $enquiry['id']; ?>">View</a></td>
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
                    <h2>Latest News</h2>
                    <div class="all-link"><a class="btn btn-primary btn-sm " href="<?php echo member_url('resources/news');?>">View All</a></div>
                    <div class="clearfix"></div>
                </div>

                <div class="x_content">
                    <!-- start project list -->
                    <table class="table table-striped projects">
                        <thead>
                            <tr>
                            <th width="20px">#</th>
                            <th>Title</th>
                            <th>Published</th>
                            <th class="fix-60">Action</th>
                            </tr>
                        </thead>
                        <tbody id="pending_table" >
                            <?php if(count($news)==0){ ?>
                            <tr><td colspan="6">No recent news to display...</td></tr>
                            <?php } else {
                            $i=0; foreach($news as $neW): ?>
                            <tr>
                              <td class=" "><?php echo ++$i; ?></td>
                              <td class=" "><?php echo $neW['title'];?></td>
                              <td> <?php echo date('M j, Y', strtotime($neW['publish_date'])); ?></td>
                            <td class="fix-60" ><a class="btn btn-info btn-xs news-view" href="javascript:void(0)" data-id="<?php echo $neW['id']; ?>" data-lan="<?php echo $neW['language']; ?>">View</a></td>
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
                        <h2>Latest Forms</h2>
                        <div class="all-link"><a class="btn btn-primary btn-sm " href="<?php echo member_url('resources/forms');?>">View All</a></div>
                        <div class="clearfix"></div>
                    </div>

                    <div class="x_content">
                        <!-- start project list -->
                        <table class="table table-striped projects">
                            <thead>
                                <tr>
                                <th width="20px">#</th>
                                <th>Name</th>
                                <th>Published</th>
                                <th class="fix-60" >Action</th>
                                </tr>
                            </thead>
                            <tbody id="pending_table" >
                                <?php if(count($forms)==0){ ?>
                                <tr><td colspan="6">No recent forms to display...</td></tr>
                                <?php } else {
                                $i=0;  foreach($forms as $form):?>
                                <tr>
                                  <td class=" "><?php echo ++$i; ?></td>
                                  <td class=" "><?php echo $form['name'];?></td>
                                  <td> <?php echo date('M j, Y', strtotime($form['publish_date'])); ?></td>
                                <td class="fix-60"><a class="btn btn-info btn-xs form-view" href="<?php echo base_url('public/uploads/forms/'.$form['attachment']);?>" download >View</a></td>
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
                            <h2>Latest Resource Links</h2>
                            <div class="all-link"><a class="btn btn-primary btn-sm " href="<?php echo member_url('resources/links');?>">View All</a></div>
                            <div class="clearfix"></div>
                        </div>

                        <div class="x_content">
                            <!-- start project list -->
                            <table class="table table-striped projects">
                                <thead>
                                    <tr>
                                    <th width="20px">#</th>
                                    <th>Name</th>
                                    <th>Summary</th>
                                    <th class="fix-60 " >Action</th>
                                    </tr>
                                </thead>
                                <tbody id="pending_table" >
                                    <?php if(count($links)==0){ ?>
                                    <tr><td colspan="6">No recent enquiries to display...</td></tr>
                                    <?php } else {
                                    $i=0; foreach($links as $link): ?>
                                    <tr>
                                      <td class=" "><?php echo ++$i; ?></td>
                                      <td class=" "><?php echo strlen($link['name']) > 30 ? substr($link['name'],0,30)."..." : $link['name']; ?></td>
                                      <td class=" "><?php echo strlen($link['summary']) > 30 ? substr(strip_tags($link['summary']),0,30)."..." : strip_tags($link['summary']); ?></td>
                                    <td class="fix-60"><a class="btn btn-info btn-xs link-view" target="_blank" href="<?php echo $link['link_url'];?>" >View</a></td>
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
