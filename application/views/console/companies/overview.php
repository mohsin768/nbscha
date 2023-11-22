<?php
$status = array('0' => 'Disabled','1' => 'Enabled');
if($this->uri->segment(4)==""){
	$i=0;
}else{
	$i=$this->uri->segment(4);
}
?>
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Companies</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li>
                        <span><a class="btn btn-primary btn-sm" href="<?php echo admin_url('companies/add'); ?>" ><i class="fa fa-plus-square-o" aria-hidden="true"></i> &nbsp;Add New</a></span> 
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="table-responsive">
                    <table class="table table-striped jambo_table">
                        <thead>
                            <tr class="headings">
                                <th class="column-title">#</th>
                                <th class="column-title">Name</th>
                                <th class="column-title">Email</th>
                                <th class="column-title">Contact</th>
                                <th class="column-title">Access Token</th>
                                <th class="column-title">Actions</th>
                                </th>
                            </tr>
                        </thead>
                        
                        <tbody>
                            <?php foreach($companies as $company):?>
                            <tr class="even pointer">
                                <td class=" "><?php echo ++$i; ?></td>
                                <td class=" "><?php echo $company['name'];?></td>
                                <td class=" "><?php echo $company['email'];?></td>
                                <td class=" "><?php echo $company['contact_number'];?></td>
                                <td class=" access"><?php echo $company['access_token'];?></td>
                                <td class=" last">
                                    <a href="<?php echo admin_url('companies/edit/'.$company['id']); ?>">Edit</a>
                                    <a class="confirmDelete" href="<?php echo admin_url('companies/delete/'.$company['id']); ?>">Delete</a>
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