<h2>My Notes</h2>

<p><a href="<?php echo site_url('notes/create') ?>">New Note</a></p>

<?php foreach($notes as $note): ?>
  
  <div class="uk-panel uk-panel-box uk-margin-top">
    <h3><?php echo $note['title']; ?></h3>
    <p><?php echo $note['text']; ?></p>
    <p><a href="<?php echo site_url('notes/'.$note['slug']); ?>">View/Change</a></p>
  </div>
  
<?php endforeach; ?>

