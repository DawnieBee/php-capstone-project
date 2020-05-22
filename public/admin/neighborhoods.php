<?php
/**
 * Dawn Baker
 * OO_PHP 
 * Assignment 2
 */
namespace Capstone; 

require __DIR__ . '/../../config.php';

require CLASSES . '/NeighborhoodModel.php';


$neighborhood = new NeighborhoodModel();

$result = $neighborhood->all();

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
                        <a class="nav-link" href="/admin/index.php">Home<span class="sr-only"></span></a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link active" href="/admin/neighborhoods.php">Neighborhoods</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/admin/users.php">Users</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/admin/baskets.php">Baskets</a>
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
    </nav> <!-- end nav -->
        
    <!-- main content -->
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1>Neighborhoods</h1>
                
                <table class="table table-striped">
                    <tbody>
                        <tr>
                            <th>ID</th>
                            <th>Neighborhood</th>
                            <th>Location</th>
                            <th>Rating</th>
                            <th>Description</th>
                            <th>Actions</th>
                        </tr>
                    
                        <!-- get the table properties as a list in table -->
                        <?php foreach($result as $row) : ?>
                            <tr>
                                <td><?=esc($row['hood_id'])?></td>
                                <td><?=esc($row['name'])?></a></td>
                                <td><?=esc($row['location'])?></td>
                                <td><?=esc($row['rating_scale'])?></td>
                                <td><?=esc($row['description'])?></td>
                                <td>
                                    <a class="btn btn-primary btn-sm" href="neighborhood_edit.php?hood_id=<?=$row['hood_id']?>">edit</a>
                                    <a class="delete btn btn-danger btn-sm" data_id="" href="#">delete</a>
                                </td>   
                            </tr>
                        <?php endforeach; ?>
                        
                    </tbody>
                </table>
            </div> <!-- end col -->
        </div> <!-- end row -->
    </div> <!-- end container -->
</body>
</html>
