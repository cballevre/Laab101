<?php

namespace App\Controller;

class StepsController extends AppController{

    public function __construct(){
        parent::__construct();
    }

    public function single($slug){
        $subheader = '<a href="' . $this->Html->link(array('controller'=>'courses', 'action'=>'single', 'parameter'=>$step['course'][0]['slug'])) . ' ">' . $step['course'][0]['name'] . '</a>';
        $step = $this->Steps->execute('SELECT * FROM steps WHERE slug = :slug', array('slug'=>$slug));
        $step = $step[0];
        $step['course'] = $this->Steps->execute('SELECT name, slug FROM courses WHERE id = :course_id', array('course_id'=> $step['course_id']));
        if($step['type'] == 'quizzes'){
            $question = $this->Steps->execute('SELECT * FROM questions WHERE step_id = :id', array( 'id' => $step['id']));
            $step['question'] = $question;
        }elseif($step['type'] == 'videos'){
            $video = $this->Steps->execute('SELECT * FROM videos WHERE step_id = :id', array( 'id' => $step['id']));
            $step['video'] = $video;
        }
        $timeline = $this->Steps->execute('SELECT * FROM steps WHERE course_id = :id ORDER BY position', array('id' => $step['course_id']));
        $nextPosition = $this->Steps->execute('SELECT slug FROM steps WHERE course_id = :id AND position = :position', array('id' => $step['course_id'], 'position' => $step['position']+1))[0]['slug'];
        $this->set(compact('step','timeline','nextPosition'));
        $this->render('single');
    }
    
}
