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
                <h2>Features</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li>
                        <span><a class="btn btn-primary btn-sm" href="<?php echo admin_url('features/add'); ?>" ><i class="fa fa-plus-square-o" aria-hidden="true"></i> &nbsp;Add New</a></span>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
						<?php
							$attributes = array('class' => 'form-horizontal form-label-left', 'id' => 'action_filter');
							echo form_open(admin_url('features/actions'),$attributes); ?>

							<div class="x_content">

											<div class="action-content ">
												<div class="filter-col">
													Search :
													<input type="text"  class="form-control filter" placeholder="Search key ..." name="feature_search_key" value="<?php echo $this->session->userdata('feature_search_key_filter'); ?>" />
												</div>

												<div class="filter-col">
													Status:
													<select name="feature_status" class="form-control filter">
															<option value="">Select</option>
															<option value="1" <?php if($this->session->userdata('feature_status_filter')=='1'){ echo 'selected="selected"'; }?>>Enable</option>
															<option value="0" <?php if($this->session->userdata('feature_status_filter')=='0'){ echo 'selected="selected"'; }?>>Disabled</option>
													</select>
												</div>
												<div class="filter-col">
													Language:
													<select id="feature_language" name="feature_language" class="form-control filter">
	                            <option value=""> All </option>
	                            <?php foreach($this->languages_pair as $code => $name): ?>
	                                <option value="<?php echo $code; ?>" <?php if($this->session->userdata('feature_language_filter')==$code){ echo 'selected'; }?>><?php echo $name; ?></option>
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
					<div class="lang-col" style="float:right; width:50%">
						<ul class="nav navbar-right panel_toolbox">
							<?php foreach($languages as $languageRow): ?>
							<li>
								<span><a class="btn btn-sm <?php if($languageRow['code']==$language){ ?>btn-primary<?php } else { ?>btn-secondary<?php }?>" href="<?php echo admin_url('features/overview/'.$languageRow['code']); ?>" ><?php echo $languageRow['name']; ?></a></span> 
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
															<th class="column-title" style="width: 20px;">#</th>
															<th class="column-title">
																<?php $title_direction = ''; if($sort_field=='feature_title'){ $title_direction = $sort_direction; } ?>
																<a href="#0" class="feature-sort sort-list-link <?php echo $title_direction; ?>" data-sort-field="feature_title" data-sort-direction="<?php echo $title_direction; ?>">Name</a></th>

															<th class="column-title">
																<?php $language_direction = ''; if($sort_field=='language'){ $language_direction = $sort_direction; } ?>
																<a href="#0" class="feature-sort sort-list-link <?php echo $language_direction; ?>" data-sort-field="language" data-sort-direction="<?php echo $language_direction; ?>">Language</a>
															</th>
															<th style="width: 150px;"><?php $order_direction = ''; if($sort_field=='sort_order'){ $order_direction = $sort_direction; } ?>
															<a href="#0" style="display:inline" class="feature-sort sort-list-link <?php echo $order_direction; ?>" data-sort-field="sort_order" data-sort-direction="<?php echo $order_direction; ?>">Sort Order </a> <input style="padding:1px;" type="submit" name="sortsave" value="Save" /></th>
															<th class="column-title fix-100 center-align">Status</th>
															<th class="column-title no-link last"><span class="nobr">Action</span></th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php if(count($features)>0){ foreach($features as $feature):?>
                            <tr class="even pointer">
																<td class="align-center"><input type="checkbox" name="id[]" value="<?php echo $feature['fid']; ?>" /></td>
                                <td class=" "><?php echo ++$i; ?></td>
                                <td class=" "><?php echo $feature['feature_title'];?></td>

																<td class=" "><?php echo $this->languages_pair[$feature['language']];?></td>
																 <td class="align-center"><input style="text-align:center;" type="text" size="2" <?php if($feature['language']!=$this->default_language) echo 'disabled'; ?> name="sort_order[<?php echo $feature['fid'];?>]" value="<?php echo $feature['sort_order'];?>" /> </td>
                                <td class="center-align"><?php echo $status[$feature['status']];?></td>
                                <td class=" last">
																	<a class="btn btn-dark btn-xs" href="<?php echo admin_url('features/translates/'.$feature['fid']); ?>"><i class="fa fa-language"></i> Translates</a>
																	<a class="btn btn-info btn-xs" href="<?php echo admin_url('features/edit/'.$feature['fid'].'/'.$feature['language']); ?>"title="Edit"><i class="fa fa-edit"></i> Edit</a>
																	<a class="btn btn-danger btn-xs confirmDelete" href="<?php echo admin_url('features/delete/'.$feature['fid']); ?>" title="Delete"><i   class="fa fa-trash-o"></i> Delete</a>
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
