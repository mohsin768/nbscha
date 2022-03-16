<div class="navbar nav_title" style="border: 0;">
    <a href="<?php echo member_url('home/dashboard'); ?>" class="site_title">
    <i class="fa fa-wrench"></i> <span><?php echo $this->config->item('site_name_small'); ?></span>
    </a>
</div>
<div class="clearfix"></div>
<!-- menu profile quick info -->
<div class="profile clearfix">
    <div class="profile_pic">
    <img src="<?php echo common_assets_url('images/small-logo.png'); ?>" alt="User Image" class="img-circle profile_img">
    </div>
    <div class="profile_info">
    <span>Welcome,</span>
    <h2><?php echo $this->session->member_user_name; ?></h2>
    </div>
</div>
<!-- /menu profile quick info -->

<br />

<!-- sidebar menu -->
<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
    <div class="menu_section">
    <ul class="nav side-menu">
        <?php foreach($menus as $menu): $submenu_count =count($menu['sub_menu']); ?>
            <li>
                <a <?php if(($menu['link']!='') && ($submenu_count==0)){  ?> href="<?php echo member_url($menu['link']); ?>" <?php } ?> <?php  if(($menu['link']!='')){  ?> rel="<?php echo member_url($menu['link']); ?>" <?php } ?>>
                <i class="fa <?php echo $menu['class']; ?>"></i><?php echo $menu['name']; ?>
                <?php if($submenu_count>0){?><span class="fa fa-chevron-down"></span><?php } ?>
                </a>
            <?php if($submenu_count>0){?>
            <ul class="nav child_menu">
                <?php foreach($menu['sub_menu'] as $submenu): $subsubmenu_count = count($submenu['subsub_menu']); ?>
                <li class="submenu <?php  if(($submenu['display']=='0')){  ?> hide <?php } ?>">
                    <a href="<?php echo member_url($submenu['link']); ?>" <?php  if(($submenu['link']!='')){  ?> rel="<?php echo member_url($submenu['link']); ?>" <?php } ?>><?php echo $submenu['name']; ?></a>
                </li>
                <?php endforeach; ?>
            </ul>
            <?php } ?>
            </li>
        <?php endforeach; ?>
    </ul>
    </div>

</div>
<!-- /sidebar menu -->

<!-- /menu footer buttons -->
<div class="sidebar-footer hidden-small">
    <a data-toggle="tooltip" data-placement="top" title="FullScreen" class="fullscreen-button">
    <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
    </a>
    <a data-toggle="tooltip" data-placement="top" title="Change Profile" href="<?php echo member_url('home/editprofile'); ?>">
    <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
    </a>
    <a data-toggle="tooltip" data-placement="top" title="Change Password" href="<?php echo member_url('home/changepwd'); ?>">
    <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
    </a>
    <a data-toggle="tooltip" data-placement="top" title="Logout" href="<?php echo member_url('home/logout'); ?>">
    <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
    </a>
</div>
<!-- /menu footer buttons -->