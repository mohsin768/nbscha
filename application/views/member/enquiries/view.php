<table class="table table-striped jambo_table popup-view-table">
    <tr>
        <td>
            <label>Type</label><br/>
            <?php echo ucwords($enquiry->type); ?>
        </td>
        <td>
            <label>Name</label><br/>
            <?php echo $enquiry->name; ?>
        </td>
    </tr>
    <tr>
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
        <td colspan="2">
            <label>Subject</label><br/>
            <?php echo $enquiry->subject; ?>
        </td>
    </tr>
    <tr>
        <td colspan="2">
            <label>Message</label><br/>
            <?php echo $enquiry->message; ?>
        </td>
    </tr>
</table>
