<?php

namespace App\Controller;

class DiscussionsController extends AppController{

    public function __construct()
    {
        parent::__construct();
    }
    
    public function index(){
        $subheader = 'Communauté';
        $discussions = $this->Discussions->execute('SELECT * FROM discussions ORDER BY created DESC', null);
        
        for($i = 0; $i < count($discussions); $i++){
            $discussions[$i]['topic'] = $this->Discussions->execute('SELECT name FROM topics WHERE id = :id', array("id" => $discussions[$i]['topics_id']));
            $discussions[$i]['user'] = $this->Discussions->execute('SELECT username FROM users WHERE id = :id', array("id" => $discussions[$i]['users_id']));
        }

        $this->set(compact('discussions','subheader'));
        $this->render('index');
    }
    
    public function single($slug){
        $subheader = 'Communauté';
        $discussion = $this->Discussions->execute('SELECT * FROM discussions WHERE slug = :slug', array("slug"=> $slug));
        $answer = $this->Discussions->execute('SELECT * FROM answers WHERE discussions_id = :id ORDER BY created DESC', array('id' => $discussion[0]['id']));
        
        
        for($i = 0; $i < count($discussion); $i++){
            $discussion[$i]['topic'] = $this->Discussions->execute('SELECT name FROM topics WHERE id = :id', array("id" => $discussion[$i]['topics_id']));
            $discussion[$i]['user'] = $this->Discussions->execute('SELECT username FROM users WHERE id = :id', array("id" => $discussion[$i]['users_id']));
        }
        
        for($i = 0; $i < count($answer); $i++){
            $answer[$i]['helper'] = $this->Discussions->execute('SELECT username FROM users WHERE id = :id', array("id" => $answer[$i]['users_id']));
        }
        
        $this->set((compact('discussion','answer','subheader')));
        $this->render('single');
        
    }
    
    public function add(){
       
	      $slug = strtolower($this->data->titre);
	      $slug = preg_replace("/[^a-z0-9s-]/", "", $slug);
           
          $text = str_replace("'", "&apos;",$this->data->resp);

        $this->Discussions->save(array(

            'id' => '',
            'name' => $this->data->titre,
            'content' => $text,
            'created' => (date("d-m-Y").' '.date("H:i:s")),
            'nb_answers' => '0',
            'users_id' => $this->Auth->user('id'),
            'topics_id' => '5',
            'steps_id' => '',
            'slug' => $slug
            
        ));
        $this->redirect('\\');
        
    }
    
    public function addresp(){
       
        $this->Discussions->save(array(
 	
            'id' => '',
            'content' => $this->data->resp,
            'created' => (date("d-m-Y").' '.date("H:i:s")),
            'users_id' => $this->Auth->user('id'),
            'discussions_id' => '5'

        ));
        var_dump( $this->data->resp);
        //$this->redirect('\\');
        
    }
    
}
