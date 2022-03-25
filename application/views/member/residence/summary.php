
  <tr class="even pointer">
			<td class=" "><?php if($residence->mainimage!=''){?> <img src="<?php echo frontend_uploads_url('requests/images/'.$residence->mainimage); ?>" style="height:50px;" ><?php } else { echo '<img height="50px;" src="'.common_assets_url('images/no-image.png').'" />';} ?></td>
			<td class=" "><?php echo $residence->name;?></td>
			<td class=" "><?php echo $residence->address;?></td>
			<td class=" "><?php echo $residence->contact_name;?></td>
			<td class=" "><?php echo $residence->email;?></td>
      <td class=" "><?php echo $residence->phone;?></td>
			<td class=" "><?php echo $residence->beds_count;?></td>
			<td class=" "><?php echo $residence->vacancy;?></td>
      <td class=" ">
						<a class="btn btn-success btn-xs"   id="view-residence-btn"  href="#" data-rid="<?php echo $residence->id;?>"  title="View"><i class="fa fa-eye"></i> View</a>
						<a class="btn btn-info btn-xs" id="update-vacancy-btn"  href="#" data-rid="<?php echo $residence->id;?>"  title="vacancy"><i class="fa fa-bed"></i> Change Vacancy</a>
						<a class="btn btn-primary btn-xs"  id="update-residence-btn"  href="#" data-rid="<?php echo $residence->id;?>"  title="edit"><i class="fa fa-edit"></i> Edit</a>
      </td>
  </tr>
