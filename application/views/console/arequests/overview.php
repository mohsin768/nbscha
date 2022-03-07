
<?php 


$status = array('0' => 'Disabled','1' => 'Enabled');
?>
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Advertising Requests</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="table-responsive">
                    <table class="table table-striped jambo_table">
                        <thead>
                            <tr class="headings">
                                <th class="column-title">Option</th>
                                <th class="column-title">Company Name</th>
                                <th class="column-title">E-mail</th>
                                <th class="column-title ">Phone</th>
                                <th class="column-title no-link last"><span class="nobr">Action</span>
                                </th>
                            </tr>
                        </thead>
                        
                        <tbody>
                            <?php foreach($arequests as $arequest):?>
                            <tr class="even pointer">
                                <td><?php echo $aoptions[$arequest['aoption']];?></td> 
                                <td class=" "><?php echo $arequest['company_name'];?></td>
                                <td class=" "><?php echo $arequest['email'];?></td>
                                <td class=""><?php echo $arequest['phone'];?></td>
                                <td class="last">
                                    <a class="arequest-view" href="javascript:void(0)" data-id="<?php echo  $arequest['id']; ?>">View</a>
                                    | <a class="confirmDelete" href="<?php echo admin_url('arequests/delete/'.$arequest['id']); ?>">Delete</a>
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