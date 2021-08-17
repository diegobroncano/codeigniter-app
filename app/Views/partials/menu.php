<nav class="menu">
	<ul>
		<?php if ( current_user() ): ?>
		<li><a href="<?= site_url('/tasks'); ?>">Tasks</a></li>
		<li><a href="<?= site_url('/logout'); ?>">Log out</a></li>
		<?php else: ?>
		<li><a href="<?= site_url('/login'); ?>">Log in</a></li>
		<li><a href="<?= site_url('/signup'); ?>">Sign up</a></li>
		<?php endif; ?>
	</ul>
</nav>