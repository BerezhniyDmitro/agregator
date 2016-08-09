<?php


/**
 * Description of Product
 * Тут будем получать с Бд один товар, или все товары которые есть.
 * @author Dmitriy
 */
class Product {
    
    /*
     * возврат одного товара
     */
    public static function getProductItemById($id) {
            // запрос к бд 
        $id = intval($id);
        
        if($id) {
            $db = Db::getConnection();
            
            $result = $db->query('SELECT * FROM product WHERE id=' . $id);
            
            $result->setFetchMode(PDO::FETCH_ASSOC);
            
            $productItem = $result->fetch();
            
            return $productItem;
        }
    }
    
    /*
     * возврат всех товаров в БД
     */
    public static function getProductList() {
            // запрос к бд 
        $db = Db::getConnection();
        
        $productList = array();
        
        $result = $db->query('SELECT id, title, preview_image, date, name_author, count_reviews'
                .' FROM product '
                .' ORDER BY date DESC ');
        
        $i = 0;
        while ($row = $result->fetch()) {
            $productList[$i]['id'] = 'product/view/'.$row['id'];
            $productList[$i]['title'] = $row['title'];
            $productList[$i]['preview_image'] = $row['preview_image'];
            $productList[$i]['date'] = $row['date'];
            $productList[$i]['name_author'] = $row['name_author'];
            $productList[$i]['count_reviews'] = $row['count_reviews'];
            $i++;
        }
        
        return $productList;
    }

    /*
     * возврат всех товаров для (главной)
     */
}
