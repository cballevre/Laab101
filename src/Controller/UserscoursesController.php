<?php

namespace App\Controller;

use App\Controller\AppController;

class UserscoursesController extends AppController
{
    
    public function __construct(){
        parent::__construct();
    }
    
    public function add($id){
        $this->Userscourses->save(array(
            'user_id' => $_SESSION['user']['id'],
            'course_id' => $id,
            'state' => 1,
            'position' => 1
        ));
        $slug = $this->Userscourses->execute('SELECT slug FROM steps WHERE course_id = :id and position = 1', array('id'=>$id));
        $this->redirect('\steps\single\\' . $slug[0]['slug']);
    }
    
}