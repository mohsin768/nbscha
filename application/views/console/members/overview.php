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
                <h2>Members</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li>
                        <span><a class="btn btn-primary btn-sm" href="<?php echo admin_url('members/add'); ?>" ><i class="fa fa-plus-square-o" aria-hidden="true"></i> &nbsp;Add New</a></span>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
						<?php
							$attributes = array('class' => 'form-horizontal form-label-left', 'id' => 'action_filter');
							echo form_open(admin_url('members/actions'),$attributes); ?>

							<div class="x_content">

											<div class="action-content ">
												<div class="filter-col">
													Search :
													<input type="text"  class="form-control filter" placeholder="Search key ..." name="member_search_key" value="<?php echo $this->session->userdata('member_search_key_filter'); ?>" />
												</div>

												<div class="filter-col">
													Status:
													<select name="member_status" class="form-control filter">
															<option value="">Select</option>
															<option value="1" <?php if($this->session->userdata('member_status_filter')=='1'){ echo 'selected="selected"'; }?>>Enable</option>
															<option value="0" <?php if($this->session->userdata('member_status_filter')=='0'){ echo 'selected="selected"'; }?>>Disabled</option>
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
                                <th class="column-title">#</th>
                                <th class="column-title">
																	<?php $first_name_direction = ''; if($sort_field=='first_name'){ $first_name_direction = $sort_direction; } ?>
																	<a href="#0" class="member-sort sort-list-link <?php echo $first_name_direction; ?>" data-sort-field="first_name" data-sort-direction="<?php echo $first_name_direction; ?>">Full Name</a></th>
                                <th class="column-title">
																	<?php $email_direction = ''; if($sort_field=='email'){ $email_direction = $sort_direction; } ?>
																	<a href="#0" class="member-sort sort-list-link <?php echo $email_direction; ?>" data-sort-field="email" data-sort-direction="<?php echo $email_direction; ?>">Email</a></th>
                                <th class="column-title">
																	<?php $phone_direction = ''; if($sort_field=='phone'){ $phone_direction = $sort_direction; } ?>
																	<a href="#0" class="member-sort sort-list-link <?php echo $phone_direction; ?>" data-sort-field="phone" data-sort-direction="<?php echo $phone_direction; ?>">Phone</a></th>
                                <th class="column-title fix-100 center-align">Status</th>
                                <th class="column-title no-link last"><span class="nobr">Action</span>
                                </th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php if(count($members)>0){ foreach($members as $member):?>
                            <tr class="even pointer">
																<td class="align-center"><input type="checkbox" name="id[]" value="<?php echo $member['mid']; ?>" /></td>
                                <td class=" "><?php echo ++$i; ?></td>
                                <td class=" "><?php echo $member['first_name'].' '.$member['last_name'];?></td>
                                <td class=" "><?php echo $member['email'];?></td>
                                <td class=" "><?php echo $member['phone'];?></td>
                                <td class="center-align"><?php echo $status[$member['status']];?></td>
                                <td class=" last">
									
																	<a class="btn btn-primary btn-xs" href="<?php echo admin_url('members/edit/'.$member['mid']); ?>"title="Edit"><i class="fa fa-edit"></i> Edit</a>
																	<a class="btn btn-info btn-xs" href="<?php echo admin_url('members/changepwd/'.$member['mid']); ?>"><i class="fa fa-lock"></i> Change Password</a>
																	<a class="btn btn-danger btn-xs confirmDelete" href="<?php echo admin_url('members/delete/'.$member['mid']); ?>" title="Delete"><i   class="fa fa-trash-o"></i> Delete</a>
																	<a class="btn btn-primary btn-xs" href="<?php echo admin_url('members/membership/'.$member['mid']); ?>"title="Membership"><i class="fa fa-eye"></i> Membership</a>
                                </td>
                            </tr>
													<?php endforeach; }  else {?>
														<tr><td colspan="7"><p>No results Found</p></td></tr>
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
