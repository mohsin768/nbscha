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
                <h2>Resource Links</h2>

                <div class="clearfix"></div>
            </div>
						<?php
							$attributes = array('class' => 'form-horizontal form-label-left', 'id' => 'action_filter');
							echo form_open(member_url_string('resources/linksactions'),$attributes); ?>

							<div class="x_content">

											<div class="action-content ">
												<div class="filter-col">
													Search :
													<input type="text"  class="form-control filter" placeholder="Search key ..." name="link_search_key" value="<?php echo $this->session->userdata('link_search_key_filter'); ?>" />
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
															<th class="column-name"></th>
															<th class="column-name">
																<?php $name_direction = ''; if($sort_field=='name'){ $name_direction = $sort_direction; } ?>
																<a href="#0" class="link-sort sort-list-link <?php echo $name_direction; ?>" data-sort-field="name" data-sort-direction="<?php echo $name_direction; ?>">Name</a></th>


															<th class="column-name">Description</th>
															<th class="column-name no-link last"><span class="nobr">Action</span></th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php if(count($links)>0){ foreach($links as $link):?>
                            <tr class="even pointer">
                                <td class=" "><?php echo ++$i; ?></td>
																<td class=" "><?php if($link['image']!='') echo '<img height="50px;" src="'.base_url('public/uploads/links/'.$link['image']).'" />'; else echo '<img height="50px;" src="'.common_assets_url('images/no-image.png').'" />'; ?></td>
                                <td class=" "><?php echo $link['name'];?></td>
																<td class=" "><?php echo $link['summary'];?></td>
                                <td class=" last">
																	<a class="btn btn-info btn-xs" target="_blank" href="<?php echo $link['link_url'];?>" ><i class="fa fa-link"></i> View</a>
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
