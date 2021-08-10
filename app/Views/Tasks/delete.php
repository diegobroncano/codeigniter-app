<?php /** @var array $task */ ?>
<?= $this->extend('layouts/default'); ?>

<?= $this->section('title'); ?>Delete task <?= $task->id; ?><?= $this->endSection(); ?>

<?= $this->section('header-title'); ?>Delete task: <?= $task->id; ?><?= $this->endSection(); ?>

<?= $this->section('content'); ?>

	<p>Are you sure you want to delete this task?: <?= $task->description ?></p>

	<?= form_open('/tasks/delete/'.$task->id, 'delete-form') ?>

	<?= form_submit('confirmation', 'Yes'); ?>
	<a href="<?= site_url('/tasks/show/'.$task->id) ?>" class="cancel">Cancel</a>

	<?= form_close(); ?>

<?= $this->endSection(); ?>