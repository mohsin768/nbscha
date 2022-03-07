<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Events</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li>
                        <span><a class="btn btn-primary btn-sm" href="<?php echo admin_url('events/add'); ?>" ><i class="fa fa-plus-square-o" aria-hidden="true"></i> &nbsp;Add New</a></span> 
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="table-responsive">
                    <table class="table table-striped jambo_table">
                        <thead>
                            <tr class="headings">
                                <th class="column-title">Title</th>
                                <th class="column-title">Start Date</th>
                                <th class="column-title">End Date</th>
                                <th class="column-title center-align">Status</th>
                                <th class="column-title no-link last"><span class="nobr">Action</span>
                                </th>
                            </tr>
                        </thead>
                        
                        <tbody>
                            <?php foreach($events as $event):?>
                            <tr class="even pointer">
                                <td class=" "><?php echo $event['title'];?></td>
                                <td class=" "><?php echo date('d-m-Y',strtotime($event['start_date'])); ?></td>
                                <td class=" "><?php echo date('d-m-Y',strtotime($event['end_date'])); ?></td>
                                <td class="center-align">
                                    <?php if($event['status']=='0'){ ?>
                                        <a class="confirmAction" href="<?php echo admin_url('events/activate/'.$event['id']); ?>">Set as Active</a>
                                    <?php } else { ?>
                                    Active
                                    <?php } ?>
                                </td>
                                <td class=" last">
                                <a href="<?php echo admin_url('events/edit/'.$event['id']); ?>">Edit</a>
                                    | <a class="confirmDelete" href="<?php echo admin_url('events/delete/'.$event['id']); ?>">Delete</a>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="pagination_wrap">
    <ul class="pagination"><?php echo $this->pagination->create_links(); ?></ul>
</div>