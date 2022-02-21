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

  <?php include'Template/header.php'; ?>
  <ul class="nav nav-pills flex-column mb-auto">
    <li>
      <a href="index.php" class="nav-link link-dark ">
        <svg class="bi me-2" width="16" height="16"><use xlink:href="#speedometer"></use></svg>
        Dashboard
      </a>
    </li>
    <li>
      <a href="Property.php" class="nav-link link-dark active">
        <svg class="bi me-2" width="16" height="16"><use xlink:href="#grid"></use></svg>
        Property
      </a>
    </li>
    <li>
      <a href="Tenant.php" class="nav-link link-dark">
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
      $sql = "SELECT * FROM tbl_property";
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
        <table id="property_tables" class="table table-bordered table-sm table-hover" border='1px'style="width:100%;font-size:14px;vertical-align:middle">
            <thead>
            <tr class="text-center">
              <th width="10%" style="display:none">Property ID</th>
                <th width="10%">Property No.</th>
                <th >Property Description</th>
                <th width="30%">Property Address</th>
                <th width="10%">Action</th>
            </tr>
            </thead>
            <div id="table">
            <tbody>
            <?php
              while ($row=mysqli_fetch_array($result)) {
                echo '
                <tr class="text-center">
                  <td style="display:none">'.$row["prop_id"].'</td>
                  <td>'.$row["prop_no"].'</td>
                  <td >'.$row["prop_desc"].'</td>
                  <td>'.$row["prop_address"].'</td>
                  <td ><a href="" class="btn btn-warning btn-sm" role="button" data-bs-toggle="modal" data-bs-target="#EditModal" onclick="dataId('.$row["prop_id"].')"> <svg class="bi" width="16" height="16"><use xlink:href="#pencil-modify"></use></svg></a>&nbsp<a href="" class="btn btn-danger btn-sm del_prop"><svg class="bi" width="16" height="16" "><use xlink:href="#del-trash"></use></svg></a></td>
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
          <h6 class="modal-title" id="exampleModalLabel">Add Property</h6>
          <button type="button" class="btn-close h-2" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="row p-3">
        <div class="col" style="margin-bottom:10px">
            <input type="hidden" name="queryType" value="add">
            <label for="" style="margin-top:0px;font-size:11px">  Property No :</label>
            <input class="form-control" type="text" name="prop_no" value="">
            <label for="" style="margin-top:5px;font-size:11px">  Property Desciption :</label>
            <textarea class="form-control" name="prop_desc"></textarea>
            <label for="" style="margin-top:5px;font-size:11px">  Property Address :</label>
            <input class="form-control" type="text" name="prop_address" value="">
        </div>
        <div class="modal-footer">
          <button id="add_prop" type="button" class="btn btn-primary">Save</button>
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
          <h6 class="modal-title" id="exampleModalLabel">Edit Property</h6>
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
  $('#add_prop').click(function() {
           $.post('PropertyQuery.php', $('#post_add').serialize(),
               function(response) {
                   alert(response);
                   location.reload();
                   // $('#table').html(response);
               });

       });
       function dataId(a){
         $.ajax({
           type:'post',
           url:'PropertyGetData.php',
           data: {id:a},
           success: function(response){
             $('#data_id').html(response);
           }
         });
       }

       $(document).on('click', '.del_prop', function (event) {
          // var buttonValue = $(this).val();
          var prop_id = $(this).parents("tr").find("td:eq(0)").text();
          var queryType = 'del';
          var a = confirm("Are you sure you want to Delete?");
          if (a == true) {
            $.post("PropertyQuery.php", {queryType: queryType,prop_id: prop_id}, function(response){
                alert(response);
                $('#table').html(response);
            })
          }
       });

  </script>
  <script type="text/javascript">
      $(document).ready(function() {
        $('#property_tables').DataTable();
        $('.dataTables_filter input[type="search"]').css(
           {'width':'350px','display':'inline-block'}
        );
      } );
  </script>



</html>
