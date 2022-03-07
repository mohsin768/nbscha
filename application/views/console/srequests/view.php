<table class="table table-striped jambo_table popup-view-table">          
    <tr>
        <td>
            <label>Types</label><br/>
            <?php echo printSTypes($srequest->stypes,$stypes); ?>
        </td>
        <td>
            <label>Company Name</label><br/>
            <?php echo $srequest->company_name; ?>
        </td>
    </tr>
    <tr>
        <td>
            <label>First Name</label><br/>
            <?php echo $srequest->first_name; ?>
        </td>
        <td>
            <label>Last Name</label><br/>
            <?php echo $srequest->last_name; ?>
        </td>
    </tr>
    <tr>
        <td>
            <label>Email</label><br/>
            <?php echo $srequest->email; ?>
        </td>
        <td>
            <label>Phone</label><br/>
            <?php echo $srequest->phone; ?>
        </td>
    </tr>
    <tr>
        <td colspan="2">
            <label>Value($)</label><br/>
            <?php echo $srequest->amount; ?>
        </td>
    </tr>
    <tr>
        <td colspan="2">
            <label>Prize Details</label><br/>
            <?php echo $srequest->prize_details; ?>
        </td>
    </tr>
</table>