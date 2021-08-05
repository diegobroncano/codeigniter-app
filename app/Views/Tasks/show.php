<?php /** @var array $task */ ?>
<?= $this->extend('layouts/default'); ?>

<?= $this->section('title'); ?><?= esc($task['description']); ?><?= $this->endSection(); ?>

<?= $this->section('header-title'); ?><?= esc($task['description']); ?><?= $this->endSection(); ?>

<?= $this->section('content'); ?>

	<a href="<?= site_url('/tasks'); ?>">&laquo; Back</a>

	<dl>
		<dt>ID</dt>
		<dd><?= $task['id']; ?></dd>

		<dt>Description</dt>
		<dd><?= esc($task['description']); ?></dd>

		<dt>Created at</dt>
		<dd><?= $task['created_at']; ?></dd>

		<dt>Updated at</dt>
		<dd><?= $task['updated_at']; ?></dd>
	</dl>

<?= $this->endSection(); ?>