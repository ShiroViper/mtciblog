

<?php echo validation_errors(); ?>

<?php echo form_open(); ?>
<div class="row pb-3">
	<div class="col-md-4 offset-md-4">
		<h2><?= $title; ?></h2>
		<div class="form-group">
		<label for="">Name</label>
		<input type="text" class="form-control" name="name">
	</div>
	<div class="form-group">
		<label for="">Zipcode</label>
		<input type="text" class="form-control" name="zipcode">
	</div>
	<div class="form-group">
		<label for="">Email</label>
		<input type="text" class="form-control" name="email">
	</div>
	<div class="form-group">
		<label for="">Username</label>
		<input type="text" class="form-control" name="username">
	</div>
	<div class="form-group">
		<label for="">Password</label>
		<input type="password" class="form-control" name="password">
	</div>
	<div class="form-group">
		<label for="">Confirm Password</label>
		<input type="password" class="form-control" name="password2">
	</div>
	<button type="submit" class="btn btn-outline-primary btn-block">Submit</button>
	</div>
</div>
<!-- </form> -->
<?php echo form_close(); ?>