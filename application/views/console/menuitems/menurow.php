<?php
$status = array('0' => 'Disabled','1' => 'Enabled');
?>
<tr class="even pointer">
    <td class="align-center"><input type="checkbox" name="id[]" value="<?php echo $menu['id']; ?>" /></td>
    <td><?php for($k=1;$k<$intent;$k++){ echo ' &nbsp;&nbsp;&nbsp; '; }?><?php echo $menu['name'];?></td>
    <td><?php echo ucfirst($menu['link_type']);?></td>
    <td class="align-center"><input style="text-align:center;" type="text" size="2" name="sort_order[<?php echo $menu['id'];?>]" value="<?php echo $menu['sort_order'];?>" /></td>
    <td class="center-align"><?php echo $status[$menu['status']];?></td>
    <td class=" last">
        <a href="<?php echo admin_url('menuitems/edit/'.$menu['menu_id'].'/'.$menu['id'].'/'.$lang); ?>">Edit</a>
        | <a class="confirmDelete" href="<?php echo admin_url('menuitems/delete/'.$menu['menu_id'].'/'.$menu['id']); ?>">Delete</a>
    </td>
</tr>