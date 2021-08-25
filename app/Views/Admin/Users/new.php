<?= $this->extend('layouts/default'); ?>

<?= $this->section('title'); ?>New user<?= $this->endSection(); ?>

<?= $this->section('header-title'); ?>New user<?= $this->endSection(); ?>

<?= $this->section('content'); ?>

	<?= form_open( '/admin/users/create'); ?>

		<div>
			<?= form_label('Email', 'email'); ?>
			<?= form_input('email', old('email', '') , ['id' => 'email'], 'email'); ?>
		</div>

		<div>
			<?= form_label('Name', 'name'); ?>
			<?= form_input('name', old('name', '') , ['id' => 'name']); ?>
		</div>

		<div>
			<?= form_label('Password', 'password'); ?>
			<?= form_input('password', extra:['id' => 'password'], type:'password'); ?>
		</div>

		<div>
			<?= form_label('Confirm password', 'pass_confirm'); ?>
			<?= form_input('pass_confirm', extra:['id' => 'pass_confirm'], type:'password'); ?>
		</div>

		<div>
			<?= form_label( 'User role', 'role' ); ?>
			<?= form_dropdown('role', user_roles(), old('role', 'subscriber'), ['id' => 'role']); ?>
		</div>

		<div>
			<?= form_label( 'Is active?', 'is_active' ); ?>
			<?= form_hidden('is_active', false) ?>
			<?= form_checkbox('is_active', true , true, ['id' => 'is_active']); ?>
		</div>

		<div>
			<?= form_submit('save', 'Save'); ?>
			<a href="<?= site_url('/admin/users') ?>" class="cancel">Cancel</a>
		</div>

	<?= form_close(); ?>

<?= $this->endSection(); ?>