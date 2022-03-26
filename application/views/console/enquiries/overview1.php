
<?php 


$status = array('0' => 'Disabled','1' => 'Enabled');
?>
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Enquires</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="table-responsive">
                    <table class="table table-striped jambo_table">
                        <thead>
                            <tr class="headings">
                                <th class="column-title">Type</th>
                                <th class="column-title">Name</th>
                                <th class="column-title">E-mail</th>
                                <th class="column-title ">Phone</th>
                                <th class="column-title no-link last"><span class="nobr">Action</span>
                                </th>
                            </tr>
                        </thead>
                        
                        <tbody>
                            <?php foreach($enquiries as $enquire):?>
                            <tr class="even pointer">
                                <td><?php echo $enquire['type'];?></td> 
                                <td class=" "><?php echo $enquire['name'];?></td>
                                <td class=" "><?php echo $enquire['email'];?></td>
                                <td class=""><?php echo $enquire['phone'];?></td>
                                <td class="last">
                                    <a class="enquiry-view" href="javascript:void(0)" data-id="<?php echo  $enquire['id']; ?>">View</a>
                                    | <a class="confirmDelete" href="<?php echo admin_url('enquiries/delete/'.$enquire['id']); ?>">Delete</a>
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