<?= $this->extend('layouts/default'); ?>

<?= $this->section('title'); ?>
Home
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>

<h1>CodeIgniter project home</h1>

<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque rutrum, nibh quis pharetra dapibus, elit urna tincidunt quam, non malesuada tellus sapien ut urna</p>

<?php if ( current_user() ): ?>
	<p>Welcome <?= esc(current_user()->name) ?>!</p>
	<p><a href="<?= site_url('/tasks') ?>" class="go-to-tasks">See tasks</a></p>
	<p><a href="<?= site_url('/logout') ?>" class="logout">Log out</a></p>
<?php else: ?>
	<p> You are not logged in!</p>
	<p><a href="<?= site_url('/signup') ?>" class="go-to-signup">Create an account</a> &middot; <a href="<?= site_url('/login') ?>" class="go-to-login">Log in</a></p>
<?php endif; ?>

<?= $this->endSection(); ?>