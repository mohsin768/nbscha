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
                <h2>News</h2>

                <div class="clearfix"></div>
            </div>
						<?php
							$attributes = array('class' => 'form-horizontal form-label-left', 'id' => 'action_filter');
							echo form_open(member_url_string('resources/newsactions'),$attributes); ?>

							<div class="x_content">

											<div class="action-content ">
												<div class="filter-col">
													Search :
													<input type="text"  class="form-control filter" placeholder="Search key ..." name="news_search_key" value="<?php echo $this->session->userdata('news_search_key_filter'); ?>" />
												</div>


												<div class="filter-col">
													Category:
													<select id="news_type" name="news_category" class="form-control filter">
	                            <option value=""> All </option>
	                            <?php foreach($categories as $key => $value): ?>
	                                <option value="<?php echo $key; ?>" <?php if($this->session->userdata('news_category_filter')==$key){ echo 'selected'; }?>><?php echo $value; ?></option>
	                            <?php endforeach; ?>
	                        </select>

												</div>

												<div class="filter-col">
													Language:
													<select id="news_language" name="news_language" class="form-control filter">
	                            <option value=""> All </option>
	                            <?php foreach($this->languages_pair as $code => $name): ?>
	                                <option value="<?php echo $code; ?>" <?php if($this->session->userdata('news_language_filter')==$code){ echo 'selected'; }?>><?php echo $name; ?></option>
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
                <div class="table-responsive">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr class="headings">
															<th class="column-name" style="width: 20px;">#</th>
															<th class="column-name"></th>
															<th class="column-name">
																<?php $name_direction = ''; if($sort_field=='title'){ $name_direction = $sort_direction; } ?>
																<a href="#0" class="link-sort sort-list-link <?php echo $name_direction; ?>" data-sort-field="title" data-sort-direction="<?php echo $name_direction; ?>">Title</a></th>
																<th class="column-name"></th>
																<th class="column-name">
																	<?php $category_direction = ''; if($sort_field=='category'){ $category_direction = $sort_direction; } ?>
																	<a href="#0" class="link-sort sort-list-link <?php echo $category_direction; ?>" data-sort-field="category" data-sort-direction="<?php echo $category_direction; ?>">Category</a></th>

															<th class="column-name">
																<?php $language_direction = ''; if($sort_field=='language'){ $language_direction = $sort_direction; } ?>
																<a href="#0" class="link-sort sort-list-link <?php echo $language_direction; ?>" data-sort-field="language" data-sort-direction="<?php echo $language_direction; ?>">Language</a>
															</th>

															<th class="column-name no-news last"><span class="nobr">Action</span></th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php if(count($news)>0){ foreach($news as $neW):?>
                            <tr class="even pointer">
                                <td class=" "><?php echo ++$i; ?></td>
																	<td class=" "><?php if($neW['image']!='') echo '<img height="50px;" src="'.base_url('public/uploads/news/images/'.$neW['image']).'" />'; else echo '<img height="50px;" src="'.common_assets_url('images/no-image.png').'" />'; ?></td>
                                <td class=" "><?php echo $neW['title'];?><br>
                            		<em><i class="fa fa-calendar"></i> <?php echo date('M j, Y', strtotime($neW['publish_date'])); ?></em>   &nbsp;&nbsp;
																<?php if($neW['author']!=''){?> <em><i class="fa fa-user"></i> <?php echo $neW['author']; ?></em><?php } ?></td>
																<td class=" "><?php echo $neW['summary'];?></td>
																<td class=" "><?php echo $categories[$neW['category']];?></td>
																<td class=" "><?php echo $this->languages_pair[$neW['language']];?></td>
																  <td class=" last">
																	<a class="btn btn-info btn-xs news-view" href="#" data-id="<?php echo $neW['id'];?>" data-lan="<?php echo $neW['language'];?>" name="view"><i class="fa fa-folder-open"></i> Details</a>
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
