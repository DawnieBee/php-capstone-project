<?php

namespace Capstone;

$neighborhood = new Model();

?><!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    </head>
    <body>
        <nav class="navbar navbar-inverse .navbar-fixed-top">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="#">Administration</a>
                </div>
                <ul class="nav navbar-nav">
                    <li class="active"><a href="#">Dashboard</a></li>
                    <li><a href="#">Neighborhoods</a></li>
                    <li><a href="#">Users</a></li>
                    <li><a href="#">Baskets</a></li>
                </ul>
                <!-- search field -->
                <form class="navbar-form navbar-left" action="/action_page.php">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search">
                        <div class="input-group-btn">
                            <button class="btn btn-default" type="submit">
                                <i class="glyphicon glyphicon-search"></i>
                            </button>
                        </div>
                    </div>
                </form>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="#"><span class="glyphicon glyphicon-user"></span>Login</a></li>
                    <li><a href="#"><span class="glyphicon glyphicon-log-in"></span>Logout</a></li>
                </ul>
            </div>
        </nav>
        <!-- end nav -->
        
        <!-- main content -->
        <div class="container-fluid">
            <h1>Honey We're Home Administration Page</h1>
            <p>This is some text.</p>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Neighborhood</th>
                        <th>Location</th>
                        <th>Description</th>
                        <th>Rating</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($neighborhood as $row) : ?>
                        <tr>
                            <td>1</td>
                            <td>Old Kildonan</td>
                            <td>North</td>
                            <td>Lorem Ipsum</td>
                            <td>null</td>
                            <td>
                                <a class="btn btn-primary btn-sm" href="">edit</a>
                                <a class="delete btn btn-danger btn-sm" data_id="" href="#">delete</a>
                            </td>   
                        </tr>
                    <?php endforeach; ?>
                    
                </tbody>
            </table>
        </div>
    </body>
</html>