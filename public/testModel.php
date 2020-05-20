<?php 

require __DIR__ . '/../config.php';

require CLASSES . '/NeighborhoodModel.php';
require CLASSES . '/UserModel.php';
require CLASSES . '/BasketModel.php';

$neighborhoods = new NeighborhoodModel($dbh);
$users = new UserModel($dbh);


dd($neighborhoods->one(1));
dd($neighborhoods->all(20));

dd($users->one(1));
dd($users->all(3));

