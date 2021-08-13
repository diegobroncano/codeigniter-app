<?= $this->extend('layouts/default'); ?>

<?= $this->section('title'); ?>
Home
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>

<h1>CodeIgniter project home</h1>

<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque rutrum, nibh quis pharetra dapibus, elit urna tincidunt quam, non malesuada tellus sapien ut urna</p>

<a href="<?= site_url('/signup') ?>" class="go-to-signup">Create an account</a>

<a href="<?= site_url('/tasks') ?>" class="go-to-tasks">See tasks</a>

<?= $this->endSection(); ?>