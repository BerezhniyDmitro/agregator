<?php

/**
 * Description of Comment
 * 
 * @author Dmitriy
 */
class Comment {
    
     /*
     * добавление коммента
     */
    
    public static function saveComment($data) {
        
            $db = Db::getConnection();
           
//            // переменные для вставки в БД 
            $author = isset($data['author']) ? $data['author'] : '';
            $value = isset($data['value']) ? $data['value'] : '';
            $review = isset($data['review']) ? $data['review'] : '';
            $id = isset($data['id']) ? $data['id'] : '';
            
            // подготовка строки 
            $stmt = $db->prepare('INSERT INTO comment (value, name_author, comment, id_product)'
                    .'VALUES (:value, :name_author, :comment, :id_product)');
            // запрос
            $stmt->execute(array(':value' => $value, ':name_author' => $author,
                ':comment' => $review, ':id_product' => $id));
           
    }
    
    /*
     * получение всех комментов по определенному товару
     */
    
    public static function getCommentListById($id) {

        $id = intval($id);
        
        if($id) {
            $db = Db::getConnection();
                    
            $commentList = array();

            $result = $db->query('SELECT name_author, comment, date, value'
                .' FROM comment '
                .' WHERE id_product=' . $id);
            
            $i = 0;
            while ($row = $result->fetch()) {
                $commentList[$i]['name_author'] = $row['name_author'];
                $commentList[$i]['comment'] = $row['comment'];
                $commentList[$i]['date'] = $row['date'];
                $commentList[$i]['value'] = $row['value'];
                $i++;
            }

            return $commentList;
        }
    }
    // метод получения средней оценки 

    public static function getAvgValue($id) {

        $id = intval($id);

        if($id) {
            $db = Db::getConnection();

            $result = $db->query('SELECT AVG(value) FROM comment WHERE id_product=' . $id);

            $result->setFetchMode(PDO::FETCH_ASSOC);
            
            $avg = $result->fetchColumn();
        }

        return $avg;
    }     

}
