<?php
$types = array('residence' => 'Residence','board_member' => 'Board Member','contact' => 'Contact Us');
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
                <h2>Inquiries</h2>

                <div class="clearfix"></div>
            </div>
						<?php
							$attributes = array('class' => 'form-horizontal form-label-left', 'id' => 'action_filter');
							echo form_open(admin_url_string('enquiries/actions'),$attributes); ?>

							<div class="x_content">

											<div class="action-content ">
												<div class="filter-col">
													Search :
													<input type="text"  class="form-control filter" placeholder="Search key ..." name="enquiry_search_key" value="<?php echo $this->session->userdata('enquiry_search_key_filter'); ?>" />
												</div>

												<div class="filter-col">
													Type:
													<select name="enquiry_type" class="form-control filter">
															<option value="">Select</option>
															<option value="residence" <?php if($this->session->userdata('enquiry_type_filter')=='residence'){ echo 'selected="selected"'; }?>>Residence</option>
															<option value="board_member" <?php if($this->session->userdata('enquiry_type_filter')=='board_member'){ echo 'selected="selected"'; }?>>Board Member</option>
															<option value="contact" <?php if($this->session->userdata('enquiry_type_filter')=='contact'){ echo 'selected="selected"'; }?>>Contact us</option>
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
															<th class="column-name" style="width: 20px;">#</th>
															<th class="column-name">
																<?php $name_direction = ''; if($sort_field=='name'){ $name_direction = $sort_direction; } ?>
																<a href="#0" class="link-sort sort-list-link <?php echo $name_direction; ?>" data-sort-field="name" data-sort-direction="<?php echo $name_direction; ?>">Name</a>
															</th>

															<th class="column-name">
																<?php $email_direction = ''; if($sort_field=='email'){ $email_direction = $sort_direction; } ?>
																<a href="#0" class="link-sort sort-list-link <?php echo $email_direction; ?>" data-sort-field="email" data-sort-direction="<?php echo $email_direction; ?>">Email</a>
															</th>

															<th class="column-name">
																<?php $phone_direction = ''; if($sort_field=='phone'){ $phone_direction = $sort_direction; } ?>
																<a href="#0" class="link-sort sort-list-link <?php echo $phone_direction; ?>" data-sort-field="phone" data-sort-direction="<?php echo $phone_direction; ?>">Phone</a>
															</th>

															<th class="column-name"> <?php $type_direction = ''; if($sort_field=='type'){ $type_direction = $sort_direction; } ?>
															<a href="#0" class="link-sort sort-list-link <?php echo $type_direction; ?>" data-sort-field="type" data-sort-direction="<?php echo $type_direction; ?>">Type</a>
															</th>
															<th class="column-name"> 	</th>
															<th class="column-name"> Subject	</th>
															<th class="column-name"> Created	</th>

															<th class="column-name no-enquiries last"><span class="nobr">Action</span></th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php if(count($enquiries)>0){ foreach($enquiries as $enquiry):?>
                            <tr class="even pointer">
                                <td class=" "><?php echo ++$i; ?></td>
                                <td class=" "><?php echo $enquiry['name'];?></td>
																<td class=" "><?php echo $enquiry['email'];?></td>
																<td class=" "><?php echo $enquiry['phone'];?></td>
																<td class=" "><?php echo $types[$enquiry['type']];?> </td>
																<td class=" ">
																<?php  if($enquiry['type']=='residence' && $enquiry['home_id']!='0' && isset($residences[$enquiry['home_id']])){ ?>
																	<a class="btn btn-default btn-xs"   id="view-residence-btn"  href="#" data-rid="<?php echo $enquiry['home_id'];?>"  title="View"><?php echo $residences[$enquiry['home_id']];?></a>
																<?php	} elseif($enquiry['type']=='board_member' && $enquiry['board_member_id']!='0' && isset($teams[$enquiry['board_member_id']])){ ?>
																<?php echo $teams[$enquiry['board_member_id']];?></a>
															<?php	} else{ echo '--'; } ?>
																</td>
																<td class=" "><?php echo $enquiry['subject'];?></td>
                            		<td> <?php echo date('M j, Y H:i', strtotime($enquiry['created'])); ?></td>

																 <td class=" last">
																	<a class="btn btn-info btn-xs enquiry-view" href="#" data-id="<?php echo $enquiry['id'];?>"  name="view"><i class="fa fa-folder-open"></i> Details</a>
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
