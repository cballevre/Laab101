<?php
/**
 * Created by PhpStorm.
 * User: Célestin
 * Date: 06/06/2016
 * Time: 21:27
 */

namespace App\Controller;

use App\Controller\AppController;

class LeaderboardsController extends AppController
{
    
    function index(){
        $leaderboards = $this->Leaderboards->execute('SELECT username, points FROM users ORDER BY points DESC', null);
        $topics = $this->Leaderboards->execute('SELECT name FROM topics', null);
        $scorePerso = $this->Leaderboards->execute('SELECT username, points FROM users WHERE username = :id', array("id" => $this->Auth->user('username')));
        $this->set(compact('leaderboards', 'topics', 'scorePerso'));
        $this->render('index');
    }
    
}