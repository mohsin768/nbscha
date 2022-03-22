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
                <h2>Forms</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li>
                        <span><a class="btn btn-primary btn-sm" href="<?php echo admin_url('forms/add'); ?>" ><i class="fa fa-plus-square-o" aria-hidden="true"></i> &nbsp;Add New</a></span>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
						<?php
							$attributes = array('class' => 'form-horizontal form-label-left', 'id' => 'action_filter');
							echo form_open(admin_url('forms/actions'),$attributes); ?>

							<div class="x_content">

											<div class="action-content ">
												<div class="filter-col">
													Search :
													<input type="text"  class="form-control filter" placeholder="Search key ..." name="form_search_key" value="<?php echo $this->session->userdata('form_search_key_filter'); ?>" />
												</div>

												<div class="filter-col">
													Type:
													<select id="form_type" name="form_type" class="form-control filter">
	                            <option value=""> All </option>
	                            <?php foreach($resourse_types as $key => $value): ?>
	                                <option value="<?php echo $key; ?>" <?php if($this->session->userdata('form_type_filter')==$key){ echo 'selected'; }?>><?php echo $value; ?></option>
	                            <?php endforeach; ?>
	                        </select>

												</div>

												<div class="filter-col">
													Status:
													<select name="form_status" class="form-control filter">
															<option value="">Select</option>
															<option value="1" <?php if($this->session->userdata('form_status_filter')=='1'){ echo 'selected="selected"'; }?>>Enable</option>
															<option value="0" <?php if($this->session->userdata('form_status_filter')=='0'){ echo 'selected="selected"'; }?>>Disabled</option>
													</select>
												</div>
												<div class="filter-col">
													Language:
													<select id="form_language" name="form_language" class="form-control filter">
	                            <option value=""> All </option>
	                            <?php foreach($this->languages_pair as $code => $name): ?>
	                                <option value="<?php echo $code; ?>" <?php if($this->session->userdata('form_language_filter')==$code){ echo 'selected'; }?>><?php echo $name; ?></option>
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
															<th class="column-name" style="width: 20px;">#</th>
															<th class="column-name">
																<?php $name_direction = ''; if($sort_field=='name'){ $name_direction = $sort_direction; } ?>
																<a href="#0" class="form-sort sort-list-form <?php echo $name_direction; ?>" data-sort-field="name" data-sort-direction="<?php echo $name_direction; ?>">Name</a></th>
																<th class="column-name">
																	<?php $type_direction = ''; if($sort_field=='type'){ $type_direction = $sort_direction; } ?>
																	<a href="#0" class="form-sort sort-list-form <?php echo $type_direction; ?>" data-sort-field="type" data-sort-direction="<?php echo $type_direction; ?>">Type</a></th>

															<th class="column-name">
																<?php $language_direction = ''; if($sort_field=='language'){ $language_direction = $sort_direction; } ?>
																<a href="#0" class="form-sort sort-list-form <?php echo $language_direction; ?>" data-sort-field="language" data-sort-direction="<?php echo $language_direction; ?>">Language</a>
															</th>

															<th class="column-name fix-100 center-align">Status</th>
															<th class="column-name no-form last"><span class="nobr">Action</span></th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php if(count($forms)>0){ foreach($forms as $form):?>
                            <tr class="even pointer">
																<td class="align-center"><input type="checkbox" name="id[]" value="<?php echo $form['id']; ?>" /></td>
                                <td class=" "><?php echo ++$i; ?></td>
                                <td class=" "><?php echo $form['name'];?></td>
																<td class=" "><?php echo $resourse_types[$form['type']];?></td>
																<td class=" "><?php echo $this->languages_pair[$form['language']];?></td>

                                <td class="center-align"><?php echo $status[$form['status']];?></td>
                                <td class=" last">
																	<a class="btn btn-dark btn-xs" href="<?php echo admin_url('forms/translates/'.$form['id']); ?>"><i class="fa fa-language"></i> Translates</a>
																	<a class="btn btn-info btn-xs" href="<?php echo admin_url('forms/edit/'.$form['id'].'/'.$form['language']); ?>"name="Edit"><i class="fa fa-edit"></i> Edit</a>
																	<a class="btn btn-danger btn-xs confirmDelete" href="<?php echo admin_url('forms/delete/'.$form['id']); ?>" name="Delete"><i   class="fa fa-trash-o"></i> Delete</a>
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
