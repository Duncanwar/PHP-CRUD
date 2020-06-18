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
  <a class="navbar-brand" href="#">CRUD</a>

  <!-- Toggler/collapsibe Button -->
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>

  <!-- Navbar links -->
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="#">Home</a>
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
  <input type="hidden" name="id" value="<?= $id; ?>">
  <input type="text" name="name" value="<?= $name; ?>" class="form-control" placeholder="Enter a name">
  </div>

  <div class="form-group">
  <input type="email" name="email" value="<?= $email; ?>" class="form-control" placeholder="Enter Email">
  </div>

  <div class="form-group">
  <input type="tel" name="phone" value="<?= $phone; ?>" class="form-control" placeholder="Enter a phone">
  </div>

  <div class="form-group">
  <input type="hidden" name="oldimage" value="<?= $photo; ?>">
  <input type="file" name="image" class="custom-file">
  <img src="<?= $photo; ?>" width="120" class="img-thumbnail">
  </div>

  <div class="form-group">
  <?php if($update){?>
    <input type="submit" name="update" class="btn btn-success btn-block" value="UPDATE RECORD">
  <?php } else { ?>
  <input type="submit" name="add" class="btn btn-primary btn-block" value="ADD RECORD">
  <?php } ?>
    </div>

  </form>
</div>
<!-- table is placed here -->
<div class="col-md-12">
<?php 
$query= "select * from crud";
$stmt=$conn->prepare($query);
$stmt->execute();
$result= $stmt->get_result(); 
?>
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
    <?php while($row=$result->fetch_assoc()){ ?>
      <tr>
      <td><?= $row['id']; ?></td>
      <td><img src="<?= $row["photo"]; ?>" width="25" ></td>
        <td><?= $row["name"]; ?></td>
        <td><?= $row["email"]; ?></td>
        <td><?= $row["phone"]; ?></td>
        <td class="p-2">
        <a href="details.php?details=<?= $row['id'] ?>" class="badge badge-primary "> Details</a>
        <a href="action.php?delete=<?= $row['id'] ?>" class="badge badge-danger "> Delete</a>
        <a href="index.php?edit=<?= $row['id'] ?>" class="badge badge-success "> Edit</a>
        </td>
      </tr>
    <?php } ?>
    </tbody>
  </table>
</h3>
</div>
  </div>

    </div>
  </div>
  </div>
  <!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</body>
</html>