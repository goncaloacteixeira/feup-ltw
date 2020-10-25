<?php 
  $db = new PDO('sqlite:news.db');
  $stmt = $db->prepare('SELECT * FROM news JOIN users USING (username) WHERE id = :id');
  $stmt->bindParam(':id', $_GET['id'], PDO::PARAM_INT);
  $stmt->execute();
  $article = $stmt->fetch();

  $stmt = $db->prepare('SELECT * FROM comments JOIN users USING (username) WHERE news_id = ?');
  $stmt->execute(array($_GET['id']));
  $comments = $stmt->fetchAll();

  echo '<header><h1><a href="item.html?id= ' . $article['id'] . '">' . $article['title'] . '</a></h1></header>';
  echo '<img src="https://www.bookdesignmadesimple.com/wp-content/uploads/2015/08/iStock_3357562_600x300.jpg" alt="">';
  echo '<p>' . $article['introduction'] . '</p>';
  echo '<p>' . $article['fulltext'] . '</p>';

  echo '<section id="comments">';
  echo '<h1>' . sizeof($comments) . ' Comments</h1>';

  foreach ($comments as $comment) {
    echo '<article class="comment">';
    echo '<span class="user">' . $comment['username'] . '</span>';
    echo '<span class="date">' . date("Y-m-d H:i", substr($comment['published'], 0, 10)) . '</span>';
    echo '<p>' . $comment['text'] . '</p>';     
    echo '</article>';
  }

  echo '</section>';
?>