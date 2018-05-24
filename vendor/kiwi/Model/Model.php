<?php

namespace Kiwi\Model;

use Kiwi\Database\Database;

class Model
{
    /**
     * Variable contenant le
     * @var \PDO
     */
    private $pdo;
    
    public $errors = array();
	public $validate = array();
	public $table = ''; 

    public function __construct()
    {
        $this->pdo = Database::getInstance()->getPDO();
    }

    public function find($type = 'first', $params = array()){

        $request = "";
        $reponse = "";

        if($type == 'all'){

        }
        $request = $this->pdo->prepare();
        $request->execute();
        if($type == 'first') $reponse = $request->fetch(\PDO::FETCH_ASSOC);
        else if($type == 'all') $reponse = $request->fetchAll(\PDO::FETCH_ASSOC);
        return $reponse;
    }

    public function execute($request, $params){
        $request = $this->pdo->prepare($request);
        $request->execute($params);
        $reponse = $request->fetchAll(\PDO::FETCH_ASSOC);
        return $reponse;
    }
    
    public function save($data = array()){
       
        $insert = '(';
        $nbr_value = count($data);
        $i = 0;
        foreach($data as $value){
            $i++;
            if(!is_numeric($value)){
                $value = "'". $value."'";
            }
            if($nbr_value != $i){
                $value = $value.',';
            }
            $insert = $insert . $value;
        }
        $insert = $insert . ')';
        $request = 'INSERT INTO '.strtolower(str_replace('App\\Model\\','', get_class($this))).' VALUES '.$insert;
        $request = $this->pdo->prepare($request);
        $request->execute();
        return true;
    }

    public function findById($id){
        return array("test"=>"test ".$id);
    }
    
    /**
     * Permet de valider des données
	 * @param $data données à valider 
	 */
	function validates($data, $action = null){
	    
	    $errors = array();
	    
	    if(isset($this->validate)){
	        foreach($this->validate as $key => $values){
	            if($values['action'] == $action){
	                if(isset($data->$key)){
    	                switch($values['rule']){
    	                    case 'notEmpty': 
    	                        if(!empty($data->$key)){
    	                            $errors[$key] = $values['rule'];
    	                        }
    	                        break;
    	                    case 'isUnique':
    	                        $isUnique = $this->execute('SELECT id FROM '. strtolower(str_replace('App\\Model\\','', get_class($this))) .' WHERE '.$key.' = :isUnique', array('isUnique' => $data->$key)); 
    	                        if(!empty($isUnique)){
    	                            $errors[$key] = $values['message'];
    	                        }
    	                        break;
    	                    case 'email':
    	                        $email = "/^[^\W][a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\@[a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\.[a-zA-Z]{2,4}$/";
    	                        $test = preg_match($email, $data->$key);
    	                        if(empty($test)){
    	                           $errors[$key] = $values['message'];
    	                        }
    	                        break;
    	                    default:
    	                        $test = preg_match($values['rule'], $data->$key);
    	                        if(empty($test)){
    	                           $errors[$key] = $values['message'];
    	                        }
    	                        break;
    	                }
    	            }
	            }
	        }
        }
        $this->errors = $errors;
        if(!empty($this->errors)){
            return false;
        }else{
            return true;
        }
        
	}


}