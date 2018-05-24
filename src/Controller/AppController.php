<?php
/**
 * Created by PhpStorm.
 * User: Célestin
 * Date: 06/06/2016
 * Time: 21:27
 */

namespace App\Controller;

use Kiwi\Controller\Controller;

class AppController extends Controller{

    public function __construct(){
        parent::__construct();
        
        $this->loadComponent('Auth');
        $this->loadComponent('Flash');
        
        $this->loadHelper('Html');
        $this->loadHelper('Form');
        $this->loadHelper('Time');

    }
}