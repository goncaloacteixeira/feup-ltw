<?php
  $id = $_GET['id'];
  $title = $_GET['title'];
  $introduction = $_GET['introduction'];
  $fulltext = $_GET['fulltext'];

  include_once('database/connection.php');
  include_once('database/news.php');

  updateArticle($id, $title, $introduction, $fulltext);

  header('Location: ' . 'news_item.php?id=' . $id);
?>