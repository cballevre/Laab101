<?php

namespace App\Controller;

class AnswersController extends AppController{

    public function __construct()
    {
        parent::__construct();
    }
   
    public function add(){
       
        $text = str_replace("'", "&apos;",$this->data->resp);
        
        $this->Answers->save(array(
            'id' => '',
            'content' => $text,
            'created' => (date("d-m-Y").' '.date("H:i:s")),
            'users_id' => $this->Auth->user('id'),
            'discussions_id' => $this->data->id
        ));
         var_dump(date("d-m-Y").' '.date("H:i:s"));
        //$this->redirect('\\');
        
    }
    
}
