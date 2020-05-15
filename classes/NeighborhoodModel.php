<?php

namespace Capstone;



class NeighborhoodModel extends Model
{
    protected $table = 'neighborhoods';
    protected $key = 'hood_id';


}

$neighborhood1 = new Capstone\NeighborhoodModel("St James");

function all();