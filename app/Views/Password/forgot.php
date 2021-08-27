<?= $this->extend('layouts/default'); ?>

<?= $this->section('title'); ?>Forgot password<?= $this->endSection(); ?>

<?= $this->section('header-title'); ?>Forgot password<?= $this->endSection(); ?>

<?= $this->section('content'); ?>

	<?= form_open( '/password/processforgot'); ?>

		<div>
			<?= form_label('Email', 'email'); ?>
			<?= form_input('email', old('email', '') , ['id' => 'email'], 'email'); ?>
		</div>

		<div>
			<?= form_submit('save', 'Save'); ?>
			<a href="<?= site_url('/login') ?>" class="cancel">Cancel</a>
		</div>

	<?= form_close(); ?>

<?= $this->endSection(); ?>