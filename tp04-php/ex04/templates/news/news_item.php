<?= '<section id="news"><article>' ?>

<?php
  echo '<header><h1><a href="news_item.php?id=' . $article['id'] . '">' . $article['title'] . '</a></h1></header>';
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
?>
  <?php
  if (isset($_SESSION['username'])) {
    echo '<a href="edit_news.php?id=' . $article['id'] . '">Edit Article</a>';
  } ?>

<?= '</section><article></section>' ?>
