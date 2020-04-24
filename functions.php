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

    //die('Dying here');

}

/**
 * Safely escape possibly tainted strings
 * @param  String $string 
 * @return String         
 */
function esc($string)
{
    return htmlentities($string, null, "UTF-8");
}
/**
 * Escape data for attributes
 * @param  String $string 
 * @return [type]         [description]
 */
function esc_attr($string) 
{
    return htmlentities($string, ENT_QUOTES, "UTF-8");
}
/**
 * Retrieve old POST values
 * @param  String $field field name
 * @return String        
 */

/**
 * Get old value from array (eg post) for output to form
 * @param  String $field field name
 * @param  Array $post The array to get the field value from
 * @return String  The field value
 */
function old($field, $post) 
{
    if(!empty($post[$field])) {
        return $post[$field];
    } else {
        return '';
    }
}
