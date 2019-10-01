<?php echo form_open('users/login'); ?>
	<div class="row justify-content-center">
		<div class="col-md-4">
			<h1 class="text-center"><?php echo $title; ?></h1>
			<div class="form-group">
				<label for=""></label>
				<input type="text" name="username" class="form-control" placeholder="Username" required autofocus>
			</div>
			<div class="form-group">
				<label for=""></label>
				<input type="password" name="password" class="form-control" placeholder="Password" required autofocus>
			</div>
			<button class="btn btn-outline-primary btn-block" type="submit">Log in</button>
		</div>
	</div>
<?php echo form_close(); ?>