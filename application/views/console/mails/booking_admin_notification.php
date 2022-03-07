Hi Administrator,<br/>
New Enquiry has been submitted.
<br/>
<table >          
    <tr>
        <td>
            <label>Package</label><br/>
            <?php echo $package_name; ?>
        </td>
        <td>
            <label>Business/Artisian Name</label><br/>
            <?php echo $business_name; ?>
        </td>
        <td>
            <label>First Name</label><br/>
            <?php echo $first_name; ?>
        </td>
        <td>
            <label>Last Name</label><br/>
            <?php echo $last_name; ?>
        </td>
        <td>
    </tr>
    <tr>
        <td colspan="2">
            <label>Street Address</label><br/>
            <?php echo $street_address; ?>
        </td>
        <td colspan="2">
            <label>Street Address 2</label><br/>
            <?php echo $street_address2; ?>
        </td>
    </tr>
    <tr>
        <td>
            <label>City</label><br/>
            <?php echo $city; ?>
        </td>
        <td>
            <label>State</label><br/>
            <?php echo $state; ?>
        </td>
        <td>
            <label>Postal Code</label><br/>
            <?php echo $postal_code; ?>
        </td>
        <td>
            <label>Country</label><br/>
            <?php echo $country; ?>
        </td>
    </tr>
    <tr>
        <td colspan="2">
            <label>Email</label><br/>
            <?php echo $email; ?>
        </td>
        <td colspan="2">
            <label>Phone</label><br/>
            <?php echo $phone; ?>
        </td>
    </tr>
    <tr>
        <td>
            <label>Website</label><br/>
            <?php echo $website; ?>
        </td>
        <td>
            <label>Facebook</label><br/>
            <?php echo $facebook; ?>
        </td>
        <td>
            <label>Twitter</label><br/>
            <?php echo $twitter; ?>
        </td>
        <td>
            <label>Instagram</label><br/>
            <?php echo $instagram; ?>
        </td>
    </tr>
    <tr>
        <td colspan="4">
            <label>Product Description</label><br/>
            <?php echo $product_description; ?>
        </td>
    </tr>
    <tr>
        <td colspan="4">
            <label>Booth Choices</label><br/>
            <?php echo $booth_choices; ?>
        </td>
    </tr>
    <tr>
        <td colspan="4">
            <label>Booth Description</label><br/>
            <?php echo $booth_description; ?>
        </td>
    </tr>
    <tr>
        <td colspan="4">
            <label>Booth Selections</label><br/>
            <table style="width:100%;">
                <tr><td>Name</td><td style="text-align:right;">Quantity</td><td style="text-align:right;">Price</td><td style="text-align:right;">Total</td></tr>
                <?php 
                $boothSelections = unserialize($booth_selections);
                foreach($boothSelections as $boothSelection): 
                ?>
                <tr><td><?php echo $boothSelection['name']; ?></td><td style="text-align:right;"><?php echo $boothSelection['quantity']; ?></td><td style="text-align:right;"><?php echo $boothSelection['price']; ?></td><td style="text-align:right;"><?php echo $boothSelection['total']; ?></td></tr>
                <?php endforeach; ?>
                <tr><td colspan="3" style="text-align:right;">Subtotal</td><td style="text-align:right;"><?php echo $subtotal_amount; ?></td></tr>
                <tr><td colspan="3" style="text-align:right;">GST (<?php echo $gst_percentage; ?>%)</td><td style="text-align:right;"><?php echo $gst_amount; ?></td></tr>
                <tr><td colspan="3" style="text-align:right;">Total</td><td style="text-align:right;"><?php echo $total_amount; ?></td></tr>
            </table>
        </td>
    </tr>
    <tr>
        <td>
            <label>Card Number</label><br/>
            <?php echo $full_card; ?>
        </td>
        <td>
            <label>CVV</label><br/>
            Check Backend
        </td>
        <td>
            <label>Expiry</label><br/>
            Check Backend
        </td>
        <td>
            <label>Card Type</label><br/>
            Check Backend
        </td>
    </tr>
</table>
<br/>
<br/>
Thanks<br/>
Administrator