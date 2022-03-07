<?php
$status = array('0' => 'Disabled','1' => 'Enabled');
if($this->uri->segment(4)==""){
	$i = 0;
} else {
	$i = $this->uri->segment(4);
}
?>
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Manage Menus</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li>
                        <span><a class="btn btn-primary btn-xs" href="<?php echo admin_url('menus/add'); ?>" ><i class="fa fa-plus-square-o" aria-hidden="true"></i> &nbsp;Add Menu</a></span>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            
            <div class="x_content">
                <div class="table-responsive">
                    <table class="table table-striped jambo_table">
                        <thead>
                            <tr class="headings">
                                <th class="column-title">#</th>
                                <th class="column-title">Name</th>
                                <th class="column-title">Code</th>
                                <th class="column-title fix-100 center-align">Status</th>
                                <th class="column-title no-link last"><span class="nobr">Action</span>
                                </th>
                            </tr>
                        </thead>
                        
                        <tbody>
                            <?php foreach($menus as $menu):?>
                            <tr class="even pointer">
                                <td class=" "><?php echo ++$i; ?></td>
                                <td class=" "><?php echo $menu['name'];?></td>
                                <td class=" "><?php echo $menu['code'];?></td>
                                <td class="center-align"><?php echo $status[$menu['status']];?></td>
                                <td class=" last">
                                    <a href="<?php echo admin_url('menus/edit/'.$menu['id']); ?>">Edit</a>
                                    | <a href="<?php echo admin_url('menuitems/overview/'.$menu['id']); ?>">Menu Items</a>
                                    | <a class="confirmDelete" href="<?php echo admin_url('menus/delete/'.$menu['id']); ?>">Delete</a>
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