<?php

if (file_exists(ROOT.'/models/Comment.php'))
    include_once(ROOT.'/models/Comment.php');

class commentController {
    
    public function actionIndex() {

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            
            $result = Comment::saveComment($_POST);
            
          // если метод POST редирект на себя чтобы не было даблпоста
            header('Location: /product/view/'.$_POST['id']);
        }
        
        return true;
    }
}
