<?php

/**
 * Description of testController
 *
 * @author Dmitriy
 */
//Подключаю модель товаров для выборки всех товаров 
if (file_exists(ROOT.'/models/Product.php'))
    include_once(ROOT.'/models/Product.php');

class mainController {
    
    public function actionIndex() {
    
        $productList = array();
        $productList = Product::getProductList();
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            
          $productList = Product::getSortProductList($_POST); // добавить фильтрацию 
          //
          // если метод POST редирект на себя чтобы не было даблпоста
//          header('Location: /');
        }
        
        require_once ROOT.'/views/index.php';
        
        return true;
    }
}
