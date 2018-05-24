<?php
/**
 * Created by PhpStorm.
 * User: Célestin
 * Date: 06/06/2016
 * Time: 21:27
 */

namespace App\Controller;

use App\Controller\AppController;

class UsersController extends AppController
{
    
    public function __construct(){
        parent::__construct();
        $this->Auth->allow('signin','login');
    }

    public function profile(){
        $this->render('profile');
    }
    
    public function edit(){
        $this->render('edit');
    }
    
    public function signin(){
        
        if($this->Users->validates($this->data, 'signin')){
            $this->Users->save(array(
                'id' => '',
                'name' => '',
                'lastname' => '', 
                'username' => $this->data->username,
                'email' => $this->data->email,
                'password' => $this->Auth->password($this->data->password),
                'avatar' => 0,
                'points' => 0
            ));
            $user = $this->Users->execute('SELECT * FROM users WHERE username = :username',array('username'=> $this->data->username));
            $this->Auth->logged($user[0]);
            $this->Flash->set('Vous etes bien inscrit');
            $this->redirect('/');
        }else $this->redirect('/'); 
    }
    
    public function login(){
        if($this->Users->validates($this->data)){
            $password = $this->Auth->password($this->data->password);
            $user = $this->Users->execute('SELECT * FROM users WHERE username = :username',array('username'=> $this->data->username));
            if($password == $user[0]['password']){
                $this->Auth->logged($user[0]);
                $this->Flash->set('Vous etes bien connecté');
                $this->redirect('/courses/');
            } else { 
                $this->Flash->set('ton mot de passe ou tes identifiant de ne sont pas correctes');
                $this->redirect('/');
            }
        }else $this->redirect('/');
    }

    public function logout(){
        $_SESSION['user'] = "";
        $this->redirect('/');
    }
    
}