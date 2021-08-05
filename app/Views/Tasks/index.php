<?php /** @var array $tasks */ ?>
<?= $this->extend('layouts/default'); ?>

<?= $this->section('title'); ?>Task<?= $this->endSection(); ?>

<?= $this->section('content'); ?>

	<h1>Tasks list</h1>

	<p>This is the tasks list:</p>

	<ul class="task-list">

		<?php foreach ($tasks as $task): ?>
		<li class="task-item">
			<a href="<?= site_url('/tasks/show/'.$task['id']); ?>">
				<?= $task['id'] ?> &middot; <?= $task['description'] ?>
			</a>
		</li>
		<?php endforeach; ?>

	</ul>

<?= $this->endSection(); ?>