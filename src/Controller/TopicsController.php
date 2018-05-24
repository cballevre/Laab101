<?php
/**
 * Created by PhpStorm.
 * User: Célestin
 * Date: 06/06/2016
 * Time: 21:27
 */

namespace App\Controller;

use App\Controller\AppController;

class TopicsController extends AppController
{

    public function __construct()
    {
        parent::__construct();
    }

    function single($slug){
        $courses = $this->Topics->execute('SELECT * FROM courses WHERE id = :id ', array('id' => $slug));
        var_dump($courses);
        for($i = 0; $i < count($courses); $i++){
            $courses[$i]['topic'] = $this->Courses->execute('SELECT name FROM topics WHERE id = :id', array("id" => $courses[$i]['topic_id']));
            $courses[$i]['level'] = $this->Courses->execute('SELECT name FROM levels WHERE id = :id', array("id" => $courses[$i]['level_id']));
        }
        $this->set($courses);
        $this->render('single');
    }

}