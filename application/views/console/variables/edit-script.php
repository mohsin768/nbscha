<script>
$(document).ready(function(){
 $('#section').change(function(){
  var sectionId = $('#section').val();
  var manual_id ='<?php echo $manual->id; ?>';
  var language ='<?php echo $language; ?>';

  if(sectionId != '')
  {
   $.ajax({
    url:"<?php echo admin_url('variables/getcontents'); ?>",
    method:"POST",
    data:{section_id:sectionId,manual_id:manual_id,language:language},
    success:function(result)
    {
        $('#content').html('<option value="">Select</option>');
        var data = result.data;
        if(result.data.length){
            for (var index = 0; index <= data.length; index++) {
                $('#content').append('<option value="' + data[index].id + '">' + data[index].title + '</option>');
            }
        }
    }
   });
  }
  else
  {
   $('#content').html('<option value="">Select</option>');
  }
 



 if(sectionId != '')
  {
   $.ajax({
    url:"<?php echo admin_url('variables/getpolicies'); ?>",
    method:"POST",
    data:{section_id:sectionId,manual_id:manual_id,language:language},
    success:function(result)
    {
        var data = result.data;
        $('#policy').html('<option value="">Select</option>');
        if(result.data.length){
            for (var index = 0; index <= data.length; index++) {
                $('#policy').append('<option value="' + data[index].policy_id + '">' + data[index].title + '</option>');
            }
        }
    }
   });
  }
  else
  {
   $('#policy').html('<option value="">Select</option>');
  }
 });
});
</script>