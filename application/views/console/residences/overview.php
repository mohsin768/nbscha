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
                <h2>Residences</h2>

                <div class="clearfix"></div>
            </div>
						<?php
							$attributes = array('class' => 'form-horizontal form-label-left', 'id' => 'action_filter');
							echo form_open(admin_url('residences/actions'),$attributes); ?>

							<div class="x_content">

											<div class="action-content ">
												<div class="filter-col">
													Search :
													<input type="text"  class="form-control filter" placeholder="Member/Residence" name="residence_search_key" value="<?php echo $this->session->userdata('residence_search_key_filter'); ?>" />
												</div>

												<div class="filter-col">
													Package:
													<select name="residence_package" class="form-control filter">
															<option value="">Select</option>
															<?php foreach($packages as $key => $value): ?>
	                                <option value="<?php echo $key; ?>" <?php echo set_select('residence_package_filter',$value); ?>><?php echo $value; ?></option>
	                            	<?php endforeach; ?>
													</select>
												</div>
												<div class="filter-col">
													Region:
													<select name="residence_region" class="form-control filter">
															<option value="">Select</option>
															<?php foreach($regions as $key => $value): ?>
																<option value="<?php echo $key; ?>" <?php if($this->session->userdata('residence_region_filter')==$key){ echo 'selected'; }?>><?php echo $value; ?></option>
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
									<div style="float:right; width:50%;text-align:right">
	                    <a class="btn btn-warning btn-sm"  href="<?php echo admin_url('residences/exporttoexcel');?>" download ><i class="fa fa-download" aria-hidden="true"></i> Export to Excel</a>
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
																<?php $title_direction = ''; if($sort_field=='name'){ $title_direction = $sort_direction; } ?>
																<a href="#0" class="residence-sort sort-list-link <?php echo $title_direction; ?>" data-sort-field="name" data-sort-direction="<?php echo $title_direction; ?>">Home</a></th>
																<th class="column-title">Member</th>
																<th class="column-title">Membership</th>
															<th class="column-title">Maximum Licensed Beds</th>
															<th class="column-title">Vacancy</th>
															<th class="column-title fix-100 center-align">Status</th>
															<th class="column-title no-link last"><span class="nobr">Action</span></th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php if(count($residences)>0){ foreach($residences as $residence):?>
                            <tr class="even pointer">
							<td class="align-center"><input type="checkbox" name="id[]" value="<?php echo $residence['id']; ?>" /></td>
															<td class=" "><?php echo ++$i; ?></td>
                                <td class="align-top "><i class="fa fa-home"></i> <?php echo $residence['name'];?> <br/> <i class="fa fa-map-marker"></i> <?php echo $residence['address'];?><br/><strong>Region:</strong><?php echo $regions[$residence['region_id']];?>
								<br/><i class="fa fa-phone"></i>  <a href="tel:<?php echo $residence['residence_phone'];?>"><?php echo $residence['residence_phone'];?></a>
								</td>
                                <td class=" align-top"><i class="fa fa-user"></i>  <?php echo $residence['first_name'].' '.$residence['last_name'];?><br/>
									<i class="fa fa-envelope"></i>  <?php echo $residence['member_email'];?>,<br/> <i class="fa fa-phone"></i>  <a href="tel:<?php echo $residence['member_phone'];?>"><?php echo $residence['member_phone'];?></a><br/>
								</td>
									<td class=" align-top"><strong>Id: #</strong> <?php echo $residence['member_identifier']; ?><br/>
									<strong>Issued Date:</strong> <?php echo date('M j, Y', strtotime($residence['issue_date'])); ?><br/>
									<strong>Expiry Date:</strong><?php echo date('M j, Y', strtotime($residence['expiry_date'])); ?></td>

									<td class="align-top "><?php echo $residence['max_beds_count'];?></td>

                                <td class="align-top"><?php echo $residence['vacancy'];?></td>
								<td class="center-align"><?php echo $status[$residence['residence_status']];?></td>
                                <td class=" last">
									<a class="btn btn-success btn-xs"   id="view-residence-btn"  href="#" data-rid="<?php echo $residence['id'];?>"  title="View"><i class="fa fa-eye"></i> View</a>
									<a class="btn btn-info btn-xs" id="update-vacancy-btn"  href="#" data-rid="<?php echo $residence['id'];?>"  title="vacancy"><i class="fa fa-bed"></i> Vacancy</a>
									<a class="btn btn-primary btn-xs"  id="update-residence-btn"  href="#" data-rid="<?php echo $residence['id'];?>"  title="edit"><i class="fa fa-edit"></i> Edit</a>
									<a class="btn btn-primary btn-xs"   href="<?php echo admin_url('residences/translates/'.$residence['id']); ?>" title="translates"><i class="fa fa-language"></i> Translates</a>
                                </td>
                            </tr>
								<?php endforeach; }  else {?>
									<tr><td colspan="10"><p>No results Found</p></td></tr>
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
<div id="modal-wrap"></div>
