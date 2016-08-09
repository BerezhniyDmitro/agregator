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
//        echo 'actionIndex в mainController (Главная)<br>';
        
        $productList = array();
        $productList = Product::getProductList();
        
        require_once ROOT.'/views/index.php';
        
        return true;
    }
}
