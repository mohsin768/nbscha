<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Manage Menu - <?php echo $menu_detail->name; ?></h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li>
                        <span><a class="btn btn-primary btn-sm" href="<?php echo admin_url('menuitems/add/'.$menu_detail->id); ?>" ><i class="fa fa-plus-square-o" aria-hidden="true"></i> &nbsp;Add Menu Item</a></span> 
                    </li>
                    <li>
                        <span><a class="btn btn-primary btn-sm" href="<?php echo admin_url('menus/overview'); ?>" ><i class="fa fa-bars" aria-hidden="true"></i> &nbsp;Menus</a></span> 
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <?php
                $attributes = array('class' => 'form-horizontal form-label-left', 'id' => 'filter');
                echo form_open(admin_url('menuitems/actions/'.$menu_detail->id),$attributes); 
            ?>
            <div class="x_content">
                <div style="float:left; width:50%">
                    <input class="btn btn-secondary btn-sm" type="submit" name="enable" value="Enable" />
                    <input class="btn btn-secondary btn-sm" type="submit" name="disable" value="Disable"  />
                </div>
                <div class="lang-col" style="float:right; width:50%">
                    <ul class="nav navbar-right panel_toolbox">
                        <?php foreach($languages as $languageRow): ?>
                        <li>
                            <span><a class="btn btn-sm <?php if($languageRow['code']==$language){ ?>btn-primary<?php } else { ?>btn-secondary<?php }?>" href="<?php echo admin_url('menuitems/overview/'.$menu_detail->id.'/'.$languageRow['code']); ?>" ><?php echo $languageRow['name']; ?></a></span> 
                        </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
            <div class="x_content">
                <div class="table-responsive">
                    <table class="table table-striped jambo_table">
                        <thead>
                            <tr class="headings">
                                <th style="width: 20px;"><input type="checkbox" class="select_all" name="ids" id="ids" /></th>
                                <th class="column-title">Name</th>
                                <th class="column-title">Link Type</th>
                                <th style="width: 150px;">Sort Order <input style="padding:1px;" type="submit" name="sortsave" value="Save" /></th>
                                <th class="column-title fix-100 center-align">Language</th>
                                <th class="column-title fix-100 center-align">Status</th>
                                <th class="column-title no-link last"><span class="nobr">Action</span>
                                </th>
                            </tr>
                        </thead>
                        
                        <tbody>
                            <?php echo $menus_list; ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>