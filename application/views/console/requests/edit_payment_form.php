
<?php echo validation_errors();
$attributes = array('class' => 'form-vertical', 'id' => 'update-requests-payment');
echo form_open_multipart('',$attributes);
$defaultPayment = false;
?>
<input type="hidden" name="id" value="<?php echo $request->id;?>" />

<div class="form-group col-md-12">
    <label class="control-label col-md-12 no-padd" for="payment_method">Payment Method<span>*</span></label>

      <div class="col-md-12 no-padd">
          <?php echo form_error('payment_method'); ?>
          <select id="payment_method" name="payment_method" class="form-control">
              <option value=""> -- Select -- </option>
              <?php foreach($paymentMethods as $paymentMethod): if($paymentMethod['show_admin']=='1'){  if($request->payment_method==$paymentMethod['name']){$defaultPayment = true;} else { $defaultPayment = false; }?>
              <option value="<?php echo $paymentMethod['name']; ?>" <?php echo set_select('payment_method',$paymentMethod['name'],$defaultPayment); ?> data-message="<?php echo $paymentMethod['message']; ?>"><?php echo $paymentMethod['name']; ?></option>
              <?php } endforeach; ?>
          </select>
      </div>
    <div class="clearfix"></div>
</div>
<?php echo form_close(); ?>

