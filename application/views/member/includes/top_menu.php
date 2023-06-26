<div class="nav_menu">
    <div class="nav toggle">
    <a id="menu_toggle"><i class="fa fa-bars"></i></a>
    </div>
    <nav class="nav navbar-nav">
    <ul class=" navbar-right">
    <li class="nav-item dropdown open" style="padding-left: 15px;">
        <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
        <img src="<?php echo common_assets_url('images/small-logo.png'); ?>" alt="<?php echo $this->session->member_user_name; ?>"> <?php echo $this->session->member_user_name; ?>
        </a>
        <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
            <a class="dropdown-item"  href="<?php echo member_url('home/editprofile'); ?>"> Change Profile</a>
            <a class="dropdown-item"  href="<?php echo member_url('home/changepwd'); ?>"> Change Password</a>
            <a class="dropdown-item"  href="<?php echo member_url('home/logout'); ?>"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
        </div>
    </li>
    <li class="nav-item" style="padding: 5px 10px;">
        <select id="language-switch" name="language">
            <?php foreach($this->languages_pair as $languageCode => $langaugeName): $default=false; if($languageCode == $this->member_language){ $default=true; }?>
                <option <?php echo set_select('lanaguage',$languageCode,$default); ?> value="<?php echo $languageCode; ?>"><?php echo $langaugeName; ?></option>
            <?php endforeach; ?>
        </select>
    </li>
    <li class="nav-item" style="padding: 5px 10px;">
        <?php echo translate('INTERFACE_LANGUAGE','Interface Language','member');?>
    </li>      
    </ul>
</nav>
</div>