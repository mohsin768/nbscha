<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">

    </div>
</div>
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Localization</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li>
                        <span><a class="btn btn-primary btn-sm" href="<?php echo admin_url('home/addlocalization'); ?>" ><i class="fa fa-plus-square-o" aria-hidden="true"></i> &nbsp;Add New</a></span> 
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <?php
                $attributes = array('class' => 'form-horizontal form-label-left', 'id' => 'filter');
                echo form_open(admin_url('home/localizationactions/'.$language),$attributes); 
            ?>
			<div class="x_content">
                <div class="action-content ">
                    <div class="lang-col">
                        <ul class="nav navbar-right">
                            <?php foreach($languages as $languageRow): ?>
                            <li>
                                <span><a class="btn btn-sm <?php if($languageRow['code']==$language){ ?>btn-primary<?php } else { ?>btn-secondary<?php }?>" href="<?php echo admin_url('home/localization/'.$languageRow['code']); ?>" ><?php echo $languageRow['name']; ?></a></span> 
                            </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                    <div class="filter-col">
                        Search :
                        <input type="text"  class="form-control filter" placeholder="Search key ..." name="keyword" value="<?php echo $this->session->userdata('localization_key'); ?>" />
                    </div>
                    <div class="filter-col">
                        <button class="btn btn-success btn-xs" type="submit" value="Search" name="search" ><i class="fa fa-filter" aria-hidden="true"></i> Filter</button>
                        <button class="btn btn-dark btn-xs" type="submit" value="Reset" name="reset" ><i class="fa fa-refresh" aria-hidden="true"></i> Reset</button>
                    </div>
                </div>
            </div>
            <div class="x_content">
                <div class="table-responsive">
                    <table class="table table-striped jambo_table">
                        <thead>
                            <tr class="headings">
                                <th class="column-title">Key</th>
                                <th class="column-title">Default Translation</th>
                                <th class="column-title">Translation(<?php echo $this->languages_pair[$language];?>)</th>
                                </th>
                            </tr>
                        </thead>
                        
                        <tbody>
                            <?php foreach($localizations as $localization):?>
                            <tr class="even pointer">
                                <td class=" "><?php echo $localization['lang_key'];?></td>
                                <td class=" "><?php echo $defaults[$localization['lang_key']];?></td>
                                <td><textarea style="width:98%;" name="lang_value[<?php echo $localization['id']; ?>]"><?php echo $localization['lang_value']; ?></textarea></td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="x_content">
                <div class="">
                    <div class="submit-col">
                        <button class="btn btn-success" type="submit" value="Save" name="save" ><i class="fa fa-save" aria-hidden="true"></i> Save</button>
                    </div>
                </div>
            </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>
<div class="pagination_wrap">
    <ul class="pagination"><?php echo $this->pagination->create_links(); ?></ul>
</div>