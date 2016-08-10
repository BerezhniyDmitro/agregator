<?php


/**
 * Description of Product
 * Тут будем получать с Бд один товар, или все товары которые есть.
 * И добавлять товар 
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
        
        $result = $db->query('SELECT id, title, preview_image, date, name_author'
                .' FROM product ');
        
        $i = 0;
        while ($row = $result->fetch()) {
            $productList[$i]['id'] = $row['id'];
            $productList[$i]['title'] = $row['title'];
            $productList[$i]['preview_image'] = $row['preview_image'];
            $productList[$i]['date'] = $row['date'];
            $productList[$i]['name_author'] = $row['name_author'];
            $i++;
        }
        
        return $productList;
    }

    /*
     * добавление товара 
     */
    
    public static function saveProduct($data) {
        
        $db = Db::getConnection();

        // переменные для вставки в БД 
        $title = isset($data['title']) ? $data['title'] : '';
        $preview_image = isset($data['image']) ? $data['image'] : '';
        $price = isset($data['price']) ? $data['price'] : '';
        $name_author = isset($data['nameAuthor']) ? $data['nameAuthor'] : '';
            
        // подготовка строки 
        $stmt = $db->prepare('INSERT INTO product (title, preview_image, name_author, price)'
                    .'VALUES (:title, :preview_image, :name_author, :price)');
        // запрос
        $stmt->execute(array(':title' => $title, ':preview_image' => $preview_image,
                ':name_author' => $name_author, ':price' => $price));       
    }

    public static function getSortProductList($data) {

        $db = Db::getConnection();
        
        // определяю переменные запроса 
        $field;
        $predicat;
        
        if (isset($data['title'])) {
            $field = 'title';
            $predicat = $data['title'];
        }
        if (isset($data['date'])) {
            $field = 'date';
            $predicat = $data['date'];
        }
        if (isset($data['author'])) {
            $field = 'name_author';
            $predicat = $data['author'];
        }
        
        $productList = array();

        $result = $db->query('SELECT id, title, preview_image, date, name_author'
                .' FROM product '
                .' ORDER BY '. $field .' '. $predicat);

        $i = 0;
        while ($row = $result->fetch()) {
            $productList[$i]['id'] = $row['id'];
            $productList[$i]['title'] = $row['title'];
            $productList[$i]['preview_image'] = $row['preview_image'];
            $productList[$i]['date'] = $row['date'];
            $productList[$i]['name_author'] = $row['name_author'];

            $i++;
        }
        
        return $productList;

    }
}
