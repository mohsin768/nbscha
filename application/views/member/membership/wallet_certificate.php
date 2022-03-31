<div id="walletCertificateModal" class="modal fade"  role="dialog" aria-labelledby="certificateLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="statusLabel">Wallet Certificate</h4>
      </div>
      <div class="modal-body overflow-auto" >

          <?php echo $certificate;?></div>
       

      <div class="modal-footer">
        <a target="_blank" download href="<?php echo member_url('membership/generatewalletcertificate');?>" class="btn btn-success" id="" >Download</a>
      <button type="button" class="btn btn-default antoclose" data-dismiss="modal">Close</button>
     </div>
    </div>
  </div>
</div>
