<script>
$(document).ready(function(){



          $(".right_col").on("click", "a#variable-update-button", function(e) {
                e.preventDefault();
                var manualId = $(this).attr('data-manual');
                var variableId = $(this).attr('data-varid');

                  if (typeof CKEDITOR != "undefined") {
                    for(name in CKEDITOR.instances)
                    {
                      CKEDITOR.instances[name].destroy(true);
                    }
                  }

                $.ajax({
                    url: '<?php echo member_url("variables/edit");?>'+'/'+manualId+'/'+variableId,
                    type:'GET',
                    data:'',
                    dataType: "json",
                    success: function(response){
                        $('#modal-wrap').html(response.content);
                        $('#variableUpdateModal').modal({'backdrop':'static'});
                    }
                });
            });

            $("#modal-wrap").on("click", "#submit-variable-update-button", function(e) {
                e.preventDefault();
                var FormElement =  document.querySelector("#member-variable-update")
                var submitFormData = new FormData(FormElement);

                var editorField = submitFormData.get("member_value");
                var editorFieldType = submitFormData.get("variable_type");

                if(editorField!=null && editorFieldType=='editor'){
                  submitFormData.append('member_value', CKEDITOR.instances['member_value'].getData());
                }
                $('#confirm-box')
              .modal({ backdrop: 'static', keyboard: false })
              .one('click', '#confirm-button', function (e) {
                $("#member-variable-update").text('Submitting...');
                $("#member-variable-update").prop('disabled',true);
                  $.ajax({
                      url: '<?php echo member_url('variables/update');?>',
                      type:'POST',
                      data:submitFormData,
                      contentType: false,
                      processData: false,
                      success: function(response){
                        var response = JSON.parse(response);
                        if(response.status=="0"){
                          $(".validation-errors").html(response.content);
                          $("#member-variable-update").text('Submit');
                          $("#member-variable-update").prop('disabled',false);
                        }else{
                          location.reload(true);
                            $('#variableUpdateModal').modal('hide');

                        }
                      }
                  });
              });

            });


  } );

</script>
