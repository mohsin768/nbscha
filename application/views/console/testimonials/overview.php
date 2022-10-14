<?php
$status = array('0' => 'Disabled','1' => 'Enabled');
if($this->uri->segment(5)==""){
	$i=0;
}else{
	$i=$this->uri->segment(5);
}
?>
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Testimonials</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li>
                        <span><a class="btn btn-primary btn-sm" href="<?php echo admin_url('testimonials/add'); ?>" ><i class="fa fa-plus-square-o" aria-hidden="true"></i> &nbsp;Add New</a></span>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
						<?php
							$attributes = array('class' => 'testimonial-horizontal testimonial-label-left', 'id' => 'action_filter');
							echo form_open(admin_url('testimonials/actions'),$attributes); ?>

							<div class="x_content">

											<div class="action-content ">
												<div class="filter-col">
													Search :
													<input type="text"  class="form-control filter" placeholder="Search key ..." name="testimonial_search_key" value="<?php echo $this->session->userdata('testimonial_search_key_filter'); ?>" />
												</div>


												<div class="filter-col">
													Status:
													<select name="testimonial_status" class="form-control filter">
															<option value="">Select</option>
															<option value="1" <?php if($this->session->userdata('testimonial_status_filter')=='1'){ echo 'selected="selected"'; }?>>Enable</option>
															<option value="0" <?php if($this->session->userdata('testimonial_status_filter')=='0'){ echo 'selected="selected"'; }?>>Disabled</option>
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
					<div class="lang-col" style="float:right; width:50%">
						<ul class="nav navbar-right panel_toolbox">
							<?php foreach($languages as $languageRow): ?>
							<li>
								<span><a class="btn btn-sm <?php if($languageRow['code']==$language){ ?>btn-primary<?php } else { ?>btn-secondary<?php }?>" href="<?php echo admin_url('testimonials/overview/'.$languageRow['code']); ?>" ><?php echo $languageRow['name']; ?></a></span> 
							</li>
							<?php endforeach; ?>
						</ul>
					</div>
					<div class="clearfix"></div>
	            </div>

            <div class="x_content">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr class="headings">
															<th style="width: 20px;"><input type="checkbox" class="select_all" name="ids" id="ids" /></th>
															<th class="column-name" style="width: 20px;">#</th>
															<th class="column-name">
																<?php $author_direction = ''; if($sort_field=='author'){ $author_direction = $sort_direction; } ?>
																<a href="#0" class="testimonial-sort sort-list-testimonial <?php echo $author_direction; ?>" data-sort-field="author" data-sort-direction="<?php echo $author_direction; ?>">Author</a></th>

															<th class="column-name">
																<?php $language_direction = ''; if($sort_field=='language'){ $language_direction = $sort_direction; } ?>
																<a href="#0" class="testimonial-sort sort-list-testimonial <?php echo $language_direction; ?>" data-sort-field="language" data-sort-direction="<?php echo $language_direction; ?>">Language</a>
															</th>

															<th class="column-name fix-100 center-align">Status</th>
															<th class="column-name no-testimonial last"><span class="nobr">Action</span></th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php if(count($testimonials)>0){ foreach($testimonials as $testimonial):?>
                            <tr class="even pointer">
																<td class="align-center"><input type="checkbox" name="id[]" value="<?php echo $testimonial['id']; ?>" /></td>
                                <td class=" "><?php echo ++$i; ?></td>
                                <td class=" "><?php echo $testimonial['author'];?></td>

																<td class=" "><?php echo $this->languages_pair[$testimonial['language']];?></td>

                                <td class="center-align"><?php echo $status[$testimonial['status']];?></td>
                                <td class=" last">
																	<a class="btn btn-dark btn-xs" href="<?php echo admin_url('testimonials/translates/'.$testimonial['id']); ?>"><i class="fa fa-language"></i> Translates</a>
																	<a class="btn btn-info btn-xs" href="<?php echo admin_url('testimonials/edit/'.$testimonial['id'].'/'.$testimonial['language']); ?>"name="Edit"><i class="fa fa-edit"></i> Edit</a>
																	<a class="btn btn-danger btn-xs confirmDelete" href="<?php echo admin_url('testimonials/delete/'.$testimonial['id']); ?>" name="Delete"><i   class="fa fa-trash-o"></i> Delete</a>
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
