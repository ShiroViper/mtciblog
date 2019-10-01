<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>CIBlog</title>
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css">
	<!-- <link rel="stylesheet" href="https://bootswatch.com/4/flatly/bootstrap.min.css"> -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/custom.css">
</head>
<body>
	<div class="container">
		<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		  <a class="navbar-brand" href="#">Navbar</a>
		  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
		    <span class="navbar-toggler-icon"></span>
		  </button>

		  <div class="collapse navbar-collapse" id="navbarColor02">
		    <ul class="navbar-nav mr-auto">
		      <li class="nav-item active">
		        <a class="nav-link" href="<?php echo base_url(); ?>">Home <span class="sr-only">(current)</span></a>
		      </li>
		      <li class="nav-item">
		        <a class="nav-link" href="<?php echo base_url(); ?>about">About</a>
		      </li>
		      <li class="nav-item">
		        <a class="nav-link" href="<?php echo base_url(); ?>posts">Blog</a>
		      </li>
		      <li class="nav-item">
		        <a class="nav-link" href="#">About</a>
		      </li>
		      <li class="nav-item">
		        <a class="nav-link" href="<?php echo base_url(); ?>categories">Categories</a>
		      </li>
		    </ul>
		    <ul class="nav navbar-nav navbar-right">
		    	<?php if(!$this->session->userdata('logged_in')): ?>
			      <li class="nav-item">
			        <a class="nav-link" href="<?php echo base_url(); ?>users/login">Login</a>
			      </li>
			      <li class="nav-item">
			        <a class="nav-link" href="<?php echo base_url(); ?>users/register">Register</a>
			      </li>
			  <?php endif; ?>

			  <?php if($this->session->userdata('logged_in')): ?>
			      <li class="nav-item">
			        <a class="nav-link" href="<?php echo base_url(); ?>posts/create">Create Post</a>
			      </li>
			      <li class="nav-item">
			        <a class="nav-link" href="<?php echo base_url(); ?>categories/create">Create Category</a>
			      </li>
			      <li class="nav-item">
			        <a class="nav-link" href="<?php echo base_url(); ?>users/logout">Logout</a>
			      </li>
			  <?php endif; ?>
		    </ul>
		   <!--  <form class="form-inline my-2 my-lg-0">
		      <input class="form-control mr-sm-2" type="text" placeholder="Search">
		      <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
		    </form> -->
		  </div>
		</nav>

<div class="container">
	<!-- Flash message -->
	<?php if($this->session->flashdata('user_registered')): ?>
		<p class="alert alert-success"><?php echo $this->session->flashdata('user_registered'); ?></p>
	<?php endif; ?>
	<!-- Flash message -->
	<?php if($this->session->flashdata('post_created')): ?>
		<p class="alert alert-success"><?php echo $this->session->flashdata('post_created'); ?></p>
	<?php endif; ?>
	<!-- Flash message -->
	<?php if($this->session->flashdata('post_updated')): ?>
		<p class="alert alert-success"><?php echo $this->session->flashdata('post_updated'); ?></p>
	<?php endif; ?>
	<!-- Flash message -->
	<?php if($this->session->flashdata('category_created')): ?>
		<p class="alert alert-success"><?php echo $this->session->flashdata('category_created'); ?></p>
	<?php endif; ?>
	<!-- Flash message -->
	<?php if($this->session->flashdata('post_deleted')): ?>
		<p class="alert alert-success"><?php echo $this->session->flashdata('post_deleted'); ?></p>
	<?php endif; ?>

	<?php if($this->session->flashdata('login_failed')): ?>
		<p class="alert alert-danger"><?php echo $this->session->flashdata('login_failed'); ?></p>
	<?php endif; ?>


	<?php if($this->session->flashdata('user_logged_in')): ?>
		<p class="alert alert-success"><?php echo $this->session->flashdata('user_logged_in'); ?></p>
	<?php endif; ?>

	<?php if($this->session->flashdata('user_loggedout')): ?>
		<p class="alert alert-success"><?php echo $this->session->flashdata('user_loggedout'); ?></p>
	<?php endif; ?>

	<?php if($this->session->flashdata('category_deleted')): ?>
		<p class="alert alert-success"><?php echo $this->session->flashdata('category_deleted'); ?></p>
	<?php endif; ?>
