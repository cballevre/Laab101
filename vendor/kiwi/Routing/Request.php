<?php

namespace Kiwi\Routing;

class Request{

    /**
     * URL appellé par l'utilisateur
     * @var string 
     */
    public $url;     

    /**
     * Données envoyé dans le formulaire
     * @var array
     */
    public $prefix = false;
    
     /**
     * Données envoyé dans le formulaire
     * @var array
     */
    public $data = false;

    /**
     * Request constructor.
     * @param $url
     */
    public function __construct()
    {
        
        $this->url = isset($_SERVER['REDIRECT_URL']) ? $_SERVER['REDIRECT_URL'] : '/';
        
        if(!empty($_POST)){
            $this->data = new \stdClass(); 
			foreach($_POST as $key => $values){
				$this->data->$key = $values;
			}
        }
        
    }
   
}