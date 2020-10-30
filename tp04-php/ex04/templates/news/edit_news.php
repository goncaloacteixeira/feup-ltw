<section id="edit-news">
  <form action="action_edit_news.php" method="GET">
    <input type="hidden" name="id" value="<?= $article['id'] ?>">
    <label for="edit-title">Title</label>
    <input type="text" id="edit-title" name="title" value="<?= $article['title']?>">
    <label for="edit-introduction">Introduction</label>
    <textarea id="edit-introduction" name="introduction"><?= $article['introduction']?></textarea>
    <label for="edit-fulltext">Full Text</label>
    <textarea id="edit-fulltext" name="fulltext"><?= $article['fulltext']?></textarea>
    <input type="submit">
  </form>
</section>