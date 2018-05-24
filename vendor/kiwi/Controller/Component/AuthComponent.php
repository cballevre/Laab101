<?php

namespace Kiwi\Controller\Component;
use \Kiwi\Network\Session;

class AuthComponent{
    
    public $session;
    
    public $allowedActions = array();
    
    public function __construct(){
        $this->session = Session::getInstance();
    }
    
    public function isLogged(){
    	$user = $this->session->read('user');
		$logged = !empty($user);
		if($logged == true) return true;
		else return false;
	}
	
	public function logged($user){
        $this->session->write('user', $user);
    }

	public function password($password){
	    $out = sha1($password);
	    return $out;
	}
	
	public function isLogout(){
		
	}

	public function user($key){
		
		if($this->session->read('user')){
			$data = $this->session->read('user');
			$data = $data[$key];
			if(isset($data)){
				return $data; 
			} else{
				return false;
			}
		}
		return false;
	}
	
    public function allow($action = null){
    	$args = func_get_args();
        if($action != null){
        	$this->allowedActions = array_merge($this->allowedActions, $args);
        }
    }

}