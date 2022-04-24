<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title><?php echo $meta_title; ?> - <?php echo $site_name; ?></title>
    <meta name="description" content="<?php echo $meta_description; ?>">
    <meta name="keywords" content="<?php echo $meta_keywords; ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?php echo frontend_assets_url('css/pay-helcim.css'); ?>">
</head>
<body>
<div class="panel">
    <div class="panel-heading">
        <div class="stripe-logo">
          <img src="<?php echo frontend_assets_url('images/helcim-logo.svg'); ?>" alt="stripe logo">
        </div>
        <div class="cart-total">
          <?php echo $total; ?> CAD
        </div>
    </div>

    <div class="panel-body">
         <div class="card-errors">
            <?php if(isset($helcim_response['responseMessage'])){ echo $helcim_response['responseMessage']; } ?>
         </div>
        <!--SCRIPT--><script type="text/javascript" src="https://new-brunswick-special-care-home-association.myhelcim.com/js/version2.js"></script>
        <script type='text/javascript'src="https://www.google.com/recaptcha/api.js?render=6LdixK0UAAAAABmBXVo_jyFJSkQ5Doj9kloLyxGG"></script>
        <script>
            grecaptcha.ready(function() {
                grecaptcha.execute('6LdixK0UAAAAABmBXVo_jyFJSkQ5Doj9kloLyxGG', {action: 'helcimJSCheckout'})
                .then(function(token) {
                    document.getElementById('g-recaptcha-response').value = token;
                });
            });
        </script>
        <!--FORM--><form name="helcimForm" id="helcimForm" action="" method="POST">
        <!--RESULTS-->
        <div id="helcimResults"></div>
        <!--SETTINGS-->
        <input type="hidden" id="token" value="<?php echo $payment_token; ?>">
        <input type="hidden" id="language" value="en">
        <input type="hidden" id="g-recaptcha-response" value="">
        <?php if($payment_mode =='test'){ ?>
        <input type="hidden" id="test" value="1">
        <?php } ?>
        <!--CARD-INFORMATION-->
        <div class="form-group">
            <label>Credit Card Number:</label>
            <input type="text" id="cardNumber" value="">
        </div>
        <div class="form-group">
            <div class="form-item">
                <label>Expiry Month:</label>
                <input type="text" id="cardExpiryMonth" value="" placeholder="<?php echo date('m'); ?>">
            </div>
        </div>
        <div class="form-group">
            <div class="form-item">
                <label>Expiry Year:</label>
                <input type="text" id="cardExpiryYear" value="" placeholder="<?php echo date('y'); ?>">
            </div>
        </div>
        <div class="form-group">
            <label>CVV:</label>
            <input type="text" id="cardCVV" value="">
        </div>
        <!--AVS-->
        <div class="form-group">
            <label>Card Holder Name:</label>
            <input type="text" id="cardHolderName" value="">
        </div>
        <div class="form-group">
            <label>Card Holder Address:</label>
            <input type="text" id="cardHolderAddress" value="">
        </div>
        <div class="form-group">
            <label>Card Holder Postal Code:</label>
            <input type="text" id="cardHolderPostalCode" value="">
        </div>
        <input type="hidden" id="orderNumber" value="<?php echo $order_identifier; ?>"><br/>
        <input type="hidden" id="amount" value="<?php echo $total; ?>"><br/>
        <input type="hidden" id="amountHash" value="<?php echo $amount_hash; ?>"><br/>
        <!--BUTTON-->
        <div class="form-actions">
            <input type="button" id="buttonProcess" value="Process" onclick="javascript:helcimProcess();">
        </div>
        </form>
    </div>
    <div class="cancel-payment">
        <a href="<?php echo member_url('membership/renewcancel/'.$order_identifier); ?>">Cancel and go back to <?php echo $site_name; ?></a>
    </div>
</div>
</body>
</html>
