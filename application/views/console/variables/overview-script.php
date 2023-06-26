<script>
$(document).ready(function(){
 $('#variable_section').change(function(){
  var sectionId = $('#variable_section').val();
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
        var data = result.data;
        for (var index = 0; index <= data.length; index++) {
            $('#variable_content').append('<option value="' + data[index].id + '">' + data[index].title + '</option>');
        }
    }
   });
  }
  else
  {
   $('#variable_content').html('<option value="">Select</option>');
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
        for (var index = 0; index <= data.length; index++) {
            $('#variable_policy').append('<option value="' + data[index].policy_id + '">' + data[index].title + '</option>');
        }
    }
   });
  }
  else
  {
   $('#variable_policy').html('<option value="">Select</option>');
  }
 });
});
</script>