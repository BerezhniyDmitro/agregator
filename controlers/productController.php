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


class productController {
    
    public function actionIndex() {
        echo '<br>actionIndex в productController ура';
//        echo ROOT.'/models/Product.php';
        return true;
    }
    
    /*
     * Метод для показа одного товара 
     */
    public function actionView($id) {
//        echo "<br>Просмотр одного товара";
//        echo "<br>".$id;  
        
        if ($id) {
            $productItem = Product::getProductItemById($id);
            
//            echo '<pre>';
//            print_r($productItem);
//            echo '<pre>';
            require_once ROOT.'/views/reviews.php';
            
//            echo 'actionView';
        }
        return true;
    }
    /*
     * метод обработки формы добавления товара
     */
    public function actionAdd() {
        echo 'productController actionAdd ';
        return true;
    }
}
