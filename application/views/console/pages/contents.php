<?php
$status = array('0' => 'Not Published','1' => 'Published');
?>
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Contents</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li style="padding:0px 5px;">
                        <div class="btn-group">
                            <button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            Add New
                            </button>
                            <div class="dropdown-menu">
                                <?php foreach($contentTypes as $contentTypeKey => $contentTypeName): ?>
                                <a class="dropdown-item" href="<?php echo admin_url('pages/contentadd/'.$contentTypeKey.'/'.$page->id); ?>"><?php echo $contentTypeName; ?></a>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </li>
                    <li>
                        <span><a class="btn btn-secondary btn-sm" href="<?php echo admin_url('pages/overview'); ?>" ><i class="fa fa-backward" aria-hidden="true"></i> &nbsp;Back</a></span> 
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <?php
                $attributes = array('class' => 'form-horizontal form-label-left', 'id' => 'filter');
                echo form_open(admin_url('pages/contentactions/'.$page->id),$attributes); 
            ?>
            <div class="x_content">
                <div class="table-responsive">
                    <table class="table table-striped jambo_table">
                        <thead>
                            <tr class="headings">
                                <th class="column-title">Type</th>
                                <th class="column-title">Title</th>
                                <th style="width: 150px;">Sort Order <input style="padding:1px;" type="submit" name="sortsave" value="Save" /></th>
                                <th class="column-title no-link last"><span class="nobr">Action</span>
                                </th>
                            </tr>
                        </thead>
                        
                        <tbody>
                            <?php foreach($contents as $content):?>
                            <tr class="even pointer">
                                <td class=" "><?php echo $contentTypes[$content['content_type']];?></td>
                                <td class=" "><?php echo $content['title'];?></td>
                                <td class="align-center"><input style="text-align:center;" type="text" size="2" name="sort_order[<?php echo $content['id'];?>]" value="<?php echo $content['sort_order'];?>" /></td>
                                <td class=" last">
                                <a href="<?php echo admin_url('pages/contentedit/'.$content['content_type'].'/'.$content['page_id'].'/'.$content['id']); ?>">Edit</a>
                                    | <a class="confirmDelete" href="<?php echo admin_url('pages/contentdelete/'.$content['page_id'].'/'.$content['id']); ?>">Delete</a>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>