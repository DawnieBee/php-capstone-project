<?php 

require __DIR__ . '/../config.php';

require CLASSES . '/NeighborhoodModel.php';
require CLASSES . '/UserModel.php';

$neighborhoods = new NeighborhoodModel();
$users = new UserModel();


dd($neighborhoods->one(1));
dd($neighborhoods->all(20));
// dd($users->one(3));
// dd($users->all(6));