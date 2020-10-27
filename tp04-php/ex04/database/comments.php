<?php 
  include_once('connection.php');
  function getAllComments($id) 
  {
    global $db;
    $stmt = $db->prepare('SELECT * FROM comments JOIN users USING (username) WHERE news_id = ?');
    $stmt->execute(array($id));
    $comments = $stmt->fetchAll();
    return $comments;
  }
?>