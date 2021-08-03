<?= $this->extend('layouts/default'); ?>

<?= $this->section('title'); ?>Task<?= $this->endSection(); ?>

<?= $this->section('content'); ?>

	<h1>Tasks list</h1>

	<p>This is the tasks list:</p>

	<ul class="task-list">

		<?php /** @var array $tasks */
		foreach ($tasks as $task): ?>

		<li class="task-item">
			<?= $task['id'] ?> &middot; <?= $task['description'] ?>
		</li>

		<?php endforeach; ?>

	</ul>

<?= $this->endSection(); ?>