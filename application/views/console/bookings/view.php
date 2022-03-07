<table class="table table-striped jambo_table popup-view-table">          
    <tr>
        <td>
            <label>Package</label><br/>
            <?php echo $packages[$booking->package]; ?>
        </td>
        <td>
            <label>Business/Artisian Name</label><br/>
            <?php echo $booking->business_name; ?>
        </td>
        <td>
            <label>First Name</label><br/>
            <?php echo $booking->first_name; ?>
        </td>
        <td>
            <label>Last Name</label><br/>
            <?php echo $booking->last_name; ?>
        </td>
        <td>
    </tr>
    <tr>
        <td colspan="2">
            <label>Street Address</label><br/>
            <?php echo $booking->street_address; ?>
        </td>
        <td colspan="2">
            <label>Street Address 2</label><br/>
            <?php echo $booking->street_address2; ?>
        </td>
    </tr>
    <tr>
        <td>
            <label>City</label><br/>
            <?php echo $booking->city; ?>
        </td>
        <td>
            <label>State</label><br/>
            <?php echo $booking->state; ?>
        </td>
        <td>
            <label>Postal Code</label><br/>
            <?php echo $booking->postal_code; ?>
        </td>
        <td>
            <label>Country</label><br/>
            <?php echo $booking->country; ?>
        </td>
    </tr>
    <tr>
        <td colspan="2">
            <label>Email</label><br/>
            <?php echo $booking->email; ?>
        </td>
        <td colspan="2">
            <label>Phone</label><br/>
            <?php echo $booking->phone; ?>
        </td>
    </tr>
    <tr>
        <td>
            <label>Website</label><br/>
            <?php echo $booking->website; ?>
        </td>
        <td>
            <label>Facebook</label><br/>
            <?php echo $booking->facebook; ?>
        </td>
        <td>
            <label>Twitter</label><br/>
            <?php echo $booking->twitter; ?>
        </td>
        <td>
            <label>Instagram</label><br/>
            <?php echo $booking->instagram; ?>
        </td>
    </tr>
    <tr>
        <td colspan="4">
            <label>Product Description</label><br/>
            <?php echo $booking->product_description; ?>
        </td>
    </tr>
    <tr>
        <td colspan="4">
            <label>Booth Choices</label><br/>
            <?php echo $booking->booth_choices; ?>
        </td>
    </tr>
    <tr>
        <td colspan="4">
            <label>Booth Description</label><br/>
            <?php echo $booking->booth_description; ?>
        </td>
    </tr>
    <tr>
        <td colspan="4">
            <label>Booth Selections</label><br/>
            <table style="width:100%;">
                <tr><td>Name</td><td style="text-align:right;">Quantity</td><td style="text-align:right;">Price</td><td style="text-align:right;">Total</td></tr>
                <?php 
                $boothSelections = unserialize($booking->booth_selections);
                foreach($boothSelections as $boothSelection): 
                ?>
                <tr><td><?php echo $boothSelection['name']; ?></td><td style="text-align:right;"><?php echo $boothSelection['quantity']; ?></td><td style="text-align:right;"><?php echo $boothSelection['price']; ?></td><td style="text-align:right;"><?php echo $boothSelection['total']; ?></td></tr>
                <?php endforeach; ?>
                <tr><td colspan="3" style="text-align:right;">Subtotal</td><td style="text-align:right;"><?php echo $booking->subtotal_amount; ?></td></tr>
                <tr><td colspan="3" style="text-align:right;">GST (<?php echo $booking->gst_percentage; ?>%)</td><td style="text-align:right;"><?php echo $booking->gst_amount; ?></td></tr>
                <tr><td colspan="3" style="text-align:right;">Total</td><td style="text-align:right;"><?php echo $booking->total_amount; ?></td></tr>
            </table>
        </td>
    </tr>
    <tr>
        <td>
            <label>Card Number</label><br/>
            <?php echo $booking->card_number; ?>
        </td>
        <td>
            <label>CVV</label><br/>
            <?php echo $booking->card_cvv; ?>
        </td>
        <td>
            <label>Expiry</label><br/>
            <?php echo $booking->card_expiry; ?>
        </td>
        <td>
            <label>Card Type</label><br/>
            <?php echo $booking->card_type; ?>
        </td>
    </tr>
    <tr>
        <td colspan="4">
            <label>Signature</label><br/>
            <img alt="signature" src="<?php echo $booking->signature; ?>" width="300px" />
        </td>
    </tr>
</table>