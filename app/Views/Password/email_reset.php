<?php /** @var string $token */ ?>
<h1>Reset your password</h1>

<p>Please click on the button bellow to activate your account:</p>
<a href="<?= site_url('/password/reset/'.$token); ?>"><button>Activate!</button></a>

<p>If the button doesn't work try this link:</p>
<p><a href="<?= site_url('/password/reset/'.$token); ?>"><?= site_url('/password/reset/'.$token); ?></a></p>