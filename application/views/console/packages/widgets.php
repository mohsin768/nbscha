<?php $usedWidgets = array(); ?>
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Package Widgets - <?php echo $package->title; ?></h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li>
                        <span><a class="btn btn-secondary btn-sm" href="<?php echo admin_url('packages/overview'); ?>" ><i class="fa fa-backward" aria-hidden="true"></i> &nbsp;Back</a></span> 
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
            <div class="row">
            <div class="col-md-3 col-sm-12 col-xs-12">  
                <div class="package-boxes-wrapper">  
                    <h2>Content Area</h2>
                    <ul id="package-boxes" class="sortableboxes connectedSortable">
                        <?php if(count($packageWidgets)>0){ foreach($packageWidgets as $packageWidget): $usedWidgets[] = $packageWidget['id']; ?>
                        <li class="ui-state-default" data-widget-id="<?php echo $packageWidget['id']; ?>"><?php echo $packageWidget['name']; ?></li>
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
                    $attributes = array('id' => 'update-package-widgets-form');
                    echo form_open(admin_url_string('packages/updatewidgets/'.$package->id),$attributes);
                ?>
                <input type="hidden" id="packageboxes" name="packageboxes" />
                <button class="btn btn-success" id="update-package-widgets">Update Package Widgets</button>
                <a class="btn btn-primary" href="<?php echo admin_url('packages/overview'); ?>">Cancel</a>
                <?php echo form_close(); ?>
            </div>
        </div>    
            </div>
        </div>
    </div>
</div>