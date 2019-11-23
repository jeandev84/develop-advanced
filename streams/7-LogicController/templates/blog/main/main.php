<?php include __DIR__.'/../partials/header.php'; ?>
<?php foreach ($articles as $article): ?>
  <h2>
      <a href="/articles/<?= $article['id'] ?>">
          <?= $article['name'] ?>
      </a>
  </h2>
  <p><?= $article['text'] ?></p>
  <hr>
<?php endforeach; ?>
<?php include __DIR__.'/../partials/footer.php'; ?>
