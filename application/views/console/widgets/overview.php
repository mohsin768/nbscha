<?php
$status = array('0' => 'Not Published','1' => 'Published');
?>
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Widgets</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li>
                        <div class="btn-group">
                            <button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            Add New
                            </button>
                            <div class="dropdown-menu">
                                <?php foreach($widgetTypes as $widgetType): if($widgetType['dynamic']=='1'){ ?>
                                <a class="dropdown-item" href="<?php echo admin_url('widgets/add/'.$widgetType['key']); ?>"><?php echo $widgetType['name']; ?></a>
                                <?php } endforeach; ?>
                            </div>
                        </div>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="table-responsive">
                    <table class="table table-striped jambo_table">
                        <thead>
                            <tr class="headings">
                                <th class="column-title">Name</th>
                                <th class="column-title">Widget Type</th>
                                <th class="column-title">Language</th>
                                <th class="column-title no-link last"><span class="nobr">Action</span>
                                </th>
                            </tr>
                        </thead>
                        
                        <tbody>
                            <?php foreach($widgets as $widget): $widgetType = $widgetTypes[$widget['widget_type']]; ?>
                            <tr class="even pointer">
                                <td ><?php echo $widget['name'];?></td>
                                <td ><?php echo $widgetType['name'];?></td>
                                <td ><?php echo $this->languages_pair[$widget['language']];?></td>
                                <td class=" last">
                                    <?php if($widgetType['type']!='system'){ ?>
                                    <a href="<?php echo admin_url('widgets/edit/'.$widget['widget_type'].'/'.$widget['id'].'/'.$widget['language']); ?>">Edit</a>
                                    <?php } ?>
                                    <?php if($widgetType['type']=='dynamic'){ ?>
                                    | <a class="confirmDelete" href="<?php echo admin_url('widgets/delete/'.$widget['id']); ?>">Delete</a>
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
<div class="pagination_wrap">
    <ul class="pagination"><?php echo $this->pagination->create_links(); ?></ul>
</div>