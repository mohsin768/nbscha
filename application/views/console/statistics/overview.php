<?php
$status = array('0' => 'Disabled','1' => 'Enabled');
?>
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Statistics</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li>
                        <span><a class="btn btn-primary btn-sm" href="<?php echo admin_url('statistics/add'); ?>" ><i class="fa fa-plus-square-o" aria-hidden="true"></i> &nbsp;Add New</a></span> 
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <?php
                $attributes = array('class' => 'form-horizontal form-label-left', 'id' => 'filter');
                echo form_open(admin_url('statistics/actions'),$attributes); 
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
                                <th class="column-title">Event</th>
                                <th class="column-title">Title</th>
                                <th class="column-title">Number</th>
                                <th style="width: 150px;">Sort Order <input style="padding:1px;" type="submit" name="sortsave" value="Save" /></th>
                                <th class="column-title fix-100 center-align">Status</th>
                                <th class="column-title no-link last"><span class="nobr">Action</span>
                                </th>
                            </tr>
                        </thead>
                        
                        <tbody>
                            <?php foreach($statistics as $statistic):?>
                            <tr class="even pointer">
                                <td class="align-center"><input type="checkbox" name="id[]" value="<?php echo $statistic['id']; ?>" /></td>
                                <td class=" "><?php echo $events[$statistic['event']];?></td>
                                <td class=" "><?php echo $statistic['title'];?></td>
                                <td class=" "><?php echo $statistic['number'];?></td>
                                <td class="align-center"><input style="text-align:center;" type="text" size="2" name="sort_order[<?php echo $statistic['id'];?>]" value="<?php echo $statistic['sort_order'];?>" /></td>
                                <td class="center-align"><?php echo $status[$statistic['status']];?></td>
                                <td class=" last">
                                <a href="<?php echo admin_url('statistics/edit/'.$statistic['id']); ?>">Edit</a>
                                    | <a class="confirmDelete" href="<?php echo admin_url('statistics/delete/'.$statistic['id']); ?>">Delete</a>
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