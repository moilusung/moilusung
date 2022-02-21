<?php
// echo print_r($_POST, true);
require 'connection.php';
$query = $_POST['queryType'];

  if ($query == 'add') {

    $prop_no = $_POST['prop_no'];
    $prop_desc = $_POST['prop_desc'];
    $prop_address = $_POST['prop_address'];
    $status = 'Available';
    $sql = "INSERT INTO tbl_property(prop_no,prop_desc,prop_address,status) VALUES ('$prop_no','$prop_desc','$prop_address','$status')";
    $result = mysqli_query($conn, $sql);
    if($result){
      echo "Successfully Added";
    } else{
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
    }
  mysqli_close($conn);
  }

  if ($query == 'edit') {
    $prop_id = $_POST['prop_id'];
    $prop_no = $_POST['prop_no'];
    $prop_desc = $_POST['prop_desc'];
    $prop_address = $_POST['prop_address'];
    $sql = "UPDATE tbl_property SET prop_no = '$prop_no', prop_desc = '$prop_desc', prop_address = '$prop_address' WHERE prop_id = '$prop_id'";
    $result = mysqli_query($conn, $sql);
    if($result){
      echo "Successfully Updated";
    } else{
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
    }
  mysqli_close($conn);
  }

  if ($query == 'del') {
    $prop_id = $_POST['prop_id'];
    $sql = "SELECT * FROM tbl_property WHERE prop_id = $prop_id AND Status = 'Available'";
    $result = mysqli_query($conn, $sql);
    $row=mysqli_fetch_array($result);
    if($result){
      if ($row != null) {
        $sql = "DELETE FROM tbl_property WHERE prop_id = $prop_id AND Status = 'Available'";
        $result = mysqli_query($conn, $sql);
        if($result){
          echo "Successfully deleted";
        } else{
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
        }
      }else{
        echo "Cannot delete this property beause it is occupied!";
      }
    } else{
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
    }
  mysqli_close($conn);
  }
 ?>
