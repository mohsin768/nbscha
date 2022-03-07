<table class="table table-striped jambo_table popup-view-table">          
    <tr>
        <td>
            <label>Advertising Option</label><br/>
            <?php echo $aoptions[$arequest->aoption]; ?>
        </td>
        <td>
            <label>Company Name</label><br/>
            <?php echo $arequest->company_name; ?>
        </td>
    </tr>
    <tr>
        <td>
            <label>First Name</label><br/>
            <?php echo $arequest->first_name; ?>
        </td>
        <td>
            <label>Last Name</label><br/>
            <?php echo $arequest->last_name; ?>
        </td>
    </tr>
    <tr>
        <td>
            <label>Email</label><br/>
            <?php echo $arequest->email; ?>
        </td>
        <td>
            <label>Phone</label><br/>
            <?php echo $arequest->phone; ?>
        </td>
    </tr>
    <tr>
        <td colspan="2">
            <label>Website</label><br/>
            <?php echo $arequest->website; ?>
        </td>
    </tr>
</table>