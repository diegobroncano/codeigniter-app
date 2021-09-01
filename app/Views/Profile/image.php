<?= $this->extend('layouts/default'); ?>

<?= $this->section('title'); ?>Edit profile image<?= $this->endSection(); ?>

<?= $this->section('header-title'); ?>Edit profile image<?= $this->endSection(); ?>

<?= $this->section('content'); ?>

	<?= form_open_multipart('/profile/updateimage', ['class' => 'update-image']) ?>

		<div>
			<?= form_label( 'Image', 'image' ); ?>
			<?= form_input('image', extra:['id' => 'email'], type:'file'); ?>
		</div>

		<div>
			<?= form_submit('save', 'Save'); ?>
			<a href="<?= site_url('/profile') ?>" class="cancel">Cancel</a>
		</div>

	<?= form_close(); ?>

<?= $this->endSection(); ?>