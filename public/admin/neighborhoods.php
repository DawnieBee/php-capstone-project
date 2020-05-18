<?php

require __DIR__ . '/../../config.php';

$query = "SELECT * FROM neighborhoods";

$stmt = $dbh->query($query);

$result = $stmt->fetchAll(\PDO::FETCH_ASSOC);


?><!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Neighborhoods | Admin</title>

  <!-- Bootstrap core CSS -->
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">

  <link href="/admin/css/style.css" type="text/css" rel="stylesheet" />

</head>

<body>

<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top">
    <div class="container">
        <a class="navbar-brand" href="/admin">Neighborhoods Admin</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="/admin/index.php">Dashboard<span class="sr-only">(current)</span></a>
                </li>

                <li class="nav-item">
                    <a class="nav-link active" href="/admin/books.php">Neighborhoods</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/admin/construction.php">Users</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/admin/construction.php">Baskets</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/admin/orders.php">Orders</a>
                </li>

                <li>
                    <a class="nav-link red" href="/logout.php?logout=1">Logout</a>
                </li>


            </ul>
        </div>
    </div>
</nav>
        <!-- end nav -->
        
        <!-- main content -->
        <div class="container-fluid">
            <h1>Honey We're Home Administration Page</h1>
            <p>Select a neighborhood to update.</p>
            <table class="table table-striped">
                <thead>

                    <tr>
                        <th>ID</th>
                        <th>Neighborhood</th>
                        <th>Location</th>
                        <th>Community Centres</th>
                        <th>Description</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($result as $row) : ?>
                        <tr>
                            <td><?=$row['hood_id']?></td>
                            <td><?=$row['name']?></a></td>
                            <td><?=$row['location']?></td>
                            <td><?=$row['comm_centres']?></td>
                            <td><?=$row['description']?></td>
                            <td>
                                <a class="btn btn-primary btn-sm" href="/admin/neighborhood_edit.php">edit</a>
                                <a class="delete btn btn-danger btn-sm" data_id="" href="#">delete</a>
                            </td>   
                        </tr>
                    <?php endforeach; ?>
                    
                </tbody>
            </table>
        </div>
    </body>
</html>