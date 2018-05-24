<?php

namespace Kiwi\Config;

/**
 * Class Config
 *
 * @package Kiwi\Config
 * @author Celestin Ballevre
 * @copyright 2016
 */
class Config{

    /**
     *
     *
     * @var array
     */
    private $config = array();

    private static $_instance;

    public static function getIntance()
    {

        if(is_null(self::$_instance)){
            self::$_instance = new Config();
        }
        return self::$_instance;

    }

    public function __construct()
    {
        $this->config = require ROOT. 'config/app.php';
    }

    public function getConfig(){
        return $this->config;
    }

}