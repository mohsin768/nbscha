<?php
$status = array('0' => 'Not Published','1' => 'Published');
?>
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Pages</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li>
                        <span><a class="btn btn-primary btn-sm" href="<?php echo admin_url('pages/add'); ?>" ><i class="fa fa-plus-square-o" aria-hidden="true"></i> &nbsp;Add New</a></span> 
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="lang-col" style="float:right; width:50%">
                    <ul class="nav navbar-right panel_toolbox">
                        <?php foreach($languages as $languageRow): ?>
                        <li>
                            <span><a class="btn btn-sm <?php if($languageRow['code']==$language){ ?>btn-primary<?php } else { ?>btn-secondary<?php }?>" href="<?php echo admin_url('pages/overview/'.$languageRow['code']); ?>" ><?php echo $languageRow['name']; ?></a></span> 
                        </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="table-responsive">
                    <table class="table table-striped jambo_table">
                        <thead>
                            <tr class="headings">
                                <th class="column-title">Title</th>
                                <th class="column-title">Language</th>
                                <th class="column-title fix-100 center-align">Status</th>
                                <th class="column-title no-link last"><span class="nobr">Action</span>
                                </th>
                            </tr>
                        </thead>
                        
                        <tbody>
                            <?php foreach($pages as $page):?>
                            <tr class="even pointer">
                                <td class=" "><?php echo $page['title'];?></td>
                                <td class=" "><?php echo $this->languages_pair[$page['language']];?></td>
                                <td class="center-align"><?php echo $status[$page['status']];?></td>
                                <td class=" last">
                                    <a class="btn btn-dark btn-xs" href="<?php echo admin_url('pages/translates/'.$page['id']); ?>"><i class="fa fa-language"></i> Translates</a>    
                                    | <a href="<?php echo admin_url('pages/edit/'.$page['id'].'/'.$page['language']); ?>">Edit</a>
                                    | <a href="<?php echo admin_url('pages/contents/'.$page['id']); ?>">Content Blocks</a>
                                    | <a href="<?php echo admin_url('pages/widgets/'.$page['id']); ?>">Widgets</a>
                                    | <a href="<?php echo admin_url('pages/seo/'.$page['id'].'/'.$page['language']); ?>">SEO</a>
                                    | <a class="confirmDelete" href="<?php echo admin_url('pages/delete/'.$page['id']); ?>">Delete</a>
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
<div class="pagination_wrap">
    <ul class="pagination"><?php echo $this->pagination->create_links(); ?></ul>
</div>