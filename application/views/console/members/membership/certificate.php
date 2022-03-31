<div id="certificateModal" class="modal fade"  role="dialog" aria-labelledby="certificateLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="statusLabel">Certificate</h4>
      </div>
      <div class="modal-body overflow-auto" >
        <div style="width:877px;height:620px;display: block;background:<?php echo 'url('.$background.') center no-repeat'; ?>;background-size: 100%;margin:0 auto">
          <?php echo $certificate;?></div>
       </div>

      <div class="modal-footer">
        <a target="_blank" download href="<?php echo admin_url('members/generatecertificate/'.$member_id);?>" class="btn btn-success" id="" >Download</a>
      <button type="button" class="btn btn-default antoclose" data-dismiss="modal">Close</button>
     </div>
    </div>
  </div>
</div>
