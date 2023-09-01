<?php
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
                <h2>Subscribers</h2>
                
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="table-responsive">
                    <table class="table table-striped jambo_table">
                        <thead>
                            <tr class="headings">
                                <th class="column-title">#</th>
                                <th class="column-title">E-mail</th>
                                <th class="column-title">Created</th>
                                <th class="column-title no-link last">
                                    <span class="nobr">Action</span>
                                </th>
                            </tr>
                        </thead>
                     
                        <tbody>
                            <?php foreach($subscribers as $subscriber):?>
                            <tr class="even pointer">
                                <td class=" "><?php echo ++$i; ?></td>
                                <td class=""><?php echo $subscriber['email'];?></td>
                                <td class=""><?php echo date('M j, Y, g:i A', strtotime($subscriber['created']));?></td>
                                <td class="last" >
                                <div style="float:right; width:200%">
     
                                    <span><a class="btn btn-danger btn-xs"  class="confirmDelete" href="<?php echo admin_url('subscribers/delete/'.$subscriber['id']); ?>"><i class="fa fa-pencil-square" aria-hidden="true"></i> &nbsp;Delete</a></span> 
                                    
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