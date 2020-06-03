<?php
/**
 * Dawn Baker
 * Capstone project
 * main functions file
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
 * isLoggedIn checks to confirm user is logged in
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
 * isLoggedOut  when user logs out clears session
 * @return boolean  if true shows flash message
 */
function isLoggedOut()
{
    if(!empty($_GET['logout'])) {
        unset($_SESSION['user_id']);
        unset($_SESSION['isAdmin']);
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
/**
 * confirms a user is authorized on site
 * @return bool 
 */
function isAdmin()
{
    if(isset($_SESSION['user_id']) && $_SESSION['user_id'] > 0 && isset($_SESSION['isAdmin'])){
        return true;
    }
    return false;
}

/**
 * function to create CSRF token on site
 * @return string encrypted csrf token
 */
function createCsrfToken()
{
    if(empty($_SESSION['csrf'])){
        $_SESSION['csrf'] = md5(uniqid() . time());
    }
}

/**
 * this will set the token on the session
 * @return string 
 */
function csrfToken()
{
    if(!empty($_SESSION['csrf'])) {
        return $_SESSION['csrf'];
    } 
    createCsrfToken();
    return $_SESSION['csrf'];
}
