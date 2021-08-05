<?php

$flash_types = ['success', 'error', 'info', 'warning'];

foreach ( $flash_types as $type ) {

	if( session()->has($type) ): ?>
		<div class="<?= $type ?>">
			<ul>
				<?php foreach (session($type) as $item ): ?>
					<li><?= $item ?></li>
				<?php endforeach; ?>
			</ul>
		</div>
	<?php endif;

}