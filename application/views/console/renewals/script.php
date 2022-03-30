<script>
$(document).ready(function() {
      $("#renewal_date").daterangepicker({
      timePicker: false,
        singleDatePicker: true,showDropdowns: true,
          autoUpdateInput: false,
        locale: {format: "DD-MM-YYYY",cancelLabel: 'Clear'},
        calender_style: "picker_4"
      }, function(start_date, end_date) {
					this.element.val(start_date.format("DD-MM-YYYY"));
      });

    });
</script>
