<?php

$flash_types = ['success', 'error', 'info', 'warning'];

foreach ( $flash_types as $type ) {

	if( session()->has($type) ): ?>
		<div class="<?= $type ?>">
			<ul>
				<?php if ( is_string(session($type)) ): ?>
					<li><?= session($type); ?></li>
				<?php else: ?>
					<?php foreach (session($type) as $item ): ?>
						<li><?= $item; ?></li>
					<?php endforeach; ?>
				<?php endif; ?>
			</ul>
		</div>
	<?php endif;

}