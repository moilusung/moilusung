<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="Resources/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Dashboard</title>
  </head>

  <?php include'Template/header.php'; ?>
  <ul class="nav nav-pills flex-column mb-auto">
    <li>
      <a href="index.php" class="nav-link link-dark active">
        <svg class="bi me-2" width="16" height="16"><use xlink:href="#speedometer"></use></svg>
        Dashboard
      </a>
    </li>
    <li>
      <a href="Property.php" class="nav-link link-dark">
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
  <body>

    <script src="Resources/jsbootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </body>
  <?php include'Template/footer.php'; ?>
</html>
