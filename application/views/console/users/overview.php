<?php
$status = array('0' => 'Disabled','1' => 'Enabled');
if($this->uri->segment(4)==""){
	$i=0;
}else{
	$i=$this->uri->segment(4);
}
?>
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Users</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li>
                        <span><a class="btn btn-primary btn-sm" href="<?php echo admin_url('users/add'); ?>" ><i class="fa fa-plus-square-o" aria-hidden="true"></i> &nbsp;Add New</a></span> 
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
                                <th class="column-title">Fullname</th>
                                <th class="column-title">Email</th>
                                <th class="column-title">Phone</th>
                                <th class="column-title">Role</th>
                                <th class="column-title fix-100 center-align">Status</th>
                                <th class="column-title no-link last"><span class="nobr">Action</span>
                                </th>
                            </tr>
                        </thead>
                        
                        <tbody>
                            <?php foreach($users as $user):?>
                            <tr class="even pointer">
                                <td class=" "><?php echo ++$i; ?></td>
                                <td class=" "><?php echo $user['fullname'];?></td>
                                <td class=" "><?php echo $user['email'];?></td>
                                <td class=" "><?php echo $user['phone'];?></td>
                                <td class=" "><?php echo $roles[$user['role']];?></td>
                                <td class="center-align"><?php echo $status[$user['status']];?></td>
                                <td class=" last">
                                    <?php if($user['uid']!='1' && $user['uid']!=$this->session->userdata('admin_user_id')){ ?>
                                    <a href="<?php echo admin_url('users/edit/'.$user['uid']); ?>">Edit</a>
                                    | <a href="<?php echo admin_url('users/changepwd/'.$user['uid']); ?>">Change Password</a>
                                    | <a class="confirmDelete" href="<?php echo admin_url('users/delete/'.$user['uid']); ?>">Delete</a>
                                    <?php } ?>
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