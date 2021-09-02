<?php /** @var array $user */ ?>
<?= $this->extend('layouts/default'); ?>

<?= $this->section('title'); ?>My profile<?= $this->endSection(); ?>

<?= $this->section('header-title'); ?>My profile<?= $this->endSection(); ?>

<?= $this->section('content'); ?>

<?php if ( current_user()->profile_image ): ?>
	<img src="<?= site_url('/profile/avatar'); ?>" height="200" width="200" alt="Profile image">
<?php else: ?>
	<img src="<?= site_url('/images/blank_avatar.png'); ?>" height="200" width="200" alt="Profile image">
<?php endif; ?>
<a href="<?= site_url('/profile/image') ?>">Update image</a>
<a href="<?= site_url('/profile/deleteimage') ?>">Delete image</a>

	<dl>
		<dt>Email</dt>
		<dd><?= esc($user->email); ?></dd>

		<dt>Name</dt>
		<dd><?= esc($user->name); ?></dd>

		<dt>Last name</dt>
		<dd><?= esc($user->last_name); ?></dd>
	</dl>

	<h2>Update information:</h2>

	<?= form_open('/profile/update/'.$user->id, ['class' => 'update-profile']) ?>

		<div>
			<?= form_label( 'Email', 'email' ); ?>
			<?= form_input('email', esc($user->email), ['id' => 'email'], 'email'); ?>
		</div>

		<div>
			<?= form_label( 'Name', 'name' ); ?>
			<?= form_input('name', esc($user->name), ['id' => 'name']); ?>
		</div>

		<div>
			<?= form_label( 'Last name', 'last_name' ); ?>
			<?= form_input('last_name', esc($user->last_name) ?? '', ['id' => 'last_name']); ?>
		</div>

		<div>
			<?= form_submit('save', 'Save'); ?>
		</div>

	<?= form_close(); ?>

	<h2>Update your password:</h2>

	<?= form_open('/profile/updatepassword/'.$user->id, ['class' => 'update-password-form']) ?>

		<div>
			<?= form_label('Current password', 'curr_pass'); ?>
			<?= form_input('curr_pass', extra:['id' => 'curr_pass'], type:'password'); ?>
		</div>

		<div>
			<?= form_label('New password', 'password'); ?>
			<?= form_input('password', extra:['id' => 'password'], type:'password'); ?>
		</div>

		<div>
			<?= form_label('Confirm password', 'pass_confirm'); ?>
			<?= form_input('pass_confirm', extra:['id' => 'pass_confirm'], type:'password'); ?>
		</div>

		<div>
			<?= form_submit('save', 'Save'); ?>
		</div>

	<?= form_close(); ?>

<?= $this->endSection(); ?>