<?= $this->extend('layouts/default'); ?>

<?= $this->section('title'); ?>Log in<?= $this->endSection(); ?>

<?= $this->section('header-title'); ?>Log into your account<?= $this->endSection(); ?>

<?= $this->section('content'); ?>

	<?= form_open( '/login/create'); ?>

		<div>
			<?= form_label('Email', 'email'); ?>
			<?= form_input('email', old('email', '') , ['id' => 'email'], 'email'); ?>
		</div>

		<div>
			<?= form_label('Password', 'password'); ?>
			<?= form_input('password', extra:['id' => 'password'], type:'password'); ?>
		</div>

		<div>
			<?= form_submit('save', 'Save'); ?>
			<a href="<?= site_url() ?>" class="cancel">Cancel</a>
		</div>

	<?= form_close(); ?>

	<p><a href="<?= site_url('/password/forgot'); ?>">Forgot password?</a></p>

<?= $this->endSection(); ?>