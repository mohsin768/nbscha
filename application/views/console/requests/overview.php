<?php
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
                <h2>Membership Requests</h2>
                <div class="clearfix"></div>
            </div>
						<?php
							$attributes = array('class' => 'form-horizontal form-label-left', 'id' => 'action_filter');
							echo form_open(admin_url('requests/actions'),$attributes); ?>

							<div class="x_content">

											<div class="action-content ">
												<div class="filter-col">
													Search :
													<input type="text"  class="form-control filter" placeholder="Search key ..." name="request_search_key" value="<?php echo $this->session->userdata('request_search_key_filter'); ?>" />
												</div>
												<div class="filter-col">
														Request Date:
                            <input type="text"  class="form-control filter request_date date-picker" id="request_date" name="request_date" placeholder="Request Date" value="<?php echo $this->session->userdata('request_date_filter') ?>" />
                        </div>

												<div class="filter-col">
													Status:
													<select name="request_status" class="form-control filter">
															<option value="">Select</option>
															<option value="1" <?php if($this->session->userdata('request_status_filter')=='1'){ echo 'selected="selected"'; }?>>Approved</option>
															<option value="0" <?php if($this->session->userdata('request_status_filter')=='0'){ echo 'selected="selected"'; }?>>Pending</option>
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
                <div class="table-responsive">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr class="headings">
                                <th class="column-title">#</th>
																<th class="column-title">Identifier</th>
                                <th class="column-title">
																	<?php $first_name_direction = ''; if($sort_field=='first_name'){ $first_name_direction = $sort_direction; } ?>
																	<a href="#0" class="request-sort sort-list-link <?php echo $first_name_direction; ?>" data-sort-field="first_name" data-sort-direction="<?php echo $first_name_direction; ?>">Full Name</a></th>
                                <th class="column-title">
																	<?php $email_direction = ''; if($sort_field=='email'){ $email_direction = $sort_direction; } ?>
																	<a href="#0" class="request-sort sort-list-link <?php echo $email_direction; ?>" data-sort-field="email" data-sort-direction="<?php echo $email_direction; ?>">Email</a></th>
                                <th class="column-title">
																	<?php $phone_direction = ''; if($sort_field=='phone'){ $phone_direction = $sort_direction; } ?>
																	<a href="#0" class="request-sort sort-list-link <?php echo $phone_direction; ?>" data-sort-field="phone" data-sort-direction="<?php echo $phone_direction; ?>">Phone</a></th>
																	<th class="column-title fix-100 center-align">Package(Beds)</th>
																	<th class="column-title fix-100 center-align">Region</th>
																	<th class="column-title fix-100 center-align">Created</th>
																	<th class="column-title fix-100 center-align">Processed</th>
                                <th class="column-title fix-100 center-align">Status</th>
                                <th class="column-title no-link last"><span class="nobr">Action</span>
                                </th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php if(count($requests)>0){ foreach($requests as $request):?>
                            <tr class="even pointer">
                                <td class=" "><?php echo ++$i; ?></td>
																<td class=" "><?php echo $request['identifier'];?></td>
                                <td class=" "><?php echo $request['first_name'].' '.$request['last_name'];?></td>
                                <td class=" "><?php echo $request['email'];?></td>
                                <td class=" "><?php echo $request['phone'];?></td>
																<td class="center-align"><?php echo $packages[$request['package_id']];?></td>
																<td class="center-align"><?php echo $regions[$request['region_id']];?></td>
																<td ><?php echo date('M j, Y h:i A', strtotime($request['created'])); ?></td>
																<td ><?php if($request['processed_date']!='') echo date('M j, Y h:i A', strtotime($request['processed_date'])); ?></td>
                                <td class="center-align" style="color:<?php if($request['status'] =='approved'){ echo 'green';} elseif($request['status'] =='rejected'){ echo 'red'; } ?>"><?php echo ucwords($request['status']);?></td>
                                <td class=" last">
																	<?php if($request['status'] =='pending'){ ?>
																		<?php $approvalBodyText = 'Are you sure you want to APPROVE the request #'.$request['identifier'].'?';?>
																		<?php $rejectionBodyText = 'Are you sure you want to REJECT the request #'.$request['identifier'].'?';?>

                                      <a class=" btn btn-success btn-xs confirmAction" data-body-text="<?php echo $approvalBodyText; ?>" data-button-text="Yes" href="<?php echo admin_url('requests/approve/'.$request['id']); ?>" title="Approve"><i class="fa fa-check"></i> Approve</a>
																			<a class=" btn btn-danger btn-xs confirmAction" data-body-text="<?php echo $rejectionBodyText; ?>" data-button-text="Yes" href="<?php echo admin_url('requests/reject/'.$request['id']); ?>" title="Reject"><i class="fa fa-ban"></i> Reject</a>
                                      <?php } ?>
																	<a class="btn btn-primary btn-xs" href="<?php echo admin_url('requests/view/'.$request['id']); ?>"title="View"><i class="fa fa-eye"></i> Details</a>
                                </td>
                            </tr>
													<?php endforeach; }  else {?>
														<tr><td colspan="11"><p>No results Found</p></td></tr>
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
