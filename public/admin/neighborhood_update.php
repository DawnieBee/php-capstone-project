<?php

require __DIR__ . '/../../config.php';
require CLASSES . '/NeighborhoodModel.php';

use Capstone\NeighborhoodModel;

$neighbhorhood = new NeighborhoodModel();



$result = $neighbhorhood->updateNeighborhood();

dd($result);
die;
