<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="Resources/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="Resources/jquery/3.5.1/jquery.min.js"></script>
    <title>Dashboard</title>
  </head>
  <style media="screen">
  input::-webkit-outer-spin-button,
  input::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
  }
  </style>

  <?php include'Template/header.php'; ?>
  <ul class="nav nav-pills flex-column mb-auto">
    <li>
      <a href="index.php" class="nav-link link-dark ">
        <svg class="bi me-2" width="16" height="16"><use xlink:href="#speedometer"></use></svg>
        Dashboard
      </a>
    </li>
    <li>
      <a href="Property.php" class="nav-link link-dark ">
        <svg class="bi me-2" width="16" height="16"><use xlink:href="#grid"></use></svg>
        Property
      </a>
    </li>
    <li>
      <a href="Tenant.php" class="nav-link link-dark active">
        <svg class="bi me-2" width="16" height="16"><use xlink:href="#geo-fill"></use></svg>
        Tenants
      </a>
    </li>
    <li>
      <a href="#" class="nav-link link-dark">
        <svg class="bi me-2" width="16" height="16"><use xlink:href="#home"></use></svg>
        Rental
      </a>
    </li>
    <li>
      <a href="#" class="nav-link link-dark">
        <svg class="bi me-2" width="16" height="16"><use xlink:href="#table"></use></svg>
        Payments
      </a>
    </li>
    <li>
      <a href="#" class="nav-link link-dark">
        <svg class="bi me-2" width="16" height="16"><use xlink:href="#collection"></use></svg>
        Report
      </a>
    </li>
    <li>
      <a href="#" class="nav-link link-dark">
        <svg class="bi me-2" width="16" height="16"><use xlink:href="#people-circle"></use></svg>
        Users
      </a>
    </li>
  </ul>
  <?php include'Template/header2.php'; ?>
  <!-- php code -->
      <?php
      require 'connection.php';
      $sql = "SELECT * FROM tbl_tenant";
      $result = mysqli_query($conn, $sql);
      ?>
  <body>
    <form id="post"  method="post">
    <div class="row" style="margin-top:5px">
      <div class="col">
        <!-- Button trigger modal -->
        <div class="row" style="margin-bottom:10px">
        <div class="col-md-10">
        <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#addModal">
            <svg class="bi" width="20" height="20" style="vertical-align:top"><use xlink:href="#plus-square"></use></svg>
            ADD
        </button>
        </div>
        </div>
        <!-- Button trigger modal end-->
        <table id="tenant_tables" class="table table-bordered table-sm table-hover" border='1px'style="width:100%;font-size:14px;vertical-align:middle">
            <thead>
            <tr class="text-center">
              <th width="10%" style="display:none">Tenant id</th>
                <th width="25%">Name</th>
                <th width="30%">Address</th>
                <th width="10%"> Birthday</th>
                <th width="10%">Contact No.</th>
                <th width="10%">Action</th>
            </tr>
            </thead>
            <div id="table">
            <tbody>
            <?php
              while ($row=mysqli_fetch_array($result)) {
                echo '
                <tr class="text-center">
                  <td style="display:none">'.$row["tnt_id"].'</td>
                  <td>'.$row["tnt_fname"].' '.$row["tnt_mname"].' '.$row["tnt_lname"].'</td>
                  <td >'.$row["tnt_address"].'</td>
                  <td>'.$row["tnt_bday"].'</td>
                  <td>'.$row["tnt_contactno"].'</td>
                  <td ><a href="" class="btn btn-warning btn-sm" role="button" data-bs-toggle="modal" data-bs-target="#EditModal" onclick="dataId('.$row["tnt_id"].')"> <svg class="bi" width="16" height="16"><use xlink:href="#pencil-modify"></use></svg></a>&nbsp<a href="" class="btn btn-danger btn-sm del_tnt"><svg class="bi" width="16" height="16" "><use xlink:href="#del-trash"></use></svg></a></td>
                </tr>';
              }
             ?>
            </tbody>
            </div>
        </table>
      </form>
<!-- Add modal -->
        <form id="post_add" class="" method="post">
        <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModal" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header" >
          <h6 class="modal-title" id="exampleModalLabel">Add Tenant</h6>
          <button type="button" class="btn-close h-2" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="row p-3">
        <div class="col" style="margin-bottom:10px">
          <input type="hidden" name="queryType" value="add">
          <div class="row">
            <div class="col">
              <label for="" style="margin-top:0px;font-size:11px"> First Name :</label>
              <input class="form-control" type="text" name="tnt_fname" value="" required>
              <label for="" style="margin-top:5px;font-size:11px">  Middle Name :</label>
              <input class="form-control" type="text" name="tnt_mname" value="" required>
            </div>
            <div class="col">
              <label for="" style="margin-top:0px;font-size:11px"> Last Name :</label>
              <input class="form-control" type="text" name="tnt_lname" value="" required>
            </div>
          </div>
          <label for="" style="margin-top:5px;font-size:11px">  Address :</label>
          <input class="form-control" type="text" name="tnt_address" value="" required>
          <div class="row">
            <div class="col">
              <label for="" style="margin-top:0px;font-size:11px"> Contact Number :</label>
              <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">+63</span>
                <input type="number"   oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                  maxlength="10" class="form-control" name="tnt_contactno" required  aria-describedby="basic-addon1">
              </div>

            </div>
            <div class="col">
              <label for="" style="margin-top:0px;font-size:11px"> Birthday :</label>
              <input class="form-control" type="date" name="tnt_bday" value="<?php echo $today ?>" required>
            </div>
          </div>

        </div>
        <div class="modal-footer">
          <button id="add_tnt" type="button" class="btn btn-primary">Save</button>
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
        </div>
        </div>
        </div>
        </div>
        </form>
<!-- end modal -->


<!-- Edit modal -->
        <div class="modal fade" id="EditModal" tabindex="-1" aria-labelledby="EditModal" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header" >
          <h6 class="modal-title" id="exampleModalLabel">Edit Tenant</h6>
          <button type="button" class="btn-close h-2" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div id="data_id" class="">

        </div>
        </div>
        </div>
        </div>
<!-- end modal -->
      </div>
    </div>
  </body>

  <?php include'Template/footer.php'; ?>
  <script type="text/javascript">
  $('#add_tnt').click(function() {
           $.post('TenantQuery.php', $('#post_add').serialize(),
               function(response) {
                   alert(response);
                   location.reload();
                   // $('#table').html(response);
               });

       });
       function dataId(a){
         $.ajax({
           type:'post',
           url:'TenantGetData.php',
           data: {id:a},
           success: function(response){
             $('#data_id').html(response);
           }
         });
       }

       $(document).on('click', '.del_tnt', function (event) {
          // var buttonValue = $(this).val();
          var tnt_id = $(this).parents("tr").find("td:eq(0)").text();
          var queryType = 'del';
          var a = confirm("Are you sure you want to Delete?");
          if (a == true) {
            $.post("TenantQuery.php", {queryType: queryType,tnt_id: tnt_id}, function(response){
                alert(response);
                $('#table').html(response);
            })
          }
       });

  </script>
  <script type="text/javascript">
      $(document).ready(function() {
        $('#tenant_tables').DataTable();
        $('.dataTables_filter input[type="search"]').css(
           {'width':'350px','display':'inline-block'}
        );
      } );
  </script>



</html>
