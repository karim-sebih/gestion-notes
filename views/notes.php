<ul>
  <?php foreach ($notes as $note): ?>
    <li>
      <strong><?= htmlspecialchars($note['title']) ?></strong>  
      <p>
	<div id="rendered"></div>
	<script>
	    // `contentFromDB` = variable PHP échappée en JSON
	    var raw = <?= json_encode($note['content'] ?? "") ?>;
	    var html = marked.parse(raw);
	    document.getElementById('rendered').innerHTML = DOMPurify.sanitize(html);
	</script>
</p>
      <small><?= $note['created_at'] ?></small>
      <a href="index.php?delete=<?= $note['id'] ?>">❌ Supprimer</a>
    </li>
  <?php endforeach; ?>
</ul>