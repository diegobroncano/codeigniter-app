<?php /** @var array $user */ ?>
<?= $this->extend('layouts/default'); ?>

<?= $this->section('title'); ?><?= $user->name; ?><?= $this->endSection(); ?>

<?= $this->section('header-title'); ?><?= $user->name; ?><?= $this->endSection(); ?>

<?= $this->section('content'); ?>

	<a href="<?= site_url('/admin/users/'); ?>">&laquo; Back</a>

	<dl>
		<dt>ID</dt>
		<dd><?= $user->id; ?></dd>

		<dt>Email</dt>
		<dd><?= esc($user->email); ?></dd>

		<dt>Name</dt>
		<dd><?= esc($user->name); ?></dd>

		<dt>Last name</dt>
		<dd><?= esc($user->last_name); ?></dd>

		<dt>User role</dt>
		<dd><?= esc($user->role); ?></dd>

		<dt>Is active?</dt>
		<dd><?= $user->is_active ? 'yes' : 'no'; ?></dd>

		<dt>Created at</dt>
		<dd><?= $user->created_at; ?></dd>

		<dt>Updated at</dt>
		<dd><?= $user->updated_at; ?></dd>
	</dl>

	<?php if ( current_user()->id !== $user->id ): ?>
	<a href="<?= site_url('/admin/users/delete/'.$user->id) ?>" class="delete-link">Delete</a>
	<?php else: ?>
	<p>You cannot delete your own user.</p>
	<?php endif; ?>

	<h2>Update user:</h2>

	<?= form_open('/admin/users/update/'.$user->id, ['class' => 'update-user-form']) ?>

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
			<?= form_label( 'User role', 'role' ); ?>

			<?php // Add disabled attribute if editing its own user.
			$role_dropdown_atts = ['id' => 'role'];
			if ( current_user()->id === $user->id ) {
				$role_dropdown_atts = array_merge($role_dropdown_atts, ['disabled' => 'disabled']);
			}
			?>
			<?= form_dropdown('role', user_roles(), $user->role, $role_dropdown_atts); ?>
		</div>

		<div>
			<?= form_label( 'Is active?', 'is_active' ); ?>

			<?php // Add disabled attribute if editing its own user and echo out active hidden field if not.
			$active_checkbox_atts = ['id' => 'role'];
			if ( current_user()->id === $user->id ) {
				$active_checkbox_atts['disabled'] = 'disabled';
			} else {
				echo form_hidden('is_active', false);
			}
			?>
			<?= form_checkbox('is_active', true , $user->is_active,$active_checkbox_atts); ?>
		</div>

		<div>
			<?= form_submit('save', 'Save'); ?>
		</div>

	<?= form_close(); ?>

	<h2>Update user password:</h2>

	<?= form_open('/admin/users/updatepassword/'.$user->id, ['class' => 'update-password-form']) ?>

		<div>
			<?= form_label('Password', 'password'); ?>
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