<div id="updateRequestsModal" class="modal fade"  role="dialog" aria-labelledby="transferLabel" aria-hidden="true" style="overflow:auto">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="statusLabel">Update Membership Request</h4>
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
      </div>
      <div class="modal-body" id="edit-form-wrap">
        <?php echo $form; ?>
       </div>

      <div class="modal-footer">
      <button type="button" class="btn btn-success" id="submit-update-requests-btn" >Submit</button>
      <button type="button" class="btn btn-default autoclose" data-dismiss="modal">Cancel</button>
     </div>
    </div>
  </div>
</div>
