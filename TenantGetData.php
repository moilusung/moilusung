<?php

require 'connection.php';

$id = $_POST['id'];

require 'connection.php';

$sql = "SELECT tnt_id,tnt_fname,tnt_mname,tnt_lname,tnt_address,tnt_bday,tnt_contactno FROM tbl_tenant WHERE tnt_id = $id";
$result = mysqli_query($conn, $sql);
$row=mysqli_fetch_array($result);
?>
<script src="resources/jquery/3.5.1/jquery.min.js"></script>
<form id="post_edit" class="" method="post">
  <div class="row p-3">
  <div class="col" style="margin-bottom:10px">
    <input type="hidden" name="queryType" value="edit">
    <input type="hidden" name="tnt_id" value="<?php echo $row['tnt_id'] ?>">
    <div class="row">
      <div class="col">
        <label for="" style="margin-top:0px;font-size:11px"> First Name :</label>
        <input class="form-control" type="text" name="tnt_fname" value="<?php echo $row['tnt_fname'] ?>" required>
        <label for="" style="margin-top:5px;font-size:11px">  Middle Name :</label>
        <input class="form-control" type="text" name="tnt_mname" value="<?php echo $row['tnt_mname'] ?>" required>
      </div>
      <div class="col">
        <label for="" style="margin-top:0px;font-size:11px"> Last Name :</label>
        <input class="form-control" type="text" name="tnt_lname" value="<?php echo $row['tnt_lname'] ?>" required>
      </div>
    </div>
    <label for="" style="margin-top:5px;font-size:11px">  Address :</label>
    <input class="form-control" type="text" name="tnt_address" value="<?php echo $row['tnt_address'] ?>" required>
    <div class="row">
      <div class="col">
      <label for="" style="margin-top:0px;font-size:11px"> Contact Number :</label>
      <div class="input-group mb-3">
        <span class="input-group-text" id="basic-addon1">+63</span>
        <input type="number"   oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
          maxlength="10" class="form-control" name="tnt_contactno" required  aria-describedby="basic-addon1" value="<?php echo $row['tnt_contactno'] ?>">
      </div>
      </div>
      <div class="col">
      <label for="" style="margin-top:0px;font-size:11px"> Birthday :</label>
        <input class="form-control" type="date" name="tnt_bday" value="<?php echo $row['tnt_bday'] ?>" required>
      </div>
    </div>

  </div>
    <div class="modal-footer">
      <button id="edit_tnt" type="button" class="btn btn-primary">Save</button>
      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
    </div>
  </div>
</form>
<script type="text/javascript">
$('#edit_tnt').click(function() {
         $.post('TenantQuery.php', $('#post_edit').serialize(),
             function(response) {
                 alert(response);
                 location.reload();
             });

     });
</script>
