<?php

namespace Kiwi\Routing;

class Dispatcher{
    
    /**
     * 
     * @var Request
     */
    public $request; 
    
    /**
     * Repartit les différente action en fonction de l'url
     * @param $url: L'url transmise par l'utilisateur
     */
    public function __construct($url){
        $this->request = new Request($url);
        Router::parse($this->request->url, $this->request);
        $this->loadController();
    }

    /**
     * Permet de charger le controller en fonction de l'url demander par l'utilisateur
     */
    private function loadController(){
        $name = ucfirst($this->request->controller).'Controller';
        $namespace = '\App\Controller\\'. $name;
        $file = ROOT . DS . 'src/Controller/' . $name . '.php';
        if(file_exists($file)){
            require($file);
            $controller = new $namespace();
            $controller->setData($this->request->data);
            $controller->loadModel();
            $this->loadAction($controller);
        }
    }

    /**
     * Permet d\'afficher l\'action demander par l\'utilisateur
     * @param $controller : Controller créer
     */
     
    private function loadAction($controller){
    
        $action =  $this->request->action;
        
        if(method_exists($controller, $action)){ 
            if($controller->Auth->isLogged()){
                if(!empty($this->request->params[0])){
                    $controller->{$action}($this->request->params[0]); 
                }else{
                    $controller->{$action}();
                }
            }else{
                $allowed = false;
                foreach($controller->Auth->allowedActions as $allowedAction){
                    if($allowedAction == $action) $allowed = true;
                }
                if($allowed){
                    if(!empty($this->request->params[0])){
                        $controller->{$action}($this->request->params[0]); 
                    }else{
                        $controller->{$action}();
                    }
                }else $controller->redirect('\\');
            }
        }
    }
    
}    