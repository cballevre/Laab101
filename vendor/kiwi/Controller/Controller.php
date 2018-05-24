<?php

namespace Kiwi\Controller;

use Kiwi\Network\Session;

class Controller{

    /**
     * Retourne le nom du controller courant
     * @var string
     */
    private $name;

    private $var = array();

    private $layout = "default";
    
    protected $data;
    
    protected $session;

    /**
	 * Constructeur
	 */
    function __construct(){
        $this->name = $this->setName();
    }

    /**
     * Permet d'ajouter un variable à la page
     * @param $var
     */
    function set($var){
        $this->var = array_merge($this->var, $var);

    }

    /**
     * Permet de rendre une vue
     * @param $action Nom de l'action à rendre 
     */
    public function render($action)
    {
        extract($this->var); 
        ob_start();
        require ROOT .'src/Template/'.$this->name.'/'.$action.'.php';
        $getContent = ob_get_clean();
        if(!empty($this->layout)){
            require ROOT. 'src'. DS.'Template'.DS.'Layout'.DS. $this->layout .'.php';
        }
    }



    /**
     * Permet de changer la template pour l'action
     * @param $layout : Layout choisit
     */
    public function setLayout($layout){
        $this->layout = $layout;
    }

    /**
     * Permet de charger un composant
     * @param $name : Nom du composant à charger
     */
    public function loadComponent($name)
    {
        $file = ROOT . 'vendor/kiwi/Controller/Component/' . $name . 'Component.php';
        if (file_exists($file)) {
            $component = '\\Kiwi\\Controller\\Component\\'. $name . 'Component';
            require($file);
            $this->{$name} = new $component();
        }
    }

    /**
     * Permet de créer un model corespondant aux controller courant
     */
    public function loadHelper($name){
        if(file_exists(ROOT . 'vendor/kiwi/View/Helper/' . $name . 'Helper.php')){
            require(ROOT . 'vendor/kiwi/View/Helper/' . $name . 'Helper.php');
            $helper = '\Kiwi\View\Helper\\'. $name . 'Helper';
            $this->{$name} = new $helper();
        }
    }

    /**
     * Permet de créer un model corespondant aux controller courant
     */
    public function loadModel(){
        $name = $this->name;
        if(file_exists(ROOT . 'src/Model/' . $name . '.php')){
            require(ROOT . 'src/Model/' . $name . '.php');
            $model = '\App\Model\\' . $name;
            $this->{$name} = new $model;
        }
    }

    /**
     * Permet d'avoir le nom du controller courant
     *
     * @return : Retourne un string
     */
    private function setName(){
        $name = str_replace('App','',str_replace('\\', '', str_replace('Controller','',get_class($this))));
        return $name;
    }
    
    public function setData($data){
        $this->data = $data;
    }
    
    function redirect($url){
		header("Location: ".$url); 
	}


}