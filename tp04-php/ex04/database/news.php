<?php 
  include_once('connection.php');
  function getAllNews()
  {
    global $db;
    $stmt = $db->prepare('SELECT news.*, users.*, COUNT(comments.id) AS comments
    FROM news JOIN
        users USING (username) LEFT JOIN
        comments ON comments.news_id = news.id
    GROUP BY news.id, users.username
    ORDER BY published DESC');
    $stmt->execute();
    return $stmt->fetchAll();
  }

  function getArticle(int $id){
    global $db;
    $stmt = $db->prepare('SELECT * FROM news JOIN users USING (username) WHERE id = :id');
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $article = $stmt->fetch();
    return $article;
  }

    function console_log( $data ){
      echo '<script>';
      echo 'console.log('. json_encode( $data ) .')';
      echo '</script>';
    }

  function updateArticle(int $id, $title, $introduction, $fulltext) {
    global $db;
    $stmt = $db->prepare('UPDATE news
      SET title = :title,
      introduction = :introduction,
      fulltext = :fulltext
      WHERE id = :id');
    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':title', $title);
    $stmt->bindParam(':introduction', $introduction);
    $stmt->bindParam(':fulltext', $fulltext);
    console_log("updated");
    $stmt->execute();

    return $id;
  }
?>