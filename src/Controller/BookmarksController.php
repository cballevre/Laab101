<?php

namespace App\Controller;

use App\Controller\AppController;

class BookmarksController extends AppController
{
    
    public function __construct() {
        parent::__construct();
    }
    
    public function add($id) {
        $this->Bookmarks->save(array(
            'user_id' => $_SESSION['user']['id'],
            'course_id' => $id,
        ));
        $this->redirect('\courses\\');
    }
    
    public function remove($id) {
        $this->Bookmarks->execute('DELETE FROM bookmarks WHERE user_id = :user_id AND course_id = :course_id',array(
            'user_id' => $_SESSION['user']['id'],
            'course_id' => $id,
        ));
        $this->redirect('\courses\\');
    }

}