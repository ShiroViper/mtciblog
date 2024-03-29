<h2><?= $title;?></h2>

<?php
	echo validation_errors();
 ?>

<?php echo form_open('posts/update');?>
  <input type="hidden" name="id" value="<?php echo $post['id']; ?>">
  <div class="form-group">
    <label >Title</label>
    <input type="text" class="form-control" name="title" placeholder="Add Title" value="<?php echo $post['title'] ?>">
  </div>
  <div class="form-group">
    <label >Body</label>
    <textarea name="body" id="editor1" cols="30" rows="10"> <?php echo $post['body'] ?></textarea>
  </div>
  <div class="form-group">
    <label for="">Categories</label>
    <select name="category_id" id="" class="form-control">
      <?php foreach($categories as $category): ?>
        <option value="<?php echo $category['id']; ?>"><?php echo $category['name']; ?></option>
      <?php endforeach; ?>
    </select>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>