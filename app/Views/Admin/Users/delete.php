<?php /** @var array $user */ ?>
<?= $this->extend('layouts/default'); ?>

<?= $this->section('title'); ?>Delete user <?= $user->id; ?><?= $this->endSection(); ?>

<?= $this->section('header-title'); ?>Delete user: <?= $user->id; ?><?= $this->endSection(); ?>

<?= $this->section('content'); ?>

	<p>Are you sure you want to delete this user?: <?= esc($user->name); ?></p>

	<?= form_open('/admin/users/delete/'.$user->id, 'delete-form') ?>

	<?= form_submit('confirmation', 'Yes'); ?>
	<a href="<?= site_url('/admin/users/show/'.$user->id) ?>" class="cancel">Cancel</a>

	<?= form_close(); ?>

<?= $this->endSection(); ?>