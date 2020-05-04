<?php

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
     * Test for minimum string length
     * @param  String $value 
     * @param  String $field 
     * @param  Integer $len   
     * @return Void        
     */
    public function minLength($value, $field, $len)
    {
        if(strlen($value) < $len){
            $this->setError($field, $this->label($field) . "  must have a minimum lenth of $len characters");
        }
    }
    /**
     * Test for maximum string length
     * @param  String $value 
     * @param  String $field 
     * @param  Integer $len   
     * @return Void        
     */
    public function maxLength($value, $field, $len)
    {
        if(strlen($value) > $len){
            $this->setError($field, $this->label($field) . "  must have a maximum lenth of $len characters");
        }
    }

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



