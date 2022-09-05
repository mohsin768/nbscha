<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2><?php echo $manual->title; ?> - Version:<?php echo $manual->version; ?> -  Section Translates</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li>
                        <span><a class="btn btn-primary btn-sm" href="<?php echo admin_url('sections/overview/'.$manual->id); ?>" ><i class="fa fa-angle-double-left" aria-hidden="true"></i> &nbsp;Back</a></span>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>


            <div class="x_content">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr class="headings">
															<th class="column-title" style="width: 20px;">#</th>
															<th class="column-title">Title</th>
															<th class="column-title">Language</th>
															<th class="column-title no-link last"><span class="nobr">Action</span></th>
                            </tr>
                        </thead>

                        <tbody>
													<?php $i=0; foreach($this->languages_pair as $code => $name): ?>

                            <tr class="even pointer">
                                <td class=" "><?php echo ++$i; ?></td>
                                <td class=" "><strong><?php if(isset($translates[$code])) { echo $translates[$code]['title'];} else { echo '--';}?> </strong>
																<?php if($this->default_language==$code) {?> <span class="lang_label">(Original Language)</span> <?php }?></td>
                                <td class=" "><?php echo $name;?></td>
                                <td class=" last">
																	<?php if(isset($translates[$code])) { ?>
																	<a class="btn btn-info btn-xs" href="<?php echo admin_url('sections/edit/'.$manual->id.'/'.$translates[$code]['id'].'/'.$code); ?>"title="Edit"><i class="fa fa-edit"></i> Edit</a>
																<?php } else{ ?>
																	<a class="btn btn-success btn-xs" href="<?php echo admin_url('sections/edit/'.$manual->id.'/'.$section_id.'/'.$code.'/translate'); ?>"title="add"><i class="fa fa-plus"></i> Add</a>
																<?php } ?>
                                </td>
                            </tr>
													<?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
