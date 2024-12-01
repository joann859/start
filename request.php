<?php

class Request
{
    public static function DP()
	{
		$db = db::getConnection();
        $sql = 'DROP TABLE IF EXISTS allposts.posts, allcomments.comments';
        $result = $db->prepare($sql);
		if ($result->execute()) {
        } 
        return 0;  
	}

    public static function CreateDB()
	{
		$db = db::getConnection();
        $sql = 'CREATE DATABASE IF NOT EXISTS allposts; CREATE DATABASE IF NOT EXISTS allcomments';
        $result = $db->prepare($sql);
		if ($result->execute()) { 
        } 
        return 0;  
	}

    public static function CreateTBL()
	{
		$db = db::getConnection();
        $sql = 'CREATE TABLE IF NOT EXISTS allposts.posts (userId INT, id INT, title TEXT, body TEXT); CREATE TABLE IF NOT EXISTS allcomments.comments (postId INT, id INT, name TEXT, email VARCHAR(50), body TEXT); ';
        $result = $db->prepare($sql);
		if ($result->execute()) {           
        } 
        return 0;  
	}
    
    public static function DumpDataPosts($arrayPosts)
	{
		$db = db::getConnection();

		foreach ($arrayPosts as $row) {
        $sql = 'INSERT INTO allposts.posts'
                . '(userId, id, title, body)'
                . 'VALUES '
                . '(:userId, :id, :title, :body)';

        // Получение и возврат результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':userId', $row['userId'], PDO::PARAM_INT);
        $result->bindParam(':id', $row['id'], PDO::PARAM_INT);
        $result->bindParam(':title', $row['title'], PDO::PARAM_STR);
        $result->bindParam(':body', $row['body'], PDO::PARAM_STR);
        $result->execute();
        }
    }
    
    public static function DumpDataComments($arrayComments)
	{
		$db = db::getConnection();

		foreach ($arrayComments as $row) {
        $sql = 'INSERT INTO allcomments.comments'
                . '(postId, id, name, email, body)'
                . 'VALUES '
                . '(:postId, :id, :name, :email, :body)';

        // Получение и возврат результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':postId', $row['postId'], PDO::PARAM_INT);
        $result->bindParam(':id', $row['id'], PDO::PARAM_INT);
        $result->bindParam(':name', $row['name'], PDO::PARAM_STR);
        $result->bindParam(':email', $row['email'], PDO::PARAM_STR);
        $result->bindParam(':body', $row['body'], PDO::PARAM_STR);
        $result->execute();
        }
    }

    public static function Search($options){

    	$db = db::getConnection();
    	$searchList = array();
         //SQL запрос в бд
        $result = $db->query("SELECT allposts.posts.title, allcomments.comments.name, allcomments.comments.body, allcomments.comments.email FROM allposts.posts INNER JOIN allcomments.comments ON allposts.posts.id = allcomments.comments.postId WHERE comments.body LIKE '%$options%' "); 
        $i = 0;
        while ($row = $result->fetch()) {
            $searchList[$i]['title'] = $row['title'];
            $searchList[$i]['name'] = $row['name'];
            $searchList[$i]['body'] = $row['body'];
            $searchList[$i]['email'] = $row['email'];

            $i++;
        }

        return $searchList;
    
    }
    
}
