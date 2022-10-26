<?php
//session_start();
require_once('user_role.php');
require_once('class/main.php');
$obj = new Model;

?>
<div class="content-wrapper">
<section class="content">
<div class="container-fluid">
<div class="col-md-11">
<h5 class="card-header">Add New Store</h5>
<!-- <p style="float:right;"><a href="view.php">Back to list</a></p> -->
<div class="card-body">

  <form class="form-row" id="register_form" action="form_insert.php" method="post">
  <input type="hidden" name="id" value="">
  
  <div class="form-group col-md-6">
  <label for="name">Store Name<span class="text-danger">*</span></label>
  <input type=text value="" placeholder="Enter store name" id="name"
  class="form-control " name="name" min="0" max="" required>
  <small class="help-text text-muted">Write store name.</small>
  </div>

    <div class="form-group col-md-6">
  <label for="name">Mobile Number<span class="text-danger">*</span></label>
  <input type=text value="" placeholder="Enter mobile number" id="name"
  class="form-control " name="mobile" min="7" max="7" required>
  <small class="help-text text-muted">Write mobile number</small>
  </div>

  <input type=hidden value="store" name="level">

  <div class="col-12">
  <div class="float-right">
  <button type="submit" name="save_data" class="btn btn-sm btn-primary"><i class="fas fa-download"></i> Save</button>
  <a href="store_list.php" type="submit" name="data" class="btn btn-sm btn-secondary"></i> Cancel</a>
  </div>
  </div>
  </form>
</div>
</div>
</div>
</section>
</div>

<script type="text/javascript">
     function Checkyesno(val) {
  var element = document.getElementById('vendor_change');
  if (val == 'Select repair vendor' || val == 'others')
    element.style.display = 'block';
  else
    element.style.display = 'none';

}
</script>

<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script type="text/javascript">
  $('#vehicle').on('change',function(){
    //alert("Yes");
  $('#last_reading').val('');
  $('#last_filling').val('');
   $('#last_quantity').val('');
  $('#project').val('').change();
  $('#driver_name').val('').change();;
  $('#recommend').val('').change();;
  $('#approver').val('').change();;
  $('#fuel_vendor').val('').change();;

  var vehicleId = $("#vehicle").val();
  //$('#project').val('').change();

  if(vehicleId){

  $.ajax({
    url: 'car2.php',
    type: 'POST',
    data: {vehicleId:vehicleId},
    success: function(res) {
      res = JSON.parse(res);
      if(res.status == 'success') {
        $('#last_reading').val(res.data.current_reading);
        $('#last_filling').val(res.data.cur_date);
        $('#last_quantity').val(res.data.current_quantity);
        $('#project').val(res.data.project_id).change();
         $('#driver_name').val(res.data.driver_id).change();
        $('#recommend').val(res.data.recommender_id).change();
        $('#approver').val(res.data.approver_id).change();
        $('#fuel_vendor').val(res.data.fuel_vendor).change();
        //alert(res.data.project);
       //  $("#project").text(res.data.project);
       // var x = $('#project option[value="'+res.data.project+'"]').val();
       // alert(x);
      }

      else{
        alert(res.msg);
      }

    },
    error: function(err) {
      console.log(err)
    }
  })
}
})

  $('#vehicle').select2({
            placeholder: "Select your vehicle number",
            allowClear: true
        });
</script>

<?php require_once('footer.php'); ?>