<?php /** @var array $tasks */ ?>
<?= $this->extend('layouts/default'); ?>

<?= $this->section('title'); ?>Task<?= $this->endSection(); ?>

<?= $this->section('header-title'); ?>Tasks list<?= $this->endSection(); ?>

<?= $this->section('content'); ?>

	<p>This is the tasks list:</p>

	<ul class="task-list">

		<?php foreach ($tasks as $task): ?>
		<li class="task-item">
			<a href="<?= site_url('/tasks/show/'.$task->id); ?>">
				<?= $task->id ?> &middot; <?= $task->description; ?>
			</a>
		</li>
		<?php endforeach; ?>

	</ul>

	<a href="<?= site_url('/tasks/new') ?>" class="new-task-link">New task</a>

<?= $this->endSection(); ?>