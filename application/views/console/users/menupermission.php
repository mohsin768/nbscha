
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Menu Permission for <?php echo $role->name; ?></h2>
                <div class="clearfix"></div>
            </div>
            
            <div class="x_content">
                <?php
                $attributes = array('class' => '', 'id' => 'categories-add');
                echo form_open(admin_url_string('users/menupermission/'.$role->rid),$attributes);
                ?>
                <div class="table-responsive">
                    <table class="table table-striped jambo_table">
                        <thead>
                            <tr class="headings">
                                <th class="column-title">Menu Name </th>
                                <th class="column-title" style="width:3%;">Permission </th>
                            </tr>
                        </thead>
                        
                        <tbody>
                            <?php $i=0; foreach($menus as $menu): $submenu_count =count($menu['sub_menu']); $i++; ?>
                            <tr class="<?php if($i%2==0){ echo 'even';} else { echo 'odd';}?> pointer">
                                <td><?php echo $menu['name']; ?></td>
                                <td class="last" style="text-align:center;">
                                    <input type="checkbox" name="menus[<?php echo $menu['id']; ?>]" value="1" <?php if(in_array($menu['id'],$menupermission)) { echo 'checked="checked"'; } ?> /></td>
                            </tr>
                            <?php if($submenu_count>0){?>
                            <?php foreach($menu['sub_menu'] as $submenu): $i++; ?>
                            <tr class="<?php if($i%2==0){ echo 'even';} else { echo 'odd';}?> pointer">
                                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $submenu['name']; ?></td>
                                <td class=" last" style="text-align:center;">
                                    <input type="checkbox" name="menus[<?php echo $submenu['id']; ?>]" value="1" <?php if(in_array($submenu['id'],$menupermission)) { echo 'checked="checked"'; } ?> /></td>
                            </tr>
                            <?php endforeach; ?>
                            <?php } ?>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                
                <div class="form-group" style="text-align:right;">
                    <a class="btn btn-primary perm-back" href="<?php echo admin_url('users/roles'); ?>">Back</a>
                    <button type="submit" class="btn btn-success">Submit</button>
                    <div class="clearfix"></div>
                    <br/>
                </div>
                <?php echo form_close(); ?> 
            </div>
        </div>
    </div>
</div>

