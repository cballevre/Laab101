<?php

namespace App\Model;

use Kiwi\Model\Model;

class Users extends Model{
    
    var $validate = array(
		'username' => array(
			'rule' => 'notEmpty',
			'message' => 'Vous devez préciser un nom d\'utilisateur'
		),
		'username' => array(
			'rule' => 'isUnique',
			'message' => 'Un autre utilisateur utilise déja ce nom d\'utilisateur',
			'action' => 'signin'
		),
		'password' => array(
			'rule' => '/(\\w+)/',
			'message' => "Le mot de passe n'est pas valide"
		)
	);

}