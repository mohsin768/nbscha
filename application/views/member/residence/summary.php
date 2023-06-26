
  <tr class="even pointer">
			<td class="align-top"><?php if($residence->mainimage!=''){?> <img src="<?php echo frontend_uploads_url('requests/images/'.$residence->mainimage); ?>" style="height:50px;" ><?php } else { echo '<img height="50px;" src="'.common_assets_url('images/no-image.png').'" />';} ?></td>
			<td class="align-top"><i class="fa fa-home"></i>   <?php echo $residence->name;?> <br/> <i class="fa fa-map-marker"></i> <?php echo $residence->address;?></td>
			<td class="align-top"><i class="fa fa-user"></i>  <?php echo $residence->contact_name;?><br/>
			             <i class="fa fa-envelope"></i>  <?php echo $residence->email;?><br/>
                   <i class="fa fa-phone"></i>  <?php echo $residence->phone;?></td>
			<td class="align-top"><?php echo $residence->beds_count;?></td>
			<td class="align-top"><?php echo $residence->vacancy;?></td>
      <td class="align-top">
						<a class="btn btn-success btn-xs"   id="view-residence-btn"  href="#" data-rid="<?php echo $residence->id;?>"  title="View"><i class="fa fa-eye"></i> View</a>
						<a class="btn btn-info btn-xs" id="update-vacancy-btn"  href="#" data-rid="<?php echo $residence->id;?>"  title="vacancy"><i class="fa fa-bed"></i> Change Vacancy</a>
						<a class="btn btn-primary btn-xs"  id="update-residence-btn"  href="#" data-rid="<?php echo $residence->id;?>"  title="edit"><i class="fa fa-edit"></i> Edit</a>
						<a class="btn btn-primary btn-xs"   href="<?php echo member_url('residences/translates/'.$residence->id); ?>" title="translates"><i class="fa fa-language"></i> Translates</a>
      </td>
  </tr>
