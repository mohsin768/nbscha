<?php $usedWidgets = array(); ?>
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Page Widgets - <?php echo $page->title; ?></h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li>
                        <span><a class="btn btn-secondary btn-sm" href="<?php echo admin_url('pages/overview'); ?>" ><i class="fa fa-backward" aria-hidden="true"></i> &nbsp;Back</a></span> 
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
            <div class="row">
            <div class="col-md-3 col-sm-12 col-xs-12">  
                <div class="page-boxes-wrapper">  
                    <h2>Content Area</h2>
                    <ul id="page-boxes" class="sortableboxes connectedSortable">
                        <?php if(count($pageWidgets)>0){ foreach($pageWidgets as $pageWidget): $usedWidgets[] = $pageWidget['id']; ?>
                        <li class="ui-state-default" data-widget-id="<?php echo $pageWidget['id']; ?>"><?php echo $pageWidget['name']; ?></li>
                        <?php endforeach; } ?>
                    </ul>
                </div>
            </div>
            <div class="col-md-9 col-sm-12 col-xs-12">
                <div class="available-boxes-wrapper"> 
                    <h2>Available Widgets</h2>
                    <ul id="available-boxes" class="available sortableboxes connectedSortable">
                        <?php if(count($availableWidgets)>0){ foreach($availableWidgets as $availableWidget): if(!in_array($availableWidget['id'],$usedWidgets)){ ?>
                        <li class="ui-state-default" data-widget-id="<?php echo $availableWidget['id']; ?>"><?php echo $availableWidget['name']; ?></li>
                        <?php } endforeach; } ?>
                    </ul>
                </div>  
            </div>
        </div>
        <div class="ln_solid"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12"> 
                <?php
                    $attributes = array('id' => 'update-page-widgets-form');
                    echo form_open(admin_url_string('pages/updatewidgets/'.$page->id),$attributes);
                ?>
                <input type="hidden" id="pageboxes" name="pageboxes" />
                <button class="btn btn-success" id="update-page-widgets">Update Page Widgets</button>
                <a class="btn btn-primary" href="<?php echo admin_url('pages/overview'); ?>">Cancel</a>
                <?php echo form_close(); ?>
            </div>
        </div>    
            </div>
        </div>
    </div>
</div>