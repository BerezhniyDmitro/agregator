<?php

/**
 * Description of newController
 * Данный клас будет реализовывать логику обработку страницы добавления товара
 *  и показа товара 
 * @author Dmitriy
 */

//Подключаю модель 
if (file_exists(ROOT.'/models/Product.php'))
    include_once(ROOT.'/models/Product.php');

if (file_exists(ROOT.'/models/Comment.php'))
    include_once(ROOT.'/models/Comment.php');

class productController {
    
    public function actionIndex() {
        // обработка формы 
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        
          $result = Product::saveProduct($_POST);
          // если метод POST редирект на себя чтобы не было даблпоста
          header('Location:./product');
        }
        require_once ROOT.'/views/product.php';
        return true;
    }
    
    /*
     * Метод для показа одного товара 
     */
    public function actionView($id) {

        if ($id) {
            $productItem = Product::getProductItemById($id);
        
            $commentList = array();
            $commentList = Comment::getCommentListById($id);

            $avg = Comment::getAvgValue($id);

            if (!isset($avg))
              $avg = " пока нет";

            require_once ROOT.'/views/reviews.php';
        }
        return true;
    }
    
}
