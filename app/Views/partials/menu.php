<nav class="menu">
	<ul>
		<?php if ( current_user() ): ?>
		<li><a href="<?= site_url('/tasks'); ?>">Tasks</a></li>
		<li><a href="<?= site_url('/profile'); ?>">Profile</a></li>
		<li><a href="<?= site_url('/logout'); ?>">Log out</a></li>
			<?php if ( current_admin() ): ?>
			<li><a href="<?= site_url('/admin/users') ?>">Users management</a></li>
			<?php endif; ?>
		<?php else: ?>
		<li><a href="<?= site_url('/login'); ?>">Log in</a></li>
		<li><a href="<?= site_url('/signup'); ?>">Sign up</a></li>
		<?php endif; ?>
	</ul>
</nav>