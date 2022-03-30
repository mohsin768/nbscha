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
                <h2>Membership</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li>
                        <span><a class="btn btn-primary btn-sm" href="<?php echo admin_url('members/renew/'.$membership->member_id); ?>" ><i class="fa fa-plus-square-o" aria-hidden="true"></i> &nbsp;Renew Membership</a></span>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>



            <div class="x_content">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr class="headings">
															<th class="column-name">Membership Id</th>
															<th class="column-name">Residence</th>
															<th class="column-name">Package (Beds)</th>
															<th class="column-name">Issued Date</th>
															<th class="column-name">Expiry Date</th>
															<th class="column-name no-form "><span class="nobr">Certificate</span></th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr class="even pointer">
                                <td class=" "><?php echo '#'.$membership->identifier;?></td>
																<td class=" "><?php echo $residence->name;?></td>
																<td class=" "><?php echo $package->title;?></td>
																<td ><?php echo date('M j, Y', strtotime($membership->issue_date)); ?></td>
                                <td ><?php echo date('M j, Y', strtotime($membership->expiry_date)); ?></td>
                                <td class=" t">
																	<?php if($membership->certificate!=''){?>
																			<a class="btn btn-success btn-xs" id="certificate-preview" href="#"  title="certificate"><i class="fa fa-file-text-o"></i> Certificate</a>
																	 <?php } ?>

																	 <?php if($membership->certificate!=''){?>
 																			<a class="btn btn-info btn-xs" id="wallet-certificate-preview" href="#" data-mid="<?php echo $membership->id;?>"  title="wallet certificate"><i class="fa fa-file-text-o"></i> Wallet Certificate</a>
 																	 <?php } ?>

                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</div>
<div id="modal-wrap"></div>
