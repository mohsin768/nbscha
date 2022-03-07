<?php
$status = array('0' => 'Disabled','1' => 'Enabled');
?>
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Videos</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li>
                        <span><a class="btn btn-primary btn-sm" href="<?php echo admin_url('videos/add'); ?>" ><i class="fa fa-plus-square-o" aria-hidden="true"></i> &nbsp;Add New</a></span> 
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <?php
                $attributes = array('class' => 'form-horizontal form-label-left', 'id' => 'filter');
                echo form_open(admin_url('videos/actions'),$attributes); 
            ?>
            <div class="x_content">
                <div style="float:left; width:50%">
                    <input class="btn btn-secondary btn-sm" type="submit" name="enable" value="Enable" />
                    <input class="btn btn-secondary btn-sm" type="submit" name="disable" value="Disable"  />
                </div>
            </div>
            <div class="x_content">
                <div class="table-responsive">
                    <table class="table table-striped jambo_table">
                        <thead>
                            <tr class="headings">
                            <th style="width: 20px;"><input type="checkbox" class="select_all" name="ids" id="ids" /></th>
                                <th class="column-title">Title</th>
                                <th class="column-title">Video link</th>
                                <th class="column-title">Date</th>
                                <th class="column-title fix-100 center-align">Status</th>
                                <th class="column-title no-link last"><span class="nobr">Action</span>
                                </th>
                            </tr>
                        </thead>
                        
                        <tbody>
                            <?php foreach($videos as $video):?>
                            <tr class="even pointer">
                                <td class="align-center"><input type="checkbox" name="id[]" value="<?php echo $video['id']; ?>" /></td>
                                <td class=" "><?php echo $video['title'];?></td>
                                <td class=" "><?php echo $video['video_url'];?></td>
                                <td class=" "><?php echo  date("d-m-Y ", strtotime($video['date']));?></td>
                                <td class="center-align"><?php echo $status[$video['status']];?></td>
                                <td class=" last">
                                <a href="<?php echo admin_url('videos/edit/'.$video['id']); ?>">Edit</a>
                                    | <a class="confirmDelete" href="<?php echo admin_url('videos/delete/'.$video['id']); ?>">Delete</a>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>
<div class="pagination_wrap">
    <ul class="pagination"><?php echo $this->pagination->create_links(); ?></ul>
</div>