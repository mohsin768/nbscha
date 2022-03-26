<?php $types = array('residence' => 'Residence','board_member' => 'Board Member','contact' => 'Contact Us');?>
<table class="table table-striped jambo_table popup-view-table">
    <tr>
        <td>
            <label>Type</label><br/>
            <?php echo $types[$enquiry->type]; ?>
        </td>

        <td>

            <?php  if($enquiry->type=='residence' && $enquiry->home_id!='0' && isset($residences[$enquiry->home_id])){ ?>
              <label>Residence</label><br/>
              <?php echo $residences[$enquiry->home_id];?>
            <?php	} elseif($enquiry->type=='board_member' && $enquiry->board_member_id!='0' && isset($teams[$enquiry->board_member_id])){ ?>
              <label>Board Member</label><br/>
            <?php echo $teams[$enquiry->board_member_id];?></a>
          <?php	}  ?>
        </td>
        <td>
            <label>Date</label><br/>
            <?php echo date('M j, Y H:i', strtotime($enquiry->created)); ?>
        </td>
    </tr>
    <tr>
      <td>
          <label>Name</label><br/>
          <?php echo $enquiry->name; ?>
      </td>
        <td>
            <label>Email</label><br/>
            <?php echo $enquiry->email; ?>
        </td>
        <td>
            <label>Phone</label><br/>
            <?php echo $enquiry->phone; ?>
        </td>
    </tr>
    <tr>
        <td colspan="3">
            <label>Subject</label><br/>
            <?php echo $enquiry->subject; ?>
        </td>
    </tr>
    <tr>
        <td colspan="3">
            <label>Message</label><br/>
            <?php echo $enquiry->message; ?>
        </td>
    </tr>
</table>
