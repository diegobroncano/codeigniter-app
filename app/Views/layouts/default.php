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
		<h1 class="title"><?= $this->renderSection('header-title') ?></h1>
		<?= $this->renderSection('header') ?>
	</header>

	<?= $this->renderSection('content'); ?>

</body>
</html>