<?= $this->extend('layouts/default'); ?>

<?= $this->section('title'); ?>New task<?= $this->endSection(); ?>

<?= $this->section('header-title'); ?>New task<?= $this->endSection(); ?>

<?= $this->section('content'); ?>

	<?= form_open( '/tasks/create'); ?>

		<div>
			<?= form_label('Description', 'description'); ?>
			<?= form_input('description',  extra:['id' => 'description']); ?>
		</div>

		<div>
			<?= form_submit('save', 'Save'); ?>
			<a href="<?= site_url('/tasks') ?>" class="cancel">Cancel</a>
		</div>

	<?= form_close(); ?>

<?= $this->endSection(); ?>