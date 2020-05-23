<?php

require __DIR__ . '/../../config.php';


?><!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Dashboard | Admin</title>

    <!-- Bootstrap core CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">

    <link href="/admin/css/style.css" type="text/css" rel="stylesheet" />

</head>

<body>

<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top">
    <div class="container">
        <a class="navbar-brand" href="/admin">Dashboard</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="/admin/index.php">Dashboard<span class="sr-only">(current)</span></a>
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
</nav><!-- end nav -->
<!-- main content -->
<h1>This is the home page</h1>
<div class="search">
    <form action="/" method="get" autocomplete="off" novalidate>
        <input type="text" id="s" name="s" maxlength="255" />&nbsp;
        <input type="submit" value="search" />
        <div>
            <ul id="live_search"></ul>
        </div>
    </form>
</div> <!-- end search -->