<?php /** @var array $task */ ?>
<?= $this->extend('layouts/default'); ?>

<?= $this->section('title'); ?><?= $task->description; ?><?= $this->endSection(); ?>

<?= $this->section('header-title'); ?><?= $task->description; ?><?= $this->endSection(); ?>

<?= $this->section('content'); ?>

	<a href="<?= site_url('/tasks'); ?>">&laquo; Back</a>

	<dl>
		<dt>ID</dt>
		<dd><?= $task->id; ?></dd>

		<dt>Description</dt>
		<dd><?= $task->description; ?></dd>

		<dt>Created at</dt>
		<dd><?= $task->created_at; ?></dd>

		<dt>Updated at</dt>
		<dd><?= $task->updated_at; ?></dd>
	</dl>

	<a href="<?= site_url('/tasks/delete/'.$task->id) ?>" class="delete-link">Delete</a>

	<h2>Update task: </h2>

	<?= form_open('/tasks/update/'.$task->id) ?>

		<?= $this->include('partials/tasks-form-fields') ?>

		<div>
			<?= form_submit('save', 'Save'); ?>
		</div>

	<?= form_close(); ?>

<?= $this->endSection(); ?>