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
                <h2>Board Members</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li>
                        <span><a class="btn btn-primary btn-sm" href="<?php echo admin_url('teams/add'); ?>" ><i class="fa fa-plus-square-o" aria-hidden="true"></i> &nbsp;Add New</a></span>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
						<?php
							$attributes = array('class' => 'form-horizontal form-label-left', 'id' => 'action_filter');
							echo form_open(admin_url('teams/actions'),$attributes); ?>

							<div class="x_content">

											<div class="action-content ">
												<div class="filter-col">
													Search :
													<input type="text"  class="form-control filter" placeholder="Search key ..." name="team_search_key" value="<?php echo $this->session->userdata('team_search_key_filter'); ?>" />
												</div>

												<div class="filter-col">
													Status:
													<select name="team_status" class="form-control filter">
															<option value="">Select</option>
															<option value="1" <?php if($this->session->userdata('team_status_filter')=='1'){ echo 'selected="selected"'; }?>>Enable</option>
															<option value="0" <?php if($this->session->userdata('team_status_filter')=='0'){ echo 'selected="selected"'; }?>>Disabled</option>
													</select>
												</div>
												<div class="filter-col">
													Language:
													<select id="team_language" name="team_language" class="form-control filter">
	                            <option value=""> All </option>
	                            <?php foreach($this->languages_pair as $code => $name): ?>
	                                <option value="<?php echo $code; ?>" <?php echo set_select('team_language_filter',$code); ?>><?php echo $name; ?></option>
	                            <?php endforeach; ?>
	                        </select>

												</div>
												<input type="hidden" value="" name="sort_field" id="sort_field" />
												<div class="filter-col">
													<button class="btn btn-success btn-xs filter" type="submit" value="Search" name="search" ><i class="fa fa-filter" aria-hidden="true"></i> Filter</button>
													<button class="btn btn-dark btn-xs filter" type="submit" value="Reset" name="reset" ><i class="fa fa-refresh" aria-hidden="true"></i> Reset</button>
												</div>

											</div>

							</div>

							<div class="x_content">
	                <div style="float:left; width:50%">
	                    <input class="btn btn-secondary btn-sm" type="submit" name="enable" value="Enable" />
	                    <input class="btn btn-secondary btn-sm" type="submit" name="disable" value="Disable"  />
	                </div>
	            </div>

            <div class="x_content">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr class="headings">
															<th style="width: 20px;"><input type="checkbox" class="select_all" name="ids" id="ids" /></th>
															<th class="column-title" style="width: 20px;">#</th>
															<th class="column-title">
																<?php $title_direction = ''; if($sort_field=='title'){ $title_direction = $sort_direction; } ?>
																<a href="#0" class="team-sort sort-list-link <?php echo $title_direction; ?>" data-sort-field="title" data-sort-direction="<?php echo $title_direction; ?>">Name</a></th>

																<?php $position_direction = ''; if($sort_field=='position'){ $position_direction = $sort_direction; } ?>
																<a href="#0" class="team-sort sort-list-link <?php echo $position_direction; ?>" data-sort-field="position" data-sort-direction="<?php echo $position_direction; ?>">Position</a></th>


															<th class="column-title">
																<?php $language_direction = ''; if($sort_field=='language'){ $language_direction = $sort_direction; } ?>
																<a href="#0" class="team-sort sort-list-link <?php echo $language_direction; ?>" data-sort-field="language" data-sort-direction="<?php echo $language_direction; ?>">Language</a>
															</th>
															<th style="width: 150px;"><?php $order_direction = ''; if($sort_field=='sort_order'){ $order_direction = $sort_direction; } ?>
															<a href="#0" style="display:inline" class="team-sort sort-list-link <?php echo $order_direction; ?>" data-sort-field="sort_order" data-sort-direction="<?php echo $order_direction; ?>">Sort Order </a> <input style="padding:1px;" type="submit" name="sortsave" value="Save" /></th>
															<th class="column-title fix-100 center-align">Status</th>
															<th class="column-title no-link last"><span class="nobr">Action</span></th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php if(count($teams)>0){ foreach($teams as $team):?>
                            <tr class="even pointer">
																<td class="align-center"><input type="checkbox" name="id[]" value="<?php echo $team['id']; ?>" /></td>
                                <td class=" "><?php echo ++$i; ?></td>
                                <td class=" "><?php echo $team['title'];?></td>
																<td class=" "><?php echo $team['position'];?></td>
																<td class=" "><?php echo $this->languages_pair[$team['language']];?></td>
																 <td class="align-center"><input style="text-align:center;" type="text" size="2" <?php if($team['language']!=$this->default_language) echo 'disabled'; ?> name="sort_order[<?php echo $team['id'];?>]" value="<?php echo $team['sort_order'];?>" /> </td>
                                <td class="center-align"><?php echo $status[$team['status']];?></td>
                                <td class=" last">
																	<a class="btn btn-dark btn-xs" href="<?php echo admin_url('teams/translates/'.$team['id']); ?>"><i class="fa fa-language"></i> Translates</a>
																	<a class="btn btn-info btn-xs" href="<?php echo admin_url('teams/edit/'.$team['id'].'/'.$team['language']); ?>"title="Edit"><i class="fa fa-edit"></i> Edit</a>
																	<a class="btn btn-danger btn-xs confirmDelete" href="<?php echo admin_url('teams/delete/'.$team['id']); ?>" title="Delete"><i   class="fa fa-trash-o"></i> Delete</a>
                                </td>
                            </tr>
													<?php endforeach; }  else {?>
														<tr><td colspan="8"><p>No results Found</p></td></tr>
													 <?php }?>
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