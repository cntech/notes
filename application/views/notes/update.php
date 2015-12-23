<h2>Edit Note</h2>

<div>
  <?php echo validation_errors(); ?>
</div>

<div>
  <?php echo form_open('notes/update/'.$note['slug']); ?>
  
  <div>
    <label for="slug">URL ending</label>
    <input type="text" name="slug" value="<?php echo $note['slug']; ?>">
  </div>
  
  <div>
    <label for="title">Title</label>
    <input type="text" name="title" value="<?php echo $note['title']; ?>">
  </div>
  
  <div>
    <label for="text">Text</label>
    <textarea name="text"><?php echo $note['text']; ?></textarea>
  </div>
  
  <input type="submit" name="submit" value="Save Note">
  
</div>
