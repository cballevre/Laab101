<?php

namespace Kiwi\Database;

use Kiwi\Config\Config;

class Database{

    private static $_instance;

    private $host;
    private $dbname;
    private $username;
    private $password;
    private $encoding;

    /**
     * Database constructor.
     */
    public static function getInstance(){
        if(is_null(self::$_instance)){
            self::$_instance = new Database();
        }
        return self::$_instance;
    }

    function __construct()
    {
        $config = Config::getIntance()->getConfig();
        $default = $config['Datasources']['default'];
        $this->host = $default['host'];
        $this->dbname = $default['database'];
        $this->username = $default['username'];
        $this->password = $default['password'];
        $this->encoding = $default['encoding'];
    }

    function getPDO(){
        try {
            $pdo = new \PDO("mysql:dbname=".$this->dbname.";host=".$this->host, $this->username, $this->password);
            $pdo->exec('SET NAMES '. $this->encoding);
        } catch (\PDOException $e) {
            echo 'Connexion échouée : ' . $e->getMessage();
        }
        return $pdo;
    }

}