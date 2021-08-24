<?php
/** @var array $users */
/** @var \CodeIgniter\Pager\Pager $pager */
?>
<?= $this->extend('layouts/default'); ?>

<?= $this->section('title'); ?>Users<?= $this->endSection(); ?>

<?= $this->section('header-title'); ?>Users list<?= $this->endSection(); ?>

<?= $this->section('content'); ?>



	<p>User list:</p>

	<table class="users-table">

		<thead>
			<tr>
				<th>ID</th>
				<th>Name</th>
				<th>Email</th>
				<th>Role</th>
				<th>Created at</th>
			</tr>
		</thead>

		<tbody>
			<?php foreach ($users as $user): ?>
				<tr>
					<td><a href="<?= site_url('/admin/users/show/'.$user->id) ?>"><?= $user->id; ?></a></td>
					<td><?= esc($user->name); ?></td>
					<td><?= esc($user->email); ?></td>
					<td><?= esc($user->role); ?></td>
					<td><?= $user->created_at; ?></td>
				</tr>
			<?php endforeach; ?>
		</tbody>
	</table>

	<?= $pager->links(); ?>


	<a href="<?= site_url('/admin/users/new') ?>" class="new-users-link">New users</a>

<?= $this->endSection(); ?>