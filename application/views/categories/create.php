<h2><?= $title; ?></h2>

<?php echo validation_errors (); ?>

<?php echo form_open_multipart('categories/create'); ?>
	<div class="form-group">
		<label for="">Name</label>
		<input type="text" name="name" class="form-control" placeholder="Enter Name">
	</div>
	<button type="submit" class="btn btn-outline-primary">Submit</button>
</form>