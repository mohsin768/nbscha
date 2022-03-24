<div class="row dash-widgets">
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
                        <th>Business Name</th>
                        <th>Date</th>
                        <th style="">Action</th>
                        </tr>
                    </thead>
                    <tbody id="pending_table" >
                        <?php if(count($enquiries)==0){ ?>
                        <tr><td colspan="3">No recent enquiries to display...</td></tr>
                        <?php } else {
                        foreach($enquiries as $enquiry):$i=0; ?>
                        <tr>
                        <td class=" "><?php echo $enquiry['business_name']; ?></td>
                        <td class=" "><?php echo date('d-m-Y H:i a',strtotime($enquiry['created'])); ?></td>
                        <td><a class="enquiry-view" href="javascript:void(0)" data-id="<?php echo $enquiry['id']; ?>">View</a></td>
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
                <h2>News</h2>
                <div class="all-link"><a class="btn btn-primary btn-sm " href="<?php echo member_url('resources/news'); ?>">View All</a></div>
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
                        <?php if(count($enquiries)==0){ ?>
                        <tr><td colspan="4">No news to display...</td></tr>
                        <?php } else {
                        foreach($enquiries as $enquiry):$i=0; ?>
                        <tr>
                            <td><?php echo $enquiry['type']; ?></td>
                            <td><?php echo $enquiry['name']; ?></td>
                            <td class=" "><?php echo date('d-m-Y H:i a',strtotime($enquiry['created'])); ?></td>
                            <td><a class="enquiry-view" href="javascript:void(0)" data-id="<?php echo $enquiry['id']; ?>">View</a></td>
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
                <h2>Forms</h2>
                <div class="all-link"><a class="btn btn-primary btn-sm " href="<?php echo member_url('resources/forms'); ?>">View All</a></div>
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
                        <?php if(count($enquiries)==0){ ?>
                        <tr><td colspan="4">No forms to display...</td></tr>
                        <?php } else {
                        foreach($enquiries as $enquiry):$i=0; ?>
                        <tr>
                            <td><?php echo $enquiry['type']; ?></td>
                            <td><?php echo $enquiry['name']; ?></td>
                            <td class=" "><?php echo date('d-m-Y H:i a',strtotime($enquiry['created'])); ?></td>
                            <td><a class="enquiry-view" href="javascript:void(0)" data-id="<?php echo $enquiry['id']; ?>">View</a></td>
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
                <h2>Links</h2>
                <div class="all-link"><a class="btn btn-primary btn-sm " href="<?php echo member_url('resources/links'); ?>">View All</a></div>
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
                        <?php if(count($enquiries)==0){ ?>
                        <tr><td colspan="4">No links to display...</td></tr>
                        <?php } else {
                        foreach($enquiries as $enquiry):$i=0; ?>
                        <tr>
                            <td><?php echo $enquiry['type']; ?></td>
                            <td><?php echo $enquiry['name']; ?></td>
                            <td class=" "><?php echo date('d-m-Y H:i a',strtotime($enquiry['created'])); ?></td>
                            <td><a class="enquiry-view" href="javascript:void(0)" data-id="<?php echo $enquiry['id']; ?>">View</a></td>
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
