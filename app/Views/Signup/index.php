<?= $this->extend('layouts/default'); ?>

<?= $this->section('title'); ?>Sign up<?= $this->endSection(); ?>

<?= $this->section('header-title'); ?>Create your account<?= $this->endSection(); ?>

<?= $this->section('content'); ?>

	<?= form_open( '/signup/create'); ?>

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
			<?= form_submit('save', 'Save'); ?>
			<a href="<?= site_url('/tasks') ?>" class="cancel">Cancel</a>
		</div>

	<?= form_close(); ?>

<?= $this->endSection(); ?>