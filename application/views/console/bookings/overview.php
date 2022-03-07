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
                <h2>Bookings</h2>
                
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="table-responsive">
                    <table class="table table-striped jambo_table">
                        <thead>
                            <tr class="headings">
                                <th class="column-title">#</th>
                                <th class="column-title">Package</th>
                                <th class="column-title">Business/Artisan Name</th>
                                <th class="column-title">E-mail</th>
                                <th class="column-title ">Mobile</th>
                                <th class="column-title no-link last">
                                    <span class="nobr">Action</span>
                                </th>
                            </tr>
                        </thead>
                     
                        <tbody>
                            <?php foreach($bookings as $booking):?>
                            <tr class="even pointer">
                                <td class=" "><?php echo ++$i; ?></td>
                                <td class=" "><?php echo $packages[$booking['package']];?></td>
                                <td class=" "><?php echo $booking['business_name'];?></td>
                                <td class=""><?php echo $booking['email'];?></td>
                                <td class=""><?php echo $booking['phone'];?></td>
                                <td class="last" >
                                    <a class="booking-view" href="javascript:void(0)" data-id="<?php echo $booking['id']; ?>">View</a>
                                    | <a class="confirmDelete" href="<?php echo admin_url('bookings/delete/'.$booking['id']); ?>">Delete</a>
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