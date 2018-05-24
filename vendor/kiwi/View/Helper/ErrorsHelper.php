<?php

namespace Kiwi\View\Helper;

use Kiwi\View\Helper;

class ErrorsHelper extends Helper
{
        
        private $errors;
        
        public function isValid(){
            return empty($this->errors);
        }
        
        public function setErrors($message, $type){
            $this->errors[$type] = $message;
        }
        
        public function getErrors($type){
            if(!empty($this->errors[$type])){
              echo '<div class="errors"><div class="arrow"></div>'.$this->errors[$type].'</div>';
            }  
        }
        
    }