<?php
/**
 * Dawn Baker
 * Inter PHP
 *Assignment 1
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
 * Get old value from array (eg post) for output to form  make form sticky! 
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

/**
 * output to error below the field
 * @param  String $field field name
 * @param  Array $post The array to get the field value from
 * @return String  The field value
 */
function error($field, $post) 
{
    if(!empty($post[$field])) {
        return '<span class="error"><small>' . esc($post[$field]) . '</small></span>';
    } else {
        return '';
    }
}

/**
 * cleaning up the label field
 * @param  label  $field 
 * @return label        removing and _ and capitalizing the fields 
 */
function label($field)
{
    // first_name  first name
    $label = str_replace('_', ' ', $field);
    // first_name  First Name
    $label = ucwords($label);
    return $label;
}

/* Validation Functions */
/**
 * set the error messages
 * @param string $field   
 * @param output $message error message
 */
function setError($field, $message){
    global $errors;
    if(empty($errors[$field])) {   
            $errors[$field] = $message;
    }
}
/**
 * Validate required fields
 * @param  String  $field 
 * @param  string  $value [Post value]
 * @return boolean        
 */
function isRequired($field, $value)
{
    if(empty($value)) {
        if(empty($errors[$field])){
            setError($field, label($field) . ' is a required field');
        }
    }
}
/**
 * isLogged in function
 * @return boolean 
 */
function isLoggedIn()
{
    if(!empty($_SESSION['user_id'])) {
        return true;
    }else{
        return false;
    }
}
/**
 * [isLoggedOut description]
 * @return boolean [description]
 */
function isLoggedOut()
{
    if(!empty($_GET['logout'])) {
        unset($_SESSION['user_id']);
        session_regenerate_id();
        $flash = array(
            'class' => 'flash_error',
            'message' => 'You have successfully logged out'
            );
        $_SESSION['flash'] = $flash;
        header('Location: index.php');
        die;
    } 
}
