<h2>Create a new Note</h2>

<div>
  <?php echo validation_errors(); ?>
</div>

<div>
  <?php echo form_open('notes/create', array('class' => 'uk-form uk-form-horizontal')); ?>
  
  <div class="uk-form-row">
    <label class="uk-form-label" for="slug">URL ending</label>
    <div class="uk-form-controls">
      <input type="text" name="slug">
    </div>
  </div>
  
  <div class="uk-form-row">
    <label class="uk-form-label" for="title">Title</label>
    <div class="uk-form-controls">
      <input type="text" name="title" value="<?php echo $note['title']; ?>">
    </div>
  </div>
  
  <div class="uk-form-row">
    <label class="uk-form-label" for="text">Text</label>
    <div class="uk-form-controls">
      <textarea name="text"><?php echo $note['text']; ?></textarea>
    </div>
  </div>
  
  <div class="uk-form-row">
    <div class="uk-form-controls">
      <button type="submit" class="uk-button uk-button-primary">Save Note</button>
    </div>
  </div>
  
  </form>
  
</div>

