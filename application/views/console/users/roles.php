<?php
$status = array('0' => 'Disabled','1' => 'Enabled');
?>

<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Roles</h2>
                <div class="clearfix"></div>
            </div>
            
            <div class="x_content">
                <div class="table-responsive">
                    <table class="table table-striped jambo_table">
                        <thead>
                            <tr class="headings">
                                <th class="column-title">Role Name </th>
                                <th class="column-title fix-100 center-align">Status</th>
                                <th class="column-title no-link last"><span class="nobr">Action</span>
                                </th>
                            </tr>
                        </thead>
                        
                        <tbody>
                            <?php foreach($roles as $role):?>
                            <tr class="even pointer">
                                <td class=" "><?php echo $role['name'];?></td>
                                <td class="center-align"><?php echo $status[$role['status']];?></td>
                                <td class=" last">
                                    <?php if($role['rid']!='1'){ ?>
                                    <a href="<?php echo admin_url('users/editrole/'.$role['rid']); ?>">Edit</a> |
                                    <a href="<?php echo admin_url('users/menupermission/'.$role['rid']); ?>">Menu Permission</a>
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
