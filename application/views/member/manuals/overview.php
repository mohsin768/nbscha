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
                <div class="clearfix"></div>
            </div>
						<?php
							$attributes = array('class' => 'form-horizontal form-label-left', 'id' => 'action_filter');
							echo form_open(member_url('manuals/actions'),$attributes); ?>

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
					<div class="lang-col" style="float:right; width:50%">
						<ul class="nav navbar-right panel_toolbox">
							<?php foreach($languages as $languageRow): ?>
							<li>
								<span><a class="btn btn-sm <?php if($languageRow['code']==$language){ ?>btn-primary<?php } else { ?>btn-secondary<?php }?>" href="<?php echo member_url('manuals/overview/'.$languageRow['code']); ?>" ><?php echo $languageRow['name']; ?></a></span> 
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
								<th class="column-title fix-100 center-align">
								<?php $published_direction = ''; if($sort_field=='published'){ $published_direction = $sort_direction; } ?>
								<a href="#0" class="manual-sort sort-list-link <?php echo $published_direction; ?>" data-sort-field="published" data-sort-direction="<?php echo $published_direction; ?>">Published</a></th>
								<th class="column-title no-link last"><span class="nobr">Action</span></th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php if(count($manuals)>0){ foreach($manuals as $manual):?>
                            <tr class="even pointer">
                                <td class=" "><?php echo ++$i; ?></td>
                                <td class=" "><?php echo $manual['title'];?></td>
								<td class=" "><?php echo $manual['version'];?></td>
								<td class=" "><?php echo $this->languages_pair[$manual['language']];?></td>
                                <td class="center-align"><?php echo $status[$manual['status']];?></td>
								<td class="center-align"><?php echo $publish[$manual['published']];?></td>
                                <td class=" last">
									<a class="btn btn-success btn-xs" href="<?php echo member_url('manuals/download/'.$manual['id'].'/'.$manual['language']); ?>"title="Edit"><i class="fa fa-save"></i> Download</a>
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
