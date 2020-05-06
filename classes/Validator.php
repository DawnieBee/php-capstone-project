<?php
/**
 * Dawn Baker
 * Inter PHP
 *Assignment 1
 */
/* Validator Class funtion */

namespace Capstone;

class Validator
{
    /**
     * Errors array 
     * @var array
     */
    private $errors = [];  

    /**
     * test that required field has values
     * @param  Mixed  $value value to test
     * @param  String  $field 
     * @return Void      returns nothing  
     */
    public function isRequired($value, $field)
    {
        if(empty($value)) {
            $this->setError($field, $this->label($field) . " is a required field.");
            }
    }
           
     /**
      * String Validator - no special characters or numbers besides a dash (-) or an apostrophe (')
      * @param  String $value 
      * @param  String $field 
      * @return boolean        
      */
    public function string($value, $field)
    {
        $pattern = '/^[A-Za-z\s\-\']{1,31}$/';
        $test = preg_match($pattern, $value);
        if($test === 0){
            $this->setError($field, $this->label($field) . " cannot contain numbers or special characters");
        }
    }

    /**
     * Minimum length 
     * @param  String $value 
     * @param  String $field 
     * @param  Integer $len   
     * @return Void        
     */
    public function minLen($value, $field, $len)
    {
        if(strlen($value) < $len){
            $this->setError($field, $this->label($field) . " must be at least $len characters long.");
        }
    }

    /**
     * Maximum length  
     * @param  String $value 
     * @param  String $field 
     * @param  Integer $len   
     * @return Void        
     */
    public function maxLen($value, $field, $len)
    {
        if(strlen($value) > $len){
            $this->setError($field, $this->label($field) . " cannot be more than $len characters long.");
        }
    }

    /**
     * Validate email   
     * @param  String  $field    
     * @param  String  $value 
     * @return boolean          
     */
    public function isEmail($field, $value)
    {
        if($value !== filter_var($value, FILTER_VALIDATE_EMAIL)){
            $this->setError($field, $this->label($value) . " is not a valid email address.");
        }
    }

    /**
     * Postal Code validator
     * @param  string  $value only 6 digits Canadian format
     * @param  string  $field 
     * @return boolean        
     */
    public function isPostalCode($value, $field)
    {
        $pattern = '/^[a-zA-Z]\d[a-zA-Z]\d[a-zA-Z]\d$/';
        $test = preg_match($pattern, $value);
        if($test === 0) {
            $this->setError($field, $this->label($field) . " is not a valid format.");
        }
    }

    /**
     * Clean phone number validator 
     * @param  String  $value 
     * @param  String  $field 
     * @return boolean        
     */
    public function isPhoneNum($value, $field)
    {
        $pattern = '/^[\(]?[\d]{3}[\)\s\-.]*[\d]{3}[\s\-\.]?[\d]{4}$/';
        $test = preg_match($pattern, $value);
        if($test === 0) {
            $this->setError($field, $this->label($field) . " requires 10 digits with area code.");
        } elseif(preg_match($pattern, $value) === 1) {
            $pattern = '/[^0-9]/';
            $replace = '';
            $clean_num = preg_replace($pattern, $replace, $value);
        }
    }

    /**
     * Password strength
     * @param  String  $value must have min 8 characters, uppercase, num, and spec char
     * @param  String  $field 
     * @return boolean        
     */
    public function isPassword($value, $field)
    {
        $pattern = '/(?=.*[\!\@\#\$\%\^\&\*]+)(?=.*[\d]+)(?=.*[A-Z]+).{8,}/';
        $test = preg_match($pattern, $value);
        if($test === 0) {
            $this->setError($field, $this->label($field) . " must be a minimum 8 characters with at least 1 uppercase letter, a number, and a special character.");
        }
    }

    /**
     * confirm fields
     * @param  String $field  
     * @param  String $value1 
     * @param  String $value2 
     * @return boolean         
     */
    function confirm($field, $value1, $value2)
    {
        if($_POST['password'] !== $_POST['confirmPassword']){
            $this->setError($field, $this->label($field) . " and Password do not match");
        }
    }


    /**
     * Get erorrs array
     * getters are public functions for returning/accessing private properties
     * @return Array 
     */
    public function errors()
    {
        return $this->errors;  
    }

    /* Private utility functions 
    ---------------------------------------------------------*/
    /**
     * Set errors message function
     * @param mixed $field    value to test
     * @param String $message    message to display
     */
    private function setError($field, $message)
    {
        if(empty($this->errors[$field])) {
            $this->errors[$field] = $message;
        }
    }
    /**
     * label cleanup functions       
     * @param  Mixed $field     
     * @return String
     */
    private function label($field)
    {
        // first_name   First Name
        $label = str_replace('_', ' ', $field);
        // first name  to  First Name
        $label = ucwords($label);
        return $label;
    }

}