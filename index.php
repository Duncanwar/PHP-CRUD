<?php
include 'action.php'
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <title>PHPCRUD</title>
</head>
<body>
  <header>
  <nav class="navbar navbar-expand-md bg-dark navbar-dark">
  <!-- Brand -->
  <a class="navbar-brand" href="#">Navbar</a>

  <!-- Toggler/collapsibe Button -->
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>

  <!-- Navbar links -->
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="#">Link</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Link</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Link</a>
      </li>
    </ul>
  </div>
  <form class="form-inline" action="/action_page.php">
    <input class="form-control mr-sm-2" type="text" placeholder="Search">
    <button class="btn btn-primary" type="submit">Search</button>
  </form>
</nav> 
  </header>  

  <div class="container-fluid">
  <div class="row justify-content-center">
  <div class="col-md-10">
  <h3 class="text-center text-dark">
  ADVANCED PHP CRUD APP USING MYSQLI
  </h3>
<hr>
<?php if(isset($_SESSION['response'])){ ?>
    <div class="alert alert-<?= $_SESSION['res_type']; ?> alert-dismissible text-center">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  <b><?= $_SESSION['response']; ?></b>

</div>
<?php } unset($_SESSION['response']); ?>
  <div class="row">
  <div class="col-md-4">
  <h3 class="text-center text-info">Add Record
  
  </h3>
  <form action="action.php" method="post" enctype="multipart/form-data">
  
  <div class="form-group">
  <input type="text" name="name" class="form-control" placeholder="Enter a name">
  </div>

  <div class="form-group">
  <input type="email" name="email" class="form-control" placeholder="Enter Email">
  </div>

  <div class="form-group">
  <input type="tel" name="phone" class="form-control" placeholder="Enter a phone">
  </div>

  <div class="form-group">
  <input type="file" name="image" class="custom-file">
  </div>

  <div class="form-group">
  <input type="submit" name="add" class="btn btn-primary btn-block" value="ADD RECORD">
    </div>

  </form>
</div>
<!-- table is placed here -->
<div class="col-md-12">
<h3 class="text-center text-info">
Records in Database
<table class="table table-dark table-hover">
    <thead>
      <tr>
        <th>#</th>
        <th>image</th>
        <th>Name</th>
        <th>Email</th>
        <th>Phone</th>
        <th class="p-2">Actions</th>
      </tr>
    </thead>
    <tbody>
      <tr>
      <td>1</td>
      <td><img src="" alt=""></td>
        <td>John</td>
        <td>Doe</td>
        <td>john@example.com</td>
        <td class="p-2">
        <a href="#" class="badge badge-primary "> Details</a>
        <a href="#" class="badge badge-danger "> Delete</a>
        <a href="#" class="badge badge-success "> Edit</a>
        </td>
      </tr>
    </tbody>
  </table>
</h3>
</div>
  </div>

    </div>
  </div>
  </div>
</body>
</html>