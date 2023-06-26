<?php
$status = array('0' => 'Disabled','1' => 'Enabled');
$publish = array('0' => 'No','1' => 'Yes');
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
                <h2>Manuals</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li>
                        <span><a class="btn btn-primary btn-sm" href="<?php echo admin_url('manuals/add'); ?>" ><i class="fa fa-plus-square-o" aria-hidden="true"></i> &nbsp;Add New</a></span>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
						<?php
							$attributes = array('class' => 'form-horizontal form-label-left', 'id' => 'action_filter');
							echo form_open(admin_url('manuals/actions'),$attributes); ?>

							<div class="x_content">

											<div class="action-content ">
												<div class="filter-col">
													Search :
													<input type="text"  class="form-control filter" placeholder="Search key ..." name="manual_search_key" value="<?php echo $this->session->userdata('manual_search_key_filter'); ?>" />
												</div>

												<div class="filter-col">
													Status:
													<select name="manual_status" class="form-control filter">
															<option value="">Select</option>
															<option value="1" <?php if($this->session->userdata('manual_status_filter')=='1'){ echo 'selected="selected"'; }?>>Enabled</option>
															<option value="0" <?php if($this->session->userdata('manual_status_filter')=='0'){ echo 'selected="selected"'; }?>>Disabled</option>
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
								<span><a class="btn btn-sm <?php if($languageRow['code']==$language){ ?>btn-primary<?php } else { ?>btn-secondary<?php }?>" href="<?php echo admin_url('manuals/overview/'.$languageRow['code']); ?>" ><?php echo $languageRow['name']; ?></a></span> 
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
									<?php $title_direction = ''; if($sort_field=='title'){ $title_direction = $sort_direction; } ?>
									<a href="#0" class="manual-sort sort-list-link <?php echo $title_direction; ?>" data-sort-field="title" data-sort-direction="<?php echo $title_direction; ?>">Title</a></th>
								<th class="column-title">
								<?php $version_direction = ''; if($sort_field=='version'){ $version_direction = $sort_direction; } ?>
								<a href="#0" class="manual-sort sort-list-link <?php echo $version_direction; ?>" data-sort-field="version" data-sort-direction="<?php echo $version_direction; ?>">Version</a></th>

								<th class="column-title">
									<?php $language_direction = ''; if($sort_field=='language'){ $language_direction = $sort_direction; } ?>
									<a href="#0" class="manual-sort sort-list-link <?php echo $language_direction; ?>" data-sort-field="language" data-sort-direction="<?php echo $language_direction; ?>">Language</a>
								</th>
								<th class="column-title fix-100 center-align">Status</th>
								<th class="column-title fix-100 center-align">Published</th>
								<th class="column-title fix-100 center-align">
								<?php $updated_direction = ''; if($sort_field=='language'){ $updated_direction = $sort_direction; } ?>
								<a href="#0" class="manual-sort sort-list-link <?php echo $updated_direction; ?>" data-sort-field="updated" data-sort-direction="<?php echo $updated_direction; ?>">Updated</a></th>
								<th class="column-title no-link last"><span class="nobr">Action</span></th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php if(count($manuals)>0){ foreach($manuals as $manual):?>
                            <tr class="even pointer">
								<td class="align-center"><input type="checkbox" name="id[]" value="<?php echo $manual['id']; ?>" /></td>
                                <td class=" "><?php echo ++$i; ?></td>
                                <td class=" "><?php echo $manual['title'];?></td>
								<td class=" "><?php echo $manual['version'];?></td>
								<td class=" "><?php echo $this->languages_pair[$manual['language']];?></td>
                                <td class="center-align"><?php echo $status[$manual['status']];?></td>
								<td class="center-align"><?php echo $publish[$manual['published']];?></td>
								<td class="center-align"><?php echo date('d-m-Y H:i a',strtotime($manual['updated']));?></td>
                                <td class=" last">
									<?php if($manual['published']=='1'){ ?>
									<a class="btn btn-info btn-xs" href="<?php echo admin_url('manuals/clone/'.$manual['id']); ?>"title="Clone"><i class="fa fa-clone"></i> Clone</a>
									<?php } ?>
									<a class="btn btn-dark btn-xs" href="<?php echo admin_url('manuals/translates/'.$manual['id']); ?>"><i class="fa fa-language"></i> Translates</a>
									<?php if($manual['published']!='1'){ ?>
									<a class="btn btn-info btn-xs" href="<?php echo admin_url('manuals/edit/'.$manual['id'].'/'.$manual['language']); ?>"title="Edit"><i class="fa fa-edit"></i> Edit</a>
									<?php } ?>
									<a class="btn btn-danger btn-xs confirmDelete" href="<?php echo admin_url('manuals/delete/'.$manual['id']); ?>" title="Delete"><i   class="fa fa-trash-o"></i> Delete</a>
									<a class="btn btn-success btn-xs" href="<?php echo admin_url('manuals/download/'.$manual['id'].'/'.$manual['language']); ?>"title="Edit"><i class="fa fa-save"></i> Download</a>
									<?php if($manual['published']!='1'){ ?>
									<?php $publishButtonText = 'Publish'; if($manual['published']=='1'){ $publishButtonText = 'Unpublish'; }?>
									<a class="btn btn-success btn-xs confirmAction" href="<?php echo admin_url('manuals/issue/'.$manual['id'].'/'.$manual['language'].'/'.$manual['published']); ?>"title="<?php echo $publishButtonText; ?>"><i class="fa fa-square-check"></i> <?php echo $publishButtonText; ?></a>
									<a class="btn btn-secondary btn-xs" href="<?php echo admin_url('sections/overview/'.$manual['id'].'/'.$manual['language']); ?>"title="Sections"><i class="fa fa-file"></i> Sections</a>
									<a class="btn btn-secondary btn-xs" href="<?php echo admin_url('sectioncategories/overview/'.$manual['id'].'/'.$manual['language']); ?>"title="Section Categories"><i class="fa fa-file"></i> Section Categories</a>
									<a class="btn btn-secondary btn-xs" href="<?php echo admin_url('policycategories/overview/'.$manual['id'].'/'.$manual['language']); ?>"title="Policy Categories"><i class="fa fa-file"></i> Policy Categories</a>
									<a class="btn btn-secondary btn-xs" href="<?php echo admin_url('variables/overview/'.$manual['id'].'/'.$manual['language']); ?>"title="Variables"><i class="fa fa-cog"></i> Variables</a>
									<?php } ?>
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
