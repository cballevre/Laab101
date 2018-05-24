<?php

namespace Kiwi\Controller\Component;
use Kiwi\Network\Session;

class FlashComponent{
    
    public $session;
    
    public function __construct(){
        $this->session = Session::getInstance();
    }
    
    public function set($message){
        $this->session->write('flash', $message);
    }
    
    public function render(){
        $flash = $this->session->read('flash');
        if(!empty($flash)){
            echo '<section class="flash" id="flash">
            '.$flash.'<a href="" id="fermer">Fermer</a></section>';
            unset($flash);
        }
    }
    
}
