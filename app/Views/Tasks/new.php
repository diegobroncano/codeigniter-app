<?= $this->extend('layouts/default'); ?>

<?= $this->section('title'); ?>New task<?= $this->endSection(); ?>

<?= $this->section('header-title'); ?>New task<?= $this->endSection(); ?>

<?= $this->section('content'); ?>

	<?= form_open( '/tasks/create'); ?>

		<?= $this->include('partials/tasks-form-fields') ?>

		<div>
			<?= form_submit('save', 'Save'); ?>
			<a href="<?= site_url('/tasks') ?>" class="cancel">Cancel</a>
		</div>

	<?= form_close(); ?>

<?= $this->endSection(); ?>