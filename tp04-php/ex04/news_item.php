<?php
  session_start();
  include_once('database/connection.php');
  include_once('database/comments.php');
  include_once('database/news.php');

  $article = getArticle($_GET['id']);
  $comments = getAllComments($_GET['id']);

  include('templates/common/header.php');
  include('templates/news/news_item.php');
  include('templates/common/footer.php');
?>