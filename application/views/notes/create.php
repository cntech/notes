<h2>Create a new Note</h2>

<div>
  <?php echo validation_errors(); ?>
</div>

<div>
  <?php echo form_open('notes/create'); ?>
  
  <div>
    <label for="slug">URL ending</label>
    <input type="text" name="slug">
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
