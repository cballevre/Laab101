<?php

namespace App\Controller;

class PagesController extends AppController{

    public function __construct()
    {
        parent::__construct();
        $this->Auth->allow('landing');
    }

    public function home(){
        $this->render('home');
    }
    
    public function error(){
        $this->render('error');
    }
    
    public function landing(){
        $this->setLayout('landing');
        $this->render('landing');
    }



}
