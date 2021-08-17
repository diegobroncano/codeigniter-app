<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
		  content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title><?= $this->renderSection('title') ?> | CodeIgniter</title>
</head>
<body>

	<header>
		<h2 class="site-title"><a href="<?= site_url() ?>">CodeIgniter app</a></h2>
		<?= $this->include('partials/menu') ?>
		<?= $this->renderSection('header') ?>
	</header>

	<h1 class="title"><?= $this->renderSection('header-title') ?></h1>

	<?= $this->include('partials/flash-messages') ?>

	<?= $this->renderSection('content'); ?>

</body>
</html>