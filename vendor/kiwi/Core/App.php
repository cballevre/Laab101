<?php

namespace Kiwi\Core;

use Kiwi\Config\Config;

class App{

    private static $_instance;
    private $config;

    public static function getIntance(){

        if(is_null(self::$_instance)){
            self::$_instance = new App();
        }
        return self::$_instance;

    }

    public function __construct()
    {
        $this->config = Config::getIntance()->getConfig();
        $this->loadRoutes();
    }

    public function getConfig(){
        return $this->config;
    }

    public function loadRoutes(){
        require ROOT . DS . 'config/routes.php';
    }

}