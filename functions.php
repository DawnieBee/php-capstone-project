<?php
/* 
 * Dawn Baker            
 * Intro PHP             
 * Assignment 1          
 */

/**
 * dump and die
 * @param  Mixed $var variable to dump
 * @return [type]      [description]
 */
function dd($var)
{
    echo '<pre>';

    var_dump($var);

    echo '</pre>';

    die('Dying here');

}

