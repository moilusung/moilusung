<?php
// echo print_r($_POST, true);
require 'connection.php';
$query = $_POST['queryType'];

  if ($query == 'add') {

    $tnt_fname = $_POST['tnt_fname'];
    $tnt_mname = $_POST['tnt_mname'];
    $tnt_lname = $_POST['tnt_lname'];
    $tnt_address = $_POST['tnt_address'];
    $tnt_bday = $_POST['tnt_bday'];
    $tnt_contactno = $_POST['tnt_contactno'];
    $tnt_status = 'Inactive';
    $sql = "INSERT INTO tbl_tenant(tnt_fname,tnt_mname,tnt_lname,tnt_address,tnt_bday,tnt_contactno,tnt_status) VALUES ('$tnt_fname','$tnt_mname','$tnt_lname','$tnt_address','$tnt_bday','$tnt_contactno','$tnt_status')";
    $result = mysqli_query($conn, $sql);
    if($result){
      echo "Successfully Added";
    } else{
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
    }
  mysqli_close($conn);
  }

  if ($query == 'edit') {
    $tnt_id = $_POST['tnt_id'];
    $tnt_fname = $_POST['tnt_fname'];
    $tnt_mname = $_POST['tnt_mname'];
    $tnt_lname = $_POST['tnt_lname'];
    $tnt_address = $_POST['tnt_address'];
    $tnt_bday = $_POST['tnt_bday'];
    $tnt_contactno = $_POST['tnt_contactno'];
    $sql = "UPDATE tbl_tenant SET tnt_fname = '$tnt_fname',tnt_lname = '$tnt_mname',tnt_lname = '$tnt_lname',tnt_address = '$tnt_address',tnt_bday = '$tnt_bday',tnt_contactno = '$tnt_contactno' WHERE tnt_id = '$tnt_id'";
    $result = mysqli_query($conn, $sql);
    if($result){
      echo "Successfully Updated";
    } else{
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
    }
  mysqli_close($conn);
  }

  if ($query == 'del') {
    // echo print_r($_POST, true);
    $tnt_id = $_POST['tnt_id'];
    $sql = "SELECT * FROM tbl_tenant WHERE tnt_id = $tnt_id AND tnt_status = 'Inactive'";
    $result = mysqli_query($conn, $sql);
    $row=mysqli_fetch_array($result);
    if($result){
      if ($row != null) {
        $sql = "DELETE FROM tbl_tenant WHERE tnt_id = $tnt_id AND tnt_status = 'Inactive'";
        $result = mysqli_query($conn, $sql);
        if($result){
          echo "Successfully deleted";
        } else{
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
        }
      }else{
        echo "Cannot delete this tenant beause it is Active!";
      }
    } else{
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
    }
  mysqli_close($conn);
  }
 ?>
