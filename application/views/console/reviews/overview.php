<?php
$status = array('0' => 'Disabled','1' => 'Enabled');
?>
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Reviews</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li>
                        <span><a class="btn btn-primary btn-sm" href="<?php echo admin_url('reviews/add'); ?>" ><i class="fa fa-plus-square-o" aria-hidden="true"></i> &nbsp;Add New</a></span> 
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <?php
                $attributes = array('class' => 'form-horizontal form-label-left', 'id' => 'filter');
                echo form_open(admin_url('reviews/actions'),$attributes); 
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
                                    <th scope="col" style="width: 20px;"><input type="checkbox" class="select_all" name="ids" id="ids" /></th>
                                    <th class="column-title">#</th>
                                    <th class="column-title">Name</th>
                                     <th class="column-title">Position </th>
                                      <th class="column-title">Date</th>
                                     <th style="width: 150px;">Sort Order <input style="padding:1px;" type="submit" name="sortsave" value="Save" /></th>
                                    <th class="column-title fix-100 center-align">Status</th>
                                    <th class="column-title no-link last fix-100"><span class="nobr">Action</span></th>
                                </tr>
                            </thead>
                            
                            <tbody>
                                <?php $i=0; foreach($reviews as $review):?>
                                <tr class="even pointer">
                                    <td class="align-center"><input type="checkbox" name="id[]" value="<?php echo $review['id']; ?>" /></td>
                                    <td class="align-center"><?php echo ++$i; ?></td>
                                    <td class=" "><?php echo $review['name'];?></td>
                                    <td class=" "><?php echo $review['position'];?></td>
                                    <td class=" "><?php echo date('d-m-Y',strtotime($review['date']))?></td>

                                    <td class="align-center"><input style="text-align:center;" type="text" size="2" name="sort_order[<?php echo $review['id'];?>]" value="<?php echo $review['sort_order'];?>" /></td>
                                <td class="center-align"><?php echo $status[$review['status']];?></td>

                                    <td class=" last">
                                <a href="<?php echo admin_url('reviews/edit/'.$review['id']); ?>">Edit</a>
                                    | <a class="confirmDelete" href="<?php echo admin_url('reviews/delete/'.$review['id']); ?>">Delete</a>
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
  </div>
<!-- /page content -->
