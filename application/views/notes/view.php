<h2><?php echo $note['title']; ?></h2>
<p><?php echo $note['text']; ?></p>
<p>
  <a href="<?php echo site_url('notes/update/'.$note['slug']); ?>">Edit</a>
  <a href="<?php echo site_url('notes/delete/'.$note['slug']); ?>">Delete</a>
</p>