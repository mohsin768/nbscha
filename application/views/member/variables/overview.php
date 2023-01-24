<?php
if($this->uri->segment(6)==""){
	$i=0;
}else{
	$i=$this->uri->segment(6);
}
?>
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2><?php echo $manual->title; ?> - Version:<?php echo $manual->version; ?> - Variables</h2>
                <ul class="nav navbar-right panel_toolbox">

										<li>
                        <span><a class="btn btn-primary btn-sm" href="<?php echo member_url('manuals/overview'); ?>" ><i class="fa fa-back" aria-hidden="true"></i> &nbsp;Back</a></span>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
						<?php
							$attributes = array('class' => 'form-horizontal form-label-left', 'id' => 'action_filter');
							echo form_open(member_url('variables/actions/'.$manual->id.'/'.$language),$attributes); ?>

							<div class="x_content">

											<div class="action-content ">
												<div class="filter-col">
													Search :
													<input type="text"  class="form-control filter" placeholder="Search key ..." name="variable_search_key" value="<?php echo $this->session->userdata('variable_search_key_filter'); ?>" />
												</div>
												<div class="filter-col">
													Section:
													<select id="variable_section" name="variable_section" class="form-control filter">
															<option value="">Select</option>
															<?php foreach($sectionFilter as $sectionFilter): 
																$default=false;
																if($this->session->userdata('variable_section_filter')==$sectionFilter['id']){ $default=true;}
																?>
															<option value="<?php echo $sectionFilter['id']; ?>" <?php echo set_select('variable_section',$sectionFilter['id'],$default);?>> <?php echo $sectionFilter['title'];?></option>		
															<?php endforeach;?>
													</select>
												</div>
												<div class="filter-col">
													Content:
													<select id="variable_content" name="variable_content" class="form-control filter">
															<option value="">Select</option>
															<?php foreach($contentFilter as $contentFilter): 
																$default=false;
																if($this->session->userdata('variable_content_filter')==$contentFilter['id']){ $default=true;}
																?>
															<option value="<?php echo $contentFilter['id']; ?>" <?php echo set_select('variable_content',$contentFilter['id'],$default);?>> <?php echo $contentFilter['title'];?></option>		
															<?php endforeach;?>
													</select>
												</div>
												<div class="filter-col">
													Policy:
													<select id="variable_policy" name="variable_policy" class="form-control filter">
															<option value="">Select</option>
															<?php foreach($policyFilter as $policyFilter): 
																$default=false;
																if($this->session->userdata('variable_policy_filter')==$policyFilter['id']){ $default=true;}
																?>
															<option value="<?php echo $policyFilter['id']; ?>" <?php echo set_select('variable_policy',$policyFilter['id'],$default);?>> <?php echo $policyFilter['title'];?></option>		
															<?php endforeach;?>
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
								<span><a class="btn btn-sm <?php if($languageRow['code']==$language){ ?>btn-primary<?php } else { ?>btn-secondary<?php }?>" href="<?php echo member_url('variables/overview/'.$manual->id.'/'.$languageRow['code']); ?>" ><?php echo $languageRow['name']; ?></a></span>
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
															<a href="#0" class="variable-sort sort-list-link <?php echo $title_direction; ?>" data-sort-field="title" data-sort-direction="<?php echo $title_direction; ?>">Title</a></th></th>
																<th class="column-title">Original Value</th>
																<th class="column-title">Member Value</th>
																<th class="column-title">Section</th>
															<th class="column-title">
																<?php $language_direction = ''; if($sort_field=='language'){ $language_direction = $sort_direction; } ?>
																<a href="#0" class="variable-sort sort-list-link <?php echo $language_direction; ?>" data-sort-field="language" data-sort-direction="<?php echo $language_direction; ?>">Language</a>
															</th>

															<th class="column-title no-link last"><span class="nobr">Action</span></th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php if(count($variables)>0){ foreach($variables as $variable):?>
                            <tr class="even pointer">

                                <td class=" "><?php echo ++$i; ?></td>
                                <td class=" "><?php echo $variable['title'];?></td>

																<td class=" "><?php echo $variable['variable_value'];?></td>
																<td class=" "><?php echo $variable['member_value'];?></td>
																<td class=" "><?php echo $variable['section_title'];?></td>
																<td class=" "><?php echo $this->languages_pair[$variable['language']];?></td>

                                <td class=" last">
																	<a class="btn btn-dark btn-xs" id="variable-update-button" href="#" data-manual="<?php echo $manual->id;?>" data-varid="<?php echo $variable['desc_id']; ?>"><i class="fa fa-edit"></i> Update</a>
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
<div id="modal-wrap"></div>
