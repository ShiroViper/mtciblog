<h2><?php echo $post['title']; ?></h2>
<small class="post-date">Posted on: <?php echo $post['created_at']; ?>  in <strong><?php echo $post['name']; ?></strong></small><br>
<img src="<?php echo site_url(); ?>assets/images/posts/<?php echo $post['post_image']; ?>" class="" height="200" alt="">	
<div class="post-body">
	<?php echo $post['body']; ?>
</div>

<?php if($this->session->userdata('user_id') === $post['user_id']): ?>
	<hr>
	<a href="edit/<?php echo $post['slug']; ?>" class="btn btn-outline-primary float-left mr-2">Edit</a>
	<?php echo form_open('/posts/delete/'.$post['id']) ?>
	<input type="submit" value="delete" class="btn btn-outline-danger">
<?php endif; ?>

</form>
<hr>
<!-- <?php print_r($comments); ?> -->
<h3>Comments</h3>
	<?php if ($comments) : ?>		
		<?php foreach($comments as $comment): ?>
			<div class="card card-title bg-light">
				<h5><?php echo $comment['body']; ?>  [by <strong><?php echo $comment['name']; ?> </strong>] </h5>
			</div>
		<?php endforeach; ?>
	<?php else : ?>
		<p>No Comments To Display</p>
	<?php endif; ?>


<hr>
<h3>Add comment</h3>
<?php echo validation_errors(); ?>
<?php echo form_open('comments/create/'.$post['id']); ?>
	<div class="form-group">
		<label for="">Name</label>
		<input type="text" name="name" class="form-control">
	</div>
	<div class="form-group">
		<label for="">Email</label>
		<input type="text" name="email" class="form-control">
	</div>
	<div class="form-group">
		<label for="">Body</label>
		<textarea name="body" id="" class="form-control" cols="3" rows="2"></textarea>
	</div>
	<input type="hidden" name="slug" value="<?php echo $post['slug']; ?>">
	<button type="submit" class="btn btn-outline-primary">Submit</button>
</form>