<?php
include 'action.php'
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <title>Details page</title>
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
        <a class="nav-link" href="index.php">Home</a>
     
    </ul>
  </div>
  <form class="form-inline" action="/action_page.php">
    <input class="form-control mr-sm-2" type="text" placeholder="Search">
    <button class="btn btn-primary" type="submit">Search</button>
  </form>
</nav> 
  </header>  
<div class="container">
<div class="row justify-content-center">
<div class="col-md6 mt-3 p-4 bg-info rounded">
<h2 class="bg-light p-2 rounded text-center text-dark">
ID: <?= $vid ?>
</h2>
<div class="text-center">
<img src="<?= $vphoto; ?>" width="300" class="img-thumbnail">
</div>
<h4 class="text-light">Name : <?= $vname ?> </h4>
<h4 class="text-light">Email : <?=$vemail ?> </h4>
<h4 class="text-light">Phone : <?= $vphone; ?></h4>
</div>
</div>
</div>
</body>
</html>