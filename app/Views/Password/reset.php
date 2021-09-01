<?php /** @var string $token */ ?>
<?= $this->extend('layouts/default'); ?>

<?= $this->section('title'); ?>Reset your password<?= $this->endSection(); ?>

<?= $this->section('header-title'); ?>Reset your password<?= $this->endSection(); ?>

<?= $this->section('content'); ?>

	<?= form_open( '/password/processreset/'.$token); ?>

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
			<a href="<?= site_url('/') ?>" class="cancel">Cancel</a>
		</div>

	<?= form_close(); ?>

<?= $this->endSection(); ?>