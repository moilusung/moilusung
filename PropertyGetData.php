<?php

require 'connection.php';

$id = $_POST['id'];

require 'connection.php';

$sql = "SELECT prop_no,prop_desc,prop_address FROM tbl_property WHERE prop_id = $id";
$result = mysqli_query($conn, $sql);
$row=mysqli_fetch_array($result);
?>
<script src="resources/jquery/3.5.1/jquery.min.js"></script>
<form id="post_edit" class="" method="post">
<div class="row p-3">
<div class="col" style="margin-bottom:10px">
    <input type="hidden" name="queryType" value="edit">
    <input type="hidden" name="prop_id" value="<?php echo $id; ?>">
    <label for="" style="margin-top:0px;font-size:11px">  Property No :</label>
    <input class="form-control" type="text" name="prop_no" value="<?php echo  $row['prop_no']; ?>">
    <label for="" style="margin-top:5px;font-size:11px">  Property Desciption :</label>
    <textarea class="form-control" name="prop_desc"><?php echo  $row['prop_desc']; ?></textarea>
    <label for="" style="margin-top:5px;font-size:11px">  Property Address :</label>
    <input class="form-control" type="text" name="prop_address" value="<?php echo  $row['prop_address']; ?>">
</div>
<div class="modal-footer">
  <button id="edit_prop" type="button" class="btn btn-primary">Save</button>
  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
</div>
</div>
</form>
<script type="text/javascript">
$('#edit_prop').click(function() {
         $.post('PropertyQuery.php', $('#post_edit').serialize(),
             function(response) {
                 alert(response);
                 location.reload();
             });

     });
</script>
