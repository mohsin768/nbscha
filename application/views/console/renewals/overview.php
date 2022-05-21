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
                <h2>Renewal Requests</h2>
                <div class="clearfix"></div>
            </div>
						<?php
							$attributes = array('class' => 'form-horizontal form-label-left', 'id' => 'action_filter');
							echo form_open(admin_url('renewals/actions'),$attributes); ?>

							<div class="x_content">

											<div class="action-content ">
												<div class="filter-col">
														Request Date:
                            <input type="text"  class="form-control filter renewal_date date-picker" id="renewal_date" name="renewal_date" placeholder="Request Date" value="<?php echo $this->session->userdata('renewal_date_filter') ?>" />
                        </div>

												<div class="filter-col">
													Status:
													<select name="renewal_status" class="form-control filter">
															<option value="">Select</option>
															<option value="1" <?php if($this->session->userdata('renewal_status_filter')=='1'){ echo 'selected="selected"'; }?>>Approved</option>
															<option value="0" <?php if($this->session->userdata('renewal_status_filter')=='0'){ echo 'selected="selected"'; }?>>Pending</option>
													</select>
												</div>
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
                                <th class="column-title  ">Member</th>
                                <th class="column-title  ">New Package</th>
                                <th class="column-title  ">Current Package</th>
                                <th class="column-title  ">Current Expiry Date</th>
                                <th class="column-title  ">Created</th>
								<th class="column-title  ">Processed</th>
                                <th class="column-title  center-align">Status</th>
                                <th class="column-title no-link last"><span class="nobr">Action</span>
                                </th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php if(count($renewals)>0){ foreach($renewals as $renewal):?>
                            <tr class="even pointer">
                                <td class=" "><?php echo ++$i; ?></td>						
                                <td class=""><?php echo $members[$renewal['member_id']];?></td>
                                <td class=""><?php echo $packages[$renewal['new_package_id']];?></td>
                                <td ><?php echo $packages[$renewal['previous_package_id']];?></td>
                                <td ><?php echo date('M j, Y', strtotime($renewal['previous_expiry_date'])); ?></td>
                                <td ><?php echo date('M j, Y', strtotime($renewal['created_date'])); ?></td>
                                <td ><?php if($renewal['processed_date']!='') echo date('M j, Y', strtotime($renewal['processed_date'])); ?></td>
                                <td class="center-align" style="color:<?php if($renewal['status'] =='approved'){ echo 'green';} elseif($renewal['status'] =='rejected'){ echo 'red'; } ?>"><?php echo ucwords($renewal['status']);?></td>
                                <td class=" last">
                                <?php if($renewal['status'] =='pending'){ ?>
                                <?php $approvalBodyText = 'Are you sure you want to APPROVE the request ?';?>
                                <?php $rejectionBodyText = 'Are you sure you want to REJECT the request ?';?>

                                <a class=" btn btn-success btn-xs confirmAction" data-body-text="<?php echo $approvalBodyText; ?>" data-button-text="Yes" href="<?php echo admin_url('renewals/approve/'.$renewal['id']); ?>" title="Approve"><i class="fa fa-check"></i> Approve</a>
                                <a class=" btn btn-danger btn-xs confirmAction" data-body-text="<?php echo $rejectionBodyText; ?>" data-button-text="Yes" href="<?php echo admin_url('renewals/reject/'.$renewal['id']); ?>" title="Reject"><i class="fa fa-ban"></i> Reject</a>
                                <?php } ?>
                                <a class="btn btn-primary btn-xs" href="<?php echo admin_url('renewals/view/'.$renewal['id']); ?>"title="View"><i class="fa fa-eye"></i> Details</a>
                                </td>
                            </tr>
                            <?php endforeach; }  else {?>
                                <tr><td colspan="9"><p>No results Found</p></td></tr>
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