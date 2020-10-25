<?php
  $db = new PDO('sqlite:news.db');
  $stmt = $db->prepare('SELECT news.*, users.*, COUNT(comments.id) AS comments
  FROM news JOIN
       users USING (username) LEFT JOIN
       comments ON comments.news_id = news.id
  GROUP BY news.id, users.username
  ORDER BY published DESC');
  $stmt->execute();
  $articles = $stmt->fetchAll();
  foreach( $articles as $article) {
    echo '<header><h1><a href=item.html?id=' . $article["id"] . '>' . $article['title'] . '</a></h1></header>';
    echo '<img src="https://www.bookdesignmadesimple.com/wp-content/uploads/2015/08/iStock_3357562_600x300.jpg" alt="">';
    echo '<p>' . $article['introduction'] . '</p>';
    echo '<p>' . $article['fulltext'] . '</p>';
    echo '<footer>';
    echo '<span class="author">' . $article["name"] . '</span>';
    echo '<span class="tags"><a href="index.html">' . $article['tags'] . '</a></span>';
    echo '<span class="date">' . date("Y-m-d H:i:s", substr($article['published'], 0, 10)) . '</span>';
    echo '</footer>';
  }
?>