<?php

namespace App\Controller;

use App\Controller\AppController;

class UsersstepsController extends AppController
{
    
    public function __construct(){
        parent::__construct();
    }
    
    public function add($id){
        $this->Usersteps->save(array(
            'user_id' => $this->Auth->user('id'),
            'step_id' => $id
        ));
        $this->redirect('\steps\single\\' . $slug[0]['slug']);
    }
    
}