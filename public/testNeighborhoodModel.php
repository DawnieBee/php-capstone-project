<?php

require __DIR__ . '/../../config.php';

require CLASSES . '/NeighborhoodModel';

$model = new NeighborhoodModel($dbh);

dd($model);