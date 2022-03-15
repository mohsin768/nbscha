<?php
$status = array('0' => 'Disabled','1' => 'Enabled');
?>
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Languages</h2>
                <?php /*
                <ul class="nav navbar-right panel_toolbox">
                    <li>
                        <span><a class="btn btn-success btn-sm" href="<?php echo admin_url('languages/add'); ?>" ><i class="fa fa-plus-square-o" aria-hidden="true"></i> &nbsp;Add New</a></span>
                    </li>
                </ul>
                */ ?>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="table-responsive">
                    <table class="table table-striped jambo_table">
                        <thead>
                            <tr class="headings">
                                <th class="column-title">Name</th>
                                <th class="column-title">Label</th>
                                <th class="column-title">Code</th>
                                <th class="column-title  center-align">Default</th>
                                <th class="column-title fix-100 center-align">Status</th>
                                <th class="column-title no-link fix-100 last"><span class="nobr">Action</span>
                                </th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php foreach($languages as $language):?>
                            <tr class="even pointer">
                                <td class=" "><?php echo $language['name'];?></td>
                                <td class=" "><?php echo $language['label'];?></td>
                                <td class=" "><?php echo $language['code'];?></td>
                                <td class="center-align">
                                  <?php  if($language['default_language']=='1'){ ?>
                                    <strong class="green">Default Language</strong>
                                  <?php } else { ?> <a class="btn btn-info btn-xs" href="<?php echo admin_url('languages/makedefault/'.$language['id']); ?>">Make Defualt</a> <?php } ?></td>
                                <td class="center-align"><?php echo $status[$language['status']];?></td>
                                <td class=" last">
                                  <a class="btn btn-primary btn-xs" href="<?php echo admin_url('languages/edit/'.$language['id']); ?>"><i class="fa fa-edit"></i> Edit</a>
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
