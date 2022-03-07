<?php
$status = array('0' => 'Not Published','1' => 'Published');
?>
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Packages</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li>
                        <span><a class="btn btn-primary btn-sm" href="<?php echo admin_url('packages/add'); ?>" ><i class="fa fa-plus-square-o" aria-hidden="true"></i> &nbsp;Add New</a></span> 
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="table-responsive">
                    <table class="table table-striped jambo_table">
                        <thead>
                            <tr class="headings">
                                <th class="column-title">Title</th>
                                <th class="column-title fix-100 center-align">Status</th>
                                <th class="column-title no-link last"><span class="nobr">Action</span>
                                </th>
                            </tr>
                        </thead>
                        
                        <tbody>
                            <?php foreach($packages as $package):?>
                            <tr class="even pointer">
                                <td class=" "><?php echo $package['title'];?></td>
                                <td class="center-align"><?php echo $status[$package['status']];?></td>
                                <td class=" last">
                                <a href="<?php echo admin_url('packages/edit/'.$package['id']); ?>">Edit</a>
                                    | <a href="<?php echo admin_url('packages/contents/'.$package['id']); ?>">Content Blocks</a>
                                    | <a href="<?php echo admin_url('packages/widgets/'.$package['id']); ?>">Widgets</a>
                                    | <a href="<?php echo admin_url('packages/seo/'.$package['id']); ?>">SEO</a>
                                    | <a class="confirmDelete" href="<?php echo admin_url('packages/delete/'.$package['id']); ?>">Delete</a>
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