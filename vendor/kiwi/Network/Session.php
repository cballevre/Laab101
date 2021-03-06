<?php

namespace Kiwi\Network;

class Session{

    private static $_instance;

    /**
     *
     */
    public static function getInstance(){
        if(is_null(self::$_instance)){
            self::$_instance = new Session();
        }
        return self::$_instance;
    }
    
    public function write($key,$value){
		$_SESSION[$key] = $value;
	}

	public function read($key = null){
		if($key){
			if(isset($_SESSION[$key])){
				return $_SESSION[$key]; 
			}else{
				return false; 
			}
		}else{
			return $_SESSION; 
		}
	}

}