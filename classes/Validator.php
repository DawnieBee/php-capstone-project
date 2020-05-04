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