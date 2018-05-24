<?php

namespace App\Controller;

use App\Controller\AppController;

class CoursesController extends AppController
{

    public function __construct()
    {
        parent::__construct();
    }

    function index(){
        $subheader = 'Bibliothèque';
        $request = 'SELECT * FROM courses';
        $params = null;
        if($this->data != false){
            if($this->Courses->validates($this->data)){
                if(!empty($this->data->category)){
                    if($this->data->category != 0){
                        $request = $request . ' WHERE topic_id = ' . $this->data->category;
                    }
                }
                if(!empty($this->data->orderby)){
                    switch ($this->data->orderby) {
                        case 'newer':
                            $order = 'created DESC';
                            break;
                        case 'older':
                            $order = 'created ASC';
                            break;
                        case 'alphabetic':
                            $order = 'name ASC';
                            break;
                        case 'difficulty':
                            $order = 'level_id';
                            break;
                    }
                    $request = $request . ' ORDER BY ' . $order;
                }
            }
        }
        $courses = $this->Courses->execute($request, $params);
        for($i = 0; $i < count($courses); $i++){
            $courses[$i]['topic'] = $this->Courses->execute('SELECT name FROM topics WHERE id = :id', array("id" => $courses[$i]['topic_id']));
            $courses[$i]['level'] = $this->Courses->execute('SELECT name FROM levels WHERE id = :id', array("id" => $courses[$i]['level_id']));
            if($this->Auth->isLogged()){
                $progress = $this->Courses->execute('SELECT state, position FROM userscourses WHERE user_id = :user_id AND course_id = :course_id', array(
                    'user_id' => $this->Auth->user('id'),
                    'course_id' => $courses[$i]['id']
                ));
                $progress = $progress[0];
                $progress['slug'] = $this->Courses->execute('SELECT slug FROM steps WHERE course_id = :course_id AND position = :position', array(
                   'course_id' => $courses[$i]['id'],
                   'position' => $progress['position']
                ));
                $slug = $slug[0]['slug'];
                if($progress['slug'] != null){
                    $courses[$i]['progress'] = $progress;   
                }
                $bookmark = $this->Courses->execute('SELECT course_id FROM bookmarks WHERE user_id = :user_id AND course_id = :course_id', array(
                    'user_id' => $this->Auth->user('id'),
                    'course_id' => $courses[$i]['id']
                ));
                if(!empty($bookmark)) $courses[$i]['bookmark'] = true;
                else $courses[$i]['bookmark'] = false;
            }
        }
        $categories = $this->Courses->execute('SELECT DISTINCT topics.id, topics.name FROM courses, topics WHERE topics.id = topic_id', null);
        $this->set(compact('courses', 'categories', 'subheader'));
        $this->render('index');
    }

    function single($slug){
        $courses = $this->Courses->execute('SELECT * FROM courses WHERE slug = :slug', array("slug"=> $slug));
        $courses = $courses[0];
        $progress = $this->Courses->execute('SELECT state, position FROM userscourses WHERE user_id = :user_id AND course_id = :course_id', array('user_id' => $this->Auth->user('id'), 'course_id' => $courses['id']));
        $progress = $progress[0];
        $progress['slug'] = $this->Courses->execute('SELECT slug FROM steps WHERE course_id = :course_id AND position = :position', array('course_id' => $courses['id'], 'position' => $progress['position']));
        $progress['slug'] = $progress[0]['slug'];
        if($progress['slug'] != null){
            $courses['progress'] = $progress;   
        }
        $courses['topic'] = $this->Courses->execute('SELECT name FROM topics WHERE id = :id', array("id" => $courses['topic_id']));
        $courses['topic'] = $courses['topic'][0];
        $courses['level'] = $this->Courses->execute('SELECT name FROM levels WHERE id = :id', array("id" => $courses['level_id']));
        $courses['level'] = $courses['level'][0];
        $bookmark = $this->Courses->execute('SELECT course_id FROM bookmarks WHERE user_id = :user_id AND course_id = :course_id', array(
            'user_id' => $this->Auth->user('id'),
            'course_id' => $courses['id']
        ));
        if(!empty($bookmark)) $courses['bookmark'] = true;
        else $courses['bookmark'] = false;
        $steps = $this->Courses->execute('SELECT * FROM steps WHERE course_id = :id ORDER BY position', array('id' => $courses['id']));
        for($j = 0; $j < count($steps); $j++){
            if($steps[$j]['type'] == 'quizzes'){
                $steps[$j]['nbr_quizz'] = $this->Courses->execute('SELECT count(intitule) FROM questions WHERE step_id = :step_id', array('step_id'=>$steps[$j]['id']));
                $steps[$j]['nbr_quizz'] = $steps[$j]['nbr_quizz'][0]['count(intitule)'];
            }else if($steps[$j]['type'] == 'videos'){
                $time = $this->Courses->execute('SELECT start, stop FROM videos WHERE step_id = :step_id', array('step_id'=>$steps[$j]['id']));
                $time = $time[0];
                $time = $time['stop'] - $time['start'];
                $steps[$j]['time'] = $time;
            }
        }
        $this->set(compact('courses','steps'));
        $this->render('single');
    }
 

}